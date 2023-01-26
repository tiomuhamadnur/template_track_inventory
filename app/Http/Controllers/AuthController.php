<?php

namespace App\Http\Controllers;

use App\Http\Request\LoginRequest;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function loginView()
    {
        // return view('login.main', [
        //     'layout' => 'login'
        // ]);
        return view('login.login');
    }

    public function login(LoginRequest $request)
    {
        if (!\Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            throw new \Exception('Wrong email or password.');
        } else {
            return redirect()->route('home');
        }
    }

    public function logout()
    {
        \Auth::logout();
        return redirect('login');
    }
}