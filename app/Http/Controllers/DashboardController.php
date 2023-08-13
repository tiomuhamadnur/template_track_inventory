<?php

namespace App\Http\Controllers;

use App\Models\PIC;
use App\Models\Temuan;
use App\Models\TransRFI;
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
        $temuan_baru_bulan_ini = Temuan::whereYear('tanggal', $tahun_ini)->whereMonth('tanggal', $bulan_ini)->get();
        $temuan_close_bulan_ini = Temuan::where('status', 'close')->whereMonth('tanggal_close', $bulan_ini)->get();

        $bulan = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
        $temuan = [];
        $perbaikan_temuan = [];

        foreach($bulan as $item) {
            $result_temuan = Temuan::whereYear('tanggal', $tahun_ini)->whereMonth('tanggal', $item)->count();
            $result_perbaikan = Temuan::whereYear('tanggal_close', $tahun_ini)->whereMonth('tanggal_close', $item)->where('status', 'close')->count();
            $temuan[] = $result_temuan;
            $perbaikan_temuan[] = $result_perbaikan;
        }

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

        $temuan_minor = Temuan::where('status', 'open')->where('klasifikasi', 'minor')->count();
        $temuan_moderate = Temuan::where('status', 'open')->where('klasifikasi', 'moderate')->count();
        $temuan_mayor = Temuan::where('status', 'open')->where('klasifikasi', 'mayor')->count();

        $temuan_close_minor = Temuan::where('status', 'close')->where('klasifikasi', 'minor')->count();
        $temuan_close_moderate = Temuan::where('status', 'close')->where('klasifikasi', 'moderate')->count();
        $temuan_close_mayor = Temuan::where('status', 'close')->where('klasifikasi', 'mayor')->count();

        $temuan_UT = DB::table('summary_temuan')
            ->join('mainline', 'summary_temuan.mainline_id', '=', 'mainline.id')
            ->join('line', 'mainline.line_id', '=', 'line.id')
            ->select('line.id as line_id')
            ->where('line_id', 1)
            ->count();
        $temuan_DT = DB::table('summary_temuan')
            ->join('mainline', 'summary_temuan.mainline_id', '=', 'mainline.id')
            ->join('line', 'mainline.line_id', '=', 'line.id')
            ->select('line.id as line_id')
            ->where('line_id', 2)
            ->count();
        $temuan_MT = DB::table('summary_temuan')
            ->join('mainline', 'summary_temuan.mainline_id', '=', 'mainline.id')
            ->join('line', 'mainline.line_id', '=', 'line.id')
            ->select('line.id as line_id')
            ->where('line_id', 3)
            ->count();
        $temuan_DAL = DB::table('summary_temuan')
            ->join('mainline', 'summary_temuan.mainline_id', '=', 'mainline.id')
            ->join('line', 'mainline.line_id', '=', 'line.id')
            ->select('line.id as line_id')
            ->where('line_id', 4)
            ->count();
        $temuan_TB = DB::table('summary_temuan')
            ->join('mainline', 'summary_temuan.mainline_id', '=', 'mainline.id')
            ->join('line', 'mainline.line_id', '=', 'line.id')
            ->select('line.id as line_id')
            ->where('line_id', 5)
            ->count();

        $persentase_UT = ($temuan_UT / $temuan_all->count()) * 100;
        $persentase_DT = ($temuan_DT / $temuan_all->count()) * 100;
        $persentase_MT = ($temuan_MT / $temuan_all->count()) * 100;
        $persentase_DAL = ($temuan_DAL / $temuan_all->count()) * 100;
        $persentase_TB = ($temuan_TB / $temuan_all->count()) * 100;

        $defect_trackbed = Temuan::where('part_id', 10)->where('status', 'open')->count();
        $defect_sleeper = Temuan::where('part_id', 9)->where('status', 'open')->count();
        $defect_rail = Temuan::where('part_id', 7)->where('status', 'open')->count();
        $defect_fastening = Temuan::where('part_id', 2)->where('status', 'open')->count();
        $defect_lainnya = Temuan::where('status', 'open')
            ->whereNot('part_id', 10)
            ->whereNot('part_id', 9)
            ->whereNot('part_id', 7)
            ->whereNot('part_id', 2)
            ->count();

        $pic = PIC::where('tahun', $tahun_ini)->get();

        $temuan_LBBS = DB::table('summary_temuan')
            ->join('mainline', 'summary_temuan.mainline_id', '=', 'mainline.id')
            ->join('area', 'mainline.area_id', '=', 'area.id')
            ->select('area.id as area_id')
            ->where('status', 'open')
            ->where('area_id', 3)
            ->count();

        $temuan_LBB_FTM = DB::table('summary_temuan')
            ->join('mainline', 'summary_temuan.mainline_id', '=', 'mainline.id')
            ->join('area', 'mainline.area_id', '=', 'area.id')
            ->select('area.id as area_id')
            ->where('status', 'open')
            ->where('area_id', 4)
            ->count();

        $temuan_FTMS = DB::table('summary_temuan')
            ->join('mainline', 'summary_temuan.mainline_id', '=', 'mainline.id')
            ->join('area', 'mainline.area_id', '=', 'area.id')
            ->select('area.id as area_id')
            ->where('status', 'open')
            ->where('area_id', 5)
            ->count();

        $temuan_FTM_CPR = DB::table('summary_temuan')
            ->join('mainline', 'summary_temuan.mainline_id', '=', 'mainline.id')
            ->join('area', 'mainline.area_id', '=', 'area.id')
            ->select('area.id as area_id')
            ->where('status', 'open')
            ->where('area_id', 6)
            ->count();

        $temuan_CPRS = DB::table('summary_temuan')
            ->join('mainline', 'summary_temuan.mainline_id', '=', 'mainline.id')
            ->join('area', 'mainline.area_id', '=', 'area.id')
            ->select('area.id as area_id')
            ->where('status', 'open')
            ->where('area_id', 7)
            ->count();

        $temuan_CPR_HJN = DB::table('summary_temuan')
            ->join('mainline', 'summary_temuan.mainline_id', '=', 'mainline.id')
            ->join('area', 'mainline.area_id', '=', 'area.id')
            ->select('area.id as area_id')
            ->where('status', 'open')
            ->where('area_id', 8)
            ->count();

        $temuan_HJNS = DB::table('summary_temuan')
            ->join('mainline', 'summary_temuan.mainline_id', '=', 'mainline.id')
            ->join('area', 'mainline.area_id', '=', 'area.id')
            ->select('area.id as area_id')
            ->where('status', 'open')
            ->where('area_id', 9)
            ->count();

        $temuan_HJN_BLA = DB::table('summary_temuan')
            ->join('mainline', 'summary_temuan.mainline_id', '=', 'mainline.id')
            ->join('area', 'mainline.area_id', '=', 'area.id')
            ->select('area.id as area_id')
            ->where('status', 'open')
            ->where('area_id', 10)
            ->count();

        $temuan_BLAS = DB::table('summary_temuan')
            ->join('mainline', 'summary_temuan.mainline_id', '=', 'mainline.id')
            ->join('area', 'mainline.area_id', '=', 'area.id')
            ->select('area.id as area_id')
            ->where('status', 'open')
            ->where('area_id', 11)
            ->count();

        $temuan_BLA_BLM = DB::table('summary_temuan')
            ->join('mainline', 'summary_temuan.mainline_id', '=', 'mainline.id')
            ->join('area', 'mainline.area_id', '=', 'area.id')
            ->select('area.id as area_id')
            ->where('status', 'open')
            ->where('area_id', 12)
            ->count();

        $temuan_BLMS = DB::table('summary_temuan')
            ->join('mainline', 'summary_temuan.mainline_id', '=', 'mainline.id')
            ->join('area', 'mainline.area_id', '=', 'area.id')
            ->select('area.id as area_id')
            ->where('status', 'open')
            ->where('area_id', 13)
            ->count();

        $temuan_BLM_ASN = DB::table('summary_temuan')
            ->join('mainline', 'summary_temuan.mainline_id', '=', 'mainline.id')
            ->join('area', 'mainline.area_id', '=', 'area.id')
            ->select('area.id as area_id')
            ->where('status', 'open')
            ->where('area_id', 14)
            ->count();

        $temuan_ASNS = DB::table('summary_temuan')
            ->join('mainline', 'summary_temuan.mainline_id', '=', 'mainline.id')
            ->join('area', 'mainline.area_id', '=', 'area.id')
            ->select('area.id as area_id')
            ->where('status', 'open')
            ->where('area_id', 15)
            ->count();

        $temuan_ASN_SNY = DB::table('summary_temuan')
            ->join('mainline', 'summary_temuan.mainline_id', '=', 'mainline.id')
            ->join('area', 'mainline.area_id', '=', 'area.id')
            ->select('area.id as area_id')
            ->where('status', 'open')
            ->where('area_id', 16)
            ->count();

        $temuan_SNYS = DB::table('summary_temuan')
            ->join('mainline', 'summary_temuan.mainline_id', '=', 'mainline.id')
            ->join('area', 'mainline.area_id', '=', 'area.id')
            ->select('area.id as area_id')
            ->where('status', 'open')
            ->where('area_id', 17)
            ->count();

        $temuan_SNY_IST = DB::table('summary_temuan')
            ->join('mainline', 'summary_temuan.mainline_id', '=', 'mainline.id')
            ->join('area', 'mainline.area_id', '=', 'area.id')
            ->select('area.id as area_id')
            ->where('status', 'open')
            ->where('area_id', 18)
            ->count();

        $temuan_ISTS = DB::table('summary_temuan')
            ->join('mainline', 'summary_temuan.mainline_id', '=', 'mainline.id')
            ->join('area', 'mainline.area_id', '=', 'area.id')
            ->select('area.id as area_id')
            ->where('status', 'open')
            ->where('area_id', 19)
            ->count();

        $temuan_IST_BNH = DB::table('summary_temuan')
            ->join('mainline', 'summary_temuan.mainline_id', '=', 'mainline.id')
            ->join('area', 'mainline.area_id', '=', 'area.id')
            ->select('area.id as area_id')
            ->where('status', 'open')
            ->where('area_id', 20)
            ->count();

        $temuan_BNHS = DB::table('summary_temuan')
            ->join('mainline', 'summary_temuan.mainline_id', '=', 'mainline.id')
            ->join('area', 'mainline.area_id', '=', 'area.id')
            ->select('area.id as area_id')
            ->where('status', 'open')
            ->where('area_id', 21)
            ->count();

        $temuan_BNH_STB = DB::table('summary_temuan')
            ->join('mainline', 'summary_temuan.mainline_id', '=', 'mainline.id')
            ->join('area', 'mainline.area_id', '=', 'area.id')
            ->select('area.id as area_id')
            ->where('status', 'open')
            ->where('area_id', 22)
            ->count();

        $temuan_STBS = DB::table('summary_temuan')
            ->join('mainline', 'summary_temuan.mainline_id', '=', 'mainline.id')
            ->join('area', 'mainline.area_id', '=', 'area.id')
            ->select('area.id as area_id')
            ->where('status', 'open')
            ->where('area_id', 23)
            ->count();

        $temuan_STB_DKA = DB::table('summary_temuan')
            ->join('mainline', 'summary_temuan.mainline_id', '=', 'mainline.id')
            ->join('area', 'mainline.area_id', '=', 'area.id')
            ->select('area.id as area_id')
            ->where('status', 'open')
            ->where('area_id', 24)
            ->count();

        $temuan_DKAS = DB::table('summary_temuan')
            ->join('mainline', 'summary_temuan.mainline_id', '=', 'mainline.id')
            ->join('area', 'mainline.area_id', '=', 'area.id')
            ->select('area.id as area_id')
            ->where('status', 'open')
            ->where('area_id', 25)
            ->count();

        $temuan_DKA_BHI = DB::table('summary_temuan')
            ->join('mainline', 'summary_temuan.mainline_id', '=', 'mainline.id')
            ->join('area', 'mainline.area_id', '=', 'area.id')
            ->select('area.id as area_id')
            ->where('status', 'open')
            ->where('area_id', 26)
            ->count();

        $temuan_BHIS = DB::table('summary_temuan')
            ->join('mainline', 'summary_temuan.mainline_id', '=', 'mainline.id')
            ->join('area', 'mainline.area_id', '=', 'area.id')
            ->select('area.id as area_id')
            ->where('status', 'open')
            ->where('area_id', 27)
            ->count();

        $data_rfi = TransRFI::where('temuan_mainline_id', '!=', null)->get()->count();

        return view('mainline.mainline_dashboard.index', compact([
            'temuan_all',
            'temuan_open',
            'temuan_close',
            'temuan_baru_bulan_ini',
            'temuan_close_bulan_ini',
            'temuan',
            'perbaikan_temuan',
            'bulan',
            'temuan_minor',
            'temuan_moderate',
            'temuan_mayor',
            'temuan_close_minor',
            'temuan_close_moderate',
            'temuan_close_mayor',
            'temuan_UT',
            'temuan_DT',
            'temuan_MT',
            'temuan_DAL',
            'temuan_TB',
            'persentase_UT',
            'persentase_DT',
            'persentase_MT',
            'persentase_DAL',
            'persentase_TB',
            'defect_trackbed',
            'defect_sleeper',
            'defect_rail',
            'defect_fastening',
            'defect_lainnya',
            'pic',
            'data_rfi',
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
