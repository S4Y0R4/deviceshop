<?php

namespace App\Services\Product;

use Illuminate\Support\Facades\Log;
use App\Models\PriceChange;
use App\Models\Product;



class Service {
    
    public function store(array $data)
    {
        try{
            $product = Product::create($data);
            $this->storePriceChange($product->id, $data['price']);
            session()->flash('success', 'Product added');
        } catch (\Exception $e) {
            Log::error('An error occurred while creating the product.' . $e->getMessage(), ['data' => $data]);
            session()->flash('error', 'An error occurred while creating the product.');
        }
    }

    public function update(Product $product, array $data)
    {
        try {
            $product->update($data);
            $this->updatePriceChange($product, $data['price']);
            session()->flash('success', 'The product has been successfully updated.');
        } catch (\Exception $e) {
            Log::error('An error occurred while updating the product.' . $e->getMessage(), ['data' => $data]);
            session()->flash('error', 'An error occurred while updating the product.');
        }
    }
    
    protected function updatePriceChange(Product $product, $newPrice)
    {
        $latestPrice = $product->latestPrice()->new_price ?? null;
        if ($latestPrice !== $newPrice) {
            PriceChange::create([
                'product_id' => $product->id,
                'new_price' => $newPrice,
                'date_price_change' => now(),
            ]);
        }
        
    }

    protected function storePriceChange($productId, $newPrice)
    {
        PriceChange::create([
            'product_id' => $productId,
            'new_price' => $newPrice,
            'date_price_change' => now(),
        ]);
    }

    public function destroy(Product $product)
    {
        try {
            $product->delete();
            session()->flash('success', 'The product was successfully removed.');
        } catch (\Exception $e) {
            Log::error('An error occurred while uninstalling the product.' . $e->getMessage());
            session()->flash('error', 'An error occurred while uninstalling the product.');
        }
    }
}