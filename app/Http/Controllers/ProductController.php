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

        // Создаем или находим бренд по имени
        $brand = Brand::where(['brandName' => $data['brandName']])->first();
        $brandId = $brand->id;
        // Создаем или находим категорию по имени
        $category = Category::where(['categoryName' => $data['categoryName']])->first();
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
        $categories = Category::all();
        $brands = Brand::all();
        $currentCategoryName = Category::where('id', $product->category_id)->first()->categoryName;
        $currentBrandName = Brand::where('id', $product->brand_id)->first()->brandName;
        return view('product.edit', compact('product', 'categories','brands', 'currentCategoryName', 'currentBrandName'));
    }

    public function update(Product $product)
    {
        $data = request()->validate([
            'productName' => 'required|string|max:255',
            'categoryName' => 'required|string|max:255',
            'brandName' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|string',
        ]);
        // Создаем или находим бренд по имени
        $brand = Brand::where(['brandName' => $data['brandName']])->first();
        $brandId = $brand->id;
        // Создаем или находим категорию по имени
        $category = Category::where(['categoryName' => $data['categoryName']])->first();
        $categoryId = $category->id;
        $productData = [
            'productName' => $data['productName'],
            'description' => $data['description'],
            'price' => $data['price'],
            'image' => $data['image'],
            'brand_id' => $brandId,
            'category_id' => $categoryId,
        ];
        $product -> update($productData);
        return redirect()->route('product.show', compact('product'));
    }

    public function destroy(Product $product)
    {
        $product -> delete();
        return redirect()->route('product.index');
    }
    

}   
