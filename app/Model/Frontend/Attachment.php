<?php

namespace App\Model\Frontend;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    protected $table = "attach_files";
    protected $fillable = ['status'];
}
