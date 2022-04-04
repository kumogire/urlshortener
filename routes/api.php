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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
use App\Http\Controllers\ShortenedUrlController;
Route::post('/shortenedurl/create',[ShortenedUrlController::class, 'store']);
Route::get('/shortenedurl/edit/{id}',[ShortenedUrlController::class, 'edit']);
Route::post('/shortenedurl/update/{id}',[ShortenedUrlController::class, 'update']);
Route::delete('/shortenedurl/delete/{id}',[ShortenedUrlController::class, 'delete']);
Route::get('/shortenedurls',[ShortenedUrlController::class, 'index']);
