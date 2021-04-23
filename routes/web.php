<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['login'])->group(function(){
    Route::get('/home', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home');
    Route::get('/admin/dashboard', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('Dashboard');
    Route::get('/admin/reward', [App\Http\Controllers\Admin\RewardController::class, 'index'])->name('Reward');
    Route::get('/admin/profil', [App\Http\Controllers\Admin\ProfilController::class, 'index'])->name('Profil');

    Route::get('/admin/Registrasi', [App\Http\Controllers\Admin\RegisterConfirmController::class, 'index'])->name('RegisterConfirm');
    Route::get('/admin/RegistrasiGetData', [App\Http\Controllers\Admin\RegisterConfirmController::class, 'getDataUser'])->name('ApproveRegistrasiGetData');
    Route::get('/admin/RegistrasiGetDataAll', [App\Http\Controllers\Admin\RegisterConfirmController::class, 'getDataAll'])->name('ApproveRegistrasiGetDataAll');
    Route::post('/admin/RegistrasiConfirm', [App\Http\Controllers\Admin\RegisterConfirmController::class, 'edit'])->name('ApproveRegistrasiConfirm');
    Route::post('/admin/RegistrasiDelete', [App\Http\Controllers\Admin\RegisterConfirmController::class, 'deleteUser'])->name('ApproveRegistrasiDelete');

});


