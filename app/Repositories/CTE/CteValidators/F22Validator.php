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
		    'C18_first_category_tax_rent_taxable_base' =>'digits_between:1,15',
		    'first_category_tax_rent_determ' =>'digits_between:1,15',
		    'C122_total_assets' =>'digits_between:1,15',
		    'C123_total_liabilities' =>'digits_between:1,15',
		    'C628_perceived_or_accrued_income' =>'digits_between:1,15',
		    'C630_direct_cost_of_goods_and_services' =>'digits_between:1,15',
		    'C631_remuneration' =>'digits_between:1,15',
		    'C632_depreciation' =>'digits_between:1,15',
		    'C637_debtor_balance_restatement' =>'digits_between:1,15',
		    'C645_positive_tax_equity' =>'digits_between:1,15',
		    'C647_fixed_assets' =>'digits_between:1,15',
		    'C651_other_interest_paid_or_owed' =>'digits_between:1,15',
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
		$count = 0;
		foreach ($F22s as $key => $F22) {
			$this->validator[$count] = Validator::make($F22,$this->rules);			
			$count++;	
		}

		dd($this->validator[1]->errors());
		
	}

	
}