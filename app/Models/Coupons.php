<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupons extends Model
{
    use HasFactory;
    protected $fillable = [
        'coupon_code',
        'amount',
        'coupon_type',
        'expiry_date',
        'status',
    ];
}
