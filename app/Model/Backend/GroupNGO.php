<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class GroupNGO extends Model
{
    protected $table='ngo_groups';

    public function member() {
		return $this->hasMany(Member::class, 'ngoGroupId','id');
    }
}
