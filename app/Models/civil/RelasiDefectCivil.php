<?php

namespace App\Models\civil;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RelasiDefectCivil extends Model
{
    use HasFactory;

    protected $table = 'trans_civil_relasi_defect';

    protected $guarded = [];

    public function part()
    {
        return $this->belongsTo(PartCivil::class);
    }

    public function detail_part()
    {
        return $this->belongsTo(DetailPartCivil::class);
    }

    public function defect()
    {
        return $this->belongsTo(DefectCivil::class);
    }
}
