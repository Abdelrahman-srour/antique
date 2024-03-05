<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sizes extends Model
{
    use HasFactory;
    protected $fillable = [
        'value',
    ];
    public function items()
    {
        return $this->hasMany(Items::class, 'size_id');
    }
}
