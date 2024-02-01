<?php

namespace App\Http\Controllers\civil;

use App\Http\Controllers\Controller;
use App\Models\civil\RFICivil;
use App\Models\civil\TemuanVisualCivil;
use Carbon\Carbon;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class RfiCivilController extends Controller
{
    public function index()
    {
        $data_rfi = RFICivil::orderBy('tanggal', 'asc')->get();
        return view('civil.examination.examination_rfi.index', compact(['data_rfi']));
    }

    public function create($id)
    {
        try {
            $secret = Crypt::decryptString($id);
            $temuan = TemuanVisualCivil::findOrFail($secret);
            $data_rfi = RFICivil::where('temuan_visual_id', $secret)->count();
            if ($data_rfi > 0) {
                return back()->withNotifyerror('Transaksi tidak bisa dilakukan, data temuan ini sudah diajukan RFI dan menunggu di-review oleh Section Head terkait!');
            } else {
                if (!$temuan) {
                    return back();
                }
                return view('civil.examination.examination_rfi.create', compact(['temuan']));
            }
        } catch (DecryptException $e) {
            return back();
        }
    }

    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'photo_close' => ['image'],
        ], [
            'photo_close.image' => 'File harus dalam format gambar/photo!',
        ]);

        $user_id = $request->user_id;
        $temuan_visual_id = $request->temuan_visual_id;
        $tanggal = $request->tanggal;
        $remark = $request->remark;

        $data_rfi = RFICivil::where('temuan_visual_id', $temuan_visual_id)->count();
        if ($data_rfi > 0) {
            return redirect()->back()->withNotifyerror('Transaksi tidak bisa dilakukan, data temuan ini sudah diajukan RFI dan menunggu di-review oleh Section Head terkait!');
        } else {
            if ($request->hasFile('photo_close') && $request->photo_close != '') {
                RFICivil::create([
                    'user_id' => $user_id,
                    'temuan_visual_id' => $temuan_visual_id,
                    'tanggal' => $tanggal,
                    'remark' => $remark,
                ]);
                $photo_close = $request->file('photo_close')->store('civil/perbaikan');
                $temuan = TemuanVisualCivil::findOrFail($temuan_visual_id);
                $temuan->update([
                    'photo_close' => $photo_close,
                    'status'=> 'rfi',
                ]);

                return redirect()->route('rfi.civil.index')->withNotify('Data RFI berhasil disumbit!');
            } else {
                return redirect()->back();
            }
        }
    }

    public function approve(Request $request)
    {
        $data_rfi = RFICivil::findOrFail($request->id_rfi);
        $temuan_visual_id = $data_rfi->temuan_visual_id;
        $tanggal_rfi = $data_rfi->tanggal;
        $pic_rfi = $data_rfi->user->name;
        $tanggal_close = Carbon::now();
        $pic_close = auth()->user()->name;
        $temuan_visual = TemuanVisualCivil::findOrFail($temuan_visual_id);
        if(!$temuan_visual){
            return back();
        }
        $temuan_visual->update([
            'status' => 'close',
            'tanggal_rfi' => $tanggal_rfi,
            'pic_rfi' => $pic_rfi,
            'tanggal_close' => $tanggal_close,
            'pic_close' => $pic_close,
        ]);
        $data_rfi->delete();

        return redirect()->route('rfi.civil.index')->withNotify('Data temuan berhasil di-close dan data RFI terhapus!');
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
        $remark = $request->remark;
        $temuan_visual_id = $request->temuan_visual_id;
        $data_rfi = RFICivil::findOrFail($id);

        if (!$data_rfi) {
            return back();
        }

        $data_rfi->update([
            'remark' => $remark,
        ]);

        if ($request->hasFile('photo_close') && $request->photo_close != '') {
            $temuan = TemuanVisualCivil::findOrFail($temuan_visual_id);
            Storage::delete($temuan->photo_close);
            $photo_close = $request->file('photo_close')->store('civil/perbaikan');
            $temuan->update([
                'photo_close' => $photo_close,
            ]);
        }
        return redirect()->route('rfi.civil.index')->withNotify('Data RFI berhasil diubah!');
    }

    public function destroy(Request $request)
    {
        $id_rfi = $request->id_rfi;
        $data_rfi = RFICivil::findOrFail($id_rfi);
        if (!$data_rfi) {
            return back();
        }
        $temuan_visual_id = $data_rfi->temuan_visual_id;
        $temuan = TemuanVisualCivil::findOrFail($temuan_visual_id);
        if($temuan->photo_close != '')
        {
            Storage::delete($temuan->photo_close);
        }
        $temuan->update([
            'photo_close' => null,
            'status' => 'open',
        ]);
        $data_rfi->delete();

        return redirect()->route('rfi.civil.index')->withNotify('Data RFI yang ditolak, berhasil dihapus!');
    }
}