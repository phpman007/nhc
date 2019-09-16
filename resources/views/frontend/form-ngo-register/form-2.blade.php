@extends('frontend.theme.master')

@section('content')
<style media="screen">
.fourstep .line-progress2f ul li {
width: 23.33333%;
}
</style>
{!! Form::open() !!}
    <div class="insitepage2f">
        <div class="navication2f">
            <div class="container">
              <ol class="breadcrumb">
                  <li><a href="">หน้าหลัก</a></li>
                  <li><a href="">สมัคร</a></li>
                  <li class="active">ผู้แทนองค์กรภาคเอกชน ขอขึ้นทะเบียนองค์กรภาคเอกชน ขั้นตอนที่ 2</li>
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
              <div class="control-progress2f fivestep">
                <div class="box-line-progress2f">
                    <div class="bg-progress2f"></div>
                    <div class="line-progress2f">
                      <ul>
                        <li class="active"><span>&nbsp;</span></li>
                        <li><span>&nbsp;</span></li>
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
                  <h4>ผู้แทนองค์กรภาคเอกชน ขอขึ้นทะเบียนองค์กรภาคเอกชน ขั้นตอนที่ 2</h4>
                  <div class="set-form2f">
                    <!-- <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f nopadding">วัน/เดือน/พ.ศ.</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="box-date input-group date">
                                      {!! Form::text('date_create', now()->addYears(543)->format("d/m/Y"), [ "class"=>"form-control" , "placeholder"=>"วัน/เดือน/พ.ศ.", 'readonly'=>'']) !!}
                                  <span class="input-group-addon"><img src="images/icon-calendar-gray.svg" alt="" data-pin-nopin="true"></span>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f nopadding">คำนำหน้า</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input2f">
                                      {!! Form::text('nameTitle', Auth::user()->nameTitle, ["class"=>"form-control", "placeholder"=>"นาย/นาง/นางสาว", 'maxlength' => '80']) !!}
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
                                <div class="text-input2f nopadding">ชื่อ</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input2f">
                                      {!! Form::text('firstname', Auth::user()->firstname, ["class"=>"form-control", "placeholder"=>"ชื่อ", 'maxlength' => '150']) !!}
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
                                <div class="text-input2f nopadding">นามสกุล</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input2f">
                                      {!! Form::text('lastname', Auth::user()->lastname, ["class"=>"form-control", "placeholder"=>"นามสกุล", 'maxlength' => '150']) !!}
                                      @if($errors->has("lastname"))
                                      <small>{{ $errors->first('lastname') }}</small>
                                      @endif
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <!-- <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f nopadding">จังหวัด</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input2f">
                                     {!! Form::select('ngoProvincetID', Helper::getProvices(), @Auth::user()->provinceId, ["class"=>"form-control" ,"placeholder"=>"จังหวัด",'readonly' => '']) !!}
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <div class="box-input2f">
                        <div class="text-input2f nopadding">
                             ซึ่งเป็นผู้แจ้งรายละเอียดเพื่อขอขึ้นทะเบียนเป็นองค์กรผู้มีสิทธิเสนอชื่อผู้แทนเข้ารับการเลือกเป็นกรรมการสุขภาพแห่งชาติ
                               โดยมีรายละเอียดดังนี้
                        </div><!--end text-input2f-->
                    </div><!--end box-input2f-->
                  </div><!--end set-form2f-->
                  <div class="headform2f">ข้อมูลองค์กรภาคเอกชน</div>
                  <div class="set-form2f">
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f nopadding">1.ชื่อองค์กร</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input2f">
                                     {!! Form::text('ngoName', @Auth::user()->detail->ngoName, ["class"=>"form-control", "placeholder"=>"ชื่อองค์กร", 'maxlength' => '150']) !!}
                                     @if($errors->has('ngoName'))
                                     <small>{{ $errors->first('ngoName') }}</small>
                                     @endif
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f nopadding">2.ประเภทขององค์กร</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input-radio2f">
                                    <div class="box-radio2f">
                                      <?php $optionsArray = ['ไม่เป็นนิติบุคคล' , 'เป็นนิติบุคคล'] ?>
                                      {!! Form::select('legalStastus', $optionsArray, @Auth::user()->detail->legalStastus, ['class'=>'form-control']) !!}

                                    </div>

                                </div><!--end input-radio2f-->
                                <div class="box-radio2f">

                                 <div class="input2f ">
                                      {!! Form::select('ngoStatus', ["มูลนิธิ"=> 'มูลนิธิ', 'สมาคม' => 'สมาคม'], @Auth::user()->detail->ngoStatus, ["class"=>"form-control", "placeholder"=>"เลือกสถานภาพขององค์กร" , 'maxlength' => '255']) !!}
                                      @if($errors->has('ngoStatus'))
                                     <small>{{ $errors->first('ngoStatus') }}</small>
                                     @endif
                                 </div>
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
                                      {!! Form::text('ngoNo', @Auth::user()->detail->ngoNo, ["class"=>"form-control" ,"placeholder"=>"เลขที่", 'maxlength'=>7]) !!}
                                     @if($errors->has('ngoNo'))
                                     <small>{{ $errors->first('ngoNo') }}</small>
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
                                      {!! Form::text('ngoMoo', @Auth::user()->detail->ngoMoo, ["class"=>"form-control" ,"placeholder"=>"หมู่ที่" , 'maxlength' => '10']) !!}
                                     @if($errors->has('ngoMoo'))
                                     <small>{{ $errors->first('ngoMoo') }}</small>
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
                                      {!! Form::text('ngoSoi', @Auth::user()->detail->ngoSoi, ["class"=>"form-control" ,"placeholder"=>"ซอย" , 'maxlength' => '150']) !!}
                                    @if($errors->has('ngoSoi'))
                                    <small>{{ $errors->first('ngoSoi') }}</small>
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
                                      {!! Form::text('ngoStreet', @Auth::user()->detail->ngoStreet, ["class"=>"form-control" ,"placeholder"=>"ถนน" , 'maxlength' => '150']) !!}
                                     @if($errors->has('ngoStreet'))
                                     <small>{{ $errors->first('ngoStreet') }}</small>
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
                                      {!! Form::select('ngoProvincetID', [Auth::user()->provinceId => $provide[Auth::user()->provinceId]], Auth::user()->provinceId, ['class'=>'form-control readonly select2', 'placeholder' => 'จังหวัด', 'id'=>'provinceId', 'readonly' =>'']) !!}
                                      @if($errors->has('ngoProvincetID'))
                                     <small>{{ $errors->first('ngoProvincetID') }}</small>
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
                                      {!! Form::select('ngoDistrictID', [], null, ['class'=>'form-control select2', 'placeholder' => 'อำเภอ/เขต', 'id'=>'districtId']) !!}
                                      @if($errors->has('ngoDistrictID'))
                                     <small>{{ $errors->first('ngoDistrictID') }}</small>
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
                                      {!! Form::select('ngoSubDistrictID', [], null, ['class'=>'form-control select2', 'placeholder' => 'ตำบล/แขวง', 'id'=>'subDistrictId']) !!}
                                      @if($errors->has('ngoSubDistrictID'))
                                     <small>{{ $errors->first('ngoSubDistrictID') }}</small>
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
                                      {!! Form::text('ngoZipCode',  @Auth::user()->detail->ngoZipCode , ["class"=>"form-control" , "placeholder"=>"รหัสไปรษณีย์", 'maxlength' => '10']) !!}
                                 @if($errors->has('ngoZipCode'))
                                 <small>{{ $errors->first('ngoZipCode') }}</small>
                                 @endif
                                </div>
                           </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="row">
                           <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f">เบอร์โทรศํพท์</div>
                           </div>
                           <div class="col-md-6 col-sm-8">
                                <div class="input2f">
                                      {!! Form::text('suggestTel',  @Auth::user()->detail->suggestTel , ["class"=>"form-control" , "placeholder"=>"เบอร์โทรศํพท์", 'maxlength' => '50']) !!}
                                 @if($errors->has('suggestTel'))
                                 <small>{{ $errors->first('suggestTel') }}</small>
                                 @endif
                                </div>
                           </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f nopadding">4.ก่อตั้งองค์กรวันที่</div>
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
                                                   @if(!empty(Auth::user()->detail->ngoStartDate))
                                                  {!! Form::select('sday', $sday, Carbon\Carbon::parse(Auth::user()->detail->ngoStartDate)->format("d"), [ "class"=>"form-control"]) !!}
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
                                                 "11"=>  "พฤษจิกายน",
                                                 "12"=>  "ธันวาคม",
                                              ];
                                               ?>
                                               @if(!empty(Auth::user()->detail->ngoStartDate))
                                              {!! Form::select('smonth', $month, (int)Carbon\Carbon::parse(Auth::user()->detail->ngoStartDate)->format("m"), [ "class"=>"form-control"]) !!}
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
                                               @if(!empty(Auth::user()->detail->ngoStartDate))
                                              {!! Form::select('syear', $syear, (int)Carbon\Carbon::parse(Auth::user()->detail->ngoStartDate)->format("Y") +543, [ "class"=>"form-control"]) !!}
                                               @else
                                              {!! Form::select('syear', $syear, null, [ "class"=>"form-control"]) !!}
                                              @endif
                                            </div>
                                        </div>
                                    </div><!--end row-->
                                    @if($errors->has('ngoStartDate'))
                                    <small>{{ $errors->first('ngoStartDate') }}</small>
                                    @endif
                                </div><!--end control-select-date2f-->
                            </div>

                        </div><!--end row-->
                    </div><!--end box-input2f-->

                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 col-xs-12 nopaddingright">
                                <div class="text-input2f nopadding">จำนวนสมาชิกในปัจจุบัน</div>
                            </div>
                            <div class="col-md-3 col-sm-8 col-xs-9">
                                <div class="input2f">
                                  {!! Form::number('ngoQtyMember',@Auth::user()->detail->ngoQtyMember, ['class'=>'form-control', 'placeholder' => 'จำนวนสมาชิก', 'max' => 99999]) !!}
                                  @if($errors->has('ngoQtyMember'))
                                  <small>{{ $errors->first('ngoQtyMember') }}</small>
                                  @endif
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-2 col-xs-3 nopaddingleft">
                                <div class="text-unit2f text-input2f">คน</div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->

                    <div class="box-input2f">
                        <div class="text-input2f nopadding">5.วัตถุประสงค์ขององค์กรที่สอดคล้องกับกลุ่มกิจกรรมที่ขอขึ้นทะเบียน</div>
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="row">

                            <div class="col-md-12">
                                <div class="input2f">
                                      {!! Form::textarea('ngoObjective', @Auth::user()->detail->ngoObjective, ["rows"=>"4", "cols"=>"40",'onkeyup' => 'countChar(this, 1024, "charNum")', "class"=>"form-control",
                                     "placeholder"=>"วัตถุประสงค์ขององค์กรที่สอดคล้องกับกลุ่มกิจกรรมที่ขอขึ้นทะเบียน"]) !!}
						 ท่านพิมพ์ได้อีก <span id="charNum">1024</span> ตัวอักษร
                                     @if($errors->has('ngoObjective'))
                                     <small>{{ $errors->first('ngoObjective') }}</small>
                                     @endif
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                  </div><!--end set-form2f-->
                  <div class="btn-center2f">
                      <a href="{{ url('/cancel-form') }}/2/2" onclick="if(!confirm('ระบบจะไม่บันทึกข้อมูลและกลับไปยังหน้าแรก')) return false" class="btn btn-border confirmed-alert">ยกเลิก</a>
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
function countChar(val, set_num, select) {
  var len = val.value.length;
  if (len >= set_num) {
    val.value = val.value.substring(0, set_num);
      $('#' + select).text(0);
  } else {
    $('#' + select).text(set_num - len);
  }
}
countChar($('[name="ngoObjective"]')[0], 1024, 'charNum')
</script>


<script type="text/javascript">


$(document).ready(function() {
	if($('[name="legalStastus"]').val() == 1) {
	     $('[name="ngoStatus"]').show();
	} else {
	     $('[name="ngoStatus"]').hide();
	}

	$('[name="legalStastus"]').on('change', function() {
		   var type = $(this).val();

		   if(type == 1) {
			  $('[name="ngoStatus"]').show();
		   } else {
			  $('[name="ngoStatus"]').hide();
		   }
	});
      @if(!empty(Auth::user()->detail->ngoStartDate))
		setTimeout(function () {
                  $('[name="ngoStartDate"]').datepicker('update','{{ Carbon\Carbon::createFromFormat("Y-m-d",Auth::user()->detail->ngoStartDate)->format('d/m/Y') }}');
		}, 500);

	@endif

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
      @if(!empty(old('ngoProvincetID', Auth::user()->provinceId)))
      $("#provinceId").val({{old('ngoProvincetID', Auth::user()->provinceId)}}).trigger('change');
      $.getJSON('/api/getDistrict', {provinceId: "{{old('ngoProvincetID', Auth::user()->provinceId)}}"}, function(json, textStatus) {
                    $("#districtId").html('');
                    $("#subDistrictId").html('');
             $("#districtId").select2({data:json, placeholder: "อำเภอ/เขต"});
             $("#districtId").val({{old('ngoDistrictID', @Auth::user()->detail->ngoDistrictID)}}).trigger('change');
      });
             @if(!empty(old('ngoDistrictID', @Auth::user()->detail->ngoDistrictID)))
             setTimeout(function () {
                    $.getJSON('/api/getSubDistrict', {districtId: "{{old('ngoDistrictID', @Auth::user()->detail->ngoDistrictID)}}"}, function(json, textStatus) {
                           $("#subDistrictId").html('');
                           $("#subDistrictId").select2({data:json, placeholder: "ตำบล/แขวง"})
                           setTimeout(function () {
                                 $("#subDistrictId").val({{old('ngoSubDistrictID', @Auth::user()->detail->ngoSubDistrictID)}}).trigger('change');
                           }, 1000);

                    });
             }, 500);
             @endif
      @endif


      $("[name='ngoZipCode']").on('keyup', function(event) {
		// var _zipcode = $(this).val();
            //
		// $.getJSON('{{ url('api/get_address') }}', {zipcode: _zipcode}, function(json, textStatus) {
		// 		console.log(json)
		// 		address = json
		// 		if(address[0] != null) {
		// 			// จังหวัด
		// 			address = address[0];
		// 			$("#provinceName").val(address.province);
		// 			$("#ngoProvincetID").val(address.province_code);
		// 			// อำเภอ
		// 			$("#districtName").val(address.amphoe);
		// 			$("#ngoDistrictID").val(address.amphoe_code);
		// 			// ตำบล
		// 			$("#subDistrictName").val(address.district);
            //                   console.log(address)
		// 			$("#ngoSubDistrictID").val(address.district_code);
		// 		} else {
		// 			// จังหวัด
		// 			$("#provinceName").val("");
		// 			$("#ngoProvincetID").val("");
		// 			// อำเภอ
		// 			$("#districtName").val("");
		// 			$("#ngoDistrictID").val("");
		// 			// ตำบล
		// 			$("#subDistrictName").val("");
		// 			$("#ngoSubDistrictID").val("");
		// 		}
		// });
	});
});

</script>
@endsection
