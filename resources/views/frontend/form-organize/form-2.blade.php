@extends('frontend.theme.master')

@section('content')
{!! Form::open() !!}
    <div class="insitepage2f">
        <div class="navication2f">
            <div class="container">
              <ol class="breadcrumb">
                  <li><a href="">หน้าหลัก</a></li>
                  <li><a href="">สมัคร</a></li>
                  <li class="active">ผู้แทนองค์กรปกครองส่วนท้องถิ่น สมัครสมาชิก ขั้นตอนที่ 1</li>
              </ol>
            </div>
        </div><!--end navication2f-->
        <div class="insite-banner2f">
            <div class="control-bannertext2f">
                <div class="container">
                  <div class="headline2f">
                    <h1>ผู้แทนองค์กรปกครองส่วนท้องถิ่น</h1>
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
                  <h4>ผู้แทนองค์กรปกครองส่วนท้องถิ่น สมัครสมาชิก ขั้นตอนที่ 1</h4>
                  <div class="set-form2f">
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f">เลขบัตรประชาชน</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input2f">
                                     {!! Form::text('personalId', null, ["id"=>"personalId","class"=>"form-control", "placeholder"=>"เลขบัตรประชาชน"]) !!}
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
                                <div class="text-input2f">จังหวัด</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input2f">
                                     {!! Form::select('provinceId', Helper::getProvices(), null, ["class"=>"form-control" ,"placeholder"=>"จังหวัด"]) !!}
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
                                <div class="text-input2f">อีเมล์</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input2f">
                                      {!! Form::text('email', null, ["class"=>"form-control", "placeholder"=>"อีเมล์"]) !!}
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
                                      {!! Form::password('password', ["class"=>"form-control", "placeholder"=>"รหัสผ่าน"]) !!}
                                      @if($errors->has('password'))
                                     <small>{{ $errors->first('password') }}</small>
                                     @endif
                                  <span class="icon-viewpass notview">
                                    <img src="{{asset("frontend/images/visibility-on.svg")}}" class="pass-view" alt="">
                                    <img src="{{asset("frontend/images/visibility-off.svg")}}" class="pass-none" alt="">
                                  </span>
                                </div>
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
                                    {!! Form::password('password_confirmation', ["class"=>"form-control", "placeholder"=>"รหัสผ่าน"]) !!}
                                    @if($errors->has('password_confirmation'))
                                   <small>{{ $errors->first('password_confirmation') }}</small>
                                   @endif
                                  <span class="icon-viewpass notview">
                                        <img src="{{asset("frontend/images/visibility-on.svg")}}" class="pass-view" alt="">
                                        <img src="{{asset("frontend/images/visibility-off.svg")}}" class="pass-none" alt="">
                                  </span>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                  </div><!--end set-form2f-->
                  <div class="btn-center2f">
                    <button type="reset" name="button" class="btn btn-border">ยกเลิก</button>
                    <button type="submit" name="button" class="btn btn-green">บันทึก</button>
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
 jQuery(document).ready(function($) {
      $("#personalId").mask('0-0000-00000-00-0');
  });
$(document).ready(function() {
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
});
</script>
@endsection
