<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockIn extends Model
{
    use HasFactory;

    protected $fillable = ['id_item', 'id_supplier', 'quantity', 'received_at'];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'id_supplier');
    }

    // public function item()
    // {
    //     return $this->belongsTo(Item::class, 'id_item');
    // }
}
