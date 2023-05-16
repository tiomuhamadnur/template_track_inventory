<?php

namespace App\Http\Controllers;

use App\Mail\SendMailRFI;
use App\Models\Pegawai;
use App\Models\TransRFI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendEmailController extends Controller
{
    public function rfi()
    {
        $section_head = Pegawai::where('jabatan', 'Section Head')->get();
        $jumlah_rfi = TransRFI::where('status', null)->get()->count();

        if ($jumlah_rfi > 0) {
            $tanggal_rfi = TransRFI::where('status', null)->orderBy('tanggal', 'desc')->first()->value('tanggal');
            foreach ($section_head as $item) {
                Mail::to($item->email)->send(new SendMailRFI($item->name, $jumlah_rfi, $tanggal_rfi));
            }
            TransRFI::where('status', null)->update(['status' => '1']);
            return 'RFI terkirim ke email Section Head';
        } else {
            return 'tidak ada RFI';
        }
    }

    public function index()
    {
        return view('mainline.mainline_mail.send-rfi');
    }

    public function create()
    {
        //
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