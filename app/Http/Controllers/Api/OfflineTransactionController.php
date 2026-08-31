<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Motor;
use App\Models\OfflineTransaction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class OfflineTransactionController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $query = OfflineTransaction::with(['brand:id,nama_brand', 'motor:id,nama,no_polisi,status'])
            ->latest();

        if ($request->filled('q')) {
            $keyword = '%'.$request->string('q')->lower()->toString().'%';
            $query->whereHas('motor', function ($motorQuery) use ($keyword) {
                $motorQuery
                    ->whereRaw('LOWER(nama) LIKE ?', [$keyword])
                    ->orWhereRaw('LOWER(no_polisi) LIKE ?', [$keyword]);
            });
        }

        return response()->json($query->get());
    }

    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'nama_lengkap' => ['required', 'string', 'max:255'],
            'nomor_whatsapp' => ['required', 'string', 'max:30'],
            'gmail' => ['required', 'email', 'max:255'],
            'foto_ktp' => ['required_without_all:foto_kk,foto_stnk', 'nullable', 'image', 'max:2048'],
            'foto_kk' => ['required_without_all:foto_ktp,foto_stnk', 'nullable', 'image', 'max:2048'],
            'foto_stnk' => ['required_without_all:foto_ktp,foto_kk', 'nullable', 'image', 'max:2048'],
            'brand_id' => ['required', 'integer', 'exists:brands,id'],
            'motor_id' => ['required', 'integer', 'exists:motors,id'],
        ]);

        $transaction = DB::transaction(function () use ($request, $data) {
            $motor = Motor::whereKey($data['motor_id'])
                ->where('brand_id', $data['brand_id'])
                ->where('status', true)
                ->lockForUpdate()
                ->first();

            if (! $motor) {
                throw ValidationException::withMessages([
                    'motor_id' => 'Motor tidak tersedia atau brand tidak sesuai.',
                ]);
            }

            foreach (['foto_ktp', 'foto_kk', 'foto_stnk'] as $field) {
                if ($request->hasFile($field)) {
                    $data[$field] = $request->file($field)->store('offline-transactions', 'public');
                }
            }

            $offlineTransaction = OfflineTransaction::create($data);
            $motor->update(['status' => false]);

            return $offlineTransaction->load(['brand', 'motor']);
        });

        return response()->json([
            'message' => 'Transaksi offline berhasil disimpan.',
            'transaction' => $transaction,
        ], 201);
    }

    public function destroy(Request $request, OfflineTransaction $offlineTransaction): JsonResponse
    {
        $offlineTransaction->motor->update(['status' => true]);
        $offlineTransaction->delete();

        return response()->json(['message' => 'Transaksi offline berhasil dihapus.']);
    }
}
