<?php

namespace App\Exports\civil;

use App\Models\civil\DefectCivil;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class DefectExport implements FromView
{
    public function view(): View
    {
        return view('civil.masterdata.masterdata_defect.export_excel', [
            'data' => DefectCivil::orderBy('id', 'asc')->get(),
        ]);
    }
}