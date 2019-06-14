<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class seniorGroup extends Model
{
    protected $table='senior_groups';

    public function members()
    {
        return $this->hasMany('App\Model\Backend\member');
    }
}
