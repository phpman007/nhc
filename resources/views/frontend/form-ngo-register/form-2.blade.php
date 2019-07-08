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
              <div class="control-progress2f fourstep">
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
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f nopadding">วัน/เดือน/พ.ศ.</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="box-date input-group date">
                                      {!! Form::text('date_create', now()->addYears(543)->format("d/m/Y"), [ "class"=>"form-control" , "placeholder"=>"วัน/เดือน/พ.ศ.", 'readonly'=>'']) !!}
                                  <span class="input-group-addon"><img src="images/icon-calendar-gray.svg" alt="" data-pin-nopin="true"></span>
                                </div><!--end input_form-->
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f nopadding">คำนำหน้า</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input2f">
                                      {!! Form::text('nameTitle', Auth::user()->nameTitle, ["class"=>"form-control", "placeholder"=>"นาย/นาง/นางสาว"]) !!}
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
                                      {!! Form::text('firstname', Auth::user()->firstname, ["class"=>"form-control", "placeholder"=>"ชื่อ"]) !!}
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
                                      {!! Form::text('lastname', Auth::user()->lastname, ["class"=>"form-control", "placeholder"=>"นามสกุล"]) !!}
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
                                <div class="text-input2f nopadding">จังหวัด</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input2f">
                                     {!! Form::select('ngoProvincetID', Helper::getProvices(), @Auth::user()->provinceId, ["class"=>"form-control" ,"placeholder"=>"จังหวัด",'readonly' => '']) !!}
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="text-input2f nopadding">
                          ซึ่งเป็นผู้มีอำนาจกระทำการแทนองค์กร  ประสงค์จะขึ้นทะเบียนเป็นองค์กรผู้มีสิทธิเสนอชื่อผู้แทนเข้ารับการเลือกเป็นกรรมการสุขภาพแห่งชาติ
โดยมีรายละเอียดดังนี้
                        </div><!--end text-input2f-->
                    </div><!--end box-input2f-->
                  </div><!--end set-form2f-->
                  <div class="headform2f">ข้อมูลองค์กรภาคเอกชน</div>
                  <div class="set-form2f">
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f nopadding">๑.ชื่อองค์กร</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input2f">
                                     {!! Form::text('ngoName', @Auth::user()->detail->ngoName, ["class"=>"form-control", "placeholder"=>"ชื่อองค์กร"]) !!}
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
                                <div class="text-input2f nopadding">๒.สถานภาพขององค์กร</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input-radio2f inline-check">
                                    <div class="box-radio2f">
                                          {!! Form::radio('legalStastus', 0, @Auth::user()->detail->legalStastus == 0 ? 'checked' : '', ['id'=>'test1']) !!}
                                      <label for="test1">ไม่เป็นนิติบุคคล</label>
                                    </div>
                                    <div class="box-radio2f">
                                          {!! Form::radio('legalStastus', 1, @Auth::user()->detail->legalStastus == 1 ? 'checked' : '', ['id'=>'test2']) !!}
                                      <label for="test2">เป็นนิติบุคคล</label>
                                    </div>
                                </div><!--end input-radio2f-->
                                <div class="input2f">
                                      {!! Form::text('ngoStatus', @Auth::user()->detail->ngoStatus, ["class"=>"form-control", "placeholder"=>"สถานภาพขององค์กร"]) !!}
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
                                      {!! Form::text('ngoMoo', @Auth::user()->detail->ngoMoo, ["class"=>"form-control" ,"placeholder"=>"หมู่ที่"]) !!}
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
                                      {!! Form::text('ngoSoi', @Auth::user()->detail->ngoSoi, ["class"=>"form-control" ,"placeholder"=>"ซอย"]) !!}
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
                                      {!! Form::text('ngoStreet', @Auth::user()->detail->ngoStreet, ["class"=>"form-control" ,"placeholder"=>"ถนน"]) !!}
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
                                      {!! Form::select('ngoProvincetID', $provide, null, ['class'=>'form-control select2', 'placeholder' => 'จังหวัด', 'id'=>'provinceId']) !!}
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
                                      {!! Form::number('ngoZipCode',  @Auth::user()->detail->ngoZipCode , ["class"=>"form-control" , "placeholder"=>"รหัสไปรษณีย์",'maxlength'=>5]) !!}
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
                                <div class="text-input2f nopadding">๔.ก่อตั้งองค์กรวันที่</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="box-date input-group date">
                                      {!! Form::text('ngoStartDate',@Auth::user()->detail->ngoStartDate, ['class'=>'form-control date-picker', 'placeholder' => 'ก่อตั้งองค์กรวันที่','readonly' => '']) !!}
                                      @if($errors->has('ngoStartDate'))
                                      <small>{{ $errors->first('ngoStartDate') }}</small>
                                      @endif
                                  <span class="input-group-addon"><img src="images/icon-calendar-gray.svg" alt="" data-pin-nopin="true"></span>
                                </div><!--end input_form-->
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
                                  {!! Form::text('ngoQtyMember',@Auth::user()->detail->ngoQtyMember, ['class'=>'form-control', 'placeholder' => 'จำนวนสมาชิก']) !!}
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
                        <div class="text-input2f nopadding">๕.วัตถุประสงค์ขององค์กรที่สอดคล้องกับกลุ่มกิจกรรมที่ขอขึ้นทะเบียน</div>
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright"></div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input2f">
                                      {!! Form::textarea('ngoObjective', @Auth::user()->detail->ngoObjective, ["rows"=>"4", "cols"=>"40", "class"=>"form-control",
                                     "placeholder"=>"วัตถุประสงค์ขององค์กรที่สอดคล้องกับกลุ่มกิจกรรมที่ขอขึ้นทะเบียน"]) !!}
                                     @if($errors->has('ngoObjective'))
                                     <small>{{ $errors->first('ngoObjective') }}</small>
                                     @endif
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                  </div><!--end set-form2f-->
                  <div class="btn-center2f">
                      <a href="{{ url('/cancel-form') }}" onclick="if(!confirm('ระบบจะไม่บันทึกข้อมูลและกลับไปยังหน้าแรก')) return false" class="btn btn-border confirmed-alert">ยกเลิก</a>
                      <button type="submit" name="button" class="btn btn-green">บันทึก</button>
                      <!-- <button type="button" name="button" class="btn btn-border">หน้าถัดไป<img src="images/right-arrow-gray.svg" alt=""></button> -->
                  </div><!--end btn-center2f-->
              </div><!--end content-form2f-->
            </div><!--end container-->
        </div><!--end control-insitepage2f-->

    </div><!--end insitepage2f-->
{!! Form::close() !!}
@endsection

@section('css')

<link href="{{ asset("frontend/css/insitepage.css") }}" rel="stylesheet">
@endsection

@section('js')

@include('frontend.form-professional.global-js')
<script type="text/javascript">
$(document).ready(function() {
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
           });
      });

      $(document).on('change', '#districtId', function(event) {
           $.getJSON('/api/getSubDistrict', {districtId: $(this).val()}, function(json, textStatus) {
                    $("#subDistrictId").html('');
                     $("#subDistrictId").select2({data:json, placeholder: "ตำบล/แขวง"})
           });
      })
      @if(!empty(old('ngoProvincetID', @Auth::user()->detail->ngoProvincetID)))
      $("#provinceId").val({{old('ngoProvincetID', @Auth::user()->detail->ngoProvincetID)}}).trigger('change');
      $.getJSON('/api/getDistrict', {provinceId: "{{old('ngoProvincetID', @Auth::user()->detail->ngoProvincetID)}}"}, function(json, textStatus) {
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
