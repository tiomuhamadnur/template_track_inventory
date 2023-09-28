<?php

namespace App\Http\Controllers\civil;

use App\Http\Controllers\Controller;
use App\Models\civil\PartCivil;
use Illuminate\Http\Request;

class PartCivilController extends Controller
{
    public function index()
    {
        $part = PartCivil::orderBy('name', 'ASC')->get();
        return view('civil.masterdata.masterdata_part.index', compact(['part']));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        PartCivil::create([
            'name' => $request->name,
            'code' => $request->code,
        ]);

        return redirect()->route('part-civil.index')->withNotify('Data berhasil ditambahkan!');
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
        $part = PartCivil::findOrFail($id);
        if (!$part) {
            return back();
        }
        $part->update([
            'name' => $request->name,
            'code' => $request->code,
        ]);
        return redirect()->route('part-civil.index')->withNotify('Data berhasil diubah!');
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $part = PartCivil::findOrFail($id);
        if (!$part) {
            return back();
        }
        $part->delete();
        return redirect()->route('part-civil.index')->withNotify('Data berhasil dihapus!');
    }
}