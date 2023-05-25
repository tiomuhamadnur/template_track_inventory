<?php

namespace App\Http\Controllers;

use App\Models\ClosingReport;
use App\Models\Pegawai;
use App\Models\PM;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class ClosingReportController extends Controller
{
    public function create()
    {
        $activity = PM::orderBy('name', 'asc')->get();
        $section_head = Pegawai::where('jabatan', 'Section Head')->get();
        $personel = Pegawai::where('jabatan', 'Technician')->orderBy('name', 'asc')->get();

        return view('mainline.mainline_closing_report.create', compact(['activity', 'section_head', 'personel']));
    }

    public function form()
    {
        $validasi = ClosingReport::get()->count();
        if ($validasi == 0) {
            return redirect()->route('temuan_mainline.index');
        }

        function closing_report()
        {
            $closing_report = ClosingReport::orderBy('id', 'desc')->first();
            return $closing_report;
        }

        $closing_report = closing_report();

        $sh = closing_report()->section_head;
        $ttd_sh = Pegawai::where('name', $sh)->value('ttd');
        $kegiatan = closing_report()->kegiatan;
        $lokasi = closing_report()->lokasi;

        $tanggal = closing_report()->value('tanggal');
        $tanggal = date('Ymd', strtotime($tanggal));
        $tanggal_format = date('l, d-F-Y', strtotime(closing_report()->value('tanggal')));

        $pdf = Pdf::loadView(
            'mainline.mainline_closing_report.format-pdf',
            [
                'closing_report' => $closing_report,
                'ttd_sh' => $ttd_sh,
                'tanggal' => $tanggal_format
            ]
        )
            ->setPaper('a4', 'potrait');

        return $pdf->stream($tanggal . '_Closing Report Activity_' . $kegiatan . '_' . $lokasi . '.pdf');
    }

    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'photo_1' => ['file', 'image', 'required'],
            'photo_2' => ['file', 'image', 'required'],
            'photo_3' => ['file', 'image', 'required'],
            'photo_4' => ['file', 'image', 'required'],
            'photo_5' => ['file', 'image', 'required'],
            'photo_6' => ['file', 'image', 'required'],
            'lampiran_1' => ['file', 'image'],
            'lampiran_2' => ['file', 'image'],
        ], [
            'photo_1.image' => 'File harus dalam format gambar/photo!',
            'photo_2.image' => 'File harus dalam format gambar/photo!',
            'photo_3.image' => 'File harus dalam format gambar/photo!',
            'photo_4.image' => 'File harus dalam format gambar/photo!',
            'photo_5.image' => 'File harus dalam format gambar/photo!',
            'photo_6.image' => 'File harus dalam format gambar/photo!',
            'lampiran_1.image' => 'File harus dalam format gambar/photo!',
            'lampiran_2.image' => 'File harus dalam format gambar/photo!',
        ]);

        if ($request->hasFile('lampiran_1') && $request->hasFile('lampiran_2')) {
            $photo_1 = $request->file('photo_1')->store('closing_report/foto_kegiatan');
            $photo_2 = $request->file('photo_2')->store('closing_report/foto_kegiatan');
            $photo_3 = $request->file('photo_3')->store('closing_report/foto_kegiatan');
            $photo_4 = $request->file('photo_4')->store('closing_report/foto_kegiatan');
            $photo_5 = $request->file('photo_5')->store('closing_report/foto_kegiatan');
            $photo_6 = $request->file('photo_6')->store('closing_report/foto_kegiatan');
            $lampiran_1 = $request->file('lampiran_1')->store('closing_report/foto_lampiran');
            $lampiran_2 = $request->file('lampiran_2')->store('closing_report/foto_lampiran');

            ClosingReport::create([
                "kegiatan" => $request->kegiatan,
                "tanggal" => $request->tanggal,
                "lokasi" => $request->lokasi,
                "waktu_mulai" => $request->waktu_mulai,
                "section_head" => $request->section_head,
                "personel_1" => $request->personel_1,
                "personel_2" => $request->personel_2,
                "personel_3" => $request->personel_3,
                "personel_4" => $request->personel_4,
                "status_lampiran" => $request->status_lampiran,
                'photo_1' => $photo_1,
                'photo_2' => $photo_2,
                'photo_3' => $photo_3,
                'photo_4' => $photo_4,
                'photo_5' => $photo_5,
                'photo_6' => $photo_6,
                'lampiran_1' => $lampiran_1,
                'lampiran_2' => $lampiran_2,
            ]);

            return redirect()->route('closing_report.form');
        } elseif ($request->hasFile('lampiran_1')) {
            $photo_1 = $request->file('photo_1')->store('closing_report/foto_kegiatan');
            $photo_2 = $request->file('photo_2')->store('closing_report/foto_kegiatan');
            $photo_3 = $request->file('photo_3')->store('closing_report/foto_kegiatan');
            $photo_4 = $request->file('photo_4')->store('closing_report/foto_kegiatan');
            $photo_5 = $request->file('photo_5')->store('closing_report/foto_kegiatan');
            $photo_6 = $request->file('photo_6')->store('closing_report/foto_kegiatan');
            $lampiran_1 = $request->file('lampiran_1')->store('closing_report/foto_lampiran');

            ClosingReport::create([
                "kegiatan" => $request->kegiatan,
                "tanggal" => $request->tanggal,
                "lokasi" => $request->lokasi,
                "waktu_mulai" => $request->waktu_mulai,
                "section_head" => $request->section_head,
                "personel_1" => $request->personel_1,
                "personel_2" => $request->personel_2,
                "personel_3" => $request->personel_3,
                "personel_4" => $request->personel_4,
                "status_lampiran" => $request->status_lampiran,
                'photo_1' => $photo_1,
                'photo_2' => $photo_2,
                'photo_3' => $photo_3,
                'photo_4' => $photo_4,
                'photo_5' => $photo_5,
                'photo_6' => $photo_6,
                'lampiran_1' => $lampiran_1,
            ]);

            return redirect()->route('closing_report.form');
        } else {
            $photo_1 = $request->file('photo_1')->store('closing_report/foto_kegiatan');
            $photo_2 = $request->file('photo_2')->store('closing_report/foto_kegiatan');
            $photo_3 = $request->file('photo_3')->store('closing_report/foto_kegiatan');
            $photo_4 = $request->file('photo_4')->store('closing_report/foto_kegiatan');
            $photo_5 = $request->file('photo_5')->store('closing_report/foto_kegiatan');
            $photo_6 = $request->file('photo_6')->store('closing_report/foto_kegiatan');

            ClosingReport::create([
                "kegiatan" => $request->kegiatan,
                "tanggal" => $request->tanggal,
                "lokasi" => $request->lokasi,
                "waktu_mulai" => $request->waktu_mulai,
                "section_head" => $request->section_head,
                "personel_1" => $request->personel_1,
                "personel_2" => $request->personel_2,
                "personel_3" => $request->personel_3,
                "personel_4" => $request->personel_4,
                "status_lampiran" => $request->status_lampiran,
                'photo_1' => $photo_1,
                'photo_2' => $photo_2,
                'photo_3' => $photo_3,
                'photo_4' => $photo_4,
                'photo_5' => $photo_5,
                'photo_6' => $photo_6,
            ]);

            return redirect()->route('closing_report.form');
        }
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

    public function destroy()
    {
        $foto_kegiatan = Storage::disk('public')->files('closing_report/foto_kegiatan');
        $foto_lampiran = Storage::disk('public')->files('closing_report/foto_lampiran');

        $closing_report = ClosingReport::get();
        if ($closing_report) {
            ClosingReport::truncate();
            if ($foto_kegiatan or $foto_lampiran) {
                foreach ($foto_kegiatan as $item) {
                    Storage::disk('public')->delete($item);
                }

                foreach ($foto_lampiran as $item) {
                    Storage::disk('public')->delete($item);
                }

                return redirect()->route('closing_report.create');
            }
        } else {
            return redirect()->route('closing_report.create');
        }
        return redirect()->route('closing_report.create');
    }
}
