<?php

namespace App\Models\planning;

use App\Models\Contract;
use App\Traits\HasFormatRupiah;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgressContract extends Model
{
    use HasFactory;
    use HasFormatRupiah;

    protected $table = 'progress_contract';

    protected $guarded = [];

    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }

}
