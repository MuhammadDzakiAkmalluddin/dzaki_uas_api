<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// Import Controller Anda agar tidak error "Class not found"
use App\Http\Controllers\Api\BencanaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// GANTI Route::resource MENJADI Route::apiResource
Route::apiResource('bencana', BencanaController::class);