<?php

namespace App\Http\Controllers;

use App\Models\Line;
use App\Models\TemuanDepo;
use App\Models\TransRFI;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DepoDashboardController extends Controller
{
    public function index()
    {
        $bulan_ini = Carbon::now()->format('m');
        $tahun_ini = Carbon::now()->format('Y');
        $temuan_all = TemuanDepo::all();
        $temuan_open = TemuanDepo::where('status', 'open')->get();
        $temuan_monitoring = TemuanDepo::where('status', 'monitoring')->get();
        $temuan_close = TemuanDepo::where('status', 'close')->get();
        $temuan_baru_bulan_ini = TemuanDepo::where('status', 'open')->whereMonth('tanggal', $bulan_ini)->get();
        $temuan_close_bulan_ini = TemuanDepo::where('status', 'close')->whereMonth('updated_at', $bulan_ini)->get();

        $temuan_minor = TemuanDepo::where('status', 'open')->where('klasifikasi', 'minor')->count();
        $temuan_moderate = TemuanDepo::where('status', 'open')->where('klasifikasi', 'moderate')->count();
        $temuan_mayor = TemuanDepo::where('status', 'open')->where('klasifikasi', 'mayor')->count();

        $temuan_monitoring_minor = TemuanDepo::where('status', 'monitoring')->where('klasifikasi', 'minor')->count();
        $temuan_monitoring_moderate = TemuanDepo::where('status', 'monitoring')->where('klasifikasi', 'moderate')->count();
        $temuan_monitoring_mayor = TemuanDepo::where('status', 'monitoring')->where('klasifikasi', 'mayor')->count();

        $temuan_close_minor = TemuanDepo::where('status', 'close')->where('klasifikasi', 'minor')->count();
        $temuan_close_moderate = TemuanDepo::where('status', 'close')->where('klasifikasi', 'moderate')->count();
        $temuan_close_mayor = TemuanDepo::where('status', 'close')->where('klasifikasi', 'mayor')->count();

        $defect_ballast = TemuanDepo::where('part_id', 14)->where('status', 'open')->count();
        $defect_sleeper = TemuanDepo::where('part_id', 9)->where('status', 'open')->count();
        $defect_rail = TemuanDepo::where('part_id', 7)->where('status', 'open')->count();
        $defect_fastening = TemuanDepo::where('part_id', 2)->where('status', 'open')->count();
        $defect_lainnya = TemuanDepo::where('status', 'open')
            ->whereNot('part_id', 14)
            ->whereNot('part_id', 9)
            ->whereNot('part_id', 7)
            ->whereNot('part_id', 2)
            ->count();

        $data_rfi = TransRFI::where('temuan_depo_id', '!=', null)->get()->count();

        $line_code = Line::where('area','Depo')->pluck('code')->toArray();
        $line_id = Line::select('id')->where('area','Depo')->get()->toArray();
        $temuan_line_depo = [];
        foreach ($line_id as $id) {
            $temuan_line_depo[] = TemuanDepo::where('status', 'open')->where('line_id', $id)->count();
        }

        return view(
            'depo.depo_dashboard.index',
            compact([
                'temuan_all',
                'temuan_open',
                'temuan_monitoring',
                'temuan_close',
                'temuan_baru_bulan_ini',
                'temuan_close_bulan_ini',
                'temuan_minor',
                'temuan_moderate',
                'temuan_mayor',
                'temuan_monitoring_minor',
                'temuan_monitoring_moderate',
                'temuan_monitoring_mayor',
                'temuan_close_minor',
                'temuan_close_moderate',
                'temuan_close_mayor',
                'defect_ballast',
                'defect_sleeper',
                'defect_rail',
                'defect_fastening',
                'defect_lainnya',
                'data_rfi',
                'temuan_line_depo',
                'line_code',
            ])
        );
    }

    public function create()
    {
        //
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