<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;



class registerController extends Controller
{
    public function insertRegister(Request $request)
    {
        $validate = $request->validate([
            'username' => 'required|string|max:100',
            'email' => 'required|string|email|max:255|unique:users', // Thêm quy tắc xác nhận email và unique
            'password' => 'required|string|min:8',
        ]);

        $username = strip_tags($request->input('username'));
        $email = strip_tags($request->input('email'));
        $password = strip_tags($request->input('password'));

        $existingUsername = User::where('name', $username)->first();

        if ($existingUsername) {
            return redirect()->route('pageRegister')->with('Error1', true);
        }

        // Không cần kiểm tra $existingEmail nữa vì quy tắc 'unique' đã thực hiện kiểm tra đó
        $role = 'user';

        if (strlen($password) >= 8) {
            $user = new User();
            $user->name = $username;
            $user->password = bcrypt($password);
            $user->email = $email;
            $user->role = 'admin'; // Bạn có thể muốn sửa thành $role nếu đang sử dụng biến này
            $user->save();
            return redirect()->route('pageLogin')->with('success', true);
        } else {
            return redirect()->route('pageRegister')->with('Error3', true);
        }
    }

    public function login(Request $request)
    {
        // Kiểm tra dữ liệu đầu vào
        $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('name', 'password', 'role');

        if (Auth::attempt($credentials)) {
            // Authentication successful
            $user = Auth::user();
            // Kiểm tra tài khoản
            if ($user->role === 'admin') {
                // Redirect admin users to the 'addAddress' route
                return redirect()->route('collectmoney');
            } elseif ($user->role === 'user') {
                // Nếu người dùng có vai trò "user", chuyển hướng đến trang lỗi 400 (pageError400)
                return redirect()->route('pageError400');
            } else {
                // Xử lý trường hợp khác nếu cần
                dd($user->role);
            }
        }
        // Nếu đăng nhập không thành công, chuyển hướng trở lại trang đăng nhập với thông báo lỗi
        return redirect()->route('pageLogin')->with('login_failed', true);
    }

    public function logout()
    {
        Auth::logout(); // Log the user out
    
        return redirect()->route('pageLogin')->with('successLogout', true);
    }

    
    
}