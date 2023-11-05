<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;


class ShowController extends Controller
{
    public function __invoke(Product $product)
    {
        $price = $product->latestPrice()->new_price;
        return view('product.show-details', compact('product', 'price'));
    }
}
