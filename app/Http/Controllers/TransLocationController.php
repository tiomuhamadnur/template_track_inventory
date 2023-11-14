<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use App\Models\TransLocation;
use App\Models\DetailLocation;
use App\Http\Controllers\Controller;
use App\Models\TransTools;

class TransLocationController extends Controller
{

    public function index()
    {
        $location = TransLocation::get();
        return view('planning.masterdata.masterdata_relasi_location.index', compact(['location']));
    }

    public function create()
    {
        $location = Location::all();
        $detail_location = DetailLocation::all();

        return view('planning.masterdata.masterdata_relasi_location.create', compact(['location', 'detail_location']));
    }

    public function store(Request $request)
    {
        TransLocation::create([
            'location_id' => $request->location_id,
            'detail_location_id' => $request->detail_location_id,
        ]);

        return redirect()->route('masterdata-relasi-location.index')->withNotify('Data berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $trans_location = TransLocation::findOrFail($id);
        $location = Location::all();
        $detail_location = DetailLocation::all();

        return view('planning.masterdata.masterdata_relasi_location.update', compact(['trans_location', 'location', 'detail_location']));
    }

    public function update(Request $request)
    {

        $id = $request->id;
        $trans_location = TransLocation::findOrFail($id);
        $trans_location->update([
            'location_id' => $request->location_id,
            'detail_location_id' => $request->detail_location_id
        ]);

        return redirect()->route('masterdata-relasi-location.index')->withNotify('Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
