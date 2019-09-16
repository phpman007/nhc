<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class Province2 extends Model
{
    protected $table='provinces';

    public function member() {
		return $this->hasMany(Member::class, 'provinceId', 'province_code');
	}
}
