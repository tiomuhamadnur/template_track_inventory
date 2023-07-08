<?php

namespace App\Http\Controllers;

use App\Models\ManPowerOnDuty;
use App\Models\Pegawai;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ManPowerOnDutyController extends Controller
{
    public function index()
    {
        $data = ManPowerOnDuty::get(['id', 'title', 'shift', 'start', 'end', 'color']);
        $user = Pegawai::whereNot('jabatan', 'Section Head')->orderBy('name', 'asc')->get();

        return view('jadwal_pekerjaan.man_power.index', compact(['data', 'user']));
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

        $man_power = Pegawai::findOrFail($request->user_id)->name;
        ManPowerOnDuty::create([
            'user_id' => $request->user_id,
            'title' => $request->section . ' - ' . $man_power . ' - (Shift: ' . $shift . ')',
            'shift' => $shift,
            'start' => $request->start,
            'end' => $request->end,
            'section' => $request->section,
            'color' => $color,
        ]);

        return redirect()->route('man.power.index')->withNotify('Data jadwal pekerjaan berhasil ditambahkan!');
    }

    public function list()
    {
        $tahun = Carbon::now()->format('Y');
        $bulan = Carbon::now()->format('m');
        $user = Pegawai::whereNot('jabatan', 'Section Head')->orderBy('name', 'asc')->get();
        $man_power = ManPowerOnDuty::whereYear('start', $tahun)->whereMonth('start', $bulan)->orderBy('start', 'asc')->get();
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
        if ($man_power){
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

    public function destroy(Request $request)
    {
        $id = $request->id;
        $man_power = ManPowerOnDuty::findOrFail($id);
        if ($man_power) {
            $man_power->delete();
            return redirect()->back()->withNotify('Data jadwal man power on duty berhasil dihapus!');
        }
        else {
            return back();
        }
    }
}