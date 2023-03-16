<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;

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

    public function show($id)
    {
        //
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
