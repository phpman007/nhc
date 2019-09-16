<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
class member extends Model
{
	use SoftDeletes;
    protected $table='members';

    public function attach() {
		return $this->hasMany(Attachment::class, 'member_id','id');
	}

	public function detail() {
		return $this->hasOne(MemberDetail::class, 'memberId','id');
	}

	public function groupSN() {
		return $this->belongsTo(GroupSN::class, 'seniorGroupId','id');
	}

	public function groupOR() {
		return $this->belongsTo(GroupOR::class, 'organizationGroupId','id');
	}

	public function groupNGO() {
		return $this->belongsTo(GroupNGO::class, 'ngoGroupId','id');
    }

    public function points() {
        return $this->hasOne(electionPoint::class, 'memberId', 'id');
    }

    public function voteTo() {
        return $this->hasMany(electionVote::class, 'id', 'voteTo');
    }

    public function votes() {
        return $this->hasMany(electionVote::class, 'memberId', 'id');
    }

    // public function subdistrict() {
    //     return $this->belongsTo(Province2::class, 'subDistrictId', 'district_code');
    // }

    // public function district() {
    //     return $this->belongsTo(Province2::class, 'districtId', 'amphoe_code');
    // }

    public function province() {
        return $this->belongsTo(Province2::class, 'provinceId', 'province_code');
    }

}
