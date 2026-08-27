<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymentSyncController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $data = $request->validate([
            'order_id' => ['required', 'string'],
            'transaction_status' => ['nullable', 'string'],
            'payment_type' => ['nullable', 'string'],
        ]);

        $payment = Payment::with(['rental.motor', 'rental.user'])->where('order_id', $data['order_id'])->firstOrFail();

        if ($request->user()->role === 'user' && $payment->rental->user_id !== $request->user()->id) {
            return response()->json(['message' => 'Kamu tidak dapat mengubah transaksi penyewa lain.'], 403);
        }

        $payload = $this->midtransStatus($payment->order_id) ?? $data;
        $status = $payload['transaction_status'] ?? $payment->transaction_status;

        $this->applyStatus($payment, $payload, $status);

        return response()->json([
            'message' => $this->messageFor($status),
            'payment' => $payment->fresh(['rental.motor', 'rental.user']),
        ]);
    }

    private function midtransStatus(string $orderId): ?array
    {
        $serverKey = config('services.midtrans.server_key');

        if (! $serverKey) {
            return null;
        }

        $baseUrl = config('services.midtrans.is_production')
            ? 'https://api.midtrans.com'
            : 'https://api.sandbox.midtrans.com';

        $response = Http::withBasicAuth($serverKey, '')
            ->acceptJson()
            ->get($baseUrl.'/v2/'.rawurlencode($orderId).'/status');

        return $response->ok() ? $response->json() : null;
    }

    private function applyStatus(Payment $payment, array $payload, string $status): void
    {
        $isPaid = in_array($status, ['capture', 'settlement'], true);
        $isCancelled = in_array($status, ['cancel', 'expire', 'deny', 'failure'], true);

        $payment->update([
            'payment_type' => $payload['payment_type'] ?? $payment->payment_type,
            'transaction_status' => $status,
            'status_bayar' => $isPaid,
            'paid_at' => $isPaid ? ($payment->paid_at ?? now()) : null,
            'payload' => $payload,
        ]);

        $payment->rental->update([
            'status_bayar' => $isPaid,
            'status' => $isPaid ? 'active' : ($isCancelled ? 'cancel' : 'pending'),
        ]);

        if ($isCancelled) {
            $payment->rental->motor->update(['status' => true]);
        }
    }

    private function messageFor(string $status): string
    {
        return match ($status) {
            'capture', 'settlement' => 'Pembayaran berhasil. Status sewa sudah aktif.',
            'cancel', 'expire', 'deny', 'failure' => 'Pembayaran dibatalkan atau gagal.',
            default => 'Status pembayaran masih pending.',
        };
    }
}
