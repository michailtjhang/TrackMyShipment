<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\KurirController;
use App\Http\Controllers\Api\LacakController;
use App\Http\Controllers\Api\LayananController;
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

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/layanan', [LayananController::class, 'index']);
    Route::get('/layanan/{id}', [LayananController::class, 'show']);
    Route::post('/layanan-create', [LayananController::class, 'store']);
    Route::post('/layanan/{id}', [LayananController::class, 'update']);
    Route::delete('/layanan/{id}', [LayananController::class, 'destory']);

    Route::get('/kurir', [KurirController::class, 'index']);
    Route::get('/kurir/{id}', [KurirController::class, 'show']);
    Route::post('/kurir-create', [KurirController::class, 'store']);
    Route::post('/kurir/{id}', [KurirController::class, 'update']);
    Route::delete('/kurir/{id}', [KurirController::class, 'destory']);
});

Route::get('/lacak', [LacakController::class, 'index']);
