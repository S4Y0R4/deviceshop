<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function products()
    {
        return $this -> hasMany(Brand::class);
    }
    public function brands()
    {
        return $this->belongsToMany(Brand::class, 'brand_category');    
    }
    protected $fillable = 
    [
        'categoryName',
        'image',
    ];

}
