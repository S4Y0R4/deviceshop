<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
        try {
            $data = request()->validate([
                'category_name' => 'required|string|max:255',
            ]);
            $first = mb_substr($data['category_name'],0,1, 'UTF-8');//первая буква
            $last = mb_substr( $data['category_name'],1);//все кроме первой буквы
            $first = mb_strtoupper($first, 'UTF-8');
            $last = mb_strtolower($last, 'UTF-8');
            $data['category_name'] = $first.$last;
            Category::firstOrCreate($data);
            session()->flash('success', 'The category has been successfully created.');
        } catch (\Exception $e) {
            Log::error('An error occurred while creating the category.' . $e->getMessage(), ['data' => $data]);
            session()->flash('error', 'An error occurred while creating the category.');
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
        try {
            $data = request()->validate([
                'category_name' => 'required|string|max:255',
            ]);
            $first = mb_substr($data['category_name'],0,1, 'UTF-8');//первая буква
            $last = mb_substr( $data['category_name'],1);//все кроме первой буквы
            $first = mb_strtoupper($first, 'UTF-8');
            $last = mb_strtolower($last, 'UTF-8');
            $data['category_name'] = $first.$last;
            $category->update($data);
            session()->flash('success', 'The product has been successfully updated');
        } catch (\Exception $e) {
            Log::error('An error occurred while updating the category.' . $e->getMessage(), ['data' => $data]);
            session()->flash('error', 'An error occurred while updating the category.');
        }
        return redirect()->route('category.show', compact('category'));
    }
    public function destroy(Category $category)
    {
        try {
            $category->delete();
            session()->flash('success', 'Category successfully removed.');
        } catch (\Exception $e) {
            Log::error('An error occurred while deleting a category.' . $e->getMessage());
            session()->flash('error', 'An error occurred while deleting a category.');
        }
        return redirect()->route('category.index');
    }
}
