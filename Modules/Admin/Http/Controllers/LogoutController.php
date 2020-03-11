<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class LogoutController extends Controller
{
    use AuthenticatesUsers;
    public function getLogout(){
        \Auth::logout();
        return redirect()->route('admin.login');
    }
}
