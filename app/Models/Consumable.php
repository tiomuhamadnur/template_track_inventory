<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consumable extends Model
{
    use HasFactory;

    protected $table = 'consumable';

    protected $guarded = [];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function detail_location()
    {
        return $this->belongsTo(DetailLocation::class);
    }
}
