<?php

namespace App\Http\Controllers;

use App\Models\Tools;
use App\Models\Section;
use App\Models\Location;
use App\Models\Departement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DetailLocation;

class ToolsController extends Controller
{

    public function masterdata(Request $request)
    {
        if($request->has('search')){
            $tools = Tools::where('name', 'LIKE', '%' .$request->search. '%')->get();
        }else{
            $tools = Tools::get();
        }

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
            'stock' => $request->stock,
            'unit'=> $request->unit,
            'location_id' => $request->location_id,
            'detail_location_id' => $request->detail_location_id,
            'section_id' => $request->section_id,
            'departement_id' => $request->departement_id,
        ]);

        return redirect(route('masterdata-tools'))->withNotify('Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $tools = Tools::findOrFail($id);
        $location = Location::all();
        $detail_location = DetailLocation::all();
        $section = Section::all();
        $departement =  Departement::get();

        return view('planning.masterdata.masterdata_tools.update', compact(['tools', 'location', 'detail_location' , 'section', 'departement']));
    }

    public function filter(Request $request)
    {
        $section_id = $request->section_id;
        $tools = Tools::query();

        $tools->when($section_id, function($query) use ($request){
            return $query->where('section_id', $request->section_id);
        });

        return view('planning.masterdata.masterdata_tools.index', ['tools' => $tools->get()]);
    }

    public function update (Request $request)
    {
        $id = $request->id;
        $tools = Tools::findOrFail($id);
        if ($tools){
            $tools->update([
                'name' => $request->name,
                'code' => $request->code,
                'stock' => $request->stock,
                'unit' => $request->unit,
                'location_id' => $request->location_id,
                'detail_location_id' => $request->detail_location_id,
                'section_id' => $request->section_id,
            ]);
        }
        return redirect(route('masterdata-tools'))->withNotify('Data berhasil diupdate');
    }

}