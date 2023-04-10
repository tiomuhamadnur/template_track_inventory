<?php

namespace App\Imports;

use App\Models\Lengkung;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class LengkungImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Lengkung([
            'area_id' => $row['area_id'],
            'line_id' => $row['line_id'],
            'name' => $row['name'],
            'tipe' => $row['tipe'],
            'btc' => $row['btc'],
            'bcc' => $row['bcc'],
            'ip' => $row['ip'],
            'ecc' => $row['ecc'],
            'etc' => $row['etc'],
            'radius' => $row['radius'],
            'versin' => $row['versin'],
            'cant' => $row['cant'],
            'tcl' => $row['tcl'],
            'twist' => $row['twist'],
        ]);
    }
}
