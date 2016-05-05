<?php

namespace acempresarial\Models;

use Illuminate\Database\Eloquent\Model;

class Cte extends Model
{
     protected $guarded = [
        'id'
    ];

    /**
     * Relation with the F22 form
     * @return [type] [description]
     */
    public function f22s()
    {
        return $this->hasMany('acempresarial\Models\F22');        
    }

    /**
     * Relation with the F29 form
     * @return [type] [description]
     */
    public function f29s()
    {
        return $this->hasMany('acempresarial\Models\F29');        
    }

    /**
     * Relation with company.
     * @return [type] [description]
     */
    public function company()
    {
        return $this->belongsTo('acempresarial\Models\Company');       
    }

}
