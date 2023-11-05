<?php

namespace App\Http\Controllers\Brand;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Support\Facades\Log;

class DestroyController extends Controller
{
    public function __invoke(Brand $brand)
    {
        try {
            $brand->delete();
            session()->flash('success', 'The brand has been successfully removed.');
        } catch (\Exception $e) {
            Log::error('An error occurred while deleting a brand.' . $e->getMessage());
            session()->flash('error', 'An error occurred while deleting a brand.');
        }
        return redirect()->route('brand.index');
    }
}
