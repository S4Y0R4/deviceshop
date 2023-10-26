<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    
    public function products() 
    {
        return $this -> hasMany(Product::class);
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'brand_category');    
    }

    protected $fillable = 
    [
        'brandName',
        'image',
    ];

}
