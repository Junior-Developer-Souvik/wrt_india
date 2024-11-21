<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login(){
        // return view('front.login');
    }
    public function register(){
        return view('front.register');
    }
}
