<?php

namespace App\Exports;

use App\Models\Temuan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class TemuanMainlineFilterExport implements FromView
{
    public function __construct(?int $area_id = null, ?int $line_id = null, ?int $part_id = null, ?string $status = null, ?string $klasifikasi = null, ?string $tanggal_awal = null, ?string $tanggal_akhir = null)
    {
        $this->area_id = $area_id;
        $this->line_id = $line_id;
        $this->part_id = $part_id;
        $this->status = $status;
        $this->klasifikasi = $klasifikasi;
        $this->tanggal_awal = $tanggal_awal;
        $this->tanggal_akhir = $tanggal_akhir;
    }

    public function view(): View
    {
        $temuan = Temuan::query()->select(
            'summary_temuan.*',
            'mainline.area_id as area_id',
        )
            ->join('mainline', 'mainline.id', '=', 'summary_temuan.mainline_id');

        // Filter by area_id
        $temuan->when($this->area_id, function ($query) {
            return $query->where('area_id', $this->area_id);
        });

        // Filter by line_id
        $temuan->when($this->line_id, function ($query) {
            return $query->where('line_id', $this->line_id);
        });

        // Filter by part_id
        $temuan->when($this->part_id, function ($query) {
            return $query->where('part_id', $this->part_id);
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

        return view('mainline.mainline_temuan.export', [
            'temuan' => $temuan->get(),
        ]);
    }
}
