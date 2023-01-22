<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temuan extends Model
{
    use HasFactory;

    protected $table = 'summary_temuan';
    protected $guarded = [];

    protected $with = ['mainline', 'part', 'detail_part', 'defect'];
    public function mainline()
    {
        return $this->belongsTo(Mainline::class, 'mainline_id', 'id');
    }

    public function part()
    {
        return $this->belongsTo(Part::class, 'part_id', 'id');
    }

    public function detail_part()
    {
        return $this->belongsTo(DetailPart::class, 'detail_part_id', 'id');
    }

    public function defect()
    {
        return $this->belongsTo(Defect::class, 'defect_id', 'id');
    }
}