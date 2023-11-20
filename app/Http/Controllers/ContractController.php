<?php

namespace App\Http\Controllers;

use App\Models\Fund;
use App\Models\User;
use App\Models\Section;
use App\Models\Contract;
use App\Models\Departement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContractController extends Controller
{
    public function index()
    {
        $contract = Contract::all();
        return view('planning.masterdata.masterdata_contract.index', compact(['contract']));
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
            'no_contract' => $request->no_contract,
            'vendor'=> $request->vendor,
            'fund_id'=> $request->fund_id,
            'contract_value' => $request->contract_value,
            'remark'=> $request->remark,
            'status' => $request->status,
            'section_id'=> $request->section_id,
            'departement_id'=> $request->departement_id
        ]);
        return redirect()->route('masterdata-contract.index')->withNotify('Data berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $contract = Contract::findOrFail($id);
        $section = Section::all();
        $departement = Departement::all();
        $fund = Fund::all();

        return view('planning.masterdata.masterdata_contract.update', compact(['contract', 'section', 'departement', 'fund']));
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $contract = Contract::findOrFail($id);
        if ($contract){
            $contract->update([
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
        $section = Section::all();
        $departement = Departement::all();
        $fund = Fund::all();

        return view('planning.masterdata.masterdata_contract.detail_contract', compact(['contract']));
    }
}
