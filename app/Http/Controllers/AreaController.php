<?php

namespace App\Http\Controllers;

use App\Exports\AreaExport;
use App\Models\Area;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Excel;

class AreaController extends Controller
{
    public function index()
    {
        $area = Area::all();

        return view('mainline.mainline_area.index', compact(['area']));
    }

    public function create()
    {
        return view('mainline.mainline_area.create');
    }

    public function store(Request $request)
    {
        Area::create([
            'name' => $request->name,
            'code' => $request->code,
            'area' => $request->area,
            'stasiun' => $request->stasiun,
        ]);

        return redirect()->route('area.index');
    }

    public function export_excel()
    {
        $waktu = Carbon::now()->format('Ymd');
        return Excel::download(new AreaExport(), $waktu . '_area.xlsx', \Maatwebsite\Excel\Excel::XLSX);
    }

    public function edit($id)
    {
        $area = Area::findOrFail($id);

        return view('mainline.mainline_area.update', compact(['area']));
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $area = Area::findOrFail($id);
        if ($area) {
            $area->update([
                'name' => $request->name,
                'code' => $request->code,
                'area' => $request->area,
                'stasiun' => $request->stasiun,
            ]);
        }

        return redirect()->route('area.index');
    }

    public function destroy($id)
    {
        $area = Area::findOrFail($id);
        $area->delete();

        return redirect()->route('area.index');
    }
}