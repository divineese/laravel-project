<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\ViewingController;

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

// Property Routes
Route::prefix('properties')->group(function () {
    Route::get('/', [PropertyController::class, 'index']);
    Route::post('/', [PropertyController::class, 'store']);
    Route::get('/{property}', [PropertyController::class, 'show']);
    Route::put('/{property}', [PropertyController::class, 'update']);
    Route::delete('/{property}', [PropertyController::class, 'destroy']);
});

// Viewing Routes
Route::prefix('viewings')->group(function () {
    Route::post('/', [ViewingController::class, 'schedule']);
    Route::get('/{viewing}', [ViewingController::class, 'show']);
    Route::delete('/{viewing}', [ViewingController::class, 'cancel']);
});
