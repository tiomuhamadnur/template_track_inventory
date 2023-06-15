<?php

namespace App\Http\Controllers;

use App\Imports\LengkungImport;
use App\Models\Area;
use App\Models\Lengkung;
use App\Models\Line;
use Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LengkungController extends Controller
{
    public function index()
    {
        $lengkung = Lengkung::orderBy(DB::raw('CAST(ip AS FLOAT)', 'asc'))->get();
        $area = Area::where('stasiun', 'false')->get();
        $line = Line::all();

        return view('masterdata.masterdata_lengkung.index', compact(['lengkung', 'area', 'line']));
    }

    public function filter(Request $request)
    {
        // dd($request);
        $area_id = $request->area_id;
        $line_id = $request->line_id;
        $tipe = $request->tipe;
        $radius = $request->radius;

        $area = Area::where('stasiun', 'false')->get();
        $line = Line::all();

        $lengkung = Lengkung::query()->select(
            'lengkung.*',
        );

        // Filter by area_id
        $lengkung->when($area_id, function ($query) use ($request) {
            return $query->where('area_id', $request->area_id);
        });

        // Filter by line_id
        $lengkung->when($line_id, function ($query) use ($request) {
            return $query->where('line_id', $request->line_id);
        });

        // Filter by tipe
        $lengkung->when($tipe, function ($query) use ($request) {
            return $query->where('tipe', $request->tipe);
        });

        // Filter by radius
        if ($radius == '<=') {
            $lengkung->where(DB::raw('CAST(radius AS FLOAT)'), '<=' ,600);
        }
        elseif ($radius == '>') {
            $lengkung->where(DB::raw('CAST(radius AS FLOAT)'), '>' ,600);
        }

        return view('masterdata.masterdata_lengkung.index',
        [
            'lengkung' => $lengkung->orderBy(DB::raw('CAST(ip AS FLOAT)', 'asc'))->get(),
            'area' => $area,
            'line'=> $line,
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function import(Request $request)
    {
        $this->validate($request, [
            'file_excel' => 'required|mimes:csv,xls,xlsx',
        ]);

        if ($request->hasFile('file_excel')) {
            Excel::import(new LengkungImport, request()->file('file_excel'));

            return redirect()->route('lengkung.index')->withNotify('Data berhasil diimport!');
        } else {
            return redirect()->route('lengkung.index');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request)
    {
        //
    }

    public function destroy(Request $request)
    {
        //
    }
}