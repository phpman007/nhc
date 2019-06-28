<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class MemberDetail extends Model
{
    protected $table='member_details';

    public function member()
    {
        return $this->hasOne(Member::class, 'id', 'memberId');
    }

    public function statuses()
    {
        return $this->belongsTo(Statuses::class, 'statusId', 'id');
    }

    // public function province()
    // {
    //     return $this->hasOne(Province::class, 'district_code', 'subDistrictId');
    // }

    // public function addressTypes()
    // {
    //     return $this->belongsTo('App\Model\Backend\addressType');
    // }

    // public function genders()
    // {
    //     return $this->belongsTo('App\Model\Backend\gender');
    // }

    // public function admin()
    // {
    //     return $this->hasMany('App\Model\Backend\Admin');
    // }

    // public function reasons()
    // {
    //     return $this->hasMany('App\Model\Backend\reason');
    // }




}
