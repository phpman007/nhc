<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class electionPoint extends Model
{
    protected $table='election_points';

    protected $primaryKey = 'id';
    protected $fillable = [
        'electionId',
        'memberId',
        'memberPoint',
    ];

    // public function detail() {
    //     return $this->belongsTo(MemberDetail::class, 'memberId', 'memberId');
    // }

    public function election() {
        return $this->belongsTo(election::class, 'electionId', 'id');
    }

    public function member() {
        return $this->belongsTo(Member::class, 'memberId', 'id');
    }
}
