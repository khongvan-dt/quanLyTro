<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
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
        $existingEmail = User::where('email', $email)->first(); // Use 'email' field
        if ($existingUsername) {
            return redirect()->route('pageRegister')->with('Error1', true);
        }
        if ($existingEmail) {
            return redirect()->route('pageRegister')->with('Error2', true);
        }
        if (strlen($password) >= 8) {
            $user = new User();
            $user->name = $username;
            $user->password = bcrypt($password);
            $user->email = $email;
            $user->role = 'user';
            $user->save();
            return redirect()->route('pageRegister')->with('success', true);
        } else {
            return redirect()->route('pageRegister')->with('Error3', true);
        }
    }
    
}
