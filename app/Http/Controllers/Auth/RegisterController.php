<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;
    public function getRegister(){
        return view('auth.register');
    }
    public function postRegister(Request $request ){
        $user = new User();
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->phone    = $request->phone;
        $user->address  = $request->address;
        $user->password = bcrypt($request->password);
        $user->re_password = bcrypt($request->re_password);
        $user->save();

        if($user->id){
         return redirect()->route('get.login');
    }
        return redirect()->back;
}
}
