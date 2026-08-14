<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'foto_ktp' => ['required', 'image', 'max:2048'],
            'foto_kk' => ['required', 'image', 'max:2048'],
            'foto_sim' => ['required', 'image', 'max:2048'],
        ]);

        foreach (array_keys($data) as $field) {
            $data[$field] = $request->file($field)->store('verifications', 'public');
        }

        $request->user()->update($data + ['verification_status' => 'pending']);

        return response()->json(['message' => 'Menunggu verifikasi']);
    }
}
