<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StocOut extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_items',
        'id_supplier',
        'quantity',
    ];
}
