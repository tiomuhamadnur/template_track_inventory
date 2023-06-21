<?php

namespace App\Imports;

use App\Models\Joint;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class JointImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Joint([
            'area_id' => $row['area_id'],
            'line_id' => $row['line_id'],
            'wesel_id' => $row['wesel_id'],
            'mainline_id' => $row['mainline_id'],
            'name' => $row['name'],
            'tipe' => $row['tipe'],
            'kilometer' => $row['kilometer'],
            'direction' => $row['direction'],
        ]);
    }
}