<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Motor;
use App\Models\Payment;
use App\Models\Rental;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class DashboardController extends Controller
{
    public function __invoke(): JsonResponse
    {
        return response()->json([
            'sales_today' => Payment::whereDate('created_at', today())->where('status_bayar', true)->sum('gross_amount'),
            'rentals_today' => Rental::whereDate('created_at', today())->count(),
            'available_motors' => Motor::where('status', true)->count(),
            'rented_motors' => Motor::where('status', false)->count(),
            'pending_verifications' => User::where('verification_status', 'pending')->count(),
        ]);
    }
}
