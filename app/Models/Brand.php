<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $fillable = [
        'brand_name',
        'brand_image',
        'brand_description',
    ];
    public function products(){
        return $this->hasMany(Product::class);
    }
}
