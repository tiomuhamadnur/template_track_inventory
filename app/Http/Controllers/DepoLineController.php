<?php

namespace App\Http\Controllers;

use App\Models\Line;
use Illuminate\Http\Request;

class DepoLineController extends Controller
{
    public function index()
    {
        $line_depo = Line::where('area', 'Depo')->get();
        return view('depo.depo_line.index', compact(['line_depo']));
    }

    public function create()
    {
        return view('depo.depo_line.create');
    }

    public function store(Request $request)
    {
        Line::create([
            'name' => $request->name,
            'code' => $request->code,
            'area' => $request->area,
        ]);
        return redirect()->route('depoline.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $line_depo = Line::findOrFail($id);
        if ($line_depo){
            return view('depo.depo_line.update', compact(['line_depo']));
        }
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $line_depo = Line::findOrFail($id);
        if ($line_depo) {
            $line_depo->update([
                'name' => $request->name,
                'code' => $request->code,
                'area' => $request->area,
            ]);
        }
        return redirect()->route('depoline.index');
    }

    public function destroy($id)
    {
        //
    }
}
