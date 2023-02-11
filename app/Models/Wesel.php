<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wesel extends Model
{
    use HasFactory;

    protected $table = 'wesel';
    protected $guarded = [];

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function line()
    {
        return $this->belongsTo(Line::class);
    }
}