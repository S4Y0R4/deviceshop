<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = [
        'product_name',
        'product_description',
        'slug',
        'image',
        'brand_id',
        'category_id'	
    ];

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
    
    public function priceChanges() {
        return $this->hasMany(PriceChange::class);
    }

    public function latestPrice(){
        return $this->priceChanges()->latest('date_price_change')->first();
    }

}
