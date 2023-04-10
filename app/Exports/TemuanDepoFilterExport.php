<?php

namespace App\Exports;

use App\Models\TemuanDepo;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class TemuanDepoFilterExport implements FromView
{
    public function __construct(?int $line_id = null, ?int $part_id = null, ?string $status = null, ?string $klasifikasi = null, ?string $tanggal_awal = null, ?string $tanggal_akhir = null)
    {
        $this->line_id = $line_id;
        $this->part_id = $part_id;
        $this->status = $status;
        $this->klasifikasi = $klasifikasi;
        $this->tanggal_awal = $tanggal_awal;
        $this->tanggal_akhir = $tanggal_akhir;
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

        // Filter by klasifikasi
        $temuan_depo->when($this->klasifikasi, function ($query) {
            return $query->where('klasifikasi', $this->klasifikasi);
        });

        // Filter by tanggal
        if ($this->tanggal_awal != null and $this->tanggal_akhir != null) {
            $temuan_depo->when($this->tanggal_awal, function ($query) {
                return $query->whereDate('tanggal', '>=', $this->tanggal_awal);
            });
            $temuan_depo->when($this->tanggal_akhir, function ($query) {
                return $query->whereDate('tanggal', '<=', $this->tanggal_akhir);
            });
        }

        return view('depo.depo_temuan.export', [
            'temuan_depo' => $temuan_depo->get(),
        ]);
    }
}
