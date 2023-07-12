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
// });;

//Route::get or post('どのURLの時に','PostsController@何の記述の処理が行われるか');
//aタグ->get,formタグ->postがわかりやすい

//ミドルウェア
// コントローラーが処理を実行する前に認証などの処理を行いたい場合はミドルウェアを使う→特定のユーザーのみがページを見れるようにする
Route::get('/login', 'Auth\LoginController@login')-> name('login');

//ログイン
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');

//ログアウト
Route::get('/logout','Auth\LoginController@logout');

//新規登録
Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register','Auth\RegisterController@register');

//登録完了画面
Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');


//トップページ
Route::get('/top','PostsController@index');
Route::post('/top','PostsController@index');

// プロフィール編集
Route::get('/profile','UsersController@profile');
Route::post('/profile','UsersController@profile');

//他ユーザーのプロフィール表示
Route::get('/profile/{id}/other','UsersController@otherProfile');

//プロフィール更新
Route::get('/profile/update','UsersController@profileUpdate');
Route::post('/profile/update','UsersController@profileUpdate');

// 検索
Route::get('/search','UsersController@search');

// フォローリスト
Route::get('/followList', 'FollowsController@followList');
// フォロワーリスト
Route::get('/followerList','FollowsController@followerList');

// 投稿画面の表示
Route::get('/posts', 'PostsController@index');
// 投稿処理
Route::post('/posts', 'PostsController@store');
// 投稿削除
Route::get('/posts/{id}/delete','PostsController@delete');
// 投稿編集
Route::post('/update', 'PostsController@update');

// フォローする
Route::get('/users/{id}/Follow','FollowsController@Follow');
// フォロー解除
Route::get('/users/{id}/unFollow','FollowsController@unFollow');
