<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\landing\HomeController;
use App\Http\Controllers\dashboard\DashboardController;
use App\Http\Controllers\dashboard\BeritaController;
use App\Http\Controllers\login\AuthController;

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

// Landing
Route::get('/',[HomeController::class,'index']);


//Dashboard
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/postlogin', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'auth'], function () {

    Route::prefix('admin')->middleware('can:admin')->group(function () {
        
        //Home
        Route::get('/dashboard', [DashboardController::class, 'index']);
        Route::post('/dashboard/create', [DashboardController::class, 'store']);
        Route::get('/dashboard/destroy/{id}', [DashboardController::class, 'destroy']);
        Route::get('/dashboard/edit/{id}', [DashboardController::class, 'edit']);
        Route::post('/dashboard/update/{id}', [DashboardController::class, 'update']);

        //Header
        Route::post('/dashboard/create/header', [DashboardController::class, 'storeheader']);
        Route::get('/dashboard/destroy/header/{id}', [DashboardController::class, 'destroyheader']);
        Route::get('/dashboard/edit/header/{id}', [DashboardController::class, 'editheader']);
        Route::post('/dashboard/update/header/{id}', [DashboardController::class, 'updateheader']);

        //Kotak
        Route::post('/dashboard/create/kotak', [DashboardController::class, 'storekotak']);
        Route::get('/dashboard/destroy/kotak/{id}', [DashboardController::class, 'destroykotak']);
        Route::get('/dashboard/edit/kotak/{id}', [DashboardController::class, 'editkotak']);
        Route::post('/dashboard/update/kotak/{id}', [DashboardController::class, 'updatekotak']);

        //Berita
        Route::get('/berita', [BeritaController::class, 'index']);
        Route::post('/berita/create/', [BeritaController::class, 'store']);
        Route::get('/berita/destroy/{id}', [BeritaController::class, 'destroy']);
        Route::get('/berita/edit/{id}', [BeritaController::class, 'edit']);
        Route::post('/berita/update/{id}', [BeritaController::class, 'update']);

        //Kategori Bertia
        Route::post('/berita/create/kategori', [BeritaController::class, 'storekategori']);
        Route::get('/berita/destroy/kategori/{id}', [BeritaController::class, 'destroykategori']);
        Route::get('/berita/edit/kategori/{id}', [BeritaController::class, 'editkategori']);
        Route::post('/berita/update/kategori/{id}', [BeritaController::class, 'updatekategori']);

        //Pengaturan
        // Route::get('/pengaturan', [PengaturanController::class, 'index']);
        // Route::put('/updatepassword', [PengaturanController::class, 'updatepassword'])->name('updatepassword');
    });
});
