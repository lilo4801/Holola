<?php

namespace App\Http\Controllers\API\Auth\Admin;

use App\Http\Controllers\API\BaseApiController;
use App\Services\Auth\Admin\LogoutService;


class LogoutController extends BaseApiController
{
    protected $service;

    public function __construct(LogoutService $service)
    {
        $this->service = $service;
    }

    public function __invoke()
    {
        if ($this->service->execute()) {
            return $this->sendSuccess();
        }
        return $this->sendError();
    }
}
