<?php

namespace App\Exports;

use App\Models\Temuan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class TemuanExport implements FromView
{
    public function view(): View
    {
        return view('temuan.export', [
            'temuan' => Temuan::all()
        ]);
    }
}