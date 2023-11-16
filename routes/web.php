<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AnalisController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\TeknisController;
use App\Http\Controllers\KepalaTUController;
use App\Http\Controllers\PenyeliaController;
use App\Http\Controllers\TimelineController;
use App\Http\Controllers\GantiPassController;
use App\Http\Controllers\KepalaLabController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PengambilController;
use App\Http\Controllers\SuperadminController;
use App\Http\Controllers\AdministrasiController;
use App\Http\Controllers\LupaPasswordController;

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
        Route::get('permohonan/add', [PelangganController::class, 'addPermohonan']);
        Route::post('permohonan/add', [PelangganController::class, 'simpanPermohonan']);
        Route::get('permohonan/delete/{id}', [PelangganController::class, 'deletePermohonan']);
        Route::get('timeline/{id}', [PelangganController::class, 'timeline']);
        Route::get('timeline/{id}/permohonan', [PelangganController::class, 'permohonan']);
        Route::get('timeline/{id}/editpermohonan', [PelangganController::class, 'editPermohonan']);
        Route::get('timeline/{id}/kirimpermohonan', [PelangganController::class, 'kirimPermohonan']);
        Route::get('timeline/{id}/wordpermohonan', [PelangganController::class, 'wordPermohonan']);
        Route::post('timeline/{id}/editpermohonan', [PelangganController::class, 'updatePermohonan']);
        Route::post('timeline/{id}/permohonan', [PelangganController::class, 'storePermohonan']);
        Route::get('timeline/step1', [TimelineController::class, 'step1']);
    });
});

Route::group(['middleware' => ['auth', 'role:petugas_administrasi']], function () {
    Route::prefix('administrasi')->group(function () {
        Route::get('home', [AdministrasiController::class, 'home']);
        Route::get('timeline/{id}/wordpermohonan', [AdministrasiController::class, 'wordPermohonan']);
        Route::get('timeline/{id}', [AdministrasiController::class, 'timeline']);
        Route::get('timeline/{id}/kirimstep2', [AdministrasiController::class, 'kirimstep2']);
        Route::get('timeline/{id}/verifikasikajiulang', [AdministrasiController::class, 'verifikasikaji']);
        Route::get('timeline/{id}/verifikasipembayaran', [AdministrasiController::class, 'verifikasipembayaran']);
        Route::get('timeline/{id}/verifikasisuratsample', [AdministrasiController::class, 'verifikasisuratsample']);
        Route::get('timeline/{id}/kirimstep4', [AdministrasiController::class, 'kirimstep4']);

        Route::get('timeline/{id}/verifikasisampleterima', [AdministrasiController::class, 'verifikasisampleterima']);
        Route::get('timeline/{id}/kirimstep7', [AdministrasiController::class, 'kirimstep7']);

        Route::get('timeline/{id}/verifikasiidentifikasi', [AdministrasiController::class, 'verifikasiidentifikasi']);
        Route::get('timeline/{id}/kirimstep8', [AdministrasiController::class, 'kirimstep8']);

        Route::get('timeline/{id}/verifikasiselesaiisi', [AdministrasiController::class, 'verifikasiselesaiisi']);
        Route::get('timeline/{id}/kirimstep13', [AdministrasiController::class, 'kirimstep13']);

        Route::get('timeline/{id}/verifikasiuploadlhu', [AdministrasiController::class, 'verifikasiuploadlhu']);
        Route::get('timeline/{id}/kirimstep16', [AdministrasiController::class, 'kirimstep16']);
    });
});

Route::group(['middleware' => ['auth', 'role:penyelia']], function () {
    Route::prefix('penyelia')->group(function () {
        Route::get('home', [PenyeliaController::class, 'home']);
        Route::get('timeline/{id}', [PenyeliaController::class, 'timeline']);
        Route::get('timeline/{id}/verifikasi_pengambilan_sample', [PenyeliaController::class, 'verifikasipengambilansample']);
        Route::get('timeline/{id}/kirimstep3', [PenyeliaController::class, 'kirimstep3']);
        Route::get('timeline/{id}/verifikasisuratuji', [PenyeliaController::class, 'verifikasisuratuji']);
        Route::get('timeline/{id}/kirimstep9', [PenyeliaController::class, 'kirimstep9']);
        Route::get('timeline/{id}/verifikasirekaman', [PenyeliaController::class, 'verifikasirekaman']);
        Route::get('timeline/{id}/kirimstep11', [PenyeliaController::class, 'kirimstep11']);
        Route::get('timeline/{id}/verifikasirekapitulasi', [PenyeliaController::class, 'verifikasirekapitulasi']);
        Route::get('timeline/{id}/kirimstep12', [PenyeliaController::class, 'kirimstep12']);
    });
});

Route::group(['middleware' => ['auth', 'role:analis']], function () {
    Route::prefix('analis')->group(function () {
        Route::get('home', [AnalisController::class, 'home']);
        Route::get('timeline/{id}', [AnalisController::class, 'timeline']);
        Route::get('timeline/{id}/verifikasilaksanakan', [AnalisController::class, 'verifikasilaksanakan']);
        Route::get('timeline/{id}/kirimstep10', [AnalisController::class, 'kirimstep10']);
    });
});

Route::group(['middleware' => ['auth', 'role:petugas_pengambil_contoh']], function () {
    Route::prefix('pengambil')->group(function () {
        Route::get('home', [PengambilController::class, 'home']);
        Route::get('timeline/{id}', [PengambilController::class, 'timeline']);
        Route::get('timeline/{id}/verifikasitindaklanjut', [PengambilController::class, 'verifikasitindaklanjut']);
        Route::get('timeline/{id}/kirimstep5', [PengambilController::class, 'kirimstep5']);
        Route::get('timeline/{id}/verifikasiberkas', [PengambilController::class, 'verifikasiberkas']);
        Route::get('timeline/{id}/kirimstep6', [PengambilController::class, 'kirimstep6']);
    });
});
Route::group(['middleware' => ['auth', 'role:pengawas_teknis']], function () {
    Route::prefix('teknis')->group(function () {
        Route::get('home', [TeknisController::class, 'home']);
        Route::get('timeline/{id}/wordpermohonan', [TeknisController::class, 'wordPermohonan']);
        Route::get('timeline/{id}', [TeknisController::class, 'timeline']);
        Route::get('timeline/{id}/verifikasi_pengambilan_sample', [TeknisController::class, 'verifikasipengambilansample']);
        Route::get('timeline/{id}/kirimstep3', [TeknisController::class, 'kirimstep3']);
    });
});

Route::group(['middleware' => ['auth', 'role:kepala_sub_bagian_tata_usaha']], function () {
    Route::prefix('kepalatu')->group(function () {
        Route::get('home', [KepalaTUController::class, 'home']);
        Route::get('timeline/{id}', [KepalaTUController::class, 'timeline']);
        Route::get('timeline/{id}/verifikasikepalatu', [KepalaTUController::class, 'verifikasikepalatu']);
        Route::get('timeline/{id}/kirimstep14', [KepalaTUController::class, 'kirimstep14']);
    });
});

Route::group(['middleware' => ['auth', 'role:kepala_laboratorium']], function () {
    Route::prefix('kepalalab')->group(function () {
        Route::get('home', [KepalaLabController::class, 'home']);
        Route::get('timeline/{id}', [KepalaLabController::class, 'timeline']);
        Route::get('timeline/{id}/verifikasikepalalab', [KepalaLabController::class, 'verifikasikepalalab']);
        Route::get('timeline/{id}/kirimstep15', [KepalaLabController::class, 'kirimstep15']);
    });
});

Route::group(['middleware' => ['auth', 'role:superadmin|kepala_laboratorium|kepala_sub_bagian_tata_usaha|pelanggan|petugas_administrasi|pengawas_teknis|penyelia|petugas_pengambil_contoh']], function () {
    Route::get('gantipass', [GantiPassController::class, 'index']);
    Route::post('gantipass', [GantiPassController::class, 'update']);
});
Route::get('/logout', [LogoutController::class, 'logout']);
Route::get('/rolelain/home', [LoginController::class, 'rolelain']);
