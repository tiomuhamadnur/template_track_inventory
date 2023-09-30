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
use Illuminate\Support\Facades\Storage;

class PICController extends Controller
{
    public function index()
    {
        $tahun = Carbon::now()->format('Y');
        $pic = PIC::where('tahun', $tahun)->get();

        return view('masterdata.masterdata_pic.index', compact(['pic', 'tahun']));
    }

    public function create()
    {
        $technician = Pegawai::whereNot('jabatan', 'Section Head')->orderBy('name', 'ASC')->get();
        $job = PM::orderBy('name', 'ASC')->get();
        $tahun = Carbon::now()->format('Y');

        return view('masterdata.masterdata_pic.create', compact(['technician', 'job', 'tahun']));
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
        $tahun = Carbon::now()->format('Y');
        $user_id = auth()->user()->id;
        $pic = PIC::where('tahun', $tahun)->where('user_id', $user_id)->get();

        return view('profile.index', compact(['pic']));
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

    public function pic_filter(Request $request)
    {
        $tahun = $request->tahun;
        $pic = PIC::where('tahun', $tahun)->get();

        return view('masterdata.masterdata_pic.index', compact(['pic', 'tahun']));
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
            'photo.image' => 'File harus dalam format gambar/photo!',
        ]);
        $id = auth()->user()->id;
        if ($request->hasFile('photo') && $request->photo != '') {
            $user = Pegawai::findOrFail($id);
            Storage::delete($user->photo);
            $photo_profil = $request->file('photo')->store('photo-profil/' . auth()->user()->role);
            $user->update([
                'photo' => $photo_profil,
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
            'photo_ttd.image' => 'File harus dalam format gambar/photo!',
        ]);
        $id = auth()->user()->id;
        if ($request->hasFile('photo_ttd') && $request->photo_ttd != '') {
            $user = Pegawai::findOrFail($id);
            Storage::delete($user->ttd);
            $photo_ttd = $request->file('photo_ttd')->store('photo-ttd/' . auth()->user()->role);
            $user->update([
                'ttd' => $photo_ttd,
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
        $pic = PIC::findOrFail($id);
        if(!$pic) {
            return back();
        }
        $technician = Pegawai::whereNot('jabatan', 'Section Head')->orderBy('name', 'ASC')->get();
        $job = PM::orderBy('name', 'ASC')->get();
        return view('masterdata.masterdata_pic.update', compact(['pic', 'technician', 'job']));
    }

    public function update_progress_pic(Request $request)
    {
        $id = $request->id;
        $pic = PIC::findOrFail($id);
        if(!$pic){
            return back();
        }
        $pic->update([
            'progress' => $request->progress,
        ]);

        return redirect()->route('profile')->withNotify('Progress PIC berhasil diperbaharui!');
    }
}