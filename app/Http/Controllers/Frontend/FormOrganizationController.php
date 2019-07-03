<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Frontend\Member;
use App\Model\Frontend\Attachment;
use Auth,Hash, Redirect;
class FormOrganizationController extends Controller
{

      protected $view = 'form-organize';

      public function formView($step) {
            if($step > 2 ) {
                  if(!Auth::check())
                        return Redirect::to('form-organization/2');
            }

            return view('frontend.'. $this->view .'.form-'.$step, ['active' => $step]);
      }

      public function formPost($step, Request $request) {

            switch ($step) {
                  case 1:
                  Auth::logout();
                  return $this->stepOther($request);
                  break;
                  case 2:
                  return $this->stepOne($request);
                  break;
                  case 3:
                  return $this->stepTwo($request);
                  break;
                  case 4:
                  return $this->stepThree($request);
                  break;
                  case 5:
                  return $this->stepFour($request);
                  break;
                  case 6:
                  return $this->stepFive($request);
                  break;
                  case 7:
                  return $this->stepSix($request);
                  break;
                  default:
                  // code...
                  break;
            }


      }

      public function stepOther(Request $request) {
            $request->validate([
                  'personalId' 				=> 'required|min:12',
                  'provinceId'                        => 'required',
                  'email' 					=> 'required|email|unique:members',
                  'password'					=> 'required|min:6|max:20|confirmed',
                  'password_confirmation'		      => 'required|min:6|max:20',
                  'uploadBtn01'                       => 'required',
                  // 'g-recaptcha-response'              => 'recaptcha'
            ]);

            $dataSet =  $request->only(['personalId', 'email', 'password', 'provinceId']);

            $dataSet['personalId'] = str_replace('-', '', $dataSet['personalId']);

            $dataSet['password'] = Hash::make($dataSet['password']);

            $dataSet['username'] = $dataSet['email'];

            $dataSet['created_at'] = now();

            $dataSet['updated_at'] = now();

            $dataSet['groupId'] = 3;


            try {
                  if(Member::insert($dataSet)) {
                        $member = Member::where('personalId', $dataSet['personalId'])->where('groupId', $dataSet['groupId'])->first();

                        if($request->hasFile('uploadBtn01')) {
                              if($fileUpload = \Helper::uploadFile($request->uploadBtn01, 'personal_card')) {
                                    Attachment::where('member_id', Auth::user()->id)->where('use_is', 'personal_card')->update(['status' => 0]);

                                    $attach = new Attachment;
                                    $attach->fileName       = $fileUpload['oldName'];
                                    $attach->path           = $fileUpload['path'];
                                    $attach->newName        = $fileUpload['filename'];
                                    $attach->status         = 1;
                                    $attach->size           = $fileUpload['size'];
                                    $attach->type           = $fileUpload['type'];
                                    $attach->member_id      = $member->id;
                                    $attach->upload_group   = 2;
                                    $attach->use_is         = 'personal_card';
                                    $attach->save();

                              }
                        }

                  } else {
                        return Redirect::back();
                  }

            } catch (\Exception $e) {

                  return back()->errors(['error'=> $e->getMessage()]);
            }
            return back()->with('success' ,'ลงทะเบียนเรียบร้อยแล้ว');
      }

      public function stepOne(Request $request) {


            $request->validate([
                  'personalId' 				=> 'required|min:12',
                  'provinceId'                        => 'required',
                  'email' 					=> 'required|email',
                  'password'					=> 'required|min:6|max:20|confirmed',
                  'password_confirmation'		     => 'required|min:6|max:20'
            ]);

            $dataSet =  $request->only(['personalId', 'email', 'password', 'provinceId']);

            $dataSet['personalId'] = str_replace('-', '', $dataSet['personalId']);

            $dataSet['password'] = Hash::make($dataSet['password']);

            $dataSet['username'] = $dataSet['email'];

            $dataSet['created_at'] = now();

            $dataSet['updated_at'] = now();

            $dataSet['groupId'] = 2;

            $hasMember = Member::where('personalId', $dataSet['personalId'])->where('groupId', $dataSet['groupId'])->first();
            if($hasMember) {
                  if(Hash::check($request->password, $hasMember->password)) :
                        Auth::login($hasMember, true);
                  else:
                        return back()->withErrors(['personalId'=>'มีข้อมูลอยู่ในระบบแล้ว รหัสผ่านไม่ถูกต้อง']);
                  endif;

                  if(Auth::check()) {
                        return Redirect::to('form-organization/3');
                  }
            }

            try {
                  if(Member::insert($dataSet)) {

                        $member = Member::where('personalId', $dataSet['personalId'])->first();

                        Auth::login($member, true);

                        return Redirect::to('form-organization/3');
                  } else {
                        return Redirect::back();
                  }

            } catch (\Exception $e) {

                  return Redirect::back()->withInput();
            }
      }

      public function stepTwo(Request $request) {
            $request->validate([
                  'nameTitle'		=> 'required|max:100',
                  'firstname'		=> 'required|max:50',
                  'lastname'		=> 'required|max:50',
                  'thaiStatus'      => 'required',
                  'ageQualify'      => 'required',
                  'enoughAbility'   => 'required',
                  'noDrug'          => 'required',
                  'noCriminal'      => 'required',
                  'noJail'          => 'required'
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

            unset($dataSet['date_create']);
            try {
                  if(!empty($member->detail)) {
                        $member->detail->update($dataSet);
                  } else {
                        $member->detail()->create($dataSet);
                  }
                  return Redirect::to('form-organization/4');

            } catch (Exception $e) {

            }
            return Redirect::back();
      }

      public function stepThree(Request $request) {
            if(!Auth::user()->attach()->where('status', 1)->where('use_is', 'government_official_card')->first()) {
                  $request->validate([
                        'file_ref'          => 'required'
                  ]);
            }


            Auth::user()->organizationGroupId = $request->organizationGroupId;

            if($request->hasFile('file_ref')) {
                  if($fileUpload = \Helper::uploadFile($request->file_ref, 'government_official_card')) {
                        Attachment::where('member_id', Auth::user()->id)->where('use_is', 'government_official_card')->update(['status' => 0]);

                        $attach = new Attachment;
                        $attach->fileName       = $fileUpload['oldName'];
                        $attach->path           = $fileUpload['path'];
                        $attach->newName        = $fileUpload['filename'];
                        $attach->status         = 1;
                        $attach->size           = $fileUpload['size'];
                        $attach->type           = $fileUpload['type'];
                        $attach->member_id      = Auth::user()->id;
                        $attach->upload_group   = 2;
                        $attach->use_is         = 'government_official_card';
                        $attach->save();

                  }
            }
            Auth::user()->save();

            return Redirect::to('form-organization/5');
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
                  'tel'                => 'required|min:7',
                  'mobile' 		   => 'required|min:9',
                  'graduated1' 	   => 'required',
                  'faculty1' 		   => 'required',
                  'pastWork1'          => 'required',
                  'pastOrganization1'  => 'required',
                  'time1' 		   =>'required',
                  'dateOfBirth'           => 'required',
                  'portfolio'             => 'required',
                  'pastWork1'             => 'required',
                  'pastOrganization1'     => 'required',
                  'time1'                 => 'required',
                  'roleTimeLeft'          => 'required',
                  'startDate'             => 'required',
                  'endDate'               => 'required'
                  // 'importantMemo'      =>'required'
            ]);

            $mmember          = Auth::user()->detail;
            $dataSet          = $request->except(['_token']);
            $dataSet['tel']   = str_replace('-', '', $dataSet['tel']);
            $dataSet['mobile']   = str_replace('-', '', $dataSet['mobile']);
            $dataSet['dateOfBirth'] = $this->dateThaiToDefault($dataSet['dateOfBirth']);
            $dataSet['startDate'] = $this->dateThaiToDefault($dataSet['startDate']);
            $dataSet['endDate'] = $this->dateThaiToDefault($dataSet['endDate']);

            try {
                  $mmember->update($dataSet);
            } catch (\Exception $e) {
                  return back()->withErrors(['error', $e->getMessage()])->withInput();
            }

            return Redirect::to('form-organization/6');
      }

      public function stepFive(Request $request) {

            $request->validate([
                  'vision'      =>'required'
            ]);

            $dataSet = $request->only(['vision']);

            $mmember = Auth::user()->detail;

            $mmember->update($dataSet);

            return Redirect::to('form-organization/7');
      }
      public function stepSix(Request $request) {
            $request->validate(['g-recaptcha-response' => 'recaptcha']);

            return back()->with('success', true);
      }
}
