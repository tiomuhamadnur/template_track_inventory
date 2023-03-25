<?php

namespace App\Http\Controllers;

use App\Models\Temuan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $bulan_ini = Carbon::now()->format('m');
        $temuan_all = Temuan::all();
        $temuan_open = Temuan::where('status', 'open')->get();
        $temuan_close = Temuan::where('status', 'close')->get();
        $temuan_baru_bulan_ini = Temuan::where('status', 'open')->whereMonth('created_at', $bulan_ini)->get();
        $temuan_close_bulan_ini = Temuan::where('status', 'close')->whereMonth('updated_at', $bulan_ini)->get();

        return view('mainline.mainline_dashboard.index', compact([
            'temuan_all',
            'temuan_open',
            'temuan_close',
            'temuan_baru_bulan_ini',
            'temuan_close_bulan_ini',
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