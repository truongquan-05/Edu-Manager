<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NguoiDung;

class SignInController extends Controller
{
    public function index()
    {
        return view('admin.pages.signIn');
    }

    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $nguoiDung = NguoiDung::where('email', $email)->where('mat_khau', $password)->first();

        if ($nguoiDung) {
            // Lưu thông tin người dùng vào session
            $request->session()->put('nguoi_dung', [
                'id' => $nguoiDung->id,
                'ho_ten' => $nguoiDung->ho_ten,
                'email' => $nguoiDung->email,
                'vai_tro_id' => $nguoiDung->vai_tro_id,
            ]);

            // Thêm thông báo đăng nhập thành công
            $request->session()->flash('message', 'Đăng nhập thành công!');

            return redirect()->route('admin.index');
        }

        // Thêm thông báo đăng nhập thất bại
        return back()->withErrors([
            'email' => 'Email hoặc mật khẩu không đúng.',
        ])->with('error', 'Đăng nhập thất bại. Vui lòng kiểm tra lại thông tin.');
    }

    public function logout(Request $request)
    {
        $request->session()->forget('nguoi_dung');
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
