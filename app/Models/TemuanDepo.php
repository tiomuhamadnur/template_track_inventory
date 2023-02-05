<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemuanDepo extends Model
{
    use HasFactory;

    protected $table = 'summary_temuan_depo';
    protected $guarded = [];

    protected $with = ['line', 'part', 'detail_part', 'defect'];

    public function line()
    {
        return $this->belongsTo(Line::class, 'line_id', 'id');
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