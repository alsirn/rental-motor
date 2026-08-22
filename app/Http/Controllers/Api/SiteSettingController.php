<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SiteSettingController extends Controller
{
    public function updateHeroBanner(Request $request): JsonResponse
    {
        $data = $request->validate([
            'hero_banner' => ['required', 'image', 'max:4096'],
        ]);

        $path = $data['hero_banner']->store('site', 'public');

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
