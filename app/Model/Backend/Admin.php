<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{
      use Notifiable;
      use HasRoles;

      protected $table = 'users';
      protected $guard_name = 'admin';

      /**
       * The attributes that are mass assignable.
       *
       * @var array
       */
      protected $fillable = [
          'username', 'email', 'password', 'tel', 'position', 'permission', 'provinceId'
      ];

      /**
       * The attributes that should be hidden for arrays.
       *
       * @var array
       */
      protected $hidden = [
          'password', 'remember_token',
      ];

      /**
       * The attributes that should be cast to native types.
       *
       * @var array
       */
      protected $casts = [
          'email_verified_at' => 'datetime',
      ];
      public function role() {
            return $this->belongsTo(\Spatie\Permission\Models\Role::class, 'permission');
      }
    public function detail() {
		return $this->hasMany(MemberDetail::class, 'adminId','id');
    }
}
