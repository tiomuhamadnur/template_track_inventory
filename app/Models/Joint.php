<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Joint extends Model
{
    use HasFactory;

    protected $table = 'joint';

    protected $guarded = [];

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function line()
    {
        return $this->belongsTo(Line::class);
    }

    public function wesel()
    {
        return $this->belongsTo(Wesel::class);
    }

    public function mainline()
    {
        return $this->belongsTo(Mainline::class);
    }
}