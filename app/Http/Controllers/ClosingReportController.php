<?php

namespace App\Http\Controllers;

use App\Models\ClosingReport;
use App\Models\Pegawai;
use App\Models\PM;
use App\Models\ToolsMaterials;
use App\Models\TransToolsMaterials;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;
use MathPHP\Statistics\Descriptive;

class ClosingReportController extends Controller
{
    public function create()
    {
        $activity = PM::orderBy('name', 'asc')->get();
        $section_head = Pegawai::where('jabatan', 'Section Head')->get();
        $personel = Pegawai::where('jabatan', 'Technician')->orderBy('name', 'asc')->get();
        $tools = ToolsMaterials::orderBy('name', 'asc')->get();

        return view('mainline.mainline_closing_report.create', compact(['activity', 'section_head', 'personel', 'tools']));
    }

    public function form()
    {
        $validasi = ClosingReport::get()->count();
        if ($validasi == 0) {
            return redirect()->route('temuan_mainline.index');
        }

        function closing_report()
        {
            $closing_report = ClosingReport::where('kegiatan', '!=', null)->orderBy('id', 'desc')->first();
            return $closing_report;
        }

        $closing_report = closing_report();

        $sh = closing_report()->section_head;
        $section_head = Pegawai::where('name', $sh)->first();
        $kegiatan = closing_report()->kegiatan;
        $lokasi = closing_report()->lokasi;
        $tools = TransToolsMaterials::all();
        $lampiran = ClosingReport::where('kegiatan', null)->get();

        $tanggal = closing_report()->tanggal;
        $tanggal = date('Ymd', strtotime($tanggal));
        $tanggal_format = date('l, d F Y', strtotime(closing_report()->tanggal));

        $pdf = Pdf::loadView(
            'mainline.mainline_closing_report.format-pdf',
            [
                'closing_report' => $closing_report,
                'lampiran' => $lampiran,
                'section_head' => $section_head,
                'tools' => $tools,
                'tanggal' => $tanggal_format
            ]
        )
            ->setPaper('a4', 'potrait');

        return $pdf->stream($tanggal . '_Closing Report Activity_' . $kegiatan . '_' . $lokasi . '.pdf');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'photo_1' => ['file', 'image', 'required'],
            'photo_2' => ['file', 'image', 'required'],
            'photo_3' => ['file', 'image', 'required'],
            'photo_4' => ['file', 'image', 'required'],
            'photo_5' => ['file', 'image', 'required'],
            'photo_6' => ['file', 'image', 'required'],
            'lampiran_1.*' => ['file', 'image'],
            // 'lampiran_2' => ['file', 'image'],
        ], [
            'photo_1.image' => 'File harus dalam format gambar/photo!',
            'photo_2.image' => 'File harus dalam format gambar/photo!',
            'photo_3.image' => 'File harus dalam format gambar/photo!',
            'photo_4.image' => 'File harus dalam format gambar/photo!',
            'photo_5.image' => 'File harus dalam format gambar/photo!',
            'photo_6.image' => 'File harus dalam format gambar/photo!',
            // 'lampiran_1.image' => 'File harus dalam format gambar/photo!',
            // 'lampiran_2.image' => 'File harus dalam format gambar/photo!',
        ]);

        for ($i = 0; $i < count($request->tools_id); $i++) {
            TransToolsMaterials::create([
                'tools_id' => $request->tools_id[$i],
                'qty' => $request->qty[$i],
                'initial_check' => $request->initial_check[$i],
                'ending_check' => $request->ending_check[$i],
                'remark' => $request->remark[$i],
            ]);
        }

        $lampiran_1 = $request->file('lampiran_1');
        if ($lampiran_1) {
            foreach ($lampiran_1 as $lampiran) {
                $save_url = $lampiran->store('closing_report/foto_lampiran');
                ClosingReport::create([
                    'lampiran_1' => $save_url,
                ]);
            }
        }

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

    public function setdev()
    {
        $data = [3, 2, 6, 1, -3];
        $standarDeviasi = Descriptive::standardDeviation($data);

        return "Standar deviasi: " . $standarDeviasi;
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
        $trans_tools_materials = TransToolsMaterials::get();
        if ($closing_report and $trans_tools_materials) {
            ClosingReport::truncate();
            TransToolsMaterials::truncate();
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