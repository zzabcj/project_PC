<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{

    public function Login()
    {
        return view('admin.sign-in');
    }

    public function processLogin(Request $request)
    {
        if($request->input('username') == 'quantrivien')
        {
            if(Hash::check($request->input('password'), bcrypt('MinhAnComputer@')))
            {
                Session::put('role', 'admin');
                return redirect()->route('admin.dashboard');
            }
            return redirect()->back();
        }
        return redirect()->back();
    }
}
