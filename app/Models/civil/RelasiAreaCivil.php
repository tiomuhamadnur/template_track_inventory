<?php

namespace App\Models\civil;

use App\Models\Area;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RelasiAreaCivil extends Model
{
    use HasFactory;

    protected $table = 'trans_civil_relasi_area';

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
}