<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function UserProfile(Request $request)
    {
        $meta_keyword = '';
        $meta_description = 'Minh Ấn Computer - Chuyên Cung Cấp Server, Máy Tính Đồ Họa, PC Workstation, Linh Kiện Máy Tính, computer. Minh Ấn Computer Giao hàng trên toàn quốc, tư vấn tận tình, miễn phí.';
        $meta_url = $request->url();

        $user = User::where('id',Auth::user()->getAuthIdentifier())->get();
        return view('user.mainprofile',['title' => 'Thông tin người dùng', 'user' => $user[0]])
            ->with(compact('meta_keyword', 'meta_description', 'meta_url'));
    }

    public function ChangePassword(Request $request)
    {
        $meta_keyword = '';
        $meta_description = 'Minh Ấn Computer - Chuyên Cung Cấp Server, Máy Tính Đồ Họa, PC Workstation, Linh Kiện Máy Tính, computer. Minh Ấn Computer Giao hàng trên toàn quốc, tư vấn tận tình, miễn phí.';
        $meta_url = $request->url();

        return view('user.changepassword', ['title' => 'Đổi mật khẩu'])
            ->with(compact('meta_keyword', 'meta_description', 'meta_url'));
    }

    public function ProcessChangePassword(Request $request)
    {
        $request->validate([
           'old_password' => 'required|min:8',
            'new_password' => 'required|min:8',
            'new_passwordconfirm' => 'required|same:new_password'
        ]);

        $user = auth()->user();
        if(Hash::check($request->old_password, $user->password))
        {
            $user->update([
                'password' => bcrypt($request->new_password)
            ]);
            return redirect()->back()->with('success', 'Đổi mật khẩu thành công');
        }

        else {
            return back()->with('error', 'Mật khẩu cũ chưa chính xác');
        }
    }
}
