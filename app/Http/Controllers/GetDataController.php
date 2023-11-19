<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\DetailLocation;
use App\Models\Line;
use App\Models\Mainline;
use App\Models\Pegawai;
use App\Models\Departement;
use App\Models\TransDefect;
use App\Models\Location;
use App\Models\Section;
use App\Models\Tools;
use Illuminate\Http\Request;

class GetDataController extends Controller
{
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

    public function getAvatar(Request $request)
    {
        $pic = $request->pic;
        $photo = Pegawai::where('name', $pic)->first()->photo;
        if ($photo != null) {
            return response()->json([
                'photo' => asset('storage/' . $photo),
            ]);
        } else {
            return response()->json([
                'photo' => asset('storage/photo-profil/default.png'),
            ]);
        }
    }

    public function getDetailLocation(Request $request)
    {
        $location_id = $request->location_id;
        $toolsLocation = DetailLocation::where('location_id', $location_id)->get();
        if (count($toolsLocation) > 0) {
            return response()->json($toolsLocation);
        }
    }

    public function getDepartement(Request $request)
    {
        $section_id = $request->section_id;
        $departement = Section::select(
            'departement.*',
        )
            ->join('departement', 'departement.id', '=', 'section.departement_id')
            ->where('section.id', $section_id)
            ->get();

        if ($departement) {
            return response()->json($departement);
        }
    }



    public function check_stock_tools(Request $request)
    {
        // dd($request);
        $tools_id = $request->tools_id;
        $qty = $request->qty;

        $tools = Tools::findOrFail($tools_id);
        if ($tools){
            if ($qty > $tools->stock){
                return response()->json($tools);
            }
        }
    }

    public function store(Request $request)
    {
        //
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