<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lengkung extends Model
{
    use HasFactory;

    protected $table = 'lengkung';

    protected $guarded = [];

    protected $with = ['area', 'line'];

    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id', 'id');
    }

    public function line()
    {
        return $this->belongsTo(Line::class, 'line_id', 'id');
    }
}
