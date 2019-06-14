<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class gender extends Model
{
    protected $table='genders';

    public function memberDetails()
    {
        return $this->hasMany('App\Model\Backend\memberDetail');
    }
}
