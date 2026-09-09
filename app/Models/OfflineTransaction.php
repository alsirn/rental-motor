<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['nama_lengkap', 'nomor_whatsapp', 'gmail', 'foto_ktp', 'foto_kk', 'foto_stnk', 'brand_id', 'motor_id', 'status', 'foto_bukti_pengembalian', 'status_pengembalian', 'diajukan_kembali_pada', 'disetujui_kembali_pada'])]
class OfflineTransaction extends Model
{
    use HasFactory;

    protected function casts(): array
    {
        return [
            'diajukan_kembali_pada' => 'datetime',
            'disetujui_kembali_pada' => 'datetime',
        ];
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function motor(): BelongsTo
    {
        return $this->belongsTo(Motor::class);
    }
}
