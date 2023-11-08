<?php

namespace App\Exports\civil;

use App\Models\civil\DetailPartCivil;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class DetailPartExport implements FromView
{
    public function view(): View
    {
        return view('civil.masterdata.masterdata_detail_part.export_excel', [
            'data' => DetailPartCivil::orderBy('id', 'asc')->get(),
        ]);
    }
}