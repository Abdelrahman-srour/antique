<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'phone_no',
        'phone_no2',
        'shipping_address',
        'Building',
        'Region',
        'Building',
        'city',
        'total_price',
        'applied_coupon',
        'discount',

    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
    public function coupon()
    {
        return $this->belongsTo(Coupons::class , 'applied_coupon');
    }
}
