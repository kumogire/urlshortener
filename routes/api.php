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

Route::post('/shortenedurl/create', 'ShortenedUrlController@store');
Route::get('/shortenedurl/edit/{id}', 'ShortenedUrlControllerr@edit');
Route::post('/shortenedurl/update/{id}', 'ShortenedUrlController@update');
Route::delete('/shortenedurl/delete/{id}', 'ShortenedUrlController@delete');
Route::get('/shortenedurls', 'ShortenedUrlController@index');
