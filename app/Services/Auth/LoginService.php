<?php


namespace App\Services\Auth;


use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginService
{
    public function execute($payload)
    {
        try {
            $user = User::where('email', data_get($payload, 'email'))->first();

            if (!$user || !Hash::check(data_get($payload, 'password'), $user->password)) {
                return false;
            }

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