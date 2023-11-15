<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $table = 'location';

    protected $guarded = [];

    public function tools()
    {
        return $this->hasMany(Tools::class);
    }

    public function detail_location()
    {
        return $this->hasMany(DetailLocation::class);
    }

}

