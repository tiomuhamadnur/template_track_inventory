<?php

namespace App\Exports;

use App\Models\TemuanDepo;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class TemuanDepoExport implements FromView
{
    public function view(): View
    {
        return view('depo.depo_temuan.export', [
            'temuan_depo' => TemuanDepo::all()
        ]);
    }
}