<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use App\Models\Product;

class DestroyController extends Controller
{
    public function __invoke(Product $product)
    {
        try {
            $product->delete();
            session()->flash('success', 'The product was successfully removed.');
        } catch (\Exception $e) {
            Log::error('An error occurred while uninstalling the product.' . $e->getMessage());
            session()->flash('error', 'An error occurred while uninstalling the product.');
        }
        return redirect()->route('product.index');
    }
}
