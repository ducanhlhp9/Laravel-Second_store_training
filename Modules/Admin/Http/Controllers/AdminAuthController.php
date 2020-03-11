<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function getLogin()
    {
        return view('admin::auth.login');
    }
    public function postLogin(Request $request){
        $data = $request->only('email', 'password');
        if (Auth::guard('admins')->attempt($data)) {
            return redirect()->route('Admin');
        }
            return redirect()->back();
    }


}
