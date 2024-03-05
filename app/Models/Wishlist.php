<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'item_id'
    ];
    public function items()
    {
        return $this->belongsTo(Items::class,'item_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
