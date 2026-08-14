<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['rental_id', 'order_id', 'gross_amount', 'payment_type', 'transaction_status', 'status_bayar', 'paid_at', 'payload'])]
class Payment extends Model
{
    use HasFactory;

    protected function casts(): array
    {
        return [
            'status_bayar' => 'boolean',
            'paid_at' => 'datetime',
            'payload' => 'array',
        ];
    }

    public function rental(): BelongsTo
    {
        return $this->belongsTo(Rental::class);
    }
}
