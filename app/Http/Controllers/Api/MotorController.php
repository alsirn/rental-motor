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
        $motors = Motor::with('brand:id,nama_brand')->latest()->get()->map(fn (Motor $motor) => $this->format($motor));

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
            'image_motor' => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('image_motor')) {
            $data['image_motor'] = $request->file('image_motor')->store('motors', 'public');
        }

        $motor = Motor::create($data)->load('brand:id,nama_brand');

        return response()->json(['motor' => $this->format($motor)], 201);
    }

    public function update(Request $request, Motor $motor): JsonResponse
    {
        $data = $request->validate([
            'brand_id' => ['sometimes', 'required', 'integer', 'exists:brands,id'],
            'nama' => ['sometimes', 'required', 'string', 'max:120'],
            'harga' => ['sometimes', 'required', 'integer', 'min:1000'],
            'no_polisi' => ['sometimes', 'required', 'string', 'max:20', Rule::unique('motors', 'no_polisi')->ignore($motor)],
            'catatan' => ['nullable', 'string'],
            'status' => ['sometimes', 'boolean'],
            'image_motor' => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('image_motor')) {
            if ($motor->image_motor) {
                Storage::disk('public')->delete($motor->image_motor);
            }

            $data['image_motor'] = $request->file('image_motor')->store('motors', 'public');
        }

        $motor->update($data);

        return response()->json(['motor' => $this->format($motor->load('brand:id,nama_brand'))]);
    }

    public function destroy(Request $request, Motor $motor): JsonResponse
    {
        if ($request->user()->role !== 'admin') {
            return response()->json(['message' => 'Hanya admin yang dapat menghapus motor.'], 403);
        }

        if ($motor->rentals()->whereIn('status', ['pending', 'active'])->exists()) {
            return response()->json(['message' => 'Motor masih memiliki sewa aktif.'], 422);
        }

        if ($motor->image_motor) {
            Storage::disk('public')->delete($motor->image_motor);
        }

        $motor->delete();

        return response()->json(['message' => 'Motor berhasil dihapus']);
    }

    private function format(Motor $motor): array
    {
        return [
            'id' => $motor->id,
            'nama' => $motor->nama,
            'kategori' => $motor->brand?->nama_brand,
            'brand_id' => $motor->brand_id,
            'image_url' => $motor->image_motor ? Storage::url($motor->image_motor) : null,
            'harga' => $motor->harga,
            'no_polisi' => $motor->no_polisi,
            'status' => $motor->status,
            'catatan' => $motor->catatan,
        ];
    }
}
