<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    public function getLogin(){
        return view('auth.login');
    }
    public function postLogin(Request $request){
        $credentials = $request->only('email','password');
        if(\Auth::attempt($credentials)){
            return redirect()->route('home');
        }
    }
    public function getLogout(){
        \Auth::logout();
        return redirect()->route('home');
    }
}
