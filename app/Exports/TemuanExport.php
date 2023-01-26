<?php

namespace App\Exports;

use App\Models\Temuan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class TemuanExport implements FromView
{
    public function __construct(?int $area_id = null, ?int $line_id = null, ?int $part_id = null, ?string $status = null)
    {
        $this->area_id = $area_id;
        $this->line_id = $line_id;
        $this->part_id = $part_id;
        $this->status = $status;
    }

    public function view(): View
    {
        return view('temuan.export', [
            'temuan' => Temuan::select(
            'summary_temuan.*',
            'mainline.area_id as area_id',
        )
        ->join('mainline', 'mainline.id', '=', 'summary_temuan.mainline_id')
        ->orWhere('area_id', $this->area_id)
        ->orWhere('line_id', $this->line_id)
        ->orWhere('part_id', $this->part_id)
        ->orWhere('status', $this->status)->get()
        ]);
    }
}