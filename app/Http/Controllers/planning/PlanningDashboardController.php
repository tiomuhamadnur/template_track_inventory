<?php

namespace App\Http\Controllers\planning;

use App\Http\Controllers\Controller;
use App\Models\Contract;
use Carbon\Carbon;
use App\Models\Fund;
use App\Models\Tools;
use App\Models\planning\ProgressContract;
use Illuminate\Http\Request;

class PlanningDashboardController extends Controller
{
    public function activity()
    {
        return view('planning.content.content_dashboard.index');
    }


    public function masterdata(Request $request)
    {
        $bulan = $request->bulan ?? Carbon::now()->format('m');
        $tahun = $request->tahun ?? Carbon::now()->format('Y');
        $on_going_contract = Contract::where('status', 'open')->count();
        $finished_contract = Contract::where('status', 'close')->count();

        $data_fund = Fund::where('tahun', $tahun)->get();

            if ($data_fund->isEmpty()) {
                // DEFAULT VALUE
                $persen_penyerapan = 0;
                $fund = 0;
                $total_penyerapan = 0;
                $persen_penyerapan_anggaran = 0;
                $nominal_sisa_anggaran = 0;
                $nominal_penyerapan_anggaran = 0;
                $persen_sisa_anggaran = 0;
            } else {
                $fund = $data_fund->sum('init_value');

                $data_contract = Contract::whereIn('fund_id', $data_fund->pluck('id'))->get();

                if ($data_contract->isEmpty()) {
                    // DEFAULT VALUE
                    $persen_penyerapan = 0;
                    $total_penyerapan = 0;
                    $persen_penyerapan_anggaran = 0;
                    $nominal_sisa_anggaran = $fund;
                    $nominal_penyerapan_anggaran = 0;
                    $persen_sisa_anggaran = ($fund > 0) ? 100 : 0;
                } else {
                    $contract_ids = $data_contract->pluck('id')->toArray();
                    // Total Penyerapan (%)
                    $total_penyerapan = ProgressContract::whereIn('contract_id', $contract_ids)->sum('paid_value');

                    if ($fund == 0) {
                        $persen_penyerapan_anggaran = 0;
                        $nominal_sisa_anggaran = 0;
                    } else {
                        $persen_penyerapan_anggaran = ($total_penyerapan / $fund) * 100;
                        $nominal_sisa_anggaran = ($fund - $total_penyerapan);
                    }
                $persen_penyerapan = number_format((float)$persen_penyerapan_anggaran, 2, '.', '');

                // Sisa Anggaran (%)
                $persen_sisa_anggaran = (100 - $persen_penyerapan);
                $persen_sisa_anggaran = number_format((float)$persen_sisa_anggaran, 2, '.', '');

                // Total Penyerapan (Rp)
                $nominal_penyerapan_anggaran = $total_penyerapan;
            }
        }

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
