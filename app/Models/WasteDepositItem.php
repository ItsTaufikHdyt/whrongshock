<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\WasteDeposit;
use App\Models\WasteItem;

class WasteDepositItem extends Model // singular
{
    protected $table = 'waste_deposit_items';

    protected $fillable = [
        'waste_deposit_id',
        'waste_item_id',
        'quantity',
        'unit_price',
        // 'total_price', // jika ingin auto, hapus dari fillable
    ];

    public function wasteDeposit()
    {
        return $this->belongsTo(WasteDeposit::class, 'waste_deposit_id');
    }

    public function wasteItem()
    {
        return $this->belongsTo(WasteItem::class, 'waste_item_id');
    }

    // Accessor untuk total_price
    public function getTotalPriceAttribute()
    {
        return $this->quantity * $this->unit_price;
    }
}
