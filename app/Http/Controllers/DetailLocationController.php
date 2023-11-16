<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use App\Models\DetailLocation;
use App\Http\Controllers\Controller;

class DetailLocationController extends Controller
{
    public function index ()
    {
        $location = Location::all();
        $detail_location = DetailLocation::all();

        return view('planning.masterdata.masterdata_detail_location.index', compact(['detail_location', 'location']));
    }

    public function create()
    {
        $location = Location::all();

        return view('planning.masterdata.masterdata_detail_location.create', compact(['location']));
    }

    public function store(Request $request)
    {
        DetailLocation::create([
            'code' => $request->code,
            'name' => $request->name,
            'location_id' => $request->location_id
        ]);

        return redirect()->route('masterdata-detail-location.index')->withNotify('Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $detail_location = DetailLocation::findOrFail($id);
        $location = Location::orderBy('name', 'ASC')->get();

        return view('planning.masterdata.masterdata_detail_location.update', compact(['location', 'detail_location']));
    }

    public function update (Request $request)
    {
        $id = $request->id;
        $detail_location = DetailLocation::findOrFail($id);
        if(!$detail_location){
            return back();
        }
        $detail_location->update([
            'code'=>$request->code,
            'name'=>$request->name,
            'location_id'=>$request->location_id,
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