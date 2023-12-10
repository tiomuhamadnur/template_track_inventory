<?php

namespace App\Http\Controllers\planning;

use App\Http\Controllers\Controller;
use App\Models\Consumable;
use App\Models\Pegawai;
use App\Models\planning\TransaksiConsumable;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransaksiConsumableController extends Controller
{
    public function my_index()
    {
        $transaksi_consumable = TransaksiConsumable::where('user_id', auth()->user()->id)->orderBy('tanggal_pinjam', 'DESC')->get();
        foreach ($transaksi_consumable as $consumable){
            $waktu = $consumable->tanggal_pinjam;
            $waktu_carbon = Carbon::parse($waktu);
            $selisihJam = $waktu_carbon->diffInHours(Carbon::now());
            $consumable->batas_jam = $selisihJam;
        }
        return view('transaksi_tools_material.transaksi_consumable.my_index', compact(['transaksi_consumable']));
    }

    public function index()
    {
        $transaksi_consumable = TransaksiConsumable::orderBy('tanggal_pinjam', 'DESC')->get();
        foreach ($transaksi_consumable as $consumable){
            $waktu = $consumable->tanggal_pinjam;
            $waktu_carbon = Carbon::parse($waktu);
            $selisihJam = $waktu_carbon->diffInHours(Carbon::now());
            $consumable->batas_jam = $selisihJam;
        }
        return view('transaksi_tools_material.transaksi_consumable.index', compact(['transaksi_consumable']));
    }

    public function create()
    {
        $penanggung_jawab = Pegawai::where('status_employee', 'Organik')->where('section_id', auth()->user()->section->id)->orderBy('name', 'ASC')->get();
        $consumable = Consumable::orderBy('name', 'ASC')->get();
        return view('transaksi_tools_material.transaksi_consumable.create', compact(['penanggung_jawab', 'consumable']));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'consumable_id' => ['required'],
            'qty' => ['required'],
        ]);
        $consumableIds = $request->consumable_id;
        $qtys = $request->qty;

        $valid = true;

        // Loop melalui setiap consumable_id dan qty
        for ($i = 0; $i < count($consumableIds); $i++) {
            $consumableId = $consumableIds[$i];
            $requestedQty = $qtys[$i];

            // Ambil stock dari database berdasarkan consumable_id
            $consumable = Consumable::findOrFail($consumableId);
            $consumable_stock = $consumable->stock;
            $consumable_name = $consumable->name;
            $consumable_unit = $consumable->unit;

            // Validasi jika requestedQty lebih besar dari qty di database
            if ($requestedQty > $consumable_stock) {
                $valid = false;
                break; // Keluar dari loop jika ada salah satu qty yang melebihi stok
            }
        }

        // Jika validasi gagal, kirim pesan error
        if (!$valid) {
            return back()->withNotifyerror('Transaksi ' . $consumable_name . ' melebihi stok yang tersedia. Stok aktual tersisa ' . $consumable_stock . ' ' . $consumable_unit);
        }

        for ($i = 0; $i < count($request->consumable_id); $i++) {
            $consumable = Consumable::findOrFail($request->consumable_id[$i]);
            $stock_update = $consumable->stock - $request->qty[$i];
            $consumable->update([
                'stock' => $stock_update,
            ]);

            TransaksiConsumable::create([
                'user_id' => auth()->user()->id,
                'responsible_id' => $request->responsible_id,
                'consumable_id' => $request->consumable_id[$i],
                'qty' => $request->qty[$i],
                'tanggal_pinjam' => Carbon::now(),
                'status' => 'selesai',
                'remark' => $request->remark,
            ]);
        }
        return redirect()->route('my-transaksi-consumable.index')->withNotify('Material consumable berhasil ditransaksikan');
    }

    public function return(Request $request)
    {
        // dd($request);
        $id = $request->id;
        $qty = $request->qty;
        $transaksi_consumable = TransaksiConsumable::findOrFail($id);
        if(!$transaksi_consumable){
            return back();
        }
        if ($qty > $transaksi_consumable->qty){
            return back()->withNotifyerror('Qty yang anda kembalikan lebih dari Qty yang anda ambil!');
        }
        $consumable = Consumable::findOrFail($transaksi_consumable->consumable->id);
        $stock = $consumable->stock;

        $consumable->update([
            'stock' => $stock + $qty,
        ]);

        $transaksi_consumable->update([
            'qty' => $transaksi_consumable->qty - $qty,
        ]);

        $update_transaksi_consumable = TransaksiConsumable::findOrFail($id);
        if ($update_transaksi_consumable->qty <= 0) {
            $update_transaksi_consumable->delete();
        }

        return redirect()->route('my-transaksi-consumable.index')->withNotify('Material consumable berhasil dikembalikan.');
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