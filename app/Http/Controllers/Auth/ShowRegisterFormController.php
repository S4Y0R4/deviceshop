<?php

namespace App\Http\Controllers\Auth;


class ShowRegisterFormController extends BaseController
{
    
    public function __invoke()
    {
        return view('auth.register');
    }
}
