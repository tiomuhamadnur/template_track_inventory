<?php

namespace App\Http\Controllers;

use App\Models\Consumable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DetailLocation;
use App\Models\Location;

class ConsumableController extends Controller
{

    public function index(Request $request)
    {
        if($request->has('search')){
            $consumable = Consumable::where('name', 'LIKE','%'.$request->search.'%')->get();
        }else{
            $consumable = Consumable::all();
        };

        return view('planning.masterdata.masterdata_consumable.index', compact(['consumable']));
    }

    public function create()
    {
        $location = Location::orderBy('name', 'ASC')->get();
        return view('planning.masterdata.masterdata_consumable.create', compact(['location']));
    }

    public function store(Request $request)
    {
        Consumable::create([
            'name' => $request->name,
            'code' => $request->code,
            'stock' => $request->stock,
            'unit' => $request->unit,
            'location_id' => $request->location_id,
            'detail_location_id' => $request->detail_location_id,
        ]);

        return redirect(route('masterdata-consumable.index'))->withNotify('Data berhasil ditambahkan!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $consumable = Consumable::findOrFail($id);
        if(!$consumable){
            return back();
        }
        $location = Location::orderBy('name', 'ASC')->get();
        $detail_location = DetailLocation::orderBy('name', 'ASC')->get();

        return view('planning.masterdata.masterdata_consumable.update', compact(['consumable', 'location', 'detail_location']));
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $consumable = Consumable::findOrFail($id);
        if (!$consumable){
            return back();
        }
        $consumable->update([
            'name' => $request->name,
            'code' => $request->code,
            'stock' => $request->stock,
            'unit' => $request->unit,
            'location_id' => $request->location_id,
            'detail_location_id' => $request->detail_location_id,
        ]);

        return redirect(route('masterdata-consumable.index'))->withNotify('Data berhasil diupdate!');
    }

    public function destroy($id)
    {
        //
    }
}