<?php

namespace App\Exports\civil;

use App\Models\civil\PartCivil;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PartExport implements FromView
{
    public function view(): View
    {
        return view('civil.masterdata.masterdata_part.export_excel', [
            'data' => PartCivil::orderBy('id', 'asc')->get(),
        ]);
    }
}