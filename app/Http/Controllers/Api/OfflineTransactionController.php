<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Motor;
use App\Models\OfflineTransaction;
use App\Services\WebpImageService;
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

    public function store(Request $request, WebpImageService $images): JsonResponse
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
                    $data[$field] = $images->store($request->file($field), 'offline-transactions');
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

    public function submitReturn(Request $request, OfflineTransaction $offlineTransaction, WebpImageService $images): JsonResponse
    {
        if ($offlineTransaction->status_pengembalian === 'approved') {
            return response()->json(['message' => 'Pengembalian transaksi offline ini sudah disetujui.'], 422);
        }

        $data = $request->validate([
            'foto_bukti_pengembalian' => ['required', 'image', 'max:4096'],
        ]);

        $offlineTransaction->update([
            'foto_bukti_pengembalian' => $images->store($data['foto_bukti_pengembalian'], 'returns/offline'),
            'status_pengembalian' => 'pending',
            'diajukan_kembali_pada' => now(),
            'disetujui_kembali_pada' => null,
        ]);

        return response()->json(['message' => 'Bukti pengembalian offline berhasil disimpan. Silakan setujui setelah pemeriksaan.']);
    }

    public function approveReturn(OfflineTransaction $offlineTransaction): JsonResponse
    {
        if ($offlineTransaction->status_pengembalian !== 'pending' || ! $offlineTransaction->foto_bukti_pengembalian) {
            return response()->json(['message' => 'Belum ada bukti pengembalian offline yang dapat disetujui.'], 422);
        }

        DB::transaction(function () use ($offlineTransaction) {
            $offlineTransaction->update([
                'status_pengembalian' => 'approved',
                'disetujui_kembali_pada' => now(),
                'status' => 'completed',
            ]);
            $offlineTransaction->motor->update(['status' => true]);
        });

        return response()->json(['message' => 'Pengembalian offline disetujui. Motor kembali tersedia.']);
    }
}
