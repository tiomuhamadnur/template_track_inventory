<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPart extends Model
{
    use HasFactory;

    protected $table = 'detail_part';
    protected $guarded = [];

    public function part()
    {
        return $this->belongsTo(Part::class);
    }
}