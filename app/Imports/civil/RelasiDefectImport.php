<?php

namespace App\Imports\civil;

use App\Models\civil\RelasiDefectCivil;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class RelasiDefectImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new RelasiDefectCivil([
            'part_id' => $row['part_id'],
            'detail_part_id' => $row['detail_part_id'],
            'defect_id' => $row['defect_id'],
        ]);
    }
}