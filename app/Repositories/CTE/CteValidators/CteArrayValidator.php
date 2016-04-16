<?php
namespace acempresarial\Repositories\CTE\CteValidators;

use acempresarial\Models\Cte;
use acempresarial\Repositories\CTE\CteValidators\F22Validator;
use acempresarial\Repositories\CTE\CteValidators\F29Validator;
use acempresarial\Repositories\CTE\CteValidators\PrimaryInformationValidator;

/**
* Handles All validation for the uploaded CTE
*/
class CteArrayValidator
{
    private $f22;
    private $f29;
    private $primaryInformation;

    public function __construct(F22Validator $f22, F29Validator $f29, PrimaryInformationValidator $primaryInformation)
    {
        $this->f22 = $f22;
        $this->f29 = $f29;
        $this->primaryInformation = $primaryInformation;
    }
    
    /**
     * Executes all validation for the CTE if any of the
     * validations fails, it fails completely.	 *
     * @return array [description]
     */
    public function validate($cte)
    {
    	$f22 = $this->f22->validate($cte['Forms']['F22']);
    	$f29 = $this->f29->validate($cte['Forms']['F29']);
    	$primaryInformation = $this->primaryInformation($cte);

    }
}
