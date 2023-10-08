<?php

namespace App\Http\Controllers;

use App\Models\ToolsMaterials;
use Illuminate\Http\Request;

class ToolsMaterialsController extends Controller
{
    public function index()
    {
        $tools = ToolsMaterials::all();

        return view('masterdata.masterdata_tools_materials.index', compact(['tools']));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        ToolsMaterials::create([
            'name' => $request->name,
            'unit' => $request->unit,
        ]);

        return redirect()->route('tools.index')->withNotify('Data berhasil ditambahkan!');
    }
}
