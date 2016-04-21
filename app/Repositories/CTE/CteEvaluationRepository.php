<?php 

namespace app\Repositories\CTE;

use  app\Repositories\CTE\Analysis\GeneralInformation\GeneralInformationLoader;
/**
* Loads all different sections of the report
* calling every individual method that
* generates each section.
*/
class CteEvaluationRepository 
{
	
	private $generalInfo;

	public function __construct(GeneralInformationLoader $generalInfo)
	{
		$this->generalInfo = $generalInfo;
	}
	
	public function evaluate($CTE)
	{
		$evaluation = array();
		$evaluation['general_information']= $this->generalInfo->get($CTE);
	}

}