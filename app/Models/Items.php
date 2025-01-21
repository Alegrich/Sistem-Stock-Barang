<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'SKU',
        'image',
        'id_categories' 
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_categories');
    }
}
