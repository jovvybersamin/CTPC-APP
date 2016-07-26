<?php

namespace OneStop\Http\Requests;

use OneStop\Http\Requests\Request;

class VideoRequest extends Request
{
	protected $rules = [
		    'title'         => 'required',
            'duration'      => 'required',
            'source'        => 'required',
            'poster'        => 'required',
            'status'        => 'required',
            'featured'      => 'required',
            'category_id'   => 'required',
            'uploaded_by'   => 'required'
	];

	 /**
     *
     * @return [type] [description]
     */
    protected function getValidatorInstance()
    {
        $data = $this->all();

        $data = array_add($data,'created_by',1);
        $category = array_get($data,'category_id');
        $uploader = array_get($data,'uploaded_by');

        $data['category_id']  = $category === "0" ? "" : $category;
        $data['uploaded_by']  = $uploader === "0" ? "" : $uploader;

        $this->replace($data);
        return parent::getValidatorInstance();
    }
}
