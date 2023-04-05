<?php

namespace App\Http\Controllers;

use App\Models\PIC;
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

        $temuan_minor = Temuan::where('status', 'open')->where('klasifikasi', 'minor')->count();
        $temuan_moderate = Temuan::where('status', 'open')->where('klasifikasi', 'moderate')->count();
        $temuan_mayor = Temuan::where('status', 'open')->where('klasifikasi', 'mayor')->count();

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

        $progress_pm = DB::table('pic_job')
            ->join('annual_planning', 'pic_job.job_id', '=', 'annual_planning.id')
            ->selectRaw('pic_job.progress / annual_planning.frekuensi * 100 as progress')
            ->where('tahun', $tahun_ini)->pluck('progress');
            dd($progress_pm);

        $job_pm = DB::table('pic_job')
            ->join('annual_planning', 'pic_job.job_id', '=', 'annual_planning.id')
            ->select('annual_planning.name as job')
            ->where('tahun', $tahun_ini)->pluck('job');



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

        return view('mainline.mainline_dashboard.index', compact([
            'temuan_all',
            'temuan_open',
            'temuan_close',
            'temuan_baru_bulan_ini',
            'temuan_close_bulan_ini',
            'temuan',
            'bulan',
            'temuan_minor',
            'temuan_moderate',
            'temuan_mayor',
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
            'progress_pm',
            'job_pm',
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