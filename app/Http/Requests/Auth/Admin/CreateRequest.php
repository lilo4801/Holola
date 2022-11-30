<?php

namespace App\Http\Requests\Auth\Admin;

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
            'fullname' => 'string|required',
            'username' => 'string|required|unique:admins',
            'password' => 'string|required',
        ];
    }
}
