<?php


namespace App\Http\Controllers\Brand;

use App\Http\Requests\Brand\UpdateRequest;
use App\Models\Brand;

class UpdateController extends BaseController
{

    public function __invoke(UpdateRequest $request, Brand $brand)
    {
        $data = $request->validated();
        $this -> service -> update($brand, $data);
        return redirect()->route('brand.show', compact('brand'));
    }
}
