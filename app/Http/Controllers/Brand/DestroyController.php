<?php

namespace App\Http\Controllers\Brand;

use App\Models\Brand;


class DestroyController extends BaseController 
{
    public function __invoke(Brand $brand)
    {
        $this->service->destroy($brand);
        return redirect()->route('brand.index');
    }
}
