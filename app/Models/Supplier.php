<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'contact', 'address'];

    public function stockIns()
    {
        return $this->hasMany(StockIn::class, 'id_supplier');
    }

    public function stockOuts()
    {
        return $this->hasMany(StockOut::class, 'id_supplier');
    }
}
