<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
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
            'photo' => ['file', 'image'],
        ], [
            'photo.image' => 'File harus dalam format gambar/photo!'
        ]);

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
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = Pegawai::findOrFail($id);
        return view('user.update', compact(['user']));
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
            $cek = Pegawai::findOrFail($request->id);
            if ($cek->count() != 0) {
                $cek->update([
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

    }

    public function destroy($id)
    {
        //
    }
}