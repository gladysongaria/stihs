<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'building_number',
        'floor_number',
        'room_number',
        'description',
        'facility_id'
    ];

    public function teachersInCharge()
    {
        return $this->belongsToMany(User::class);
    }
}
