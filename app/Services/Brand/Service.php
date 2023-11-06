<?php

namespace App\Services\Brand;

use App\Models\Brand;
use Illuminate\Support\Facades\Log;

class Service
{

    public function store(array $data)
    {
        try {
            Brand::firstOrCreate($data);
            session()->flash('success', 'The brand has been successfully created.');
        } catch (\Exception $e) {
            Log::error('ERROR when creating a brand' . $e->getMessage(), ['data' => $data]);
            session()->flash('error', 'An error occurred while creating the brand');
        }
    }

    public function update(Brand $brand, array $data)
    {
        try {
            $brand->update($data);
            session()->flash('success', 'The brand has been successfully updated.');
        } catch (\Exception $e) {
            Log::error('An error occurred while updating the brand.' . $e->getMessage(), ['data' => $data]);
            session()->flash('error', 'An error occurred while updating the brand.');
        }
    }
    
    public function destroy(Brand $brand)
    {
        try{
            $brand->delete();
            session()->flash('success', 'The brand has been successfully removed.');
        } catch (\Exception $e) {
            Log::error('An error occurred while deleting a brand.' . $e->getMessage());
            session()->flash('error', 'An error occurred while deleting a brand.');
        }
        
    }
}
