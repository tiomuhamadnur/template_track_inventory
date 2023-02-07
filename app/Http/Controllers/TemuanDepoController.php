<?php

namespace App\Http\Controllers;

use App\Exports\TemuanDepoExport;
use App\Exports\TemuanDepoFilterExport;
use App\Models\Line;
use App\Models\Part;
use App\Models\TemuanDepo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Excel;

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

        $temuan_depo = TemuanDepo::orWhere('line_id', $line_id)
        ->orWhere('part_id', $part_id)
        ->orWhere('status', $status)
        ->orderBy('kilometer', 'asc')
        ->get();

        $line = Line::where('area', 'Depo')->get();
        $part = Part::all();

        return view('depo.depo_temuan.index', compact(['temuan_depo', 'line', 'part', 'line_id', 'part_id', 'status']));
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