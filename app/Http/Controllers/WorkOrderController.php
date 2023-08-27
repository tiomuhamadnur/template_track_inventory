<?php

namespace App\Http\Controllers;

use App\Models\PM;
use App\Models\WorkOrder;
use Carbon\Carbon;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class WorkOrderController extends Controller
{
    public function index()
    {
        $tahun = Carbon::now()->format('Y');
        $bulan = Carbon::now()->format('m');
        $work_order = WorkOrder::whereYear('tanggal_start', $tahun)->whereMonth('tanggal_start', $bulan)->orderBy('tanggal_start', 'ASC')->get();

        return view('masterdata.masterdata_work_order.index', compact(['work_order', 'tahun', 'bulan']));
    }

    public function create()
    {
        $job = PM::orderBy('section', 'ASC')->orderBy('name', 'ASC')->get();
        return view('masterdata.masterdata_work_order.create', compact(['job']));
    }

    public function store(Request $request)
    {
        WorkOrder::create([
            'job_id' => $request->job_id,
            'nomor' => $request->nomor,
            'status' => 'open',
            'description' => $request->description,
            'tanggal_start' => $request->tanggal_start,
            'tanggal_close' => $request->tanggal_close,
        ]);
        return redirect()->route('wo.index')->withNotify('Data Work Order berhasil ditambahkan!');
    }

    public function filter(Request $request)
    {
        $tahun = $request->tahun;
        $bulan = $request->bulan;
        $work_order = WorkOrder::whereYear('tanggal_start', $tahun)->whereMonth('tanggal_start', $bulan)->orderBy('tanggal_start', 'ASC')->get();

        return view('masterdata.masterdata_work_order.index', compact(['work_order', 'tahun', 'bulan']));
    }

    public function edit($id)
    {
        $job = PM::orderBy('section', 'ASC')->orderBy('name', 'ASC')->get();
        try {
            $secret = Crypt::decryptString($id);
            $work_order = WorkOrder::findOrFail($secret);
            if ($work_order) {
                return view('masterdata.masterdata_work_order.update', compact(['work_order', 'job']));
            } else {
                return redirect()->back();
            }
        } catch (DecryptException $e) {
            return redirect()->back();
        }
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $work_order = WorkOrder::findOrFail($id);
        if (!$work_order) {
            return redirect()->back();
        }

        $status = $request->status;
        if ($status == 'close')
        {
            $status = 'close';
            $tanggal_close = Carbon::now();
        }
        else
        {
            $status = 'open';
            $tanggal_close = null;
        }

        $work_order->update([
            'job_id' => $request->job_id,
            'nomor' => $request->nomor,
            'description' => $request->description,
            'tanggal_start' => $request->tanggal_start,
            'tanggal_close' => $tanggal_close,
            'status' => $status,
        ]);
        return redirect()->route('wo.index')->withNotify('Data berhasil diubah!');
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $work_order = WorkOrder::findOrFail($id);
        if (!$work_order) {
            return redirect()->back();
        }
        $work_order->delete();
        return redirect()->route('wo.index')->withNotify('Data berhasil dihapus!');
    }
}