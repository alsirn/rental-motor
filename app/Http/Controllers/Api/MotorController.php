<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Motor;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
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
            'image_motor' => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('image_motor')) {
            $data['image_motor'] = $request->file('image_motor')->store('motors', 'public');
        }

        $motor = Motor::create($data)->load('brand:id,nama_brand');

        return response()->json(['motor' => $this->format($motor)], 201);
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
