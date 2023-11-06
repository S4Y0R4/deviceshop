<?php

namespace App\Http\Controllers\Brand;

use App\Models\Brand;


class IndexController extends BaseController
{
    public function __invoke()
    {
        $brands = Brand::all();
        return view('brand.index', compact('brands'));
    }
}
   