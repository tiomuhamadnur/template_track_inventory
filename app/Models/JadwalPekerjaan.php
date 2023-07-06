<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalPekerjaan extends Model
{
    use HasFactory;

    protected $table = 'jadwal_pekerjaan';

    protected $guarded = [];

    public function job()
    {
        return $this->belongsTo(PM::class);
    }
}