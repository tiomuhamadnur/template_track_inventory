<?php

namespace App\Models\planning;

use App\Models\Pegawai;
use App\Models\Tools;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiTools extends Model
{
    use HasFactory;

    protected $table = 'trans_tools';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(Pegawai::class);
    }

    public function responsible()
    {
        return $this->belongsTo(Pegawai::class);
    }

    public function tools()
    {
        return $this->belongsTo(Tools::class);
    }
}
