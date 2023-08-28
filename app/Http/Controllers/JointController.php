<?php

namespace App\Http\Controllers;

use App\DataTables\JointDataTable;
use App\Exports\JointDepoExport;
use App\Exports\JointMainlineExport;
use App\Imports\JointImport;
use App\Models\Area;
use App\Models\Joint;
use App\Models\Line;
use App\Models\Mainline;
use App\Models\Wesel;
use Carbon\Carbon;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Excel;

class JointController extends Controller
{
    public function index()
    {
        $joint = Joint::query()
            ->select('joint.*', 'joint.id AS id', 'mainline.kilometer AS mainline_kilometer')
            ->join('mainline', 'mainline.id', '=', 'joint.mainline_id')
            ->whereNot('joint.area_id', 1)
            ->where('repaired', null)
            ->orderBy('mainline_kilometer', 'ASC')
            ->orderBy('name', 'ASC')
            ->get();
        $area = Area::whereNot('area', 'Depo')->get();
        $line = Line::whereNot('area', 'Depo')->get();
        $wesel = Wesel::whereNot('area_id', 1)->get();
        $joint_no_span = Joint::whereNot('area_id', 1)->where('mainline_id', null)->where('repaired', null)->get();

        $area_id = '';
        $line_id = '';
        $tipe = '';
        $wesel_id = '';

        return view('masterdata.masterdata_joint.index', compact(['joint', 'joint_no_span', 'area', 'line', 'wesel', 'area_id', 'line_id', 'tipe', 'wesel_id']));
    }

    public function depo()
    {
        $joint = Joint::where('area_id', 1)
            ->where('repaired', null)
            ->orderBy('kilometer', 'asc')
            ->orderBy('name', 'asc')
            ->get();
        $area = Area::all();
        $line = Line::where('area', 'Depo')->get();
        $wesel = Wesel::where('area_id', 1)->get();

        $area_id = '';
        $line_id = '';
        $tipe = '';
        $wesel_id = '';

        return view('masterdata.masterdata_joint_depo.index', compact(['joint', 'area', 'line', 'wesel', 'area_id', 'line_id', 'tipe', 'wesel_id']));
    }

    public function create()
    {
        $area = Area::all();
        $line = Line::all();
        $wesel = Wesel::all();
        $span = Mainline::all();

        return view('masterdata.masterdata_joint.create', compact(['area', 'line', 'wesel', 'span']));
    }

    public function store(Request $request)
    {
        Joint::create([
            'name' => $request->name,
            'area_id' => $request->area_id,
            'line_id' => $request->line_id,
            'wesel_id' => $request->wesel_id,
            'mainline_id' => $request->mainline_id,
            'tipe' => $request->tipe,
            'kilometer' => $request->kilometer,
            'direction' => $request->direction,
        ]);

        if ($request->area_id == 1) {
            return redirect()->route('joint.depo.index')->withNotify('Data joint depo berhasil ditambahkan!');
        }

        return redirect()->route('joint.index')->withNotify('Data joint mainline berhasil ditambahkan!');
    }

    public function import(Request $request)
    {
        $this->validate($request, [
            'file_excel' => 'required|mimes:csv,xls,xlsx',
        ]);

        if ($request->hasFile('file_excel')) {
            Excel::import(new JointImport, request()->file('file_excel'));

            return redirect()->route('joint.index')->withNotify('Data joint berhasil diimport!');
        } else {
            return redirect()->route('joint.index');
        }
    }

    public function filter(Request $request)
    {
        $area_id = $request->area_id;
        $line_id = $request->line_id;
        $tipe = $request->tipe;
        $wesel_id = $request->wesel_id;

        $joint_no_span = Joint::whereNot('area_id', 1)->where('mainline_id', null)->where('repaired', null)->get();

        $area = Area::whereNot('area', 'Depo')->get();
        $line = Line::whereNot('area', 'Depo')->get();
        $wesel = Wesel::whereNot('area_id', 1)->get();

        $joint = Joint::query()
            ->select('joint.*', 'joint.id AS id', 'mainline.kilometer AS mainline_kilometer')
            ->join('mainline', 'mainline.id', '=', 'joint.mainline_id')
            ->whereNot('joint.area_id', 1)
            ->where('repaired', null);

        // Filter by area_id
        $joint->when($area_id, function ($query) use ($request) {
            return $query->where('joint.area_id', $request->area_id);
        });

        // Filter by line_id
        $joint->when($line_id, function ($query) use ($request) {
            return $query->where('joint.line_id', $request->line_id);
        });

        // Filter by tipe
        $joint->when($tipe, function ($query) use ($request) {
            return $query->where('tipe', $request->tipe);
        });

        // Filter by wesel
        $joint->when($wesel_id, function ($query) use ($request) {
            return $query->where('wesel_id', $request->wesel_id);
        });

        $joint->orderBy('mainline_kilometer', 'ASC')
            ->orderBy('name', 'ASC')
            ->get();

        return view(
            'masterdata.masterdata_joint.index',
            [
                'joint' => $joint,
                'area' => $area,
                'line' => $line,
                'wesel' => $wesel,
                'area_id' => $area_id,
                'line_id' => $line_id,
                'tipe' => $tipe,
                'wesel_id' => $wesel_id,
                'joint_no_span' => $joint_no_span,
            ]
        );
    }

    public function depo_filter(Request $request)
    {
        $area_id = $request->area_id;
        $line_id = $request->line_id;
        $tipe = $request->tipe;
        $wesel_id = $request->wesel_id;

        $area = Area::all();
        $line = Line::where('area', 'Depo')->get();
        $wesel = Wesel::where('area_id', 1)->get();

        $joint = Joint::query()->select(
            'joint.*',
        )
            ->where('repaired', null);

        // Filter by area_id
        $joint->when($area_id, function ($query) use ($request) {
            return $query->where('area_id', $request->area_id);
        });

        // Filter by line_id
        $joint->when($line_id, function ($query) use ($request) {
            return $query->where('line_id', $request->line_id);
        });

        // Filter by tipe
        $joint->when($tipe, function ($query) use ($request) {
            return $query->where('tipe', $request->tipe);
        });

        // Filter by wesel
        $joint->when($wesel_id, function ($query) use ($request) {
            return $query->where('wesel_id', $request->wesel_id);
        });

        return view(
            'masterdata.masterdata_joint_depo.index',
            [
                'joint' => $joint->orderBy('kilometer', 'asc')->get(),
                'area' => $area,
                'line' => $line,
                'wesel' => $wesel,
                'area_id' => $area_id,
                'line_id' => $line_id,
                'tipe' => $tipe,
                'wesel_id' => $wesel_id,
            ]
        );
    }

    public function edit($id)
    {
        try {
            $secret = Crypt::decryptString($id);

            $joint = Joint::findOrFail($secret);
            if ($joint) {
                $area = Area::all();
                $line = Line::all();
                $wesel = Wesel::all();

                return view('masterdata.masterdata_joint.update', compact(['joint', 'area', 'line', 'wesel']));
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
        $joint = Joint::findOrFail($id);
        if (!$joint) {
            return redirect()->back();
        }

        $joint->update([
            'name' => $request->name,
            'area_id' => $request->area_id,
            'line_id' => $request->line_id,
            'wesel_id' => $request->wesel_id,
            'mainline_id' => $request->mainline_id,
            'tipe' => $request->tipe,
            'direction' => $request->direction,
            'kilometer' => $request->kilometer,
            'repaired' => $request->repaired,
        ]);

        if ($request->mainline_id != null) {
            return redirect()->route('joint.index')->withNotify('Data joint mainline berhasil diubah!');
        }
        return redirect()->route('joint.depo.index')->withNotify('Data joint depo berhasil diubah!');
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $joint = Joint::findOrFail($id);
        $area_id = $joint->area_id;
        if (!$joint) {
            return redirect()->back();
        }
        $joint->delete();
        if ($area_id == 1) {
            return redirect()->route('joint.depo.index')->withNotify('Data joint berhasil dihapus!');
        }
        return redirect()->route('joint.index')->withNotify('Data joint berhasil dihapus!');
    }

    public function joint_no_span()
    {
        $joint = Joint::whereNot('area_id', 1)->where('mainline_id', null)->where('repaired', null)->get();
        $area = Area::whereNot('area', 'Depo')->get();
        $line = Line::whereNot('area', 'Depo')->get();
        $wesel = Wesel::whereNot('area_id', 1)->get();
        $joint_no_span = Joint::whereNot('area_id', 1)->where('mainline_id', null)->where('repaired', null)->get();

        return view('masterdata.masterdata_joint.index', compact(['joint', 'joint_no_span', 'area', 'line', 'wesel']));
    }

    public function export_excel(Request $request)
    {
        $area_id = $request->area_id;
        $line_id = $request->line_id;
        $tipe = $request->tipe;
        $wesel_id = $request->wesel_id;

        $waktu = Carbon::now()->format('Ymd');

        return Excel::download(new JointMainlineExport($area_id, $line_id, $tipe, $wesel_id), $waktu . '_data joint mainline.xlsx', \Maatwebsite\Excel\Excel::XLSX);
    }

    public function export_excel_depo(Request $request)
    {
        $line_id = $request->line_id;
        $tipe = $request->tipe;
        $wesel_id = $request->wesel_id;

        $waktu = Carbon::now()->format('Ymd');

        return Excel::download(new JointDepoExport($line_id, $tipe, $wesel_id), $waktu . '_data joint depo.xlsx', \Maatwebsite\Excel\Excel::XLSX);
    }
}
