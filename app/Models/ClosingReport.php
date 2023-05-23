<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClosingReport extends Model
{
    use HasFactory;

    protected $table = 'closing_report';

    protected $guarded = [];
}