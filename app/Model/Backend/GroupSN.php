<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class GroupSN extends Model
{
    protected $table='senior_groups';

    public function member() {
		return $this->hasMany(Member::class, 'seniorGroupId');
    }
}
