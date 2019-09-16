<?php

namespace App\Model\Frontend;

use Illuminate\Database\Eloquent\Model;

class ElectionsVote extends Model
{
    protected $table = "election_votes";


	protected $fillable = ['memberId',
					'electionId',
					'voteTo',
					'point'];

}
