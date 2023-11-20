<?php

namespace App\Http\Controllers;

use App\Models\Fund;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class FundController extends Controller
{
    public function index(Request $request)
    {
        $tahun = $request->tahun ?? Carbon::now()->format('Y');
        $fund = Fund::whereYear('tahun', $tahun)->get();
        return view('planning.masterdata.masterdata_fund.index', compact(['fund', 'tahun']));
    }

    public function create()
    {
        $tahun = Carbon::now()->format('Y');
        return view ('planning.masterdata.masterdata_fund.create', compact(['tahun']));
    }

    public function store (Request $request)
    {
        Fund::create([
            'name' => $request->name,
            'kegiatan' => $request->kegiatan,
            'init_value' => $request->init_value,
            'tahun' => $request->tahun,
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