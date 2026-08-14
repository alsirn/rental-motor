<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

#[Fillable(['user_id', 'motor_id', 'tanggal_mulai', 'tanggal_selesai', 'total_biaya', 'order_id', 'snap_token', 'status', 'status_bayar'])]
class Rental extends Model
{
    use HasFactory;

    protected function casts(): array
    {
        return [
            'tanggal_mulai' => 'date',
            'tanggal_selesai' => 'date',
            'status_bayar' => 'boolean',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function motor(): BelongsTo
    {
        return $this->belongsTo(Motor::class);
    }

    public function payment(): HasOne
    {
        return $this->hasOne(Payment::class);
    }
}
