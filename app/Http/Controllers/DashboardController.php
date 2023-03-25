<?php

namespace App\Http\Controllers;

use App\Models\Temuan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $bulan_ini = Carbon::now()->format('m');
        $tahun_ini = Carbon::now()->format('Y');
        $temuan_all = Temuan::all();
        $temuan_open = Temuan::where('status', 'open')->get();
        $temuan_close = Temuan::where('status', 'close')->get();
        $temuan_baru_bulan_ini = Temuan::where('status', 'open')->whereMonth('tanggal', $bulan_ini)->get();
        $temuan_close_bulan_ini = Temuan::where('status', 'close')->whereMonth('updated_at', $bulan_ini)->get();

        $temuan_jan = Temuan::whereYear('tanggal', $tahun_ini)->whereMonth('tanggal', 1)->count();
        $temuan_feb = Temuan::whereYear('tanggal', $tahun_ini)->whereMonth('tanggal', 2)->count();
        $temuan_mar = Temuan::whereYear('tanggal', $tahun_ini)->whereMonth('tanggal', 3)->count();
        $temuan_apr = Temuan::whereYear('tanggal', $tahun_ini)->whereMonth('tanggal', 4)->count();
        $temuan_may = Temuan::whereYear('tanggal', $tahun_ini)->whereMonth('tanggal', 5)->count();
        $temuan_jun = Temuan::whereYear('tanggal', $tahun_ini)->whereMonth('tanggal', 6)->count();
        $temuan_jul = Temuan::whereYear('tanggal', $tahun_ini)->whereMonth('tanggal', 7)->count();
        $temuan_aug = Temuan::whereYear('tanggal', $tahun_ini)->whereMonth('tanggal', 8)->count();
        $temuan_sep = Temuan::whereYear('tanggal', $tahun_ini)->whereMonth('tanggal', 9)->count();
        $temuan_oct = Temuan::whereYear('tanggal', $tahun_ini)->whereMonth('tanggal', 10)->count();
        $temuan_nov = Temuan::whereYear('tanggal', $tahun_ini)->whereMonth('tanggal', 11)->count();
        $temuan_dec = Temuan::whereYear('tanggal', $tahun_ini)->whereMonth('tanggal', 12)->count();

        $temuan = [
            $temuan_jan,
            $temuan_feb,
            $temuan_mar,
            $temuan_apr,
            $temuan_may,
            $temuan_jun,
            $temuan_jul,
            $temuan_aug,
            $temuan_sep,
            $temuan_oct,
            $temuan_nov,
            $temuan_dec,
        ];

        $bulan = [
            'JAN',
            'FEB',
            'MAR',
            'APR',
            'MAY',
            'JUN',
            'JUL',
            'AUG',
            'SEP',
            'OCT',
            'NOV',
            'DEC',
        ];

        return view('mainline.mainline_dashboard.index', compact([
            'temuan_all',
            'temuan_open',
            'temuan_close',
            'temuan_baru_bulan_ini',
            'temuan_close_bulan_ini',
            'temuan',
            'bulan',
        ]));
    }

    public function home()
    {
        return redirect()->route('home');
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