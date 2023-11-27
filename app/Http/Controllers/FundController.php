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
        $funds = Fund::where('tahun', $tahun)->get();

        $funds->each(function ($fund) {
            $contracts = Contract::where('fund_id', $fund->id)->get();
            $initValue = $fund->init_value;

            $totalPaidValue = 0;

            foreach ($contracts as $contract) {
                $progressContracts = $contract->progress_contract;

                if ($progressContracts) {
                    $totalPaidValue += $progressContracts->sum('paid_value');
                }
            }

            $currentValue = $initValue - $totalPaidValue;

            $fund->current_value = $currentValue;
        });


        return view('planning.masterdata.masterdata_fund.index', compact(['funds', 'tahun']));
    }

    public function create()
    {
        $tahun = Carbon::now()->format('Y');
        return view('planning.masterdata.masterdata_fund.create', compact(['tahun']));
    }

    public function store(Request $request)
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
        if ($fund) {
            $fund->update([
                'name' => $request->name,
                'kegiatan' => $request->kegiatan,
                'init_value' => $request->init_value,
            ]);
        }
        return redirect()->route(('masterdata-fund.index'))->withNotify('Data berhasil diupdate');
    }

    public function transaction($id)
    {
        $fund = Fund::findOrFail($id);
        $contracts = Contract::where('fund_id', $fund->id)->get();

        foreach ($contracts as $contract) {
            $totalPaidValue = ProgressContract::where('contract_id', $contract->id)->sum('paid_value');
            $contract->total_paid_value = $totalPaidValue;
        }

        $penyerapan_anggaran = $contracts->sum('total_paid_value');
        $persentase_penyerapan_anggaran = ($penyerapan_anggaran / $fund->init_value) * 100;
        $persentase_penyerapan_anggaran = number_format($persentase_penyerapan_anggaran, 2, '.', '');

        return view('planning.masterdata.masterdata_fund.detail_fund', compact([
            'fund',
            'contracts',
            'penyerapan_anggaran',
            'persentase_penyerapan_anggaran',
        ]));
    }
}