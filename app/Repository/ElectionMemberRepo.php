<?php
namespace App\Repository;

use App\Model\Frontend\Member;

class ElectionMemberRepo implements ElectionMemberInterface
{

    protected $member;

    public function __construct(Member $member)
    {

    }
    /**
     * getMember
     *
     * @param  mixed $groupId
     * @param  mixed $subGroup
     *
     * @return Member
     */
    public function getMember(Member $member)
    {
        switch ($member->groupId) {
            case '1':
                $field = 'seniorGroupId';
                break;
        case '2':
                $field = 'organizationGroupId';
              break;
            case '3':
                $field = 'ngoGroupId';
            break;
            default:
                $field = 'seniorGroupId';
                break;
            }

        return Member::where('groupId', $member->groupId)
        ->where('status_accept', 1)
        ->where($field, $member->{$field})
        ->with('detail')
        ->whereHas('detail', function($q) {
            $q->where('fixStatus', 1);
        })
        ->whereNotNull("candidateNumber")
        ->OrderBy('candidateNumber')
        ->get();
    }
}
