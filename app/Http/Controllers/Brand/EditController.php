<?php

namespace App\Http\Controllers\Brand;

use App\Models\Brand;


class EditController extends BaseController
{
    public function __invoke(Brand $brand)
    {
        return view('brand.edit', compact('brand'));
    }
}
