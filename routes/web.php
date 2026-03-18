<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BappController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PnbpController;
use App\Http\Controllers\SuratPesananController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');

Route::middleware('guest')->group(function (): void {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function (): void {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard.index');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::resource('users', UserController::class)->middleware('isSuperAdmin');

    Route::patch('pnbp/{pnbp}/verify', [PnbpController::class, 'verify'])->name('pnbp.verify');
    Route::resource('pnbp', PnbpController::class);

    Route::patch('bapp/{bapp}/verify', [BappController::class, 'verify'])->name('bapp.verify');
    Route::resource('bapp', BappController::class);

    Route::resource('surat-pesanan', SuratPesananController::class);
});
