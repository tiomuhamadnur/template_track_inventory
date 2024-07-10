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
use App\Models\civil\RelasiAreaCivil;
use App\Models\civil\RelasiDefectCivil;
use App\Models\civil\SubArea;
use App\Models\civil\TemuanVisualCivil;
use Carbon\Carbon;
use Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class TemuanVisualCivilController extends Controller
{
    public function index()
    {
        $temuan_visual = TemuanVisualCivil::where('status', 'open')
            ->orderBy('tanggal', 'desc')
            ->orderBy('area_id', 'asc')
            ->orderBy('sub_area_id', 'asc')
            ->paginate(100);

        $area = Area::all();
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
        $status = 'open';
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
        $part = PartCivil::orderBy('name', 'asc')->get();

        return view('civil.examination.examination_visual.create', compact([
            'area',
            'part',
        ]));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'photo' => ['file', 'image', 'required'],
        ], [
            'photo.image' => 'File harus dalam format gambar/photo!',
        ]);

        $timestamp = now()->timestamp;
        $randomNumber = rand(1000, 9999);
        $ticketNumber = $timestamp . $randomNumber;

        if ($request->hasFile('photo') && $request->photo != '') {
            $photo_temuan = $request->file('photo')->store('civil/temuan');
            TemuanVisualCivil::create([
                'ticket_number' => $ticketNumber,
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

        $area = Area::all();
        $sub_area = SubArea::orderBy('name', 'asc')->get();
        $detail_area = DetailArea::orderBy('name', 'asc')->get();
        $part = PartCivil::orderBy('name', 'asc')->get();
        $detail_part = DetailPartCivil::orderBy('name', 'asc')->get();
        $defect = DefectCivil::orderBy('name', 'asc')->get();

        $temuan = $temuan->orderBy('tanggal', 'asc')->paginate(100);
        $temuan->appends($request->except('page'));

        return view('civil.examination.examination_visual.index', [
            'temuan_visual' => $temuan,
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

        if (
            $area_id == null and
            $sub_area_id == null and
            $detail_area_id == null and
            $part_id == null and
            $detail_part_id == null and
            $defect_id == null and
            $status == null and
            $klasifikasi == null and
            $tanggal_awal == null and
            $tanggal_akhir == null
        ) {
            $temuan_visual = TemuanVisualCivil::all();
            $waktu = Carbon::now();
            $pdf = Pdf::loadView('civil.examination.examination_visual.export.pdf', ['temuan_visual' => $temuan_visual]);

            return $pdf->stream($waktu . '_list-temuan-visual-(all).pdf');
        } else {
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

            $waktu = Carbon::now()->format('Ymd');
            $pdf = Pdf::loadView('civil.examination.examination_visual.export.pdf', ['temuan_visual' => $temuan->orderBy('tanggal', 'asc')->get()]);

            return $pdf->stream($waktu . '_list-temuan-visual-(filtered).pdf');
        }
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $temuan_visual = TemuanVisualCivil::findOrFail($id);
        if (!$temuan_visual) {
            return back();
        }
        Storage::delete($temuan_visual->photo);
        if ($temuan_visual->photo_close != '') {
            Storage::delete($temuan_visual->photo_close);
        }
        $temuan_visual->delete();
        return redirect()->route('temuan-visual.index')->withNotify('Data temuan berhasil dihapus secara permanen!');
    }

    public function get_sub_area(Request $request)
    {
        $area_id = $request->area_id;
        $sub_area = RelasiAreaCivil::select(
            'tbl_civil_sub_area.*',
        )
        ->join('tbl_civil_sub_area', 'tbl_civil_sub_area.id', '=', 'trans_civil_relasi_area.sub_area_id')
        ->where('trans_civil_relasi_area.area_id', $area_id)
        ->distinct()
        ->get();
        if (count($sub_area) > 0) {
            return response()->json($sub_area);
        }
    }

    public function get_detail_area(Request $request)
    {
        $area_id = $request->area_id;
        $sub_area_id = $request->sub_area_id;
        $detail_area = RelasiAreaCivil::select(
            'tbl_civil_detail_area.*',
        )
        ->join('tbl_civil_detail_area', 'tbl_civil_detail_area.id', '=', 'trans_civil_relasi_area.detail_area_id')
        ->where('trans_civil_relasi_area.area_id', $area_id)
        ->where('trans_civil_relasi_area.sub_area_id', $sub_area_id)
        ->distinct()
        ->get();
        if (count($detail_area) > 0) {
            return response()->json($detail_area);
        }
    }

    public function get_detail_part(Request $request)
    {
        $part_id = $request->part_id;
        $detail_part = RelasiDefectCivil::select(
            'tbl_civil_detail_part.*',
        )
        ->join('tbl_civil_detail_part', 'tbl_civil_detail_part.id', '=', 'trans_civil_relasi_defect.detail_part_id')
        ->where('trans_civil_relasi_defect.part_id', $part_id)
        ->distinct()
        ->get();
        if (count($detail_part) > 0) {
            return response()->json($detail_part);
        }
    }

    public function get_defect(Request $request)
    {
        $part_id = $request->part_id;
        $detail_part_id = $request->detail_part_id;
        $defect = RelasiDefectCivil::select(
            'tbl_civil_defect.*',
        )
        ->join('tbl_civil_defect', 'tbl_civil_defect.id', '=', 'trans_civil_relasi_defect.defect_id')
        ->where('trans_civil_relasi_defect.part_id', $part_id)
        ->where('trans_civil_relasi_defect.detail_part_id', $detail_part_id)
        ->distinct()
        ->get();
        if (count($defect) > 0) {
            return response()->json($defect);
        }
    }

    public function search(Request $request)
    {
        $ticketNumber = $request->ticket_number;
        $temuan_visual = TemuanVisualCivil::where('ticket_number', $ticketNumber)->paginate();

        if($temuan_visual->count() == 0)
        {
            return back()->withNotifyerror('Data tidak ditemukan!');
        }

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
        $status = 'open';
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
}
