<?php

namespace App\Http\Controllers;

use App\Exports\TemuanMainlineExport;
use App\Exports\TemuanMainlineFilterExport;
use App\Models\Area;
use App\Models\Defect;
use App\Models\Line;
use App\Models\Mainline;
use App\Models\Part;
use App\Models\Temuan;
use App\Models\TransDefect;
use Carbon\Carbon;
use Excel;
use Illuminate\Http\Request;

class TemuanController extends Controller
{
    public function index()
    {
        $temuan = Temuan::orderBy('created_at', 'DESC')->get();
        $area = Area::all();
        $line = Line::all();
        $part = Part::all();

        $area_id = '';
        $line_id = '';
        $part_id = '';
        $status = '';

        return view('temuan.index', compact(['temuan', 'area', 'line', 'part', 'area_id', 'line_id', 'part_id', 'status']));
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

        $temuan = Temuan::select(
            'summary_temuan.*',
            'mainline.area_id as area_id',
        )
        ->join('mainline', 'mainline.id', '=', 'summary_temuan.mainline_id')
        ->orWhere('area_id', $area_id)
        ->orWhere('line_id', $line_id)
        ->orWhere('part_id', $part_id)
        ->orWhere('status', $status)
        ->orderBy('mainline_id', 'asc')
        ->get();

        $area = Area::all();
        $line = Line::all();
        $part = Part::all();

        return view('temuan.index', compact(['temuan', 'area', 'line', 'part', 'area_id', 'line_id', 'part_id', 'status']));
    }

    public function create()
    {
        $mainline = Mainline::all();
        $part = Part::all();
        $defect = Defect::all();
        $area = Area::all();

        return view('temuan.create', compact(['mainline', 'part', 'defect', 'area']));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'photo' => ['file', 'image'],
        ], [
            'photo.image' => 'File harus dalam format gambar/photo!',
        ]);

        if ($request->hasFile('photo') && $request->photo != '') {
            $photo_temuan = $request->file('photo')->store('temuan/mainline');
            Temuan::create([
                'mainline_id' => $request->mainline_id,
                'no_sleeper' => $request->no_sleeper,
                'part_id' => $request->part_id,
                'detail_part_id' => $request->detail_part_id,
                'direction' => $request->direction,
                'defect_id' => $request->defect_id,
                'remark' => $request->remark,
                'klasifikasi' => $request->klasifikasi,
                'pic' => $request->pic,
                'tanggal' => $request->tanggal,
                'photo' => $photo_temuan,
            ]);

            return redirect()->route('temuan.index');
        } else {
            Temuan::create([
                'mainline_id' => $request->mainline_id,
                'no_sleeper' => $request->no_sleeper,
                'part_id' => $request->part_id,
                'detail_part_id' => $request->detail_part_id,
                'direction' => $request->direction,
                'defect_id' => $request->defect_id,
                'remark' => $request->remark,
                'klasifikasi' => $request->klasifikasi,
                'pic' => $request->pic,
                'tanggal' => $request->tanggal,
            ]);

            return redirect()->route('temuan.index');
        }
    }

    public function report(Request $request)
    {
        $tanggal = $request->tanggal;
        $area = Temuan::where('tanggal', $tanggal)->orderBy('mainline_id', 'asc')->distinct()->get();
        $temuan = Temuan::where('tanggal', $tanggal)->orderBy('mainline_id', 'asc')->get();

        return view('temuan.report.report', compact(['tanggal', 'temuan', 'area']));
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

    public function destroy(Request $request)
    {
        $id = $request->id;
        $temuan = Temuan::findOrFail($id);
        $temuan->delete();

        return redirect()->route('temuan.index');
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

    public function getLocation(Request $request)
    {
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
}
