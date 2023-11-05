<?php

namespace App\Http\Controllers\Brand;

use App\Http\Controllers\Controller;


class CreateController extends Controller
{
    public function __invoke()
    {
        return view('brand.create');
    }
}
