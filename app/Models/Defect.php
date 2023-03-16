<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Defect extends Model
{
    use HasFactory;

    protected $table = 'defect';

    protected $guarded = [];

    public function detail_part()
    {
        return $this->belongsTo(DetailPart::class);
    }
}
