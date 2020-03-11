<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Routing\Controller;

class AdminUserController extends Controller
{

    public function index()
    {
        $users = User::all();
        $viewData=[
            'users'=>$users
        ];
        return view('admin::users.index',$viewData);
    }
    public function action($action, $id)
    {
        if ($action) {
            $user = User::find($id);
            switch ($action) {
                case 'delete':
                    $user->delete();
                    break;
            }
        }
        return redirect()->back();
    }
}
