<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/users')->group(function () {
    Route::get('{id?}', 'App\Http\Controllers\UserController@show');
    Route::get('/', 'App\Http\Controllers\UserController@show2');
});

//Route::get('/users/{id}','App\Http\Controllers\UserController@show');

Route::get('/posts/{post}/comments/{comment}', function ($post, $comment) {
    return "posts $post , comments $comment";
});

// Route::get('/game',function(){
//     return view('game1');
// });

// Route::view('/game2','game2');

Route::namespace ('App\Http\Controllers')->group(function () {
    Route::get('pics', 'SiteController@gallery');
    Route::get('game/{id}', 'SiteController@play');
    Route::get('dash', 'SiteController@dashboard');
    Route::get('/hello', 'SiteController@hello');
    Route::get('pict', 'SiteController@picture');
    Route::get('demo', 'SiteController@demo');
    Route::get('lov', 'SiteController@love');
    Route::get('spir', 'SiteController@spiral');
});

Route::get('paint', function () {
    return view('paint');
});

Route::middleware(['auth'])->group(function () {

});

Route::resource('posts', 'App\Http\Controllers\PostController');

Route::get('paint', function () {
    return view('paint');
    //方法二需增加->name('mypaint')
})->name('mypaint');

Route::middleware(['auth'])->group(function () {

});

Route::post('posts', 'App\Http\Controllers\PostController@store');
Route::post('items', 'App\Http\Controllers\ItemController@store');

Route::get('/url', function () {
    //方法ㄧ
    //return url('paint');
    //方法二
    //return route('mypaint');
    //return action([SiteController::class, 'demo']);
    // return url()->full()
});

//routes/web.php
Route::resource('items', 'App\Http\Controllers\ItemController');
Route::resource('posts', 'App\Http\Controllers\Postcontroller');
Route::post('articles', 'App\Http\Controllers\ArticleController@stroe');
