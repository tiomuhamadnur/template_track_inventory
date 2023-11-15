<?php

namespace App\Http\Controllers;

use App\Exports\UltrasonicTestExport;
use App\Imports\UltrasonicExaminationImport;
use App\Models\Area;
use App\Models\Joint;
use App\Models\Line;
use App\Models\UltrasonicTestExamination;
use App\Models\Wesel;
use App\Models\WorkOrder;
use Carbon\Carbon;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Excel;

class UltrasonicTestController extends Controller
{
    public function index_wo_ut()
    {
        $tahun = Carbon::now()->format('Y');
        $wo_ut = WorkOrder::where('job_id', 25)->whereYear('tanggal_start', $tahun)->orderBy('tanggal_start', 'ASC')->get();
        return view('mainline.mainline_ut_examination.index_wo_ut', compact(['wo_ut', 'tahun']));
    }

    public function filter_wo_ut(Request $request)
    {
        $tahun = $request->tahun;
        $wo_ut = WorkOrder::where('job_id', 25)->whereYear('tanggal_start', $tahun)->orderBy('tanggal_start', 'ASC')->get();
        return view('mainline.mainline_ut_examination.index_wo_ut', compact(['wo_ut', 'tahun']));
    }

    public function index($id)
    {
        try {
            $secret = Crypt::decryptString($id);
            $work_order = WorkOrder::findOrFail($secret);
            $ut_examination = UltrasonicTestExamination::where('wo_id', $secret)->orderBy('tanggal', 'ASC')->get();

            $area = Area::all();
            $line = Line::all();
            $wesel = Wesel::whereNot('area_id', 1)->get();
            return view('mainline.mainline_ut_examination.index', compact(['ut_examination', 'work_order', 'area', 'line', 'wesel']));
        } catch (DecryptException $e) {
            return redirect()->back();
        }
    }

    public function create($id)
    {
        try {
            $secret = Crypt::decryptString($id);
            $work_order = WorkOrder::findOrFail($secret);
            $wesel = Wesel::whereNot('area_id', 1)->orderBy('area_id', 'ASC')->orderBy('line_id', 'ASC')->get();
            return view('mainline.mainline_ut_examination.create', compact(['work_order', 'wesel']));
        } catch (DecryptException $e) {
            return redirect()->back();
        }
    }

    public function history($id)
    {
        try {
            $joint_id = Crypt::decryptString($id);
            $joint = Joint::findOrFail($joint_id);
            $ut_examination = UltrasonicTestExamination::where('joint_id', $joint_id)->orderBy('tanggal', 'ASC')->get();
            return view('mainline.mainline_ut_examination.history', compact(['ut_examination', 'joint']));
        } catch (DecryptException $e) {
            return redirect()->back();
        }
    }

    public function filter (Request $request)
    {
        $area_id = $request->area_id;
        $line_id = $request->line_id;
        $wesel_id = $request->wesel_id;
        $wo_id = $request->wo_id;

        $area = Area::all();
        $line = Line::all();
        $wesel = Wesel::whereNot('area_id', 1)->get();
        $work_order = WorkOrder::findOrFail($wo_id);

        $ut_examination = UltrasonicTestExamination::query()->select(
            'ut_examination.*',
            'joint.area_id as area_id',
            'joint.line_id as line_id',
        )
        ->join('joint', 'joint.id', '=', 'ut_examination.joint_id')
        ->where('wo_id', $wo_id);

        // Filter by area_id
        $ut_examination->when($area_id, function ($query) use ($request) {
            return $query->where('area_id', $request->area_id);
        });

        // Filter by line_id
        $ut_examination->when($line_id, function ($query) use ($request) {
            return $query->where('line_id', $request->line_id);
        });

        // Filter by wesel
        $ut_examination->when($wesel_id, function ($query) use ($request) {
            return $query->where('wesel_id', $request->wesel_id);
        });

        return view(
            'mainline.mainline_ut_examination.index',
            [
                'ut_examination' => $ut_examination->get(),
                'area' => $area,
                'line' => $line,
                'wesel' => $wesel,
                'work_order' => $work_order,
            ]
        );
    }

    public function getNoWeldingJoint(Request $request)
    {
        $area_id = $request->area_id;
        $line_id = $request->line_id;
        $direction = $request->direction;

        if($direction != null) {
            $joint = Joint::where('tipe', 'W')->where('area_id', $area_id)->where('repaired', null)->where('line_id', $line_id)->where('direction', $direction)->get();
            if (count($joint) > 0) {
                return response()->json($joint);
            }
        } else {
            $joint = Joint::where('tipe', 'W')->where('area_id', $area_id)->where('repaired', null)->where('line_id', $line_id)->get();
            if (count($joint) > 0) {
                return response()->json($joint);
            }
        }
    }

    public function getNoWeldingJointWesel(Request $request)
    {
        $wesel_id = $request->wesel_id;
        $joint = Joint::where('wesel_id', $wesel_id)->where('repaired', null)->get();
        if (count($joint) > 0) {
            return response()->json($joint);
        }
    }

    public function store(Request $request)
    {
        // dd($request);
        $wo_id = $request->wo_id;
        $joint_id = $request->joint_id;
        $tanggal = $request->tanggal;
        $dac = $request->dac;
        $depth = $request->depth;
        $length = $request->length;
        $operator = $request->operator;
        $remark = $request->remark;
        $status = 'OK';

        if ($dac >= 60) {
            $status = 'NOT OK';
        }

        UltrasonicTestExamination::create([
            "wo_id" => $wo_id,
            "joint_id" => $joint_id,
            "tanggal" => $tanggal,
            "dac" => $dac,
            "depth" => $depth,
            "length" => $length,
            "operator" => $operator,
            "remark" => $remark,
            "status" => $status,
        ]);

        return redirect()->route('ut.examination.index', Crypt::encryptString($wo_id))->withNotify('Data berhasil ditambahkan!');
    }

    public function export_excel($wo_id)
    {
        $waktu = Carbon::now()->format('Ymd');
        return Excel::download(new UltrasonicTestExport($wo_id), $waktu . '_data ultrasonic test.xlsx', \Maatwebsite\Excel\Excel::XLSX);
    }

    public function import(Request $request)
    {
        $this->validate($request, [
            'file_excel' => 'required|mimes:csv,xls,xlsx',
            'wo_id' => 'required',
        ]);

        $wo_id = $request->wo_id;

        if ($request->hasFile('file_excel')) {
            Excel::import(new UltrasonicExaminationImport($wo_id), request()->file('file_excel'));

            return redirect()->route('ut.examination.index', Crypt::encryptString($wo_id))->withNotify('Data Ultrasonic Test berhasil diimport!');
        } else {
            return redirect()->route('ut.examination.index', Crypt::encryptString($wo_id));
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
        $ut = UltrasonicTestExamination::findOrFail($id);

        if (!$ut) {
            return redirect()->back();
        }

        $ut->delete();
        return redirect()->route('ut.examination.index', Crypt::encryptString($ut->wo_id))->withNotify('Data berhasil dihapus!');
    }
}
