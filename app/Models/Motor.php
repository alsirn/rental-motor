<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['brand_id', 'nama', 'harga', 'no_polisi', 'catatan', 'image_motor', 'status'])]
class Motor extends Model
{
    use HasFactory;

    protected function casts(): array
    {
        return ['status' => 'boolean'];
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function rentals(): HasMany
    {
        return $this->hasMany(Rental::class);
    }
}
