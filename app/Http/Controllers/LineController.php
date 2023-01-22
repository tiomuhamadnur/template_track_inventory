<?php

namespace App\Http\Controllers;

use App\Models\Line;
use Illuminate\Http\Request;

class LineController extends Controller
{
    public function index()
    {
        $line = Line::all();
        return view('line.index', compact(['line']));
    }

    public function create()
    {
        return view('line.create');
    }

    public function store(Request $request)
    {
        Line::create([
            'name' => $request->name,
            'code' => $request->code,
            'area' => $request->area,
        ]);
        return redirect(route('line.index'))->with('success', 'data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $line = Line::findOrFail($id);
        return view('line.edit', compact(['line']));
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $line = Line::findOrFail($id);
        $line->update([
            'name' => $request->name,
            'code' => $request->code,
            'area' => $request->area,
        ]);
        return redirect(route('line.index'));
    }

    public function destroy($id)
    {
        $line = Line::findOrFail($id);
        $line->delete();
        return redirect()->route('line.index');
    }
}