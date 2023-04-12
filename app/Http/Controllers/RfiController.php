<?php

namespace App\Http\Controllers;

use App\Models\Temuan;
use App\Models\TransRFI;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class RfiController extends Controller
{
    public function index()
    {
        $data_rfi = TransRFI::where('temuan_mainline_id', '!=', null)->get();
        return view('mainline.mainline_rfi.index', compact(['data_rfi']));
    }

    public function create($id)
    {
        try {
            $secret = Crypt::decryptString($id);
            $temuan = Temuan::findOrFail($secret);
            if ($temuan) {
                return view('mainline.mainline_rfi.create', compact(['temuan']));
            } else {
                return redirect()->back();
            }
        } catch (DecryptException $e) {
            return redirect()->back();
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'photo_close' => ['image', 'required'],
        ], [
            'photo_close.image' => 'File harus dalam format gambar/photo!',
        ]);

        $user_id = $request->user_id;
        $temuan_mainline_id = $request->temuan_mainline_id;
        $tanggal = $request->tanggal;
        $remark = $request->remark;

        if ($request->hasFile('photo_close') && $request->photo_close != '') {
            TransRFI::create([
                'user_id' => $user_id,
                'temuan_mainline_id' => $temuan_mainline_id,
                'tanggal' => $tanggal,
                'remark' => $remark,
            ]);
            $photo_close = $request->file('photo_close')->store('temuan/mainline/perbaikan');
            $temuan = Temuan::findOrFail($temuan_mainline_id);
            $temuan->update([
                'photo_close' => $photo_close,
            ]);

            return redirect()->route('rfi.mainline.index')->withNotify('Data RFI berhasil disumbit!');
        } else {
            return redirect()->back();
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}