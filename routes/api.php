<?php

use App\Http\Controllers\Api\BarangController;
use App\Http\Controllers\Api\PelangganController;
use App\Http\Controllers\Api\PemasokController;
use App\Http\Controllers\Api\PenjualanController;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::get('pemasok', [PemasokController::class, 'index']);

// Route::get('pemasok/{id_pemasok}', [PemasokController::class, 'show']);

// Route::post('pemasok', [PemasokController::class, 'store']);

// Route::put('pemasok/{id_pemasok}', [PemasokController::class, 'update']);

// Route::delete('pemasok/{id_pemasok}', [PemasokController::class, 'destroy']);

Route::apiResource('pemasok',PemasokController::class);
Route::apiResource('pelanggan',PelangganController::class);
Route::apiResource('barang',BarangController::class);
Route::apiResource('penjualan',PenjualanController::class);