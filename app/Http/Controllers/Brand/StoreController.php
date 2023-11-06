<?php

namespace App\Http\Controllers\Brand;

use App\Http\Requests\Brand\StoreRequest;


class StoreController extends BaseController
{

    public function __invoke(StoreRequest $request)
    { 
        $data = $request->validated();
        $this -> service -> store($data);
        return redirect()->route('brand.index');
    }
}