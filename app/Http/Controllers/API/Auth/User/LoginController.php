<?php

namespace App\Http\Controllers\API\Auth\User;

use App\Http\Controllers\API\BaseApiController;
use App\Http\Requests\Auth\LoginRequest;
use App\Services\Auth\LoginService;

class LoginController extends BaseApiController
{
    //
    protected $service;

    public function __construct(LoginService $service)
    {
        $this->service = $service;

    }

    public function __invoke(LoginRequest $request)
    {
        if ($res = $this->service->execute($request->validated())) {
            return $this->sendSuccess('success', $res);
        }
        return $this->sendError('Wrong password or email');
    }
}
