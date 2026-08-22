<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BrandController;
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\HistoryController;
use App\Http\Controllers\Api\MidtransNotificationController;
use App\Http\Controllers\Api\MotorController;
use App\Http\Controllers\Api\RentalController;
use App\Http\Controllers\Api\SiteSettingController;
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
    Route::get('/my-rentals', [RentalController::class, 'myRentals'])->middleware('role:user');
    Route::post('/rentals', [RentalController::class, 'store'])->middleware('role:user');
    Route::post('/verify-account', [VerificationController::class, 'store'])->middleware('role:user');

    Route::middleware('role:admin,tukang')->group(function () {
        Route::get('/dashboard', DashboardController::class);
        Route::post('/motors', [MotorController::class, 'store']);
        Route::post('/motors/{motor}', [MotorController::class, 'update']);
        Route::put('/motors/{motor}', [MotorController::class, 'update']);
        Route::delete('/motors/{motor}', [MotorController::class, 'destroy']);
        Route::post('/brands', [BrandController::class, 'store']);
        Route::put('/brands/{brand}', [BrandController::class, 'update']);
        Route::delete('/brands/{brand}', [BrandController::class, 'destroy']);
        Route::get('/payments', [HistoryController::class, 'payments']);
        Route::delete('/payments/{payment}', [HistoryController::class, 'destroyPayment']);
        Route::get('/transactions', [HistoryController::class, 'transactions']);
        Route::patch('/rentals/{rental}/complete', [RentalController::class, 'complete']);
        Route::delete('/rentals/{rental}', [RentalController::class, 'destroy']);
        Route::get('/rented', [RentalController::class, 'rented']);
        Route::get('/verifications', [VerificationController::class, 'index']);
        Route::patch('/verifications/{user}', [VerificationController::class, 'updateStatus']);
        Route::post('/site-settings/hero-banner', [SiteSettingController::class, 'updateHeroBanner']);
    });
});
