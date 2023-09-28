<?php

namespace App\Exports\civil;

use App\Models\civil\TemuanVisualCivil;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class TemuanVisualFilterExport implements FromView
{
    public function __construct(
        ?int $area_id = null,
        ?int $sub_area_id = null,
        ?int $detail_area_id = null,
        ?int $part_id = null,
        ?int $detail_part_id = null,
        ?int $defect_id = null,
        ?string $status = null,
        ?string $klasifikasi = null,
        ?string $tanggal_awal = null,
        ?string $tanggal_akhir = null
    ) {
        $this->area_id = $area_id;
        $this->sub_area_id = $sub_area_id;
        $this->detail_area_id = $detail_area_id;
        $this->part_id = $part_id;
        $this->detail_part_id = $detail_part_id;
        $this->defect_id = $defect_id;
        $this->status = $status;
        $this->klasifikasi = $klasifikasi;
        $this->tanggal_awal = $tanggal_awal;
        $this->tanggal_akhir = $tanggal_akhir;
    }

    public function view(): View
    {
        $temuan = TemuanVisualCivil::query();

        // Filter by area_id
        $temuan->when($this->area_id, function ($query) {
            return $query->where('area_id', $this->area_id);
        });

        // Filter by sub_area_id
        $temuan->when($this->sub_area_id, function ($query) {
            return $query->where('sub_area_id', $this->sub_area_id);
        });

        // Filter by detail_area_id
        $temuan->when($this->detail_area_id, function ($query) {
            return $query->where('detail_area_id', $this->detail_area_id);
        });

        // Filter by part_id
        $temuan->when($this->part_id, function ($query) {
            return $query->where('part_id', $this->part_id);
        });

        // Filter by detail_part_id
        $temuan->when($this->detail_part_id, function ($query) {
            return $query->where('detail_part_id', $this->detail_part_id);
        });

        // Filter by defect_id
        $temuan->when($this->defect_id, function ($query) {
            return $query->where('defect_id', $this->defect_id);
        });

        // Filter by status
        $temuan->when($this->status, function ($query) {
            return $query->where('status', $this->status);
        });

        // Filter by klasifikasi
        $temuan->when($this->klasifikasi, function ($query) {
            return $query->where('klasifikasi', $this->klasifikasi);
        });

        // Filter by tanggal
        if ($this->tanggal_awal != null and $this->tanggal_akhir != null) {
            $temuan->when($this->tanggal_awal, function ($query) {
                return $query->whereDate('tanggal', '>=', $this->tanggal_awal);
            });
            $temuan->when($this->tanggal_akhir, function ($query) {
                return $query->whereDate('tanggal', '<=', $this->tanggal_akhir);
            });
        }

        return view('civil.examination.examination_visual.export.excel', [
            'temuan_visual' => $temuan->orderBy('tanggal', 'asc')->get(),
        ]);
    }
}