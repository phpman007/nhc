<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class GroupOR extends Model
{
    protected $table='organization_groups';

    public function member() {
		return $this->hasMany(Member::class, 'organizationGroupId','id');
    }
}
