<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Mchev\Banhammer\Traits\Bannable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Bannable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = ['photo'];

    public function getPhotoUrlAttribute()
    {
        if ($this->foto !== null) {
            return url('media/user/'.$this->id.'/'.$this->foto);
        } else {
            return url('media-example/no-image.png');
        }
    }

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
