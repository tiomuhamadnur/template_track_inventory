<?php

namespace App\Http\Controllers;

use App\Models\Tools;
use App\Models\Location;
use App\Models\TransTools;
use Illuminate\Http\Request;
use App\Models\DetailLocation;
use App\Http\Controllers\Controller;

class TransToolsController extends Controller
{

    public function index()
    {
        $tools = TransTools::get();
        return view('planning.masterdata.masterdata_relasi_tools.index', compact(['tools']));
    }

    public function create()
    {
        $location = Location::all();
        $detail_location = DetailLocation::all();
        $tools = Tools::all();

        return view('planning.masterdata.masterdata_relasi_tools.create', compact(['location', 'detail_location', 'tools']));
    }

    public function store(Request $request)
    {
        TransTools::create([
            'tools_id' => $request->tools_id,
            'location_id'=> $request->location_id,
            'detail_location_id'=> $request->detail_location_id
        ]);

        return redirect()->route('masterdata-relasi-tools.index')->withNotify('Data berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $trans_tools = TransTools::findOrFail($id);
        $tools = Tools::all();
        $detail_location = DetailLocation::all();
        $location = Location::all();

        return view('planning.masterdata.masterdata_relasi_tools.update', compact(['trans_tools', 'tools', 'detail_location', 'location']));
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $trans_tools = TransTools::findOrFail($id);
        $trans_tools->update([
            'tools_id' => $request->tools_id,
            'location_id' => $request->location_id,
            'detail_location_id' => $request->detail_location_id
        ]);

        return redirect()->route('masterdata-relasi-tools.index')->withNotify('Data berhasil diupdate!');
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
