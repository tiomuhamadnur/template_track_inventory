<?php

namespace App\Imports;

use App\Models\UltrasonicTestExamination;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UltrasonicExaminationImport implements ToModel, WithHeadingRow
{
    public function __construct(?int $wo_id = null)
    {
        $this->wo_id = $wo_id;
    }

    public function model(array $row)
    {
        return new UltrasonicTestExamination([
            'wo_id' => $this->wo_id,
            'joint_id' => $row['joint_id'],
            // 'tanggal' => Carbon::parse($row['tanggal'])->format('Y-m-d'),
            'tanggal' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['tanggal']),
            'dac' => $row['dac'],
            'depth' => $row['depth'],
            'length' => $row['length'],
            'status' => $row['status'],
            'remark' => $row['remark'],
            'status' => $row['status'],
        ]);
    }
}