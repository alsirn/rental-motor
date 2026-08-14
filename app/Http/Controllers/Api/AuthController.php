<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function register(Request $request): JsonResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'no_hp' => ['required', 'string', 'max:30'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        $user = User::create($data + ['role' => 'user']);

        return response()->json([
            'user' => $user,
            'token' => $user->createToken('api-token')->plainTextToken,
        ], 201);
    }

    public function login(Request $request): JsonResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if (! $user || ! Hash::check($credentials['password'], $user->password)) {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }

        return response()->json([
            'user' => $user,
            'token' => $user->createToken($user->role.'-token')->plainTextToken,
        ]);
    }

    public function adminLogin(Request $request): JsonResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
            'role' => ['nullable', Rule::in(['admin', 'tukang'])],
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if (! $user || ! Hash::check($credentials['password'], $user->password) || ! in_array($user->role, ['admin', 'tukang'], true)) {
            return response()->json(['error' => 'Invalid admin credentials'], 401);
        }

        if (isset($credentials['role']) && $user->role !== $credentials['role']) {
            return response()->json(['error' => 'Role tidak sesuai'], 401);
        }

        return response()->json([
            'user' => $user,
            'token' => $user->createToken($user->role.'-backend-token')->plainTextToken,
        ]);
    }

    public function me(Request $request): JsonResponse
    {
        return response()->json(['user' => $request->user()]);
    }

    public function logout(Request $request): JsonResponse
    {
        $request->user()->currentAccessToken()?->delete();

        return response()->json(['message' => 'Logout berhasil']);
    }
}
