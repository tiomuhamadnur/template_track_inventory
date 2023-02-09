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
        $temuan_depo = TemuanDepo::query();

        // Filter by line_id
        $temuan_depo->when($this->line_id, function ($query) {
            return $query->where('line_id', $this->line_id);
        });

        // Filter by part_id
        $temuan_depo->when($this->part_id, function ($query) {
            return $query->where('part_id', $this->part_id);
        });

        // Filter by status
        $temuan_depo->when($this->status, function ($query) {
            return $query->where('status', $this->status);
        });

        return view('depo.depo_temuan.export', [
            'temuan_depo' => $temuan_depo->get()
        ]);
    }
}