<?php

namespace App\Http\Controllers;

use App\Models\Tools;
use App\Models\Section;
use App\Models\Location;
use App\Models\Departement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Imports\planning\ToolsImport;
use App\Models\DetailLocation;
use Excel;
use Illuminate\Support\Facades\Storage;

class ToolsController extends Controller
{

    public function masterdata(Request $request)
    {
        if($request->has('search')){
            $tools = Tools::where('name', 'LIKE', '%' .$request->search. '%')->get();
        }else{
            $tools = Tools::get();
        }

        if ($tools->isEmpty()) {
            return view('planning.masterdata.masterdata_tools.index')->with('message', 'Pencarian tidak ditemukan');
        } else {
            return view('planning.masterdata.masterdata_tools.index', compact('tools'));
        }
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
        $this->validate($request, [
            'photo' => ['file', 'image', 'required'],
        ], [
            'photo.image' => 'File harus dalam format gambar/photo!',
        ]);

        if ($request->hasFile('photo') && $request->photo != '') {
            $photo = $request->file('photo')->store('masterdata/tools');
            Tools::create([
                'name' => $request->name,
                'code' => $request->code,
                'stock' => $request->stock,
                'unit'=> $request->unit,
                'location_id' => $request->location_id,
                'detail_location_id' => $request->detail_location_id,
                'section_id' => $request->section_id,
                'departement_id' => $request->departement_id,
                'description' => $request->description,
                'vendor' => $request->vendor,
                'tgl_beli' => $request->tgl_beli,
                'tgl_sertifikasi' => $request->tgl_sertifikasi,
                'tgl_expired' => $request->tgl_expired,
                'photo' => $photo,
            ]);
        }

        return redirect()->route('masterdata-tools')->withNotify('Data berhasil ditambahkan');
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
        if (!$tools){
            return back();
        }

        if ($request->hasFile('photo') && $request->photo != '') {
            $photo = $request->file('photo')->store('masterdata/tools');
            if($tools->photo != null){
                Storage::delete($tools->photo);
            }
            $tools->update([
                'name' => $request->name,
                'code' => $request->code,
                'stock' => $request->stock,
                'unit'=> $request->unit,
                'location_id' => $request->location_id,
                'detail_location_id' => $request->detail_location_id,
                'section_id' => $request->section_id,
                'departement_id' => $request->departement_id,
                'description' => $request->description,
                'vendor' => $request->vendor,
                'tgl_beli' => $request->tgl_beli,
                'tgl_sertifikasi' => $request->tgl_sertifikasi,
                'tgl_expired' => $request->tgl_expired,
                'photo' => $photo,
            ]);
        } else {
            $tools->update([
                'name' => $request->name,
                'code' => $request->code,
                'stock' => $request->stock,
                'unit'=> $request->unit,
                'location_id' => $request->location_id,
                'detail_location_id' => $request->detail_location_id,
                'section_id' => $request->section_id,
                'departement_id' => $request->departement_id,
                'description' => $request->description,
                'vendor' => $request->vendor,
                'tgl_beli' => $request->tgl_beli,
                'tgl_sertifikasi' => $request->tgl_sertifikasi,
                'tgl_expired' => $request->tgl_expired,
            ]);
        }
        return redirect()->route('masterdata-tools')->withNotify('Data berhasil diupdate');
    }

    public function import(Request $request)
    {
        dd($request);
        $this->validate($request, [
            'file_excel' => 'required|mimes:csv,xls,xlsx',
        ]);

        if (!$request->hasFile('file_excel')) {
            return redirect()->route('masterdata-tools');
        }

        Excel::import(new ToolsImport, request()->file('file_excel'));
        return redirect()->route('masterdata-tools')->withNotify('Data berhasil diimport!');
    }

}