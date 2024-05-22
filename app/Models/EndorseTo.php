<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EndorseTo extends Model
{
    use HasFactory;

    protected $fillable = [
        'endorsed_quantity',
        'date_endorsed',
        'status',
    ];
    public function teachersInCharge()
    {
        return $this->belongsToMany(User::class);
    }

    public function Item()
    {
        return $this->hasMany(Item::class);
    }

}
