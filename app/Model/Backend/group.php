<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table='groups';

    public function members()
    {
        return $this->hasMany('App\Model\Backend\member');
    }
}
