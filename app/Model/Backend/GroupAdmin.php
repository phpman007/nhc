<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class GroupAdmin extends Model
{
    protected $table = "groupadmin";

    protected $fillable = [
          'name'
   ];
}
