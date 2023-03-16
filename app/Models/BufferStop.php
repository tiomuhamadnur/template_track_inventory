<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BufferStop extends Model
{
    use HasFactory;

    protected $table = 'buffer_stop';

    protected $guarded = [];

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function line()
    {
        return $this->belongsTo(Line::class);
    }
}
