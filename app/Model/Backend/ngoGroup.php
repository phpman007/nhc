<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class ngoGroup extends Model
{
    protected $table='ngo_groups';

    public function members()
    {
        return $this->hasMany('App\Model\Backend\member');
    }


}
