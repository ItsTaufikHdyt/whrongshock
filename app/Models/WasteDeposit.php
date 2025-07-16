<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WasteDeposit extends Model
{
    protected $table = 'waste_deposits';

    protected $fillable = [
        'user_id',
        'deposit_date',
        'total_amount',
        // Add other fields as necessary
    ];

    public function items()
    {
        return $this->hasMany(\App\Models\WasteDepositItem::class);
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

}
