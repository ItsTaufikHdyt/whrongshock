<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WasteDeposit extends Model
{
    protected $table = 'waste_deposits';

    protected $fillable = [
        'user_id',
        'status',
        'total_price',
        // Add other fields as necessary
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function wasteDepositItems()
    {
        return $this->hasMany(WasteDepositItem::class, 'waste_deposit_id');
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
