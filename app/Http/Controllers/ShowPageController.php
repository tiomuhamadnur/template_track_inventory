<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\JadwalPekerjaan;
use App\Models\ManPowerOnDuty;
use App\Models\Pegawai;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ShowPageController extends Controller
{
    public function index()
    {
        $now = Carbon::now();
        $tahun = $now->format('Y');
        $bulan = $now->format('m');
        $hari = $now->format('d');
        $sekarang = $now->format('Y-m-d');

        // $pekerjaan = JadwalPekerjaan::whereYear('start', $tahun)->whereMonth('start', $bulan)->whereDay('start', $hari)->get();
        $man_power = ManPowerOnDuty::whereYear('start', $tahun)->whereMonth('start', $bulan)->whereDay('start', $hari)->orderBy('shift', 'asc')->get();
        $section_head = Pegawai::where('jabatan', 'Section Head')->orderBy('name', 'asc')->get();
        // $announcement = Announcement::all();

        return view('show_page.index', compact(['section_head', 'man_power']));
    }

    public function getAnnouncement()
    {
        $announcement = Announcement::all();

        return view('show_page.content.announcement', ['announcement' => $announcement]);
    }

    public function getActivity()
    {
        $now = Carbon::now();
        $tahun = $now->format('Y');
        $bulan = $now->format('m');
        $hari = $now->format('d');

        $pekerjaan = JadwalPekerjaan::whereYear('start', $tahun)->whereMonth('start', $bulan)->whereDay('start', $hari)->get();

        return view('show_page.content.activity', ['pekerjaan' => $pekerjaan]);
    }

    public function getManPower()
    {
        $now = Carbon::now();
        $tahun = $now->format('Y');
        $bulan = $now->format('m');
        $hari = $now->format('d');

        $man_power = ManPowerOnDuty::whereYear('start', $tahun)->whereMonth('start', $bulan)->whereDay('start', $hari)->orderBy('shift', 'asc')->get();

        return view('show_page.content.man_power', ['man_power' => $man_power]);
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