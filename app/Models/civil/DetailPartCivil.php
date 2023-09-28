<?php

namespace App\Models\civil;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPartCivil extends Model
{
    use HasFactory;

    protected $table = 'tbl_civil_detail_part';

    protected $guarded = [];
}