<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_fname',
        'customer_lname',
    ];
    
    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }
}
