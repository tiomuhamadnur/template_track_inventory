<?php

namespace App\Exports;

use App\Models\Temuan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class TemuanMainlineExport implements FromView
{
    public function view(): View
    {
        return view('mainline.mainline_temuan.export', [
            'temuan' => Temuan::all(),
        ]);
    }
}
