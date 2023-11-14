<?php

namespace App\Services\Specification;

use App\Models\Category;
use Illuminate\Support\Facades\Log;


class Service
{
    public function getSpecificationsByCategory($categoryId){
        try{
            $category = Category::with('specifications')->findOrFail($categoryId);
            return $category->specifications;
        } catch (\Exception $e) {
            Log::error('An error occurred while getting the specification fields.'. $e->getMessage(), ['data' => $categoryId]);
            throw $e;
        }
    }
}
