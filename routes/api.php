<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BrandController;
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\HistoryController;
use App\Http\Controllers\Api\MidtransNotificationController;
use App\Http\Controllers\Api\MotorController;
use App\Http\Controllers\Api\RentalController;
use App\Http\Controllers\Api\VerificationController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/admin/login', [AuthController::class, 'adminLogin']);

Route::get('/motors', [MotorController::class, 'index']);
Route::get('/brands', [BrandController::class, 'index']);
Route::get('/brands/{brand}', [BrandController::class, 'show']);
Route::post('/midtrans/notification', MidtransNotificationController::class);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/me', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/rentals', [RentalController::class, 'store'])->middleware('role:user');
    Route::post('/verify-account', [VerificationController::class, 'store'])->middleware('role:user');

    Route::middleware('role:admin,tukang')->group(function () {
        Route::get('/dashboard', DashboardController::class);
        Route::post('/motors', [MotorController::class, 'store']);
        Route::post('/brands', [BrandController::class, 'store']);
        Route::get('/payments', [HistoryController::class, 'payments']);
        Route::get('/transactions', [HistoryController::class, 'transactions']);
        Route::get('/rented', [RentalController::class, 'rented']);
    });
});
