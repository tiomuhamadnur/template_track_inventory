<?php

namespace App\Http\Controllers;

use App\Imports\LengkungImport;
use App\Models\Lengkung;
use Illuminate\Http\Request;
use Excel;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class LengkungController extends Controller
{
    public function index()
    {
        $lengkung = Lengkung::orderBy(DB::raw('CAST(ip AS FLOAT)', 'asc'))->get();

        return view('masterdata.masterdata_lengkung.index', compact(['lengkung']));
    }

    public function filter($area)
    {
        $lengkung = Lengkung::select(
            'lengkung.*',
        )
        ->join('area', 'area.id', '=', 'lengkung.area_id')
        ->where('area.area', $area)
        ->orderBy(DB::raw('CAST(ip AS FLOAT)', 'asc'))
        ->get();

        return view('masterdata.masterdata_lengkung.index', compact(['lengkung']));
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