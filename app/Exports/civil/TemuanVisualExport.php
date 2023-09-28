<?php

namespace App\Exports\civil;

use App\Models\civil\TemuanVisualCivil;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class TemuanVisualExport implements FromView
{
    public function view(): View
    {
        return view('civil.examination.examination_visual.export.excel', [
            'temuan_visual' => TemuanVisualCivil::orderBy('tanggal', 'asc')->get(),
        ]);
    }
}