<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransDefect extends Model
{
    use HasFactory;

    protected $table = 'trans_defect';
    protected $guarded = [];

    public function part()
    {
        return $this->belongsTo(Part::class);
    }

    public function detail_part()
    {
        return $this->belongsTo(DetailPart::class);
    }

    public function defect()
    {
        return $this->belongsTo(Defect::class);
    }
}