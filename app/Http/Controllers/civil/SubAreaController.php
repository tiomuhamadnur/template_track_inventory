<?php

namespace App\Http\Controllers\civil;

use App\Exports\civil\SubAreaExport;
use App\Http\Controllers\Controller;
use App\Models\civil\SubArea;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Excel;

class SubAreaController extends Controller
{
    public function index()
    {
        $sub_area = SubArea::all();
        return view('civil.masterdata.masterdata_sub_area.index', compact(['sub_area']));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        SubArea::create([
            'name' => $request->name,
            'code' => $request->code,
        ]);

        return redirect()->route('sub-area.index')->withNotify('Data berhasil ditambahkan!');
    }

    public function export_excel()
    {
        $waktu = Carbon::now()->format('Ymd');
        return Excel::download(new SubAreaExport(), $waktu . '_sub_area.xlsx', \Maatwebsite\Excel\Excel::XLSX);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $sub_area = SubArea::findOrFail($id);
        if (!$sub_area) {
            return back();
        }
        $sub_area->update([
            'name' => $request->name,
            'code' => $request->code,
        ]);
        return redirect()->route('sub-area.index')->withNotify('Data berhasil diubah!');
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $sub_area = SubArea::findOrFail($id);
        if (!$sub_area) {
            return back();
        }
        $sub_area->delete();
        return redirect()->route('sub-area.index')->withNotify('Data berhasil dihapus!');
    }
}