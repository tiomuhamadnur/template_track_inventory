<?php

namespace App\Http\Controllers\civil;

use App\Http\Controllers\Controller;
use App\Models\civil\DefectCivil;
use Illuminate\Http\Request;

class DefectCivilController extends Controller
{
    public function index()
    {
        $defect = DefectCivil::orderBy('name', 'ASC')->get();
        return view('civil.masterdata.masterdata_defect.index', compact(['defect']));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        DefectCivil::create([
            'name' => $request->name,
            'code' => $request->code,
        ]);

        return redirect()->route('defect-civil.index')->withNotify('Data berhasil ditambahkan!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $defect = DefectCivil::findOrFail($id);
        if (!$defect) {
            return back();
        }
        $defect->update([
            'name' => $request->name,
            'code' => $request->code,
        ]);
        return redirect()->route('defect-civil.index')->withNotify('Data berhasil diubah!');
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $defect = DefectCivil::findOrFail($id);
        if (!$defect) {
            return back();
        }
        $defect->delete();
        return redirect()->route('defect-civil.index')->withNotify('Data berhasil dihapus!');
    }
}