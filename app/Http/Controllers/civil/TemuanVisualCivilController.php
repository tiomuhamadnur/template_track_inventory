<?php

namespace App\Http\Controllers\civil;

use App\Exports\civil\TemuanVisualExport;
use App\Exports\civil\TemuanVisualFilterExport;
use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\civil\DefectCivil;
use App\Models\civil\DetailArea;
use App\Models\civil\DetailPartCivil;
use App\Models\civil\PartCivil;
use App\Models\civil\SubArea;
use App\Models\civil\TemuanVisualCivil;
use Carbon\Carbon;
use Excel;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class TemuanVisualCivilController extends Controller
{
    public function index()
    {
        $temuan_visual = TemuanVisualCivil::orderBy('tanggal', 'desc')
            ->orderBy('area_id', 'asc')
            ->orderBy('sub_area_id', 'asc')
            ->get();

        $area = Area::where('stasiun', 'true')->get();
        $sub_area = SubArea::orderBy('name', 'asc')->get();
        $detail_area = DetailArea::orderBy('name', 'asc')->get();
        $part = PartCivil::orderBy('name', 'asc')->get();
        $detail_part = DetailPartCivil::orderBy('name', 'asc')->get();
        $defect = DefectCivil::orderBy('name', 'asc')->get();

        $area_id = '';
        $sub_area_id = '';
        $detail_area_id = '';
        $part_id = '';
        $detail_part_id = '';
        $defect_id = '';
        $status = '';
        $klasifikasi = '';
        $tanggal_awal = '';
        $tanggal_akhir = '';

        return view('civil.examination.examination_visual.index', compact([
            'temuan_visual',
            'area',
            'sub_area',
            'detail_area',
            'part',
            'detail_part',
            'defect',
            'area_id',
            'sub_area_id',
            'detail_area_id',
            'part_id',
            'detail_part_id',
            'defect_id',
            'status',
            'klasifikasi',
            'tanggal_awal',
            'tanggal_akhir',
        ]));
    }

    public function create()
    {
        $area = Area::where('stasiun', 'true')->get();
        $sub_area = SubArea::orderBy('name', 'asc')->get();
        $detail_area = DetailArea::orderBy('name', 'asc')->get();
        $part = PartCivil::orderBy('name', 'asc')->get();
        $detail_part = DetailPartCivil::orderBy('name', 'asc')->get();
        $defect = DefectCivil::orderBy('name', 'asc')->get();

        return view('civil.examination.examination_visual.create', compact([
            'area',
            'sub_area',
            'detail_area',
            'part',
            'detail_part',
            'defect',
        ]));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'photo' => ['file', 'image', 'required'],
        ], [
            'photo.image' => 'File harus dalam format gambar/photo!',
        ]);

        if ($request->hasFile('photo') && $request->photo != '') {
            $photo_temuan = $request->file('photo')->store('civil/temuan');
            TemuanVisualCivil::create([
                'area_id' => $request->area_id,
                'sub_area_id' => $request->sub_area_id,
                'detail_area_id' => $request->detail_area_id,
                'part_id' => $request->part_id,
                'detail_part_id' => $request->detail_part_id,
                'defect_id' => $request->defect_id,
                'klasifikasi' => $request->klasifikasi,
                'prioritas' => $request->prioritas,
                'remark' => $request->remark,
                'pic' => $request->pic,
                'tanggal' => $request->tanggal,
                'photo' => $photo_temuan,
            ]);

            return redirect()->route('temuan-visual.index')->withNotify('Data temuan baru berhasil ditambahkan!');
        }
        return back();
    }

    public function justifikasi(Request $request)
    {
        $id = $request->id;
        $temuan_visual = TemuanVisualCivil::findOrFail($id);
        if (!$temuan_visual) {
            return back();
        }
        $temuan_visual->update([
            "justifikasi" => $request->justifikasi,
            "pic_justifikasi" => $request->pic_justifikasi,
        ]);
        return back()->withNotify('Justifikasi dari Tim Maintenance berhasil ditambahkan!');
    }

    public function rfi($id)
    {
        //
    }

    public function edit($id)
    {
        try {
            $secret = Crypt::decryptString($id);
            $temuan_visual = TemuanVisualCivil::findOrFail($secret);
            if (!$temuan_visual) {
                return back();
            }
            $area = Area::all();
            $sub_area = SubArea::all();
            $detail_area = DetailArea::all();
            $part = PartCivil::orderBy('name', 'asc')->get();
            $detail_part = DetailPartCivil::all();
            $defect = DefectCivil::all();

            return view('civil.examination.examination_visual.update', compact([
                'temuan_visual',
                'area',
                'sub_area',
                'detail_area',
                'part',
                'detail_part',
                'defect',
            ]));
        } catch (DecryptException $e) {
            return back();
        }
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $temuan_visual = TemuanVisualCivil::findOrFail($id);
        if (!$temuan_visual) {
            return back();
        }
        if ($request->hasFile('photo') && $request->photo != '') {
            Storage::delete($temuan_visual->photo);
            $photo_temuan = $request->file('photo')->store('civil/temuan');
            $temuan_visual->update([
                "area_id" => $request->area_id,
                "sub_area_id" => $request->sub_area_id,
                "detail_area_id" => $request->detail_area_id,
                "part_id" => $request->part_id,
                "detail_part_id" => $request->detail_part_id,
                "defect_id" => $request->defect_id,
                "remark" => $request->remark,
                "klasifikasi" => $request->klasifikasi,
                'prioritas' => $request->prioritas,
                "status" => $request->status,
                "pic" => $request->pic,
                "tanggal" => $request->tanggal,
                "eksekutor" => $request->eksekutor,
                "photo" => $photo_temuan,
            ]);
            return redirect()->route('temuan-visual.index')->withNotify('Data Temuan berhasil dimutakhirkan!');
        } else {
            $temuan_visual->update([
                "area_id" => $request->area_id,
                "sub_area_id" => $request->sub_area_id,
                "detail_area_id" => $request->detail_area_id,
                "part_id" => $request->part_id,
                "detail_part_id" => $request->detail_part_id,
                "defect_id" => $request->defect_id,
                "remark" => $request->remark,
                "klasifikasi" => $request->klasifikasi,
                'prioritas' => $request->prioritas,
                "status" => $request->status,
                "pic" => $request->pic,
                "tanggal" => $request->tanggal,
                "eksekutor" => $request->eksekutor,
            ]);
            return redirect()->route('temuan-visual.index')->withNotify('Data Temuan berhasil dimutakhirkan!');
        }
    }

    public function filter(Request $request)
    {
        $area_id = $request->area_id;
        $sub_area_id = $request->sub_area_id;
        $detail_area_id = $request->detail_area_id;
        $part_id = $request->part_id;
        $detail_part_id = $request->detail_part_id;
        $defect_id = $request->defect_id;
        $status = $request->status;
        $klasifikasi = $request->klasifikasi;
        $tanggal_awal = $request->tanggal_awal;
        $tanggal_akhir = $request->tanggal_akhir;

        $temuan = TemuanVisualCivil::query();

        // Filter by area_id
        $temuan->when($area_id, function ($query) use ($request) {
            return $query->where('area_id', $request->area_id);
        });

        // Filter by sub_area_id
        $temuan->when($sub_area_id, function ($query) use ($request) {
            return $query->where('sub_area_id', $request->sub_area_id);
        });

        // Filter by detail_area_id
        $temuan->when($detail_area_id, function ($query) use ($request) {
            return $query->where('detail_area_id', $request->detail_area_id);
        });

        // Filter by part_id
        $temuan->when($part_id, function ($query) use ($request) {
            return $query->where('part_id', $request->part_id);
        });

        // Filter by detail_part_id
        $temuan->when($detail_part_id, function ($query) use ($request) {
            return $query->where('detail_part_id', $request->detail_part_id);
        });

        // Filter by defect_id
        $temuan->when($defect_id, function ($query) use ($request) {
            return $query->where('defect_id', $request->defect_id);
        });

        // Filter by status
        $temuan->when($status, function ($query) use ($request) {
            return $query->where('status', $request->status);
        });

        // Filter by klasifikasi
        $temuan->when($klasifikasi, function ($query) use ($request) {
            return $query->where('klasifikasi', $request->klasifikasi);
        });

        // Filter by tanggal
        if ($tanggal_awal != null and $tanggal_akhir != null) {
            $temuan->when($tanggal_awal, function ($query) use ($request) {
                return $query->whereDate('tanggal', '>=', $request->tanggal_awal);
            });
            $temuan->when($tanggal_akhir, function ($query) use ($request) {
                return $query->whereDate('tanggal', '<=', $request->tanggal_akhir);
            });
        }

        $area = Area::where('stasiun', 'true')->get();
        $sub_area = SubArea::orderBy('name', 'asc')->get();
        $detail_area = DetailArea::orderBy('name', 'asc')->get();
        $part = PartCivil::orderBy('name', 'asc')->get();
        $detail_part = DetailPartCivil::orderBy('name', 'asc')->get();
        $defect = DefectCivil::orderBy('name', 'asc')->get();

        return view('civil.examination.examination_visual.index', [
            'temuan_visual' => $temuan->orderBy('tanggal', 'asc')->get(),
            'area' => $area,
            'sub_area' => $sub_area,
            'detail_area' => $detail_area,
            'part' => $part,
            'detail_part' => $detail_part,
            'defect' => $defect,
            'area_id' => $area_id,
            'sub_area_id' => $sub_area_id,
            'detail_area_id' => $detail_area_id,
            'part_id' => $part_id,
            'detail_part_id' => $detail_part_id,
            'defect_id' => $defect_id,
            'status' => $status,
            'klasifikasi' => $klasifikasi,
            'tanggal_awal' => $tanggal_awal,
            'tanggal_akhir' => $tanggal_akhir,
        ]);
    }

    public function export(Request $request)
    {
        $area_id = $request->area_id;
        $sub_area_id = $request->sub_area_id;
        $detail_area_id = $request->detail_area_id;
        $part_id = $request->part_id;
        $detail_part_id = $request->detail_part_id;
        $defect_id = $request->defect_id;
        $status = $request->status;
        $klasifikasi = $request->klasifikasi;
        $tanggal_awal = $request->tanggal_awal;
        $tanggal_akhir = $request->tanggal_akhir;

        $waktu = Carbon::now()->format('Ymd');

        if ($area_id == null and $sub_area_id == null and $detail_area_id == null and $part_id == null and $detail_part_id == null and $defect_id == null and $status == null and $klasifikasi == null and $tanggal_awal == null and $tanggal_akhir == null) {
            return Excel::download(new TemuanVisualExport(), $waktu . '_temuan_visual_(all).xlsx', \Maatwebsite\Excel\Excel::XLSX);
        } else {
            return Excel::download(new TemuanVisualFilterExport($area_id, $sub_area_id, $detail_area_id, $part_id, $detail_part_id, $defect_id, $status, $klasifikasi, $tanggal_awal, $tanggal_akhir), $waktu . '_temuan_visual_(filtered).xlsx', \Maatwebsite\Excel\Excel::XLSX);
        }
    }

    public function export_pdf(Request $request)
    {
        return 'Sorry, fitur masih dalam pengembangan.';
    }

    public function destroy($id)
    {
        //
    }
}