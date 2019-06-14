<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class organizationGroup extends Model
{
    protected $table='organization_groups';

    public function members()
    {
        return $this->hasMany('App\Model\Backend\member');
    }
}
