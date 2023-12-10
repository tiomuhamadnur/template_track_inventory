<?php

namespace App\Imports\planning;

use App\Models\Consumable;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ConsumableImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Consumable([
            'name' => $row['name'],
            'code' => $row['code'],
            'stock' => $row['stock'],
            'safety_stock' => $row['safety_stock'],
            'unit' => $row['unit'],
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