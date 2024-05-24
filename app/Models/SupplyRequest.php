<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplyRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'item_name',
        'item_specification',
        'quantity',
        'purpose',
        'status',
        'reason',
        'date_approved',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}

