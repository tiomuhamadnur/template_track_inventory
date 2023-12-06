<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function index()
    {
        $vendor = Vendor::all();
        return view('masterdata.masterdata_vendor.index', compact(['vendor']));
    }

    public function create()
    {
        return view('masterdata.masterdata_vendor.create');
    }


    public function store(Request $request)
    {
        Vendor::create([
            'name' => $request->name,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'pic' => $request->pic,
        ]);

        return redirect()->route('vendor.index')->withNotify('Data berhasil ditambahkan.');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $vendor = Vendor::findOrFail($id);
        if(!$vendor){
            return back();
        }
        return view('masterdata.masterdata_vendor.update', compact([
            'vendor',
        ]));
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $vendor = Vendor::findOrFail($id);
        if(!$vendor){
            return back();
        }
        $vendor->update([
            'name' => $request->name,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'pic' => $request->pic,
        ]);
        return redirect()->route('vendor.index')->withNotify('Data berhasil dimutakhirkan.');
    }

    public function destroy($id)
    {
        $vendor = Vendor::findOrFail($id);
        if(!$vendor){
            return back();
        }
        $vendor->delete();
        return redirect()->route('vendor.index')->withNotify('Data berhasil dihapus.');
    }
}