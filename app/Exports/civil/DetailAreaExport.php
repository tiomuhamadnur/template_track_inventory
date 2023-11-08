<?php

namespace App\Exports\civil;

use App\Models\civil\DetailArea;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class DetailAreaExport implements FromView
{
    public function view(): View
    {
        return view('civil.masterdata.masterdata_detail_area.export_excel', [
            'data' => DetailArea::orderBy('id', 'asc')->get(),
        ]);
    }
}