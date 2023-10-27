<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;


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
        try{
            $data = request()->validate([
                'brandName' => 'required|string|max:255',
            ]);
            $data['brandName'] = mb_convert_case($data['brandName'], MB_CASE_TITLE, "UTF-8");
            Brand::firstOrCreate($data);
            session()->flash('success', 'Бренд успешно создан.');
        } catch (\Exception $e) {
            Brand::rollback();
            session()->flash('error', 'Произошла ошибка при создании бренда');
        }
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
        try
        {
            $data = request()->validate([
                'brandName' => 'required|string|max:255',
            ]);
            $brand -> update($data);
            session()->flash('success', 'Бренд успешно обновлен.');
        } catch (\Exception $e){
            Brand::rollback();
            session()->flash('error', 'Произошла ошибка при обновлении бренда.');
        } 
        return redirect()->route('brand.show', compact('brand'));
    }
         
    public function destroy(Brand $brand)
    {
        try{
            $brand->delete();
            session()->flash('success', 'Бренд успешно удален.');
        } catch (\Exception $e){
            session()->flash('error', 'Произошла ошибка при удалении бренда.');
        }
        return redirect()->route('brand.index');
    }
}
