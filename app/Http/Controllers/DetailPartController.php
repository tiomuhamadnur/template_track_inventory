<?php

namespace App\Http\Controllers;

use App\Models\DetailPart;
use App\Models\Part;
use Illuminate\Http\Request;

class DetailPartController extends Controller
{
    public function index()
    {
        $detail_part = DetailPart::all();
        return view('mainline.mainline_detailpart.index', compact(['detail_part']));
        // return view('part.detail_part.index', compact(['detail_part']));
    }

    public function create()
    {
        // $part = Part::all();
        return view('mainline.mainline_detailpart.create');
        // return view('part.detail_part.create', compact(['part']));
    }

    public function store(Request $request)
    {
        DetailPart::create([
            'name' => $request->name,
            'part_id' => $request->part_id,
        ]);
        return redirect()->route('detail-part.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $detail_part = DetailPart::findOrFail($id);
        $part = Part::all();
        return view('part.detail_part.edit', compact(['detail_part', 'part']));
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $detail_part = DetailPart::findOrFail($id);
        $detail_part->update([
            'name' => $request->name,
            'part_id' => $request->part_id,
        ]);
        return redirect()->route('detail-part.index');
    }

    public function destroy($id)
    {
        //
    }
}