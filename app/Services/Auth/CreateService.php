<?php

namespace App\Services\Auth;

use App\Models\User;

class CreateService
{
    public function execute($payload)
    {
        try {
            $user = User::create([
                'name' => data_get($payload, 'name'),
                'email' => data_get($payload, 'email'),
                'password' => bcrypt(data_get($payload, 'password'))
            ]);
            $token = $user->createToken('myapptoken')->plainTextToken;

            return [
                'user' => $user,
                'token' => $token
            ];
        } catch (\Exception $e) {
            return false;
        }
    }
}