<?php

namespace App\Http\Controllers;

use App\Helpers\WhatsAppHelper;
use App\Mail\SendMailRFI;
use App\Models\Pegawai;
use App\Models\TransRFI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendEmailController extends Controller
{
    public function rfi()
    {
        $section_head = Pegawai::where('jabatan', 'Section Head')
            ->whereIn('section', ['Permanent Way RAMS', 'Permanent Way Maintenance'])
            ->get();
        $jumlah_rfi = TransRFI::where('status', null)->get()->count();

        if ($jumlah_rfi > 0) {
            $tanggal_rfi = TransRFI::where('status', null)->orderBy('tanggal', 'desc')->first()->value('tanggal');
            foreach ($section_head as $item) {
                Mail::to($item->email)->send(new SendMailRFI($item->name, $jumlah_rfi, $tanggal_rfi));
            }
            TransRFI::where('status', null)->update(['status' => '1']);
            return redirect()->back()->withNotify('Data RFI berhasil dikirim via email ke Section Head terkait!');
        } else {
            return redirect()->back()->withNotifyerror('Tidak ada data RFI!');
        }
    }

    public function index()
    {
        return view('mainline.mainline_mail.send-rfi');
    }

    public function whatsapp()
    {
        $jumlah_rfi = TransRFI::where('status', null)->get()->count();
        if ($jumlah_rfi == 0) {
            return back();
        }
        $rfi = TransRFI::where('status', null)->orderBy('tanggal', 'desc')->first();
        $tanggal_rfi = $rfi->tanggal;
        $pic_rfi = $rfi->user->name;
        $lokasi = $rfi->temuan_mainline->mainline->area->code;
        $section_head = Pegawai::where('jabatan', 'Section Head')
            ->whereIn('section', ['Permanent Way RAMS', 'Permanent Way Maintenance'])
            ->get();

        foreach ($section_head as $item) {
            $nama_sh = $item->name;
            $phoneNumber = $item->no_hp;

            $message = $this->message_format($nama_sh, $jumlah_rfi, $tanggal_rfi, $pic_rfi, $lokasi);
            WhatsAppHelper::sendNotification($phoneNumber, $message);
        }

        TransRFI::where('status', null)->update(['status' => '1']);
        return redirect()->back()->withNotify('Data RFI berhasil dikirim via WhatsApp ke Section Head terkait!');
    }

    public function message_format ($nama_sh, $jumlah_rfi, $tanggal_rfi, $pic_rfi, $lokasi)
    {
        $enter = "\n";
        $div = '================================';
        $url_rfi = 'https://exodus.tideupindustries.com/rfi-mainline';

        $message = '🟡 *EXODUS NOTIFICATION: REQUEST FOR INSPECTION (RFI)*' . $enter . $enter . $enter .
        'Dear Bpk/Ibu *' . $nama_sh . '*,' . $enter . $enter.
        'Sebagai informasi, terdapat pengajuan *RFI* di *Exodus* yang perlu di _review_ dengan detail informasi sebagai berikut:' . $enter . $enter .

        $div . $enter . $enter .
        '*Submitter :*' . $enter.
        $pic_rfi . $enter . $enter .

        '*Tanggal :*' . $enter .
        $tanggal_rfi . $enter . $enter .

        '*Jumlah :*' . $enter .
        $jumlah_rfi . ' Perbaikan' . $enter . $enter .

        '*Lokasi :*' . $enter .
        $lokasi . $enter . $enter .

        '*Link URL :*' . $enter .
        $url_rfi . $enter . $enter .
        $div . $enter . $enter .

        '_Regards,_' . $enter . $enter .
        '*ExoBOT*' .
        $enter . $enter . $enter . $enter;

        return $message;
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