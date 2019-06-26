<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Frontend\Member;
use App\Model\Frontend\Attachment;
use Hash, Carbon\Carbon, Redirect, Auth, Exception;

class FormProfessorController extends Controller
{
    public function formView($step) {

    	if($step != 1 && !Auth::check()) {
    		return Redirect::to('form-professional/1');
    	}

	    return view('frontend.form-professional.form-'.$step, ['active' => $step]);
    }

    public function formPost($step, Request $request) {

    	switch ($step) {
    		case 1:
                  Auth::logout();
    			return $this->stepOne($request);
    			break;
    		case 2:
    			return $this->stepTwo($request);
    			break;
    		case 3:
    			return $this->stepThree($request);
    			break;
    		case 4:
    			return $this->stepFour($request);
    			break;
            case 5:
    			return $this->stepFive($request);
    			break;
            case 6:
    			return $this->stepSix($request);
    			break;
    		default:
    			// code...
    			break;
    	}


    }


    public function stepOne(Request $request) {

    	$request->validate([
    		'personalId' 				=> 'required|min:12|max:13',
    		'email' 					=> 'required|email',
    		'password'					=> 'required|min:6|max:20|confirmed',
    		'password_confirmation'		=> 'required|min:6|max:20'
    	]);

    	$dataSet =  $request->only(['personalId', 'email', 'password']);

    	$dataSet['password'] = Hash::make($dataSet['password']);

    	$dataSet['username'] = $dataSet['email'];

    	$dataSet['created_at'] = now();

    	$dataSet['updated_at'] = now();

    	$dataSet['groupId'] = 1;

      $hasMember = Member::where('personalId', $dataSet['personalId'])->where('groupId', 1)->first();
      if($hasMember) {
            if(Hash::check($request->password, $hasMember->password)) :
                  Auth::login($hasMember, true);
            else:
                  return back()->withInput()->withErrors(['personalId'=>'มีข้อมูลอยู่ในระบบแล้ว รหัสผ่านไม่ถูกต้อง']);
            endif;

            if(Auth::check()) {
                  return Redirect::to('form-professional/2');
            }
      }

    	try {
    		if(Member::insert($dataSet)) {

	    		$member = Member::where('personalId', $dataSet['personalId'])->first();

	    		Auth::login($member, true);

	    		return Redirect::to('form-professional/2');
	    	} else {
	    		return Redirect::back();
	    	}

    	} catch (Exception $e) {
    		$member = Member::where('personalId', $dataSet['personalId'])->where('groupId', 1)->first();

    		if(Hash::check($member->password, $dataSet['password'])) :
    			Auth::login($member, true);
    		endif;

    		if(Auth::check()) {
    			return Redirect::to('form-professional/2');
    		}
	    	return Redirect::back();
    	}
    }

    public function stepTwo(Request $request) {

    	$request->validate([
    		'nameTitle'		=> 'required|max:100',
    		'firstname'		=> 'required|max:50',
    		'lastname'		=> 'required|max:50',
    	]);

    	$member = Auth::user();

    	$dataSet = $request->only(['nameTitle', 'firstname', 'lastname']);

    	$dataSet['created_at'] = now();

    	$dataSet['updated_at'] = now();

    	$member->update($dataSet);

    	$dataSet = array('thaiStatus' => 0, 'ageQualify' => 0, 'enoughAbility' => 0, 'noDrug' => 0, 'noCriminal' => 0, 'noJail' => 0, 'noNHCworking' => 0, 'enoughExperience' => 0, 'enoughProfile' => 0);

		$dataSet = array_merge($dataSet, $request->except(['_token', 'nameTitle', 'firstname', 'lastname', 'button', 'date']));

    	foreach ($dataSet as $key => $value) :
    		if($value == true) {
    				$dataSet[$key] = 1;
    		}
    	endforeach;


    	try {
    		if(!empty($member->detail)) {
    			$member->detail->update($dataSet);
    		} else {
    			$member->detail()->firstOrCreate($dataSet);
    		}
    		return Redirect::to('form-professional/3');

    	} catch (Exception $e) {

    	}
    	return Redirect::back();
    }

    public function stepThree(Request $request) {

    	Auth::user()->seniorGroupId = $request->seniorGroupId;

    	Auth::user()->save();

    	return Redirect::to('form-professional/4');
    }

    public function stepFour(Request $request) {

    	$request->validate([
    		      'no' 			   => 'required|max:11',
			'moo' 		   => 'required|max:151',
			'soi' 		   => 'required|max:101',
			'street' 		   => 'required|max:101',
			'subDistrictId'      => 'required',
			'districtId'         => 'required',
                  'dateOfBirth'        => 'required',
			'provinceId'         => 'required',
			'zipCode' 		   => 'required',
			'tel'                => 'required|min:7|max:11',
			'mobile' 		   => 'required|min:9|max:11',
			'graduated1' 	   => 'required',
			'faculty1' 		   => 'required',
			'nowWork' 		   => 'required',
			'nowWorkPlace' 	   => 'required',
			'nowRole' 		   => 'required',
			'pastWork1'          => 'required',
			'pastOrganization1'  => 'required',
			'time1' 		   =>'required',
			'importantMemo'      =>'required'
    	]);

      $mmember = Auth::user()->detail;
      $dataSet = $request->except(['_token']);

      $dataSet['dateOfBirth'] = $this->dateThaiToDefault($dataSet['dateOfBirth']);
      $mmember->update($dataSet);

      return Redirect::to('form-professional/5');
    }

    public function stepFive(Request $request) {

          $request->validate([
                'vision'      =>'required'
          ]);

          $dataSet = $request->only(['vision']);

          $mmember = Auth::user()->detail;

          $mmember->update($dataSet);

          $attachFile = $request->only(['uploadBtn01' ,'uploadBtn02', 'uploadBtn03']);

          $memberId = Auth::user()->id;
          $uploadGroup = 1;
          if($request->hasFile('uploadBtn01')) {
                if($attachFile['uploadBtn01']->isValid()) {

                     $fileUpload1 = \Helper::uploadFile($attachFile['uploadBtn01'], 'proffessional');
                     Attachment::where('upload_group', $uploadGroup)->where('use_is', 'copy_personal_card')->where('member_id', $memberId)->update(['status' => 0]);
                     $attach = new Attachment();
                     $attach->path        = $fileUpload1['path'];
                     $attach->fileName    = $fileUpload1['oldName'];
                     $attach->newName     = $fileUpload1['filename'];
                     $attach->status      = 1;
                     $attach->size        = $fileUpload1['size'];
                     $attach->type        = $fileUpload1['type'];
                     $attach->member_id   = $memberId;
                     $attach->upload_group = $uploadGroup;
                     $attach->use_is      = 'copy_personal_card';

                     // dd($attach);
                     $attach->save();

               }
          }
          if($request->hasFile('uploadBtn02')) {
                if($attachFile['uploadBtn02']->isValid()) {

                     $fileUpload1 = \Helper::uploadFile($attachFile['uploadBtn02'], 'proffessional');
                     Attachment::where('upload_group', $uploadGroup)->where('use_is', 'personal_photo')->where('member_id', $memberId)->update(['status' => 0]);
                     $attach = new Attachment();
                     $attach->path        = $fileUpload1['path'];
                     $attach->fileName    = $fileUpload1['oldName'];
                     $attach->newName     = $fileUpload1['filename'];
                     $attach->status      = 1;
                     $attach->size        = $fileUpload1['size'];
                     $attach->type        = $fileUpload1['type'];
                     $attach->member_id   = $memberId;
                     $attach->upload_group = $uploadGroup;
                     $attach->use_is      = 'personal_photo';

                     // dd($attach);
                     $attach->save();

               }
          }

          if($request->hasFile('uploadBtn03')) {
                if($attachFile['uploadBtn03']->isValid()) {

                     $fileUpload1 = \Helper::uploadFile($attachFile['uploadBtn03'], 'proffessional');
                     Attachment::where('upload_group', $uploadGroup)->where('use_is', 'document1')->where('member_id', $memberId)->update(['status' => 0]);
                     $attach = new Attachment();
                     $attach->path        = $fileUpload1['path'];
                     $attach->fileName    = $fileUpload1['oldName'];
                     $attach->newName     = $fileUpload1['filename'];
                     $attach->status      = 1;
                     $attach->size        = $fileUpload1['size'];
                     $attach->type        = $fileUpload1['type'];
                     $attach->member_id   = $memberId;
                     $attach->upload_group = $uploadGroup;
                     $attach->use_is      = 'document1';

                     // dd($attach);
                     $attach->save();

               }
          }
         return Redirect::to('form-professional/6');
   }

   public function stepSix(Request $request)
   {
         $request->validate(['g-recaptcha-response' => 'recaptcha']);

         return back()->with('success', true);
   }
}
