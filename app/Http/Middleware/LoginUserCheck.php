<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginUserCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //ログインユーザーIDを取得
         if(Auth::check()){
            return $next($request);
        }else{
             //ログイン者とカート情報作成者が一致しなければ別のページにリダイレクト
            return redirect(route('login'));
        }

        //チェックに合格し次の処理に進むことができる
        return $next($request);
    }
}
