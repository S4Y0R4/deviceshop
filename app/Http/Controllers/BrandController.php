<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

use function Symfony\Component\String\b;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return view('brand.index', compact('brands'));   
    }

    public function create()
    {
        return view('brand.create');    
    }
    public function store() 
    {
        $data = request()->validate([
            'brandName' => 'required|string|max:255',
        ]);
        Brand::firstOrCreate($data);
        return redirect()->route('brand.index');
    }
    public function show(Brand $brand)
    {
        $products = Product::where('brand_id', $brand->id)->get();
        return view('brand.show-details', compact('brand','products'));
    } 
    
    public function edit(Brand $brand)
    {
        return view('brand.edit', compact('brand'));
    }

    public function update(Brand $brand)
    {
        $data = request()->validate([
            'brandName' => 'required|string|max:255',
        ]);
        $brand -> update($data);
        return redirect()->route('brand.show', compact('brand'));
    }
         
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect()->route('brand.index');
    }
}
