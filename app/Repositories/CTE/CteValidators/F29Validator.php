<?php

namespace acempresarial\Repositories\CTE\CteValidators;

use Validator;

/**
* Validates de F29 Forms Array
*/
class F29Validator
{
    private $rules = [
            'C111' => 'required',
            'C142' => 'required',
            'C020' => 'required',
            'C502' => 'required',
            'C504' => 'required',
            'C510' => 'required',
            'C514' => 'required',
            'C520' => 'required',
            'C525' => 'required',
            'C527' => 'required',
            'C532' => 'required',
            'C535' => 'required',
            'C547' => 'required',
            'C077' => 'required',

        ];

    private $validator = [];
    
    /**
     * Validates the F29 forms
     * @param  array $F29 [description]
     * @return array      [description]
     */
    public function validate($F29s)
    {
        foreach ($F29s as $key => $F29) {
            $F29s[$key]["errors"] = $errors->errors();
        }

        return $F29s;
    }
}
