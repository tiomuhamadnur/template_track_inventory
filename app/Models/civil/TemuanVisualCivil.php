<?php

namespace App\Models\civil;

use App\Models\Area;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemuanVisualCivil extends Model
{
    use HasFactory;

    protected $table = 'tbl_civil_temuan_visual';

    protected $guarded = [];

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function sub_area()
    {
        return $this->belongsTo(SubArea::class);
    }

    public function detail_area()
    {
        return $this->belongsTo(DetailArea::class);
    }

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