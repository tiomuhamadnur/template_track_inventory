<?php

namespace App\Http\Controllers;

use App\Imports\WeselImport;
use App\Models\Area;
use App\Models\Line;
use App\Models\Wesel;
use Excel;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class WeselController extends Controller
{
    public function index()
    {
        $wesel = Wesel::all();

        return view('masterdata.masterdata_wesel.index', compact(['wesel']));
    }

    public function create()
    {
        $area = Area::all();
        $line = Line::all();

        return view('masterdata.masterdata_wesel.create', compact(['area', 'line']));
    }

    public function store(Request $request)
    {
        Wesel::create([
            'name' => $request->name,
            'area_id' => $request->area_id,
            'line_id' => $request->line_id,
            'tipe' => $request->tipe,
            'direction' => $request->direction,
            'kilometer' => $request->kilometer,
        ]);

        return redirect()->route('wesel.index')->withNotify('Data berhasil ditambahkan!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        try {
            $secret = Crypt::decryptString($id);
            $wesel = Wesel::findOrFail($secret);
            if ($wesel) {
                $area = Area::all();
                $line = Line::all();

                return view('masterdata.masterdata_wesel.update', compact(['area', 'line', 'wesel']));
            } else {
                return redirect()->back();
            }
        } catch (DecryptException $e) {
            return redirect()->back();
        }
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $wesel = Wesel::findOrFail($id);
        if ($wesel) {
            $wesel->update([
                'name' => $request->name,
                'area_id' => $request->area_id,
                'line_id' => $request->line_id,
                'tipe' => $request->tipe,
                'direction' => $request->direction,
                'kilometer' => $request->kilometer,
            ]);

            return redirect()->route('wesel.index')->withNotify('Data berhasil diubah!');
        } else {
            return redirect()->back();
        }
    }

    public function import(Request $request)
    {
        // validasi
        $this->validate($request, [
            'file_excel' => 'required|mimes:csv,xls,xlsx',
        ]);

        if ($request->hasFile('file_excel')) {
            Excel::import(new WeselImport, request()->file('file_excel'));

            return redirect()->route('wesel.index')->withNotify('Data berhasil diimport!');
        } else {
            return redirect()->route('wesel.index');
        }
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $wesel = Wesel::findOrFail($id);
        if ($wesel) {
            $wesel->delete();

            return redirect()->route('wesel.index')->withNotify('Data berhasil dihapus!');
        } else {
            return redirect()->back();
        }
    }
}
