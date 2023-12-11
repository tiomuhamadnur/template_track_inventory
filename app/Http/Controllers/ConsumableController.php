<?php

namespace App\Http\Controllers;

use App\Models\Consumable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Imports\planning\ConsumableImport;
use App\Models\DetailLocation;
use App\Models\Location;
use Excel;
use Illuminate\Support\Facades\Storage;

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
        $this->validate($request, [
            'photo' => ['file', 'image', 'required'],
        ], [
            'photo.image' => 'File harus dalam format gambar/photo!',
        ]);

        if ($request->hasFile('photo') && $request->photo != '') {
            $photo = $request->file('photo')->store('masterdata/consumable');
            Consumable::create([
                'name' => $request->name,
                'code' => $request->code,
                'stock' => $request->stock,
                'safety_stock' => $request->safety_stock,
                'unit'=> $request->unit,
                'location_id' => $request->location_id,
                'detail_location_id' => $request->detail_location_id,
                'description' => $request->description,
                'vendor' => $request->vendor,
                'tgl_beli' => $request->tgl_beli,
                'tgl_sertifikasi' => $request->tgl_sertifikasi,
                'tgl_expired' => $request->tgl_expired,
                'photo' => $photo,
            ]);
        }

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
        if ($request->hasFile('photo') && $request->photo != '') {
            $photo = $request->file('photo')->store('masterdata/tools');
            Storage::delete($consumable->photo);
            $consumable->update([
                'name' => $request->name,
                'code' => $request->code,
                'stock' => $request->stock,
                'safety_stock' => $request->safety_stock,
                'unit'=> $request->unit,
                'location_id' => $request->location_id,
                'detail_location_id' => $request->detail_location_id,
                'description' => $request->description,
                'vendor' => $request->vendor,
                'tgl_beli' => $request->tgl_beli,
                'tgl_sertifikasi' => $request->tgl_sertifikasi,
                'tgl_expired' => $request->tgl_expired,
                'photo' => $photo,
            ]);
        } else {
            $consumable->update([
                'name' => $request->name,
                'code' => $request->code,
                'stock' => $request->stock,
                'safety_stock' => $request->safety_stock,
                'unit'=> $request->unit,
                'location_id' => $request->location_id,
                'detail_location_id' => $request->detail_location_id,
                'description' => $request->description,
                'vendor' => $request->vendor,
                'tgl_beli' => $request->tgl_beli,
                'tgl_sertifikasi' => $request->tgl_sertifikasi,
                'tgl_expired' => $request->tgl_expired,
            ]);
        }

        return redirect(route('masterdata-consumable.index'))->withNotify('Data berhasil diupdate!');
    }

    public function destroy($id)
    {
        //
    }

    public function import(Request $request)
    {
        dd($request);
        $this->validate($request, [
            'file_excel' => 'required|mimes:csv,xls,xlsx',
        ]);

        if (!$request->hasFile('file_excel')) {
            return redirect()->route('masterdata-consumable.index');
        }

        Excel::import(new ConsumableImport, request()->file('file_excel'));
        return redirect()->route('masterdata-consumable.index')->withNotify('Data berhasil diimport!');
    }
}