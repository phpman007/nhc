<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Frontend\Member;
use App\Model\Frontend\Attachment;
use Auth, Hash, Redirect, Carbon\Carbon, DB;
use App\Model\Frontend\Log;

class FormNgoRegisterController extends Controller
{
	protected $view = 'form-ngo-register';

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
				return Redirect::to('form-ngo-register/1');
			}
		}

		if(Auth::check() && Auth::user()->groupId != 3) {
			return redirect('/')->with('info', 'ไม่สามารถเข้าได้เนื่องจากลงทะเบียนกลุ่มอื่น');
		}

		if(Auth::check() && Auth::user()->groupId == 3 && @$_GET['get_page'] == 1 && Auth::user()->last_step != null) {
			return redirect('form-ngo-register/2');
		}
		return view('frontend.'. $this->view .'.form-'.$step, ['active' => $step]);


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
			default:
			// code...
			break;
		}


	}


	public function stepOne(Request $request) {

		$request->request->add(['personalId'=> str_replace('-', '', $request->personalId)]);
		$request->validate([
			'personalId' 				=> 'required|unique:members,personalId,NULL,id,deleted_at,NULL|max:14|min:13',
			'email' 					=> 'required|email|unique:members,email,NULL,id,deleted_at,NULL',
			'password'					=> 'required|min:6|max:20|confirmed|regex:/^(?=.*?[A-Za-z])(?=.*?[0-9]).{2,}$/',
			'password_confirmation'		      => 'required|min:6|max:20|regex:/^(?=.*?[A-Za-z])(?=.*?[0-9]).{2,}$/',
			'provinceId'                        => 'required'
		]);
		$c = filter_var($request->email, FILTER_VALIDATE_EMAIL);

		  if(!$c) {
			  return back()->withInput()->withErrors(['email' => 'Email ที่กรอกไม่ถูกต้อง']);
		  }

		$dataSet =  $request->only(['personalId', 'email', 'password', 'provinceId']);

		$dataSet['password'] = Hash::make($dataSet['password']);

		$dataSet['username'] = $dataSet['email'];

		$dataSet['created_at'] = now();

		$dataSet['updated_at'] = now();

		$dataSet['groupId'] = 3;

		$member = Member::create($dataSet);

		Auth::login($member, true);


		\Mail::to(Auth::user()->email)->send(new \App\Mail\SendMailFirstStep($request->email, $request->password));

		$member->detail()->create(['statusId' => 1, 'provinceMemberID' => $request->provinceId]);

		$data['ipAddress'] = $_SERVER["REMOTE_ADDR"];
		$data['action']    = "NGORegis1";
		$data['dt']        = date("Y-m-d H:i:s");
		$data['members'] = Auth::user()->username;
		Log::create($data);

		return Redirect::to('form-ngo-register/2');

	}

	public function stepTwo(Request $request) {
		Auth::user()->last_step = 2;
		Auth::user()->save();
		$request->request->add(['ngoStartDate' => "{$request->sday}/{$request->smonth}/{$request->syear}"]);
		$rule = [
			'nameTitle'		=> 'required|max:100',
			'firstname'		=> 'required|max:50',
			'lastname'		=> 'required|max:50',
			'ngoName'         => 'required',
			'ngoNo'           => 'required',
			'ngoMoo'           => 'required',
			'ngoSoi'           => 'required',
			'ngoStreet'        => 'required',
			'ngoZipCode'       => 'required',
			'ngoStartDate'     => 'required',
			'ngoQtyMember'     => 'required',
			'ngoObjective'     => 'required',
			'suggestTel'         => 'required',

		];
		if($request->legalStastus == 1) {
			$rule['ngoStatus'] = 'required';
		}
		$request->validate($rule);
		$member = Auth::user();
		if(Auth::user()->detail->legalStastus != $request->legalStastus) {
			Auth::user()->attach()->where('status', 1)->whereIn('use_is', ['company_history_copy', 'document_verify_copy', 'company_verify_year', 'personal_copy', 'document_verify_has_company_copy'])->update(['status' => 0]);
		}
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

		$data['ipAddress'] = $_SERVER["REMOTE_ADDR"];
		$data['action']    = "NGORegis2";
		$data['dt']        = date("Y-m-d H:i:s");
		$data['members'] = Auth::user()->username;
		Log::create($data);

		return Redirect::to('form-ngo-register/3');
	}

	public function stepThree(Request $request) {
		Auth::user()->last_step = 3;
		Auth::user()->save();
		$request->validate([
			'activity1' => 'required|max:255',
			'detail1'   => 'required|max:801',
			// 'detailProvince1'   => 'required',
			'activity2' => 'required|max:255',
			'detail2'   => 'required|max:801',
			// 'detailProvince2'   => 'required',
		]);
		// Auth::user()->seniorGroupId = $request->seniorGroupId;
		// Auth::user()->save();

		// dd(Auth::user()->detail);

		$dataSet = $request->all();

		Auth::user()->update($request->all());

		Auth::user()->detail->update($dataSet);

		$data['ipAddress'] = $_SERVER["REMOTE_ADDR"];
		$data['action']    = "NGORegis3";
		$data['dt']        = date("Y-m-d H:i:s");
		$data['members'] = Auth::user()->username;
		Log::create($data);

		return Redirect::to('form-ngo-register/4');
	}

	public function stepFour(Request $request) {
		Auth::user()->last_step = 4;
		Auth::user()->save();



		$rule = [
			// 'suggestNameTitle'    => 'required',
			// 'suggestNameTitle'    => 'required',
			// 'suggestFirstName'     => 'required',
			// 'suggestLastName'     => 'required',
			'suggestPosition'     => 'required',
			'byNgo'               => 'required'
		];

		$file1 = Auth::user()->attach()->where('status', 1)->where('use_is', 'company_history_copy')->first();
		if($request->hasFile('file1') || empty($file1) ){
			$rule['file1'] = 'required|mimes:jpeg,pdf';
		}

		$file2 = Auth::user()->attach()->where('status', 1)->where('use_is', 'company_verify_year')->first();
		if($request->hasFile('file2') || empty($file2) ){
			$rule['file2'] = 'required|mimes:jpeg,pdf';
		}

		$file3 = Auth::user()->attach()->where('status', 1)->where('use_is', 'document_verify_copy')->first();
		if($request->hasFile('file3') || empty($file3) ){
			$rule['file3'] = 'required|mimes:jpeg,pdf';
		}

		$file4 = Auth::user()->attach()->where('status', 1)->where('use_is', 'personal_copy')->first();
		if($request->hasFile('file4') || empty($file4) ){
			$rule['file4'] = 'required|mimes:jpeg,pdf';
		}

		$file5 = Auth::user()->attach()->where('status', 1)->where('use_is', 'document_verify_has_company_copy')->first();
		if($request->hasFile('file5') || empty($file5) ){
			$rule['file5'] = 'required|mimes:jpeg,pdf';
		}

		if(Auth::user()->detail->legalStastus == 1) {
			$message = [
				'file1' => 'สำเนาหนังสือสำคัญที่แสดงความเป็นนิติบุคคล',
				'file3' => 'สำเนาหลักฐานที่แสดงถึงวัตถุประสงค์การก่อตั้งองค์กร',
				'file2' => 'สำเนาหลักฐานซึ่งแสดงถึงการดำเนินกิจกรรมในพื้นที่จังหวัดนั้นตามกลุ่มองค์กรที่ขอขึ้นทะเบียน มาแล้วไม่เกิน 3 ปี นับถึงวันที่สมัคร จำนวน 2 กิจกรรมขึ้นไป เช่น โครงการ รายงานการดำเนินโครงการ รูปถ่ายกิจกรรมโดยระบุสถานที่จัดกิจกรรม เป็นต้น',
				'file4' => 'สำเนาคำสั่งแต่งตั้งประธานองค์กรหรือรายงานการประชุมที่ระบุชื่อและตำแหน่งประธานองค์กร',
				'file5' => 'สำเนาบัตรประจำตัวประชาชนของประธานองค์กร'
			];
		} else {
			$message = [
				'file1' => 'สำเนาหลักฐานที่แสดงถึงวัตถุประสงค์การก่อตั้งองค์กร',
				'file3' => 'สำเนาหนังสือที่แสดงว่าผู้ลงลายมือชื่อในแบบขอขึ้นทะเบียนองค์กรภาคเอกชนเป็นประธาน องค์กร หรือรายงานประชุมที่ระบุชื่อและตำแหน่งประธานองค์กร',
				'file2' => 'สำเนาหลักฐานซึ่งแสดงถึงกิจกรรมการดำเนินงานที่เกี่ยวข้องกับสุขภาพในกลุ่มที่ขอขึ้นทะเบียนในพื้นที่จังหวัด 2 กิจกรรมที่สำคัญในระยะเวลาไม่เกิน 3 ปีนับถึงวันที่สมัคร(กิจกรรมในระหว่างเดือนสิงหาคม 2559 - ปัจจุบัน) เช่น โครงการ รายงานการดำเนินโครงการ รูปถ่ายกิจกรรม โดยระบุสถานที่จัดกิจกรรม เป็นต้น',
				'file4' => 'สำเนาบัตรประจำตัวประชาชนของประธานองค์กร',
				'file5' => 'หนังสือรับรองความมีอยู่และการดำเนินกิจกรรมขององค์กรภาคเอกชนที่ไม่เป็นนิติบุคคล'
			];
		}
		// Rule
		$request->validate($rule, [
			'file1.required' => 'กรุณาอัพโหลดข้อมูล : :attribute',
			'file2.required' => 'กรุณาอัพโหลดข้อมูล : :attribute',
			'file3.required' => 'กรุณาอัพโหลดข้อมูล : :attribute',
			'file4.required' => 'กรุณาอัพโหลดข้อมูล : :attribute',
			'file5.required' => 'กรุณาอัพโหลดข้อมูล : :attribute',
		], $message);

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

		$dataSet = $request->all();

		Auth::user()->update($request->all());

		Auth::user()->detail->update($dataSet);




		$data['ipAddress'] = $_SERVER["REMOTE_ADDR"];
		$data['action']    = "NGORegis4";
		$data['dt']        = date("Y-m-d H:i:s");
		$data['members'] = Auth::user()->username;
		Log::create($data);

		return Redirect::to('form-ngo-register/5');
	}

	public function stepFive(Request $request) {
		try {

			Auth::user()->status_accept = 2;
			Auth::user()->save();

			$number = DB::table('number_file')->where('date', now()->format('Y-m-d'))->where('type', 3)->first();

			if (empty($number)) {
				DB::table('number_file')->insert(['type' => 3, 'date' => now()->format('Y-m-d'), 'number'=>1]);
				$numberIs = 1;
			} else {
				$numberIs = $number->number+1;
				DB::table('number_file')->where('id', $number->id)->update(['number'=>$numberIs]);
			}

			if(Auth::user()->detail->legalStastus == 1) {
				$file1 = Auth::user()->attach()->where('status', 1)->where('use_is', 'company_history_copy')->first();
				if(empty($file1) ){
					$rule['file1'] = 'กรุณาอัพโหลดข้อมูล : สำเนาหนังสือสำคัญที่แสดงความเป็นนิติบุคคล';
				}

				$file2 = Auth::user()->attach()->where('status', 1)->where('use_is', 'company_verify_year')->first();
				if(empty($file2) ){
					$rule['file2'] = 'กรุณาอัพโหลดข้อมูล : สำเนาหลักฐานซึ่งแสดงถึงการดำเนินกิจกรรมในพื้นที่จังหวัดนั้นตามกลุ่มองค์กรที่ขอขึ้นทะเบียน มาแล้วไม่เกิน 3 ปี นับถึงวันที่สมัคร จำนวน 2 กิจกรรมขึ้นไป เช่น โครงการ รายงานการดำเนินโครงการ รูปถ่ายกิจกรรมโดยระบุสถานที่จัดกิจกรรม เป็นต้น';
				}

				$file3 = Auth::user()->attach()->where('status', 1)->where('use_is', 'document_verify_copy')->first();
				if(empty($file3) ){
					$rule['file3'] = 'กรุณาอัพโหลดข้อมูล : สำเนาหลักฐานที่แสดงถึงวัตถุประสงค์การก่อตั้งองค์กร';
				}

				$file4 = Auth::user()->attach()->where('status', 1)->where('use_is', 'personal_copy')->first();
				if(empty($file4) ){
					$rule['file4'] = 'กรุณาอัพโหลดข้อมูล : สำเนาคำสั่งแต่งตั้งประธานองค์กรหรือรายงานการประชุมที่ระบุชื่อและตำแหน่งประธานองค์กร';
				}

				$file5 = Auth::user()->attach()->where('status', 1)->where('use_is', 'document_verify_has_company_copy')->first();
				if(empty($file5) ){
					$rule['file5'] = 'กรุณาอัพโหลดข้อมูล : สำเนาบัตรประจำตัวประชาชนของประธานองค์กร';
				}
			} else {
				$file1 = Auth::user()->attach()->where('status', 1)->where('use_is', 'company_history_copy')->first();
				if(empty($file1) ){
					$rule['file1'] = 'กรุณาอัพโหลดข้อมูล : สำเนาหลักฐานที่แสดงถึงวัตถุประสงค์การก่อตั้งองค์กร';
				}

				$file2 = Auth::user()->attach()->where('status', 1)->where('use_is', 'company_verify_year')->first();
				if(empty($file2) ){
					$rule['file2'] = 'กรุณาอัพโหลดข้อมูล : สำเนาหลักฐานซึ่งแสดงถึงกิจกรรมการดำเนินงานที่เกี่ยวข้องกับสุขภาพในกลุ่มที่ขอขึ้นทะเบียนในพื้นที่จังหวัด 2 กิจกรรมที่สำคัญในระยะเวลาไม่เกิน 3 ปีนับถึงวันที่สมัคร(กิจกรรมในระหว่างเดือนสิงหาคม 2559 - ปัจจุบัน) เช่น โครงการ รายงานการดำเนินโครงการ รูปถ่ายกิจกรรม โดยระบุสถานที่จัดกิจกรรม เป็นต้น';
				}

				$file3 = Auth::user()->attach()->where('status', 1)->where('use_is', 'document_verify_copy')->first();
				if(empty($file3) ){
					$rule['file3'] = 'กรุณาอัพโหลดข้อมูล : สำเนาหนังสือที่แสดงว่าผู้ลงลายมือชื่อในแบบขอขึ้นทะเบียนองค์กรภาคเอกชนเป็นประธาน องค์กร หรือรายงานประชุมที่ระบุชื่อและตำแหน่งประธานองค์กร';
				}

				$file4 = Auth::user()->attach()->where('status', 1)->where('use_is', 'personal_copy')->first();
				if(empty($file4) ){
					$rule['file4'] = 'กรุณาอัพโหลดข้อมูล : สำเนาบัตรประจำตัวประชาชนของประธานองค์กร';
				}

				$file5 = Auth::user()->attach()->where('status', 1)->where('use_is', 'document_verify_has_company_copy')->first();
				if(empty($file5) ){
					$rule['file5'] = 'กรุณาอัพโหลดข้อมูล : หนังสือรับรองความมีอยู่และการดำเนินกิจกรรมขององค์กรภาคเอกชนที่ไม่เป็นนิติบุคคล';
				}
			}

			if(!empty($rule))
               {
                    return redirect('form-ngo-register/4')->withErrors($rule);
               }

			$filename_gen = sprintf('nhc-ngoREP-%03d%02d',Auth::user()->id, now()->format('d'));

			Auth::user()->detail()->update(['docId2' => $filename_gen]);

			// return event(new \App\Events\FinishRegister(Auth::user(), 3))[0]->stream();
			$path = $this->genPdf($filename_gen);

			\Mail::to(Auth::user()->email)->send(new \App\Mail\Success($path, 2));

			$data['ipAddress'] = $_SERVER["REMOTE_ADDR"];
			$data['action']    = "NGORegiscomplete";
			$data['dt']        = date("Y-m-d H:i:s");
			$data['members'] = Auth::user()->username;
			Log::create($data);
		} catch (\Exception $e) {
			dd($e);
		}

		// $request->validate(['g-recaptcha-response' => 'recaptcha']);
		return Redirect::to('form-ngo/1')->with('info', 'โปรด <a href="'. url('/gen-word/'.Auth::user()->id) .'" style="color:blue; font-weight:bold" target="_blank">"คลิ๊กที่นี่"</a> เพื่อสั่งพิมพ์และนำไปให้ประธานองค์กรลงนาม เพื่อนำไปแนบกับใบสมัครในขั้นตอนต่อไป <br><br>หมายเหตุ : ระบบจะจัดส่งไฟล์ "แบบฟอร์ม สช./แบบขอขึ้นทะเบียนองค์กรภาคเอกชนและยืนยันการส่งผู้แทนองค์กรภาคเอกชน/2562" ไปยังอีเมลของท่าน <br>หากไม่พบในกล่องจดหมาย (Inbox) กรุณาตรวจสอบในกล่องจดหมายขยะ (Spam)');
		return Redirect::to('form-ngo/1')->with('info', 'ท่านได้จัดทำแบบขึ้นทะเบียนองค์กรภาคเอกชนเรียบร้อยแล้ว <br> โปรด<a href="'.asset('pdf/ngo-register/'.Auth::user()->detail->docId2).'.pdf" style="color:blue; font-weight:bold" target="_blank">สั่งพิมพ์</a>และนำไปให้ประธานองค์กรลงนามเพื่อนำไปแนบกับใบสมัครในขั้นตอนต่อไป');
		return back();

	}
	public function genPdf($filename_gen)
	{
		if (!file_exists(public_path('pdf/ngo-register/'))) {
			mkdir('pdf/ngo-register/', 755, true);
		}
		$path = public_path('pdf/ngo-register/'.$filename_gen.'.pdf');
		if(file_exists($path)) {
			unlink($path);
		}
		event(new \App\Events\FinishRegister(Auth::user(), 3))[0]->save($path);
		return $path;
	}
}
