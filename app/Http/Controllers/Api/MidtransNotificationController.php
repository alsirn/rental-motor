<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MidtransNotificationController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $payload = $request->all();
        $status = $payload['transaction_status'] ?? 'pending';
        $orderId = $payload['order_id'] ?? null;

        $payment = Payment::where('order_id', $orderId)->firstOrFail();
        $isPaid = in_array($status, ['capture', 'settlement'], true);

        $payment->update([
            'payment_type' => $payload['payment_type'] ?? null,
            'transaction_status' => $status,
            'status_bayar' => $isPaid,
            'paid_at' => $isPaid ? now() : null,
            'payload' => $payload,
        ]);

        $payment->rental->update([
            'status_bayar' => $isPaid,
            'status' => $isPaid ? 'active' : ($status === 'cancel' ? 'cancel' : 'pending'),
        ]);

        if ($status === 'cancel') {
            $payment->rental->motor->update(['status' => true]);
        }

        return response()->json(['message' => 'Notification processed']);
    }
}
