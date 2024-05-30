<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\SiswaController;
use App\Http\Controllers\Api\BarangController;
// use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Api\BarangMasukController;
use App\Http\Controllers\Api\BarangKeluarController;
// use App\Http\Controllers\RegisterController;
// use App\Http\Controllers\LoginController;
// use App\Http\Controllers\SiswaController;
use App\Http\Controllers\Api\KategoriController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::apiResource('siswa',SiswaController::class);
Route::apiResource('barang',BarangController::class);
Route::apiResource('kategori',KategoriController::class);
Route::apiResource('barangmasuk',BarangMasukController::class);
Route::apiResource('barangkeluar',BarangKeluarController::class);