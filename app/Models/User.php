<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [

        'first_name',
        'middle_initial',
        'last_name',
        'name',
        'email',
        'usertype',
        'department_id',
        'password',
        'profile_image',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function rooms()
    {
        return $this->belongsToMany(Room::class);
    }

    public function individual()
    {
        return $this->belongsTo(Individual::class);
    }

    public function itemInstances()
    {
        return $this->hasMany(ItemInstance::class);
    }

    public function forms()
    {
        return $this->hasMany(Form::class);
    }
}
