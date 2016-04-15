<?php 
namespace acempresarial\Repositories\PDF\DatabaseFormatters;

use acempresarial\Helpers\PHPhelpers;

class F22Formatter 
{
	private $helper;

	public function __construct(PHPhelpers $helper)
	{
		$this->helper = $helper;
	}

	/**
     * Takes the array formatted CTE's F22s and applies transformations
     * to some fields that didn't properly format during Xml extraction
     * to properly insert in the DB. 
     * @param  array $CTE [description]
     * @return array $CTE  formatted CTE
     */
	public function format($F22s)
	{

		foreach ($F22s as $key => $F22) {			
			$F22s[$key] = $this->F_replace_dots_and_comas($F22s[$key]);
			$F22s[$key] = $this->F_tax_year($F22s[$key]);			
		}		
		return $F22s;

	}

	/**
	 * Replaces all decimal separators to match
	 * the double Database format
	 * @param array $F29 [description]
	 */
	private function F_replace_dots_and_comas($F22)
	{					
			$F22 = str_replace('.','',$F22);
			$F22 = str_replace(',','.',$F22);		
			return $F22;
	}

	/**
	 * Formats the F22's tax year from Ej: "Año Tributario 2011"
	 * to a datetime database date.
	 * @param array $F22 [description]
	 */
	private function F_tax_year($F22)
	{
		$dates = explode(' ',$F22['tax_year']);		
		$year = trim($dates[2]);
		$F22['tax_year'] = $this->helper->month_year_to_DB_datetime("12",$year);
		 
		return $F22;
	}
	
}