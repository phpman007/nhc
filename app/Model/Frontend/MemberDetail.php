<?php

namespace App\Model\Frontend;

use Illuminate\Database\Eloquent\Model;

class MemberDetail extends Model
{
	protected $table = "member_details";

	protected $fillable = [
		'memberId',
		'docId',
		'thaiStatus',
		'ageQualify',
		'enoughAbility',
		'noDrug',
		'noCriminal',
		'noJail',
		'noNHCworking',
		'enoughExperience',
		'enoughProfile',
		'dateOfBirth',
		'workPlaceName',
		'genderId',
		'addressType',
		'no',
		'legalStastus',
		'byNgo',
		'moo',
		'soi',
		'street',
		'subDistrictId',
		'districtId',
		'provinceId',
		'zipCode',
		'tel',
		'mobile',
		'graduated1',
		'faculty1',
		'graduated2',
		'faculty2',
		'graduated3',
		'faculty3',
		'graduated4',
		'faculty4',
		'graduated5',
		'faculty5',
		'nowWork',
		'nowWorkPlace',
		'nowRole',
		'pastWork1',
		'pastOrganization1',
		'time1',
		'pastWork2',
		'pastOrganization2',
		'time2',
		'pastWork3',
		'pastOrganization3',
		'time3',
		'importantMemo',
		'vision',
		'statusId',
		'adminId',
		'reason',
		'provinceMemberID',
		'section',
		'organizationGroupId',
		'officialId',
		'portfolio',
		'roleTimeLeft',
		'startDate',
		'endDate',
		'ngoName',
		'ngoStatus',
		'ngoNo',
		'ngoMoo',
		'ngoSoi',
		'ngoStreet',
		'ngoSubDistrictID',
		'ngoDistrictID',
		'ngoProvincetID',
		'ngoZipCode',
		'ngoStartDate',
		'ngoQtyMember',
		'ngoObjective',
		'activity1',
		'detail1',
		'activity2',
		'detail2',
		'suggestNameTitle',
		'suggestFullname',
		'suggestPosition',
		'personalIdCard',
		'memberImg',
		'sorChor1',
		'ngoConfirmDoc',
		'ngoObjectiveDoc',
		'ngoActivityDoc',
		'ngoOrderDoc',
		'ngoPresidentIdCard',
		'ngoSignatureDoc',
		'ngoApproveDoc',
		'zipFile',
	];

	public function subdistrict() {
		return $this->belongsTo(Province::class, 'subDistrictId', 'district_code');
	}
	public function district() {
		return $this->belongsTo(Province::class, 'districtId', 'amphoe_code');
	}
	public function province() {
		return $this->belongsTo(Province::class, 'provinceId', 'province_code');
	}
}
