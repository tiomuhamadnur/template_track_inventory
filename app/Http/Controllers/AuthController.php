<?php

namespace App\Http\Controllers;

use App\Http\Request\LoginRequest;

class AuthController extends Controller
{
    public function index()
    {
        return redirect()->route('transisi');
    }

    public function loginView()
    {
        // return view('login.main', [
        //     'layout' => 'login'
        // ]);
        return view('login.login');
    }

    public function login(LoginRequest $request)
    {
        if (! \Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            return back()->withStatus('Wrong email or password.');
        } else {
            return redirect()->route('transisi');
        }
    }

    public function logout()
    {
        \Auth::logout();

        return redirect('login');
    }

    public function transisi()
    {
        return view('transisi.transisi');
    }

    public function transisi_user()
    {
        return view('transisi.transisi_user');
    }
}
