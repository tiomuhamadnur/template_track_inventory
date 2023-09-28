<?php

namespace App\Http\Controllers\civil;

use App\Http\Controllers\Controller;
use App\Models\civil\DetailArea;
use Illuminate\Http\Request;

class DetailAreaController extends Controller
{
    public function index()
    {
        $detail_area = DetailArea::orderBy('name', 'ASC')->get();
        return view('civil.masterdata.masterdata_detail_area.index', compact(['detail_area']));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        DetailArea::create([
            'name' => $request->name,
            'code' => $request->code,
        ]);

        return redirect()->route('detail-area.index')->withNotify('Data berhasil ditambahkan!');
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
        $detail_area = DetailArea::findOrFail($id);
        if (!$detail_area) {
            return back();
        }
        $detail_area->update([
            'name' => $request->name,
            'code' => $request->code,
        ]);
        return redirect()->route('detail-area.index')->withNotify('Data berhasil diubah!');
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $detail_area = DetailArea::findOrFail($id);
        if (!$detail_area) {
            return back();
        }
        $detail_area->delete();
        return redirect()->route('detail-area.index')->withNotify('Data berhasil dihapus!');
    }
}