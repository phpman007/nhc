<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class province extends Model
{
    protected $table='provinces';

    public function memberDetails()
    {
        return $this->hasMany('App\Model\Backend\memberDetail');
    }
}
