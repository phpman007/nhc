<?php

namespace App\Model\Frontend;

use Illuminate\Database\Eloquent\Model;

class Elections extends Model
{
    protected $table = "elections";

    public function member($id) {

	    switch ($this->groupId) {
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


	    return $this->hasMany(Member::class, 'groupId', 'groupId')->where($field, $id);
    }
}
