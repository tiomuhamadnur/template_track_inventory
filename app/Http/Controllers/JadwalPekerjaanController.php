<?php

namespace App\Http\Controllers;

use App\Models\JadwalPekerjaan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class JadwalPekerjaanController extends Controller
{
    public function index()
    {
        $data = JadwalPekerjaan::where('section', auth()->user()->section)->get(['id', 'title', 'shift', 'start', 'end', 'color']);

        return view('jadwal_pekerjaan.index', compact(['data']));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $shift = $request->shift;
        if ($shift == 3) {
            $color = '#059c00';
        } else {
            $color = '#ff9500';
        }

        JadwalPekerjaan::create([
            'title' => $request->title . ' - ' . $request->location . ' - (Shift: ' . $shift . ')',
            'shift' => $shift,
            'start' => $request->start,
            'end' => $request->end,
            'section' => $request->section,
            'color' => $color,
            'location' => $request->location,
        ]);

        return redirect()->route('jadwal.pekerjaan.index')->withNotify('Data jadwal pekerjaan berhasil ditambahkan!');
    }

    public function list()
    {
        $tahun = Carbon::now()->format('Y');
        $bulan = Carbon::now()->format('m');
        $jadwal_pekerjaan = JadwalPekerjaan::whereYear('start', $tahun)->whereMonth('start', $bulan)->orderBy('start', 'asc')->get();
        return view('jadwal_pekerjaan.update', compact(['jadwal_pekerjaan']));
    }

    public function filter(Request $request)
    {
        $tahun = $request->tahun;
        $bulan = $request->bulan;
        $jadwal_pekerjaan = JadwalPekerjaan::whereYear('start', $tahun)->whereMonth('start', $bulan)->orderBy('start', 'asc')->get();
        return view('jadwal_pekerjaan.update', compact(['jadwal_pekerjaan']));
    }

    public function update(Request $request)
    {
        dd($request);
    }

    public function destroy(Request $request)
    {
        // dd($request);
        $id = $request->id;
        $jadwal_pekerjaan = JadwalPekerjaan::findOrFail($id);
        if ($jadwal_pekerjaan) {
            $jadwal_pekerjaan->delete();
            return redirect()->back()->withNotify('Data jadwal pekerjaan berhasil dihapus!');
        }
        else {
            return back();
        }
    }
}