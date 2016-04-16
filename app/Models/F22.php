<?php

namespace acempresarial\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class F22 extends Model
{
     protected $guarded = [
        'id'
    ];

     public function cte()
    {
        return $this->belongsTo('acempresarial\Models\Cte');
    }

     /**
	 * The string attribute that should be cast to custom carbon date.
	 *
	 * @var array
	 */

	public function getTaxYearAttribute($value)
	{
	    return Carbon::createFromFormat('Y-m-d H:i:s', $value);
	}
}
