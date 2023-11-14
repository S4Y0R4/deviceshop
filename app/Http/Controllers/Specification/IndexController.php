<?php

namespace App\Http\Controllers\Specification;

use App\Http\Requests\Specification\GetSpecificationByCategoryRequest;

class IndexController extends BaseController
{

    public function __invoke(GetSpecificationByCategoryRequest $request)
    {
        $categoryId = $request->validated()['category_id'];
        if (empty($categoryId)) return response()->noContent();
        $specifications = $this->service->getSpecificationsByCategory($categoryId);
        return view('partials.specifications', compact('specifications'));
    }
}
