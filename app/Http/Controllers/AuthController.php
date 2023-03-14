<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function Login(Request $request){
        $meta_keyword = '';
        $meta_description = 'Minh Ấn Computer - Chuyên Cung Cấp Server, Máy Tính Đồ Họa, PC Workstation, Linh Kiện Máy Tính, computer. Minh Ấn Computer Giao hàng trên toàn quốc, tư vấn tận tình, miễn phí.';
        $meta_url = $request->url();
        return view('auth.login', ['title' => 'Đăng nhập hệ thống'])
            ->with(compact('meta_keyword', 'meta_description', 'meta_url'));
    }

    public function Register(Request $request){
        $meta_keyword = '';
        $meta_description = 'Minh Ấn Computer - Chuyên Cung Cấp Server, Máy Tính Đồ Họa, PC Workstation, Linh Kiện Máy Tính, computer. Minh Ấn Computer Giao hàng trên toàn quốc, tư vấn tận tình, miễn phí.';
        $meta_url = $request->url();
        return view('auth.register', ['title' => 'Đăng ký hệ thống'])
            ->with(compact('meta_keyword', 'meta_description', 'meta_url'));
    }

    public function LoginUser(LoginRequest $request){
        $user = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if(Auth::attempt($user)){
            return redirect()->route('home');
        } else {
            return back()->with('fail', 'Tài khoản hoặc mật khẩu không chính xác');
        }
    }

    public function RegisterUser(RegisterRequest $request){
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        return redirect()->route('login')->with('success', 'Đăng ký thành công!');
    }

    public function Logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }

}
