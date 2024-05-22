<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    use HasFactory;
    protected $fillable = ['facility_name'];

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function item()
    {
        return $this->hasMany(Item::class);
    }



}
