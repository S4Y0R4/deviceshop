<?php

namespace App\Http\Controllers\Auth;


class LogoutController extends BaseController
{

    public function __invoke()
    {
        auth()->logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect(route('main.index'));
    }
}
