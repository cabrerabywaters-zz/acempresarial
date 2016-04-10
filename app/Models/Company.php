<?php

namespace acempresarial\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
     protected $guarded = [
        'id'
    ];

     /**
     * The roles that belong to the user.
     */
    public function users()
    {
        return $this->belongsToMany('acempresarial\User');
    }
}
