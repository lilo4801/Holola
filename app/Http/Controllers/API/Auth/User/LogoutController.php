<?php

namespace App\Http\Controllers\API\Auth\User;

use App\Http\Controllers\API\BaseApiController;
use App\Services\Auth\LogoutService;


class LogoutController extends BaseApiController
{
    public $service;

    public function __construct(LogoutService $service)
    {
        $this->service = $service;
    }

    public function __invoke()
    {
        if (!$this->service->execute()) {
            return $this->sendError();
        }
        return $this->sendSuccess('logout');
    }
}
