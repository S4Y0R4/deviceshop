<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $fillable = [
        'category_name',
        'category_description',
    ];

    public function products(){
        return $this->hasMany(Product::class);
    }

    public function specifications(){
        return $this->belongsToMany(Specification::class, 'category_specifications');
    }
    
}
