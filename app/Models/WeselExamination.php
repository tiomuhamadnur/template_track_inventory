<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeselExamination extends Model
{
    use HasFactory;

    protected $table = 'wesel_examination';
    protected $guarded = [];

    public function wesel()
    {
        return $this->belongsTo(Wesel::class);
    }
}