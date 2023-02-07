<?php

namespace App\Exports;

use App\Models\TemuanDepo;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class TemuanDepoFilterExport implements FromView
{
    public function __construct(?int $line_id = null, ?int $part_id = null, ?string $status = null)
    {
        $this->line_id = $line_id;
        $this->part_id = $part_id;
        $this->status = $status;
    }

    public function view(): View
    {
        return view('depo.depo_temuan.export', [
            'temuan_depo' => TemuanDepo::
            orWhere('line_id', $this->line_id)
            ->orWhere('part_id', $this->part_id)
            ->orWhere('status', $this->status)
            ->get()
        ]);
    }
}