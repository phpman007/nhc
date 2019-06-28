<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Frontend\Member;
use App\Model\Frontend\Attachment;
use Auth, Hash, Redirect, Carbon\Carbon;
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

            $dataSet['groupId'] = 3;

            $hasMember = Member::where('personalId', $dataSet['personalId'])->where('groupId', $dataSet['groupId'])->first();
            if($hasMember) {
                  if(Hash::check($request->password, $hasMember->password)) :
                        Auth::login($hasMember, true);
                  else:
                        return back()->withErrors(['personalId'=>'มีข้อมูลอยู่ในระบบแล้ว รหัสผ่านไม่ถูกต้อง']);
                  endif;

                  if(Auth::check()) {
                        return Redirect::to('form-ngo-register/2');
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
                  $member = Member::where('personalId', $dataSet['personalId'])->first();

                  if(Hash::check($member->password, $dataSet['password'])) :
                        Auth::login($member, true);
                  endif;

                  if(Auth::check()) {
                        return Redirect::to('form-ngo-register/2');
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

            Auth::user()->update($request->all());

            if(empty(Auth::user()->detail)) {
                  $dataSet = $request->all();

                  $dataSet['ngoStartDate'] = Carbon::createFromFormat('d/m/Y', $dataSet['ngoStartDate'])->addYears("-543")->format("Y-m-d");

                  Auth::user()->detail()->create($dataSet);
            } else{
                  $dataSet = $request->all();
                  $dataSet['ngoStartDate'] = Carbon::createFromFormat('d/m/Y', $dataSet['ngoStartDate'])->addYears("-543")->format("Y-m-d");

                  Auth::user()->detail->update($dataSet);
            }

            return Redirect::to('form-ngo-register/3');
      }

      public function stepThree(Request $request) {

            // Auth::user()->seniorGroupId = $request->seniorGroupId;
            // Auth::user()->save();

            // dd(Auth::user()->detail);

            $dataSet = $request->all();

            Auth::user()->update($request->all());

            Auth::user()->detail->update($dataSet);

            return Redirect::to('form-ngo-register/4');
      }

      public function stepFour(Request $request) {
            // Rule
            $request->validate([
                  'suggestNameTitle'    => 'required',
                  'suggestNameTitle'    => 'required',
                  'suggestFullname'     => 'required',
                  'suggestPosition'     => 'required'
            ]);
            $dataSet = $request->all();

            Auth::user()->update($request->all());

            Auth::user()->detail->update($dataSet);


            if($request->hasFile('file1')) {
                  if($fileUpload = \Helper::uploadFile($request->file1, 'company_history_copy')) {
                        Attachment::where('member_id', Auth::user()->id)->where('use_is', 'company_history_copy')->update(['status' => 0]);

                        $attach = new Attachment;
                        $attach->fileName       = $fileUpload['oldName'];
                        $attach->path           = $fileUpload['path'];
                        $attach->newName        = $fileUpload['filename'];
                        $attach->status         = 1;
                        $attach->size           = $fileUpload['size'];
                        $attach->type           = $fileUpload['type'];
                        $attach->member_id      = Auth::user()->id;
                        $attach->upload_group   = 3;
                        $attach->use_is         = 'company_history_copy';
                        $attach->save();

                  }
            }

            if($request->hasFile('file2')) {
                  if($fileUpload = \Helper::uploadFile($request->file2, 'company_verify_year')) {
                        Attachment::where('member_id', Auth::user()->id)->where('use_is', 'company_verify_year')->update(['status' => 0]);

                        $attach = new Attachment;
                        $attach->fileName       = $fileUpload['oldName'];
                        $attach->path           = $fileUpload['path'];
                        $attach->newName        = $fileUpload['filename'];
                        $attach->status         = 1;
                        $attach->size           = $fileUpload['size'];
                        $attach->type           = $fileUpload['type'];
                        $attach->member_id      = Auth::user()->id;
                        $attach->upload_group   = 3;
                        $attach->use_is         = 'company_verify_year';
                        $attach->save();

                  }
            }

            if($request->hasFile('file3')) {
                  if($fileUpload = \Helper::uploadFile($request->file3, 'document_verify_copy')) {
                        Attachment::where('member_id', Auth::user()->id)->where('use_is', 'document_verify_copy')->update(['status' => 0]);

                        $attach = new Attachment;
                        $attach->fileName       = $fileUpload['oldName'];
                        $attach->path           = $fileUpload['path'];
                        $attach->newName        = $fileUpload['filename'];
                        $attach->status         = 1;
                        $attach->size           = $fileUpload['size'];
                        $attach->type           = $fileUpload['type'];
                        $attach->member_id      = Auth::user()->id;
                        $attach->upload_group   = 3;
                        $attach->use_is         = 'document_verify_copy';
                        $attach->save();

                  }
            }

            if($request->hasFile('file4')) {
                  if($fileUpload = \Helper::uploadFile($request->file4, 'personal_copy')) {
                        Attachment::where('member_id', Auth::user()->id)->where('use_is', 'personal_copy')->update(['status' => 0]);

                        $attach = new Attachment;
                        $attach->fileName       = $fileUpload['oldName'];
                        $attach->path           = $fileUpload['path'];
                        $attach->newName        = $fileUpload['filename'];
                        $attach->status         = 1;
                        $attach->size           = $fileUpload['size'];
                        $attach->type           = $fileUpload['type'];
                        $attach->member_id      = Auth::user()->id;
                        $attach->upload_group   = 3;
                        $attach->use_is         = 'personal_copy';
                        $attach->save();

                  }
            }
            if($request->hasFile('file5')) {
                  if($fileUpload = \Helper::uploadFile($request->file5, 'document_verify_has_company_copy')) {
                        Attachment::where('member_id', Auth::user()->id)->where('use_is', 'document_verify_has_company_copy')->update(['status' => 0]);

                        $attach = new Attachment;
                        $attach->fileName       = $fileUpload['oldName'];
                        $attach->path           = $fileUpload['path'];
                        $attach->newName        = $fileUpload['filename'];
                        $attach->status         = 1;
                        $attach->size           = $fileUpload['size'];
                        $attach->type           = $fileUpload['type'];
                        $attach->member_id      = Auth::user()->id;
                        $attach->upload_group   = 3;
                        $attach->use_is         = 'document_verify_has_company_copy';
                        $attach->save();

                  }
            }

            return Redirect::to('form-ngo-register/5');
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
