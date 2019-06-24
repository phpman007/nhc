<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class status extends Model
{
    protected $table='statuses';

    public function memberDetails()
    {
        return $this->hasMany('App\Model\Backend\memberDetail');
    }
}
