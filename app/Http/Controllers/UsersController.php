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
}
