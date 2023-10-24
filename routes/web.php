<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\GantiPassController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\SuperadminController;
use App\Http\Controllers\TimelineController;

Route::get('/', [FrontController::class, 'home']);

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::get('register', [LoginController::class, 'register']);
Route::post('register', [LoginController::class, 'storeRegister']);
Route::get('lupa-password', [LupaPasswordController::class, 'index']);

Route::group(['middleware' => ['auth', 'role:superadmin']], function () {
    Route::prefix('superadmin')->group(function () {
        Route::get('beranda', [SuperadminController::class, 'index']);
        Route::get('pelanggan', [SuperadminController::class, 'pelanggan']);
        Route::get('role', [RoleController::class, 'index']);
        Route::get('akun', [AkunController::class, 'index']);
        Route::get('akun/add', [AkunController::class, 'create']);
        Route::post('akun/add', [AkunController::class, 'store']);
        Route::get('akun/edit/{id}', [AkunController::class, 'edit']);
        Route::post('akun/edit/{id}', [AkunController::class, 'update']);
        Route::get('akun/delete/{id}', [AkunController::class, 'delete']);
        Route::get('timeline/{id}', [SuperadminController::class, 'timeline']);
        Route::get('permohonan/delete/{id}', [SuperadminController::class, 'deletePermohonan']);
    });
});

Route::group(['middleware' => ['auth', 'role:pelanggan']], function () {
    Route::prefix('pelanggan')->group(function () {
        Route::get('home', [PelangganController::class, 'home']);
        // Route::get('permohonan/add', [PelangganController::class, 'addPermohonan']);
        // Route::post('permohonan/add', [PelangganController::class, 'storePermohonan']);
        // Route::get('permohonan/delete/{id}', [PelangganController::class, 'deletePermohonan']);
        Route::get('timeline/{id}', [PelangganController::class, 'timeline']);
        Route::get('timeline/{id}/permohonan', [PelangganController::class, 'permohonan']);
        Route::get('timeline/{id}/editpermohonan', [PelangganController::class, 'editPermohonan']);
        Route::get('timeline/{id}/wordpermohonan', [PelangganController::class, 'wordPermohonan']);
        Route::post('timeline/{id}/editpermohonan', [PelangganController::class, 'updatePermohonan']);
        Route::post('timeline/{id}/permohonan', [PelangganController::class, 'storePermohonan']);
        Route::get('timeline/step1', [TimelineController::class, 'step1']);
    });
});


Route::group(['middleware' => ['auth', 'role:superadmin|pelanggan|bidang|pptk']], function () {
    Route::get('/logout', [LogoutController::class, 'logout']);

    Route::get('gantipass', [GantiPassController::class, 'index']);
    Route::post('gantipass', [GantiPassController::class, 'update']);
});
