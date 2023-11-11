<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\RegisterRequest;

class RegisterController extends BaseController
{

    public function __invoke(RegisterRequest $request)
    {
        $data = $request -> validated();
        $user = $this->service->createUser($data);
        $this->service->loginUserAfterCreation($user);
        return redirect(route('main.index'));
    }
}
