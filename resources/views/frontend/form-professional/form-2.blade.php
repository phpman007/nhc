@extends('frontend.theme.master')

@section('content')
<form method="post" id="form-step">
{!! Form::hidden('last_step', 2, []) !!}
    <div class="insitepage2f">
        <div class="navication2f">
            <div class="container">
                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}">หน้าหลัก</a></li>
                    <li><a href="">สมัคร</a></li>
                    <li class="active">ผู้ทรงคุณวุฒิ สมัครเป็นกรรมการสุขภาพแห่งชาติ ขั้นตอนที่ 2</li>
                </ol>
            </div>
        </div><!--end navication2f-->
        <div class="insite-banner2f">
            <div class="control-bannertext2f">
                <div class="container">
                    <div class="headline2f">
                        <h1>ผู้ทรงคุณวุฒิ</h1>
                    </div>
                </div><!--end container-->
            </div><!--end control-bannertext2f-->
            <div class="img-banner2f">
                <img src="{{ asset("frontend/images/insite-banner01.jpg") }}" alt="">
            </div>
            <div class="bg-banner"><img src="{{ asset("frontend/images/bg-banner.png") }}" alt=""></div>
            <div class="shape-banner"></div>
        </div><!--end insite-banner2f-->
        <div class="control-insitepage2f">
            <div class="container">
                <div class="control-progress2f">
                    <div class="box-line-progress2f">
                        <div class="bg-progress2f"></div>
                        <div class="line-progress2f">
                            <ul>
                                <li class="active"><span>&nbsp;</span></li>
                                <li><span>&nbsp;</span></li>
                                <li><span>&nbsp;</span></li>
                                <li><span>&nbsp;</span></li>
                                <li><span>&nbsp;</span></li>
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
                    <h4>ผู้ทรงคุณวุฒิ สมัครเป็นกรรมการสุขภาพแห่งชาติ ขั้นตอนที่ 2</h4>
                    <div class="set-form2f">
                        <!-- <div class="box-input2f">
                            <div class="row">
                                <div class="col-md-2 col-sm-4 nopaddingright">
                                    <div class="text-input2f nopadding">วัน/เดือน/พ.ศ.</div>
                                </div>
                                <div class="col-md-6 col-sm-8">
                                    <div class="box-date input-group date">
                                        <input readonly="" type="text" class="form-control" name="date" value="{{ now()->addYears('543')->format('d/m/Y') }}" placeholder="วัน/เดือน/พ.ศ.">
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
                                        <input maxlength="80" type="text" name="nameTitle" value="{{ !empty(Auth::user()->nameTitle) ? Auth::user()->nameTitle : old('nameTitle') }}" class="form-control" placeholder="นาย/นาง/นางสาว">
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
                                        <input maxlength="50" type="text" name="firstname" value="{{ !empty(Auth::user()->firstname) ? Auth::user()->firstname : old('firstname') }}" class="form-control" placeholder="ชื่อ">
                                        @if($errors->has('firstname'))
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
                                        <input maxlength="50" type="text" name="lastname" value="{{ !empty(Auth::user()->lastname) ? Auth::user()->lastname : old('lastname') }}" class="form-control" placeholder="นามสกุล">
                                        @if($errors->has('lastname'))
                                        <small>{{ $errors->first('lastname') }}</small>
                                        @endif
                                    </div>
                                </div>
                            </div><!--end row-->
                        </div><!--end box-input2f-->
                        <div class="box-input2f">
                            <div class="text-input2f nopadding">
                                มีความประสงค์จะสมัครเข้ารับการเลือกเป็นกรรมการสุขภาพแห่งชาติ  จึงขอส่งใบสมัครของข้าพเจ้ามายังประธานคณะกรรมการสรรหา
                            </div><!--end text-input2f-->
                        </div><!--end box-input2f-->

                    </div><!--end set-form2f-->
                    <div class="headform2f">คุณสมบัติ</div>
                    <div class="set-form2f">
                        <div class="box-input2f">
                            <div class="text-input2f nopadding">
                                ข้าพเจ้าเป็นผู้มีคุณสมบัติของผู้ทรงคุณวุฒิที่จะเข้ารับการเลือกเป็นกรรมการสุขภาพแห่งชาติครบถ้วน  ดังนี้
                            </div><!--end text-input2f-->
                        </div><!--end box-input2f-->
                        <h5>1.  คุณสมบัติทั่วไป</h5>
                        <div class="input-checkbox2f">
                            <div class="box-checkbox2f">
                                <label class="checkbox2f">1) มีสัญชาติไทย
                                    <input name="thaiStatus" type="checkbox" {{ @Auth::user()->detail->thaiStatus == 1 ? 'checked="checked"' : !empty(old('thaiStatus')) ? 'checked="checked"' : '' }}>
                                    <span class="checkmark"></span>
                                </label>
                                @if($errors->has('thaiStatus'))
                                    <small>{{ $errors->first('thaiStatus') }}</small>
                                @endif
                            </div><!--end box-checkbox2f-->
                            <div class="box-checkbox2f">
                                <label class="checkbox2f">2) มีอายุไม่ต่ำกว่ายี่สิบปีบริบูรณ์ ณ วันที่สมัคร
                                    <input name="ageQualify" type="checkbox" {{ @Auth::user()->detail->ageQualify ==1 ? 'checked="checked"' : !empty(old('ageQualify')) ? 'checked="checked"' : '' }}>

                                    <span class="checkmark"></span>
                                </label>
                                @if($errors->has('ageQualify'))
                                    <small>{{ $errors->first('ageQualify') }}</small>
                                @endif
                            </div><!--end box-checkbox2f-->
                            <div class="box-checkbox2f">
                                <label class="checkbox2f">3) ไม่เป็นคนไร้ความสามารถหรือคนเสมือนไร้ความสามารถ
                                    <input name="enoughAbility" type="checkbox" {{ @Auth::user()->detail->enoughAbility == 1 ? 'checked="checked"' : !empty(old('enoughAbility')) ? 'checked="checked"' : '' }}>
                                    <span class="checkmark"></span>
                                </label>
                                @if($errors->has('enoughAbility'))
                                    <small>{{ $errors->first('enoughAbility') }}</small>
                                @endif
                            </div><!--end box-checkbox2f-->
                            <div class="box-checkbox2f">
                                <label class="checkbox2f">4) ไม่ติดยาเสพติดให้โทษ
                                    <input name="noDrug" type="checkbox" {{ @Auth::user()->detail->noDrug == 1 ? 'checked="checked"' : !empty(old('noDrug')) ? 'checked="checked"' : '' }}>
                                    <span class="checkmark"></span>
                                </label>
                                @if($errors->has('noDrug'))
                                    <small>{{ $errors->first('noDrug') }}</small>
                                @endif
                            </div><!--end box-checkbox2f-->
                            <div class="box-checkbox2f">
                                <label class="checkbox2f">5) ไม่เคยถูกลงโทษไล่ออก ปลดออก เลิกจ้าง หรือพ้นจากตำแหน่ง เพราะเหตุจากการทุจริตหรือประพฤติมิชอบ
                                    <input name="noCriminal" type="checkbox" {{ @Auth::user()->detail->noCriminal == 1 ? 'checked="checked"' : !empty(old('noCriminal')) ? 'checked="checked"' : '' }}>
                                    <span class="checkmark"></span>
                                </label>
                                @if($errors->has('noCriminal'))
                                    <small>{{ $errors->first('noCriminal') }}</small>
                                @endif
                            </div><!--end box-checkbox2f-->
                            <div class="box-checkbox2f">
                                <label class="checkbox2f">6) ไม่เคยได้รับโทษจำคุกโดยคำพิพากษาถึงที่สุดให้จำคุก ไม่ว่าจะถูกจำคุกจริงหรือไม่ก็ตาม
                                    เว้นแต่เป็นโทษสำหรับความผิดที่ได้กระทำโดยประมาทหรือ ความผิดลหุโทษ
                                    <input name="noJail" type="checkbox" {{ @Auth::user()->detail->noJail == 1 ? 'checked="checked"' : !empty(old('noJail')) ? 'checked="checked"' : '' }}>
                                    <span class="checkmark"></span>
                                </label>
                                @if($errors->has('noJail'))
                                    <small>{{ $errors->first('noJail') }}</small>
                                @endif
                            </div><!--end box-checkbox2f-->
                        </div><!--end input-checkbox2f-->
                        <h5>2.  คุณสมบัติเฉพาะ</h5>
                        <div class="input-checkbox2f">
                            <div class="box-checkbox2f">
                                <label class="checkbox2f">1) ไม่เป็นผู้ประกอบวิชาชีพด้านสาธารณสุขตามนิยามในพระราชบัญญัติสุขภาพแห่งชาติ พ.ศ. 2550
                                    <input name="noNHCworking" type="checkbox" {{ @Auth::user()->detail->noNHCworking == 1 ? 'checked="checked"' : !empty(old('noNHCworking')) ? 'checked="checked"' : '' }}>
                                    <span class="checkmark"></span>
                                </label>
                                @if($errors->has('noNHCworking'))
                                    <small>{{ $errors->first('noNHCworking') }}</small>
                                @endif
                            </div><!--end box-checkbox2f-->
                            <div class="box-checkbox2f">
                                <label class="checkbox2f">2) มีประสบการณ์การทำงานไม่น้อยกว่า 10 ปี
                                    <input name="enoughExperience" type="checkbox" {{ @Auth::user()->detail->enoughExperience == 1 ? 'checked="checked"' : !empty(old('enoughExperience')) ? 'checked="checked"' : '' }}>
                                    <span class="checkmark"></span>
                                </label>
                                @if($errors->has('enoughExperience'))
                                    <small>{{ $errors->first('enoughExperience') }}</small>
                                @endif
                            </div><!--end box-checkbox2f-->
                            <div class="box-checkbox2f">
                                <label class="checkbox2f">3) มีผลงานเป็นที่ประจักษ์ที่สอดคล้องกับประเภทกลุ่มผู้ทรงคุณวุฒิที่เลือกสมัคร
                                    <input name="enoughProfile" type="checkbox" {{ @Auth::user()->detail->enoughProfile == 1 ? 'checked="checked"' : !empty(old('enoughProfile')) ? 'checked="checked"' : '' }}>
                                    <span class="checkmark"></span>
                                </label>
                                @if($errors->has('enoughProfile'))
                                    <small>{{ $errors->first('enoughProfile') }}</small>
                                @endif
                            </div><!--end box-checkbox2f-->

                        </div><!--end input-checkbox2f-->
                    </div><!--end set-form2f-->

                    <div class="btn-center2f">
                         <a href="{{ url('/cancel-form') }}/1/2" class="btn btn-border confirmed-alert">ยกเลิก</a>
                        <button type="submit" name="button" class="btn btn-green">บันทึก</button>
                    </div><!--end btn-center2f-->
                </div><!--end content-form2f-->
            </div><!--end container-->
        </div><!--end control-insitepage2f-->

    </div><!--end insitepage2f-->
    {{ csrf_field() }}
</form>

@endsection



@section('js')

@include('frontend.form-professional.global-js')
<script type="text/javascript">
jQuery(document).ready(function($) {
      $('#form-step').on('submit', function(event) {
            event.preventDefault();
            alertConfirmForm('#form-step', 'กรอกแบบฟอร์มสมัครผู้ทรงคุณวุฒิ Step2 สำเร็จแล้ว คุณต้องการกรอกแบบฟอร์มสมัครผู้ทรงคุณวุฒิStepต่อไปไหม');
      })
});
</script>


@endsection
