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
        $toolsIds = $request->tools_id;
        $qtys = $request->qty;

        $valid = true;

        // Loop melalui setiap tools_id dan qty
        for ($i = 0; $i < count($toolsIds); $i++) {
            $toolsId = $toolsIds[$i];
            $requestedQty = $qtys[$i];

            // Ambil stock dari database berdasarkan tools_id
            $tools_stock = Tools::findOrFail($toolsId)->stock;
            $tools_name = Tools::findOrFail($toolsId)->name;
            $tools_unit = Tools::findOrFail($toolsId)->unit;

            // Validasi jika requestedQty lebih besar dari qty di database
            if ($requestedQty > $tools_stock) {
                $valid = false;
                break; // Keluar dari loop jika ada salah satu qty yang melebihi stok
            }
        }

        // Jika validasi gagal, kirim pesan error
        if (!$valid) {
            return back()->withNotifyerror('Transaksi ' . $tools_name . ' melebihi stok yang tersedia. Stok aktual tersisa ' . $tools_stock . ' ' . $tools_unit);
        }

        for ($i = 0; $i < count($request->tools_id); $i++) {
            $tools = Tools::findOrFail($request->tools_id[$i]);
            $stock_update = $tools->stock - $request->qty[$i];
            $tools->update([
                'stock' => $stock_update,
            ]);

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

    public function return(Request $request)
    {
        dd($request);
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