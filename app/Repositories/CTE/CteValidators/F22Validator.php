<?php

namespace acempresarial\Repositories\CTE\CteValidators;

use Validator;

/**
* Validates de F22 Forms Array
*/
class F22Validator
{
    private $rules = [
            'tax_year' => 'required|date',
            'C18' =>'required',
            'C82' => 'requried',
            'C122' =>'required',
            'C123' =>'required',
            'C366'=>'required',
            'C628' =>'required',
            'C629'=> 'required',
            'C630' =>'required',
            'C631' =>'required',
            'C632' =>'required',
            'C633' => 'required',
            'C635' => 'required',
            'C637' =>'required',
            'C638' => 'required',
            'C643' => 'required',
            'C645' =>'required',
            'C647' =>'required',
            'C651' =>'required',
            'C839' => 'required',
            'C893' => 'required',
            'C894' =>'required'
        ];

    private $validator = [];

    
    /**
     * Validates the F22 forms
     * @param  array $F22 [description]
     * @return array      [description]
     */
    public function validate($F22s)
    {
        foreach ($F22s as $key => $F22) {
            $errors = Validator::make($F22, $this->rules);
            $F22s[$key]["errors"] = $errors->errors();
        }
        return $F22s;
    }
}
