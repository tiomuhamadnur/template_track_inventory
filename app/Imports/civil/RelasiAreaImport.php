<?php

namespace App\Imports\civil;

use App\Models\civil\RelasiAreaCivil;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class RelasiAreaImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new RelasiAreaCivil([
            'area_id' => $row['area_id'],
            'sub_area_id' => $row['sub_area_id'],
            'detail_area_id' => $row['detail_area_id'],
        ]);
    }
}