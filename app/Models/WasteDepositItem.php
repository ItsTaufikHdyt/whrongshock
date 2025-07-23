<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\WasteDeposit;
use App\Models\WasteItem;

class WasteDepositItem extends Model // singular
{
    protected $table = 'waste_deposit_items';

    protected $fillable = [
        'deposit_id',
        'waste_item_id',
        'quantity',
        'subtotal',
        // 'total_price', // jika ingin auto, hapus dari fillable
    ];

    public function wasteDeposit()
    {
        return $this->belongsTo(WasteDeposit::class);
    }

    public function wasteItem()
    {
        return $this->belongsTo(WasteItem::class);
    }
}
