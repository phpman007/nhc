<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class electionVote extends Model
{
    protected $table='election_votes';
    protected $primaryKey = 'id';
    protected $fillable = [
        'memberId',
        'voteTo',
        'point',
        'created_at',
        'updated_at'
    ];

    public function memberVoteTo() {
        return $this->hasOne(Member::class, 'id', 'voteTo');
    }

    public function member() {
        return $this->belongTo(Member::class, 'memberId', 'id');
    }

    public function election() {
        return $this->belongsTo(election::class, 'electionId', 'id');
    }

    // public function voteToJoin() {
    //     return $this->hasOne(Member::class, 'id', 'voteTo');
    // }
}
