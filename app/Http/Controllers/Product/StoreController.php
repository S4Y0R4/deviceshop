<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\PriceChange;
use App\Models\Product;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\Product\StoreRequest;

class StoreController extends Controller
{

    public function __invoke(StoreRequest $request)
    {
        try {
            $product = Product::create($request->except('price'));
            $data=request()->input('price');
            PriceChange::create([
                'product_id'=>$product->id,
                'new_price'=>$data,
                'date_price_change' => now(),
            ]);
            session()->flash('success', 'Product added');
        } catch (\Exception $e) {
            Log::error('An error occurred while creating the product.' . $e->getMessage(), ['data' => $data]);
            session()->flash('error', 'An error occurred while creating the product.');
        }
        return redirect()->route('product.index');
    }
}