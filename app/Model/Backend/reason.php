<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class reason extends Model
{
    protected $table='reasons';

    public function memberDetails()
    {
        return $this->belongsTo('App\Model\Backend\memberDetail');
    }


}
