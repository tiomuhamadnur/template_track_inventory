<?php

namespace App\Http\Controllers;

use App\Exports\MainlineExport;
use App\Imports\MainlineImport;
use App\Models\Area;
use App\Models\Line;
use App\Models\Mainline;
use Illuminate\Http\Request;
use Excel;
// use Maatwebsite\Excel\Excel as Excel;
use Maatwebsite\Excel\Facades\Excel as FacadesExcel;
use Yajra\DataTables\DataTables;

class MainlineController extends Controller
{
    public function index()
    {
        // $mainline = Mainline::select(
        //     "mainline.*",
        //     'area.code as area_code',
        //     'line.code as line_code',
        // )
        // ->join('area', 'area.id', '=', 'mainline.area_id')
        // ->join('line', 'line.id', '=', 'mainline.line_id')
        // ->get();

        // return view('mainline.report.report', compact(['mainline']));
        // return view('mainline.index', compact(['mainline']));
        return view('mainline.mainline');
    }

    public function getJson()
    {
        $mainline = Mainline::select(
            "mainline.*",
            'area.code as area_code',
            'line.code as line_code',
        )
        ->join('area', 'area.id', '=', 'mainline.area_id')
        ->join('line', 'line.id', '=', 'mainline.line_id')
        ->get();
        return DataTables::of($mainline)->make(true);
        // return response()->json($mainline);
    }

    public function create()
    {
        $area = Area::all();
        $line = Line::all();
        return view('mainline.create', compact(['area', 'line']));
    }

    public function store(Request $request)
    {
        Mainline::create([
            "area_id" => $request->area_id,
            "line_id" => $request->line_id,
            "no_span" => $request->no_span,
            "kilometer" => $request->kilometer,
            "panjang_span" => $request->panjang_span,
            "jumlah_sleeper" => $request->jumlah_sleeper,
            "spacing_sleeper" => $request->spacing_sleeper,
            "jenis_sleeper" => $request->spacing_sleeper,
            "joint" => $request->joint,
        ]);
        return redirect()->route('mainline.index');
    }

    public function import(Request $request)
    {
        // validasi
		$this->validate($request, [
			'file_excel' => 'required|mimes:csv,xls,xlsx'
		]);
        
        if ($request->hasFile('file_excel')){
            Excel::import(new MainlineImport, request()->file('file_excel'));
            return redirect()->route('mainline.index');
        } else {
            return redirect()->route('mainline.index');
        }
    }

    public function export(){
        return Excel::download(new MainlineExport, 'mainline.xlsx', \Maatwebsite\Excel\Excel::XLSX);
    }

    public function edit($id)
    {
        $mainline = Mainline::findOrFail($id);
        $area = Area::all();
        $line = Line::all();
        return view('mainline.edit', compact(['mainline', 'area', 'line']));
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $mainline = Mainline::findOrFail($id);
        $mainline->update([
            "area_id" => $request->area_id,
            "line_id" => $request->line_id,
            "no_span" => $request->no_span,
            "kilometer" => $request->kilometer,
            "panjang_span" => $request->panjang_span,
            "jumlah_sleeper" => $request->jumlah_sleeper,
            "spacing_sleeper" => $request->spacing_sleeper,
            "jenis_sleeper" => $request->spacing_sleeper,
            "joint" => $request->joint,
        ]);
        return redirect()->route('mainline.index');
    }

    public function destroy($id)
    {
        $mainline = Mainline::findOrFail($id);
        $mainline->delete();
        return redirect()->route('mainline.index');
    }
}