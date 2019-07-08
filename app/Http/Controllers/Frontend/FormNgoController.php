<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth,Redirect;
use App\Model\Frontend\Attachment;
class FormNgoController extends Controller
{
      protected $view = 'form-ngo';

      public function formView($step) {
            if($step == 1) {
                  // Auth::logout();
            }

            if($step != 1 && !Auth::check()) {
                  // return Redirect::to('form-ngo/1');
            }

          return view('frontend.'. $this->view .'.form-'.$step, ['active' => $step]);
      }

      public function formPost($step, Request $request) {

            switch ($step) {
                  case 1:

                        if(@Auth::user()->groupId != 4){
                              Auth::logout();
                        }

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
                    // 'personalId' 				=> 'required|min:12|max:13',
                    // 'email' 					=> 'required|email',
                    // 'password'					=> 'required|min:6|max:20|confirmed',
                    // 'password_confirmation'		=> 'required|min:6|max:20',
                    'thaiStatus'          => 'required',
                    'ageQualify'          => 'required',
                    'enoughAbility'       => 'required',
                    'noDrug'              => 'required',
                    'noCriminal'          => 'required',
                    'noJail'              => 'required',
              ]);




            $dataSet = $request->all();

            // Auth::user()->update($request->all());

            Auth::user()->detail->update($dataSet);

            return redirect('form-ngo/2');
      }

      public function stepTwo(Request $request) {

                        $dataSet = $request->all();

                        // Auth::user()->update($request->all());
                        // dd($dataSet);
                        Auth::user()->update($dataSet);

                        return redirect('form-ngo/3');

      }

      public function stepThree(Request $request) {
            $request->validate([
                  'no' 			   => 'required|max:7',
                  'moo' 		   => 'required|max:151',
                  'soi' 		   => 'required|max:101',
                  'street' 		   => 'required|max:101',
                  'subDistrictId'      => 'required',
                  'districtId'         => 'required',
                  'dateOfBirth'        => 'required',
                  'provinceId'         => 'required',
                  'zipCode' 		   => 'required',
                  'tel'                => 'required|min:9|max:10',
                  'mobile' 		   => 'required|min:10|max:11',
                  'graduated1' 	   => 'required',
                  'faculty1' 		   => 'required',
                  'nowWork' 		   => 'required',
                  'nowWorkPlace' 	   => 'required',
                  'nowRole' 		   => 'required',
                  'pastWork1'          => 'required',
                  'pastOrganization1'  => 'required',
                  'time1' 		   =>'required',
                  'pastOrganization1'     =>'required',
                  'importantMemo'      =>'required'
            ]);
            $dataSet = $request->all();

            $dataSet['dateOfBirth'] = $this->dateThaiToDefault($dataSet['dateOfBirth']);
            Auth::user()->update($dataSet);

            Auth::user()->detail->update($dataSet);

            return Redirect::to('form-ngo/4');
      }

      public function stepFour(Request $request) {

            $rule = ['vision' => 'required'];
             $file1 = Auth::user()->attach()->where('status', 1)->where('use_is', 'copy_personal_card')->first();
             if(empty($file1)){
                   $rule['uploadBtn01'] = 'required|mimes:jpeg,pdf';
             }
             $file2 = Auth::user()->attach()->where('status', 1)->where('use_is', 'personal_photo')->first();
             if(empty($file2)){
                       $rule['uploadBtn02'] = 'required|mimes:jpeg,pdf';
            }
           $file3 = Auth::user()->attach()->where('status', 1)->where('use_is', 'document1')->first();
               if(empty($file3)){
                     $rule['uploadBtn03'] = 'required|mimes:jpeg,pdf';
               }

            $request->validate($rule);


            $dataSet = $request->only(['vision']);

            $mmember = Auth::user()->detail;

            $mmember->update($dataSet);

            $attachFile = $request->only(['uploadBtn01' ,'uploadBtn02', 'uploadBtn03']);

            $memberId = Auth::user()->id;
            $uploadGroup = 4;
            if($request->hasFile('uploadBtn01')) {
                if($attachFile['uploadBtn01']->isValid()) {

                    $fileUpload1 = \Helper::uploadFile($attachFile['uploadBtn01'], 'ngo');
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

                    $attach->save();

                }
            }
            if($request->hasFile('uploadBtn02')) {
                if($attachFile['uploadBtn02']->isValid()) {

                    $fileUpload1 = \Helper::uploadFile($attachFile['uploadBtn02'], 'ngo');
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

                    $attach->save();

                }
            }

            if($request->hasFile('uploadBtn03')) {
                if($attachFile['uploadBtn03']->isValid()) {

                    $fileUpload1 = \Helper::uploadFile($attachFile['uploadBtn03'], 'ngo');
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

                    $attach->save();

                }
            }
            return Redirect::to('form-ngo/5');
      }

      public function stepFive(Request $request) {

            // $request->validate(['g-recaptcha-response' => 'recaptcha']);

            \Mail::to(Auth::user()->email)->send(new \App\Mail\Success());
            return back()->with('success', true);

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
                       $path                = 'uploads/ngo/';
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
