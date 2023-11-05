<?php


namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\Category\StoreRequest;
use App\Models\Category;


class StoreController extends Controller
{

    public function __invoke(StoreRequest $request) 
    {
        try {
            $data = $request->validated();
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

}