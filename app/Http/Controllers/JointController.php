<?php

namespace App\Http\Controllers;

use App\Imports\JointImport;
use App\Models\Area;
use App\Models\Joint;
use App\Models\Line;
use App\Models\Mainline;
use App\Models\Wesel;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Excel;

class JointController extends Controller
{
    public function index()
    {
        $joint = Joint::all();
        $area = Area::all();
        $line = Line::all();
        $wesel = Wesel::all();

        return view('masterdata.masterdata_joint.index', compact(['joint', 'area', 'line', 'wesel']));
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

        return redirect()->route('joint.index')->withNotify('Data berhasil ditambahkan!');
    }

    public function import(Request $request)
    {
        // dd($request);
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
        // dd($request);
        $area_id = $request->area_id;
        $line_id = $request->line_id;
        $tipe = $request->tipe;
        $wesel_id = $request->wesel_id;

        $area = Area::all();
        $line = Line::all();
        $wesel = Wesel::all();

        $joint = Joint::query()->select(
            'joint.*',
        );

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
            'masterdata.masterdata_joint.index',
            [
                'joint' => $joint->get(),
                'area' => $area,
                'line' => $line,
                'wesel' => $wesel,
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
        if ($joint) {
            $joint->update([
                'name' => $request->name,
                'area_id' => $request->area_id,
                'line_id' => $request->line_id,
                'wesel_id' => $request->wesel_id,
                'mainline_id' => $request->mainline_id,
                'tipe' => $request->tipe,
                'direction' => $request->direction,
                'kilometer' => $request->kilometer,
            ]);

            return redirect()->route('joint.index')->withNotify('Data berhasil diubah!');
        } else {
            return redirect()->back();
        }
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $joint = Joint::findOrFail($id);
        if ($joint) {
            $joint->delete();

            return redirect()->route('joint.index')->withNotify('Data berhasil dihapus!');
        } else {
            return redirect()->back();
        }
    }
}