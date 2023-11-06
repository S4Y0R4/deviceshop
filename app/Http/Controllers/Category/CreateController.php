<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller; 

class CreateController extends BaseController
{
    public function __invoke()
    {
        return view('category.create');
    }
}