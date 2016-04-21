<?php

namespace acempresarial\Http\Requests;

use acempresarial\Http\Requests\Request;

class StoreUploadedCteRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {        
        return [
            'primary_information.issuer'  => 'email'
        ];
    }
}
