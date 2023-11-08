<?php

namespace App\Http\Controllers\civil;

use App\Exports\civil\PartExport;
use App\Http\Controllers\Controller;
use App\Models\civil\PartCivil;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Excel;

class PartCivilController extends Controller
{
    public function index()
    {
        $part = PartCivil::orderBy('name', 'ASC')->get();
        return view('civil.masterdata.masterdata_part.index', compact(['part']));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        PartCivil::create([
            'name' => $request->name,
            'code' => $request->code,
        ]);

        return redirect()->route('part-civil.index')->withNotify('Data berhasil ditambahkan!');
    }

    public function export_excel()
    {
        $waktu = Carbon::now()->format('Ymd');
        return Excel::download(new PartExport(), $waktu . '_part_civil.xlsx', \Maatwebsite\Excel\Excel::XLSX);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $part = PartCivil::findOrFail($id);
        if (!$part) {
            return back();
        }
        $part->update([
            'name' => $request->name,
            'code' => $request->code,
        ]);
        return redirect()->route('part-civil.index')->withNotify('Data berhasil diubah!');
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $part = PartCivil::findOrFail($id);
        if (!$part) {
            return back();
        }
        $part->delete();
        return redirect()->route('part-civil.index')->withNotify('Data berhasil dihapus!');
    }
}