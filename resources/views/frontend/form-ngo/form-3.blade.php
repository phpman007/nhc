@extends('frontend.theme.master')

@section('content')
{!! Form::open(['id'=>'form-step']) !!}
<div class="insitepage2f">
	<div class="navication2f">
		<div class="container">
			<ol class="breadcrumb">
				<li><a href="{{ url('/') }}">หน้าหลัก</a></li>
				<li><a href="">สมัคร</a></li>
				<li class="active">ผู้แทนองค์กรภาคเอกชน สมัครเป็นกรรมการสุขภาพแห่งชาติ ขั้นตอนที่ 3</li>
			</ol>
		</div>
	</div><!--end navication2f-->
	<div class="insite-banner2f">
		<div class="control-bannertext2f">
			<div class="container">
				<div class="headline2f">
					<h1>ผู้แทนองค์กรภาคเอกชน</h1>
				</div>
			</div><!--end container-->
		</div><!--end control-bannertext2f-->
		<div class="img-banner2f">
			<img src="{{asset("frontend/images/insite-banner01.jpg")}}" alt="">
		</div>
		<div class="bg-banner"><img src="{{asset("frontend/images/bg-banner.png")}}" alt=""></div>
		<div class="shape-banner"></div>
	</div><!--end insite-banner2f-->
	<div class="control-insitepage2f">
		<div class="container">
			<div class="control-progress2f sixstep">
				<div class="box-line-progress2f">
					<div class="bg-progress2f"></div>
					<div class="line-progress2f">
						<ul>
							<li class="active"><span>&nbsp;</span></li>
							<li class="active"><span>&nbsp;</span></li>
							<li><span>&nbsp;</span></li>
						</ul>
					</div><!--end line-progress2f-->
				</div><!--end box-line-progress2f-->
				<div class="box-step-progress2f">
					<ul class="list-inline">
						@include('frontend.form-professional.step-nav')
					</ul>
				</div><!--end box-step-progress2f-->
				<div class="clear2f"></div>
			</div><!--end control-progress2f-->
			<div class="content-form2f">
				<h4>ผู้แทนองค์กรภาคเอกชน สมัครเป็นกรรมการสุขภาพแห่งชาติ ขั้นตอนที่ 3</h4>
				<div class="headform2f">ข้อมูลประวัติ</div>
				<div class="set-form2f">
					<h5>1.  ข้อมูลทั่วไป</h5>
					<div class="box-input2f">
						<div class="row">
							<div class="col-md-2 col-sm-4 nopaddingright">
								<div class="text-input2f">
									<span>1)</span>
									คำนำหน้า
								</div><!--end text-input2f-->
							</div>
							<div class="col-md-6 col-sm-8">
								<div class="input2f">
									{!! Form::text('nameTitle', Auth::user()->nameTitle, ["class"=>"form-control", "placeholder"=>"นาย/นาง/นางสาว", 'maxlength' => '30', 'readonly' => '']) !!}
									@if($errors->has("nameTitle"))
									<small>{{ $errors->first('nameTitle') }}</small>
									@endif
								</div>
							</div>
						</div><!--end row-->
					</div><!--end box-input2f-->
					<div class="box-input2f">
						<div class="row">
							<div class="col-md-2 col-sm-4 nopaddingright">
								<div class="text-input2f">ชื่อ</div>
							</div>
							<div class="col-md-6 col-sm-8">
								<div class="input2f">
									{!! Form::text('firstname', Auth::user()->firstname, ["class"=>"form-control", "placeholder"=>"ชื่อ", 'readonly' => '']) !!}
									@if($errors->has("firstname"))
									<small>{{ $errors->first('firstname') }}</small>
									@endif
								</div>
							</div>
						</div><!--end row-->
					</div><!--end box-input2f-->
					<div class="box-input2f">
						<div class="row">
							<div class="col-md-2 col-sm-4 nopaddingright">
								<div class="text-input2f">นามสกุล</div>
							</div>
							<div class="col-md-6 col-sm-8">
								<div class="input2f">
									{!! Form::text('lastname', Auth::user()->lastname, ["class"=>"form-control", "placeholder"=>"นามสกุล", 'readonly' => '']) !!}
									@if($errors->has("lastname"))
									<small>{{ $errors->first('lastname') }}</small>
									@endif
								</div>
							</div>
						</div><!--end row-->
					</div><!--end box-input2f-->
					<div class="box-input2f">
						<div class="row">
							<div class="col-md-2 col-sm-4 nopaddingright">
								<div class="text-input2f">
									<span>2)</span>เกิดวันที่
								</div><!--end text-input2f-->
							</div>
							<div class="col-md-6 col-sm-8">
								<div class="control-select-date2f">
									<div class="row">
										<div class="col-md-3 col-sm-3 col-xs-2 nopaddingright">
											<div class="input2f">
												<?php

												$sday = array();
												for($i = 1; $i <= 31; $i++) {
													$sday[$i] = $i;
												}
												?>
												@if(!empty(Auth::user()->detail->dateOfBirth))
												{!! Form::select('sday', $sday, (int)Carbon\Carbon::parse(Auth::user()->detail->dateOfBirth)->format("d"), [ "class"=>"form-control"]) !!}
												@else
												{!! Form::select('sday', $sday, null, [ "class"=>"form-control"]) !!}
												@endif
											</div>
										</div>
										<div class="col-md-5 col-sm-6 col-xs-6 nopaddingright">
											<div class="input2f">
												<?php
												$month = [
													'1' => "มกราคม",
													"2"=>   "กุมภาพันธ์",
													"3"=>  "มีนาคม",
													"4"=>  "เมษายน",
													"5"=>  "พฤษภาคม",
													"6"=>  "มิถุนายน",
													"7"=>  "กรกฎาคม",
													"8"=>  "สิงหาคม",
													"9"=>  "กันยายน",
													"10"=>  "ตุลาคม",
													"11"=>  "พฤศจิกายน",
													"12"=>  "ธันวาคม",
												];
												?>
												@if(!empty(Auth::user()->detail->dateOfBirth))
												{!! Form::select('smonth', $month, (int)Carbon\Carbon::parse(Auth::user()->detail->dateOfBirth)->format("m"), [ "class"=>"form-control"]) !!}
												@else
												{!! Form::select('smonth', $month, null, [ "class"=>"form-control"]) !!}
												@endif
											</div>
										</div>
										<div class="col-md-4 col-sm-3 col-xs-4 nopaddingright">
											<div class="input2f">
												<?php

												$syear = array();
												for($i = (date('Y')); $i >= (date('Y')-115); $i--) {
													$syear[$i+543] = $i+543;
												}
												?>
												@if(!empty(Auth::user()->detail->dateOfBirth))
												{!! Form::select('syear', $syear, (int)Carbon\Carbon::parse(Auth::user()->detail->dateOfBirth)->format("Y") +543, [ "class"=>"form-control"]) !!}
												@else
												{!! Form::select('syear', $syear, null, [ "class"=>"form-control"]) !!}
												@endif
											</div>
										</div>
									</div><!--end row-->
									@if($errors->has('dateOfBirth'))
									<small style="color:red">{{ $errors->first('dateOfBirth') }}</small>
									@endif
								</div><!--end control-select-date2f-->
							</div>
						</div><!--end row-->
					</div><!--end box-input2f-->
					<div class="box-input2f">
						<div class="row">
							<div class="col-md-2 col-sm-4 nopaddingright">
								<div class="text-input2f">อายุ(ปี)</div>
							</div>
							<div class="col-md-6 col-sm-8">
								<div class="input2f">
									<input readonly="" type="text" id="yearOld" name="yearOld" value="{{ !empty(@Auth::user()->detail->yearOld) ? @Auth::user()->detail->yearOld : old('yearOld') }}" class="form-control" placeholder="อายุ">

									<div class="t-notice">กรรมการสุขภาพแห่งชาติจะต้องมีอายุไม่ต่ำกว่า 20 ปี บริบูรณ์  </div>
								</div>
							</div>
						</div><!--end row-->
					</div><!--end box-input2f-->
					<div class="box-input2f">
						<div class="row">
							<div class="col-md-2 col-sm-4 nopaddingright">
								<div class="text-input2f">เพศ</div>
							</div>
							<div class="col-md-6 col-sm-8">
								<div class="input-radio2f inline-check">
									<div class="box-radio2f">
										{{ Form::radio('genderId',1, @Auth::user()->detail->genderId == 1 ? "checked" :'checked' , ['id' => 'test1']) }}
										<label for="test1">ชาย</label>
									</div>
									<div class="box-radio2f">
										{{ Form::radio('genderId',2, @Auth::user()->detail->genderId == 2 ? "checked" :'' , ['id' => 'test2']) }}
										<label for="test2">หญิง</label>
									</div>
									<div class="box-radio2f">
										{{ Form::radio('genderId',3, @Auth::user()->detail->genderId == 3 ? "checked" :'' , ['id' => 'test3']) }}
										<label for="test3">นักบวช/สมณะ</label>
									</div>
								</div><!--end input-radio2f-->
							</div>
						</div><!--end row-->
					</div><!--end box-input2f-->
					<div class="box-input2f">
						<div class="text-input2f">
							<span>3)</span>สถานที่ ที่สามารถติดต่อได้สะดวก
						</div><!--end text-input2f-->
					</div><!--end box-input2f-->
					<div class="box-input2f">
						<div class="row">
							<div class="col-md-2 col-sm-4 nopaddingright"></div>
							<div class="col-md-6 col-sm-8">
								<div class="input-radio2f inline-check">
									<div class="box-radio2f">
										{{ Form::radio('addressType', 1,  empty(@Auth::user()->detail->addressType) ? 'checked' : @Auth::user()->detail->addressType == 1 ? "checked" :'', ['id'=>'home']) }}
										<label for="home">บ้าน</label>
									</div>
									<div class="box-radio2f">
										{{ Form::radio('addressType', 2, @Auth::user()->detail->addressType == 2 ? "checked" :'', ['id'=>'office']) }}
										<label for="office">ที่ทำงาน</label>
									</div>

									@if($errors->has('addressType'))
									<small>{{ $errors->first('addressType') }}</small>
									@endif
								</div><!--end input-radio2f-->
							</div>
						</div><!--end row-->
					</div><!--end box-input2f-->
					<div class="box-input2f">
						<div class="row">
							<div class="col-md-2 col-sm-4 nopaddingright">
								<div class="text-input2f"></div>
							</div>
							<div class="col-md-6 col-sm-8">
								<div class="input2f">
									{!! Form::text('workPlaceName', @Auth::user()->detail->workPlaceName, ["class"=>"form-control" ,"placeholder"=>"สถานที่ทำงาน"]) !!}
									@if($errors->has('workPlaceName'))
									<small>{{ $errors->first('workPlaceName') }}</small>
									@endif
								</div>
							</div>
						</div><!--end row-->
					</div><!--end box-input2f-->
					<div class="box-input2f">
						<div class="row">
							<div class="col-md-2 col-sm-4 nopaddingright">
								<div class="text-input2f">เลขที่</div>
							</div>
							<div class="col-md-6 col-sm-8">
								<div class="input2f">
									{!! Form::text('no', @Auth::user()->detail->no, ["class"=>"form-control" ,"placeholder"=>"เลขที่", 'maxlength' => 7]) !!}
									@if($errors->has('no'))
									<small>{{ $errors->first('no') }}</small>
									@endif
								</div>
							</div>
						</div><!--end row-->
					</div><!--end box-input2f-->
					<div class="box-input2f">
						<div class="row">
							<div class="col-md-2 col-sm-4 nopaddingright">
								<div class="text-input2f">หมู่ที่</div>
							</div>
							<div class="col-md-6 col-sm-8">
								<div class="input2f">
									{!! Form::text('moo', @Auth::user()->detail->moo, ["class"=>"form-control" ,"placeholder"=>"หมู่ที่", 'maxlength' => 10]) !!}
									@if($errors->has('moo'))
									<small>{{ $errors->first('moo') }}</small>
									@endif
								</div>
							</div>
						</div><!--end row-->
					</div><!--end box-input2f-->
					<div class="box-input2f">
						<div class="row">
							<div class="col-md-2 col-sm-4 nopaddingright">
								<div class="text-input2f">ตรอก/ซอย</div>
							</div>
							<div class="col-md-6 col-sm-8">
								<div class="input2f">
									{!! Form::text('soi', @Auth::user()->detail->soi, ["class"=>"form-control" ,"placeholder"=>"ซอย", 'maxlength' => 150]) !!}
									@if($errors->has('soi'))
									<small>{{ $errors->first('soi') }}</small>
									@endif
								</div>
							</div>
						</div><!--end row-->
					</div><!--end box-input2f-->
					<div class="box-input2f">
						<div class="row">
							<div class="col-md-2 col-sm-4 nopaddingright">
								<div class="text-input2f">ถนน</div>
							</div>
							<div class="col-md-6 col-sm-8">
								<div class="input2f">
									{!! Form::text('street', @Auth::user()->detail->street, ["class"=>"form-control" ,"placeholder"=>"ถนน", 'maxlength' => 150]) !!}
									@if($errors->has('street'))
									<small>{{ $errors->first('street') }}</small>
									@endif
								</div>
							</div>
						</div><!--end row-->
					</div><!--end box-input2f-->

					<div class="box-input2f">
						<div class="row">
							<div class="col-md-2 col-sm-4 nopaddingright">
								<div class="text-input2f">จังหวัด</div>
							</div>
							<div class="col-md-6 col-sm-8">
								<div class="input2f">
									<?php $provide = \DB::table('provinces')->select('province', 'province_code')->groupBy('province', 'province_code')->get()->pluck('province', 'province_code') ?>
									{!! Form::select('provinceId', $provide, null, ['class'=>'form-control select2', 'placeholder' => 'จังหวัด', 'id'=>'provinceId']) !!}
									@if($errors->has('provinceId'))
									<small>{{ $errors->first('provinceId') }}</small>
									@endif
								</div>
							</div>
						</div><!--end row-->
					</div><!--end box-input2f-->
					<div class="box-input2f">
						<div class="row">
							<div class="col-md-2 col-sm-4 nopaddingright">
								<div class="text-input2f">อำเภอ/เขต</div>
							</div>
							<div class="col-md-6 col-sm-8">
								<div class="input2f">
									{!! Form::select('districtId', [], null, ['class'=>'form-control select2', 'placeholder' => 'อำเภอ/เขต', 'id'=>'districtId']) !!}
									@if($errors->has('districtId'))
									<small>{{ $errors->first('districtId') }}</small>
									@endif
								</div>
							</div>
						</div><!--end row-->
					</div><!--end box-input2f-->
					<div class="box-input2f">
						<div class="row">
							<div class="col-md-2 col-sm-4 nopaddingright">
								<div class="text-input2f">ตำบล/แขวง</div>
							</div>
							<div class="col-md-6 col-sm-8">
								<div class="input2f">

									{!! Form::select('subDistrictId', [], null, ['class'=>'form-control select2', 'placeholder' => 'ตำบล/แขวง', 'id'=>'subDistrictId']) !!}
									@if($errors->has('subDistrictId'))
									<small>{{ $errors->first('subDistrictId') }}</small>
									@endif
								</div>
							</div>
						</div><!--end row-->
					</div><!--end box-input2f-->
					<div class="box-input2f">
						<div class="row">
							<div class="col-md-2 col-sm-4 nopaddingright">
								<div class="text-input2f">รหัสไปรษณีย์</div>
							</div>
							<div class="col-md-6 col-sm-8">
								<div class="input2f">
									{!! Form::text('zipCode',  Auth::user()->detail->zipCode , ["class"=>"form-control" , "placeholder"=>"รหัสไปรษณีย์", 'maxlength' => 7]) !!}
									@if($errors->has('zipCode'))
									<small>{{ $errors->first('zipCode') }}</small>
									@endif
								</div>
							</div>
						</div><!--end row-->
					</div><!--end box-input2f-->
					<div class="box-input2f">
						<div class="row">
							<div class="col-md-2 col-sm-4 nopaddingright">
								<div class="text-input2f">เบอร์โทรศํพท์ที่ 1</div>
							</div>
							<div class="col-md-6 col-sm-8">
								<div class="input2f">
									{!! Form::text('tel', Auth::user()->detail->tel , ['id'=>'tel','class'=>'form-control', 'placeholder'=> 'เบอร์โทรศํพท์ที่ 1', 'maxlength' => 50]) !!}
									@if($errors->has('tel'))
									<small>{{ $errors->first('tel') }}</small>
									@endif
								</div>
							</div>
							<!-- <div class="col-md-2 col-sm-2">
							<div class="text-to">ต่อ</div>
							<div class="input2f">
							<?php $tel_slarp = substr(Auth::user()->detail->tel, 9) ?>
							{!! Form::text('tel_slarp', $tel_slarp , ['id'=>'tel','class'=>'form-control']) !!}

						</div>
					</div> -->
				</div><!--end row-->
			</div><!--end box-input2f-->
			<div class="box-input2f">
				<div class="row">
					<div class="col-md-2 col-sm-4 nopaddingright">
						<div class="text-input2f">เบอร์โทรศํพท์ที่ 2</div>
					</div>
					<div class="col-md-6 col-sm-8">
						<div class="input2f">
							{!! Form::text('mobile', Auth::user()->detail->mobile, ['id'=>'mobile', 'class'=>"form-control", 'placeholder'=>"เบอร์โทรศํพท์ที่ 2", 'maxlength' => 50]) !!}
							@if($errors->has('mobile'))
							<small>{{ $errors->first('mobile') }}</small>
							@endif
						</div>
					</div>
				</div><!--end row-->
			</div><!--end box-input2f-->
			<h5>2.  ประวัติการศึกษา (เรียงจากวุฒิการศึกษาสูงสุดลงไปตามลำดับ)</h5>
			<div class="box-input2f">
				<div class="row">
					<div class="col-md-1 col-sm-1 col-xs-1 nopaddingright">
						<div class="text-input2f"><span>1)</span></div>
					</div>
					<div class="col-md-2 col-sm-2 col-xs-11">
						<div class="input2f">
							<?php
							$optionsArray = ["ปริญญาเอก", "ปริญญาโท", "ปริญญาตรี", "ต่ำกว่าปริญญาตรี", 'อื่นๆ'];
							?>
							{!! Form::select('graduated1', $optionsArray, Auth::user()->detail->graduated1, [ 'class'=>"form-control", 'placeholder'=>"วุฒิการศึกษา"]) !!}
							@if($errors->has('graduated1'))
							<small>{{ $errors->first('graduated1') }}</small>
							@endif
						</div>
					</div>
					<div class="col-md-1 col-sm-0 col-xs-1 nopadding text-major">
						<div class="text-input2f nopadding">สาขา</div>
					</div>
					<div class="col-md-2 col-sm-2 col-xs-12">
						<div class="input2f">
							{!! Form::text('faculty1', Auth::user()->detail->faculty1, [ 'class'=>"form-control", 'placeholder'=>"สาขา"]) !!}
							@if($errors->has('faculty1'))
							<small>{{ $errors->first('faculty1') }}</small>
							@endif
						</div>
					</div>
					<div class="col-md-3 col-sm-5 col-xs-12">
						<div class="input2f">
							{!! Form::text('institution1', Auth::user()->detail->institution1, [ 'class'=>"form-control", 'placeholder'=>"สถาบัน"]) !!}
							@if($errors->has('institution1'))
							<small>{{ $errors->first('institution1') }}</small>
							@endif
						</div>
					</div>
					<div class="col-md-2 col-sm-2 col-xs-12">
						<div class="input2f">
							{!! Form::number('yearend1', Auth::user()->detail->yearend1, [ 'class'=>"form-control", 'placeholder'=>"ปีที่จบ"]) !!}
							@if($errors->has('yearend1'))
							<small>{{ $errors->first('yearend1') }}</small>
							@endif
						</div>
					</div>
				</div><!--end row-->
			</div><!--end box-input2f-->
			<div class="box-input2f">
				<div class="row">
					<div class="col-md-1 col-sm-1 col-xs-1 nopaddingright">
						<div class="text-input2f"><span>2)</span></div>
					</div>
					<div class="col-md-2 col-sm-2 col-xs-11">
						<div class="input2f">
							{!! Form::select('graduated2', $optionsArray, Auth::user()->detail->graduated2, [ 'class'=>"form-control", 'placeholder'=>"วุฒิการศึกษา"]) !!}
						</div>
					</div>
					<div class="col-md-1 col-sm-0 col-xs-1 nopadding text-major">
						<div class="text-input2f nopadding">สาขา</div>
					</div>
					<div class="col-md-2 col-sm-2 col-xs-11">
						<div class="input2f">
							{!! Form::text('faculty2', Auth::user()->detail->faculty2, [ 'class'=>"form-control", 'placeholder'=>"สาขา"]) !!}
						</div>
					</div>
					<div class="col-md-3 col-sm-5 col-xs-12">
						<div class="input2f">
							{!! Form::text('institution2', Auth::user()->detail->institution2, [ 'class'=>"form-control", 'placeholder'=>"สถาบัน"]) !!}
							@if($errors->has('institution2'))
							<small>{{ $errors->first('institution2') }}</small>
							@endif
						</div>
					</div>
					<div class="col-md-2 col-sm-2 col-xs-12">
						<div class="input2f">
							{!! Form::number('yearend2', Auth::user()->detail->yearend2, [ 'class'=>"form-control", 'placeholder'=>"ปีที่จบ"]) !!}
							@if($errors->has('yearend2'))
							<small>{{ $errors->first('yearend2') }}</small>
							@endif
						</div>
					</div>
				</div><!--end row-->
			</div><!--end box-input2f-->
			<div class="box-input2f">
				<div class="row">
					<div class="col-md-1 col-sm-1 col-xs-1 nopaddingright">
						<div class="text-input2f"><span>3)</span></div>
					</div>
					<div class="col-md-2 col-sm-2 col-xs-11">
						<div class="input2f">
							{!! Form::select('graduated3', $optionsArray, Auth::user()->detail->graduated3, [ 'class'=>"form-control", 'placeholder'=>"วุฒิการศึกษา"]) !!}
						</div>
					</div>
					<div class="col-md-1 col-sm-0 col-xs-1 nopadding text-major">
						<div class="text-input2f nopadding">สาขา</div>
					</div>
					<div class="col-md-2 col-sm-2 col-xs-12">
						<div class="input2f">
							{!! Form::text('faculty3', Auth::user()->detail->faculty3, [ 'class'=>"form-control", 'placeholder'=>"สาขา"]) !!}
						</div>
					</div>
					<div class="col-md-3 col-sm-5 col-xs-12">
						<div class="input2f">
							{!! Form::text('institution3', Auth::user()->detail->institution3, [ 'class'=>"form-control", 'placeholder'=>"สถาบัน"]) !!}
							@if($errors->has('institution3'))
							<small>{{ $errors->first('institution3') }}</small>
							@endif
						</div>
					</div>
					<div class="col-md-2 col-sm-2 col-xs-12">
						<div class="input2f">
							{!! Form::number('yearend3', Auth::user()->detail->yearend3, [ 'class'=>"form-control", 'placeholder'=>"ปีที่จบ"]) !!}
							@if($errors->has('yearend3'))
							<small>{{ $errors->first('yearend3') }}</small>
							@endif
						</div>
					</div>
				</div><!--end row-->
			</div><!--end box-input2f-->
			<div class="box-input2f">
				<div class="row">
					<div class="col-md-1 col-sm-1 col-xs-1 nopaddingright">
						<div class="text-input2f"><span>4)</span></div>
					</div>
					<div class="col-md-2 col-sm-2 col-xs-11">
						<div class="input2f">
							{!! Form::select('graduated4', $optionsArray, Auth::user()->detail->graduated4, [ 'class'=>"form-control", 'placeholder'=>"วุฒิการศึกษา"]) !!}
						</div>
					</div>
					<div class="col-md-1 col-sm-0 col-xs-1 nopadding text-major">
						<div class="text-input2f nopadding">สาขา</div>
					</div>
					<div class="col-md-2 col-sm-2 col-xs-11">
						<div class="input2f">
							{!! Form::text('faculty4', Auth::user()->detail->faculty4, [ 'class'=>"form-control", 'placeholder'=>"สาขา"]) !!}
						</div>
					</div>
					<div class="col-md-3 col-sm-5 col-xs-12">
						<div class="input2f">
							{!! Form::text('institution4', Auth::user()->detail->institution4, [ 'class'=>"form-control", 'placeholder'=>"สถาบัน"]) !!}
							@if($errors->has('institution4'))
							<small>{{ $errors->first('institution4') }}</small>
							@endif
						</div>
					</div>
					<div class="col-md-2 col-sm-2 col-xs-12">
						<div class="input2f">
							{!! Form::number('yearend4', Auth::user()->detail->yearend4, [ 'class'=>"form-control", 'placeholder'=>"ปีที่จบ"]) !!}
							@if($errors->has('yearend4'))
							<small>{{ $errors->first('yearend4') }}</small>
							@endif
						</div>
					</div>
				</div><!--end row-->
			</div><!--end box-input2f-->
			<div class="box-input2f">
				<div class="row">
					<div class="col-md-1 col-sm-1 col-xs-1 nopaddingright">
						<div class="text-input2f"><span>5)</span></div>
					</div>
					<div class="col-md-2 col-sm-2 col-xs-11">
						<div class="input2f">
							{!! Form::select('graduated5', $optionsArray, Auth::user()->detail->graduated5, [ 'class'=>"form-control", 'placeholder'=>"วุฒิการศึกษา"]) !!}
						</div>
					</div>
					<div class="col-md-1 col-sm-1 col-xs-1 nopadding text-major">
						<div class="text-input2f nopadding">สาขา</div>
					</div>
					<div class="col-md-2 col-sm-2 col-xs-11">
						<div class="input2f">
							{!! Form::text('faculty5', Auth::user()->detail->faculty5, [ 'class'=>"form-control", 'placeholder'=>"สาขา"]) !!}
						</div>
					</div>
					<div class="col-md-3 col-sm-5 col-xs-12">
						<div class="input2f">
							{!! Form::text('institution5', Auth::user()->detail->institution5, [ 'class'=>"form-control", 'placeholder'=>"สถาบัน"]) !!}
							@if($errors->has('institution5'))
							<small>{{ $errors->first('institution5') }}</small>
							@endif
						</div>
					</div>
					<div class="col-md-2 col-sm-2 col-xs-12">
						<div class="input2f">
							{!! Form::number('yearend5', Auth::user()->detail->yearend5, [ 'class'=>"form-control", 'placeholder'=>"ปีที่จบ"]) !!}
							@if($errors->has('yearend5'))
							<small>{{ $errors->first('yearend5') }}</small>
							@endif
						</div>
					</div>
				</div><!--end row-->
			</div><!--end box-input2f-->
			<h5>3.  ประวัติการทำงาน</h5>
			<div class="box-input2f">
				<div class="text-input2f"><span>1)</span>หน้าที่การงานและความรับผิดชอบในปัจจุบัน</div>
			</div><!--end box-input2f-->
			<div class="box-input2f">
				<div class="row">
					<div class="col-md-2 col-sm-4 nopaddingright">
						<div class="text-input2f title-sm">ปัจจุบันปฏิบัติหน้าที่</div>
					</div>
					<div class="col-md-6 col-sm-8">
						<div class="input2f">
							{!! Form::textarea('nowWork',  Auth::user()->detail->nowWork, ['rows'=>"4" ,'cols'=>"40", 'onkeyup'=>"countCharSet(this, 255, 'charNum-2')" ,'class'=>"form-control" ,'placeholder'=>"ปัจจุบันปฏิบัติหน้าที่"]) !!}

							ท่านพิมพ์ได้อีก <span id="charNum-2">255</span> ตัวอักษร
							@if($errors->has('nowWork'))
							<small>{{ $errors->first('nowWork') }}</small>
							@endif
						</div>
					</div>
				</div><!--end row-->
			</div><!--end box-input2f-->
			<div class="box-input2f">
				<div class="row">
					<div class="col-md-2 col-sm-4 nopaddingright">
						<div class="text-input2f title-sm">สถานที่ปฏิบัติงาน</div>
					</div>
					<div class="col-md-6 col-sm-8">
						<div class="input2f">
							{!! Form::textarea('nowWorkPlace',  Auth::user()->detail->nowWorkPlace, ['rows'=>"4", 'onkeyup'=>"countCharSet(this, 255, 'charNum-3')" ,'cols'=>"40" ,'class'=>"form-control" ,'placeholder'=>"องค์กร"]) !!}
							ท่านพิมพ์ได้อีก <span id="charNum-3">255</span> ตัวอักษร
							@if($errors->has('nowWorkPlace'))
							<small>{{ $errors->first('nowWorkPlace') }}</small>
							@endif
						</div>
					</div>
				</div><!--end row-->
			</div><!--end box-input2f-->
			<div class="box-input2f">
				<div class="row">
					<div class="col-md-2 col-sm-4 nopaddingright">
						<div class="text-input2f title-sm">งานในความรับผิดชอบ</div>
					</div>
					<div class="col-md-6 col-sm-8">
						<div class="input2f">
							{!! Form::textarea('nowRole',  Auth::user()->detail->nowRole, ['rows'=>"4" ,'cols'=>"40", 'onkeyup'=>"countCharSet(this, 800, 'charNum-4')" ,'class'=>"form-control" ,'placeholder'=>"งานในความรับผิดชอบ"]) !!}
							ท่านพิมพ์ได้อีก <span id="charNum-4">800</span> ตัวอักษร
							@if($errors->has('nowRole'))
							<small>{{ $errors->first('nowRole') }}</small>
							@endif
						</div>
					</div>
				</div><!--end row-->
			</div><!--end box-input2f-->
			<div class="box-input2f">
				<div class="text-input2f"><span>2)</span>การปฏิบัติหน้าที่ในอดีต  (โปรดระบุเฉพาะหน้าที่ที่สำคัญ)</div>
			</div><!--end box-input2f-->
			<div class="text-titlenumber"><span>ลำดับที่ 1</span></div>
			<div class="box-input2f">
				<div class="row">
					<div class="col-md-2 col-sm-4 nopaddingright">
						<div class="text-input2f title-sm">ปฏิบัติหน้าที่</div>
					</div>
					<div class="col-md-6 col-sm-8">
						<div class="input2f">
							{!! Form::textarea('pastWork1', Auth::user()->detail->pastWork1, [ 'class'=>"form-control", 'placeholder'=>"ปฏิบัติหน้าที่","rows"=>3, 'onkeyup' => 'countCharSet(this, 128, "charNumKs-1")']) !!}
							ท่านพิมพ์ได้อีก <span id="charNumKs-1">128</span> ตัวอักษร
							@if($errors->has('pastWork1'))
							<small>{{ $errors->first('pastWork1') }}</small>
							@endif
						</div>
					</div>
				</div><!--end row-->
			</div><!--end box-input2f-->
			<div class="box-input2f">
				<div class="row">
					<div class="col-md-2 col-sm-4 nopaddingright">
						<div class="text-input2f title-sm">องค์กร</div>
					</div>
					<div class="col-md-6 col-sm-8">
						<div class="input2f">
							{!! Form::textarea('pastOrganization1', Auth::user()->detail->pastOrganization1, [ 'class'=>"form-control", 'placeholder'=>"องค์กร","rows"=>3, 'onkeyup' => 'countCharSet(this, 128, "charNumKs-2")']) !!}
							ท่านพิมพ์ได้อีก <span id="charNumKs-2">128</span> ตัวอักษร
							@if($errors->has('pastOrganization1'))
							<small>{{ $errors->first('pastOrganization1') }}</small>
							@endif
						</div>
					</div>
				</div><!--end row-->
			</div><!--end box-input2f-->
			<div class="box-input2f">
				<div class="row">
					<div class="col-md-2 col-sm-4 nopaddingright">
						<div class="text-input2f title-sm">จากปีที่</div>
					</div>
					<div class="col-md-3 col-sm-3">
						<div class="input2f">
							{!! Form::select('fromyear1', $syear, Auth::user()->detail->fromyear1, [ 'class'=>"form-control", 'id'=>"fromyear1", 'placeholder'=>"เลือกข้อมูล"]) !!}
							@if($errors->has('fromyear1'))
							<small>{{ $errors->first('fromyear1') }}</small>
							@endif
						</div>
					</div>
					<div class="col-md-1 col-sm-2 nopaddingright">
						<div class="text-input2f title-sm">ถึง</div>
					</div>
					<div class="col-md-3 col-sm-3">
						<div class="input2f">
							{!! Form::select('toyear1', $syear, Auth::user()->detail->toyear1, [ 'class'=>"form-control", 'id'=>"toyear1", 'placeholder'=>"เลือกข้อมูล"]) !!}
							@if($errors->has('toyear1'))
							<small>{{ $errors->first('toyear1') }}</small>
							@endif
						</div>
					</div>
				</div><!--end row-->
			</div><!--end box-input2f-->
			<div class="box-input2f">
				<div class="row">
					<div class="col-md-2 col-sm-4 nopaddingright">
						<div class="text-input2f title-sm">ระยะเวลาการปฏิบัติหน้าที่</div>
					</div>
					<div class="col-md-6 col-sm-8">
						<div class="input2f">
							{!! Form::text('time1', Auth::user()->detail->time1, [ 'class'=>"form-control ", 'placeholder'=>"ระยะเวลาการปฏิบัติหน้าที่", 'id'=>"time1"]) !!}
							@if($errors->has('time1'))
							<small>{{ $errors->first('time1') }}</small>
							@endif
						</div>
					</div>
				</div><!--end row-->
			</div><!--end box-input2f-->
			<div class="text-titlenumber"><span>ลำดับที่ 2</span></div>
			<div class="box-input2f">
				<div class="row">
					<div class="col-md-2 col-sm-4 nopaddingright">
						<div class="text-input2f title-sm">ปฏิบัติหน้าที่</div>
					</div>
					<div class="col-md-6 col-sm-8">
						<div class="input2f">
							{!! Form::textarea('pastWork2', Auth::user()->detail->pastWork2, [ 'class'=>"form-control", 'placeholder'=>"ปฏิบัติหน้าที่","rows"=>3, 'onkeyup' => 'countCharSet(this, 128, "charNumKs-3")']) !!}
							ท่านพิมพ์ได้อีก <span id="charNumKs-3">128</span> ตัวอักษร
						</div>
					</div>
				</div><!--end row-->
			</div><!--end box-input2f-->
			<div class="box-input2f">
				<div class="row">
					<div class="col-md-2 col-sm-4 nopaddingright">
						<div class="text-input2f title-sm">องค์กร</div>
					</div>
					<div class="col-md-6 col-sm-8">
						<div class="input2f">
							{!! Form::textarea('pastOrganization2', Auth::user()->detail->pastOrganization2, [ 'class'=>"form-control", 'placeholder'=>"องค์กร","rows"=>3, 'onkeyup' => 'countCharSet(this, 128, "charNumKs-4")']) !!}
							ท่านพิมพ์ได้อีก <span id="charNumKs-4">128</span> ตัวอักษร
						</div>
					</div>
				</div><!--end row-->
			</div><!--end box-input2f-->
			<div class="box-input2f">
				<div class="row">
					<div class="col-md-2 col-sm-4 nopaddingright">
						<div class="text-input2f title-sm">จากปีที่</div>
					</div>
					<div class="col-md-3 col-sm-3">
						<div class="input2f">
							{!! Form::select('fromyear2', $syear, Auth::user()->detail->fromyear2, [ 'class'=>"form-control", 'id'=>"fromyear2", 'placeholder'=>"เลือกข้อมูล"]) !!}
							@if($errors->has('fromyear2'))
							<small>{{ $errors->first('fromyear2') }}</small>
							@endif
						</div>
					</div>
					<div class="col-md-1 col-sm-2 nopaddingright">
						<div class="text-input2f title-sm">ถึง</div>
					</div>
					<div class="col-md-3 col-sm-3">
						<div class="input2f">
							{!! Form::select('toyear2', $syear, Auth::user()->detail->toyear2, [ 'class'=>"form-control", 'id'=>"toyear2", 'placeholder'=>"เลือกข้อมูล"]) !!}
							@if($errors->has('toyear2'))
							<small>{{ $errors->first('toyear2') }}</small>
							@endif
						</div>
					</div>
				</div><!--end row-->
			</div><!--end box-input2f-->
			<div class="box-input2f">
				<div class="row">
					<div class="col-md-2 col-sm-4 nopaddingright">
						<div class="text-input2f title-sm">ระยะเวลาการปฏิบัติหน้าที่</div>
					</div>
					<div class="col-md-6 col-sm-8">
						<div class="input2f">
							{!! Form::text('time2', Auth::user()->detail->time2, [ 'class'=>"form-control", 'placeholder'=>"ระยะเวลาการปฏิบัติหน้าที่", 'id'=>"time2"]) !!}
						</div>
					</div>
				</div><!--end row-->
			</div><!--end box-input2f-->
			<div class="text-titlenumber"><span>ลำดับที่ 3</span></div>
			<div class="box-input2f">
				<div class="row">
					<div class="col-md-2 col-sm-4 nopaddingright">
						<div class="text-input2f title-sm">ปฏิบัติหน้าที่</div>
					</div>
					<div class="col-md-6 col-sm-8">
						<div class="input2f">
							{!! Form::textarea('pastWork3', Auth::user()->detail->pastWork3, [ 'class'=>"form-control", 'placeholder'=>"ปฏิบัติหน้าที่","rows"=>3, 'onkeyup' => 'countCharSet(this, 128, "charNumKs-5")']) !!}
							ท่านพิมพ์ได้อีก <span id="charNumKs-5">128</span> ตัวอักษร
						</div>
					</div>
				</div><!--end row-->
			</div><!--end box-input2f-->
			<div class="box-input2f">
				<div class="row">
					<div class="col-md-2 col-sm-4 nopaddingright">
						<div class="text-input2f title-sm">องค์กร</div>
					</div>
					<div class="col-md-6 col-sm-8">
						<div class="input2f">
							{!! Form::textarea('pastOrganization3', Auth::user()->detail->pastOrganization3, [ 'class'=>"form-control", 'placeholder'=>"องค์กร","rows"=>3, 'onkeyup' => 'countCharSet(this, 128, "charNumKs-6")']) !!}
							ท่านพิมพ์ได้อีก <span id="charNumKs-6">128</span> ตัวอักษร
						</div>
					</div>
				</div><!--end row-->
			</div><!--end box-input2f-->
			<div class="box-input2f">
				<div class="row">
					<div class="col-md-2 col-sm-4 nopaddingright">
						<div class="text-input2f title-sm">จากปีที่</div>
					</div>
					<div class="col-md-3 col-sm-3">
						<div class="input2f">
							{!! Form::select('fromyear3', $syear, Auth::user()->detail->fromyear3, [ 'class'=>"form-control", 'id'=>"fromyear3", 'placeholder'=>"เลือกข้อมูล"]) !!}
							@if($errors->has('fromyear3'))
							<small>{{ $errors->first('fromyear3') }}</small>
							@endif
						</div>
					</div>
					<div class="col-md-1 col-sm-2 nopaddingright">
						<div class="text-input2f title-sm">ถึง</div>
					</div>
					<div class="col-md-3 col-sm-3">
						<div class="input2f">
							{!! Form::select('toyear3', $syear, Auth::user()->detail->toyear3, [ 'class'=>"form-control", 'id'=>"toyear3", 'placeholder'=>"เลือกข้อมูล"]) !!}
							@if($errors->has('toyear3'))
							<small>{{ $errors->first('toyear3') }}</small>
							@endif
						</div>
					</div>
				</div><!--end row-->
			</div><!--end box-input2f-->
			<div class="box-input2f">
				<div class="row">
					<div class="col-md-2 col-sm-4 nopaddingright">
						<div class="text-input2f title-sm">ระยะเวลาการปฏิบัติหน้าที่</div>
					</div>
					<div class="col-md-6 col-sm-8">
						<div class="input2f">
							{!! Form::text('time3', Auth::user()->detail->time3, [ 'class'=>"form-control", 'placeholder'=>"ระยะเวลาการปฏิบัติหน้าที่", 'id'=>"time3"]) !!}
						</div>
					</div>
				</div><!--end row-->
			</div><!--end box-input2f-->
			<div class="box-input2f">
				<div class="text-input2f"><span>3)</span>ประสบการณ์สำคัญหรือประสบการณ์ที่ภาคภูมิใจที่สัมพันธ์กับประเภทกลุ่มผู้แทนองค์กรภาคเอกชนที่เลือกสมัคร<br>(ท่านสามารถกรอกตัวอักษรได้ 1024 ตัวอักษร)</div>
			</div><!--end box-input2f-->
			<div class="box-input2f">
				<div class="row">

					<div class="col-md-12">
						<div class="input2f paddingleft20">
							{!! Form::textarea('importantMemo',  Auth::user()->detail->importantMemo, ["maxlength"=>'1024','rows'=>"4" ,'cols'=>"40" ,'class'=>"form-control"
							,"onkeyup"=>"countChar(this)" ,'placeholder'=>"ประสบการณ์สำคัญหรือประสบการณ์ที่ภาคภูมิใจที่สัมพันธ์กับประเภทกลุ่มผู้ทรงคุณวุฒิที่เลือกสมัคร (ท่านสามารถกรอกตัวอักษรได้ 1024 ตัวอักษร)"]) !!}

							ท่านพิมพ์ได้อีก <span id="charNum">1024</span> ตัวอักษร
							@if($errors->has('importantMemo'))
							<small>{{ $errors->first('importantMemo') }}</small>
							@endif
						</div>
					</div>
				</div><!--end row-->
			</div><!--end box-input2f-->
		</div><!--end set-form2f-->
		<div class="btn-center2f">
		     <a href="{{ url('/form-ngo/2') }}" class="btn btn-border">ย้อนกลับ</a>
			<a href="{{ url('/cancel-form') }}/3/3" onclick="if(!confirm('ระบบจะไม่บันทึกข้อมูลและกลับไปยังหน้าแรก')) return false" class="btn btn-border confirmed-alert">ยกเลิก</a>
			<button type="submit" name="button" class="btn btn-green">บันทึก</button>
			<!-- <button type="button" name="button" class="btn btn-border">หน้าถัดไป<img src="images/right-arrow-gray.svg" alt=""></button> -->
		</div><!--end btn-center2f-->
	</div><!--end content-form2f-->
</div><!--end container-->
</div><!--end control-insitepage2f-->

</div><!--end insitepage2f-->
{!! Form::close() !!}
@endsection


@section('js')

@include('frontend.form-professional.global-js')
<script type="text/javascript">
function countCharSet(val, set_num, select) {
	var len = val.value.length;
	if (len >= set_num) {
		val.value = val.value.substring(0, set_num);
		$('#' + select).text(0);
	} else {
		$('#' + select).text(set_num - len);
	}
}

countCharSet($('[name="pastWork1"]')[0], 128, "charNumKs-1")
countCharSet($('[name="pastWork2"]')[0], 128, "charNumKs-3")
countCharSet($('[name="pastWork3"]')[0], 128, "charNumKs-5")
countCharSet($('[name="pastOrganization1"]')[0], 128, "charNumKs-2")
countCharSet($('[name="pastOrganization2"]')[0], 128, "charNumKs-4")
countCharSet($('[name="pastOrganization3"]')[0], 128, "charNumKs-6")

countCharSet($('[name="nowWork"]')[0], 255, 'charNum-2')
countCharSet($('[name="nowWorkPlace"]')[0], 255, 'charNum-3')
countCharSet($('[name="nowRole"]')[0], 800, 'charNum-4')
</script>
<script>
function countChar(val) {
	var len = val.value.length;
	$('#charNum').text(1024 - len);
}

countChar($('[name="importantMemo"]')[0]);

</script>
<script type="text/javascript">
$(document).ready(function() {
	// event
	$(document).on('change', '[name="addressType"]', function() {
		if($(this).val() == 1) {
			$('[name="workPlaceName"]').parents('.box-input2f').hide();
		} else {
			$('[name="workPlaceName"]').parents('.box-input2f').show();
		}
	})
	// check Event
	$('[name="addressType"]:checked').trigger('change');

	for (var i = 1; i <= 5; i++) {
		var num = i;
		$('[name="graduated'+ (num) +'"]').on('change', function() {
			if($(this).val() == '')
			{
				$(this).parents('.box-input2f').find('input').val('').attr('readonly', true)
			} else {
				$(this).parents('.box-input2f').find('input').removeAttr('readonly')
			}
		});
		$('[name="graduated'+ (num) +'"]').trigger('change')
	}
	$(document).on("change", '#fromyear1, #toyear1', function(){
		var cal = parseInt($('#toyear1').val()) - parseInt($('#fromyear1').val());


		if(!isNaN(cal)) {
			if(cal >= 0) {
				$("#time1").val(cal);
			} else {
				$('#toyear1 option:first').prop('selected',true);
				Swal.fire('กรุณาตรวจสอบข้อมูลปีที่เลือกอีกครั้้ง')
				$("#time1").val('');
			}

		} else {
			$("#time1").val('');
		}
	});
	$(document).on("change", '#fromyear2, #toyear2', function(){
		var cal = parseInt($('#toyear2').val()) - parseInt($('#fromyear2').val());
		if(!isNaN(cal)) {
			if(cal >= 0) {
				$("#time2").val(cal);
			} else {
				$('#toyear2 option:first').prop('selected',true);
				Swal.fire('กรุณาตรวจสอบข้อมูลปีที่เลือกอีกครั้้ง')
				$("#time2").val('');
			}
		} else {
			$("#time2").val('');
		}
	});
	$(document).on("change", '#fromyear3, #toyear3', function(){
		var cal = parseInt($('#toyear3').val()) - parseInt($('#fromyear3').val());
		if(!isNaN(cal)) {
			if(cal >= 0) {
				$("#time3").val(cal);
			} else {
				$('#toyear3 option:first').prop('selected',true);
				Swal.fire('กรุณาตรวจสอบข้อมูลปีที่เลือกอีกครั้้ง')
				$("#time3").val('');
			}
		} else {
			$("#time3").val('');
		}
	});
	$(document).on('change', '#provinceId', function(event) {
		$.getJSON('/api/getDistrict', {provinceId: $(this).val()}, function(json, textStatus) {
			$("#districtId").html('');
			$("#subDistrictId").html('');
			$("#districtId").select2({data:json, placeholder: "อำเภอ/เขต"})
			$("#districtId").trigger('change')
		});
	});

	$(document).on('change', '#districtId', function(event) {
		$.getJSON('/api/getSubDistrict', {districtId: $(this).val()}, function(json, textStatus) {
			$("#subDistrictId").html('');
			$("#subDistrictId").select2({data:json, placeholder: "ตำบล/แขวง"})
		});
	})
	@if(!empty(old('provinceId', @Auth::user()->detail->provinceId)))
	$("#provinceId").val({{old('provinceId', @Auth::user()->detail->provinceId)}}).trigger('change');
	$.getJSON('/api/getDistrict', {provinceId: "{{old('provinceId', @Auth::user()->detail->provinceId)}}"}, function(json, textStatus) {
		$("#districtId").html('');
		$("#subDistrictId").html('');
		$("#districtId").select2({data:json, placeholder: "อำเภอ/เขต"});
		$("#districtId").val({{old('districtId', @Auth::user()->detail->districtId)}}).trigger('change');
	});
	@if(!empty(old('districtId', @Auth::user()->detail->districtId)))
	setTimeout(function () {
		$.getJSON('/api/getSubDistrict', {districtId: "{{old('districtId', @Auth::user()->detail->districtId)}}"}, function(json, textStatus) {
			$("#subDistrictId").html('');
			$("#subDistrictId").select2({data:json, placeholder: "ตำบล/แขวง"})
			$("#subDistrictId").val({{old('subDistrictId', @Auth::user()->detail->subDistrictId)}}).trigger('change');

		});
	}, 5);
	@endif
	@endif
});

$('[name="sday"], [name="smonth"], [name="syear"]').on('change', function(event) {
	$.get('{{ url('api/checkYear') }}?date=' + $("[name='sday']").val() + "/"+ $("[name='smonth']").val() + "/" + (parseInt($("[name='syear']").val()) ) , function(data) {
		console.log(data);
		$('#yearOld').val(data.old)
	});
});

@if(!empty(Auth::user()->detail->dateOfBirth))
setTimeout(function () {
	$('[name="sday"]').trigger('change')
}, 500);

@endif

@if(!empty(Auth::user()->detail->dateOfBirth))
setTimeout(function () {
	$('[name="dateOfBirth"]').datepicker('update','{{ Carbon\Carbon::createFromFormat("Y-m-d",Auth::user()->detail->dateOfBirth)->format('d/m/Y') }}');



	$.get('{{ url('api/checkYear') }}?date=' + $('[name="dateOfBirth"]').val() , function(data) {
		console.log(data);
		$('#yearOld').val(data.old)
	});
}, 500);

// $('#date-birdth').datepicker('update', '{{ Carbon\Carbon::createFromFormat("Y-m-d",Auth::user()->detail->dateOfBirth)->format('d/m/Y') }}');
@endif
$(document).ready(function() {
	$('#form-step').on('submit', function(event) {
		event.preventDefault();

		if($("#tel").val() == "" ) {
			Swal.fire({
				title: 'ระบบแจ้งเตือน',
				text: "ท่านไม่ได้ระบุหมายเลขโทรศัพท์ ต้องการทำรายการต่อหรือไม่",
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'ตกลง'
			}).then((result) => {
				if (result.value) {
					$('#form-step')[0].submit();
				}
			})
		}else {
			$('#form-step')[0].submit();
		}

	})
});
$("[name='zipCode']").on('keyup', function(event) {
	var _zipcode = $(this).val();

	// $.getJSON('{{ url('api/get_address') }}', {zipcode: _zipcode}, function(json, textStatus) {
	//             console.log(json)
	//             address = json
	//             if(address[0] != null) {
	//                   // จังหวัด
	//                   address = address[0];
	//                   $("#provinceName").val(address.province);
	//                   $("#provinceId").val(address.province_code);
	//                   // อำเภอ
	//                   $("#districtName").val(address.amphoe);
	//                   $("#districtId").val(address.amphoe_code);
	//                   // ตำบล
	//                   $("#subDistrictName").val(address.district);
	//                   $("#subDistrictId").val(address.district_code);
	//             } else {
	//                   // จังหวัด
	//                   $("#provinceName").val("");
	//                   $("#provinceId").val("");
	//                   // อำเภอ
	//                   $("#districtName").val("");
	//                   $("#districtId").val("");
	//                   // ตำบล
	//                   $("#subDistrictName").val("");
	//                   $("#subDistrictId").val("");
	//             }
	// });
});
</script>
@endsection
