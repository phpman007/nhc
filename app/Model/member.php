<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table='members';

    public function attach() {
		return $this->hasMany(Attachment::class, 'member_id');
    }

	public function detail() {
		return $this->hasOne(MemberDetail::class, 'memberId');
    }
}
