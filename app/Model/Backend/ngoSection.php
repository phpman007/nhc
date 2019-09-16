<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;
use App\Model\Frontend\MemberDetail;

class ngoSection extends Model
{
    protected $table='ngo_sections';

    public function detail() {
		return $this->hasMany(MemberDetail::class, 'provinceId','provinceId');
    }
}
