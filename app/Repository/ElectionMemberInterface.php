<?php
namespace App\Repository;
use App\Model\Frontend\Member;
interface ElectionMemberInterface {
    
    /**
     * getMember
     *
     * @return void
     */
    public function getMember(Member $member);
}