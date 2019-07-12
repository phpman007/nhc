@extends('frontend.theme.master')

@section('content')
<form id="form-step" method="post" enctype="multipart/formdata">
    {{ csrf_field() }}
    <div class="insitepage2f">
        <div class="navication2f">
            <div class="container">
                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}">หน้าหลัก</a></li>
                    <li><a href="">สมัคร</a></li>
                    <li class="active">ผู้ทรงคุณวุฒิ สมัครสมาชิก ขั้นตอนที่ 1</li>
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
                    <h4>ผู้ทรงคุณวุฒิ สมัครสมาชิก ขั้นตอนที่ 1</h4>
                    <div class="set-form2f">
                        <div class="box-input2f">
                            <div class="row">
                                <div class="col-md-2 col-sm-4 nopaddingright">
                                    <div class="text-input2f">เลขบัตรประชาชน</div>
                                </div>
                                <div class="col-md-6 col-sm-8">
                                    <div class="input2f">
                                        <input id="personalId" type="text" name="personalId" value="{{ old('personalId') }}" class="form-control" placeholder="กรอกเฉพาะตัวเลข">
                                        @if($errors->has('personalId'))
                                        <small>{{ $errors->first('personalId') }}</small>
                                        @endif
                                    </div>
                                </div>
                            </div><!--end row-->
                        </div><!--end box-input2f-->
                        <div class="box-input2f">
                            <div class="row">
                                <div class="col-md-2 col-sm-4 nopaddingright">
                                    <div class="text-input2f">อีเมล์</div>
                                </div>
                                <div class="col-md-6 col-sm-8">
                                    <div class="input2f">
                                        <input type="text" name="email" value="{{ old('email') }}" class="form-control" placeholder="อีเมล์">
                                        @if($errors->has('email'))
                                        <small>{{ $errors->first('email') }}</small>
                                        @endif
                                    </div>
                                </div>
                            </div><!--end row-->
                        </div><!--end box-input2f-->
                        <div class="box-input2f">
                            <div class="row">
                                <div class="col-md-2 col-sm-4 nopaddingright">
                                    <div class="text-input2f">รหัสผ่าน</div>
                                </div>
                                <div class="col-md-6 col-sm-8">
                                    <div class="input2f">
                                        <input type="password" name="password" value="" class="form-control" placeholder="" autocomplete="false">
                                        <span class="icon-viewpass notview" data-toggle="tooltip" data-placement="top" title="แสดงรหัสผ่าน">
                                            <img src="{{ asset("frontend/images/visibility-on.svg") }}" class="pass-view" alt="">
                                            <img src="{{ asset("frontend/images/visibility-off.svg") }}" class="pass-none" alt="">
                                        </span>
                                        <div class="t-notice">ใช้ตัวอักษรอย่างน้อย 6 ตัวอักษร</div>
                                         @if($errors->has('password'))
                                        <small>{{ $errors->first('password') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-0 col-sm-4"></div>
                                <div class="col-md-4 col-sm-8">
                                    <div class="t-suggestion">ท่านสามารถดูรหัสผ่านที่กรอกได้โดยคลิกที่เครื่องหมายลูกตา</div>
                                </div>
                            </div><!--end row-->
                        </div><!--end box-input2f-->
                        <div class="box-input2f">
                            <div class="row">
                                <div class="col-md-2 col-sm-4 nopaddingright">
                                    <div class="text-input2f">ยืนยันรหัสผ่าน</div>
                                </div>
                                <div class="col-md-6 col-sm-8">
                                    <div class="input2f">
                                        <input type="password" name="password_confirmation" value="" class="form-control" placeholder="" autocomplete="false">
                                        <span class="icon-viewpass notview" data-toggle="tooltip" data-placement="top" title="แสดงรหัสผ่าน">
                                            <img src="{{ asset("frontend/images/visibility-on.svg") }}" class="pass-view" alt="">
                                            <img src="{{ asset("frontend/images/visibility-off.svg") }}" class="pass-none" alt="">
                                        </span>
                                         @if($errors->has('password_confirmation'))
                                        <small>{{ $errors->first('password_confirmation') }}</small>
                                        @endif
                                    </div>
                                </div>
                            </div><!--end row-->
                        </div><!--end box-input2f-->

                    </div><!--end set-form2f-->
                    <div class="btn-center2f  t-left2f">
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                  <a href="{{ url('/') }}" onclick="if(!confirm('ระบบจะไม่บันทึกข้อมูลและกลับไปยังหน้าแรก')) return false" class="btn btn-border confirmed-alert">ยกเลิก</a>
                                <button type="submit" name="button" class="btn btn-green">บันทึก</button>
                            </div>
                        </div>

                    </div><!--end btn-center2f-->
                </div><!--end content-form2f-->
            </div><!--end container-->
        </div><!--end control-insitepage2f-->

    </div><!--end insitepage2f-->
</form>
@endsection



@section('js')

@include('frontend.form-professional.global-js')
<script type="text/javascript">
    $(".icon-viewpass img").on('click', function(event) {
        event.preventDefault();
        var input = $(this).parents('.input2f').find('input');

        // input marker

        $(this).parents('.icon-viewpass').find('img').each(function(k, v) {
            if($(v).hasClass('pass-view')) {
                $(v).removeClass('pass-view')
                $(v).addClass('pass-none');
                input.attr('type', 'password')
            } else {
                $(v).addClass('pass-view')
                $(v).removeClass('pass-none');
                input.attr('type', 'text')
            }
        })
    });
    jQuery(document).ready(function($) {
          $('#form-step').on('submit', function(event) {
                event.preventDefault();
                alertConfirmForm('#form-step', 'กรอกแบบฟอร์มสมัครผู้ทรงคุณวุฒิ Step1 สำเร็จแล้ว คุณต้องการกรอกแบบฟอร์มสมัครผู้ทรงคุณวุฒิStepต่อไปไหม');
          })
    });
</script>
@endsection
