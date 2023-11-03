<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tools extends Model
{
    use HasFactory;

    protected $table = 'tools';

    protected $guarded = [];

    public function departement()
    {
        return $this->belongsTo(Departement::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function detail_location()
    {
        return $this->belongsTo(DetailLocation::class);
    }

}