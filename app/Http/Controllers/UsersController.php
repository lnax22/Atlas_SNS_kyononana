<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Validator;
// use Illuminate\Validation\Rule;
// use App\Models\User;
// use App\Models\Tweet;
// use App\Models\Follower;

class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }
    public function search(){
        return view('users.search');
    }

    public function search(Request $request){
        $keyword = $request->input('keyword', '');

        $posts = Post::where('title', 'LIKE' , "%{$keyword}%")->get()->all();

        // ページ更新時にクエリパラメータが消えないようにkeywordも渡す
        $params = array('posts'   => $posts,'keyword' => $keyword);
        // return view('/search', $params);

    }
}
