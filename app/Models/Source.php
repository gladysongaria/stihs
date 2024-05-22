<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    use HasFactory;

    protected $fillable = [
        'source',
        'description',
    ];

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
