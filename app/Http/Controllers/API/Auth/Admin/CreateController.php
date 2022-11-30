<?php

namespace App\Http\Controllers\API\Auth\Admin;

use App\Http\Controllers\API\BaseApiController;
use App\Http\Requests\Auth\Admin\CreateRequest;
use App\Services\Auth\Admin\CreateService;

class CreateController extends BaseApiController
{
    protected $service;

    public function __construct(CreateService $service)
    {
        $this->service = $service;
    }

    public function __invoke(CreateRequest $request)
    {
        if ($res = $this->service->execute($request->validated())) {
            return $this->sendSuccess('success', $res);
        }
        return $this->sendError();
    }
}
