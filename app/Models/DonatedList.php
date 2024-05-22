<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonatedList extends Model
{
    use HasFactory;
    protected $fillable = [
        'source_information_id',
        'source_donated',
        'donated_quantity',
        'status',
    ];

    public function Source()
    {
        return $this->belongsTo(Source::class);
    }
}
