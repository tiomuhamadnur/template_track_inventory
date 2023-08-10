<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Temuan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IndividualPerformanceController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->filter;

        $bulan_ini = Carbon::now()->format('m');
        $tahun_ini = Carbon::now()->format('Y');

        $rams_team = Pegawai::where('section', 'Permanent Way RAMS')->where('jabatan', 'Technician')->orderBy('name', 'ASC')->pluck('name')->toArray();
        $maintenance_team = Pegawai::where('section', 'Permanent Way Maintenance')->where('jabatan', 'Technician')->orderBy('name', 'ASC')->pluck('name')->toArray();

        $temuan_rams = [];
        $rfi_maintenance = [];

        if($filter != null) {
            switch ($filter) {
                case 'this_month':
                    foreach($rams_team as $pic) {
                        $count = Temuan::where('pic', $pic)->whereMonth('tanggal', $bulan_ini)->count();
                        $temuan_rams[] = $count;
                    }
                    foreach($maintenance_team as $pic) {
                        $count = Temuan::where('pic_rfi', $pic)->whereMonth('tanggal', $bulan_ini)->count();
                        $rfi_maintenance[] = $count;
                    }
                    $filter = Carbon::now()->format('F');
                    break;
                case 'this_year':
                    foreach($rams_team as $pic) {
                        $count = Temuan::where('pic', $pic)->whereYear('tanggal', $tahun_ini)->count();
                        $temuan_rams[] = $count;
                    }
                    foreach($maintenance_team as $pic) {
                        $count = Temuan::where('pic_rfi', $pic)->whereYear('tanggal', $tahun_ini)->count();
                        $rfi_maintenance[] = $count;
                    }
                    $filter = $tahun_ini;
                    break;
                case 'all_time':
                    foreach($rams_team as $pic) {
                        $count = Temuan::where('pic', $pic)->count();
                        $temuan_rams[] = $count;
                    }
                    foreach($maintenance_team as $pic) {
                        $count = Temuan::where('pic_rfi', $pic)->count();
                        $rfi_maintenance[] = $count;
                    }
                    $filter = 'All Time';
                    break;
                default:
                    foreach($rams_team as $pic) {
                        $count = Temuan::where('pic', $pic)->whereMonth('tanggal', $bulan_ini)->count();
                        $temuan_rams[] = $count;
                    }
                    foreach($maintenance_team as $pic) {
                        $count = Temuan::where('pic_rfi', $pic)->whereMonth('tanggal', $bulan_ini)->count();
                        $rfi_maintenance[] = $count;
                    }
                    $filter = Carbon::now()->format('F');
                    break;
            }
        } else{
            foreach($rams_team as $pic) {
                $count = Temuan::where('pic', $pic)->whereMonth('tanggal', $bulan_ini)->count();
                $temuan_rams[] = $count;
            }
            foreach($maintenance_team as $pic) {
                $count = Temuan::where('pic_rfi', $pic)->whereMonth('tanggal', $bulan_ini)->count();
                $rfi_maintenance[] = $count;
            }
            $filter = Carbon::now()->format('F');
        }

        return view('masterdata.masterdata_performance.index', compact(['rams_team', 'temuan_rams', 'maintenance_team', 'rfi_maintenance', 'filter']));
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