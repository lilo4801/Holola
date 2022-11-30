<?php

namespace App\Services\Auth\Admin;

class LogoutService
{
    public function execute()
    {
        try {
            auth()->user()->tokens()->delete();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

}