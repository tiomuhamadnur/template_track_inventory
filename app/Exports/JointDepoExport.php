<?php

namespace App\Exports;

use App\Models\Joint;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class JointDepoExport implements FromView
{
    public function __construct(?int $line_id = null, ?string $tipe = null, ?int $wesel_id = null)
    {
        $this->line_id = $line_id;
        $this->tipe = $tipe;
        $this->wesel_id = $wesel_id;
    }

    public function view(): View
    {
        $joint_depo = Joint::query()->select(
            'joint.*',
        )
        ->where('area_id', 1)
        ->where('repaired', null);

        // Filter by line_id
        $joint_depo->when($this->line_id, function ($query) {
            return $query->where('line_id', $this->line_id);
        });

        // Filter by tipe
        $joint_depo->when($this->tipe, function ($query) {
            return $query->where('tipe', $this->tipe);
        });

        // Filter by wesel
        $joint_depo->when($this->wesel_id, function ($query) {
            return $query->where('wesel_id', $this->wesel_id);
        });

        return view('masterdata.masterdata_joint.export_depo', [
            'joint_depo' => $joint_depo->get(),
        ]);
    }
}