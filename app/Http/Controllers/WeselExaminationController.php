<?php

namespace App\Http\Controllers;

use App\Exports\WeselExaminationExport;
use App\Models\Wesel;
use App\Models\WeselExamination;
use Carbon\Carbon;
use Excel;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class WeselExaminationController extends Controller
{
    public function index()
    {
        $wesel = Wesel::whereNot('tipe', 'scissors crossing')->get();
        $wesel_examination = WeselExamination::all();

        return view('mainline.mainline_wesel_examination.index', compact(['wesel', 'wesel_examination']));
    }

    public function create()
    {
        $wesel = Wesel::whereNot('tipe', 'scissors crossing')->get();

        return view('mainline.mainline_wesel_examination.create', compact(['wesel']));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'photo' => ['image', 'required'],
        ], [
            'photo.image' => 'File harus dalam format gambar/photo!',
        ]);

        $tipe = Wesel::findOrFail($request->wesel_id)->tipe;

        if ($request->hasFile('photo') && $request->photo != '') {
            $photo_kegiatan = $request->file('photo')->store('photo_kegiatan/turnout_examination');
            WeselExamination::create([
                'wesel_id' => $request->wesel_id,
                'pic' => $request->pic,
                'tanggal' => $request->tanggal,
                'TG_1' => $request->TG_1,
                'CL_1' => $request->CL_1,
                'TG_2' => $request->TG_2,
                'CL_2' => $request->CL_2,
                'TG_2A' => $request->TG_2A,
                'CL_2A' => $request->CL_2A,
                'TG_2AA' => $request->TG_2AA,
                'CL_2AA' => $request->CL_2AA,
                'TG_3' => $request->TG_3,
                'CL_3' => $request->CL_3,
                'TG_3A' => $request->TG_3A,
                'CL_3A' => $request->CL_3A,
                'CL_4' => $request->CL_4,
                'TG_4A' => $request->TG_4A,
                'CL_4A' => $request->CL_4A,
                'TG_5' => $request->TG_5,
                'CL_5' => $request->CL_5,
                'TG_5A' => $request->TG_5A,
                'CL_5A' => $request->CL_5A,
                'TG_6A' => $request->TG_6A,
                'TG_7' => $request->TG_7,
                'CL_7' => $request->CL_7,
                'TG_7A' => $request->TG_7A,
                'CL_7A' => $request->CL_7A,
                'BG_8' => $request->BG_8,
                'CL_8' => $request->CL_8,
                'BG_8A' => $request->BG_8A,
                'CL_8A' => $request->CL_8A,
                'TG_10' => $request->TG_10,
                'CL_10' => $request->CL_10,
                'TG_10A' => $request->TG_10A,
                'CL_10A' => $request->CL_10A,
                'LL_2' => $request->LL_2,
                'AL_2' => $request->AL_2,
                'LL_5' => $request->LL_5,
                'AL_5' => $request->AL_5,
                'LL_5A' => $request->LL_5A,
                'AL_5A_1per2' => $request->AL_5A_1per2,
                'AL_5A_1per4' => $request->AL_5A_1per4,
                'AL_5A_3per4' => $request->AL_5A_3per4,
                'LL_9' => $request->LL_9,
                'AL_9' => $request->AL_9,
                'photo' => $photo_kegiatan,

                'TG_1A' => $request->TG_1A,
                'TG_4' => $request->TG_4,
                'TG_8' => $request->TG_8,
                'TG_8A' => $request->TG_8A,

                'CL_1A' => $request->CL_1A,

                'AL_1' => $request->AL_1,
                'AL_1A' => $request->AL_1A,
                'AL_3' => $request->AL_3,
                'AL_3A' => $request->AL_3A,
                'AL_8' => $request->AL_8,
                'AL_8A' => $request->AL_8A,
                'AL_10' => $request->AL_10,
                'AL_10A' => $request->AL_10A,

                'LL_1' => $request->LL_1,
                'LL_1A' => $request->LL_1A,
                'LL_3' => $request->LL_3,
                'LL_3A' => $request->LL_3A,
                'LL_8' => $request->LL_8,
                'LL_8A' => $request->LL_8A,
                'LL_10' => $request->LL_10,
                'LL_10A' => $request->LL_10A,

                'BG_2' => $request->BG_2,
                'BG_2A' => $request->BG_2A,
                'BG_5' => $request->BG_5,
                'BG_5A' => $request->BG_5A,
                'BG_6' => $request->BG_6,
                'BG_6A' => $request->BG_6A,
                'BG_9' => $request->BG_9,
                'BG_9A' => $request->BG_9A,
            ]);

            if($tipe != 'Scissors Crossing'){
                return redirect()->route('wesel.examination.index')->withNotify('Data Pengukuran TO berhasil ditambahkan!');
            } else {
                return redirect()->route('sc.examination.index')->withNotify('Data Pengukuran SC berhasil ditambahkan!');
            }

        } else {
            return redirect()->back();
        }
    }

    public function report(Request $request)
    {
        $wesel_id = $request->wesel_id;
        $tanggal = $request->tanggal;

        $wesel = WeselExamination::where('wesel_id', $wesel_id)->where('tanggal', $tanggal)->first();
        if ($wesel) {
            return view('mainline.mainline_wesel_examination.report.report', compact(['wesel']));
        } else {
            return redirect()->back();
        }
    }

    public function history($id)
    {
        try {
            $secret = Crypt::decryptString($id);
            $wesel = WeselExamination::where('wesel_id', $secret)->orderBy('tanggal', 'ASC')->get();
            $wesel_name = Wesel::findOrFail($secret);
            $tanggal_awal = '';
            $tanggal_akhir = '';

            return view('mainline.mainline_wesel_examination.history', compact(['wesel', 'wesel_name', 'tanggal_awal', 'tanggal_akhir']));
        } catch (DecryptException $e) {
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        try {
            $secret = Crypt::decryptString($id);
            $wesel = WeselExamination::findOrFail( $secret );

            return view('mainline.mainline_wesel_examination.update', compact(['wesel']));
        } catch (DecryptException $e) {
            return redirect()->back();
        }
    }

    public function filter(Request $request)
    {
        $wesel_id = $request->wesel_id;
        $tanggal_awal = $request->tanggal_awal;
        $tanggal_akhir = $request->tanggal_akhir;

        $wesel = WeselExamination::query();
        $wesel_name = Wesel::findOrFail($wesel_id);

        // Filter by wesel_id
        $wesel->when($wesel_id, function ($query) use ($request) {
            return $query->where('wesel_id', $request->wesel_id);
        });

        // Filter by tanggal
        if ($tanggal_awal != null and $tanggal_akhir != null) {
            $wesel->when($tanggal_awal, function ($query) use ($request) {
                return $query->whereDate('tanggal', '>=', $request->tanggal_awal);
            });
            $wesel->when($tanggal_akhir, function ($query) use ($request) {
                return $query->whereDate('tanggal', '<=', $request->tanggal_akhir);
            });
        }

        return view('mainline.mainline_wesel_examination.history', [
            'wesel' => $wesel->orderBy('tanggal', 'ASC')->get(),
            'wesel_name' => $wesel_name,
            'tanggal_awal' => $tanggal_awal,
            'tanggal_akhir' => $tanggal_akhir,
        ]);
    }

    public function export(Request $request)
    {
        $wesel_id = $request->wesel_id;
        $wesel_name = Wesel::findOrfail($wesel_id)->value('name');
        $tanggal_awal = $request->tanggal_awal;
        $tanggal_akhir = $request->tanggal_akhir;

        $waktu = Carbon::now()->format('Ymd');

        return Excel::download(new WeselExaminationExport($wesel_id, $tanggal_awal, $tanggal_akhir), $waktu.'_data pengukuran_'.$wesel_name.'.xlsx', \Maatwebsite\Excel\Excel::XLSX);
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $wesel = WeselExamination::findOrFail($id);
        $tipe = Wesel::findOrFail($request->wesel_id)->tipe;
        if (!$wesel){
            return back();
        }
        if ($request->hasFile('photo') && $request->photo != '') {
            $photo_kegiatan = $request->file('photo')->store('photo_kegiatan/turnout_examination');
            if($wesel->photo != null){
                Storage::delete($wesel->photo);
            }
            $wesel->update([
                'wesel_id' => $request->wesel_id,
                'pic' => $request->pic,
                'tanggal' => $request->tanggal,
                'TG_1' => $request->TG_1,
                'CL_1' => $request->CL_1,
                'TG_2' => $request->TG_2,
                'CL_2' => $request->CL_2,
                'TG_2A' => $request->TG_2A,
                'CL_2A' => $request->CL_2A,
                'TG_2AA' => $request->TG_2AA,
                'CL_2AA' => $request->CL_2AA,
                'TG_3' => $request->TG_3,
                'CL_3' => $request->CL_3,
                'TG_3A' => $request->TG_3A,
                'CL_3A' => $request->CL_3A,
                'CL_4' => $request->CL_4,
                'TG_4A' => $request->TG_4A,
                'CL_4A' => $request->CL_4A,
                'TG_5' => $request->TG_5,
                'CL_5' => $request->CL_5,
                'TG_5A' => $request->TG_5A,
                'CL_5A' => $request->CL_5A,
                'TG_6A' => $request->TG_6A,
                'TG_7' => $request->TG_7,
                'CL_7' => $request->CL_7,
                'TG_7A' => $request->TG_7A,
                'CL_7A' => $request->CL_7A,
                'BG_8' => $request->BG_8,
                'CL_8' => $request->CL_8,
                'BG_8A' => $request->BG_8A,
                'CL_8A' => $request->CL_8A,
                'TG_10' => $request->TG_10,
                'CL_10' => $request->CL_10,
                'TG_10A' => $request->TG_10A,
                'CL_10A' => $request->CL_10A,
                'LL_2' => $request->LL_2,
                'AL_2' => $request->AL_2,
                'LL_5' => $request->LL_5,
                'AL_5' => $request->AL_5,
                'LL_5A' => $request->LL_5A,
                'AL_5A_1per2' => $request->AL_5A_1per2,
                'AL_5A_1per4' => $request->AL_5A_1per4,
                'AL_5A_3per4' => $request->AL_5A_3per4,
                'LL_9' => $request->LL_9,
                'AL_9' => $request->AL_9,
                'photo' => $photo_kegiatan,

                'TG_1A' => $request->TG_1A,
                'TG_4' => $request->TG_4,
                'TG_8' => $request->TG_8,
                'TG_8A' => $request->TG_8A,

                'CL_1A' => $request->CL_1A,

                'AL_1' => $request->AL_1,
                'AL_1A' => $request->AL_1A,
                'AL_3' => $request->AL_3,
                'AL_3A' => $request->AL_3A,
                'AL_8' => $request->AL_8,
                'AL_8A' => $request->AL_8A,
                'AL_10' => $request->AL_10,
                'AL_10A' => $request->AL_10A,

                'LL_1' => $request->LL_1,
                'LL_1A' => $request->LL_1A,
                'LL_3' => $request->LL_3,
                'LL_3A' => $request->LL_3A,
                'LL_8' => $request->LL_8,
                'LL_8A' => $request->LL_8A,
                'LL_10' => $request->LL_10,
                'LL_10A' => $request->LL_10A,

                'BG_2' => $request->BG_2,
                'BG_2A' => $request->BG_2A,
                'BG_5' => $request->BG_5,
                'BG_5A' => $request->BG_5A,
                'BG_6' => $request->BG_6,
                'BG_6A' => $request->BG_6A,
                'BG_9' => $request->BG_9,
                'BG_9A' => $request->BG_9A,
            ]);

            if($tipe != 'Scissors Crossing'){
                return redirect()->route('wesel.examination.index')->withNotify('Data Pengukuran TO berhasil dimutakhirkan!');
            } else {
                return redirect()->route('sc.examination.index')->withNotify('Data Pengukuran SC berhasil dimutakhirkan!');
            }

        } else {
            $wesel->update([
                'wesel_id' => $request->wesel_id,
                'pic' => $request->pic,
                'tanggal' => $request->tanggal,
                'TG_1' => $request->TG_1,
                'CL_1' => $request->CL_1,
                'TG_2' => $request->TG_2,
                'CL_2' => $request->CL_2,
                'TG_2A' => $request->TG_2A,
                'CL_2A' => $request->CL_2A,
                'TG_2AA' => $request->TG_2AA,
                'CL_2AA' => $request->CL_2AA,
                'TG_3' => $request->TG_3,
                'CL_3' => $request->CL_3,
                'TG_3A' => $request->TG_3A,
                'CL_3A' => $request->CL_3A,
                'CL_4' => $request->CL_4,
                'TG_4A' => $request->TG_4A,
                'CL_4A' => $request->CL_4A,
                'TG_5' => $request->TG_5,
                'CL_5' => $request->CL_5,
                'TG_5A' => $request->TG_5A,
                'CL_5A' => $request->CL_5A,
                'TG_6A' => $request->TG_6A,
                'TG_7' => $request->TG_7,
                'CL_7' => $request->CL_7,
                'TG_7A' => $request->TG_7A,
                'CL_7A' => $request->CL_7A,
                'BG_8' => $request->BG_8,
                'CL_8' => $request->CL_8,
                'BG_8A' => $request->BG_8A,
                'CL_8A' => $request->CL_8A,
                'TG_10' => $request->TG_10,
                'CL_10' => $request->CL_10,
                'TG_10A' => $request->TG_10A,
                'CL_10A' => $request->CL_10A,
                'LL_2' => $request->LL_2,
                'AL_2' => $request->AL_2,
                'LL_5' => $request->LL_5,
                'AL_5' => $request->AL_5,
                'LL_5A' => $request->LL_5A,
                'AL_5A_1per2' => $request->AL_5A_1per2,
                'AL_5A_1per4' => $request->AL_5A_1per4,
                'AL_5A_3per4' => $request->AL_5A_3per4,
                'LL_9' => $request->LL_9,
                'AL_9' => $request->AL_9,


                'TG_1A' => $request->TG_1A,
                'TG_4' => $request->TG_4,
                'TG_8' => $request->TG_8,
                'TG_8A' => $request->TG_8A,

                'CL_1A' => $request->CL_1A,

                'AL_1' => $request->AL_1,
                'AL_1A' => $request->AL_1A,
                'AL_3' => $request->AL_3,
                'AL_3A' => $request->AL_3A,
                'AL_8' => $request->AL_8,
                'AL_8A' => $request->AL_8A,
                'AL_10' => $request->AL_10,
                'AL_10A' => $request->AL_10A,

                'LL_1' => $request->LL_1,
                'LL_1A' => $request->LL_1A,
                'LL_3' => $request->LL_3,
                'LL_3A' => $request->LL_3A,
                'LL_8' => $request->LL_8,
                'LL_8A' => $request->LL_8A,
                'LL_10' => $request->LL_10,
                'LL_10A' => $request->LL_10A,

                'BG_2' => $request->BG_2,
                'BG_2A' => $request->BG_2A,
                'BG_5' => $request->BG_5,
                'BG_5A' => $request->BG_5A,
                'BG_6' => $request->BG_6,
                'BG_6A' => $request->BG_6A,
                'BG_9' => $request->BG_9,
                'BG_9A' => $request->BG_9A,
            ]);

            if($tipe != 'Scissors Crossing'){
                return redirect()->route('wesel.examination.index')->withNotify('Data Pengukuran TO berhasil dimutakhirkan!');
            } else {
                return redirect()->route('sc.examination.index')->withNotify('Data Pengukuran SC berhasil dimutakhirkan!');
            }
        }
    }

    public function destroy($id)
    {
        //
    }

    public function sc_index()
    {
        $sc = Wesel::where('tipe', 'scissors crossing')->get();
        // $wesel_examination = WeselExamination::all();

        return view('mainline.mainline_sc_examination.index', compact(['sc']));
    }

    public function sc_history($id)
    {
        try {
            $secret = Crypt::decryptString($id);
            $wesel = WeselExamination::where('wesel_id', $secret)->orderBy('tanggal', 'ASC')->get();
            $wesel_name = Wesel::findOrFail($secret);
            $tanggal_awal = '';
            $tanggal_akhir = '';

            return view('mainline.mainline_sc_examination.history', compact(['wesel', 'wesel_name', 'tanggal_awal', 'tanggal_akhir']));
        } catch (DecryptException $e) {
            return redirect()->back();
        }
    }

    public function sc_create()
    {
        $wesel = Wesel::where('tipe', 'scissors crossing')->get();

        return view('mainline.mainline_sc_examination.create', compact(['wesel']));
    }

    public function sc_edit($id)
    {
        try {
            $secret = Crypt::decryptString($id);
            $wesel = WeselExamination::findOrFail($secret);

            return view('mainline.mainline_sc_examination.update', compact(['wesel']));
        } catch (DecryptException $e) {
            return redirect()->back();
        }
    }
}
