<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\siswaController;
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

Route::get('/siswa', [siswaController::class, 'index']);
Route::post('/siswa/create', [siswaController::class, 'create']);
Route::get('/siswa/{id}/edit', [siswaController::class, 'edit']);
Route::post('/siswa/{id}/update', [siswaController::class, 'update']);
Route::get('/siswa/{id}/delete', [siswaController::class, 'delete']);
