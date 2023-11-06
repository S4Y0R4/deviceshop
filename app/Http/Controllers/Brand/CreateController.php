<?php

namespace App\Http\Controllers\Brand;


class CreateController extends BaseController
{
    public function __invoke()
    {
        return view('brand.create');
    }
}
