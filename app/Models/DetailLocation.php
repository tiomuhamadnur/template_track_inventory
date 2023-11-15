<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailLocation extends Model
{
    use HasFactory;

    protected $table = 'detail_location';

    protected $guarded = [];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
