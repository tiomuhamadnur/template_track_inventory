<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManPowerOnDuty extends Model
{
    use HasFactory;

    protected $table = 'man_power_on_duty';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(Pegawai::class);
    }
}