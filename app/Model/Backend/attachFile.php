<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class attachFile extends Model
{
    protected $table='attach_files';

    public function member() {
		return $this->belongsTo(Member::class, 'member_id','id');
	}
}
