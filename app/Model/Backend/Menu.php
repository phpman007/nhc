<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';
    protected $primaryKey = 'id';
    protected $fillable  = [
        'menu_title',
        'menu_icon',
        'menu_link',
        'menu_type',
        'menu_target',
        'menu_parent',
        'menu_link_type',
        'menu_sort',
        'menu_state',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by'
    ];
    public function parent() {
		return $this->hasMany('App\Model\Backend\Menu', 'menu_parent','id');
    }
    public function getLink() {

        if($this->menu_link_type == 'internal'){
            $link = url($this->menu_link);
        }else{
            $link = $this->menu_link;
        }
		return $link ;
    }
}
