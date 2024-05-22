<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_image',
        'category_id',
        'item_name',
        'item_description',
        'item_specification',
        'old_property_number',
        'new_property_number',
        'unit_measure',
        'source_id',
        'date_acquired',
    ];

    public function source()
    {
        return $this->belongsTo(Source::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function itemInstances()
    {
        return $this->hasMany(ItemInstance::class);
    }
    public function inventory()
    {
        return $this->belongsTo(Inventory::class);
    }

}
