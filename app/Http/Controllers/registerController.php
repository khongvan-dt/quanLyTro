<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
class registerController extends Controller
{
    public function insertRegister(Request $request)
    {
        // $validate = $request->validate([
        //     'username' => 'required|string|max:100',
        //     'email' => 'required|string|email|max:255',
        //     'password' => 'required|string|min:8',
        // ]);
        $username = $request->input('username');
        $email = $request->input('email');
        $password = $request->input('password');
        $existingUsername = User::where('name', $username)->first();
        $existingEmail = User::where('email', $email)->first(); 
        if ($existingUsername) {
            return redirect()->back()->with('error', 'Username already exists.');
        }elseif($existingEmail) {
            return redirect()->back()->with('error', 'Email already exists.');
        }elseif(strlen($password) >= 8) {
            $user = new User();
            $user->name = $username;
            $user->password = bcrypt($password);
            $user->email = $email;
            $user->role = 'user';
            $user->save();
            return redirect()->route('success')->with('success', 'Registration successful.');
        } else {
            return redirect()->back()->with('error', 'Password must be at least 8 characters.');
        }
    }
    
}
