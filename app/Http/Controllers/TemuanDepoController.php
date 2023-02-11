<?php

namespace App\Http\Controllers;

use App\Exports\TemuanDepoExport;
use App\Exports\TemuanDepoFilterExport;
use App\Models\Area;
use App\Models\Line;
use App\Models\Part;
use App\Models\TemuanDepo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Excel;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;

class TemuanDepoController extends Controller
{
    public function index()
    {
        $temuan_depo = TemuanDepo::where('status', 'open')->orderBy('created_at', 'desc')->get();
        $line = Line::where('area', 'Depo')->get();
        $part = Part::all();

        $line_id = "";
        $part_id = "";
        $status = "";
        return view ('depo.depo_temuan.index', compact('temuan_depo', 'line', 'part', 'line_id', 'part_id', 'status'));
    }

    public function create()
    {
        $line_depo = Line::where('area', 'Depo')->orderBy('name', 'asc')->get();
        $part = Part::all();
        return view('depo.depo_temuan.create', compact(['line_depo', 'part']));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'photo' => ['file', 'image'],
        ], [
            'photo.image' => 'File harus dalam format gambar/photo!'
        ]);


        if ($request->hasFile('photo') && $request->photo != '') {
            $photo_temuan = $request->file('photo')->store('temuan/depo');
            TemuanDepo::create([
                "line_id" => $request->line_id,
                "kilometer" => $request->kilometer,
                "part_id" => $request->part_id,
                "detail_part_id" => $request->detail_part_id,
                "direction" => $request->direction,
                "defect_id" => $request->defect_id,
                "remark" => $request->remark,
                "klasifikasi" => $request->klasifikasi,
                "pic" => $request->pic,
                "tanggal" => $request->tanggal,
                "photo" => $photo_temuan,
            ]);
            return redirect()->route('temuan_depo.index');
        }
        else {
            TemuanDepo::create([
                "line_id" => $request->line_id,
                "kilometer" => $request->kilometer,
                "part_id" => $request->part_id,
                "detail_part_id" => $request->detail_part_id,
                "direction" => $request->direction,
                "defect_id" => $request->defect_id,
                "remark" => $request->remark,
                "klasifikasi" => $request->klasifikasi,
                "pic" => $request->pic,
                "tanggal" => $request->tanggal,
            ]);
            return redirect()->route('temuan_depo.index');
        }
    }

    public function export(Request $request)
    {
        $line_id = $request->line_id;
        $part_id = $request->part_id;
        $status = $request->status;

        $waktu = Carbon::now();

        if ($line_id == null and $part_id == null and $status == null) {
            return Excel::download(new TemuanDepoExport(), $waktu.'_temuan_depo_all.xlsx', \Maatwebsite\Excel\Excel::XLSX);
        } else {
            return Excel::download(new TemuanDepoFilterExport($line_id, $part_id, $status), $waktu.'_temuan_depo_filtered.xlsx', \Maatwebsite\Excel\Excel::XLSX);
        }
    }

    public function filter(Request $request)
    {
        $line_id = $request->line_id;
        $part_id = $request->part_id;
        $status = $request->status;

        $temuan_depo = TemuanDepo::query();

        // Filter by line_id
        $temuan_depo->when($line_id, function ($query) use ($request) {
            return $query->where('line_id', $request->line_id)->get();
        });

        // Filter by part_id
        $temuan_depo->when($part_id, function ($query) use ($request) {
            return $query->where('part_id', $request->part_id)->get();
        });

        // Filter by status
        $temuan_depo->when($status, function ($query) use ($request) {
            return $query->where('status', $request->status)->get();
        });

        $line = Line::where('area', 'Depo')->get();
        $part = Part::all();

        // return view('depo.depo_temuan.index', compact(['temuan_depo', 'line', 'part', 'line_id', 'part_id', 'status']));
        return view('depo.depo_temuan.index', ['temuan_depo' => $temuan_depo->get(), 'line' => $line, 'part' => $part, 'line_id' => $line_id, 'part_id' => $part_id, 'status' => $status]);
    }

    public function report(Request $request)
    {
        $tanggal = $request->tanggal;
        $area = 'DEPO';
        $temuan_depo = TemuanDepo::where('tanggal', $tanggal)->orderBy('kilometer', 'asc')->get();
        return view('depo.depo_temuan.report.report', compact(['tanggal', 'temuan_depo', 'area']));
    }


    public function close_temuan($id)
    {
        try {
            $secret = Crypt::decryptString($id);
            $temuan_depo = TemuanDepo::findOrFail($secret);
            if ($temuan_depo){
                return view('depo.depo_temuan.close', compact(['temuan_depo']));
            } else {
                return redirect()->back();
            }
        } catch (DecryptException $e) {
            return redirect()->back();
        }
    }

    public function store_temuan(Request $request)
    {
        $this->validate($request, [
            'photo_close' => ['file', 'image'],
        ], [
            'photo_close.image' => 'File harus dalam format gambar/photo!'
        ]);

        $id = $request->id;
        if ($request->hasFile('photo_close') && $request->photo_close != '') {
            $photo_close = $request->file('photo_close')->store('temuan/depo/perbaikan');
            $temuan_depo = TemuanDepo::findOrFail($id);
            $temuan_depo->update([
                "status" => $request->status,
                "photo_close" => $photo_close,
            ]);
            return redirect()->route('temuan_depo.index');
        } else {
            return redirect()->back();
        }
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