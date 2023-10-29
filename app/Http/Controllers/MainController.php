<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\PriceChange;
use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('index', compact('products','categories', ));
    }

}
