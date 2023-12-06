<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mchev\Banhammer\Traits\Bannable;

class Pegawai extends Model
{
    use HasFactory, Bannable;

    protected $table = 'users';

    protected $guarded = [];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function departement()
    {
        return $this->belongsTo(Departement::class);
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
}