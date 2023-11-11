<?php

namespace App\Services\Auth;

use App\Models\User;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;

class Service
{
    public function createUser(array $data)
    {
        try{
            $data['password']= $this->passwordHash($data['password']);
            $user = User::create($data);
            return $user;
        } catch (QueryException $e) {
            Log::error('An error occurred while creating the user.' . $e->getMessage(), ['data' => $data]);
            throw new Exception('Error creating user'); 
        } catch (\Exception $e) {
            Log::error('An unexpected error occurred.' . $e->getMessage(), ['data' => $data]);            
            session()->flash('error', 'An error occurred while creating the user.');
            throw $e;
        }
    }

    protected function passwordHash(string $password)
    {
        try{
            $password = bcrypt($password);
            return $password;
        } catch (\Exception $e){
            Log::error('An error occurred while hashing the password.' . $e->getMessage(), ['data' => $password]);
            throw new Exception('Error hashing password.');
        }   
    }

    public function loginUserAfterCreation($user)
    {
        if($user){
            auth('web')->login($user);
            session()->flash('success', 'User created');
        } else {
            Log::error('An error occurred while login user may be user is not exist', $user);
            throw new Exception('An error occurred while login user may be user is not exis.');

        }
    }


}
