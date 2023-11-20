<?php

namespace App\Http\Controllers;

use App\Models\Fund;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FundController extends Controller
{
    public function index()
    {
        $fund = Fund::all();
        return view('planning.masterdata.masterdata_fund.index', compact(['fund']));
    }

    public function create()
    {
        return view ('planning.masterdata.masterdata_fund.create');
    }

    public function store (Request $request)
    {
        Fund::create([
            'name' => $request->name,
            'kegiatan' => $request->kegiatan,
            'init_value' => $request->init_value,
        ]);

        return redirect()->route('masterdata-fund.index')->withNotify('Data berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $fund = Fund::findOrFail($id);

        return view('planning.masterdata.masterdata_fund.update', compact(['fund']));

    }

    public function update(Request $request)
    {
        $id = $request->id;
        $fund = Fund::findOrFail($id);
        if ($fund){
            $fund->update([
                'name'=> $request->name,
                'kegiatan' => $request->kegiatan,
                'init_value' => $request->init_value,
            ]);
        }
        return redirect()->route(('masterdata-fund.index'))->withNotify('Data berhasil diupdate');
    }
}
