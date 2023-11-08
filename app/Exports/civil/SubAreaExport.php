<?php

namespace App\Exports\civil;

use App\Models\civil\SubArea;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class SubAreaExport implements FromView
{
    public function view(): View
    {
        return view('civil.masterdata.masterdata_sub_area.export_excel', [
            'data' => SubArea::orderBy('id', 'asc')->get(),
        ]);
    }
}