<?php

namespace App\Http\Controllers;

use App\Models\ManPowerOnDuty;
use App\Models\Pegawai;
use App\Models\Section;
use App\Models\Shift;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ManPowerOnDutyController extends Controller
{
    public function index()
    {
        $data = ManPowerOnDuty::orderBy('shift', 'asc')->orderBy('section', 'asc')->get(['id', 'title', 'shift', 'start', 'end', 'color']);
        $user = Pegawai::whereNot('role', 'Guest')->orderBy('jabatan', 'asc')->orderBy('name', 'asc')->get();
        $section = Section::all();
        $shift = Shift::all();

        return view('jadwal_pekerjaan.man_power.index', compact(['data', 'user', 'section', 'shift']));
    }

    public function create(Request $request)
    {
        if ($request->ajax()) {
            $data = ManPowerOnDuty::whereDate('start', '>=', $request->start)
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
                $event = ManPowerOnDuty::create([
                    'title' => $request->section . ' - ' . $request->title . ' - (Shift: ' . $request->shift . ')',
                    'shift' => $request->shift,
                    'start' => $request->start,
                    'end' => $request->end,
                    'section' => $request->section,
                    'color' => $color,
                ]);

                return response()->json($event);
                break;

            case 'update':
                $event = ManPowerOnDuty::find($request->id)->update([
                    'start' => $request->start,
                    'end' => $request->end,
                ]);

                return response()->json($event);
                break;

            case 'delete':
                $event = ManPowerOnDuty::find($request->id)->delete();

                return response()->json($event);
                break;

            default:
                # code...
                break;
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'user_id' => ['required'],
        ], [
            'user_id.required' => '*field man power wajib diisi minimal 1',
        ]);

        $user_id = $request->user_id;
        $shift = $request->shift;
        if ($shift == 3) {
            $color = '#0800ff';
        } elseif ($shift == 2) {
            $color = '#ff9500';
        } elseif ($shift == 1) {
            $color = '#059c00';
        } else {
            $color = '#8e8e8e';
        }

        foreach ($user_id as $id) {
            $man_power = Pegawai::findOrFail($id)->name;
            ManPowerOnDuty::create([
                'user_id' => $id,
                'title' => $request->section . ' - ' . $man_power . ' - (Shift: ' . $shift . ')',
                'shift' => $shift,
                'start' => $request->start,
                'end' => $request->end,
                'section' => $request->section,
                'color' => $color,
            ]);
        }

        return redirect()->route('man.power.index')->withNotify('Data jadwal pekerjaan berhasil ditambahkan!');
    }

    public function list()
    {
        $tahun = Carbon::now()->format('Y');
        $bulan = Carbon::now()->format('m');
        $user = Pegawai::whereNot('jabatan', 'Section Head')->orderBy('name', 'asc')->get();
        $man_power = ManPowerOnDuty::whereYear('start', $tahun)->whereMonth('start', $bulan)->orderBy('start', 'asc')->orderBy('shift', 'asc')->get();
        $bulan = Carbon::now()->format('F');
        return view('jadwal_pekerjaan.man_power.update', compact(['man_power', 'user', 'tahun', 'bulan']));
    }

    public function filter(Request $request)
    {
        $tahun = $request->tahun;
        $bulan = $request->bulan;
        $user = Pegawai::whereNot('jabatan', 'Section Head')->orderBy('name', 'asc')->get();
        $man_power = ManPowerOnDuty::whereYear('start', $tahun)->whereMonth('start', $bulan)->orderBy('start', 'asc')->get();
        $bulan = date('F', mktime(0, 0, 0, $bulan, 10));
        return view('jadwal_pekerjaan.man_power.update', compact(['man_power', 'user', 'tahun', 'bulan']));
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $shift = $request->shift;
        if ($shift == 3) {
            $color = '#0800ff';
        } elseif ($shift == 2) {
            $color = '#ff9500';
        } elseif ($shift == 1) {
            $color = '#059c00';
        } else {
            $color = '##8e8e8e';
        }
        $man_power = ManPowerOnDuty::findOrFail($id);
        if ($man_power) {
            $man_power->update([
                'start' => $request->start,
                'shift' => $request->shift,
                'color' => $color,
            ]);

            return redirect()->back()->withNotify('Data jadwal man power on duty berhasil diubah!');
        } else {
            return back();
        }
    }

    public function getPegawai(Request $request)
    {
        $section = $request->section;
        $pegawai = Pegawai::where('section', $section)->orderBy('name', 'asc')->get();

        if (count($pegawai) > 0) {
            return response()->json($pegawai);
        }
    }

    public function export_pdf(Request $request)
    {
        $section = $request->section;
        $tahun = $request->tahun;
        $bulan = $request->bulan;
        $man_power = ManPowerOnDuty::whereYear('start', $tahun)
        ->whereMonth('start', $bulan)
        ->where('section', $section)
        ->orderBy('start', 'asc')
        ->orderBy('shift', 'asc')
        ->get()
        ->groupBy('start');
        $bulan = Carbon::parse(date('F', mktime(0, 0, 0, $bulan, 10)))->translatedFormat('F');
        $nama_section = Section::where('code', $section)->first('name')->value('name');

        $waktu = Carbon::now()->format('Ymd');
        if ($man_power->count() == 0) {
            return redirect()->back();
        }
        $pdf = Pdf::loadView(
            'jadwal_pekerjaan.man_power.export-pdf',
            [
                'man_power' => $man_power,
                'section' => $nama_section,
                'bulan' => $bulan,
                'tahun' => $tahun,
            ]
        );
        $pdf->setPaper('A4', 'potrait');

        return $pdf->stream($waktu . '_jadwal man power on duty_' . $section . '_(periode ' . $bulan . ' ' . $tahun . ').pdf');
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $man_power = ManPowerOnDuty::findOrFail($id);
        if ($man_power) {
            $man_power->delete();
            return redirect()->back()->withNotify('Data jadwal man power on duty berhasil dihapus!');
        } else {
            return back();
        }
    }
}