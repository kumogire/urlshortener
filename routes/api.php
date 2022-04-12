<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShortenedUrlController;
use App\Http\Middleware\CheckApiToken;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['checkapitoken'])->group(function () {
    Route::post('/shortenedurl/create', [ShortenedUrlController::class, 'store']);
    Route::delete('/shortenedurl/delete/{id}', [ShortenedUrlController::class, 'delete']);
    Route::get('/shortenedurls', [ShortenedUrlController::class, 'index']);
});
