<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransToolsMaterials extends Model
{
    use HasFactory;

    protected $table = 'trans_tools_materials';

    protected $guarded = [];

    public function tools()
    {
        return $this->belongsTo(ToolsMaterials::class);
    }
}