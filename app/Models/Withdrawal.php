<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Withdrawals extends Model
{
    protected $table = 'withdrawals';

    protected $fillable = [
        'id',
        'user_id',
        'amount',
        'status',
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }

    public function scopeRejected($query)
    {
        return $query->where('status', 'rejected');
    }
}
