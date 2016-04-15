<?php

namespace acempresarial\Models;

use Illuminate\Database\Eloquent\Model;

class F22 extends Model
{
     protected $guarded = [
        'id'
    ];

     public function cte()
    {
        return $this->belongsTo('acempresarial\Models\Cte');
    }
}
