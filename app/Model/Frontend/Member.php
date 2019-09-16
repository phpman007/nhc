<?php

namespace App\Model\Frontend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Member extends Authenticatable
{
	use Notifiable,SoftDeletes;

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
		'status_accept',
		'last_step',
		'confirmed_at'
	];

	public function attach() {
		return $this->hasMany(Attachment::class, 'member_id');
	}
	public function detail() {
		return $this->hasOne(MemberDetail::class, 'memberId');
	}

	public function electioonVote() {
		return $this->hasMany(ElectionsVote::class, 'memberId');
	}
	public function getGroup() {
		if($this->groupId == 1) {
			return "ผู้ทรงคุณวุฒิ";
		} elseif($this->groupId == 2) {
			return "";
		} else {
			return "ผู้แทนองค์กรภาคเอกชน";
		}
	}


	public function getSubGroup() {
		if($this->groupId == 1) {
			$table = "senior_groups";
			$field = "seniorGroupId";
		} elseif($this->groupId == 2) {
			$table = "";
			$field = "";
		} else {
			$table = "ngo_groups";
			$field = "ngoGroupId";
		}

		$get =  \DB::table($table)->where('id', $this->{$field})->first();
		return $get != null ? $get->groupName : 'ไม่พบข้อมูล';
	}
	public function getAvatar()
	{
		if($this->groupId == 1) {
			return $this->attach()->where('use_is', 'personal_photo')->where('status', 1)->first()->path;
		} else {
			return $this->attach()->where('use_is', 'personal_photo')->where('status', 1)->first()->path;
		}

	}
}
