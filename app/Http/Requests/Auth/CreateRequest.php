<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\BaseRequest;

class CreateRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'string|required',
            'email' => 'email|required|unique:users',
            'password' => 'string|required|confirmed',
        ];
    }
}
