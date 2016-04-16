<?php 

namespace acempresarial\Repositories\CTE\CteValidators;

use Validator;
/**
* Validates de F29 Forms Array
*/
class F29Validator 
{
	private $rules = [
            'rut' => 'email'
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
			$this->validator[$key] = Validator::make($F29,$this->rules);

			
		}
		
	}

	
}