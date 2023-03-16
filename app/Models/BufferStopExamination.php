<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BufferStopExamination extends Model
{
    use HasFactory;

    protected $table = 'buffer_stop_examination';

    protected $guarded = [];

    public function buffer_stop()
    {
        return $this->belongsTo(BufferStop::class);
    }
}
