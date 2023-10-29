<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
        try {
            $data = request()->validate([
                'brand_name' => 'required|string|max:255',
            ]);
            //Приводим brand_name к верхнему регистру
            $data['brand_name'] = mb_strtoupper($data['brand_name'], 'UTF-8');
            Brand::firstOrCreate($data);
            session()->flash('success', 'The brand has been successfully created.');
        } catch (\Exception $e) {
            Log::error('ERROR when creating a brand' . $e->getMessage(), ['data' => $data]);
            session()->flash('error', 'An error occurred while creating the brand');
        }
        return redirect()->route('brand.index');
    }
    public function show(Brand $brand)
    {
        $products = Product::where('brand_id', $brand->id)->get();
        return view('brand.show-details', compact('brand', 'products'));
    }

    public function edit(Brand $brand)
    {
        return view('brand.edit', compact('brand'));
    }

    public function update(Brand $brand)
    {
        try {
            $data = request()->validate([
                'brand_name' => 'required|string|max:255',
            ]);
            //Приводим brand_name к верхнему регистру
            $data['brand_name'] = mb_strtoupper($data['brand_name'], 'UTF-8');
            $brand->update($data);
            session()->flash('success', 'The brand has been successfully updated.');
        } catch (\Exception $e) {
            Log::error('An error occurred while updating the brand.' . $e->getMessage(), ['data' => $data]);
            session()->flash('error', 'An error occurred while updating the brand.');
        }
        return redirect()->route('brand.show', compact('brand'));
    }

    public function destroy(Brand $brand)
    {
        try {
            $brand->delete();
            session()->flash('success', 'The brand has been successfully removed.');
        } catch (\Exception $e) {
            Log::error('An error occurred while deleting a brand.' . $e->getMessage());
            session()->flash('error', 'An error occurred while deleting a brand.');
        }
        return redirect()->route('brand.index');
    }
}
