<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\siswaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
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
    return view('home');
});

Route::get('/login', [AuthController::class, 'login' ])->name('login');
Route::post('/postlogin',[AuthController::class, 'postlogin' ]);
Route::get('/logout',[AuthController::class, 'logout' ]);


Route::group(['middleware' => ['auth','checkRole:admin']], function() {
    Route::get('/siswa', [siswaController::class, 'index']);
    Route::post('/siswa/create', [siswaController::class, 'create']);
    Route::get('/siswa/{id}/edit', [siswaController::class, 'edit']);
    Route::post('/siswa/{id}/update', [siswaController::class, 'update']);
    Route::get('/siswa/{id}/delete', [siswaController::class, 'delete']);
    Route::get('/siswa/{id}/profile', [siswaController::class, 'profile']);

});

Route::group(['middleware' => ['auth','checkRole:admin,siswa']], function() {
    Route::get('/dashboard', [DashboardController::class, 'index']);
});
    