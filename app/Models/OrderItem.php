<?php

namespace App\Models;

use App\Models\Coupons;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id',
        'item_id',
        'item_price',
        'quantity',
    ];
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function items()
    {
        return $this->belongsTo(Items::class , 'item_id');
    }
    public function sizes()
    {
        return $this->belongsTo(Sizes::class , 'size_id');
    }

}
