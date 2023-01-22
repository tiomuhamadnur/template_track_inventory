<?php

namespace App\Exports;

use App\Models\Mainline;
use Maatwebsite\Excel\Concerns\FromCollection;

class MainlineExport implements FromCollection
{
    public function collection()
    {
        return Mainline::all();
    }
}