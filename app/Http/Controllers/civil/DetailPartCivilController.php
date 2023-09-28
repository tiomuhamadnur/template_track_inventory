<?php

namespace App\Http\Controllers\civil;

use App\Http\Controllers\Controller;
use App\Models\civil\DetailPartCivil;
use Illuminate\Http\Request;

class DetailPartCivilController extends Controller
{
    public function index()
    {
        $detail_part = DetailPartCivil::orderBy('name', 'ASC')->get();
        return view('civil.masterdata.masterdata_detail_part.index', compact(['detail_part']));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        DetailPartCivil::create([
            'name' => $request->name,
            'code' => $request->code,
        ]);

        return redirect()->route('detail-part-civil.index')->withNotify('Data berhasil ditambahkan!');
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
        $detail_part = DetailPartCivil::findOrFail($id);
        if (!$detail_part) {
            return back();
        }
        $detail_part->update([
            'name' => $request->name,
            'code' => $request->code,
        ]);
        return redirect()->route('detail-part-civil.index')->withNotify('Data berhasil diubah!');
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $detail_part = DetailPartCivil::findOrFail($id);
        if (!$detail_part) {
            return back();
        }
        $detail_part->delete();
        return redirect()->route('detail-part-civil.index')->withNotify('Data berhasil dihapus!');
    }
}