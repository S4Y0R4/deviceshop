<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Exception;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    public function index()
    {
        return view('category.index', compact('categories'));    
    }
    
    public function create()
    {
        return view('category.create');   
    }
    public function store()
    {
        try {
            $data = request()->validate([
                'categoryName' => 'required|string|max:255',
            ]);
            $data['categoryName'] = mb_convert_case($data['categoryName'], MB_CASE_TITLE, "UTF-8");
            Category::firstOrCreate($data);
            session()->flash('success', 'Категория успешно создана.');
        } catch (\Exception $e) {
            Category::rollback();
            session()->flash('error', 'Произошла ошибка при создании категории.');
        }
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
        try
        {
        $data = request()->validate([
            'categoryName' => 'required|string|max:255',
        ]);
        $data['categoryName'] = mb_convert_case($data['categoryName'], MB_CASE_TITLE, "UTF-8");
        $category -> update($data);
        session()->flash('success', 'Продукт успешно обновлен.');
        } catch (\Exception $e) {
            Category::rollback();
            session()->flash('error', 'Произошла ошибка при обновлении категори.');
        }
        return redirect()->route('category.show', compact('category')); 
    }
    public function destroy(Category $category)
    {
        try{
            $category->delete();
            session()->flash('success', 'Категория успешна удалена.');

        } catch (\Exception $e){
            session()->flash('error', 'Произошла ошибка при удалении категории.');

        }
        return redirect()->route('category.index');
    }
}
