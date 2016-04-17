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
            'rut' => 'required',           
		    'email' => 'email',
		    'C18_first_category_tax_rent_taxable_base' =>'required',
		    'first_category_tax_rent_determ' =>'required',
		    'C122_total_assets' =>'required',
		    'C123_total_liabilities' =>'required',
		    'C628_perceived_or_accrued_income' =>'required',
		    'C630_direct_cost_of_goods_and_services' =>'required',
		    'C631_remuneration' =>'required',
		    'C632_depreciation' =>'required',
		    'C637_debtor_balance_restatement' =>'required',
		    'C645_positive_tax_equity' =>'required',
		    'C647_fixed_assets' =>'required',
		    'C651_other_interest_paid_or_owed' =>'required',
		    'folio' => 'required'
        ];

    private $validator = [];

	
	/**
	 * Validates the F22 forms
	 * @param  array $F22 [description]
	 * @return array      [description]
	 */
	public function validate($F22s)
	{
		//dd($F22s);
		$count = 0;
		foreach ($F22s as $key => $F22) {
			$this->validator[$count] = Validator::make($F22,$this->rules);			
			$count++;	
		}

		//dd($this->validator[0]->errors());
		
	}

	
}