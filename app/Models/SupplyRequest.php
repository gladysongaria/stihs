<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplyRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'pending_request_id',
        'status',
        'remarks',
        'reason',
        'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pendingRequest()
    {
        return $this->belongsTo(PendingRequest::class);
    }
}

