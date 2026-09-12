<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\WebpImageService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class VerificationController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(
            User::select('id', 'name', 'email', 'no_hp', 'verification_status', 'foto_ktp', 'foto_kk', 'foto_sim', 'created_at')
                ->where('role', 'user')
                ->latest()
                ->get()
        );
    }

    public function store(Request $request, WebpImageService $images): JsonResponse
    {
        $data = $request->validate([
            'foto_ktp' => ['required', 'image', 'max:2048'],
            'foto_kk' => ['required', 'image', 'max:2048'],
            'foto_sim' => ['required', 'image', 'max:2048'],
        ]);

        foreach (array_keys($data) as $field) {
            $data[$field] = $images->store($request->file($field), 'verifications');
        }

        $request->user()->update($data + ['verification_status' => 'pending']);

        return response()->json(['message' => 'Menunggu verifikasi']);
    }

    public function updateStatus(Request $request, User $user): JsonResponse
    {
        $data = $request->validate([
            'verification_status' => ['required', Rule::in(['verified', 'rejected', 'pending', 'unverified'])],
        ]);

        if ($user->role !== 'user') {
            return response()->json(['message' => 'Hanya akun penyewa yang diverifikasi.'], 422);
        }

        $user->update($data);

        return response()->json(['message' => 'Status verifikasi diperbarui', 'user' => $user]);
    }
}
