<?php

use App\Models\Article;
use App\Models\Cgy;
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

Route::resource('/articles', 'App\Http\Controllers\ArticleController');

//測試在Web中新增一筆資料(要在網址中輸入"http://web111b.com:6080/blog/public/newcgy"畫面空白,才會輸入一筆資料)
//之後再"http://phpmyadmin.com:6080/index.php?route=/sql&db=blog&table=cgies&pos=0"中的blog資料才會看到新增資料進入資料庫
Route::get('/newcgy', function () {

    //方法一:
    //物件使用指令
    // $cgy = new Cgy;
    // $cgy -> title = '哥布林的英雄學院';
    // $cgy -> desc = '哥布林學院劇場版';
    // $cgy -> enabled = true;

    //方法二:
    $cgy = new Cgy(['title' => '哥布林的英雄學院', 'desc' => '哥布林學院劇場版2', 'enabled' => true]);
    //此指令要有才會執行
    $cgy->save();
});

Route::resource('cgies', 'App\Http\Controllers\CgyController');
Route::resource('articles', 'App\Http\Controllers\ArticleController');

Route::get('/distinc', function () {
    $data = Article::select(['id', 'subject', 'cgy_id'])->distinct('cgy_id')->get();
    return $data;
});

Route::get('/pluck', function () {
    //$data = Cgy::select(['id','title'])->get();
    $data = Cgy::pluck('title', 'id');
    return $data;
});
//視作刪除第一筆資料
Route::get('/del/{id}', function ($id) {
    $cgies = Cgy::find($id);
    $cgies->delete();
    //Cgy::destroy(1);
    Cgy::destroy([1 - 10]);
});

Route::get('/', function () {
    return view('welcome');
});
Route::get('/relation', function () {
    /*一對一的示範語法
    $article =Article::find(10);
    dd($article->cgy->subject);*/
    //一對多的示範語法
    $cgy = Cgy::find(1);
    dd($cgy->articles()->where('enabled', 1)->get());

});
Route::get('/changerelation', function () {
    // $article=Article::find(1);
    //第136語法與第138和139執行結果是相同的
    //$article->cgy_id =5;
    //第136語法與第138和139執行結果是相同的
    //$cgy_4=Cgy::find(4);
    //$article->cgy()->associate($cgy_4);
    //$article->save();
    //dd($article);
    $cgy = Cgy::find(1);
    $article = Article::where('cgy_id', 5)->first();
    $cgy->articles()->save($article);
    //加上第151行是因為要使變更的第148行能夠執行到但不是指執行第一筆資料(第147行)
    dd(Article::find($article->id));

});