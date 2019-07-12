@extends('frontend.theme.master')

@section('content')
{!! Form::open() !!}

    <div class="insitepage2f">
        <div class="navication2f">
            <div class="container">
              <ol class="breadcrumb">
                  <li><a href="">หน้าหลัก</a></li>
                  <li class="active">เข้าสู่ระบบ</li>
              </ol>
            </div>
        </div><!--end navication2f-->
        <div class="insite-banner2f">
            <div class="control-bannertext2f">
                <div class="container">
                  <div class="headline2f">
                    <h1>เข้าสู่ระบบ</h1>
                  </div>
                </div><!--end container-->
            </div><!--end control-bannertext2f-->
            <div class="img-banner2f">
              <img src="{{ asset("frontend/images/insite-banner02.jpg")}} " alt="">
            </div>
            <div class="bg-banner"><img src="{{ asset("frontend/images/bg-banner.png")}} " alt=""></div>
            <div class="shape-banner"></div>
        </div><!--end insite-banner2f-->
        <div class="control-insitepage2f">
            <div class="container">

              <div class="content-form2f loginpage">
                  <h4>เข้าสู่ระบบ</h4><Br>
                  <div class="set-form2f">
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-3 col-sm-4 nopaddingright">
                                <div class="text-input2f t-right2f">ชื่อผู้ใช้งาน</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input2f">
                                      {!! Form::text('username', null, ["class"=>"form-control", "placeholder"=>"ชื่อผู้ใช้งาน"]) !!}
                                      @if($errors->has('username'))
                                      <small>{{ $errors->first('username') }}</small>
                                      @endif
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->

                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-3 col-sm-4 nopaddingright">
                                <div class="text-input2f t-right2f">รหัสผ่าน</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input2f">
                                      {!! Form::password('password', ["class"=>"form-control"]) !!}
                                      @if($errors->has('password'))
                                      <small>{{ $errors->first('password') }}</small>
                                      @endif
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->

                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-3 col-sm-4 nopaddingright"></div>
                            <div class="col-md-6 col-sm-8">
                               <div class="regis-login2f">
                                   <div class="row">
                                       <div class="col-xs-6">
                                           <div class="t-forgetpass2f">
                                             <a href="">ลืมรหัสผ่าน?</a>
                                           </div>
                                       </div>
                                       <div class="col-xs-6">
                                           <div class="t-regis2f t-right2f">
                                             <a href="">สมัครสมาชิก</a>
                                           </div>
                                       </div>
                                   </div><!--end row-->
                               </div><!--end regis-login2f-->
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->

                  </div><!--end set-form2f-->
                  <div class="btn-center2f  t-left2f">
                      <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-8">
                          <button type="submit" name="button" class="btn btn-green">เข้าสู่ระบบ</button>
                        </div>
                      </div>

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

</script>
@endsection
