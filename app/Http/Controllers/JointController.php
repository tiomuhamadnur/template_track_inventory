<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Joint;
use App\Models\Line;
use App\Models\Wesel;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class JointController extends Controller
{
    public function index()
    {
        $joint = Joint::all();
        return view('masterdata.masterdata_joint.index', compact(['joint']));
    }

    public function create()
    {
        $area = Area::all();
        $line = Line::all();
        $wesel = Wesel::all();
        return view('masterdata.masterdata_joint.create', compact(['area', 'line', 'wesel']));
    }

    public function store(Request $request)
    {
        Joint::create([
            "name" => $request->name,
            "area_id" => $request->area_id,
            "line_id" => $request->line_id,
            "wesel_id" => $request->wesel_id,
            "tipe" => $request->tipe,
            "kilometer" => $request->kilometer,
        ]);
        return redirect()->route('joint.index')->withNotify('Data berhasil ditambahkan!');
    }

    public function show($id)
    {
        //
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
        if ($joint)
        {
            $joint->update([
                "name" => $request->name,
                "area_id" => $request->area_id,
                "line_id" => $request->line_id,
                "wesel_id" => $request->wesel_id,
                "tipe" => $request->tipe,
                "kilometer" => $request->kilometer,
            ]);
            return redirect()->route('joint.index')->withNotify('Data berhasil diubah!');
        } else
        {
            return redirect()->back();
        }
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $joint = Joint::findOrFail($id);
        if($joint)
        {
            $joint->delete();
            return redirect()->route('joint.index')->withNotify('Data berhasil dihapus!');
        } else
        {
            return redirect()->back();
        }
    }
}