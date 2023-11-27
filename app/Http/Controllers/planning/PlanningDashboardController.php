<?php

namespace App\Http\Controllers\planning;

use App\Http\Controllers\Controller;
use App\Models\Contract;
use Carbon\Carbon;
use App\Models\Fund;
use App\Models\Tools;
use App\Models\planning\ProgressContract;
use App\Models\planning\TransaksiTools;
use Illuminate\Http\Request;

class PlanningDashboardController extends Controller
{
    public function activity()
    {
        return view('planning.content.content_dashboard.index');
    }


    public function masterdata()
    {
        $bulan_ini = Carbon::now()->format('m');
        $tahun_ini = Carbon::now()->format('Y');
        $on_going_contract = Contract::where('status', 'open')->count();
        $finished_contract = Contract::where('status', 'close')->count();
        // Total Penyerapan (%)
        $fund = Fund::sum('init_value');
        $total_penyerapan = ProgressContract::sum('paid_value');
        $persen_penyerapan_anggaran = ($total_penyerapan/$fund) * 100;
        $persen_penyerapan = number_format((double)$persen_penyerapan_anggaran, 2, '.', '');
        // Sisa Anggaran (%)
        $persen_sisa_anggaran = (100-$persen_penyerapan);
        // Total Penyerapan (Rp)
        $nominal_penyerapan_anggaran = $total_penyerapan;
        // Sisa Anggaran (Rp)
        $nominal_sisa_anggaran = ($fund-$total_penyerapan);
        // Tools Gudang B
        $tools_gudangb_pwr = Tools::where('location_id', 1)->where('section_id', 1)->count();
        $tools_gudangb_pwm = Tools::where('location_id', 1)->where('section_id', 2)->count();
        $tools_gudangb_civilr = Tools::where('location_id', 1)->where('section_id', 3)->count();
        $tools_gudangb_civilm = Tools::where('location_id', 1)->where('section_id', 4)->count();
        // Tools D06
        $tools_d06_pwr = Tools::where('location_id', 2)->where('section_id', 1)->count();
        $tools_d06_pwm = Tools::where('location_id', 2)->where('section_id', 2)->count();
        $tools_d06_civilr = Tools::where('location_id', 2)->where('section_id', 3)->count();
        $tools_d06_civilm = Tools::where('location_id', 2)->where('section_id', 4)->count();
        // Tools Ruang Track
        $tools_rtrack_pwr = Tools::where('location_id', 3)->where('section_id', 1)->count();
        $tools_rtrack_pwm = Tools::where('location_id', 3)->where('section_id', 2)->count();
        $tools_rtrack_civilr = Tools::where('location_id', 3)->where('section_id', 3)->count();
        $tools_rtrack_civilm = Tools::where('location_id', 3)->where('section_id', 4)->count();
        // Tools Unknown
        $tools_unknown_pwr = Tools::where('location_id', 4)->where('section_id', 1)->count();
        $tools_unknown_pwm = Tools::where('location_id', 4)->where('section_id', 2)->count();
        $tools_unknown_civilr = Tools::where('location_id', 4)->where('section_id', 3)->count();
        $tools_unknown_civilm = Tools::where('location_id', 4)->where('section_id', 4)->count();


        return view('planning.masterdata.masterdata_dashboard.index', compact([
            'on_going_contract',
            'finished_contract',
            'persen_penyerapan',
            'fund',
            'total_penyerapan',
            'persen_penyerapan_anggaran',
            'persen_sisa_anggaran',
            'nominal_penyerapan_anggaran',
            'nominal_sisa_anggaran',
            'tools_gudangb_pwr',
            'tools_gudangb_pwm',
            'tools_gudangb_civilr',
            'tools_gudangb_civilm',
            'tools_d06_pwr',
            'tools_d06_pwm',
            'tools_d06_civilr',
            'tools_d06_civilm',
            'tools_rtrack_pwr',
            'tools_rtrack_pwm',
            'tools_rtrack_civilr',
            'tools_rtrack_civilm',
            'tools_unknown_pwr',
            'tools_unknown_pwm',
            'tools_unknown_civilr',
            'tools_unknown_civilm',
        ]));
    }
}
