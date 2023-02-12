<?php

namespace App\Http\Controllers;

use App\Models\Wesel;
use App\Models\WeselExamination;
use Illuminate\Http\Request;

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
        $wesel = Wesel::all();
        return view('mainline.mainline_wesel_examination.create', compact(['wesel']));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'photo' => ['image', 'required'],
        ], [
            'photo.image' => 'File harus dalam format gambar/photo!'
        ]);

        if ($request->hasFile('photo') && $request->photo != '')
        {
            $photo_kegiatan = $request->file('photo')->store('photo_kegiatan/turnout_examination');
            WeselExamination::create([
                "wesel_id" => $request->wesel_id,
                "pic" => $request->pic,
                "tanggal" => $request->tanggal,
                "TG_1" => $request->TG_1,
                "CL_1" => $request->CL_1,
                "TG_2" => $request->TG_2,
                "CL_2" => $request->CL_2,
                "TG_2A" => $request->TG_2A,
                "CL_2A" => $request->CL_2A,
                "TG_2AA" => $request->TG_2AA,
                "CL_2AA" => $request->CL_2AA,
                "TG_3" => $request->TG_3,
                "CL_3" => $request->CL_3,
                "TG_3A" => $request->TG_3A,
                "CL_3A" => $request->CL_3A,
                "CL_4" => $request->CL_4,
                "TG_4A" => $request->TG_4A,
                "CL_4A" => $request->CL_4A,
                "TG_5" => $request->TG_5,
                "CL_5" => $request->CL_5,
                "TG_5A" => $request->TG_5A,
                "CL_5A" => $request->CL_5A,
                "TG_6A" => $request->TG_6A,
                "TG_7" => $request->TG_7,
                "CL_7" => $request->CL_7,
                "TG_7A" => $request->TG_7A,
                "CL_7A" => $request->CL_7A,
                "BG_8" => $request->BG_8,
                "CL_8" => $request->CL_8,
                "BG_8A" => $request->BG_8A,
                "CL_8A" => $request->CL_8A,
                "TG_10" => $request->TG_10,
                "CL_10" => $request->CL_10,
                "TG_10A" => $request->TG_10A,
                "CL_10A" => $request->CL_10A,
                "LL_2" => $request->LL_2,
                "AL_2" => $request->AL_2,
                "LL_5" => $request->LL_5,
                "AL_5" => $request->AL_5,
                "LL_5A" => $request->LL_5A,
                "AL_5A_1per2" => $request->AL_5A_1per2,
                "AL_5A_1per4" => $request->AL_5A_1per4,
                "AL_5A_3per4" => $request->AL_5A_3per4,
                "LL_9" => $request->LL_9,
                "AL_9" => $request->AL_9,
                'photo' => $photo_kegiatan,
            ]);
            return redirect()->route('wesel.examination.index')->withNotify('Data Pengukuran Wesel berhasil ditambahkan!');
        }
        else
        {
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
        }
        else {
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