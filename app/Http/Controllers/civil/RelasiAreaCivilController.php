<?php

namespace App\Http\Controllers\civil;

use App\Http\Controllers\Controller;
use App\Imports\civil\RelasiAreaImport;
use App\Models\Area;
use App\Models\civil\DetailArea;
use App\Models\civil\RelasiAreaCivil;
use App\Models\civil\SubArea;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Excel;

class RelasiAreaCivilController extends Controller
{
    public function index()
    {
        $relasi_area = RelasiAreaCivil::orderBy('area_id', 'asc')
            ->orderBy('sub_area_id', 'asc')
            ->orderBy('detail_area_id', 'asc')
            ->get();

        $area = Area::all();
        $sub_area = SubArea::orderBy('name', 'asc')->get();
        $detail_area = DetailArea::orderBy('name', 'asc')->get();

        return view('civil.masterdata.masterdata_relasi_area.index', compact([
            'relasi_area',
            'area',
            'sub_area',
            'detail_area',
        ]));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $relasi_area = RelasiAreaCivil::where('area_id', $request->area_id)
        ->where('sub_area_id', $request->sub_area_id)
        ->where('detail_area_id', $request->detail_area_id)
        ->count();

        if ($relasi_area > 0) {
            return back()->withNotifyerror('Data relasi area sudah ada!');
        }

        RelasiAreaCivil::create([
            'area_id' => $request->area_id,
            'sub_area_id' => $request->sub_area_id,
            'detail_area_id' => $request->detail_area_id,
        ]);

        return redirect()->route('relasi-area.index')->withNotify('Data berhasil ditambahkan!');
    }

    public function import(Request $request)
    {
        dd($request);

        $this->validate($request, [
            'file_excel' => 'required|mimes:csv,xls,xlsx',
        ]);

        if (!$request->hasFile('file_excel')) {
            return redirect()->route('relasi-area.index');
        }

        Excel::import(new RelasiAreaImport, request()->file('file_excel'));
        return redirect()->route('relasi-area.index')->withNotify('Data berhasil diimport!');
    }

    public function edit($id)
    {
        try {
            $secret = Crypt::decryptString($id);

            $relasi_area = RelasiAreaCivil::findOrFail($secret);
            if(!$relasi_area){
                return back();
            }

            $area = Area::all();
            $sub_area = SubArea::orderBy('name', 'asc')->get();
            $detail_area = DetailArea::orderBy('name', 'asc')->get();

            return view('civil.masterdata.masterdata_relasi_area.update', compact([
                'relasi_area',
                'area',
                'sub_area',
                'detail_area',
            ]));
        } catch (DecryptException $e) {
            return back();
        }
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $relasi_area = RelasiAreaCivil::findOrFail($id);
        if (!$relasi_area) {
            return back();
        }
        $relasi_area->update([
            'area_id' => $request->area_id,
            'sub_area_id' => $request->sub_area_id,
            'detail_area_id' => $request->detail_area_id,
        ]);
        return redirect()->route('relasi-area.index')->withNotify('Data berhasil diubah!');
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $relasi_area = RelasiAreaCivil::findOrFail($id);
        if (!$relasi_area) {
            return back();
        }
        $relasi_area->delete();
        return redirect()->route('relasi-area.index')->withNotify('Data berhasil dihapus!');
    }
}