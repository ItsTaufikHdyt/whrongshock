<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WasteItem extends Model
{
    protected $table = 'waste_items';

    protected $fillable = [
        'name',
        'description',
        'unit_price',
        // Tambahkan atribut lain sesuai kebutuhan
    ];

    // Definisikan relasi jika ada, misalnya:
    public function wasteDepositItems()
    {
        return $this->hasMany(WasteDepositItem::class, 'waste_item_id');
    }

    // Tambahkan accessor atau mutator jika diperlukan
    public function getFormattedPriceAttribute()
    {
        return number_format($this->unit_price, 2);
    }

    // Contoh method untuk mendapatkan nama lengkap
    public function getFullNameAttribute()
    {
        return $this->name . ' - ' . $this->description;
    }
}
