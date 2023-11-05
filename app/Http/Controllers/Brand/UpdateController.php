<?php


namespace App\Http\Controllers\Brand;

use App\Http\Controllers\Controller;
use App\Http\Requests\Brand\UpdateRequest;
use App\Models\Brand;
use Illuminate\Support\Facades\Log;

class UpdateController extends Controller
{

    public function __invoke(UpdateRequest $request, Brand $brand)
    {
        try {
            $data = $request->validated();
            //Приводим brand_name к верхнему регистру
            $data['brand_name'] = mb_strtoupper($data['brand_name'], 'UTF-8');
            $brand->update($data);
            session()->flash('success', 'The brand has been successfully updated.');
        } catch (\Exception $e) {
            Log::error('An error occurred while updating the brand.' . $e->getMessage(), ['data' => $data]);
            session()->flash('error', 'An error occurred while updating the brand.');
        }
        return redirect()->route('brand.show', compact('brand'));
    }
}
