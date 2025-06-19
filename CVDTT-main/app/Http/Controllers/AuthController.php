<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login'); // hoặc 'auth.login' nếu bạn để trong thư mục auth
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $email = $request->email;
        $password = $request->password;

        if ($email === 'kiet@gmail.com' && $password === '12345678') {
            return redirect()->route('home');
        } elseif ($email === 'user@gmail.com' && $password === '12345678') {
            return redirect()->route('Trangchu.index');
        } else {
            return back()->withErrors([
                'login' => 'Email hoặc mật khẩu không đúng!',
            ])->withInput();
        }
    }
}
