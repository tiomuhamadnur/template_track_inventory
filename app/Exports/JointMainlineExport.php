<?php

namespace App\Exports;

use App\Models\Joint;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class JointMainlineExport implements FromView
{
    public function __construct(?int $area_id = null, ?int $line_id = null, ?string $tipe = null, ?int $wesel_id = null)
    {
        $this->area_id = $area_id;
        $this->line_id = $line_id;
        $this->tipe = $tipe;
        $this->wesel_id = $wesel_id;
    }

    public function view(): View
    {
        $joint = Joint::join('mainline', 'joint.mainline_id', '=', 'mainline.id')
            ->select(
                'joint.*',
            )
            ->selectRaw(
                'CAST(mainline.kilometer AS DECIMAL(10,5)) AS mainline_kilometer'
            )
            ->whereNot('area_id', 1)
            ->where('repaired', null);

        // Filter by area_id
        $joint->when($this->area_id, function ($query) {
            return $query->where('area_id', $this->area_id);
        });

        // Filter by line_id
        $joint->when($this->line_id, function ($query) {
            return $query->where('line_id', $this->line_id);
        });

        // Filter by tipe
        $joint->when($this->tipe, function ($query) {
            return $query->where('tipe', $this->tipe);
        });

        // Filter by wesel
        $joint->when($this->wesel_id, function ($query) {
            return $query->where('wesel_id', $this->wesel_id);
        });

        return view('masterdata.masterdata_joint.export_mainline', [
            'joint' => $joint->get(),
        ]);
    }
}