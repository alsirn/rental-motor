<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Motor;
use App\Models\Payment;
use App\Models\Rental;
use App\Services\MidtransSnapService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class RentalController extends Controller
{
    public function myRentals(Request $request): JsonResponse
    {
        return response()->json(
            $request->user()
                ->rentals()
                ->with(['motor.brand', 'payment'])
                ->latest()
                ->get()
        );
    }

    public function store(Request $request, MidtransSnapService $midtrans): JsonResponse
    {
        $data = $request->validate([
            'motor_id' => ['required', 'integer', 'exists:motors,id'],
            'tanggal_mulai' => ['required', 'date'],
            'tanggal_selesai' => ['required', 'date', 'after:tanggal_mulai'],
        ]);

        if ($request->user()->verification_status !== 'verified') {
            return response()->json(['message' => 'Akun harus diverifikasi sebelum menyewa motor.'], 422);
        }

        $motor = Motor::whereKey($data['motor_id'])->lockForUpdate()->firstOrFail();

        if (! $motor->status) {
            return response()->json(['message' => 'Motor tidak tersedia.'], 400);
        }

        $rental = DB::transaction(function () use ($data, $motor, $request) {
            $duration = max(1, (int) Carbon::parse($data['tanggal_mulai'])->diffInDays(Carbon::parse($data['tanggal_selesai'])));
            $orderId = 'RENT-'.now()->format('YmdHis').'-'.$request->user()->id.'-'.$motor->id;

            $rental = Rental::create([
                'user_id' => $request->user()->id,
                'motor_id' => $motor->id,
                'tanggal_mulai' => $data['tanggal_mulai'],
                'tanggal_selesai' => $data['tanggal_selesai'],
                'total_biaya' => $motor->harga * $duration,
                'order_id' => $orderId,
            ]);

            $motor->update(['status' => false]);

            Payment::create([
                'rental_id' => $rental->id,
                'order_id' => $orderId,
                'gross_amount' => $rental->total_biaya,
            ]);

            return $rental->load(['user', 'motor']);
        });

        $snapToken = $midtrans->createTransaction($rental);
        $rental->update(['snap_token' => $snapToken]);

        return response()->json([
            'order_id' => $rental->order_id,
            'gross_amount' => $rental->total_biaya,
            'snap_token' => $snapToken,
        ]);
    }

    public function rented(): JsonResponse
    {
        $rentals = Rental::with(['motor:id,nama', 'user:id,name'])
            ->whereIn('status', ['pending', 'active'])
            ->latest()
            ->get()
            ->map(fn (Rental $rental) => [
                'motor' => $rental->motor,
                'penyewa' => ['nama' => $rental->user->name],
                'tgl_kembali' => $rental->tanggal_selesai->toDateString(),
            ]);

        return response()->json($rentals);
    }

    public function complete(Request $request, Rental $rental): JsonResponse
    {
        $rental->update(['status' => 'completed']);
        $rental->motor->update(['status' => true]);

        return response()->json(['message' => 'Sewa ditandai selesai', 'rental' => $rental->load(['user', 'motor'])]);
    }

    public function destroy(Request $request, Rental $rental): JsonResponse
    {
        if ($request->user()->role !== 'admin') {
            return response()->json(['message' => 'Hanya admin yang dapat menghapus histori sewa.'], 403);
        }

        if (in_array($rental->status, ['pending', 'active'], true)) {
            return response()->json(['message' => 'Histori aktif tidak dapat dihapus sebelum sewa selesai/dibatalkan.'], 422);
        }

        $rental->delete();

        return response()->json(['message' => 'Histori sewa berhasil dihapus']);
    }
}
