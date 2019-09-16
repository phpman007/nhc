<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth,Redirect, DB;
use App\Model\Frontend\Attachment;
use App\Model\Frontend\Log;
use iio\libmergepdf\Merger;
use iio\libmergepdf\Pages;

class FormNgoController extends Controller
{
	protected $view = 'form-ngo';
	protected $merge;

	public function formView($step) {
		if(now() >= "2019-09-13 16:30:00") {
     			return redirect('/')->with('info','<span style="font-size:35px">ขณะนี้สิ้นสุดเวลารับสมัครการเป็นกรรมการสุขภาพแห่งชาติ ตามประกาศคณะกรรมการสรรหากรรมการสุขภาพแห่งชาติฯ แล้ว</span>');
     		}
		if(Auth::check()) {
			if(empty(Auth::user()->detail->suggestPosition)) {
				return redirect('form-ngo-register/2');
			}
		} else {
			if(@$_GET['get_page'] == 1) {
				return redirect('/login?send=ngoregister');
			}
			return redirect('form-ngo-register/1');
		}
		if(@$_GET['get_page'] == 1 && !Auth::check()) {
			return Redirect::to('login');
		} else {
			if(!empty(Auth::user()->suggestPosition)){
				return Redirect::to('form-ngo-register/2?get_page=1');
			} else {

			}

		}
		if($step == 1) {
			// Auth::logout();
		}

		if(Auth::check() && Auth::user()->groupId != 3) {
			return redirect('/')->with('info', 'ไม่สามารถเข้าได้เนื่องจากลงทะเบียนกลุ่มอื่น');
		}

		if(Auth::check() && Auth::user()->groupId == 3 && @$_GET['get_page'] == 1 && Auth::user()->last_step != null) {
			return redirect('form-ngo/1');
		}

		return view('frontend.'. $this->view .'.form-'.$step, ['active' => $step]);
	}

	/**
	 * formPost
	 *
	 * @param  mixed $step
	 * @param  Illuminate\Http\Request $request
	 *
	 * @return void
	 */
	public function formPost($step, Request $request) {
		if(now() >= "2019-09-13 16:30:00") {
			return redirect('/')->with('info','<span style="font-size:35px">ขณะนี้สิ้นสุดเวลารับสมัครการเป็นกรรมการสุขภาพแห่งชาติ ตามประกาศคณะกรรมการสรรหากรรมการสุขภาพแห่งชาติฯ แล้ว</span>');
		}
		switch ($step) {
			case 1:

			if(@Auth::user()->groupId != 4){
				// Auth::logout();
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

		$data['ipAddress'] = $_SERVER["REMOTE_ADDR"];
		$data['action']    = "NGO1";
		$data['dt']        = date("Y-m-d H:i:s");
		$data['members'] = Auth::user()->username;
		Log::create($data);

		return redirect('form-ngo/2');
	}

	public function stepTwo(Request $request) {

		$dataSet = $request->all();

		// Auth::user()->update($request->all());
		// dd($dataSet);
		Auth::user()->update($dataSet);

		$data['ipAddress'] = $_SERVER["REMOTE_ADDR"];
		$data['action']    = "NGO2";
		$data['dt']        = date("Y-m-d H:i:s");
		$data['members'] = Auth::user()->username;
		Log::create($data);

		return redirect('form-ngo/3');

	}

	public function stepThree(Request $request) {
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
			'addressType'                => 'required',
			'tel'                => 'required',
			// 'mobile' 		   => 'required|min:10|max:11',
			'graduated1' 	   => 'required',
			'faculty1' 		   => 'required',
			'institution1' 	   => 'required',
			'yearend1' 		   => 'required',
			'nowWork' 		   => 'max:255|required',
			'nowWorkPlace' 	   => 'max:255|required',
			'nowRole' 		   => 'max:1024|required',
			'pastWork1'          => 'required',
			'pastOrganization1'  => 'required',
			'time1' 		   =>'required',
			// 'pastOrganization1'     =>'required',
			'importantMemo'      =>'required',
			'fromyear1' 		   =>'required',
			'toyear1'      =>'required',
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
		$dataSet = $request->all();

		$dataSet['tel']   = str_replace('-', '', $dataSet['tel']);
		$dataSet['mobile']   = str_replace('-', '', $dataSet['mobile']);
		$dataSet['dateOfBirth'] = $this->dateThaiToDefault($dataSet['dateOfBirth']);

		Auth::user()->detail->update($dataSet);

		unset($dataSet['provinceId']);
		Auth::user()->update($dataSet);

		$data['ipAddress'] = $_SERVER["REMOTE_ADDR"];
		$data['action']    = "NGO3";
		$data['dt']        = date("Y-m-d H:i:s");
		$data['members'] = Auth::user()->username;
		Log::create($data);

		return Redirect::to('form-ngo/4');
	}

	public function stepFour(Request $request) {

		$memberId = Auth::user()->id;
		$uploadGroup = 4;
		$attachFile = $request->only(['uploadBtn01' ,'uploadBtn02', 'uploadBtn033']);



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
		if($request->hasFile('uploadBtn033') || empty($file3)){
			$rule['uploadBtn033'] = 'required|mimes:jpeg,pdf';
		}

		$request->validate($rule, [
			'uploadBtn01.required' => 'กรุณาอัพโหลดข้อมูล : :attribute',
			'uploadBtn02.required' => 'กรุณาอัพโหลดข้อมูล : :attribute',
			'uploadBtn033.required' => 'กรุณาอัพโหลดข้อมูล : :attribute',
		]);

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

		if($request->hasFile('uploadBtn033')) {
			if($attachFile['uploadBtn033']->isValid()) {

				$fileUpload1 = \Helper::uploadFile($attachFile['uploadBtn033'], 'ngo');
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

		$dataSet = $request->only(['vision']);

		$mmember = Auth::user()->detail;

		$mmember->update($dataSet);





		$data['ipAddress'] = $_SERVER["REMOTE_ADDR"];
		$data['action']    = "NGO4";
		$data['dt']        = date("Y-m-d H:i:s");
		$data['members'] = Auth::user()->username;
		Log::create($data);

		return Redirect::to('form-ngo/5');
	}

	public function stepFive(Request $request) {

		// $request->validate(['g-recaptcha-response' => 'recaptcha']);

		// \Mail::to(Auth::user()->email)->send(new \App\Mail\Success());

        $data['ipAddress'] = $_SERVER["REMOTE_ADDR"];
		$data['action']    = "NGO5";
		$data['dt']        = date("Y-m-d H:i:s");
		$data['members'] = Auth::user()->username;
		Log::create($data);

		return redirect('form-ngo/6');
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
	public function stepSix(){
			$year_older = 20;
			$bDate = \Carbon\Carbon::parse(Auth::user()->detail->dateOfBirth);
			$yearNow = \Carbon\Carbon::now()->diffInYears($bDate);
			if($yearNow < $year_older) {
				return redirect('form-ngo/3')->withErrors(['dateOfBirth' => "อายุน้อยกว่า 20 ไม่สามารถลงทะเบียนได้"]);
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
			   
			unset($rule);
			$file1 = Auth::user()->attach()->where('status', 1)->where('use_is', 'copy_personal_card')->first();
			if(empty($file1)){
				$rule['uploadBtn01'] = 'กรุณาอัพโหลดข้อมูล : สำเนาบัตรประจำตัวประชาชน';
			}
			$file2 = Auth::user()->attach()->where('status', 1)->where('use_is', 'personal_photo')->first();
			if(empty($file2)){
				$rule['uploadBtn02'] = 'กรุณาอัพโหลดข้อมูล : รูปถ่าย';
			}
			$file3 = Auth::user()->attach()->where('status', 1)->where('use_is', 'document1')->first();
			if(empty($file3)){
				$rule['uploadBtn033'] = 'กรุณาอัพโหลดข้อมูล : แบบ สช./แบบขอขึ้นทะเบียนองค์กรภาคเอกชนและยืนยันการส่งผู้แทนภาคเอกชน/2562 พร้อมเอกสารหลักฐานประกอบ 1 ชุด';
			}

			if(empty(Auth::user()->detail->pastWork1) || empty(Auth::user()->detail->pastOrganization1) || empty(Auth::user()->detail->time1)) {
				return redirect('form-ngo/4#target1')->withErrors(['pastWork1' => "โปรดระบุข้อมูลนี้", 'pastOrganization1' => "โปรดระบุข้อมูลนี้", 'time1' => "โปรดระบุข้อมูลนี้"]);
			}
			if(!empty($rule))
               {
                    return redirect('form-ngo/4')->withErrors($rule);
			   }

			Auth::user()->update(['status_accept' => 1, 'confirmed_at' => now()->format('Y-m-d H:i:s')]);

			$number = DB::table('number_file')->where('date', now()->format('Y-m-d'))->where('type', 4)->first();

			if (empty($number)) {
				DB::table('number_file')->insert(['type' => 4, 'date' => now()->format('Y-m-d'), 'number'=>1]);
				$numberIs = 1;
			} else {
				$numberIs = $number->number+1;
				DB::table('number_file')->where('id', $number->id)->update(['number'=>$numberIs]);
			}

			$filename_gen = sprintf('nhc-NGO-%03d-%02d',Auth::user()->id, now()->format('d'));

			Auth::user()->detail()->update(['docId' => $filename_gen]);

			$path = $this->genPdf($filename_gen);


			\Mail::to(Auth::user()->email)->send(new \App\Mail\Success($path, 3));

			$data['ipAddress']	= $_SERVER["REMOTE_ADDR"];
			$data['action']    	= "NGOcomplete";
			$data['dt']        	= date("Y-m-d H:i:s");
			$data['members'] 		= Auth::user()->username;
			Log::create($data);



		return back()->with('success', true);
	}

	public function genOnly() {
          try {

			$filename_gen = sprintf('nhc-NGO-%03d-%02d-doc3',Auth::user()->id, now()->format('d'));
			Auth::user()->detail()->update(['docId3' => $filename_gen]);
               $path = $this->genPdf($filename_gen);

               // \Mail::to(Auth::user()->email)->send(new \App\Mail\Success($path, 1));

          } catch (\Exception $e) {
               dd($e);
          }
     }
	public function pdfMerge($header, $file) {
		// Create Header

		if(empty($file->path)) return false;


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

			$pdf->save($path1);

			// $this->merge->addFile($path1);
			// unlink($path1);

			$htmlStr = '<img style="width:500px" src="'. asset($file->path) .'">';
		} else {
			$pdf = \App::make('dompdf.wrapper');

			$pdf->loadHTML('<a href="'. asset($file->path) .'">'. asset($file->path) . '</a> ');

			if (!file_exists(public_path('pdf/asset_professional/'))) {
				mkdir('pdf/asset_professional/', 755, true);
			}

			$path1 = public_path('pdf/asset_professional/'. $file->newName);

			if(file_exists($path1)) {
				unlink($path1);
			}
			$path1 = public_path('pdf/asset_professional/'. pathinfo($file->path)['filename']).".pdf";

			$pdf->save($path1);

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
		if (!file_exists(public_path('pdf/ngo/'))) {
			mkdir('pdf/professional/', 755, true);
		}

		$path = public_path('pdf/ngo/'. $filename_gen .'.pdf');

		if(file_exists($path)) {
			unlink($path);
		}
		event(new \App\Events\FinishRegister(Auth::user(), 2))[0]->save($path);

		$this->merge = new Merger;
		// $this->merge->addFile("pdf/ngo-register/".Auth::user()->detail->docId2.'.pdf');
		$this->merge->addFile($path);

		try {
			// file 1
			$file1 = Auth::user()->attach()->where('status', 1)->where('use_is', 'copy_personal_card')->first();
			$oldFile1 = $this->pdfMerge('สำเนาบัตรประจำตัวประชาชน', $file1);

			// file 2
			$file2 = Auth::user()->attach()->where('status', 1)->where('use_is', 'document1')->first();
			$oldFile2 = $this->pdfMerge('แบบ สช./แบบขอขึ้นทะเบียนองค์กรภาคเอกชนและยืนยันการส่งผู้แทนภาคเอกชน/2562 พร้อมเอกสารหลักฐานประกอบ 1 ชุด',$file2);
			// file 3
			$photo = Auth::user()->attach()->where('status', 1)->where('use_is', 'personal_photo')->first();
			$oldPhoto = $this->pdfMerge('รูปถ่ายหน้าตรงไม่สวมหมวก',$photo);
			if(Auth::user()->detail->legalStastus == 1) {
				// file 3
				$file3 = Auth::user()->attach()->where('status', 1)->where('use_is', 'company_history_copy')->first();
				$oldFile3 = $this->pdfMerge('สำเนาหนังสือสำคัญที่แสดงความเป็นนิติบุคคล',$file3);

				// file 4
				$file4 = Auth::user()->attach()->where('status', 1)->where('use_is', 'document_verify_copy')->first();
				$oldFile4 = $this->pdfMerge('สำเนาหลักฐานที่แสดงถึงวัตถุประสงค์การก่อตั้งองค์กร',$file4);

				// file 5
				$file5 = Auth::user()->attach()->where('status', 1)->where('use_is', 'company_verify_year')->first();
				$oldFile5 = $this->pdfMerge('สำเนาหลักฐานซึ่งแสดงถึงการดำเนินกิจกรรมในกลุ่มองค์กรที่ขอขึ้นทะเบียนในพื้นที่จังหวัดมาแล้วไม่เกิน 3 ปี นับถึงวันที่สมัคร จำนวน 2 กิจกรรมขึ้นไป เช่น โครงการ รายงานการดำเนินโครงการ รูปถ่ายกิจกรรมโดยระบุสถานที่จัดกิจกรรม เป็นต้น',$file5);

				// file 6
				$file6 = Auth::user()->attach()->where('status', 1)->where('use_is', 'personal_copy')->first();
				$oldFile6 = $this->pdfMerge('สำเนาคำสั่งแต่งตั้งประธานองค์กรหรือรายงานการประชุมที่ระบุชื่อและตำแหน่งประธานองค์กร',$file6);

				// file 7
				$file7 = Auth::user()->attach()->where('status', 1)->where('use_is', 'document_verify_has_company_copy')->first();
				$oldFile7 = $this->pdfMerge('สำเนาบัตรประจำตัวประชาชนของประธานองค์กร',$file7);


			} else {
				// file 3
				$file3 = Auth::user()->attach()->where('status', 1)->where('use_is', 'company_history_copy')->first();
				$oldFile3 = $this->pdfMerge('สำเนาหลักฐานที่แสดงถึงวัตถุประสงค์การก่อตั้งองค์กร',$file3);

				// file 4
				$file4 = Auth::user()->attach()->where('status', 1)->where('use_is', 'company_verify_year')->first();
				$oldFile4 = $this->pdfMerge('สำเนาหลักฐานซึ่งแสดงถึงการดำเนินกิจกรรมในพื้นที่จังหวัดนั้นตามกลุ่มองค์กรที่ขอขึ้นทะเบียน มาแล้วไม่เกิน 3 ปี นับถึงวันที่สมัคร จำนวน 2 กิจกรรมขึ้นไป เช่น โครงการ รายงานการดำเนินโครงการ รูปถ่ายกิจกรรม โดยระบุสถานที่จัดกิจกรรม เป็นต้น',$file4);

				// file 5
				$file5 = Auth::user()->attach()->where('status', 1)->where('use_is', 'document_verify_copy')->first();
				$oldFile5 = $this->pdfMerge('สำเนาหนังสือที่แสดงว่าผู้ลงลายมือชื่อในแบบขอขึ้นทะเบียนองค์กรภาคเอกชนเป็นประธาน องค์กร หรือรายงานประชุมที่ระบุชื่อและตำแหน่งประธานองค์กร',$file5);

				// file 6
				$file6 = Auth::user()->attach()->where('status', 1)->where('use_is', 'personal_copy')->first();
				$oldFile6 = $this->pdfMerge('สำเนาบัตรประจำตัวประชาชนของประธานองค์กร',$file6);

				// file 7
				$file7 = Auth::user()->attach()->where('status', 1)->where('use_is', 'document_verify_has_company_copy')->first();
				$oldFile7 = $this->pdfMerge('หนังสือรับรองความมีอยู่และการดำเนินกิจกรรมขององค์กรภาคเอกชนที่ไม่เป็นนิติบุคคล',$file7);


			}
			// save
			$save_path =  'pdf/ngo-merge/'. $filename_gen .'.pdf';
			if(file_exists($save_path)) {
				unlink($save_path);
			}

			$file = \Storage::put($save_path, $this->merge->merge());
			if($oldFile1 != false) unlink($oldFile1);
			if($oldFile2 != false)  unlink($oldFile2);
			if($oldFile3 != false)  unlink($oldFile3);
			if($oldFile4 != false)  unlink($oldFile4);
			if($oldFile5 != false)  unlink($oldFile5);
			if($oldFile6 != false)  unlink($oldFile6);
			if($oldFile7 != false)  unlink($oldFile7);
		} catch (\Exception $e) {
		}
		return $save_path;
	}
}
