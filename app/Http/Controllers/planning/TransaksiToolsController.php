<?php

namespace App\Http\Controllers\planning;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use App\Models\planning\TransaksiTools;
use App\Models\Tools;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransaksiToolsController extends Controller
{
    public function index()
    {
        $transaksi_tools = TransaksiTools::all();
        return view('planning.masterdata.masterdata_transaksi_tools.index', compact(['transaksi_tools']));
    }

    public function create()
    {
        $penanggung_jawab = Pegawai::orderBy('name', 'ASC')->get();
        $tools = Tools::orderBy('name', 'ASC')->get();
        return view('planning.masterdata.masterdata_transaksi_tools.create', compact(['penanggung_jawab', 'tools']));
    }

    public function store(Request $request)
    {
        for ($i = 0; $i < count($request->tools_id); $i++) {
            TransaksiTools::create([
                'user_id' => auth()->user()->id,
                'responsible_id' => $request->responsible_id,
                'tools_id' => $request->tools_id[$i],
                'qty' => $request->qty[$i],
                'tanggal_pinjam' => Carbon::now(),
                'status' => 'pinjam',
                'remark' => $request->remark,
            ]);
        }
        return redirect()->route('masterdata-transaksi-tools.index')->withNotify('Tools berhasil dipinjam');
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