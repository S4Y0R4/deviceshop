<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;


class ShowLoginFormController extends BaseController
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        return view('auth.login');
    }
}
