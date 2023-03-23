<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Validator;


class UsersController extends Controller
{
    public function profile(Request $request)
    {
        //バリデーション処理
        $request->validate([
            'name'=> 'required|string|max:255',
            'mail'=> 'required|string|email|max:255|unique:users',
            'password'=> 'required|string|min:4|confirmed',
            'bio'=> 'required|string|max:150',
            'image'=> 'image|mimes:jpg,png,gif',
        ]);

        $id=Auth::id();
        $username=$request->input('username');
        $mail=$request->input('mail');
        $password=$request->input('password');
        $bio=$request->input('bio');
        $image=$request->file('iconImage')->getClientOriginalName();


        if($image !=null){//画像データがあるとき
            $image->store('public/images');
            \DB::table('users')
               ->where('id',$id)
               ->update([
                'images'=>basename($image),
               ]);
        }

        return view('users.profile',);
    }
// 'username'=>$username,
// 'mail'=>$mail,
// 'password'=>bcrypt($request['password']),
//  'bio'=>$bio,

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
