<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UltrasonicTestExamination extends Model
{
    use HasFactory;

    protected $table = 'ut_examination';

    protected $guarded = [];

    public function wo()
    {
        return $this->belongsTo(WorkOrder::class);
    }

    public function joint()
    {
        return $this->belongsTo(Joint::class);
    }
}