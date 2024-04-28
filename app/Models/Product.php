<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the images associated with the product.
     */
    public function productImages()
    {
        return $this->hasMany(ProductImage::class);
    }
}
