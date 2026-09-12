<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RuntimeException;

class WebpImageService
{
    public function store(UploadedFile $file, string $directory, int $quality = 82): string
    {
        if (! function_exists('imagecreatefromstring') || ! function_exists('imagewebp')) {
            throw new RuntimeException('Server belum mendukung konversi gambar WebP.');
        }

        $source = @imagecreatefromstring((string) file_get_contents($file->getRealPath()));

        if ($source === false) {
            throw new RuntimeException('File gambar tidak dapat dikonversi ke WebP.');
        }

        // Menjaga transparansi saat file PNG atau WebP dikonversi.
        imagepalettetotruecolor($source);
        imagealphablending($source, false);
        imagesavealpha($source, true);

        $directory = trim($directory, '/');
        $path = $directory.'/'.Str::uuid().'.webp';
        $disk = Storage::disk('public');
        $disk->makeDirectory($directory);

        try {
            if (! imagewebp($source, $disk->path($path), $quality)) {
                throw new RuntimeException('Gagal menyimpan gambar WebP.');
            }
        } finally {
            imagedestroy($source);
        }

        return $path;
    }
}
