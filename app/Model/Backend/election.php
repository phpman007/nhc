<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class election extends Model
{
    protected $table='elections';

    public function electionpoint() {
        return $this->hasMany(electionPoint::class, 'electionId', 'id');
    }
}
