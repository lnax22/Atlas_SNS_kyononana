<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Post;
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
    protected function edit(array $data)
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
        $image= $request->file('image');
        $validator=$this->validate($request,[
            'username'=> 'required|string|min:2,max:12',
            'mail'=> 'required|string|email:rfc,dns|min:5|max:40|unique:users,mail,'.Auth::user()->mail.',mail',
            'password'=> 'required|string|min:8|max:20|confirmed',
            'bio'=> 'string|max:150',
            'images'=> 'file|mines:jpg,png,bmp,gif,svg',
        ]);

        // dd($image);
        if($image !=null){//画像データがあるとき
            $file_name = $image->getClientOriginalName();//画像のnameだけを保存
            $image->storeAs('public',$file_name);//画像を保存、$imageに格納
            User::where('id', $id)->update(['images'=> $file_name]);
        } else {

        }
        $this->edit($data);//更新する

        return redirect('/top');
    }

    //他ユーザーのプロフィール
    public function otherProfile($id)
    {
        $user = User::where('id', $id)->first();
        $posts = Post::with("user")->where('user_id', $id)->get();
        //値が複数存在して、foreachを使って表示させる場合は、getやall。データが一つだけで、そのままbladeに「->カラム名」で表示させる場合はfirstを使う

        return view('users.otherProfile',['user'=> $user,'posts'=>$posts]);
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
            $users= User::where("id" , "!=" , Auth::user()->id)->paginate(10);
            // ログインユーザー以外のユーザーを全部持ってくる
        }

        return view('users.search',['users'=>$users,'keyword'=>$keyword]);
        // $request->session()->put('keyword',$data['keyword']);
        // search.blade.phpで使えるように定義

    }



}
