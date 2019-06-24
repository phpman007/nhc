<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class addressType extends Model
{
    protected $table='address_types';

    public function memberDetails()
    {
        return $this->hasMany('App\Model\Backend\memberDetail');
    }
}
