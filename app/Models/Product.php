<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'categories_id',
        'details',
        'price',
        'discount_price',
        'quantity',
        'image',
        'thumbs',
    ];

    public function categories()
    {
        return $this->belongsTo(Category::class);
    }
}
