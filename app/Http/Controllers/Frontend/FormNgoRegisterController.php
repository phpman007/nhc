<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class FormNgoRegisterController extends Controller
{
      protected $view = 'form-ngo-register';

      public function formView($step) {

            if($step != 1 && !Auth::check()) {
                  // return Redirect::to('form-professional/1');
            }

          return view('frontend.'. $this->view .'.form-'.$step, ['active' => $step]);
      }

      public function formPost($step, Request $request) {

            switch ($step) {
                  case 1:
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

            try {
                  if(Member::insert($dataSet)) {

                  $member = Member::where('personalId', $dataSet['personalId'])->first();

                  Auth::login($member, true);

                  return Redirect::to('form-professional/2');
            } else {
                  return Redirect::back();
            }

            } catch (Exception $e) {
                  $member = Member::where('personalId', $dataSet['personalId'])->first();

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
                  'vision'      =>'required',
                  'uploadBtn01' =>'required|max:1024',
                  'uploadBtn02' =>'required|max:1024',
                  'uploadBtn03' =>'required|max:1024',
            ]);

            $dataSet = $request->only(['vision']);

            $mmember = Auth::user()->detail;

            $mmember->update($dataSet);

            $attach = $request->only(['uploadBtn01' ,'uploadBtn02', 'uploadBtn03']);


            if($request->hasFile('uploadBtn01')) {
                  if($attach['uploadBtn01']->isValid()) {
                       $type                = $attach['uploadBtn01']->getClientOriginalExtension();
                       $oldNameUpload01     = $attach['uploadBtn01']->getClientOriginalName();
                       $newNameUpload01     = 'personal_card_'.date('YmdHis').".". $type;
                       $size                = $attach['uploadBtn01']->getSize();
                       $path                = 'uploads/professional/';
                       $uploadGroup         = '1';
                       $memberId            = Auth::user()->id;

                       // Upload File
                       $attach['uploadBtn01']->move($path, $newNameUpload01);
                       Attachment::where('upload_group', $uploadGroup)->where('member_id', $memberId)->update(['status' => 0]);
                       $attach = new Attachment();
                       $attach->path        = $path.$newNameUpload01;
                       $attach->fileName    = $oldNameUpload01;
                       $attach->newName     = $newNameUpload01;
                       $attach->status      = 1;
                       $attach->size        = $size;
                       $attach->type        = $type;
                       $attach->member_id   = $memberId;
                       $attach->upload_group = $uploadGroup;
                       $attach->save();

                       dump("Has upload", $oldNameUpload01, $attach);
                 }
            }
     }
}
