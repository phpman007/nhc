<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends Model
{
    use SoftDeletes;
    protected $table='members';

    public function memberDetails()
    {
        return $this->hasOne(memberDetails::class, 'id', 'memberId');
    }

    // public function groups()
    // {
    //     return $this->belongsTo('App\Model\Backend\group');
    // }

    // public function seniorGroups()
    // {
    //     return $this->belongsTo('App\Model\Backend\seniorGroup');
    // }

    // public function organizationGroups()
    // {
    //     return $this->belongsTo('App\Model\Backend\organizationGroup');
    // }

    // public function ngoGroups()
    // {
    //     return $this->belongsTo('App\Model\Backend\ngoGroup');
    // }

    // public function candidateTypes()
    // {
    //     return $this->belongsTo('App\Model\Backend\candidateType');
    // }

}
