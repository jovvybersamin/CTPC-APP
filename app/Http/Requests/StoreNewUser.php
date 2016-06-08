<?php

namespace OneStop\Http\Requests;

use OneStop\Http\Requests\Request;

class StoreNewUser extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:5',
            'email' => 'required|email|unique:users',
            'username' => 'required|unique:users'
        ];
    }
}
