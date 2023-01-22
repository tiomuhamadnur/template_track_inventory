<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accelerometer extends Model
{
    use HasFactory;

    protected $table = 'accelerometer';
    protected $guarded = [];

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function line()
    {
        return $this->belongsTo(Line::class);
    }

    public function jadwal_accelerometer()
    {
        return $this->belongsTo(JadwalAccelerometer::class);
    }
}