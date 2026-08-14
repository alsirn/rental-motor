<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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
}
