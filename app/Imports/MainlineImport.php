<?php

namespace App\Imports;

use App\Models\Mainline;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MainlineImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Mainline([
            'area_id' => $row['area_id'],
            'line_id' => $row['line_id'],
            'no_span' => $row['no_span'],
            'kilometer' => $row['kilometer'],
            'panjang_span' => $row['panjang_span'],
            'jumlah_sleeper' => $row['jumlah_sleeper'],
            'spacing_sleeper' => $row['spacing_sleeper'],
            'jenis_sleeper' => $row['jenis_sleeper'],
            'joint' => $row['joint'],
            'no_project' => $row['no_project'],
        ]);
    }
}
