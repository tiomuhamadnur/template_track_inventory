<?php

namespace App\Http\Controllers;

use App\Http\Request\LoginRequest;
use App\Models\Ban;
use App\Models\Section;
use App\Models\User;

class AuthController extends Controller
{
    public function index()
    {
        return redirect()->route('transisi');
    }

    public function loginView()
    {
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
            $user = User::findOrFail(auth()->user()->id);
            $user_banned = $user->isBanned();
            if ($user_banned) {
                \Auth::logout();
                return redirect('login')->withStatus('Your account have been banned!');
            }
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
        // return view('transisi.transisi');

        $section = Section::where('name', auth()->user()->section)->first()->id;
        if ($section == 1 or $section == 2){
            return view('transisi.transisi');
        }
        elseif ($section == 3 or $section == 4){
            return view('transisi.transisi_civil.transisi');
        }
    }

    public function transisi_user()
    {
        // return view('transisi.transisi_user');

        $section = Section::where('name', auth()->user()->section)->first()->id;
        if ($section == 1 or $section == 2){
            return view('transisi.transisi_user');
        }
        elseif ($section == 3 or $section == 4){
            return view('transisi.transisi_civil.transisi_user');
        }
    }
}