<?php

namespace App\Http\Controllers;

use App\Imports\TransDefectImport;
use App\Models\Part;
use App\Models\TransDefect;
use Illuminate\Http\Request;
use Excel;

class PartController extends Controller
{
    public function index()
    {
        $part = Part::all();
        return view('part.index', compact(['part']));
    }

    public function create()
    {
        return view('part.create');
    }

    public function import(Request $request)
    {
		$this->validate($request, [
			'file_excel' => 'required|mimes:csv,xls,xlsx'
		]);
        
        if ($request->hasFile('file_excel')){
            Excel::import(new TransDefectImport, request()->file('file_excel'));
            return redirect()->route('part.index');
        } else {
            return redirect()->route('part.index');
        }
    }

    public function store(Request $request)
    {
        Part::create([
            'name' => $request->name,
            'code' => $request->code,
        ]);
        return redirect()->route('part.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $part = Part::findOrFail($id);
        return view('part.edit', compact(['part']));
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $part = Part::findOrFail($id);
        $part->update([
            'name' => $request->name,
            'code' => $request->code,
        ]);
        return redirect()->route('part.index');
    }

    public function destroy($id)
    {
        $part = Part::findOrFail($id);
        $part->delete();
        return redirect()->route('part.index');
    }
}