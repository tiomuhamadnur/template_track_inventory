<?php

namespace App\Http\Controllers;

use App\Models\Defect;
use App\Models\DetailPart;
use Illuminate\Http\Request;

class DefectController extends Controller
{
    public function index()
    {
        $defect = Defect::all();
        return view('mainline.mainline_defect.index', compact(['defect']));
        // return view('defect.index', compact(['defect']));
    }

    public function create()
    {
        // $detail_part = DetailPart::all();
        return view('mainline.mainline_defect.create');
        // return view('defect.create', compact(['detail_part']));
    }

    public function store(Request $request)
    {
        Defect::create([
            'name' => $request->name,
            'detail_part_id' => $request->detail_part_id,
        ]);
        return redirect()->route('defect.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $defect = Defect::findOrFail($id);
        $detail_part = DetailPart::all();
        return view('defect.edit', compact(['defect', 'detail_part']));
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $defect = Defect::findOrFail($id);
        $defect->update([
            'name' => $request->name,
            'detail_part_id' => $request->detail_part_id,
        ]);
        return redirect()->route('defect.index');
    }

    public function destroy($id)
    {
        $defect = Defect::findOrFail($id);
        $defect->delete();
        return redirect()->route('defect.index');
    }
}