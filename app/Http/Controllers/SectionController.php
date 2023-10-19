<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controllerju
{
    public function index()
    {
        $section = Section::all();
        return view('masterdata.masterdata_section.index', compact(['section']));
    }

    public function create()
    {
        $departement = Departement::all();
        return view('masterdata.masterdata_section.create', compact(['departement']));
    }

    public function store(Request $request)
    {
        Section::create([
            'name' => $request->name,
            'code' => $request->code,
            'departement_id' => $request->departement_id,
        ]);

        return redirect()->route('section.index')->withNotify('Data section berhasil ditambahkan!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $departement = Departement::all();
        $section = Section::findOrFail($id);
        if (!$section){
            return redirect()->back();
        }
        return view('masterdata.masterdata_section.update', compact(['section', 'departement']));
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $section = Section::findOrFail($id);
        if (!$section) {
            return redirect()->back();
        }
        $section->update([
            'name' => $request->name,
            'code' => $request->code,
            'departement_id' => $request->departement_id,
        ]);

        return redirect()->route('section.index')->withNotify('Data section berhasil diupdate!');
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $section = Section::findOrFail($id);
        if (!$section) {
            return redirect()->back();
        }
        $section->delete();

        return redirect()->route('section.index')->withNotify('Data section berhasil dihapus!');
    }
}
