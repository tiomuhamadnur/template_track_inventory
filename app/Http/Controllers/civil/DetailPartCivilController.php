<?php

namespace App\Http\Controllers\civil;

use App\Exports\civil\DetailPartExport;
use App\Http\Controllers\Controller;
use App\Models\civil\DetailPartCivil;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Excel;

class DetailPartCivilController extends Controller
{
    public function index()
    {
        $detail_part = DetailPartCivil::orderBy('name', 'ASC')->get();
        return view('civil.masterdata.masterdata_detail_part.index', compact(['detail_part']));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        DetailPartCivil::create([
            'name' => $request->name,
            'code' => $request->code,
        ]);

        return redirect()->route('detail-part-civil.index')->withNotify('Data berhasil ditambahkan!');
    }

    public function export_excel()
    {
        $waktu = Carbon::now()->format('Ymd');
        return Excel::download(new DetailPartExport(), $waktu . '_detail_part_civil.xlsx', \Maatwebsite\Excel\Excel::XLSX);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $detail_part = DetailPartCivil::findOrFail($id);
        if (!$detail_part) {
            return back();
        }
        $detail_part->update([
            'name' => $request->name,
            'code' => $request->code,
        ]);
        return redirect()->route('detail-part-civil.index')->withNotify('Data berhasil diubah!');
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $detail_part = DetailPartCivil::findOrFail($id);
        if (!$detail_part) {
            return back();
        }
        $detail_part->delete();
        return redirect()->route('detail-part-civil.index')->withNotify('Data berhasil dihapus!');
    }
}