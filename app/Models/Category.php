<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    // Define relationships if needed
    public function productImages()
    {
        return $this->hasMany(ProductImage::class);
    }
}
