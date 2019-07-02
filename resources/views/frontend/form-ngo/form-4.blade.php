@extends('frontend.theme.master')

@section('content')
{!! Form::open() !!}
    <div class="insitepage2f">
        <div class="navication2f">
            <div class="container">
              <ol class="breadcrumb">
                  <li><a href="">หน้าหลัก</a></li>
                  <li><a href="">สมัคร</a></li>
                  <li class="active">ผู้แทนองค์กรภาคเอกชน สมัครสมาชิก ขั้นตอนที่ 4</li>
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
                        <li class="active"><span>&nbsp;</span></li>
                        <li class="active"><span>&nbsp;</span></li>
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
                  <h4>ผู้แทนองค์กรภาคเอกชน สมัครสมาชิก ขั้นตอนที่ 4</h4>
                  <div class="headform2f">วิสัยทัศน์ของข้าพเจ้าต่อการพัฒนาระบบสุขภาพแห่งชาติ</div>
                  <div class="set-form2f">
                    <div class="box-input2f">
                          {!! Form::textarea('vision', Auth::user()->detail->vision, [ "rows"=>"5", "cols"=>"50", "class"=>"form-control", "placeholder"=>"วิสัยทัศน์ของข้าพเจ้าต่อการพัฒนาระบบสุขภาพแห่งชาติ"]) !!}
                          @if($errors->has('vision'))
                          {{ $errors->first('vision') }}
                          @endif
                    </div><!--end box-input2f-->
                    <h5>ทั้งนี้  ข้าพเจ้าได้แนบสำเนาเอกสารหรือหลักฐานที่แนบมาพร้อมใบสมัคร</h5>

                    <div class="box-input2f">
                        <div class="text-input2f nopadding">สำเนาบัตรประจำตัวประชาชน</div>
                        <div class="row">
                            <div class="col-md-6 col-sm-8 nopaddingright">
                                <div class="input2f">
                                  <input id="uploadFile01" name="uploadFile01" class="form-control" placeholder="สำเนาบัตรประจำตัวประชาชน"  />
                                  <?php
                                  $file1 = Auth::user()->attach()->where('status', 1)->where('use_is', 'copy_personal_card')->first();
                                   ?>
                                   @if($file1)
                                   <small><a target="_blank" href="{{asset($file1->path)}}">{{ $file1->fileName }}</a></small>
                                   @endif
                                </div><!--end input2f-->
                            </div>
                            <div class="col-md-6 col-sm-4">
                                <div class="btn-2button">
                                    <div class="fileUpload btn btn-blue">
                                         <span>Upload</span>
                                         <input name="uploadBtn01" id="uploadBtn01" type="file" class="upload" />
                                     </div>
                                </div><!--end btn-2button-->
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="text-input2f nopadding">รูปถ่ายหน้าตรงไม่สวมหมวก ไม่สวมแว่นตาดำ ฉากพื้นหลังไม่มีลวดลาย  ซึ่งถ่ายมาแล้วไม่เกิน  ๖  เดือน</div>
                        <div class="row">
                            <div class="col-md-6 col-sm-8 nopaddingright">
                                <div class="input2f">
                                  <input id="uploadFile02" class="form-control" placeholder="รูปถ่าย"  />
                                  <?php
                                 $file2 = Auth::user()->attach()->where('status', 1)->where('use_is', 'personal_photo')->first();
                                  ?>
                                  @if($file2)
                                  <small><a target="_blank" href="{{asset($file2->path)}}">{{ $file2->fileName }}</a></small>
                                  @endif
                                </div><!--end input2f-->
                            </div>
                            <div class="col-md-6 col-sm-4">
                                <div class="btn-2button">
                                    <div class="fileUpload btn btn-blue">
                                         <span>Upload</span>
                                         <input  name="uploadBtn02" id="uploadBtn02" type="file" class="upload" />

                                     </div>
                                     <button type="button" name="button" class="btn btn-purple">ตัวอย่าง</button>
                                </div><!--end btn-2button-->
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="text-input2f nopadding">แบบ สช./แบบขอขึ้นทะเบียนองค์กรภาคเอกชนและยืนยันการส่งผู้แทนภาคเอกชน/๒๕๖๒ พร้อมเอกสารหลักฐานประกอบ ๑ ชุด</div>
                        <div class="row">
                            <div class="col-md-6 col-sm-8 nopaddingright">
                                <div class="input2f">
                                  <input name="uploadFile03" id="uploadFile03" class="form-control" placeholder="แบบ สช./แบบขอขึ้นทะเบียนองค์กรภาคเอกชน"  />
                                  <?php
                                $file3 = Auth::user()->attach()->where('status', 1)->where('use_is', 'document1')->first();
                                 ?>
                                 @if($file3)
                                 <small><a target="_blank" href="{{asset($file3->path)}}">{{ $file3->fileName }}</a></small>
                                 @endif
                                </div><!--end input2f-->
                            </div>
                            <div class="col-md-6 col-sm-4">
                                <div class="btn-2button">
                                    <div class="fileUpload btn btn-blue">
                                         <span>Upload</span>
                                         <input name="uploadBtn03" id="uploadBtn03" type="file" class="upload" />
                                     </div>
                                </div><!--end btn-2button-->
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-confirm2f">
                      <div class="box-checkbox2f">
                        <label class="checkbox2f">ข้าพเจ้าขอรับรองว่าข้อมูลที่กรอกข้างต้น  และเอกสารที่แนบมาพร้อมใบสมัครเป็นความจริงทุกประการ  หากมีข้อมูลใดเป็นเท็จหรือไม่ตรงกับความเป็นจริง  ข้าพเจ้ายินยอมให้ถูกตัดสิทธิ์จากการเป็นผู้สมัครหรือผู้ถูกเสนอชื่อในครั้งนี้
                          <input id="accept" type="checkbox">
                          <span class="checkmark"></span>
                        </label>
                      </div>
                    </div><!--end box-confirm2f-->

                  </div><!--end set-form2f-->

                  <div class="btn-center2f">
                      <button type="button" name="button" class="btn btn-border"><img src="images/left-arrow-gray.svg" alt="">ย้อนกลับ</button>
                      <button type="submit" id="submit-btn" name="button" disabled class="btn btn-green">ตรวจสอบเอกสาร</button>
                  </div><!--end btn-center2f-->
              </div><!--end content-form2f-->
            </div><!--end container-->
        </div><!--end control-insitepage2f-->

    </div><!--end insitepage2f-->
{!! Form::close() !!}
@endsection

@section('css')

<link href="{{ asset("frontend/css/insitepage.css") }}" rel="stylesheet">
<style media="screen">
  button[disabled], html input[disabled] {
        width:inherit !important;
  }
  .btnfixed .btn-center2f .btn {
        max-width: 215px;
        margin: 6px;
  }
</style>
@endsection

@section('js')

@include('frontend.form-professional.global-js')
<script type="text/javascript">
var filename;
document.getElementById('uploadBtn01').onchange = function () {
	filename = this.value.split(String.fromCharCode(92));
	document.getElementById("uploadFile01").value = filename[filename.length-1];
};
var filename2;
document.getElementById('uploadBtn02').onchange = function () {
	filename2 = this.value.split(String.fromCharCode(92));
	document.getElementById("uploadFile02").value = filename2[filename2.length-1];
};
var filename3;
document.getElementById('uploadBtn03').onchange = function () {
	filename3 = this.value.split(String.fromCharCode(92));
	document.getElementById("uploadFile03").value = filename3[filename3.length-1];
};
$('#accept').on('change', function(event) {
      event.preventDefault();
      if($(this).is(":checked")) {
            $("#submit-btn").removeAttr('disabled')
      } else {
            $("#submit-btn").attr('disabled',"disabled")
      }
});

</script>
@endsection
