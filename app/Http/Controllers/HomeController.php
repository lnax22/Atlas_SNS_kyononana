<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // HomeController.phpにはmiddleware(ミドルウェア)でauthが設定されているためです。このmiddlewareのauth設定により、HomeControllerを経由して行われる処理はすべて認証によるアクセスの制限が行われます。
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
        // if(Auth::check()){
            // $user=Auth::user();
            // $username=$user->name;
            // return Var_dump($username);
        // }

    public function logout(Request $request)
    {
        $this->guard()->logout();$request->session()->invalidate();
        return $this->loggedOut($request) ?: redirect('/login');
    }
}
