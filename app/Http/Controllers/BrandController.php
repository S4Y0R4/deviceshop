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
        Brand::create($data);
        return redirect()->route('brand.index');
    }
    public function show(Brand $brand)
    {
        $products = Product::where('brand_id', $brand->id)->get();
        return view('brand.show-details', compact('brand','products'));
    } 
           
}
