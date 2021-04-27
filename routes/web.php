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

Route::middleware(['admin'])->group(function(){
    Route::get('/home', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home');
    Route::get('/admin/dashboard', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('Dashboard');
    Route::get('/admin/reward', [App\Http\Controllers\Admin\RewardController::class, 'index'])->name('Reward');
    Route::get('/admin/profil', [App\Http\Controllers\Admin\ProfilController::class, 'index'])->name('Profil');

    Route::get('/admin/Registrasi', [App\Http\Controllers\Admin\RegisterConfirmController::class, 'index'])->name('RegisterConfirm');
    Route::get('/admin/RegistrasiGetData', [App\Http\Controllers\Admin\RegisterConfirmController::class, 'getDataUser'])->name('ApproveRegistrasiGetData');
    Route::get('/admin/RegistrasiGetDataAll', [App\Http\Controllers\Admin\RegisterConfirmController::class, 'getDataAll'])->name('ApproveRegistrasiGetDataAll');
    Route::post('/admin/RegistrasiConfirm', [App\Http\Controllers\Admin\RegisterConfirmController::class, 'edit'])->name('ApproveRegistrasiConfirm');
    Route::post('/admin/RegistrasiDelete', [App\Http\Controllers\Admin\RegisterConfirmController::class, 'deleteUser'])->name('ApproveRegistrasiDelete');

    Route::get('/admin/ApproveReward', [App\Http\Controllers\Admin\ApproveReward::class, 'index'])->name('ApproveReward');

    Route::get('/admin/ListShowroom', [App\Http\Controllers\Admin\ListShowroom::class, 'index'])->name('ListShowroom');
    Route::get('/admin/ListShowroomGetData', [App\Http\Controllers\Admin\ListShowroom::class, 'getData'])->name('ListShowroomGetData');
    Route::get('/admin/ListShowroomGetDataAll', [App\Http\Controllers\Admin\ListShowroom::class, 'getDataAll'])->name('ListShowroomGetDataAll');
    Route::get('/admin/ListShowroomSearch', [App\Http\Controllers\Admin\ListShowroom::class, 'getDataSearch'])->name('ListShowroomSearch');
    
    Route::get('/admin/ApproveTransaksi', [App\Http\Controllers\Admin\ApproveTransaksi::class, 'index'])->name('ApproveTransaksi');
    Route::get('/admin/ApproveTransaksiGetDataAll', [App\Http\Controllers\Admin\ApproveTransaksi::class, 'getDataAll'])->name('ApproveTransaksiGetDataAll');
    Route::get('/admin/ApproveTransaksiSearch', [App\Http\Controllers\Admin\ApproveTransaksi::class, 'getDataSearch'])->name('ApproveTransaksiSearch');
    Route::post('/admin/ApproveTransaksiConfirm', [App\Http\Controllers\Admin\ApproveTransaksi::class, 'edit'])->name('ApproveTransaksiConfirm');
    Route::post('/admin/ApproveTransaksiDelete', [App\Http\Controllers\Admin\ApproveTransaksi::class, 'delete'])->name('ApproveTransaksiDelete');

    Route::get('/admin/ApproveWithdraw', [App\Http\Controllers\Admin\ApproveWithdraw::class, 'index'])->name('ApproveWithdraw');
    Route::get('/admin/ApproveWithdrawGetDataAll', [App\Http\Controllers\Admin\ApproveWithdraw::class, 'getDataAll'])->name('ApproveWithdrawGetDataAll');
    Route::post('/admin/ApproveWithdrawConfirm', [App\Http\Controllers\Admin\ApproveWithdraw::class, 'edit'])->name('ApproveWithdrawConfirm');
    Route::post('/admin/ApproveWithdrawDelete', [App\Http\Controllers\Admin\ApproveWithdraw::class, 'delete'])->name('ApproveWithdrawDelete');

});

Route::middleware(['login'])->group(function(){
    Route::get('/dashboard', [App\Http\Controllers\User\Dashboard::class, 'index'])->name('DashboardUser');
});


