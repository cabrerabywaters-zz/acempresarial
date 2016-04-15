<?php 
namespace acempresarial\Repositories\PDF\DatabaseFormatters;

use acempresarial\Helpers\PHPhelpers;

class F29Formatter 
{
	private $helper;

	public function __construct(PHPhelpers $helper)
	{
		$this->helper = $helper;
	}

	/**
     * Takes the array formatted CTE's F29s and applies transformations
     * to some fields that didn't properly format during Xml extraction
     * to properly insert in the DB. 
     * @param  array $CTE [description]
     * @return array $CTE  formatted CTE
     */

	public function format($F29s)
	{
		foreach ($F29s as $key => $F29) {			
			$F29s[$key] = $this->F_replace_dots_and_comas($F29s[$key]);
			$F29s[$key] = $this->F_form_period($F29s[$key]);			
		}	

		return $F29s;

	}
	
	/**
	 * Replaces all decimal separators to match
	 * the double Database format
	 * @param array $F29 [description]
	 */
	private function F_replace_dots_and_comas($F29)
	{					
			$F29 = str_replace('.','',$F29);
			$F29 = str_replace(',','.',$F29);		
			return $F29;
	}


	/**
	 * Formats the F29's period from Ej: 8 / 2011
	 * to a datetime database date.
	 * @param array $F29 [description]
	 */
	private function F_form_period($F29)
	{
		$dates = explode('/',$F29['C15_period']);
		$month = trim($dates[0]);
		$year = trim($dates[1]);
		$F29['C15_period'] = $this->helper->month_year_to_DB_datetime($month,$year);
		 
		return $F29;
	}


	
}