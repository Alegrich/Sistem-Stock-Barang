<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockOut extends Model
{
    use HasFactory;

    protected $fillable = ['id_item', 'id_supplier', 'quantity', 'issued_at'];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'id_supplier');
    }

    // public function item()
    // {
    //     return $this->belongsTo(Item::class, 'id_item');
    // }
}
