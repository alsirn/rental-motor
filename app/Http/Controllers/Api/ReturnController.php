<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Rental;
use App\Services\WebpImageService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReturnController extends Controller
{
    public function submitOnline(Request $request, Rental $rental, WebpImageService $images): JsonResponse
    {
        if ($rental->user_id !== $request->user()->id) {
            return response()->json(['message' => 'Kamu tidak dapat mengajukan pengembalian untuk sewa lain.'], 403);
        }

        if ($rental->status !== 'active' || ! $rental->status_bayar) {
            return response()->json(['message' => 'Pengembalian hanya dapat diajukan untuk sewa online yang aktif dan sudah dibayar.'], 422);
        }

        if ($rental->status_pengembalian === 'pending') {
            return response()->json(['message' => 'Bukti pengembalian sudah dikirim dan sedang menunggu persetujuan.'], 422);
        }

        if ($rental->status_pengembalian === 'approved') {
            return response()->json(['message' => 'Pengembalian motor ini sudah disetujui.'], 422);
        }

        $data = $request->validate([
            'foto_bukti_pengembalian' => ['required', 'image', 'max:4096'],
        ]);

        $rental->update([
            'foto_bukti_pengembalian' => $images->store($data['foto_bukti_pengembalian'], 'returns/online'),
            'status_pengembalian' => 'pending',
            'diajukan_kembali_pada' => now(),
            'disetujui_kembali_pada' => null,
        ]);

        return response()->json([
            'message' => 'Bukti pengembalian berhasil dikirim. Menunggu persetujuan petugas rental.',
            'rental' => $rental->fresh(['motor.brand', 'payment']),
        ]);
    }

    public function onlineIndex(): JsonResponse
    {
        return response()->json(
            Rental::with(['user:id,name,email,no_hp', 'motor:id,nama,no_polisi'])
                ->whereNotNull('foto_bukti_pengembalian')
                ->latest('diajukan_kembali_pada')
                ->get()
        );
    }

    public function approveOnline(Rental $rental): JsonResponse
    {
        if ($rental->status_pengembalian !== 'pending' || ! $rental->foto_bukti_pengembalian) {
            return response()->json(['message' => 'Belum ada pengajuan pengembalian online yang dapat disetujui.'], 422);
        }

        DB::transaction(function () use ($rental) {
            $rental->update([
                'status_pengembalian' => 'approved',
                'disetujui_kembali_pada' => now(),
                'status' => 'completed',
            ]);
            $rental->motor->update(['status' => true]);
        });

        return response()->json(['message' => 'Pengembalian online disetujui. Motor kembali tersedia.']);
    }
}
