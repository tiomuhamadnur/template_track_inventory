<?php

namespace App\Models\civil;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DefectCivil extends Model
{
    use HasFactory;

    protected $table = 'tbl_civil_defect';

    protected $guarded = [];
}