<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\PriceChange;
use App\Models\Product;
use Illuminate\Support\Facades\Log;

class UpdateController extends Controller
{

    public function __invoke(UpdateRequest $request ,Product $product)
    {
        try {
            $product->update($request->except('price'));
            $data = request()->input('price');

            $price = $product->latestPrice()->new_price;
            if(!$price || $price != $data){
                PriceChange::create([
                    'product_id'=>$product->id,
                    'new_price'=>$data,
                    'date_price_change' => now(),
                ]);
            }
            session()->flash('success', 'The product has been successfully updated.');
        } catch (\Exception $e) {
            Log::error('An error occurred while updating the product.' . $e->getMessage(), ['data' => $data]);
            session()->flash('error', 'An error occurred while updating the product.');
        }
        return redirect()->route('product.show', compact('product'));
    }

}
