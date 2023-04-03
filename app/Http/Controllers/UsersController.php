<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Validator;


class UsersController extends Controller
{
    //auth認証
    public function __construct()
    {
        $this->middleware('auth');
    }

    //プロフィール編集表示
    public function profile(Request $request)
    {
        $user=Auth::user();

        return view('users.profile',['user'=> $user]);
    }

    //プロフィール更新
    protected function update(array $data)
    {
        $id=Auth::id();
        return User::where('id', $id)->update([
            'username'=> $data['username'],
            'mail'=> $data['mail'],
            'bio'=> $data['bio'],
            'password'=> bcrypt($data['password']),
        ]);
    }

    public function profileUpdate(Request $request)
    {
        $id=Auth::id();
        $data = $request->input();
        dd($request);
        if(($request['image']) !=null){//画像データがあるとき
            $file_name = $request->file('image')->getClientOriginalName();
            User::where('id', $id)->update([
            $request->file('image')->storeAs('public',$file_name)
            ]);
        } else {

        }

        //バリデーション処理
        $request->validate([
            'username'=> 'required|string|max:255',
            'mail'=> 'required|string|email|max:255|unique:users',
            'password'=> 'required|string|min:4|confirmed',
            'bio'=> 'required|string|max:150',
            'images'=> 'image|mimes:jpg,png,gif',
        ]);

        $this->update($data);//更新する

        return redirect('/top');
    }



    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        // dd($keyword);

        if (!empty($keyword)) {
            //もしキーワードが空ではない場合は
            $users = User::where('username', 'LIKE' , "%".$keyword."%")->get();
        }
        else{
            $users=User::all();
            // ユーザー情報を全部持ってくる
        }

        return view('users.search',['users'=>$users,'keyword'=>$keyword]);
        // $request->session()->put('keyword',$data['keyword']);
        // search.blade.phpで使えるように定義

    }



}
