<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */

     protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'mail' => $data['mail'],
            'password' => bcrypt($data['password']),
        ]);
    }

    // public function registerForm(){
    //     return view("auth.register");
    // }

    //$requestの中にデータが入っている
    public function register(Request $request){
        if($request->isMethod('post')){
            $data = $request->input();
            $rules = [
                'username' => 'required|string|min:2,max:12',
                'mail' => 'required|string|email:rfc,dns|min:5|max:40|unique:users',
                'password' => 'required|string|min:8|max:20|alpha_num|confirmed',
            ];

            $validator = Validator::make($data,$rules);
            if($validator->fails()){
                 return redirect('/register')
                    ->withErrors($validator)// Validatorインスタンスの値を$errorsへ保存
                    ->withInput();// 送信されたフォームの値をInput::old()へ引き継ぐ
            }

            $this->create($data);
            // セッションの記述
            // $リクエストオブジェクト -> セッションインスタンス -> put('取得したいキー', $data['表示させたいデータ'])
            $request->session()->put('username',$data['username']);
            return redirect('added');
        }

        return view('auth.register');
    }

    public function added(Request $request){
        return view('auth.added');
    }
}
