<?php

namespace App\Imports;

use App\Models\Wesel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class WeselImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Wesel([
            'area_id' => $row['area_id'],
            'line_id' => $row['line_id'],
            'name' => $row['name'],
            'tipe' => $row['tipe'],
            'direction' => $row['direction'],
            'kilometer' => $row['kilometer'],
        ]);
    }
}
