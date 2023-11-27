<?php

namespace App\Models;

use App\Models\planning\ProgressContract;
use App\Traits\HasFormatRupiah;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;
    use HasFormatRupiah;

    protected $table = 'contract';

    protected $guarded = [];

    public function progress_contract()
    {
        return $this->hasMany(ProgressContract::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function fund()
    {
        return $this->belongsTo(Fund::class);
    }

    public function departement()
    {
        return $this->belongsTo(Departement::class);
    }

}