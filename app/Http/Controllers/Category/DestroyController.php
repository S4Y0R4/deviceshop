<?php

namespace App\Http\Controllers\Category;

use App\Models\Category;

class DestroyController extends BaseController
{
    public function __invoke(Category $category)
    {
        $this->service->desetroy($category);
        return redirect()->route('category.index');
    }
}
