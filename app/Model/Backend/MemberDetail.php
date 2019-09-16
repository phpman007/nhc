<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class memberDetail extends Model
{
    protected $table='member_details';

    public function member() {
        return $this->belongsTo(Member::class, 'member_id');
    }

    public function statuses() {
        return $this->belongsTo(Statuses::class, 'statusId','id');
    }

    public function users() {
        return $this->belongsTo(Admin::class, 'adminId','id');
    }

    public function subdistrict() {
        return $this->belongsTo(Province2::class, 'subDistrictId', 'district_code');
    }

    public function district() {
        return $this->belongsTo(Province2::class, 'districtId', 'amphoe_code');
    }

    public function province() {
        return $this->belongsTo(Province2::class, 'provinceId', 'province_code');
    }



}
