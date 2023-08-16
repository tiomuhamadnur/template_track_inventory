<?php

namespace App\Exports;

use App\Models\Accelerometer;
use App\Models\Area;
use App\Models\JadwalAccelerometer;
use App\Models\Joint;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class AccelerometerExport implements FromView
{
    public function __construct(?int $jadwal_id = null)
    {
        $this->jadwal_id = $jadwal_id;
    }

    public function view(): View
    {
        $jadwal_id = $this->jadwal_id;
        $jadwal = JadwalAccelerometer::findOrFail($jadwal_id);
        $area = Area::where('area', 'Mainline')->where('stasiun', 'false')->get();
        $area_id = Area::where('area', 'Mainline')->where('stasiun', 'false')->pluck('id')->toArray();

        $ut_sumbu_x = [];
        $ut_sumbu_y = [];
        $ut_sumbu_z = [];
        $dt_sumbu_x = [];
        $dt_sumbu_y = [];
        $dt_sumbu_z = [];

        foreach ($area_id as $id) {
            $ut_sumbu_x[] = Accelerometer::where('jadwal_id', $jadwal_id)->where('line_id', 1)->where('area_id', $id)->value('sumbu_x');
            $ut_sumbu_y[] = Accelerometer::where('jadwal_id', $jadwal_id)->where('line_id', 1)->where('area_id', $id)->value('sumbu_y');
            $ut_sumbu_z[] = Accelerometer::where('jadwal_id', $jadwal_id)->where('line_id', 1)->where('area_id', $id)->value('sumbu_z');
            $dt_sumbu_x[] = Accelerometer::where('jadwal_id', $jadwal_id)->where('line_id', 2)->where('area_id', $id)->value('sumbu_x');
            $dt_sumbu_y[] = Accelerometer::where('jadwal_id', $jadwal_id)->where('line_id', 2)->where('area_id', $id)->value('sumbu_y');
            $dt_sumbu_z[] = Accelerometer::where('jadwal_id', $jadwal_id)->where('line_id', 2)->where('area_id', $id)->value('sumbu_z');
        }

        return view('mainline.mainline_accelerometer_examination.export.excel', [
            'jadwal' => $jadwal,
            'area' => $area,
            'ut_sumbu_x' => $ut_sumbu_x,
            'ut_sumbu_y' => $ut_sumbu_y,
            'ut_sumbu_z' => $ut_sumbu_z,
            'dt_sumbu_x' => $dt_sumbu_x,
            'dt_sumbu_y' => $dt_sumbu_y,
            'dt_sumbu_z' => $dt_sumbu_z,
        ]);
    }
}