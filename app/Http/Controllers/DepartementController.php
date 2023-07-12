<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\Section;
use Illuminate\Http\Request;

class DepartementController extends Controller
{
    public function index()
    {
        $departement = Departement::all();
        return view('masterdata.masterdata_departement.index', compact(['departement']));
    }

    public function create()
    {
        return view('masterdata.masterdata_departement.create');
    }

    public function store(Request $request)
    {
        Departement::create([
            'name' => $request->name,
            'code' => $request->code,
        ]);

        return redirect()->route('departement.index')->withNotify('Data departement berhasil ditambahkan!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $departement = Departement::findOrFail($id);
        if (!$departement){
            return redirect()->back();
        }
        return view('masterdata.masterdata_departement.update', compact(['departement']));
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $departement = Departement::findOrFail($id);
        if (!$departement) {
            return redirect()->back();
        }
        $departement->update([
            'name' => $request->name,
            'code' => $request->code,
        ]);

        return redirect()->route('departement.index')->withNotify('Data departement berhasil diupdate!');
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $departement = Departement::findOrFail($id);
        $section = Section::where('departement_id', $id)->count();

        if ((!$departement) or ($section > 0)) {
            return redirect()->back();
        }
        $departement->delete();

        return redirect()->route('departement.index')->withNotify('Data departement berhasil dihapus!');
    }
}