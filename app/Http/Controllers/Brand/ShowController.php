<?php

namespace App\Http\Controllers\Brand;

use App\Models\Brand;
use App\Models\Product;

class ShowController extends BaseController
{
    public function __invoke(Brand $brand)
    {
        $products = Product::where('brand_id', $brand->id)->get();
        return view('brand.show-details', compact('brand', 'products'));
    }
}

