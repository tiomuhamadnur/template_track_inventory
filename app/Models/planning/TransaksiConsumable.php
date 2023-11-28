<?php

namespace App\Models\planning;

use App\Models\Consumable;
use App\Models\Pegawai;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiConsumable extends Model
{
    use HasFactory;

    protected $table = 'trans_consumable';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(Pegawai::class);
    }

    public function responsible()
    {
        return $this->belongsTo(Pegawai::class);
    }

    public function consumable()
    {
        return $this->belongsTo(Consumable::class);
    }
}