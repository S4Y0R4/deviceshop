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
        try{
            $data = request()->validate([
                'productName' => 'required|string|max:255',
                'category_id' => 'required|string|max:255',
                'brand_id' => 'required|string|max:255',
                'description' => 'required|string',
                'price' => 'required|numeric|min:0',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]); 
            //dd($data);
            Product::create($data);
            session()->flash('success', 'Продукт успешно создан.');
        } catch (\Exception $e) {
            session()->flash('error', 'Произошла ошибка при создании продукта.');
        }
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
        return view('product.edit', compact('product', 'categories','brands'));
    }

    public function update(Product $product)
    {
        try{
            $data = request()->validate([
                'productName' => 'required|string|max:255',
                'category_id' => 'required|string|max:255',
                'brand_id' => 'required|string|max:255',
                'description' => 'required|string',
                'price' => 'required|numeric|min:0',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);  
            dd($data);
            $product -> update($data);
            session()->flash('success', 'Продукт успешно обновлен.');
        } catch (\Exception $e) {
            session()->flash('error', 'Произошла ошибка при обновлении продукта.');
        }
        return redirect()->route('product.show', compact('product'));
    }

    public function destroy(Product $product)
    {
        try{
            $product -> delete();
            session()->flash('success', 'Продукт успешно удален.');
        } catch (\Exception $e){
            session()->flash('error', 'Произошла ошибка при удалении продукта.');
        }
        return redirect()->route('product.index');
    }
    

}   
