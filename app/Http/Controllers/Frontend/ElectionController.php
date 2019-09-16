<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth,Redirect, DB;
use App\Model\Frontend\Attachment;
use App\Model\Frontend\Log;
use App\Model\Frontend\Elections;
use App\Model\Frontend\ElectionsVote;
use Carbon\Carbon;
use App\Repository\ElectionMemberRepo;
class ElectionController extends Controller
{
	protected $electionMemberRepo;

	public function __construct(ElectionMemberRepo $electionMemberRepo)
	{
		$this->electionMemberRepo = $electionMemberRepo;
	}

	public function index(Elections $election)
	{
		if(!Auth::check()) {
			return redirect('/professional-login')->with('info', 'ท่านยังไม่ได้เข้าสู่ระบบ กรุณาเข้าสู่ระบบก่อนทำการโหวต');
		}

		if(!empty(Auth::user()->electioonVote)) {
			// return redirect('/')->with('info', 'ท่านได้ทำการโหวตไปเรียบร้อยแล้ว');
		}

		if( !(Carbon::parse(config('time.vote.start_date'))  <= now() && Carbon::parse(config('time.vote.end_date')) >= now()) ) {
				return redirect('/')->with('info', 'ยังไม่ถึงวันที่กำหนด');
		}

		$candidate = $this->electionMemberRepo->getMember(auth()->user());


		return view('frontend.election.index', ['members' => $candidate]);
	}
	public function vote(Request $req)
	{

		if(!Auth::check()) {
			return redirect('/professional-login')->with('info', 'ท่านยังไม่ได้เข้าสู่ระบบ กรุณาเข้าสู่ระบบก่อนทำการโหวต');
		}
		
		switch (Auth::user()->groupId) {
  	    	case '1':
  	    		$field = 'seniorGroupId';
  	    		break;
  		case '2':
  	    		$field = 'organizationGroupId';
    		    break;
  	    	case '3':
  	    		$field = 'ngoGroupId';
  		    break;
  	    	default:
  	    		$field = 'seniorGroupId';
  	    		break;
  	    	}
		$electionId = Elections::where('groupId', Auth::user()->groupId)->where($field, Auth::user()->{$field})->first()->id;
		foreach( $req->candidateNumber as $key => $val )
		{
			ElectionsVote::create([
				'memberId'		=>  Auth::user()->id
				,'electionId'	=>  $electionId
				,'voteTo'		=> $req->idMember[$key]
				,'point'		=> $req->number_score[$key]
		  ]);
		}
		return ['status' => true];
	}
}
