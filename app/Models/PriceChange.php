<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceChange extends Model
{
   
    use HasFactory;
    
    protected $fillable = [
        'product_id',
        'new_price',
        'date_price_change',
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function latestPrice() {
        return $this->where('product_id', $this->product_id)->latest('date_price_change')->first();
    }

}
