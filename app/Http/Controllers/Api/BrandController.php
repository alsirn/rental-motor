<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BrandController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Brand::with('motors:id,brand_id,nama,harga,no_polisi,status')->latest()->get());
    }

    public function show(Brand $brand): JsonResponse
    {
        return response()->json($brand->load('motors:id,brand_id,nama,harga,no_polisi,status'));
    }

    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'nama_brand' => ['required', 'string', 'max:100', 'unique:brands,nama_brand'],
        ]);

        return response()->json(['brand' => Brand::create($data)], 201);
    }

    public function update(Request $request, Brand $brand): JsonResponse
    {
        $data = $request->validate([
            'nama_brand' => ['required', 'string', 'max:100', Rule::unique('brands', 'nama_brand')->ignore($brand)],
        ]);

        $brand->update($data);

        return response()->json(['brand' => $brand]);
    }

    public function destroy(Request $request, Brand $brand): JsonResponse
    {
        if ($request->user()->role !== 'admin') {
            return response()->json(['message' => 'Hanya admin yang dapat menghapus brand.'], 403);
        }

        $brand->delete();

        return response()->json(['message' => 'Brand berhasil dihapus']);
    }
}
