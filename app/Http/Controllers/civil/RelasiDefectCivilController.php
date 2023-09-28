<?php

namespace App\Http\Controllers\civil;

use App\Http\Controllers\Controller;
use App\Models\civil\DefectCivil;
use App\Models\civil\DetailPartCivil;
use App\Models\civil\PartCivil;
use App\Models\civil\RelasiDefectCivil;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class RelasiDefectCivilController extends Controller
{
    public function index()
    {
        $relasi_defect = RelasiDefectCivil::orderBy('part_id', 'asc')
            ->orderBy('detail_part_id', 'asc')
            ->orderBy('defect_id', 'asc')
            ->get();

        $part = PartCivil::orderBy('name', 'asc')->get();
        $detail_part = DetailPartCivil::orderBy('name', 'asc')->get();
        $defect = DefectCivil::orderBy('name', 'asc')->get();

        return view('civil.masterdata.masterdata_relasi_defect.index', compact([
            'relasi_defect',
            'part',
            'detail_part',
            'defect',
        ]));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $relasi_defect = RelasiDefectCivil::where('part_id', $request->part_id)
            ->where('detail_part_id', $request->detail_part_id)
            ->where('defect_id', $request->defect_id)
            ->count();

        if ($relasi_defect > 0) {
            return back()->withNotifyerror('Data relasi defect sudah ada!');
        }

        RelasiDefectCivil::create([
            'part_id' => $request->part_id,
            'detail_part_id' => $request->detail_part_id,
            'defect_id' => $request->defect_id,
        ]);

        return redirect()->route('relasi-defect.index')->withNotify('Data berhasil ditambahkan!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        try {
            $secret = Crypt::decryptString($id);

            $relasi_defect = RelasiDefectCivil::findOrFail($secret);
            if(!$relasi_defect){
                return back();
            }

            $part = PartCivil::orderBy('name', 'asc')->get();
            $detail_part = DetailPartCivil::orderBy('name', 'asc')->get();
            $defect = DefectCivil::orderBy('name', 'asc')->get();

            return view('civil.masterdata.masterdata_relasi_defect.update', compact([
                'relasi_defect',
                'part',
                'detail_part',
                'defect',
            ]));
        } catch (DecryptException $e) {
            return back();
        }
    }

    public function update(Request $request)
    {
        //
    }

    public function destroy(Request $request)
    {
        //
    }
}