<?php

namespace App\Models;

use App\Models\Tools;
use App\Models\Location;
use App\Models\DetailLocation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TransTools extends Model
{
    use HasFactory;

    protected $table = 'trans_tools';

    protected $guarded = [];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function detail_location()
    {
        return $this->belongsTo(DetailLocation::class);
    }

    public function tools()
    {
        return $this->belongsTo(Tools::class);
    }
}
