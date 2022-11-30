<?php


namespace App\Services\Auth\Admin;


use App\Models\Admin;

class CreateService
{
    public function execute($payload)
    {
        try {
            $user = Admin::create([
                'fullname' => data_get($payload, 'fullname'),
                'username' => data_get($payload, 'username'),
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