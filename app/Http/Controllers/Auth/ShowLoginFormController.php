<?php

namespace App\Http\Controllers\Auth;


class ShowLoginFormController extends BaseController
{

    public function __invoke()
    {
        return view('auth.login');
    }
}
