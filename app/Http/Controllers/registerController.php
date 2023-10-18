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
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);
        $username = $request->input('username');
        $email = $request->input('email');
        $password = $request->input('password');
        $existingUsername = User::where('name', $username)->first();
        $existingEmail = User::where('email', $email)->first(); 
        if ($existingUsername) {
            return redirect()->route('pageRegister')->with('Error1', true);
        }
        if ($existingEmail) {
            return redirect()->route('pageRegister')->with('Error2', true);
        }
        $role='user';
        if (strlen($password) >= 8) {
          
            $user = new User();
            $user->name = $username;
            $user->password = bcrypt($password);
            $user->email = $email;
            $user->role = 'user';
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
   
    $credentials = $request->only('name', 'password');

    if (Auth::attempt($credentials)) {
        // Authentication successful
        $user = Auth::user();

        // Kiểm tra tài khoản
        if ($user->role === 'admin') {
            // Redirect admin users to the 'ecomProductList' route
            return redirect()->route('ecomProductList');
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

    
}