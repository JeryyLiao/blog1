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

Route::apiResource('posts', 'App\Http\Controllers\Api\PostController');

Route::any('pass', 'App\Http\Controllers\Api\PostController@doany');

Route::post('items', 'App\Http\Controllers\Api\ItemController@store');
Route::post('articles', 'App\Http\Controllers\Api\ArticleController@store');
Route::resource('/articles', 'App\Http\Controllers\ArticleController');

//
//Route::

//Route::apiResource('posts', 'App\Controllers\Api\PostController');