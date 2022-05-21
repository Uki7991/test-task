<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'v1'], function () {
    Route::get('/locations', [\App\Http\Controllers\API\v1\LocationController::class, 'index']);
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/calculate/{location}', [\App\Http\Controllers\API\v1\BlockController::class, 'calculate']);
        Route::post('/book/{location}', [\App\Http\Controllers\API\v1\BlockController::class, 'book']);
        Route::get('/unbook', [\App\Http\Controllers\API\v1\BlockController::class, 'unbook']);
        Route::get('/my/bookings', [\App\Http\Controllers\API\v1\BookController::class, 'myBookings']);
    });
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
