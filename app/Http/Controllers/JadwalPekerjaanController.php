<?php

namespace App\Http\Controllers;

use App\Models\JadwalPekerjaan;
use App\Models\PM;
use App\Models\Section;
use App\Models\Shift;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class JadwalPekerjaanController extends Controller
{
    public function index()
    {
        $data = JadwalPekerjaan::get(['id', 'title', 'shift', 'start', 'end', 'color']);
        $section = Section::all();
        $shift = Shift::all();
        $pekerjaan = PM::orderBy('section', 'asc')->orderBy('name', 'asc')->get();

        return view('jadwal_pekerjaan.index', compact(['data', 'section', 'shift', 'pekerjaan']));
    }

    public function create(Request $request)
    {
        if ($request->ajax()) {
            $data = JadwalPekerjaan::whereDate('start', '>=', $request->start)
                ->whereDate('end',   '<=', $request->end)
                ->get(['id', 'title', 'start', 'end', 'color', 'shift']);

            return response()->json($data);
        }

        return view('jadwal_pekerjaan.create');
    }

    public function ajax(Request $request)
    {
        $section = $request->section;
        if ($section == 'PWR') {
            $color = '#059c00';
        } else {
            $color = '#ff9500';
        }
        switch ($request->type) {
            case 'add':
                $event = JadwalPekerjaan::create([
                    'title' => $request->section . ' - ' . $request->title . ' - ' . $request->location . ' - (Shift: ' . $request->shift . ')',
                    'nama_pekerjaan' => $request->title,
                    'shift' => $request->shift,
                    'start' => $request->start,
                    'end' => $request->end ?? $request->start,
                    'section' => $request->section,
                    'color' => $color,
                    'location' => $request->location,
                ]);

                return response()->json($event);
                break;

            case 'update':
                $event = JadwalPekerjaan::find($request->id)->update([
                    'start' => $request->start,
                    'end' => $request->end,
                ]);

                return response()->json($event);
                break;

            case 'delete':
                $event = JadwalPekerjaan::find($request->id)->delete();

                return response()->json($event);
                break;

            default:
                # code...
                break;
        }
    }

    public function store(Request $request)
    {
        $job_id = $request->job_id;
        $section = $request->section;
        if ($section == 'PWR') {
            $color = '#059c00';
        } else {
            $color = '#ff9500';
        }

        $pekerjaan = PM::findOrFail($job_id);
        if (!$pekerjaan) {
            return redirect()->back();
        }
        JadwalPekerjaan::create([
            'job_id' => $job_id,
            'title' => $request->section . ' - ' . $pekerjaan->name . ' - ' . $request->location . ' - (Shift: ' . $request->shift . ')',
            'nama_pekerjaan' => $pekerjaan->name,
            'shift' => $request->shift,
            'start' => $request->start,
            'end' => $request->end ?? $request->start,
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

    public function export_pdf(Request $request)
    {
        // dd($request);
        $section = $request->section;
        $tahun = $request->tahun;
        $bulan = $request->bulan;
        $jadwal_pekerjaan = JadwalPekerjaan::whereYear('start', $tahun)->whereMonth('start', $bulan)->where('section', $section)->orderBy('start', 'asc')->get();
        $bulan = date('F', mktime(0, 0, 0, $bulan, 10));

        $waktu = Carbon::now();
        if ($jadwal_pekerjaan->count() > 0) {
            $pdf = Pdf::loadView('jadwal_pekerjaan.export-pdf', ['jadwal_pekerjaan' => $jadwal_pekerjaan, 'section' => $section, 'bulan' => $bulan, 'tahun' => $tahun]);
            $pdf->setPaper('A4', 'potrait');

            return $pdf->stream($waktu.'_jadwal pekerjaan_' . $section . '_(periode ' . $bulan . ' ' . $tahun . ').pdf');
        } else {
            return redirect()->back();
        }
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