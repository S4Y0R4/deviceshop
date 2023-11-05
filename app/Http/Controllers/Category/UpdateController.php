<?php


namespace App\Http\Controllers\Category;

use App\Http\Requests\Category\UpdateRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use App\Models\Category;


class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Category $category)
    {
        try {
            $data = $request->validated();
            $first = mb_substr($data['category_name'], 0, 1, 'UTF-8'); //первая буква
            $last = mb_substr($data['category_name'], 1); //все кроме первой буквы
            $first = mb_strtoupper($first, 'UTF-8');
            $last = mb_strtolower($last, 'UTF-8');
            $data['category_name'] = $first . $last;
            $category->update($data);
            session()->flash('success', 'The product has been successfully updated');
        } catch (\Exception $e) {
            Log::error('An error occurred while updating the category.' . $e->getMessage(), ['data' => $data]);
            session()->flash('error', 'An error occurred while updating the category.');
        }
        return redirect()->route('category.show', compact('category'));
    }
}
