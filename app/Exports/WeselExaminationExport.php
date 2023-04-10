<?php

namespace App\Exports;

use App\Models\WeselExamination;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class WeselExaminationExport implements FromView
{
    public function __construct(?int $wesel_id = null, ?string $tanggal_awal = null, ?string $tanggal_akhir = null)
    {
        $this->wesel_id = $wesel_id;
        $this->tanggal_awal = $tanggal_awal;
        $this->tanggal_akhir = $tanggal_akhir;
    }

    public function view(): View
    {
        $wesel = WeselExamination::query();

        // Filter by wesel_id
        $wesel->when($this->wesel_id, function ($query) {
            return $query->where('wesel_id', $this->wesel_id);
        });

        // Filter by tanggal
        if ($this->tanggal_awal != null and $this->tanggal_akhir != null) {
            $wesel->when($this->tanggal_awal, function ($query) {
                return $query->whereDate('tanggal', '>=', $this->tanggal_awal);
            });
            $wesel->when($this->tanggal_akhir, function ($query) {
                return $query->whereDate('tanggal', '<=', $this->tanggal_akhir);
            });
        }

        return view('mainline.mainline_wesel_examination.export-excel', [
            'wesel' => $wesel->orderBy('tanggal', 'asc')->get(),
        ]);
    }
}
