<?php

namespace App\Http\Controllers;

use App\Exports\TemuanMainlineExport;
use App\Exports\TemuanMainlineFilterExport;
use App\Models\Area;
use App\Models\Defect;
use App\Models\Line;
use App\Models\Mainline;
use App\Models\Part;
use App\Models\Pegawai;
use App\Models\Temuan;
use App\Models\TransDefect;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Excel;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;

class TemuanMainlineController extends Controller
{
    public function index()
    {
        $temuan = Temuan::where('status', 'open')->orderBy('tanggal', 'DESC')->orderBy('mainline_id', 'DESC')->get();
        $area = Area::whereNot('area', 'Depo')->get();
        $area_rencana = Area::where('stasiun', 'true')->orWhere('area', 'DAL')->get();
        $line = Line::whereNot('area', 'Depo')->get();
        $part = Part::all();

        $area_id = "";
        $line_id = "";
        $part_id = "";
        $status = "";

        return view('mainline.mainline_temuan.index', compact(['temuan', 'area', 'area_rencana', 'line', 'part', 'area_id', 'line_id', 'part_id', 'status']));
    }

    public function export(Request $request)
    {
        $area_id = $request->area_id;
        $line_id = $request->line_id;
        $part_id = $request->part_id;
        $status = $request->status;

        $waktu = Carbon::now();

        if ($area_id == null and $line_id == null and $part_id == null and $status == null) {
            return Excel::download(new TemuanMainlineExport(), $waktu.'_temuan_mainline_all.xlsx', \Maatwebsite\Excel\Excel::XLSX);
        } else {
            return Excel::download(new TemuanMainlineFilterExport($area_id, $line_id, $part_id, $status), $waktu.'_temuan_mainline_filtered.xlsx', \Maatwebsite\Excel\Excel::XLSX);
        }
    }

    public function filter(Request $request)
    {
        $area_id = $request->area_id;
        $line_id = $request->line_id;
        $part_id = $request->part_id;
        $status = $request->status;

        $temuan = Temuan::query()->select(
            'summary_temuan.*',
            'mainline.area_id as area_id',
        )
        ->join('mainline', 'mainline.id', '=', 'summary_temuan.mainline_id');

        // Filter by area_id
        $temuan->when($area_id, function ($query) use ($request) {
            return $query->where('area_id', $request->area_id);
        });

        // Filter by line_id
        $temuan->when($line_id, function ($query) use ($request) {
            return $query->where('line_id', $request->line_id);
        });

        // Filter by part_id
        $temuan->when($part_id, function ($query) use ($request) {
            return $query->where('part_id', $request->part_id);
        });

        // Filter by status
        $temuan->when($status, function ($query) use ($request) {
            return $query->where('status', $request->status);
        });

        $area = Area::all();
        $area_rencana = Area::where('stasiun', 'true')->orWhere('area', 'DAL')->get();
        $line = Line::whereNot('area', 'Depo')->get();
        $part = Part::all();

        // return view('mainline.mainline_temuan.index', compact(['temuan', 'area', 'line', 'part', 'area_id', 'line_id', 'part_id', 'status']));
        return view('mainline.mainline_temuan.index', [
            'temuan' => $temuan->orderBy('mainline_id', 'asc')->get(),
            'area_rencana' => $area_rencana,
            'area' => $area,
            'line' => $line,
            'part' => $part,
            'area_id' => $area_id,
            'line_id' => $line_id,
            'part_id' => $part_id,
            'status' => $status
        ]);
    }

    public function create()
    {
        $mainline = Mainline::all();
        $part = Part::all();
        $defect = Defect::all();
        $area = Area::all();
        return view('mainline.mainline_temuan.create', compact(['mainline', 'part', 'defect', 'area']));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'photo' => ['file', 'image', 'required'],
        ], [
            'photo.image' => 'File harus dalam format gambar/photo!'
        ]);


        if ($request->hasFile('photo') && $request->photo != '') {

            $photo_temuan = $request->file('photo')->store('temuan/mainline');
            Temuan::create([
                "mainline_id" => $request->mainline_id,
                "no_sleeper" => $request->no_sleeper,
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
            return redirect()->route('temuan_mainline.index')->withNotify('Data temuan baru mainline berhasil ditambahkan!');
        }
        else {
            Temuan::create([
                "mainline_id" => $request->mainline_id,
                "no_sleeper" => $request->no_sleeper,
                "part_id" => $request->part_id,
                "detail_part_id" => $request->detail_part_id,
                "direction" => $request->direction,
                "defect_id" => $request->defect_id,
                "remark" => $request->remark,
                "klasifikasi" => $request->klasifikasi,
                "pic" => $request->pic,
                "tanggal" => $request->tanggal,
            ]);
            return redirect()->route('temuan_mainline.index')->withNotify('Data temuan baru mainline berhasil ditambahkan!');
        }
    }

    public function report(Request $request)
    {
        $tanggal = $request->tanggal;
        $area_rencana_start = $request->area_rencana_start;
        $area_rencana_finish = $request->area_rencana_finish;
        $examiner = $request->examiner;
        $temuan = Temuan::where('tanggal', $tanggal)->orderBy('mainline_id', 'asc')->get();
        return view('mainline.mainline_temuan.report.report', compact(['tanggal', 'temuan', 'area_rencana_start', 'area_rencana_finish', 'examiner']));
    }

    public function close_temuan($id)
    {
        try {
            $secret = Crypt::decryptString($id);
            $temuan = Temuan::findOrFail($secret);
            if ($temuan){
                return view('mainline.mainline_temuan.close', compact(['temuan']));
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
            'photo_close' => ['file', 'image', 'required'],
        ], [
            'photo_close.image' => 'File harus dalam format gambar/photo!'
        ]);

        $id = $request->id;
        if ($request->hasFile('photo_close') && $request->photo_close != '') {
            $photo_close = $request->file('photo_close')->store('temuan/mainline/perbaikan');
            $temuan = Temuan::findOrFail($id);
            $temuan->update([
                "status" => $request->status,
                "photo_close" => $photo_close,
            ]);
            return redirect()->route('temuan_mainline.index')->withNotify('Status temuan mainline berhasil diubah!');;
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

    public function destroy(Request $request)
    {
        $id = $request->id;
        $temuan = Temuan::findOrFail($id);
        if ($temuan)
        {
            $temuan->delete();
            return redirect()->route('temuan.index')->withNotify('Data temuan mainline berhasil dihapus!');
        }
        else{
            return redirect()->back();
        }
    }

    public function getSpan(Request $request)
    {
        $area = $request->location;
        $line = $request->line;
        $span = Mainline::where('area_id', $area)->where('line_id', $line)->get();
        if (count($span) > 0) {
            return response()->json($span);
        }
    }

    public function getLocation(Request $request) {
        $area = $request->area;
        $location = Area::where('area', $area)->get();
        if (count($location) > 0) {
            return response()->json($location);
        }
    }

    public function getLine(Request $request)
    {
        $area = $request->area;
        $line = Line::where('area', $area)->get();
        if (count($line) > 0) {
            return response()->json($line);
        }
    }

    public function getDetailPart(Request $request)
    {
        $part_id = $request->part_id;
        $detail_part = TransDefect::select(
            'trans_defect.detail_part_id',
            'detail_part.name as detail_part_name',
        )
        ->join('detail_part', 'detail_part.id', '=', 'trans_defect.detail_part_id')
        ->where('trans_defect.part_id', $part_id)
        ->orderBy('detail_part_name', 'asc')
        ->distinct()
        ->get();

        if (count($detail_part) > 0) {
            return response()->json($detail_part);
        }
    }

    public function getDefect(Request $request)
    {
        $detail_part_id = $request->detail_part_id;
        $part_id = $request->part_id;
        $defect = TransDefect::select(
            'trans_defect.defect_id',
            'defect.name as defect_name',
        )
        ->join('defect', 'defect.id', '=', 'trans_defect.defect_id')
        ->where('trans_defect.detail_part_id', $detail_part_id)
        ->where('trans_defect.part_id', $part_id)
        ->orderBy('defect_name', 'asc')
        ->get();
        if (count($defect) > 0) {
            return response()->json($defect);
        }
    }

    public function getAvatar(Request $request)
    {
        $pic = $request->pic;
        $photo = Pegawai::where('name', $pic)->first()->photo;
        if ($photo != null){
            return response()->json([
                'photo' => asset('storage/' . $photo),
            ]);
        } else {
            return response()->json([
                'photo' => asset('storage/photo-profil/default.png'),
            ]);
        }
    }
}