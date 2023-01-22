<?php

namespace App\Imports;

use App\Models\TransDefect;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TransDefectImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new TransDefect([
            'part_id'  => $row['part_id'],
            'detail_part_id'  => $row['detail_part_id'],
            'defect_id'  => $row['defect_id'],
        ]);
    }
}