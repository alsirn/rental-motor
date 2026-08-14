<?php

namespace App\Services;

use App\Models\Rental;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class MidtransSnapService
{
    public function createTransaction(Rental $rental): string
    {
        $serverKey = config('services.midtrans.server_key');

        if (! $serverKey) {
            return 'demo-snap-token-'.$rental->order_id;
        }

        $response = Http::withBasicAuth($serverKey, '')
            ->acceptJson()
            ->asJson()
            ->post(config('services.midtrans.snap_url'), [
                'transaction_details' => [
                    'order_id' => $rental->order_id,
                    'gross_amount' => $rental->total_biaya,
                ],
                'customer_details' => [
                    'first_name' => $rental->user->name,
                    'email' => $rental->user->email,
                    'phone' => $rental->user->no_hp,
                ],
                'item_details' => [[
                    'id' => (string) $rental->motor_id,
                    'price' => $rental->motor->harga,
                    'quantity' => max(1, (int) $rental->tanggal_mulai->diffInDays($rental->tanggal_selesai)),
                    'name' => Str::limit($rental->motor->nama, 50, ''),
                ]],
            ])
            ->throw()
            ->json();

        return $response['token'];
    }
}
