<?php
namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class Logmail extends Model
{
    protected $table='logmail';
    protected $fillable = [
        'member_id',
        'user_id',
        'email',
        'send_at',
        'status'
    ];
}
