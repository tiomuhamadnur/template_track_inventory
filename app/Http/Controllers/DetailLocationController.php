<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DetailLocation;
use Illuminate\Http\Request;

class DetailLocationController extends Controller
{
    public function index ()
    {
        $detail_location = DetailLocation::all();

        return view('planning.masterdata.masterdata_detail_location.index', compact(['detail_location']));
    }

    public function create()
    {
        return view('planning.masterdata.masterdata_detail_location.create');
    }

    public function store(Request $request)
    {
        DetailLocation::create([
            'code' => $request->code,
            'name' => $request->name,
        ]);

        return redirect()->route('masterdata-detail-location.index')->withNotify('Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $detail_location = DetailLocation::findOrFail($id);

        return view('planning.masterdata.masterdata_detail_location.update', compact(['detail_location']));
    }

    public function update (Request $request)
    {
        $id = $request->id;
        $detail_location = DetailLocation::findOrFail($id);
        $detail_location->update([
            'code'=>$request->code,
            'name'=>$request->name,
        ]);

        return redirect()->route('masterdata-detail-location.index')->withNotify('Data berhasil diupdate!');
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $detail_location = DetailLocation::findOrFail($id);
        if ($detail_location){
            $detail_location->delete()->withNotify('Data berhasil dihapus!');
        } else {
            return redirect()->back();
        }
    }
}
