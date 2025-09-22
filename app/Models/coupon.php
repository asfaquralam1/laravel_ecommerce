<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'type',
        'value',
        'min_order_amount',
        'expires_at',
        'is_active',
    ];
    protected $casts = [
        'expires_at' => 'date',
    ];

       public function users()
    {
        return $this->belongsToMany(User::class, 'coupon_user')
                    ->withTimestamps();
    }
}
