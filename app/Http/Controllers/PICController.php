<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\PIC;
use App\Models\PM;
use Carbon\Carbon;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class PICController extends Controller
{
    public function index()
    {
        $tahun = Carbon::now()->format('Y');
        $pic = PIC::where('tahun', $tahun)->get();
        return view('pic.index', compact(['pic']));
    }

    public function create()
    {
        $technician = Pegawai::where('jabatan', 'Technician')->get();
        $job = PM::all();
        $tahun = Carbon::now()->format('Y');
        return view('pic.create', compact(['technician', 'job', 'tahun']));
    }

    public function store(Request $request)
    {
        PIC::create([
            'user_id' => $request->user_id,
            'job_id' => $request->job_id,
            'tahun' => $request->tahun,
            'progress' => $request->progress,
        ]);
        return redirect()->route('pic.index')->withNotify('Data PIC berhasil ditambahkan!');
    }

    public function profile()
    {
        return view('profile.index');
    }

    public function pic_update(Request $request)
    {
        $id = $request->id;
        $pic = PIC::findOrFail($id);
        if ($pic) {
            $pic->update([
                'user_id' => $request->user_id,
                'job_id' => $request->job_id,
                'tahun' => $request->tahun,
                'progress' => $request->progress,
            ]);
            return redirect()->route('pic.index')->withNotify('Data PIC berhasil diubah!');
        } else {
            return redirect()->back();
        }
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
            return redirect()->route('profile')->withNotify('Foto profil berhasil dimutakhirkan!');
        } else {
            return back();
        }
    }

    public function update_ttd(Request $request)
    {
        $this->validate($request, [
            'photo_ttd' => ['image'],
        ], [
            'photo_ttd.image' => 'File harus dalam format gambar/photo!'
        ]);
        $id = auth()->user()->id;
        if ($request->hasFile('photo_ttd') && $request->photo_ttd != '') {
            $photo_ttd = $request->file('photo_ttd')->store('photo-ttd/' . auth()->user()->role);
            $user = Pegawai::findOrFail($id);
            $user->update([
                "ttd" => $photo_ttd,
            ]);
            return redirect()->route('profile')->withNotify('Foto TTD berhasil diperbaharui!');
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
        if ($cek) {
            if ($request->new_password == $request->confirm_new_password) {
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
        $technician = Pegawai::where('jabatan', 'Technician')->get();
        $job = PM::all();
        try {
            $secret = Crypt::decryptString($id);
            $pic = PIC::findOrFail($secret);
            if ($pic) {
                return view('pic.update', compact(['pic', 'technician', 'job']));
            } else {
                return redirect()->back();
            }
        } catch (DecryptException $e) {
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        //
    }
}