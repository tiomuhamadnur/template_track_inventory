<?php

namespace App\Http\Controllers\planning;

use App\Helpers\WhatsAppHelper;
use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use App\Models\planning\TransaksiTools;
use App\Models\Tools;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransaksiToolsController extends Controller
{
    public function my_index()
    {
        $transaksi_tools = TransaksiTools::where('user_id', auth()->user()->id)->orderBy('status', 'ASC')->orderBy('tanggal_pinjam', 'ASC')->paginate(100);
        $total_pinjam = TransaksiTools::where('user_id', auth()->user()->id)->where('status', 'pinjam')->count();
        return view('transaksi_tools_material.transaksi_tools.my_index', compact(['transaksi_tools', 'total_pinjam']));
    }

    public function index()
    {
        $transaksi_tools = TransaksiTools::orderBy('status', 'ASC')->orderBy('tanggal_pinjam', 'ASC')->paginate(100);
        $peminjam = Pegawai::orderBy('section_id', 'ASC')->orderBy('name', 'ASC')->get();
        $total_pinjam = TransaksiTools::where('status', 'pinjam')->count();
        return view('transaksi_tools_material.transaksi_tools.index', compact(['transaksi_tools', 'total_pinjam', 'peminjam']));
    }

    public function create()
    {
        $penanggung_jawab = Pegawai::where('status_employee', 'Organik')->where('section_id', auth()->user()->section->id)->orderBy('name', 'ASC')->get();
        $tools = Tools::orderBy('name', 'ASC')->get();
        return view('transaksi_tools_material.transaksi_tools.create', compact(['penanggung_jawab', 'tools']));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'tools_id' => ['required'],
            'qty' => ['required'],
        ]);
        $toolsIds = $request->tools_id;
        $qtys = $request->qty;

        $valid = true;

        // Loop melalui setiap tools_id dan qty
        for ($i = 0; $i < count($toolsIds); $i++) {
            $toolsId = $toolsIds[$i];
            $requestedQty = $qtys[$i];

            // Ambil stock dari database berdasarkan tools_id
            $tools = Tools::findOrFail($toolsId);
            $tools_stock = $tools->stock;
            $tools_name = $tools->name;
            $tools_unit = $tools->unit;

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
        return redirect()->route('my-transaksi-tools.index')->withNotify('Tools berhasil dipinjam');
    }

    public function return(Request $request)
    {
        $ids = $request->id;

        if (!$ids){
            return back();
        }

        foreach($ids as $id) {
            $transaksi_tools = TransaksiTools::findOrFail($id);
            $tools_id = $transaksi_tools->tools_id;
            $qty = $transaksi_tools->qty;
            $tools = Tools::findOrFail($tools_id);
            $stock = $tools->stock;

            $tools->update([
                'stock' => $stock + $qty,
            ]);

            $transaksi_tools->update([
                'status' => 'selesai',
                'tanggal_kembali' => Carbon::now(),
            ]);
        }

        return redirect()->route('my-transaksi-tools.index')->withNotify('Tools berhasil dikembalikan');
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function filter(Request $request)
    {
        $user_id = $request->user_id;
        $status = $request->status;
        $tanggal_awal = $request->tanggal_awal;
        $tanggal_akhir = $request->tanggal_akhir;

        $transaksi_tools = TransaksiTools::query()
            ->select(
                'trans_tools.*',
            );

        // Filter by user_id
        $transaksi_tools->when($user_id, function ($query) use ($request) {
            return $query->where('user_id', $request->user_id);
        });

        // Filter by status
        $transaksi_tools->when($status, function ($query) use ($request) {
            return $query->where('status', $request->status);
        });

        // Filter by tanggal
        if ($tanggal_awal != null and $tanggal_akhir != null) {
            $transaksi_tools->when($tanggal_awal, function ($query) use ($request) {
                return $query->where('tanggal_pinjam', '>=', Carbon::parse($request->tanggal_awal)->startOfDay());
            });
            $transaksi_tools->when($tanggal_akhir, function ($query) use ($request) {
                return $query->where('tanggal_pinjam', '<=', Carbon::parse($request->tanggal_akhir)->endOfDay());
            });
        }

        $peminjam = Pegawai::orderBy('section_id', 'ASC')->orderBy('name', 'ASC')->get();

        return view('transaksi_tools_material.transaksi_tools.index', [
            'transaksi_tools' => $transaksi_tools->paginate(100),
            'user_id' => $user_id,
            'status' => $status,
            'tanggal_awal' => $tanggal_awal,
            'tanggal_akhir' => $tanggal_akhir,
            'peminjam' => $peminjam,
        ]);
    }

    public function export_excel(Request $request)
    {
        dd($request);
    }
}