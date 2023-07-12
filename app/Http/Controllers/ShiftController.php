<?php

namespace App\Http\Controllers;

use App\Models\Shift;
use Illuminate\Http\Request;

class ShiftController extends Controller
{
    public function index()
    {
        $shift = Shift::all();
        return view('masterdata.masterdata_shift.index', compact(['shift']));
    }

    public function create()
    {
        return view('masterdata.masterdata_shift.create');
    }

    public function store(Request $request)
    {
        Shift::create([
            'name' => $request->name,
            'code' => $request->code,
            'start' => $request->start,
            'end' => $request->end,
        ]);

        return redirect()->route('shift.index')->withNotify('Data shift berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $shift = Shift::findOrFail($id);
        if (!$shift){
            return redirect()->back();
        }
        return view('masterdata.masterdata_shift.update', compact(['shift']));
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $shift = Shift::findOrFail($id);
        if (!$shift) {
            return redirect()->back();
        }
        $shift->update([
            'name' => $request->name,
            'code' => $request->code,
            'start' => $request->start,
            'end' => $request->end,
        ]);

        return redirect()->route('shift.index')->withNotify('Data shift berhasil diupdate!');
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $shift = Shift::findOrFail($id);
        if (!$shift) {
            return redirect()->back();
        }
        $shift->delete();

        return redirect()->route('shift.index')->withNotify('Data shift berhasil dihapus!');
    }
}