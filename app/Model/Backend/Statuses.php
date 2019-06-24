<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class Statuses extends Model
{
    protected $table ='statuses';

    public function memberDetails()
    {
        return $this->hasMany(memberDetails::class, 'statusId', 'id');
    }
}
