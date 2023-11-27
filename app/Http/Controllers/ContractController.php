<?php

namespace App\Http\Controllers;

use App\Models\Fund;
use App\Models\User;
use App\Models\Section;
use App\Models\Contract;
use App\Models\Departement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\planning\ProgressContract;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ContractController extends Controller
{
    public function index()
    {

        $contracts = Contract::all();

        foreach ($contracts as $contract){
            $totalPaidValue = ProgressContract::where('contract_id', $contract->id)->sum('paid_value');
            $contract->total_paid_value = $totalPaidValue;

        }

        return view('planning.masterdata.masterdata_contract.index', compact(['contracts']));
    }

    public function create()
    {
        $fund = Fund::all();
        $section = Section::all();
        $user = User::all();
        $departement = Departement::all();

        return view('planning.masterdata.masterdata_contract.create', compact(['section', 'fund', 'departement', 'user']));
    }

    public function store(Request $request)
    {

        Contract::create([
            'name'=>$request->name,
            'no_contract' => $request->no_contract,
            'vendor'=> $request->vendor,
            'fund_id'=> $request->fund_id,
            'contract_value' => $request->contract_value,
            'remark'=> $request->remark,
            'status' => 'open',
            'section_id'=> $request->section_id,
            'departement_id'=> $request->departement_id
        ]);
        return redirect()->route('masterdata-contract.index')->withNotify('Data berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $tahun_ini = Carbon::now()->format('Y');
        $contract = Contract::findOrFail($id);
        $section = Section::all();
        $departement = Departement::all();
        $fund = Fund::whereYear('tahun', $tahun_ini)->get();

        return view('planning.masterdata.masterdata_contract.update', compact(['contract', 'section', 'departement', 'fund']));
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $contract = Contract::findOrFail($id);
        if ($contract){
            $contract->update([
                'name' => $request->name,
                'no_contract' => $request->no_contract,
                'vendor'=> $request->vendor,
                'fund_id'=> $request->fund_id,
                'contract_value' => $request->contract_value,
                'remark'=> $request->remark,
                'status'=>$request->status,
                'section_id'=> $request->section_id,
                'departement_id'=> $request->departement_id
            ]);
        }
        return redirect()->route(('masterdata-contract.index'))->withNotify('Data berhasil diupdate');
    }

    public function transaction($id)
    {
        $contract = Contract::findOrFail($id);
        if(!$contract){
            return back();
        }

        $progress = 0;
        $progress_contract = ProgressContract::where('contract_id', $id)->get();

        $contract_value = (int) $contract->contract_value;
        $progress_paid_value = ProgressContract::where('contract_id', $id)->where('status', 'paid')->sum('paid_value');
        if ($progress_paid_value){
            $progress = ($progress_paid_value/$contract_value) * 100;
        }
        $progress = number_format((double)$progress, 2, '.', '');

        return view('planning.masterdata.masterdata_contract.detail_contract', compact(['contract', 'progress_contract', 'progress_paid_value', 'progress']));
    }

    public function progress_store(Request $request)
    {
        ProgressContract::create([
            'contract_id' => $request->contract_id,
            'termin' => $request->termin,
            'description' => $request->description,
            'paid_value' => $request->paid_value,
            'tanggal_paid' => $request->tanggal_paid,
            'status' => $request->status,
        ]);

        // $progress_paid_value = ProgressContract::where('contract_id', $request->contract_id)->where('status', 'paid')->sum('paid_value');
        // $progress_contract = ProgressContract::findOrFail($request->contract_id);
        // if (!$progress_contract){
        //     return back();
        // }

        // $progress_contract->update([
        //     'paid_value' => $progress_paid_value,
        // ]);

        // $progress_contract_paid_value = Contract::where('fund_id', $contract->fund_id)->where('status', 'open')->sum('paid_value');
        // $fund = Fund::findOrFail($contract->fund_id);
        // $current = $fund->init_value;
        // $fund->update([
        //     'current_value' => $current - $progress_contract_paid_value,
        // ]);

        return back()->withNotify('Data berhasil ditambahkan!');
    }

    public function filter(Request $request)
    {
      $status = $request->status;
      $contract = Contract::query();

      $contract->when($status, function($query) use ($request){
        return $query->where('status', $request->status);
      });

      return view('planning.masterdata.masterdata_contract.index', ['contract' => $contract->get()]);


    }
}
