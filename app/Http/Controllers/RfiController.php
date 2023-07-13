<?php

namespace App\Http\Controllers;

use App\Models\Temuan;
use App\Models\TransRFI;
use Carbon\Carbon;
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
            $data_rfi = TransRFI::where('temuan_mainline_id', $secret)->count();
            if ($data_rfi > 0) {
                return redirect()->back()->withNotifyerror('Transaksi tidak bisa dilakukan, data temuan ini sudah diajukan RFI dan menunggu di-review oleh Section Head terkait!');
            } else {
                if ($temuan) {
                    return view('mainline.mainline_rfi.create', compact(['temuan']));
                } else {
                    return redirect()->back();
                }
            }
        } catch (DecryptException $e) {
            return redirect()->back();
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'photo_close' => ['image'],
        ], [
            'photo_close.image' => 'File harus dalam format gambar/photo!',
        ]);

        $user_id = $request->user_id;
        $temuan_mainline_id = $request->temuan_mainline_id;
        $tanggal = $request->tanggal;
        $remark = $request->remark;

        $data_rfi = TransRFI::where('temuan_mainline_id', $temuan_mainline_id)->count();
        if ($data_rfi > 0) {
            return redirect()->back()->withNotifyerror('Transaksi tidak bisa dilakukan, data temuan ini sudah diajukan RFI dan menunggu di-review oleh Section Head terkait!');
        } else {
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
    }

    public function show($id)
    {
        //
    }

    public function approve(Request $request)
    {
        $id_temuan_mainline = TransRFI::findOrFail($request->id_rfi)->temuan_mainline_id;
        $tanggal_rfi = TransRFI::findOrFail($request->id_rfi)->tanggal;
        $pic_rfi = TransRFI::join('users', 'users.id', '=', 'trans_rfi.user_id')->value('users.name');
        $tanggal_close = Carbon::now();
        if ($id_temuan_mainline) {
            $temuan_mainline = Temuan::findOrFail($id_temuan_mainline);
            $temuan_mainline->update([
                'status' => 'close',
                'tanggal_rfi' => $tanggal_rfi,
                'pic_rfi' => $pic_rfi,
                'tanggal_close' => $tanggal_close,
                'pic_close' => auth()->user()->name,
            ]);
            $data_rfi = TransRFI::findOrFail($request->id_rfi);
            $data_rfi->delete();

            return redirect()->route('rfi.mainline.index')->withNotify('Data temuan berhasil di-close dan data RFI terhapus!');
        } else {
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'photo_close' => ['image', 'required'],
        ], [
            'photo_close.image' => 'File harus dalam format gambar/photo!',
        ]);

        $id = $request->id_rfi;
        $data_rfi = TransRFI::findOrFail($id);
        if ($data_rfi) {
            $data_rfi->update([
                'remark' => $request->remark,
            ]);
            $photo_close = $request->file('photo_close')->store('temuan/mainline/perbaikan');
            $temuan = Temuan::findOrFail($request->id_temuan_mainline);
            $temuan->update([
                'photo_close' => $photo_close,
            ]);
            return redirect()->route('rfi.mainline.index')->withNotify('Data RFI berhasil diubah!');
        } else {
            return redirect()->back();
        }
    }

    public function destroy(Request $request)
    {
        $id_rfi = $request->id_rfi;
        $data_rfi = TransRFI::findOrFail($id_rfi);
        $temuan_mainline_id = TransRFI::findOrFail($id_rfi)->temuan_mainline_id;
        if ($data_rfi) {
            $temuan = Temuan::findOrFail($temuan_mainline_id);
            $temuan->update([
                'photo_close' => null,
            ]);
            $data_rfi->delete();

            return redirect()->route('rfi.mainline.index')->withNotify('Data RFI yang di-reject, berhasil dihapus!');
        } else {
            return redirect()->back();
        }
    }
}