<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LocationController extends Controller
{

    public function index()
    {
        $location = Location::all();

        return view('planning.masterdata.masterdata_location.index', compact(['location']));
    }

    public function create()
    {

        return view('planning.masterdata.masterdata_location.create');
    }


    public function store(Request $request)
    {
        Location::create([
            'code' => $request->code,
            'name' => $request->name,
        ]);

        return redirect()->route('masterdata-location.index')->withNotify('Data berhasil ditambahkan!');
    }

    public function show($id)
    {
        // return view('planning.masterdata.masterdata_location.edit');
    }


    public function edit($id)
    {
        $location = Location::findOrFail($id);

        return view('planning.masterdata.masterdata_location.update', compact(['location']));
    }


    public function update(Request $request)
    {
        $id = $request->id;
        $location = Location::findOrFail($id);
        $location->update([
            'code'=> $request->code,
            'name' => $request->name,
        ]);

        return redirect()->route('masterdata-location.index')->withNotify('Data berhasil diupdate!');
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $location = Location::findOrFail($id);
        if ($location){
            $location->delete()->withNotify('Data berhasil dihapus!');
        } else {
            return redirect()->back();
        }
    }
}
