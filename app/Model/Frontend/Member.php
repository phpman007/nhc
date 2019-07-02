<?php

namespace App\Model\Frontend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Member extends Authenticatable
{
	use Notifiable;

	protected $table = 'members';

	protected $fillable = [
		'username',
		'email',
		'password',
		'nameTitle',
		'firstname',
		'lastname',
		'fullname',
		'personalId',
		'groupId',
		'seniorGroupId',
		'organizationGroupId',
		'ngoGroupId',
		'candidateStatus',
		'provinceId',
	];

	public function attach() {
		return $this->hasMany(Attachment::class, 'member_id');
	}
	public function detail() {
		return $this->hasOne(MemberDetail::class, 'memberId');
	}
}
