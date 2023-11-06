<?php

namespace App\Services\Category;

use App\Models\Category;
use Illuminate\Support\Facades\Log;

class Service
{

    public function store(array $data)
    {
        try {
            Category::firstOrCreate($data);
            session()->flash('success', 'The category has been successfully created.');
        } catch (\Exception $e) {
            Log::error('An error occurred while creating the category.' . $e->getMessage(), ['data' => $data]);
            session()->flash('error', 'An error occurred while creating the category.');
        }
    }

    public function update(Category $category, array $data)
    {
        try {
            $category->update($data);
            session()->flash('success', 'The product has been successfully updated');
        } catch (\Exception $e) {
            Log::error('An error occurred while updating the category.' . $e->getMessage(), ['data' => $data]);
            session()->flash('error', 'An error occurred while updating the category.');
        }
    }
    
    public function desetroy(Category $category) 
    {
        try{
            $category->delete();
            session()->flash('success', 'Category successfully removed.');
        } catch (\Exception $e) {
            Log::error('An error occurred while deleting a category.' . $e->getMessage());
            session()->flash('error', 'An error occurred while deleting a category.');
        }
    }
}
