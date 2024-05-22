<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemInstance extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id',
        'serial_number',
        'status',
        'user_id',
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function countItemInstances()
    {
        return $this->where('item_id', $this->item_id)
                    ->where('user_id', $this->user_id)
                    ->count();
    }

    public function inventory()
    {
        return $this->hasOne(Inventory::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
