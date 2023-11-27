<?php

namespace App\Http\Controllers\planning;

use App\Http\Controllers\Controller;
use App\Models\Contract;
use Carbon\Carbon;
use App\Models\Fund;
use App\Models\planning\ProgressContract;
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
        ]));
    }
}
