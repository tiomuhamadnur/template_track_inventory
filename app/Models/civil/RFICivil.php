<?php

namespace App\Models\civil;

use App\Models\Pegawai;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RFICivil extends Model
{
    use HasFactory;

    protected $table = 'trans_civil_rfi';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(Pegawai::class);
    }

    public function temuan_visual()
    {
        return $this->belongsTo(TemuanVisualCivil::class);
    }
}