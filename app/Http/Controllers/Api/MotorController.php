<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Motor;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class MotorController extends Controller
{
    public function index(): JsonResponse
    {
        $motors = Motor::with('brand:id,nama_brand')
            ->latest()
            ->get()
            ->map(fn (Motor $motor) => $this->format($motor));

        return response()->json($motors);
    }

    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'brand_id' => ['required', 'integer', 'exists:brands,id'],
            'nama' => ['required', 'string', 'max:120'],
            'harga' => ['required', 'integer', 'min:1000'],
            'no_polisi' => ['required', 'string', 'max:20', 'unique:motors,no_polisi'],
            'catatan' => ['nullable', 'string'],
            'status' => ['sometimes', 'boolean'],
            'image_motor_1' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'image_motor_2' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'image_motor_3' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        $data['image_motor'] = json_encode($this->uploadImages($request));
        unset($data['image_motor_1'], $data['image_motor_2'], $data['image_motor_3']);

        $motor = Motor::create($data)->load('brand:id,nama_brand');

        return response()->json(['motor' => $this->format($motor)], 201);
    }

    public function update(Request $request, Motor $motor): JsonResponse
    {
        $data = $request->validate([
            'brand_id' => ['sometimes', 'required', 'integer', 'exists:brands,id'],
            'nama' => ['sometimes', 'required', 'string', 'max:120'],
            'harga' => ['sometimes', 'required', 'integer', 'min:1000'],
            'no_polisi' => [
                'sometimes', 'required', 'string', 'max:20',
                Rule::unique('motors', 'no_polisi')->ignore($motor->id),
            ],
            'catatan' => ['nullable', 'string'],
            'status' => ['sometimes', 'boolean'],
            'image_motor_1' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'image_motor_2' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'image_motor_3' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        $images = $this->getImages($motor->image_motor);
        $changed = false;

        foreach ($this->imageFields() as $index => $field) {
            if ($request->hasFile($field)) {
                if (!empty($images[$index])) {
                    Storage::disk('public')->delete($images[$index]);
                }

                $images[$index] = $request->file($field)->store('motors', 'public');
                $changed = true;
            }
        }

        if ($changed) {
            $data['image_motor'] = json_encode($images);
        }

        unset($data['image_motor_1'], $data['image_motor_2'], $data['image_motor_3']);

        $motor->update($data);

        return response()->json([
            'motor' => $this->format(
                $motor->fresh()->load('brand:id,nama_brand')
            ),
        ]);
    }

    public function destroy(Request $request, Motor $motor): JsonResponse
    {
        if ($request->user()->role !== 'admin') {
            return response()->json([
                'message' => 'Hanya admin yang dapat menghapus motor.',
            ], 403);
        }

        if ($motor->rentals()->whereIn('status', ['pending', 'active'])->exists()) {
            return response()->json([
                'message' => 'Motor masih memiliki sewa aktif.',
            ], 422);
        }

        foreach ($this->getImages($motor->image_motor) as $image) {
            if ($image) {
                Storage::disk('public')->delete($image);
            }
        }

        $motor->delete();

        return response()->json(['message' => 'Motor berhasil dihapus']);
    }

    private function uploadImages(Request $request): array
    {
        $images = [null, null, null];

        foreach ($this->imageFields() as $index => $field) {
            if ($request->hasFile($field)) {
                $images[$index] = $request->file($field)->store('motors', 'public');
            }
        }

        return $images;
    }

    private function imageFields(): array
    {
        return [
            0 => 'image_motor_1', // Depan
            1 => 'image_motor_2', // Samping
            2 => 'image_motor_3', // Belakang
        ];
    }

    private function format(Motor $motor): array
    {
        $images = $this->getImages($motor->image_motor);

        return [
            'id' => $motor->id,
            'nama' => $motor->nama,
            'kategori' => $motor->brand?->nama_brand,
            'brand_id' => $motor->brand_id,
            'image_url' => $images[0] ? Storage::url($images[0]) : null,
            'image_url_2' => $images[1] ? Storage::url($images[1]) : null,
            'image_url_3' => $images[2] ? Storage::url($images[2]) : null,
            'image_urls' => array_values(array_filter(array_map(
                fn ($image) => $image ? Storage::url($image) : null,
                $images
            ))),
            'harga' => $motor->harga,
            'no_polisi' => $motor->no_polisi,
            'status' => $motor->status,
            'catatan' => $motor->catatan,
        ];
    }

    private function getImages(?string $imageMotor): array
    {
        if (!$imageMotor) {
            return [null, null, null];
        }

        $images = json_decode($imageMotor, true);

        if (is_array($images)) {
            return [
                $images[0] ?? null,
                $images[1] ?? null,
                $images[2] ?? null,
            ];
        }

        // Kompatibel dengan data lama yang hanya menyimpan 1 foto.
        return [$imageMotor, null, null];
    }
}