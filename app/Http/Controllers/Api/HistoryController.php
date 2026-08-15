<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Rental;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function payments(Request $request): JsonResponse
    {
        $query = Payment::with(['rental.user:id,name', 'rental.motor:id,nama']);

        if ($request->filled('status')) {
            $query->where('transaction_status', $request->string('status'));
        }

        return response()->json($query->latest()->get());
    }

    public function transactions(): JsonResponse
    {
        $rentals = Rental::with(['user:id,name', 'motor:id,nama'])
            ->latest()
            ->get()
            ->map(fn (Rental $rental) => [
                'id' => $rental->id,
                'penyewa' => ['nama' => $rental->user->name],
                'motor' => ['nama' => $rental->motor->nama],
                'tgl_sewa' => $rental->tanggal_mulai->toDateString(),
                'tgl_kembali' => $rental->tanggal_selesai->toDateString(),
                'total_biaya' => $rental->total_biaya,
                'status' => $rental->status,
            ]);

        return response()->json($rentals);
    }

    public function destroyPayment(Request $request, Payment $payment): JsonResponse
    {
        if ($request->user()->role !== 'admin') {
            return response()->json(['message' => 'Hanya admin yang dapat menghapus histori pembayaran.'], 403);
        }

        $payment->delete();

        return response()->json(['message' => 'Histori pembayaran berhasil dihapus']);
    }
}
