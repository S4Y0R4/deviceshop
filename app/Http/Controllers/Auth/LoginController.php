<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\LoginRequest;

class LoginController extends BaseController
{

    public function __invoke(LoginRequest $request)
    {
        $data = $request->validated();
        if(auth('web')->attempt($data)){
            session()->flash('You have successfully logged in');
            return redirect(route('main.index'));
        } 
    
        return redirect(route('login'))->withErrors(['email'=>'The user was not found or the information provided is incorrect']);
    }
}
