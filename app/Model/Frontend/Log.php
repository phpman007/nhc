<?php

namespace App\Model\Frontend;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $table = 'log';

	protected $fillable = [
		'ipAddress',
		'action',
		'dt',
		'members',
	];
}
