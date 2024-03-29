<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $table = 'section';

    protected $guarded = [];

    public function departement()
    {
        return $this->belongsTo(Departement::class);
    }

    public function tools()
    {
        return $this->hasMany(Tools::class);
    }
}
