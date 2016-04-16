<?php 

namespace acempresarial\Repositories\CTE\CteValidators;

use Validator;
/**
* Validates de PrimaryInformation Forms Array
*/
class PrimaryInformationValidator 
{
	private $rules = [
            'rut' => 'email'
        ];

    private $validator = [];
	
	/**
	 * Validates the PrimaryInformation forms
	 * @param  array $PrimaryInformation [description]
	 * @return array      [description]
	 */
	public function validate($PrimaryInformations)
	{

		foreach ($PrimaryInformations as $key => $PrimaryInformation) {
			$this->validator[$key] = Validator::make($PrimaryInformation,$this->rules);

			dd($this->validator);
		}
		
	}

	
}