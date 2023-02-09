<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $user = Pegawai::all();
        return view('user.index', compact(['user']));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'photo' => ['image'],
        ], [
            'photo.image' => 'File harus dalam format gambar/photo!'
        ]);

        if ($request->hasFile('photo') && $request->photo != '') {
            $cek = Pegawai::where('email', $request->email)->get();
            if ($cek->count() == 0) {
                $photo_profil = $request->file('photo')->store('photo-profil/' . $request->role);
                Pegawai::create([
                    "name" => $request->name,
                    "email" => $request->email,
                    "password" => Hash::make('user123'),
                    "jabatan" => $request->jabatan,
                    "section" => $request->section,
                    "departement" => $request->departement,
                    "role" => $request->role,
                    "photo" => $photo_profil,
                ]);
                return redirect()->route('usermanage.index');
            } else {
                return back();
            }
        } else {
            Pegawai::create([
                "name" => $request->name,
                "email" => $request->email,
                "password" => Hash::make('user123'),
                "jabatan" => $request->jabatan,
                "section" => $request->section,
                "departement" => $request->departement,
                "role" => $request->role,
            ]);
            return redirect()->route('usermanage.index');
        }
    }

    public function reset_password(Request $request)
    {
        $id = $request->id;
        $user = Pegawai::findOrFail($id);
        if ($user){
            $user->update([
                "password" => Hash::make('user123'),
            ]);
            return redirect()->route('usermanage.index');
        } else {
            return redirect()->route('usermanage.index');
        }
    }

    public function edit($id)
    {
        try {
            $secret = Crypt::decryptString($id);
            $user = Pegawai::findOrFail($secret);
            if ($user){
                return view('user.update', compact(['user']));
            } else {
                return redirect()->back();
            }
        } catch (DecryptException $e) {
            return redirect()->back();
        }
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'photo' => ['file', 'image'],
        ], [
            'photo.image' => 'File harus dalam format gambar/photo!'
        ]);

        if ($request->hasFile('photo') && $request->photo != '') {
            $cek = Pegawai::findOrFail($request->id);
            if ($cek->count() != 0) {
                $photo_profil = $request->file('photo')->store('photo-profil/' . $request->role);
                $cek->update([
                    "name" => $request->name,
                    "email" => $request->email,
                    "jabatan" => $request->jabatan,
                    "section" => $request->section,
                    "departement" => $request->departement,
                    "role" => $request->role,
                    "photo" => $photo_profil,
                ]);
                return back();
            } else {
                return back();
            }
        } else {
            $cek = Pegawai::findOrFail($request->id);
            if ($cek->count() != 0) {
                $cek->update([
                    "name" => $request->name,
                    "email" => $request->email,
                    "jabatan" => $request->jabatan,
                    "section" => $request->section,
                    "departement" => $request->departement,
                    "role" => $request->role,
                ]);
                return back();
            }
        }

    }

    public function destroy($id)
    {
        //
    }
}
