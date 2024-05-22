<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class individual extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'email',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function IndividualList()
    {
        return $this->hasMany(IndividualList::class);
    }
}
