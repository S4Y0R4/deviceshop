<?php
namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;


class EditController extends BaseController
{
    
    public function __invoke(Product $product)
    {
        $categories = Category::all();
        $brands = Brand::all();
        $price = $product->latestPrice()->new_price;
        return view('product.edit', compact('product', 'categories', 'brands', 'price'));
    }

}
