<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\PriceChange;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Ramsey\Uuid\Type\Decimal;

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
        try {
            $data = request()->validate([
                'product_name' => 'required|string|max:255',
                'category_id' => 'required|numeric|max:255',
                'brand_id' => 'required|numeric|max:255',
                'product_description' => 'required|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $product = Product::create($data);
            $data=request()->validate([
                'price' => 'required|numeric|min:0'
            ]);
            PriceChange::create([
                'product_id'=>$product->id,
                'new_price'=>$data['price'],
                'date_price_change' => now(),
            ]);
            session()->flash('success', 'Product added');
        } catch (\Exception $e) {
            Log::error('An error occurred while creating the product.' . $e->getMessage(), ['data' => $data]);
            session()->flash('error', 'An error occurred while creating the product.');
        }
        return redirect()->route('product.index');
    }

    public function show(Product $product)
    {
        $price = $product->latestPrice();
        return view('product.show-details', compact('product', 'price'));
    }


    public function edit(Product $product)
    {
        $categories = Category::all();
        $brands = Brand::all();
        $price = $product->latestPrice();
        return view('product.edit', compact('product', 'categories', 'brands', 'price'));
    }

    public function update(Product $product)
    {
        try {
            $data = request()->validate([
                'product_name' => 'required|string|max:255',
                'category_id' => 'required|numeric|max:255',
                'brand_id' => 'required|numeric|max:255',
                'product_description' => 'required|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $product->update($data);
            $data = request()->validate([
                'price' => 'required|numeric|min:0'
            ]);
            $price = $product->latestPrice();
            if(!$price || $price != $data['price']){
                PriceChange::create([
                    'product_id'=>$product->id,
                    'new_price'=>$data['price'],
                    'date_price_change' => now(),
                ]);
            }
            session()->flash('success', 'The product has been successfully updated.');
        } catch (\Exception $e) {
            Log::error('An error occurred while updating the product.' . $e->getMessage(), ['data' => $data]);
            session()->flash('error', 'An error occurred while updating the product.');
        }
        return redirect()->route('product.show', compact('product'));
    }

    public function destroy(Product $product)
    {
        try {
            $product->delete();
            session()->flash('success', 'The product was successfully removed.');
        } catch (\Exception $e) {
            Log::error('An error occurred while uninstalling the product.' . $e->getMessage());
            session()->flash('error', 'An error occurred while uninstalling the product.');
        }
        return redirect()->route('product.index');
    }
}
