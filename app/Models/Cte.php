<?php

namespace acempresarial\Models;

use Illuminate\Database\Eloquent\Model;

class Cte extends Model
{
     protected $guarded = [
        'id'
    ];

    public function f22s()
    {
        return $this->hasMany('acempresarial\Models\F22');        
    }

    public function f29s()
    {
        return $this->hasMany('acempresarial\Models\F29');        
    }

    public function company()
    {
        return $this->belongsTo('acempresarial\Models\Company');       
    }
}
