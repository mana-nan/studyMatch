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

//左 に〜〜メソッドでアクセスしたら、右のcontrollerの@アクションに割り当てる
Route::group (['prefix' => 'mypage', 'middleware' => 'auth'], function() {
    Route::get ('create', 'MypageController@add');
    Route::post('create', 'MypageController@create');
    Route::get ('index','MypageController@index');
    Route::get('edit','MypageController@edit');
    Route::post('edit','MypageController@update');
});

Route::group (['prefix' => 'article', 'middleware' => 'auth'], function() {
    //投稿画面アクセス時
    Route::get ('create', 'ArticleController@add');
    //投稿フォーム送信時
    Route::post('create', 'ArticleController@create');
    //投稿詳細画面
    Route::get('index/{id}', 'ArticleController@index');
    Route::get('edit/{id}', 'ArticleController@edit');
    Route::post('edit', 'ArticleController@update');
    Route::get('delete', 'ArticleController@delete');
});

Route::get('timeline/index','TimelineController@index');




Auth::routes();

Route::get('/top', function () {
    return view('top'); 
}) -> name('top');

Route::get('/home', function() {
    return view('home');
}) -> name('home');
