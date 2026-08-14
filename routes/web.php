<?php

use App\Models\Brand;
use App\Models\Motor;
use App\Models\Payment;
use App\Models\Rental;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', [
        'motors' => Motor::with('brand')->latest()->get(),
        'brands' => Brand::withCount('motors')->latest()->get(),
    ]);
});

Route::get('/checkout/{motor}', function (Motor $motor) {
    return view('checkout', ['motor' => $motor->load('brand')]);
});

Route::get('/verifikasi', fn () => view('verify'));

Route::get('/backend', function () {
    return view('backend.dashboard', [
        'stats' => [
            'sales_today' => Payment::whereDate('created_at', today())->where('status_bayar', true)->sum('gross_amount'),
            'rentals_today' => Rental::whereDate('created_at', today())->count(),
            'available_motors' => Motor::where('status', true)->count(),
            'rented_motors' => Motor::where('status', false)->count(),
            'pending_verifications' => User::where('verification_status', 'pending')->count(),
        ],
        'motors' => Motor::with('brand')->latest()->take(8)->get(),
        'rentals' => Rental::with(['user', 'motor'])->latest()->take(8)->get(),
        'payments' => Payment::with(['rental.user', 'rental.motor'])->latest()->take(8)->get(),
        'brands' => Brand::latest()->get(),
    ]);
});
