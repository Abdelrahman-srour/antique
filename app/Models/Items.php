<?php

namespace App\Models;

use App\Models\Categories;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Items extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'image_one',
        'image_two',
        'image_three',
        'image_four',
        'title',
        'title_ar',
        'disc',
        'disc_ar',
        'category_id',
        'item_price',
        'length',
        'width',
        'size_id',
        'status',

    ];

    /**
     * Get the fillable attributes for the model.
     *
     * @return array
     */
    public function getFillable()
    {
        return $this->fillable;
    }

    /**
     * Set the fillable attributes for the model.
     *
     * @param mixed $fillable
     * @return self
     */
    public function setFillable($fillable): self
    {
        $this->fillable = $fillable;

        return $this;
    }

    public function categories()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }
    public function sizes()
    {
        return $this->belongsTo(Sizes::class, 'size_id');
    }
}
