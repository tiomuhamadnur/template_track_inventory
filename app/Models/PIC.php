<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PIC extends Model
{
    use HasFactory;

    protected $table = 'pic_job';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(Pegawai::class);
    }

    public function job()
    {
        return $this->belongsTo(PM::class, 'job_id', 'id');
    }
}