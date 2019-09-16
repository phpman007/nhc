<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class Modules extends Model
{

	protected $fillable = [
		'module_name',
		'module_label',
		'detail',
		'created_by',
		'updated_by',
		'active'
	];
    public function parents()
    {
	    return $this->hasMany(Modules::class, 'parent_id');
    }

    public function master()
    {
	    return $this->hasMany(Modules::class, 'id');
    }
}
