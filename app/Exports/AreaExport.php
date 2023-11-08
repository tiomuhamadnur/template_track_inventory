<?php

namespace App\Exports;

use App\Models\Area;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class AreaExport implements FromView
{
    public function view(): View
    {
        return view('mainline.mainline_area.export_excel', [
            'area' => Area::orderBy('id', 'asc')->get(),
        ]);
    }
}