<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'item_name',


    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function item()
    {
        return $this->hasMany(Item::class);
    }

    public function itemInstance()
    {
        return $this->hasMany(ItemInstance::class);
    }

}
