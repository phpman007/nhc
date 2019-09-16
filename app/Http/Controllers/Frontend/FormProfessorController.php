<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Frontend\Member;
use App\Model\Frontend\Attachment;
use Hash, Carbon\Carbon, Redirect, Auth, Exception, DB;
use App\Events\CreateMember;
use App\Model\Frontend\Log;
use iio\libmergepdf\Merger;
use iio\libmergepdf\Pages;

class FormProfessorController extends Controller
{
     protected $merge;

     public function formView($step) {

	     if(now() >= "2019-09-13 16:30:00") {
     			return redirect('/')->with('info','<span style="font-size:35px">ขณะนี้สิ้นสุดเวลารับสมัครการเป็นกรรมการสุขภาพแห่งชาติ ตามประกาศคณะกรรมการสรรหากรรมการสุขภาพแห่งชาติฯ แล้ว</span>');
     		}
          if(Auth::check()) {
               if(Auth::user()->status_accept == 1) {
                    // return redirect('/')->with('info', 'คุณยื่นเอกสารสมัครเป็นตัวแทนกรรมการสุขภาพแห่งชาติเรียบร้อยแล้ว ไม่สามารถแก้ไขได้ กรุณาตรวจสอบรายละเอียดการสมัครที่อีเมล์ของท่าน หรือ ติดต่อผู้ดูแลระบบ');
               }
          }

          if($step != 1 && !Auth::check()) {
               if(@$_GET['get_page'] == 1) {
                    return Redirect::to('login');
               } else {
                    return Redirect::to('form-professional/1');
               }

          }

          if(Auth::check() && Auth::user()->groupId != 1) {
               return redirect('/')->with('info', 'ไม่สามารถเข้าได้เนื่องจากลงทะเบียนกลุ่มอื่น');
          }

          if(Auth::check() && Auth::user()->groupId == 1 && @$_GET['get_page'] == 1 && Auth::user()->last_step != null) {
               return redirect('form-professional/2');
          }


          return view('frontend.form-professional.form-'.$step, ['active' => $step]);

     }

     public function formPost($step, Request $request) {

     		if(now() >= "2019-09-13 16:30:00") {
     			return redirect('/')->with('info','<span style="font-size:35px">ขณะนี้สิ้นสุดเวลารับสมัครการเป็นกรรมการสุขภาพแห่งชาติ ตามประกาศคณะกรรมการสรรหากรรมการสุขภาพแห่งชาติฯ แล้ว</span>');
     		}
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
               case 7:
               return $this->stepSevent($request);
               break;
               default:
               // code...
               break;
          }


     }

     public function stepOne(Request $request) {


          $request->request->add(['personalId' => str_replace('-', '', $request->personalId)]);

          $request->validate([
               'personalId' 				=> 'required|unique:members,personalId,NULL,id,deleted_at,NULL|max:14|min:13',
               'email' 					=> 'required|email|unique:members,email,NULL,id,deleted_at,NULL',
               'password'					=> 'required|min:6|max:20|confirmed|regex:/^(?=.*?[A-Za-z])(?=.*?[0-9]).{2,}$/',
               'password_confirmation'		     => 'required|min:6|max:20|regex:/^(?=.*?[A-Za-z])(?=.*?[0-9]).{2,}$/'
          ]);

	    $c = filter_var($request->email, FILTER_VALIDATE_EMAIL);
	    
	    if(!$c) {
		    return back()->withInput()->withErrors(['email' => 'Email ที่กรอกไม่ถูกต้อง']);
	    }

          $dataSet =  $request->all();
          $dataSet['password'] = Hash::make($dataSet['password']);
          $dataSet['username'] = $dataSet['email'];
          $dataSet['groupId'] = 1;

          $member = Member::create($dataSet);
          Auth::login($member, true);

          \Mail::to(Auth::user()->email)->send(new \App\Mail\SendMailFirstStep($request->email, $request->password));

          $member->detail()->create(['statusId' => 1]);

          $data['ipAddress'] = $_SERVER["REMOTE_ADDR"];
          $data['action']    = "SN1";
          $data['dt']        = date("Y-m-d H:i:s");
          $data['members'] = Auth::user()->username;
          Log::create($data);

          return Redirect::to('form-professional/2');

     }

     public function stepTwo(Request $request) {

          Auth::user()->last_step = $request->last_step;
          Auth::user()->save();
          $request->validate([
               'nameTitle'		=> 'required|min:1|max:100',
               'firstname'		=> 'required|min:1|max:50',
               'lastname'		=> 'required|min:1|max:50',
               'thaiStatus'    => 'required',
               'ageQualify'    => 'required',
               'enoughAbility' => 'required',
               'noDrug'        => 'required',
               'noCriminal'    => 'required',
               'noJail'        => 'required',
               'noNHCworking'  => 'required',
               'enoughExperience'  => 'required',
               'enoughProfile' => 'required'
          ]);

          $member = Auth::user();

          $dataSet = $request->only(['nameTitle', 'firstname', 'lastname', 'last_step']);

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

               $data['ipAddress'] = $_SERVER["REMOTE_ADDR"];
               $data['action']    = "SN2";
               $data['dt']        = date("Y-m-d H:i:s");
               $data['members'] = Auth::user()->username;
               Log::create($data);

               return Redirect::to('form-professional/3');

          } catch (Exception $e) {

          }
          return Redirect::back();
     }

     public function stepThree(Request $request) {
          Auth::user()->last_step = $request->last_step;
          Auth::user()->seniorGroupId = $request->seniorGroupId;

          Auth::user()->save();

          $data['ipAddress'] = $_SERVER["REMOTE_ADDR"];
          $data['action']    = "SN3";
          $data['dt']        = date("Y-m-d H:i:s");
          $data['members'] = Auth::user()->username;
          Log::create($data);

          return Redirect::to('form-professional/4');
     }

     public function stepFour(Request $request) {

          Auth::user()->last_step = $request->last_step;
          Auth::user()->save();
          $request->request->add(['tel' => str_replace('-', '', $request->tel)]);

          $request->request->add(['mobile' => str_replace('-', '', $request->mobile)]);

          $request->request->add(['dateOfBirth' => "{$request->sday}/{$request->smonth}/{$request->syear}"]);
          $rule = [
               'no' 			   => 'required|max:7',
               'moo' 		   => 'required|max:151',
               'soi' 		   => 'required|max:101',
               'street' 		   => 'required|max:101',
               'subDistrictId'      => 'required',
               'districtId'         => 'required',
               'dateOfBirth'        => 'required',
               'provinceId'         => 'required',
               'zipCode' 		   => 'required',
               'tel'                => 'required',
               'addressType'                => 'required',
               // 'mobile' 		   => 'required|min:10|max:11',
               'graduated1' 	   => 'required',
               'faculty1' 		   => 'required',
               'institution1' 	   => 'required',
               'yearend1' 		   => 'required',
               'nowWork' 		   => 'max:256|required',
               'nowWorkPlace' 	   => 'max:256|required',
               'nowRole' 		   => 'max:801|required',
               'pastWork1'          => 'required',
               'pastOrganization1'  => 'required',
               'time1' 		   =>'required',
               'pastOrganization1'  => 'required',
               'fromyear1' 		   =>'required',
               'toyear1'      =>'required',
               'importantMemo' => 'required',
          ];
          if($request->addressType == 2) {
               $rule['workPlaceName'] = 'required';
          }
          $request->validate($rule);

          if(empty($request->tel) && empty($request->mobile)) {
               return back()->withInput()->withErrors(['tel' => 'กรุณากรอกข้อมูลโทรศัพท์บ้านหรือข้อมูลโทรศัพท์มือถือ ']);
          }
          // if($request->yearOld < 20) {
          //       return back()->withInput()->withErrors(['dateOfBirth' => 'กรุณาตรวจสอบวันเดือนปีเกิดของท่าน อายุต้องมากกว่า 20 ปี']);
          // }

          if(!empty($request->tel_slarp))
          $request->request->add(['tel' => $request->tel .'-'. $request->tel_slarp]);
          $mmember = Auth::user()->detail;
          $dataSet = $request->except(['_token']);

          $dataSet['tel'] = str_replace('-', '', $dataSet['tel']);
          $dataSet['mobile'] = str_replace('-', '', $dataSet['mobile']);

          $dataSet['dateOfBirth'] = $this->dateThaiToDefault($dataSet['dateOfBirth']);
          $mmember->update($dataSet);

          $data['ipAddress'] = $_SERVER["REMOTE_ADDR"];
          $data['action']    = "SN4";
          $data['dt']        = date("Y-m-d H:i:s");
          $data['members'] = Auth::user()->username;
          Log::create($data);

          return Redirect::to('form-professional/5');
     }

     public function stepFive(Request $request) {

          Auth::user()->last_step = $request->last_step;
          Auth::user()->save();

          $rule = ['vision' => 'required'];
          $file1 = Auth::user()->attach()->where('status', 1)->where('use_is', 'copy_personal_card')->first();
          if($request->hasFile('uploadBtn01') || empty($file1)){
               $rule['uploadBtn01'] = 'required|mimes:jpeg,pdf';
          }
          $file2 = Auth::user()->attach()->where('status', 1)->where('use_is', 'personal_photo')->first();
          if($request->hasFile('uploadBtn02') || empty($file2)){
               $rule['uploadBtn02'] = 'required|mimes:jpeg,pdf';
          }
          $file3 = Auth::user()->attach()->where('status', 1)->where('use_is', 'document1')->first();
          if($request->hasFile('uploadBtn03') || empty($file3)){
               $rule['uploadBtn03'] = 'required|mimes:jpeg,pdf';
          }

          $file4 = Auth::user()->attach()->where('status', 1)->where('use_is', 'vision')->first();
          if($request->hasFile('uploadBtn04') || empty($file4)){
               // $rule['uploadBtn04'] = 'required|mimes:jpeg,pdf';
          }

          $request->validate($rule, [
               'uploadBtn01.required' => 'กรุณาอัพโหลดข้อมูล : :attribute',
               'uploadBtn02.required' => 'กรุณาอัพโหลดข้อมูล : :attribute',
               'uploadBtn03.required' => 'กรุณาอัพโหลดข้อมูล : :attribute',
               'uploadBtn04.required' => 'กรุณาอัพโหลดข้อมูล : :attribute',
          ]);

          $dataSet = $request->only(['vision']);

          $mmember = Auth::user()->detail;

          $mmember->update($dataSet);

          $attachFile = $request->only(['uploadBtn01' ,'uploadBtn02', 'uploadBtn03', 'uploadBtn04']);

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

                    $attach->save();

               }
          }
          if($request->hasFile('uploadBtn04')) {
               if($attachFile['uploadBtn04']->isValid()) {

                    $fileUpload1 = \Helper::uploadFile($attachFile['uploadBtn04'], 'proffessional');
                    Attachment::where('upload_group', $uploadGroup)->where('use_is', 'vision')->where('member_id', $memberId)->update(['status' => 0]);
                    $attach = new Attachment();
                    $attach->path        = $fileUpload1['path'];
                    $attach->fileName    = $fileUpload1['oldName'];
                    $attach->newName     = $fileUpload1['filename'];
                    $attach->status      = 1;
                    $attach->size        = $fileUpload1['size'];
                    $attach->type        = $fileUpload1['type'];
                    $attach->member_id   = $memberId;
                    $attach->upload_group = $uploadGroup;
                    $attach->use_is      = 'vision';

                    $attach->save();
               }
          }

          $data['ipAddress'] = $_SERVER["REMOTE_ADDR"];
          $data['action']    = "SN5";
          $data['dt']        = date("Y-m-d H:i:s");
          $data['members'] = Auth::user()->username;
          Log::create($data);

          return Redirect::to('form-professional/6');
     }

     public function stepSix(Request $request)
     {
          Auth::user()->last_step = 6;
          Auth::user()->save();

          // $pdf = event(new \App\Events\FinishRegister(Auth::user()));

          // \Mail::to(Auth::user()->email)->send(new \App\Mail\Success());
          $data['ipAddress'] = $_SERVER["REMOTE_ADDR"];
          $data['action']    = "SN6";
          $data['dt']        = date("Y-m-d H:i:s");
          $data['members'] = Auth::user()->username;
          Log::create($data);

          return redirect('form-professional/7');
          return back()->with('success', true);
     }

     public function stepSevent(Request $request)
     {
          try {
               $year_older = 20;
               $bDate = \Carbon\Carbon::parse(Auth::user()->detail->dateOfBirth);
               $yearNow = \Carbon\Carbon::now()->diffInYears($bDate);
               if($yearNow < $year_older) {
                    return redirect('form-professional/4')->withErrors(['dateOfBirth' => "อายุน้อยกว่า 20 ไม่สามารถลงทะเบียนได้"]);
               }

               $file1 = Auth::user()->attach()->where('status', 1)->where('use_is', 'copy_personal_card')->first();
               if(empty($file1)){
                    $rule['uploadBtn01'] = 'กรุณาอัพโหลดข้อมูล สำเนาบัตรประจำตัวประชาชน';
               }
               $file2 = Auth::user()->attach()->where('status', 1)->where('use_is', 'personal_photo')->first();
               if(empty($file2)){
                    $rule['uploadBtn02'] = 'กรุณาอัพโหลดข้อมูล รูปถ่ายหน้าตรงไม่สวมหมวก ไม่สวมแว่นตาดำ ฉากพื้นหลังไม่มีลวดลาย  ซึ่งถ่ายมาแล้วไม่เกิน  6  เดือน';
               }
               $file3 = Auth::user()->attach()->where('status', 1)->where('use_is', 'document1')->first();
               if(empty($file3)){
                    $rule['uploadBtn03'] = 'กรุณาอัพโหลดข้อมูลเอกสารสรุปผลงานอันเป็นที่ประจักษ์ ที่สอดคล้องกับประเภทกลุ่มผู้ทรงคุณวุฒิที่เลือกสมัคร (ไม่เกิน 2 หน้ากระดาษ A4) พิมพ์โดยใช้ตัวอักษรขนาดไม่ต่ำกว่า 16)';
               }

               if(!empty($rule))
               {
                    return redirect('form-professional/5')->withErrors($rule);
               }

               if(empty(Auth::user()->detail->pastWork1) || empty(Auth::user()->detail->pastOrganization1) || empty(Auth::user()->detail->time1)) {
                    return redirect('form-professional/4#target1')->withErrors(['pastWork1' => "โปรดระบุข้อมูลนี้", 'pastOrganization1' => "โปรดระบุข้อมูลนี้", 'time1' => "โปรดระบุข้อมูลนี้"]);
               }

               $number = DB::table('number_file')->where('date', now()->format('Y-m-d'))->where('type', 1)->first();

               if (empty($number)) {
                    DB::table('number_file')->insert(['type' => 1, 'date' => now()->format('Y-m-d'), 'number'=>1]);
                    $numberIs = 1;
               } else {
                    $numberIs = $number->number+1;
                    DB::table('number_file')->where('id', $number->id)->update(['number'=>$numberIs]);
               }

               $filename_gen = sprintf('nhc-PRO-%03d-%02d',Auth::user()->id, now()->format('d'));

               Auth::user()->detail()->update(['docId' => $filename_gen]);

               Auth::user()->update(['status_accept' => 1, 'confirmed_at' =>now()->format('Y-m-d H:i:s')]);

               $data['ipAddress'] = $_SERVER["REMOTE_ADDR"];
               $data['action']    = "SNcomplete";
               $data['dt']        = date("Y-m-d H:i:s");
               $data['members'] = Auth::user()->username;
               Log::create($data);

               $path = $this->genPdf($filename_gen);

               \Mail::to(Auth::user()->email)->send(new \App\Mail\Success($path, 1));

          } catch (\Exception $e) {
               dd($e);
          }
          return back()->with('success', true);
     }
     public function genOnly() {
          try {

               $filename_gen = sprintf('nhc-PRO-%03d-%02d-doc3',Auth::user()->id, now()->format('d'));
               Auth::user()->detail()->update(['docId3' => $filename_gen]);

               $path = $this->genPdf($filename_gen);

               // \Mail::to(Auth::user()->email)->send(new \App\Mail\Success($path, 1));

          } catch (\Exception $e) {
               dd($e);
          }
     }
     public function pdfMerge($header, $file) {
          // Create Header

          // unlink($path_header);

          if($file->type == 'jpg' || $file->type == 'jpeg') {

               $pdf = \App::make('dompdf.wrapper');
               $pdf->loadHTML('<img style="width:500px" src="'. asset($file->path) .'">');

               if (!file_exists(public_path('pdf/asset_professional/'))) {
                    mkdir('pdf/asset_professional/', 755, true);
               }

               $path1 = public_path('pdf/asset_professional/'. $file->newName);
               if(file_exists($path1)) {
                    unlink($path1);
               }
               $path1 = public_path('pdf/asset_professional/'. pathinfo($file->path)['filename']).".pdf";
               // $pdf->save($path1);

               // $this->merge->addFile($path1);
               // unlink($path1);

               $htmlStr = '<img style="width:500px" src="'. asset($file->path) .'">';
          } else {
               $pdf = \App::make('dompdf.wrapper');
               $pdf->loadHTML('Click Here :: <a href="'. asset($file->path) .'">'. asset($file->path) . '</a> ');

               if (!file_exists(public_path('pdf/asset_professional/'))) {
                    mkdir('pdf/asset_professional/', 755, true);
               }

               $path1 = public_path('pdf/asset_professional/'. $file->newName);
               if(file_exists($path1)) {
                    unlink($path1);
               }
               $path1 = public_path('pdf/asset_professional/'. pathinfo($file->path)['filename']).".pdf";
               // $pdf->save($path1);

               // $this->merge->addFile($path1);
               $htmlStr = '<a href="'. asset($file->path) .'">'. asset($file->path) . '</a> ';
          }
          $pdf = \App::make('dompdf.wrapper');
          $pdf->loadView('pdf.pa-page', ['header' => $header, 'html' => $htmlStr]);
          if (!file_exists(public_path('pdf/header/'))) {
               mkdir('pdf/header/', 755, true);
          }

          $path_header = public_path('pdf/header/'.date("YmdHis").str_random(5). '.pdf');
          $pdf->save($path_header);
          $this->merge->addFile($path_header);
          return $path_header;
     }


     public function genPdf($filename_gen)
     {
          if (!file_exists(public_path('pdf/professional/'))) {
               mkdir('pdf/professional/', 755, true);
          }
          $path = public_path('pdf/professional/'. $filename_gen .'.pdf');
          if(file_exists($path)) {
               unlink($path);
          }


          event(new \App\Events\FinishRegister(Auth::user(), 1))[0]->save($path);

          $this->merge = new Merger;
          $this->merge->addFile($path);
          try {
               // file 1
               $file1 = Auth::user()->attach()->where('status', 1)->where('use_is', 'copy_personal_card')->first();
               $oldFile1 = $this->pdfMerge('สำเนาบัตรประจำตัวประชาชน', $file1);

               // file 2
               $file2 = Auth::user()->attach()->where('status', 1)->where('use_is', 'document1')->first();
               $oldFile2 = $this->pdfMerge('เอกสารสรุปผลงานอันเป็นที่ประจักษ์ที่สอดคล้องกับประเภทกลุ่มผู้ทรงคุณวุฒิที่เลือกสมัคร(ไม่เกิน 2 หน้ากระดาษ A4) พิมพ์โดยใช้ตัวอักษรขนาดไม่ต่ำกว่า 16',$file2);


            // file 3
            $file3 = Auth::user()->attach()->where('status', 1)->where('use_is', 'personal_photo')->first();
            $oldFile3 = $this->pdfMerge('รูปถ่ายหน้าตรงไม่สวมหมวก',$file3);

               // save
               $save_path =  'pdf/professional-merge/'. $filename_gen .'.pdf';
               if(file_exists($save_path)) {
                    unlink($save_path);
               }
               $file = \Storage::put($save_path, $this->merge->merge());
               unlink($oldFile1);
               unlink($oldFile2);
          } catch (\Exception $e) {
               // throw new \Exception("Error Processing Request", 1);
               dd($e);
          }



          return $save_path;
     }
}
