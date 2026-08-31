<?php

use App\Models\Brand;
use App\Models\Motor;
use App\Models\Payment;
use App\Models\Rental;
use App\Models\SiteSetting;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', [
        'heroBanner' => SiteSetting::getValue('hero_banner'),
    ]);
});

Route::get('/katalog', function () {
    return view('catalog', [
        'motors' => Motor::with('brand')->latest()->get(),
        'brands' => Brand::withCount('motors')->latest()->get(),
    ]);
});

Route::get('/checkout/{motor}', function (Motor $motor) {
    return view('checkout', ['motor' => $motor->load('brand')]);
});

Route::view('/login', 'auth.login');
Route::view('/register', 'auth.register');
Route::view('/akun', 'account');
Route::get('/verifikasi', fn () => view('verify'));
Route::view('/payment/finish', 'payment-finish');

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
        'heroBanner' => SiteSetting::getValue('hero_banner'),
    ]);
});

Route::view('/backend/motor', 'backend.motors');
Route::view('/backend/brand', 'backend.brands');
Route::view('/backend/transaksi', 'backend.transactions');
Route::view('/backend/transaksi-offline', 'backend.offline-transactions');
Route::view('/backend/pembayaran', 'backend.payments');
Route::view('/backend/verifikasi', 'backend.verifications');
