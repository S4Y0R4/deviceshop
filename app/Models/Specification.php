<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specification extends Model
{
    use HasFactory;

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_specifications');
    }

    public function productSpecifications()
    {
        return $this->hasMany(ProductAttribute::class);
    }
}
