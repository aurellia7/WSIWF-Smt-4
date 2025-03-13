<?php

use App\Http\Controllers\ApiPendidikanController;
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

// Route::get('/pendidikan', [ApiPendidikanController::class, 'getAll']);

Route::get('pendidikan', [ApiPendidikanController::class, 'getAll']);
 Route::get('pendidikan/{id}', [ApiPendidikanController::class, 'getPen']);
 Route::post('pendidikan', [ApiPendidikanController::class, 'createPen']);
 Route::put('pendidikan/{id}', [ApiPendidikanController::class, 'updatePen']);
 Route::delete('pendidikan/{id}', [ApiPendidikanController::class, 'deletePen']);