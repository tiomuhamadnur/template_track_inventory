<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransRFI extends Model
{
    use HasFactory;

    protected $table = 'trans_rfi';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(Pegawai::class);
    }

    public function temuan_mainline()
    {
        return $this->belongsTo(Temuan::class);
    }

    public function temuan_depo()
    {
        return $this->belongsTo(TemuanDepo::class);
    }
}