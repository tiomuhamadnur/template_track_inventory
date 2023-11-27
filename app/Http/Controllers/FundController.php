<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Fund;
use App\Models\Contract;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\planning\ProgressContract;

class FundController extends Controller
{
    public function index(Request $request)
    {
        $tahun = $request->tahun ?? Carbon::now()->format('Y');
        $funds = Fund::all();

        foreach ($funds as $fund) {

            $contract = Contract::where('fund_id', $fund->id)->first();
            $init_value = Fund::where('init_value', $fund->init_value)->first();

            if ($contract) {
                $totalPaidValue = ProgressContract::where('contract_id', $contract->id)->sum('paid_value');
                $currentValue = $fund->init_value - $totalPaidValue;
                $fund->current_value = $currentValue;

            } elseif ($contract) {
                $fund->current_value = $fund->init_value;

            } else {
                $fund->current_value = null;
            }
        }


        return view('planning.masterdata.masterdata_fund.index', compact(['funds', 'tahun']));
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

    public function transaction($id)
    {
        $fund = Fund::findOrFail($id);
        $contract = Contract::where('fund_id', $id)->get();

        return view('planning.masterdata.masterdata_fund.detail_fund', compact(['fund', 'contract']));
    }

}
