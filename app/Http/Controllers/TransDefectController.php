<?php

namespace App\Http\Controllers;

use App\Imports\TransDefectImport;
use App\Models\Defect;
use App\Models\DetailPart;
use App\Models\Part;
use App\Models\TransDefect;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class TransDefectController extends Controller
{
    public function index()
    {
        $part = TransDefect::all();
        return view('mainline.mainline_relasidefect.index', compact(['part']));
        // return view('trans_defect.index', compact(['part']));
    }

    public function import(Request $request)
    {
		$this->validate($request, [
			'file_excel' => 'required|mimes:csv,xls,xlsx'
		]);

        if ($request->hasFile('file_excel')){
            Excel::import(new TransDefectImport, request()->file('file_excel'));
            return redirect()->route('transDefect.index');
        } else {
            return redirect()->route('transDefect.index');
        }
    }

    public function create()
    {
        $part = Part::all();
        $detail_part = DetailPart::all();
        $defect = Defect::all();
        return view('mainline.mainline_relasidefect.create', compact(['part', 'detail_part', 'defect']));
        // return view('trans_defect.create', compact(['part', 'detail_part', 'defect']));
    }

    public function store(Request $request)
    {
        TransDefect::create([
            'part_id' => $request->part_id,
            'detail_part_id' => $request->detail_part_id,
            'defect_id' => $request->defect_id,
        ]);
        return redirect()->route('transDefect.index')->withNotify('Data berhasil ditambahkan!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $trans_defect = TransDefect::findOrFail($id);
        $part = Part::all();
        $detail_part = DetailPart::all();
        $defect = Defect::all();
        return view('mainline.mainline_relasidefect.update', compact(['trans_defect', 'part', 'detail_part', 'defect']));
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $trans_defect = TransDefect::findOrFail($id);
        $trans_defect->update([
            'part_id' => $request->part_id,
            'detail_part_id' => $request->detail_part_id,
            'defect_id' => $request->defect_id,
        ]);
        return redirect()->route('transDefect.index')->withNotify('Data berhasil diupdate!');
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $trans_defect = TransDefect::findOrFail($id);
        if ($trans_defect) {
            $trans_defect->delete();
            return redirect()->route('transDefect.index')->withNotify('Data berhasil dihapus!');
        } else {
            return redirect()->back();
        }
    }
}