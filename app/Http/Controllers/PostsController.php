<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Auth;
use Validator;

class PostsController extends Controller
{
    public function index()
    {
        return view('posts.index');
    }
 //「php artisan」コマンドで取り入れたユーザー認証機能群である「auth認証」を適用
    // public function __construct()
    // {
        // $this->middleware('auth');
    // }
}
