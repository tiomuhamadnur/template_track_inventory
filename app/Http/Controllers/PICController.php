<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PICController extends Controller
{
    public function index()
    {
        return view('pic.index');
    }

    public function create()
    {
        return view('pic.create');
    }

    public function profile()
    {
        return view('profile.index');
    }

    public function update()
    {
        return view('profile.update');
    }

    public function changepass()
    {
        return view('profile.changepass');
    }

    public function update_photo(Request $request)
    {
        $this->validate($request, [
            'photo' => ['image'],
        ], [
            'photo.image' => 'File harus dalam format gambar/photo!'
        ]);
        $id = auth()->user()->id;
        if ($request->hasFile('photo') && $request->photo != '') {
            $photo_profil = $request->file('photo')->store('photo-profil/' . auth()->user()->role);
            $user = Pegawai::findOrFail($id);
            $user->update([
                "photo" => $photo_profil,
            ]);
            return redirect()->route('profile');
        } else {
            return back();
        }
    }

    public function update_password(Request $request)
    {
        $id = auth()->user()->id;

        $user = Pegawai::findOrFail($id);
        $old_password = $user->password;
        $cek = Hash::check($request->old_password, $old_password);
        if($cek) {
            if ($request->new_password == $request->confirm_new_password){
                $user->update([
                    'password' => Hash::make($request->new_password),
                ]);
                return redirect()->route('logout');
            } else {
                return back()->withStatus('New password berbeda!');
            }
        } else {
            return back()->withStatus('Old password salah!');
        }
    }

    public function edit($id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}