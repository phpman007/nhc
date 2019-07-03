@extends('frontend.theme.master')

@section('content')
{!! Form::open(['files' => true]) !!}
    <div class="insitepage2f">
        <div class="navication2f">
            <div class="container">
              <ol class="breadcrumb">
                  <li><a href="">หน้าหลัก</a></li>
                  <li><a href="">สมัคร</a></li>
                  <li class="active">สมัครรับสิทธิ์ลงคะแนนผู้แทนองค์กรปกครองส่วนท้องถิ่น</li>
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

              <div class="content-form2f">
                  <h4>สมัครรับสิทธิ์ลงคะแนนผู้แทนองค์กรปกครองส่วนท้องถิ่น</h4>
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
                  <div class="set-form2f">
                    <h5>ข้าพเจ้ามีความประสงค์ที่จะสมัครรับสิทธิ์ลงคะแนนเลือกกรรมการสุขภาพแห่งชาติจากผู้แทนองค์กรปกครองส่วนท้องถิ่นในกลุ่ม</h5>
                    <div class="input-radio2f">
                        @foreach(DB::table('organization_groups')->get() as $key => $val)
                        <div class="box-radio2f">
                              @if($key == 0 )
                          {!! Form::radio('ngoGroupId', 1, ['id' => 'group-'. ($key+1)]) !!}
                              @else
                          {!! Form::radio('ngoGroupId', $val->id, $val->id == @Auth::user()->ngoGroupId ? 1 : 0, ['id' => 'group-'. ($key+1)]) !!}
                          @endif
                          <label for="group-{{ ($key+1) }}">{{ $val->groupName }}</label>
                        </div>
                        @endforeach
                    </div>
                  </div><!--end set-form2f-->
                  <div class="set-form2f">
                    <h5>ทั้งนี้ ข้าพเจ้าได้แนบสำเนาเอกสารหรือหลักฐานที่แนบมาพร้อมใบสมัคร</h5>
                    <div class="box-input2f">
                        <div class="text-input2f nopadding">สำเนาบัตรประจำตัวข้าราชการที่แสดงการดำรงตำแหน่งนายกองค์กรปกครองส่วนท้องถิ่นอยู่ ณ วันที่ยื่นใบสมัคร</div>
                        <div class="row">
                            <div class="col-md-6 col-sm-8 nopaddingright">
                                <div class="input2f">
                                  <input id="uploadFile01" class="form-control" placeholder="สำเนาบัตรประจำตัวประชาชน">
                                </div><!--end input2f-->
                            </div>
                            <div class="col-md-6 col-sm-4">
                                <div class="btn-2button">
                                    <div class="fileUpload btn btn-blue">
                                         <span>Upload</span>
                                         <input id="uploadBtn01" name="uploadBtn01" type="file" class="upload">
                                     </div>
                                </div><!--end btn-2button-->
                            </div>
                        </div><!--end row-->
                    </div>
                  </div><!--end set-form2f-->
                  <div class="">
                        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                        {!! htmlFormSnippet() !!}
                        @if($errors->has('g-recaptcha-response'))
                        กรุณากดยืนยันตัวก่อนยื่นเอกสาร
                        @endif
                  </div>
                  <div class="btn-center2f">
                    <button type="button" name="button" class="btn btn-border">ปิด</button>
                    <button type="submit" name="button" class="btn btn-green">ยื่นเอกสาร</button>
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

var filename;
document.getElementById('uploadBtn01').onchange = function () {
	filename = this.value.split(String.fromCharCode(92));
	document.getElementById("uploadFile01").value = filename[filename.length-1];
};
</script>
@endsection
