<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkOrder extends Model
{
    use HasFactory;

    protected $table = 'work_order';

    protected $guarded = [];

    public function job()
    {
        return $this->belongsTo(PM::class);
    }
}