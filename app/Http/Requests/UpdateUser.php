<?php

namespace OneStop\Http\Requests;

use OneStop\Http\Requests\Request;

class UpdateUser extends Request
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
        $id = $this->get('id');

        $rules = [
                'name' => 'required|min:5',
                'email' => 'required|email|unique:users,email,' . $id .',id',
                'username' => 'required|unique:users,username,' . $id . ',id'
            ];

        $password = trim($this->get('password'));

        $data = $this->all();

        if(!empty($password)){
            $rules['password'] = 'required|confirmed';
        }else{
            unset($data['password']);
            unset($data['password_confirmation']);
            $this->replace($data);
        }

        return $rules;
    }
}
