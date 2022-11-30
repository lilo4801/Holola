<?php

namespace App\Http\Controllers\API\Auth\User;

use App\Http\Controllers\API\BaseApiController;
use App\Http\Requests\Auth\CreateRequest;
use App\Services\Auth\CreateService;

class RegisterController extends BaseApiController
{
    //
    protected $service;

    public function __construct(CreateService $service)
    {
        $this->service = $service;
    }

    public function __invoke(CreateRequest $request)
    {
        if ($res = $this->service->execute($request->validated())) {
            return $this->sendSuccess('Successfully', $res);
        }
        return $this->sendError();

    }
}
