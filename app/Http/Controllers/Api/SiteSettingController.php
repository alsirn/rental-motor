<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use App\Services\WebpImageService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SiteSettingController extends Controller
{
    public function updateHeroBanner(Request $request, WebpImageService $images): JsonResponse
    {
        $data = $request->validate([
            'hero_banner' => ['required', 'image', 'max:4096'],
        ]);

        $path = $images->store($data['hero_banner'], 'site');

        SiteSetting::query()->updateOrCreate(
            ['key' => 'hero_banner'],
            ['value' => $path]
        );

        return response()->json([
            'message' => 'Banner homepage berhasil diperbarui.',
            'hero_banner' => $path,
        ]);
    }
}
