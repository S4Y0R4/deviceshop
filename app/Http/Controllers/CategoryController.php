<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    public function index()
    {
        $categories = Category::all();
        return view('category.index', compact('categories'));    
    }
    
    public function create()
    {
        return view('category.create');   
    }
    public function store()
    {
        $data = request()->validate([
            'categoryName' => 'required|string|max:255',
        ]);
        Category::firstOrCreate($data);
        return redirect()->route('category.index');
    }

    public function show(Category $category)
    {   
        return view('category.show-details', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    public function update(Category $category)
    {  
        $data = request()->validate([
            'categoryName' => 'required|string|max:255',
        ]);
        $category -> update($data);
        return redirect()->view('category.show', compact('category')); 
    }
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index');
    }
}
