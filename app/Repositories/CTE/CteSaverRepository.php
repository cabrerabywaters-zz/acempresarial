<?php 
namespace acempresarial\Repositories\CTE;

use acempresarial\Models\Cte;
use acempresarial\Models\Company;
use acempresarial\Models\F22;
use acempresarial\Models\F29;
use Auth;
use acempresarial\User;

class CteSaverRepository 
{
	
	public function store($cte)
	{	
    $user = User::findOrFail(Auth::user()->id);
		/////////////////////////
		//Company Creator
		/////////////////////////
		$company['name'] =  $cte['primary_information']['issuer'];
		$company['rut'] =$cte['primary_information']['issuer_rut'];
		$company['address'] =$cte['primary_information']['address'];
		$company['tax_category'] =$cte['primary_information']['tax_category'];

		$company = Company::firstOrCreate($company);
    $user->companies()->detach($company->id);
    $user->companies()->attach($company->id);
		/////////////////////////
		//CTE CREATOR
		/////////////////////////
		$CTE['company_id'] = $company->id;
		$CTE['folder_issue_date'] = $cte['primary_information']['folder_issue_date']; 
		$CTE['issuer_rut'] = $cte['primary_information']['issuer_rut'];
    $CTE['address'] =$cte['primary_information']['address'];   
    $CTE['tax_category'] =$cte['primary_information']['tax_category'];
    $CTE['user_id'] = Auth::user()->id;


        $CTE = Cte::firstOrCreate($CTE);
       	/////////////////////////
       	//F29 Creator
       	/////////////////////////
       	
       	foreach ($cte['Forms']['F29'] as $key => $F29Form) {
       		
       	    $f29 = F29::firstOrNew($F29Form);
       	    $f29->cte_id = $CTE->id;
       	    $f29->save();
       	}
       	/////////////////////////
       	//F22 Creator
       	/////////////////////////
       	foreach ($cte['Forms']['F22'] as $key => $F22Form) {
       	    $f22 = F22::firstOrNew($F22Form);
       	    $f22->cte_id = $CTE->id;
       	    $f22->save();
       	}

       	$CTE->load('f29s', 'f22s','company');
        return $CTE;      
		
		
	}
}