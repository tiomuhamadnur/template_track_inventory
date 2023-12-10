<?php

namespace App\Imports\planning;

use App\Models\Tools;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ToolsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Tools([
            'name' => $row['name'],
            'code' => $row['code'],
            'stock' => $row['stock'],
            'safety_stock' => $row['safety_stock'],
            'unit' => $row['unit'],
            'departement_id' => $row['departement_id'],
            'section_id' => $row['section_id'],
            'description' => $row['description'],
            'location_id' => $row['location_id'],
            'detail_location_id' => $row['detail_location_id'],
            'tgl_beli' => $row['tgl_beli'],
            'vendor' => $row['vendor'],
            'tgl_sertifikasi' => $row['tgl_sertifikasi'],
            'tgl_expired' => $row['tgl_expired'],
        ]);
    }
}