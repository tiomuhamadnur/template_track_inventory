<?php

namespace App\Http\Controllers;

use App\Exports\TemuanMainlineExport;
use App\Exports\TemuanMainlineFilterExport;
use App\Helpers\WhatsAppHelper;
use App\Models\Area;
use App\Models\Defect;
use App\Models\Line;
use App\Models\Mainline;
use App\Models\Part;
use App\Models\Pegawai;
use App\Models\Temuan;
use App\Models\TransDefect;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Excel;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class TemuanMainlineController extends Controller
{
    public function index()
    {
        $temuan = Temuan::where('status', 'open')->orWhere('status', 'monitoring')->orderBy('tanggal', 'DESC')->orderBy('mainline_id', 'DESC')->paginate(100);
        $area = Area::whereNot('area', 'Depo')->whereNot('area', 'Other')->get();
        $area_rencana = Area::where('stasiun', 'true')->orWhere('area', 'DAL')->get();
        $line = Line::whereNot('area', 'Depo')->get();
        $part = Part::orderBy('name', 'asc')->get();

        $area_id = '';
        $line_id = '';
        $part_id = '';
        $status = '';
        $klasifikasi = '';
        $tanggal_awal = '';
        $tanggal_akhir = '';

        return view('mainline.mainline_temuan.index', compact(['temuan', 'area', 'area_rencana', 'line', 'part', 'area_id', 'line_id', 'part_id', 'status', 'klasifikasi', 'tanggal_awal', 'tanggal_akhir']));
    }

    public function export(Request $request)
    {
        $area_id = $request->area_id;
        $line_id = $request->line_id;
        $part_id = $request->part_id;
        $status = $request->status;
        $klasifikasi = $request->klasifikasi;
        $tanggal_awal = $request->tanggal_awal;
        $tanggal_akhir = $request->tanggal_akhir;

        $waktu = Carbon::now();

        if ($area_id == null and $line_id == null and $part_id == null and $status == null and $klasifikasi == null and $tanggal_awal == null and $tanggal_akhir == null) {
            return Excel::download(new TemuanMainlineExport(), $waktu . '_temuan_mainline_all.xlsx', \Maatwebsite\Excel\Excel::XLSX);
        } else {
            return Excel::download(new TemuanMainlineFilterExport($area_id, $line_id, $part_id, $status, $klasifikasi, $tanggal_awal, $tanggal_akhir), $waktu . '_temuan_mainline_filtered.xlsx', \Maatwebsite\Excel\Excel::XLSX);
        }
    }

    public function export_pdf(Request $request)
    {
        $area_id = $request->area_id;
        $line_id = $request->line_id;
        $part_id = $request->part_id;
        $status = $request->status;
        $klasifikasi = $request->klasifikasi;
        $tanggal_awal = $request->tanggal_awal;
        $tanggal_akhir = $request->tanggal_akhir;

        if ($area_id == null and $line_id == null and $part_id == null and $status == null and $klasifikasi == null and $tanggal_awal == null and $tanggal_akhir == null) {
            $temuan = Temuan::all();
            $waktu = Carbon::now();
            $pdf = Pdf::loadView('mainline.mainline_temuan.export-pdf', ['temuan' => $temuan]);

            return $pdf->stream($waktu . '_list-temuan-mainline.pdf');
        } else {
            $temuan_filter = Temuan::query()->select(
                'summary_temuan.*',
                'mainline.area_id as area_id',
                'mainline.kilometer as kilometer',
            )
                ->join('mainline', 'mainline.id', '=', 'summary_temuan.mainline_id');

            // Filter by area_id
            $temuan_filter->when($area_id, function ($query) use ($request) {
                return $query->where('area_id', $request->area_id);
            });

            // Filter by line_id
            $temuan_filter->when($line_id, function ($query) use ($request) {
                return $query->where('line_id', $request->line_id);
            });

            // Filter by part_id
            $temuan_filter->when($part_id, function ($query) use ($request) {
                return $query->where('part_id', $request->part_id);
            });

            // Filter by status
            $temuan_filter->when($status, function ($query) use ($request) {
                return $query->whereIn('status', $request->status);
            });

            // Filter by klasifikasi
            $temuan_filter->when($klasifikasi, function ($query) use ($request) {
                return $query->where('klasifikasi', $request->klasifikasi);
            });

            // Filter by tanggal
            if ($tanggal_awal != null and $tanggal_akhir != null) {
                $temuan_filter->when($tanggal_awal, function ($query) use ($request) {
                    return $query->whereDate('tanggal', '>=', $request->tanggal_awal);
                });
                $temuan_filter->when($tanggal_akhir, function ($query) use ($request) {
                    return $query->whereDate('tanggal', '<=', $request->tanggal_akhir);
                });
            }

            $temuan = $temuan_filter->orderBy('kilometer', 'asc')->get();
            $waktu = Carbon::now();
            $pdf = Pdf::loadView('mainline.mainline_temuan.export-pdf', ['temuan' => $temuan]);

            return $pdf->stream($waktu . '_list-temuan-mainline-filtered.pdf');
        }
    }

    public function filter(Request $request)
    {
        $area_id = $request->area_id;
        $line_id = $request->line_id;
        $part_id = $request->part_id;
        $status = $request->status;
        $klasifikasi = $request->klasifikasi;
        $tanggal_awal = $request->tanggal_awal;
        $tanggal_akhir = $request->tanggal_akhir;

        $temuan = Temuan::query()
            ->select(
                'summary_temuan.*',
                'mainline.area_id as area_id',
                'mainline.kilometer as kilometer',
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
            return $query->whereIn('status', $request->status);
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

        $temuan = $temuan->orderByRaw('CAST(kilometer AS DECIMAL) ASC')->paginate(100);
        $temuan->appends($request->except('page'));

        $area = Area::whereNot('area', 'Depo')->whereNot('area', 'Other')->get();
        $area_rencana = Area::where('stasiun', 'true')->orWhere('area', 'DAL')->get();
        $line = Line::whereNot('area', 'Depo')->get();
        $part = Part::orderBy('name', 'asc')->get();

        return view('mainline.mainline_temuan.index', [
            'temuan' => $temuan,
            'area_rencana' => $area_rencana,
            'area' => $area,
            'line' => $line,
            'part' => $part,
            'area_id' => $area_id,
            'line_id' => $line_id,
            'part_id' => $part_id,
            'status' => $status,
            'klasifikasi' => $klasifikasi,
            'tanggal_awal' => $tanggal_awal,
            'tanggal_akhir' => $tanggal_akhir,
        ]);
    }

    public function create()
    {
        $part = Part::orderBy('name', 'asc')->get();

        return view('mainline.mainline_temuan.create', compact(['part']));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'photo' => ['file', 'image', 'required'],
        ], [
            'photo.image' => 'File harus dalam format gambar/photo!',
        ]);

        $klasifikasi = $request->klasifikasi;

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
                'klasifikasi' => $klasifikasi,
                'pic' => $request->pic,
                'tanggal' => $request->tanggal,
                'photo' => $photo_temuan,
            ]);

            if($klasifikasi == 'Mayor'){
                $temuan = Temuan::whereDate('tanggal', $request->tanggal)->where('mainline_id', $request->mainline_id)->where('part_id', $request->part_id)->where('detail_part_id', $request->detail_part_id)->first();
                if($temuan){
                    $examiner = $temuan->pic;
                    $tanggal = $temuan->tanggal ?? '-';
                    $part = $temuan->part->name ?? '-';
                    $detail_part = $temuan->detail_part->name ?? '-';
                    $lokasi = $temuan->mainline->area->code ?? '-';
                    $line = $temuan->mainline->line->code ?? '-';
                    $track_bed = $temuan->mainline->no_span ?? '-';
                    $no_sleeper = $temuan->no_sleeper ?? '-';
                    $direction = $temuan->direction ?? '-';
                    $defect = $temuan->defect->name ?? 'lainnya';
                    $link_photo_temuan = asset('storage/' . $temuan->photo);
                    $remark = $temuan->remark ?? '-';

                    $section_head = Pegawai::where('jabatan', 'Section Head')
                        ->whereIn('section_id', [1, 2])
                        ->get();

                    foreach ($section_head as $item) {
                        $nama_sh = $item->name;
                        $gender_sh = $item->gender ?? '';
                        $phoneNumber = $item->no_hp;

                        $message = $this->message_format($nama_sh, $gender_sh, $tanggal, $part, $detail_part, $defect, $examiner, $lokasi, $line, $track_bed, $no_sleeper, $direction, $link_photo_temuan, $remark);
                        WhatsAppHelper::sendNotification($phoneNumber, $message);
                    }
                }
            }

            return redirect()->route('temuan_mainline.index')->withNotify('Data temuan baru mainline berhasil ditambahkan!');
        }
    }

    public function message_format ($nama_sh, $gender_sh, $tanggal, $part, $detail_part, $defect, $examiner, $lokasi, $line, $track_bed, $no_sleeper, $direction, $link_photo_temuan, $remark)
    {
        $enter = "\n";
        $div = '=============================';
        $url = 'https://exodus.tideupindustries.com/temuan-mainline/filter?status%5B%5D=open&status%5B%5D=monitoring&klasifikasi=Mayor&tanggal_awal=' . $tanggal . '&tanggal_akhir=' . $tanggal;

        $message = '🔴 *EXODUS NOTIFICATION: MAJOR FINDINGS*' . $enter . $enter . $enter .
        'Dear ' . $gender_sh .' *' . $nama_sh . '*,' . $enter . $enter.
        'Sebagai informasi, terdapat *Temuan Major* di *Exodus* yang perlu di _review_ dengan detail informasi sebagai berikut:' . $enter . $enter .

        $div . $enter . $enter .
        '*Examiner :*' . $enter.
        $examiner . $enter . $enter .

        '*Tanggal :*' . $enter .
        $tanggal . $enter . $enter .

        '*Part :*' . $enter .
        $part . $enter . $enter .

        '*Detail Part :*' . $enter .
        $detail_part . $enter . $enter .

        '*Defect :*' . $enter .
        $defect . $enter . $enter .

        '*Lokasi :*' . $enter .
        $lokasi . $enter . $enter .

        '*Line :*' . $enter .
        $line . $enter . $enter .

        '*No Track Bed :*' . $enter .
        $track_bed . $enter . $enter .

        '*No Sleeper :*' . $enter .
        $no_sleeper . $enter . $enter .

        '*Direction :*' . $enter .
        $direction . $enter . $enter .

        '*Remark :*' . $enter .
        $remark . $enter . $enter .

        '*Photo Temuan :*' . $enter .
        $link_photo_temuan . $enter . $enter .

        '*Link URL :*' . $enter .
        $url . $enter . $enter .
        $div . $enter . $enter .

        '_Regards,_' . $enter . $enter .
        '*ExoBOT*' .
        $enter . $enter . $enter . $enter;

        return $message;
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
            if ($temuan) {
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
            'photo_close' => ['image', 'required'],
        ], [
            'photo_close.image' => 'File harus dalam format gambar/photo!',
        ]);

        $id = $request->id;
        if ($request->hasFile('photo_close') && $request->photo_close != '') {
            $photo_close = $request->file('photo_close')->store('temuan/mainline/perbaikan');
            $temuan = Temuan::findOrFail($id);
            $temuan->update([
                'status' => $request->status,
                'photo_close' => $photo_close,
                'pic_close' => $request->pic_close,
            ]);

            return redirect()->route('temuan_mainline.index')->withNotify('Status temuan mainline berhasil diubah!');
        } else {
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        try {
            $secret = Crypt::decryptString($id);
            $temuan = Temuan::findOrFail($secret);
            $defect = Defect::all();
            if ($temuan) {
                return view('mainline.mainline_temuan.update', compact(['temuan', 'defect']));
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
        $temuan = Temuan::findOrFail($id);

        if ($request->hasFile('photo') && $request->photo != '') {
            $photo_temuan = $request->file('photo')->store('temuan/mainline');
            $temuan->update([
                'no_sleeper' => $request->no_sleeper,
                'direction' => $request->direction,
                'defect_id' => $request->defect_id,
                'remark' => $request->remark,
                'klasifikasi' => $request->klasifikasi,
                'status' => $request->status,
                'tanggal' => $request->tanggal,
                'justifikasi' => $request->justifikasi,
                'photo' => $photo_temuan,
            ]);

            return redirect()->route('temuan_mainline.index')->withNotify('Data temuan mainline berhasil dimutakhirkan!');
        } else {
            $temuan->update([
                'no_sleeper' => $request->no_sleeper,
                'direction' => $request->direction,
                'defect_id' => $request->defect_id,
                'remark' => $request->remark,
                'klasifikasi' => $request->klasifikasi,
                'status' => $request->status,
                'tanggal' => $request->tanggal,
                'justifikasi' => $request->justifikasi,
            ]);

            return redirect()->route('temuan_mainline.index')->withNotify('Data temuan mainline berhasil dimutakhirkan!');
        }
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $temuan = Temuan::findOrFail($id);
        if (!$temuan) {
            return redirect()->back();
        }
        if($temuan->photo){
            Storage::delete($temuan->photo);
        }
        if ($temuan->photo_close != '') {
            Storage::delete($temuan->photo_close);
        }
        $temuan->delete();

        return redirect()->route('temuan_mainline.index')->withNotify('Data temuan mainline berhasil dihapus!');

    }
}
