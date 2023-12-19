<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Alarms;
use Illuminate\Http\Request;

class AlarmsController extends Controller
{
    public function index()
    {
        $alarms = Alarms::all();
        return view('masterdata.masterdata_alarms.index', compact(['alarms']));
    }

    public function create()
    {
        $namaHari = [
            'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat',
            'Sabtu',
            'Minggu',
        ];
        return view('masterdata.masterdata_alarms.create', compact(['namaHari']));
    }

    public function store(Request $request)
    {
        $time = $request->time;
        $time = str_replace(':', '.', $time);
        Alarms::create([
            'title' => $request->title,
            'day' => $request->day,
            'time' => $time,
            'endpoint' => $request->endpoint,
            'description' => $request->description,
        ]);
        return redirect()->route('alarms.index')->withNotify('Data berhasil ditambahkan.');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $alarms = Alarms::findOrFail($id);
        if(!$alarms){
            return back();
        }
        $namaHari = [
            'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat',
            'Sabtu',
            'Minggu',
        ];
        return view('masterdata.masterdata_alarms.update', compact(['alarms', 'namaHari']));
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $alarms = Alarms::findOrFail($id);
        if(!$alarms){
            return back();
        }
        $time = $request->time;
        $time = str_replace(':', '.', $time);
        $alarms->update([
            'title' => $request->title,
            'day' => $request->day,
            'time' => $time,
            'endpoint' => $request->endpoint,
            'description' => $request->description,
        ]);
        return redirect()->route('alarms.index')->withNotify('Data berhasil diupdate.');
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $alarms = Alarms::findOrFail($id);
        if(!$alarms){
            return back();
        }
        $alarms->delete();
        return redirect()->route('alarms.index')->withNotify('Data berhasil dihapus.');
    }
}