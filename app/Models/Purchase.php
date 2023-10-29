<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'purchase_date',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }   
}
