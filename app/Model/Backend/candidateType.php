<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class candidateType extends Model
{
    protected $table='candidate_types';

    public function members()
    {
        return $this->hasMany('App\Model\Backend\member');
    }
}
