<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/home', 'HomeController@index')->name('home');

// $options変数としてauthメソッドに渡される引数を設定することでRegisterルートやPassword Resetルートをルーティングに登録させないことができます。
//Auth::routes();


//Route::get or post('どのURLの時に','PostsController@何の記述の処理が行われるか');
//ログアウト中のページ
//ログイン
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');

//ログアウト
Route::get('/logout','Auth\LoginController@logout');

//新規登録
Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register','Auth\RegisterController@register');

//完了画面
Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');

//ログイン中のページ
Route::get('/top','PostsController@index');

Route::get('/profile','UsersController@profile');

Route::get('/search','UsersController@index');

Route::get('/follow-list','PostsController@index');
Route::get('/follower-list','PostsController@index');

//投稿画面の表示
// Route::get('post/{id}/index', 'PostsController@index');

//投稿処理
// Route::post('posts', 'PostsController@store');
