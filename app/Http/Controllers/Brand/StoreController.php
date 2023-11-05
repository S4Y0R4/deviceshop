<?php

namespace App\Http\Controllers\Brand;

use App\Http\Controllers\Controller;
use App\Http\Requests\Brand\StoreRequest;
use Illuminate\Support\Facades\Log;
use App\Models\Brand;


class StoreController extends Controller
{

    public function __invoke(StoreRequest $request)
    { 
        try {
            $data = $request->validated();
            //Приводим brand_name к верхнему регистру
            $data['brand_name'] = mb_strtoupper($data['brand_name'], 'UTF-8');
            Brand::firstOrCreate($data);
            session()->flash('success', 'The brand has been successfully created.');
        } catch (\Exception $e) {
            Log::error('ERROR when creating a brand' . $e->getMessage(), ['data' => $data]);
            session()->flash('error', 'An error occurred while creating the brand');
        }
        return redirect()->route('brand.index');
    }
}