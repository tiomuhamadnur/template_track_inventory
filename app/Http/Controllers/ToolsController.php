<?php

namespace App\Http\Controllers;

use App\Models\Tools;
use App\Models\Section;
use App\Models\Location;
use App\Models\Departement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ToolsController extends Controller
{

    public function masterdata()
    {
        $tools = Tools::get();
        return view('planning.masterdata.masterdata_tools.index', compact(['tools']));
    }

    public function user_activity()
    {
        return 'ini Page User';
    }

    public function create()
    {
        $section = Section::get();
        $departement =  Departement::get();
        $location = Location::get();
        return view('planning.masterdata.masterdata_tools.create', compact(['section', 'location', 'departement']));
    }

    public function store(Request $request)
    {
        Tools::create([
            'name' => $request->name,
            'code' => $request->code,
            'location_id' => $request->location_id,
            'section_id' => $request->section_id,
            'departement_id' => $request->departement_id,
            'stocks' => $request->stocks,
            'satuan'=> $request->satuan
        ]);

        return redirect(route('masterdata-tools'))->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $tools = Tools::findOrFail($id);

        return view('planning.masterdata.masterdata_tools.update', compact(['tools']));
    }

    public function update (Request $request)
    {
        $id = $request->id;
        $tools = Tools::findOrFail($id);
        if ($tools){
            $tools->update([
                'name' => $request->name,
                'code' => $request->code,
            ]);
        }
        return redirect(route('masterdata-tools'));
    }

}
