<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndividualList extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'facility_id',
        'room_id',
        'quantity',
        'unit_measure',
        'item_name',
        'item_id',
        'date_acquired',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function facility()
    {
        return $this->belongsTo(Facility::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function individual()
    {
        return $this->belongsTo(Individual::class);
    }

}
