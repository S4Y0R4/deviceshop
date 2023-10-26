<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {   
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('product.create', compact('categories', 'brands'));    
    }

    public function store()
    {
        $data = request()->validate([
            'productName' => 'required|string|max:255',
            'categoryName' => 'required|string|max:255',
            'brandName' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|string',
        ]);
        $brand = Brand::firstOrCreate(['brandName' => $data['brandName']]);
        $brandId = $brand->id;
        // Создаем или находим категорию по имени
        $category = Category::firstOrCreate(['categoryName' => $data['categoryName']]);
        $categoryId = $category->id;

        $productData = [
            'productName' => $data['productName'],
            'description' => $data['description'],
            'price' => $data['price'],
            'image' => $data['image'],
            'brand_id' => $brandId,
            'category_id' => $categoryId,
        ];
        Product::create($productData);
        return redirect()->route('product.index');
    }
    
    public function show(Product $product)
    {
        return view('product.show-details', compact('product'));
    }


    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }

    public function update()
    {
        dd('product update');
    }

    public function destroy()
    {
        dd('product destroy');
    }
    

}   
