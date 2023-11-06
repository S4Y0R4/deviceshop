<?php


namespace App\Http\Controllers\Category;

use App\Http\Requests\Category\UpdateRequest;
use App\Models\Category;


class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Category $category)
    {
        $data = $request->validated();
        $this->service->update($category, $data);
        return redirect()->route('category.show', compact('category'));
    }
}
