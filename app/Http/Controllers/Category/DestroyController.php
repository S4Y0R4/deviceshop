<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Log;

class DestroyController extends Controller
{
    public function __invoke(Category $category)
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
