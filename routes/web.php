<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\AntrianController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/buat_storage', function () {
    Artisan::call('storage:link');
    dd("Storage Berhasil Di Buat");
});

Route::get('/clear-cache-all', function() {
    Artisan::call('cache:clear');
    dd("Cache Clear All");
});


Route::get('/', [BerandaController::class, 'index']);
Route::get('/login_w', [BerandaController::class, 'login']);
Route::post('/login_w', [LoginController::class, 'authenticate']);

Route::get('/antrian_w/hari_ini', [BerandaController::class, 'hari_ini']);
Route::get('/antrian_w/besok', [BerandaController::class, 'besok']);
Route::get('/antrian_w/search', [BerandaController::class, 'search']);
Route::get('/antrian_w/hari_ini/search', [BerandaController::class, 'search_hari_ini']);
Route::get('/antrian_w/besok/search', [BerandaController::class, 'search_besok']);
Route::get('/antrian_w/create', [BerandaController::class, 'create']);
Route::post('/antrian_w', [BerandaController::class, 'store']);
Route::get('/antrian_w/detail/{antrian}', [BerandaController::class, 'detail']);
Route::get('/antrian_w/cetak/{antrian}', [BerandaController::class, 'cetak']);

Route::get('/login-sistem', function () {
    return view('auth.login');
});
Route::post('/logout-sistem', [LoginController::class, 'logout']);


Route::group(['middleware' => 'is.group'], function () {

    Route::get('/dashboard', [HomeController::class, 'index']);

    ## Antrian
    Route::get('/antrian', [AntrianController::class, 'index']);
    Route::get('/antrian/search', [AntrianController::class, 'search']);
    Route::get('/antrian/create', [AntrianController::class, 'create']);
    Route::post('/antrian', [AntrianController::class, 'store']);
    Route::get('/antrian/edit/{antrian}', [AntrianController::class, 'edit']);
    Route::put('/antrian/edit/{antrian}', [AntrianController::class, 'update']);
    Route::get('/antrian/hapus/{antrian}',[AntrianController::class, 'delete']);

    ## Dokumen
    Route::get('/setting', [SettingController::class, 'index']);
    Route::get('/setting/edit/{setting}', [SettingController::class, 'edit']);
    Route::put('/setting/edit/{setting}', [SettingController::class, 'update']);
    Route::get('/setting/hapus/{setting}',[SettingController::class, 'delete']);

    ## Slider
    Route::get('/slider', [SliderController::class, 'index']);
    Route::get('/slider/search', [SliderController::class, 'search']);
    Route::get('/slider/create', [SliderController::class, 'create']);
    Route::post('/slider', [SliderController::class, 'store']);
    Route::get('/slider/edit/{slider}', [SliderController::class, 'edit']);
    Route::put('/slider/edit/{slider}', [SliderController::class, 'update']);
    Route::get('/slider/hapus/{slider}',[SliderController::class, 'delete']);

    ## Profil
    Route::get('/profil', [ProfilController::class, 'index']);
    Route::get('/profil/edit/{profil}', [ProfilController::class, 'edit']);
    Route::put('/profil/edit/{profil}', [ProfilController::class, 'update']);

    ## User
    Route::get('/user', [UserController::class, 'index']);
    Route::get('/user/search', [UserController::class, 'search']);
    Route::get('/user/create', [UserController::class, 'create']);
    Route::post('/user', [UserController::class, 'store']);
    Route::get('/user/edit/{user}', [UserController::class, 'edit']);
    Route::put('/user/edit/{user}', [UserController::class, 'update']);
    Route::get('/user/hapus/{user}',[UserController::class, 'delete']);

});