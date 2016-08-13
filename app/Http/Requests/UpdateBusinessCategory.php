<?php

namespace OneStop\Http\Requests;

use OneStop\Http\Requests\Request;

class UpdateBusinessCategory extends Request
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
        return [
            'name'  =>  'required|min:3|unique:business_categories,name,' . $id . ',id'
        ];
    }
}
