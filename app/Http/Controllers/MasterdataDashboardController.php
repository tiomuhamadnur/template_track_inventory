<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\BufferStop;
use App\Models\Joint;
use App\Models\Lengkung;
use App\Models\Line;
use App\Models\Mainline;
use App\Models\Wesel;
use Illuminate\Http\Request;

class MasterdataDashboardController extends Controller
{
    public function index()
    {
        $stasiun = Area::where('stasiun', 'true')->count();
        $line_mainline = Line::whereNot('area', 'Depo')->count();
        $line_depo = Line::where('area', 'Depo')->count();
        $trackbed = Mainline::count();
        $sleeper_mainline = Mainline::sum('jumlah_sleeper');
        $turnout_mainline = Wesel::whereNot('area_id', 1)->whereNot('tipe', 'Scissors Crossing')->count();
        $turnout_depo = Wesel::where('area_id', 1)->whereNot('tipe', 'Scissors Crossing')->count();
        $sc_mainline = Wesel::where('tipe', 'Scissors Crossing')->whereNot('area_id', 1)->count();
        $sc_depo = Wesel::where('tipe', 'Scissors Crossing')->where('area_id', 1)->count();
        $buffer = BufferStop::where('tipe', 'Buffer Stop')->count();
        $wheel = BufferStop::where('tipe', 'Wheel Stop')->count();
        $lengkung_kurang = Lengkung::where('tipe', 'horizontal')->whereNot('area_id', 1)->where('radius', '<=', 600)->count();
        $lengkung_lebih = Lengkung::where('tipe', 'horizontal')->whereNot('area_id', 1)->where('radius', '>', 600)->count();
        $lengkung_kurang_depo = Lengkung::where('tipe', 'horizontal')->where('area_id', 1)->where('radius', '<=', 600)->count();
        $lengkung_lebih_depo = Lengkung::where('tipe', 'horizontal')->where('area_id', 1)->where('radius', '>', 600)->count();
        $w_mainline = Joint::where('tipe', 'W')->whereNot('area_id', 1)->where('repaired', null)->count();
        $w_depo = Joint::where('tipe', 'W')->where('area_id', 1)->where('repaired', null)->count();
        $nj_mainline = Joint::where('tipe', 'NJ')->whereNot('area_id', 1)->count();
        $nj_depo = Joint::where('tipe', 'NJ')->where('area_id', 1)->count();
        $irj_mainline = Joint::where('tipe', 'IRJ')->whereNot('area_id', 1)->count();
        $irj_depo = Joint::where('tipe', 'IRJ')->where('area_id', 1)->count();
        $gij_mainline = Joint::where('tipe', 'GIJ')->whereNot('area_id', 1)->count();
        $gij_depo = Joint::where('tipe', 'GIJ')->where('area_id', 1)->count();
        $ej = Joint::where('tipe', 'EJ')->count();

        return view('masterdata.masterdata_dashboard.index', compact([
            'stasiun',
            'line_mainline',
            'line_depo',
            'trackbed',
            'sleeper_mainline',
            'turnout_mainline',
            'turnout_depo',
            'sc_mainline',
            'sc_depo',
            'buffer',
            'wheel',
            'lengkung_kurang',
            'lengkung_lebih',
            'lengkung_kurang_depo',
            'lengkung_lebih_depo',
            'w_mainline',
            'w_depo',
            'nj_mainline',
            'nj_depo',
            'irj_mainline',
            'irj_depo',
            'gij_mainline',
            'gij_depo',
            'ej',
        ]));
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
