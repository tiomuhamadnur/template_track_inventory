<?php

namespace App\Exports;

use App\Models\UltrasonicTestExamination;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class UltrasonicTestExport implements FromView
{
    public function __construct(
        ?int $wo_id = null,
    ) {
        $this->wo_id = $wo_id;
    }

    public function view(): View
    {
        $ut_examination = UltrasonicTestExamination::where('wo_id', $this->wo_id)->get();

        return view('mainline.mainline_ut_examination.export.excel', [
            'ut_examination' => $ut_examination,
        ]);
    }
}
