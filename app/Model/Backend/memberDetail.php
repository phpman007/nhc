<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class memberDetail extends Model
{
    protected $table='member_details';

    public function member()
    {
        return $this->hasOne('App\Model\Backend\member');
    }

    public function addressTypes()
    {
        return $this->belongsTo('App\Model\Backend\addressType');
    }

    public function genders()
    {
        return $this->belongsTo('App\Model\Backend\gender');
    }

    public function admin()
    {
        return $this->hasMany('App\Model\Backend\Admin');
    }

    public function reasons()
    {
        return $this->hasMany('App\Model\Backend\reason');
    }

    public function statuses()
    {
        return $this->belongsTo('App\Model\Backend\status');
    }

    public function provinces()
    {
        return $this->belongsTo('App\Model\Backend\provinces');
    }
}
