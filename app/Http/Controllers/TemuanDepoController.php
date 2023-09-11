<?php

namespace App\Http\Controllers;

use App\Exports\TemuanDepoExport;
use App\Exports\TemuanDepoFilterExport;
use App\Models\Defect;
use App\Models\Line;
use App\Models\Part;
use App\Models\TemuanDepo;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Excel;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class TemuanDepoController extends Controller
{
    public function index()
    {
        $temuan_depo = TemuanDepo::where('status', 'open')->orWhere('status', 'monitoring')->orderBy('tanggal', 'desc')->get();
        $line = Line::where('area', 'Depo')->get();
        $part = Part::orderBy('name', 'asc')->get();

        $line_id = '';
        $part_id = '';
        $status = '';
        $klasifikasi = '';
        $tanggal_awal = '';
        $tanggal_akhir = '';

        return view('depo.depo_temuan.index', compact('temuan_depo', 'line', 'part', 'line_id', 'part_id', 'status', 'klasifikasi', 'tanggal_awal', 'tanggal_akhir'));
    }

    public function create()
    {
        $line_depo = Line::where('area', 'Depo')->orderBy('name', 'asc')->get();
        $part = Part::orderBy('name', 'asc')->get();

        return view('depo.depo_temuan.create', compact(['line_depo', 'part']));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'photo' => ['file', 'image', 'required'],
        ], [
            'photo.image' => 'File harus dalam format gambar/photo!',
        ]);

        if ($request->hasFile('photo') && $request->photo != '') {
            $photo_temuan = $request->file('photo')->store('temuan/depo');
            TemuanDepo::create([
                'line_id' => $request->line_id,
                'kilometer' => $request->kilometer,
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

            return redirect()->route('temuan_depo.index')->withNotify('Data temuan baru depo berhasil ditambahkan!');
        } else {
            TemuanDepo::create([
                'line_id' => $request->line_id,
                'kilometer' => $request->kilometer,
                'part_id' => $request->part_id,
                'detail_part_id' => $request->detail_part_id,
                'direction' => $request->direction,
                'defect_id' => $request->defect_id,
                'remark' => $request->remark,
                'klasifikasi' => $request->klasifikasi,
                'pic' => $request->pic,
                'tanggal' => $request->tanggal,
            ]);

            return redirect()->route('temuan_depo.index')->withNotify('Data temuan baru depo berhasil ditambahkan!');
        }
    }

    public function export(Request $request)
    {
        $line_id = $request->line_id;
        $part_id = $request->part_id;
        $status = $request->status;
        $klasifikasi = $request->klasifikasi;
        $tanggal_awal = $request->tanggal_awal;
        $tanggal_akhir = $request->tanggal_akhir;

        $waktu = Carbon::now();

        if ($line_id == null and $part_id == null and $status == null and $klasifikasi == null and $tanggal_awal == null and $tanggal_akhir == null) {
            return Excel::download(new TemuanDepoExport(), $waktu.'_temuan_depo_all.xlsx', \Maatwebsite\Excel\Excel::XLSX);
        } else {
            return Excel::download(new TemuanDepoFilterExport($line_id, $part_id, $status, $klasifikasi, $tanggal_awal, $tanggal_akhir), $waktu.'_temuan_depo_filtered.xlsx', \Maatwebsite\Excel\Excel::XLSX);
        }
    }

    public function export_pdf(Request $request)
    {
        $line_id = $request->line_id;
        $part_id = $request->part_id;
        $status = $request->status;
        $klasifikasi = $request->klasifikasi;
        $tanggal_awal = $request->tanggal_awal;
        $tanggal_akhir = $request->tanggal_akhir;

        $waktu = Carbon::now();

        if ($line_id == null and $part_id == null and $status == null and $klasifikasi == null and $tanggal_awal == null and $tanggal_akhir == null) {
            $temuan_depo = TemuanDepo::all();
            $waktu = Carbon::now();
            $pdf = Pdf::loadView('depo.depo_temuan.export-pdf', ['temuan_depo' => $temuan_depo]);

            return $pdf->stream($waktu.'_list-temuan-depo.pdf');
        } else {
            $temuan_depo_filter = TemuanDepo::query();

            // Filter by line_id
            $temuan_depo_filter->when($line_id, function ($query) use ($request) {
                return $query->where('line_id', $request->line_id)->get();
            });

            // Filter by part_id
            $temuan_depo_filter->when($part_id, function ($query) use ($request) {
                return $query->where('part_id', $request->part_id)->get();
            });

            // Filter by status
            $temuan_depo_filter->when($status, function ($query) use ($request) {
                return $query->where('status', $request->status)->get();
            });

            // Filter by klasifikasi
            $temuan_depo_filter->when($klasifikasi, function ($query) use ($request) {
                return $query->where('klasifikasi', $request->klasifikasi)->get();
            });

            // Filter by tanggal
            if ($tanggal_awal != null and $tanggal_akhir != null) {
                $temuan_depo_filter->when($tanggal_awal, function ($query) use ($request) {
                    return $query->whereDate('tanggal', '>=', $request->tanggal_awal);
                });
                $temuan_depo_filter->when($tanggal_akhir, function ($query) use ($request) {
                    return $query->whereDate('tanggal', '<=', $request->tanggal_akhir);
                });
            }

            $temuan_depo = $temuan_depo_filter->get();
            $waktu = Carbon::now();
            $pdf = Pdf::loadView('depo.depo_temuan.export-pdf', ['temuan_depo' => $temuan_depo]);

            return $pdf->stream($waktu.'_list-temuan-depo-filtered.pdf');
        }
    }

    public function filter(Request $request)
    {
        $line_id = $request->line_id;
        $part_id = $request->part_id;
        $status = $request->status;
        $klasifikasi = $request->klasifikasi;
        $tanggal_awal = $request->tanggal_awal;
        $tanggal_akhir = $request->tanggal_akhir;

        $temuan_depo = TemuanDepo::query();

        // Filter by line_id
        $temuan_depo->when($line_id, function ($query) use ($request) {
            return $query->where('line_id', $request->line_id)->get();
        });

        // Filter by part_id
        $temuan_depo->when($part_id, function ($query) use ($request) {
            return $query->where('part_id', $request->part_id)->get();
        });

        // Filter by status
        $temuan_depo->when($status, function ($query) use ($request) {
            return $query->where('status', $request->status)->get();
        });

        // Filter by klasifikasi
        $temuan_depo->when($klasifikasi, function ($query) use ($request) {
            return $query->where('klasifikasi', $request->klasifikasi)->get();
        });

        // Filter by tanggal
        if ($tanggal_awal != null and $tanggal_akhir != null) {
            $temuan_depo->when($tanggal_awal, function ($query) use ($request) {
                return $query->whereDate('tanggal', '>=', $request->tanggal_awal);
            });
            $temuan_depo->when($tanggal_akhir, function ($query) use ($request) {
                return $query->whereDate('tanggal', '<=', $request->tanggal_akhir);
            });
        }

        $line = Line::where('area', 'Depo')->get();
        $part = Part::orderBy('name', 'asc')->get();

        return view('depo.depo_temuan.index', [
            'temuan_depo' => $temuan_depo->orderBy('kilometer', 'asc')->get(),
            'line' => $line,
            'part' => $part,
            'line_id' => $line_id,
            'part_id' => $part_id,
            'status' => $status,
            'klasifikasi' => $klasifikasi,
            'tanggal_awal' => $tanggal_awal,
            'tanggal_akhir' => $tanggal_akhir,
        ]);
    }

    public function report(Request $request)
    {
        $tanggal = $request->tanggal;
        $area = 'DEPO';
        $temuan_depo = TemuanDepo::where('tanggal', $tanggal)->orderBy('kilometer', 'asc')->get();

        return view('depo.depo_temuan.report.report', compact(['tanggal', 'temuan_depo', 'area']));
    }

    public function close_temuan($id)
    {
        try {
            $secret = Crypt::decryptString($id);
            $temuan_depo = TemuanDepo::findOrFail($secret);
            if ($temuan_depo) {
                return view('depo.depo_temuan.close', compact(['temuan_depo']));
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
            'photo_close.image' => 'File harus dalam format gambar/photo!',
        ]);

        $id = $request->id;
        if ($request->hasFile('photo_close') && $request->photo_close != '') {
            $photo_close = $request->file('photo_close')->store('temuan/depo/perbaikan');
            $temuan_depo = TemuanDepo::findOrFail($id);
            $temuan_depo->update([
                'status' => $request->status,
                'photo_close' => $photo_close,
                'pic_close' => $request->pic_close,
            ]);

            return redirect()->route('temuan_depo.index')->withNotify('Status temuan depo berhasil diubah!');
        } else {
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        try {
            $secret = Crypt::decryptString($id);
            $temuan_depo = TemuanDepo::findOrFail($secret);
            $defect = Defect::all();
            if ($temuan_depo) {
                return view('depo.depo_temuan.update', compact(['temuan_depo', 'defect']));
            } else {
                return redirect()->back();
            }
        } catch (DecryptException $e) {
            return redirect()->back();
        }
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'photo' => ['image'],
        ], [
            'photo.image' => 'File harus dalam format gambar/photo!',
        ]);

        $id = $request->id;
        $temuan_depo = TemuanDepo::findOrFail($id);

        if ($request->hasFile('photo') && $request->photo != '') {
            $photo_temuan = $request->file('photo')->store('temuan/depo');
            $temuan_depo->update([
                'kilometer' => $request->kilometer,
                'direction' => $request->direction,
                'defect_id' => $request->defect_id,
                'remark' => $request->remark,
                'klasifikasi' => $request->klasifikasi,
                'status' => $request->status,
                'tanggal' => $request->tanggal,
                'justifikasi' => $request->justifikasi,
                'photo' => $photo_temuan,
            ]);

            return redirect()->route('temuan_depo.index')->withNotify('Data temuan depo berhasil dimutakhirkan!');
        } else {
            $temuan_depo->update([
                'kilometer' => $request->kilometer,
                'direction' => $request->direction,
                'defect_id' => $request->defect_id,
                'remark' => $request->remark,
                'klasifikasi' => $request->klasifikasi,
                'status' => $request->status,
                'tanggal' => $request->tanggal,
                'justifikasi' => $request->justifikasi,
            ]);

            return redirect()->route('temuan_depo.index')->withNotify('Data temuan depo berhasil dimutakhirkan!');
        }
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $temuan_depo = TemuanDepo::findOrFail($id);
        if ($temuan_depo) {
            $temuan_depo->delete();

            return redirect()->route('temuan_depo.index')->withNotify('Data temuan depo berhasil dihapus!');
        } else {
            return redirect()->back();
        }
    }
}