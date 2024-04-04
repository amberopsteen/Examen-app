<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

//        If the credentials are correct, then it checks what role the user has.
//        If the user is a admin, it goes to users dashboard. Else the user goes to the tasks dashboard.
//        If the credentials are incorrect, then user gets a message with invalid credentials.
        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->role === 'admin') {
                return redirect()->intended('/users');
            } else {
                return redirect()->intended('/tasks');
            }
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
