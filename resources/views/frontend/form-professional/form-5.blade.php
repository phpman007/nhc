@extends('frontend.theme.master')

@section('content')
<form class="" id="form-step" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
          <div class="insitepage2f">
              <div class="navication2f">
                  <div class="container">
                    <ol class="breadcrumb">
                        <li><a href="">หน้าหลัก</a></li>
                        <li><a href="">สมัคร</a></li>
                        <li class="active">ผู้ทรงคุณวุฒิ สมัครสมาชิก ขั้นตอนที่ 5</li>
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
                              <li class="active"><span>&nbsp;</span></li>
                              <li class="active"><span>&nbsp;</span></li>
                              <li class="active"><span>&nbsp;</span></li>
                              <li class=""><span>&nbsp;</span></li>
                              <li class=""><span>&nbsp;</span></li>
                              <li class=""><span>&nbsp;</span></li>
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
                        <h4>ผู้ทรงคุณวุฒิ สมัครสมาชิก ขั้นตอนที่ 5</h4>
                        <div class="headform2f">วิสัยทัศน์ของข้าพเจ้าต่อการพัฒนาระบบสุขภาพแห่งชาติ</div>
                        <div class="set-form2f">
                          <div class="box-input2f">
					  {!! Form::textarea('vision',  Auth::user()->detail->vision, ['rows'=>"5" ,'cols'=>"50" ,'class'=>"form-control" ,'placeholder'=>"ประสบการณ์สำคัญหรือประสบการณ์ที่ภาคภูมิใจที่สัมพันธ์กับประเภทกลุ่มผู้ทรงคุณวุฒิที่เลือกสมัคร (ท่านสามารถกรอกตัวอักษรได้ 1024 ตัวอักษร)"]) !!}
					  @if($errors->has('vision'))
					<small>{{ $errors->first('vision') }}</small>
					@endif
                          </div><!--end box-input2f-->
                          <div class="box-input2f">
                             <div class="text-input2f nopadding">แนบไฟล์วิสัยทัศน์</div>
                             <div class="row">
                                 <div class="col-md-6 col-sm-8 nopaddingright">
                                     <div class="input2f">
                                            <input type="text" name="uploadFile04" id="uploadFile04" class="form-control" placeholder="แนบไฟล์วิสัยทัศน์" readonly>
                                            <?php
                                            $file4 = Auth::user()->attach()->where('status', 1)->where('use_is', 'vision')->first();
                                             ?>
                                             <div class="t-notice">* สามารถอัพโหลดไฟล์ .jpg, .png, .gif หรือ .pdf เท่านั้น</div>
                                             @if($file4)
                                             <small><a target="_blank" href="{{asset($file4->path)}}">{{ $file4->fileName }}</a></small> |
                                             <a onclick="if(!confirm('ต้องการทำรายการหรือไม่?')) return false" href="{{ url('asset/remove/'. $file4->id) }}">ลบ</a>
                                             @endif
                                     </div><!--end input2f-->
                                 </div>
                                 <div class="col-md-6 col-sm-4">
                                     <div class="btn-2button">
                                         <div class="fileUpload btn btn-blue">
                                              <span>Upload</span>
                                              {!! Form::file('uploadBtn04', ['id' => 'uploadBtn04', 'class'=>'upload', 'accept'=>".jpg, .png, .pdf"]) !!}

                                          </div>
                                     </div><!--end btn-2button-->
                                 </div>
                             </div><!--end row-->
                             @if($errors->has('uploadBtn04'))
                             <small>{{ $errors->first('uploadBtn04') }}</small>
                             @endif
                        </div><!--end box-input2f-->
                          <h5>ทั้งนี้  ข้าพเจ้าได้แนบสำเนาเอกสารหรือหลักฐานที่แนบมาพร้อมใบสมัคร</h5>

                          <div class="box-input2f">
                              <div class="text-input2f nopadding">สำเนาบัตรประจำตัวประชาชน</div>
                              <div class="row">
                                  <div class="col-md-6 col-sm-8 nopaddingright">
                                      <div class="input2f">
							   <input type="text" name="uploadFile01" id="uploadFile01" class="form-control" placeholder="สำเนาบัตรประจำตัวประชาชน" readonly>
                                             <?php
                                             $file1 = Auth::user()->attach()->where('status', 1)->where('use_is', 'copy_personal_card')->first();
                                              ?>
                                              <div class="t-notice">* สามารถอัพโหลดไฟล์ .jpg, .png, .gif หรือ .pdf เท่านั้น</div>
                                              @if($file1)
                                              <small><a target="_blank" href="{{asset($file1->path)}}">{{ $file1->fileName }}</a></small> |
                                              <a onclick="if(!confirm('ต้องการทำรายการหรือไม่?')) return false" href="{{ url('asset/remove/'. $file1->id) }}">ลบ</a>
                                              @endif
                                      </div><!--end input2f-->
                                  </div>
                                  <div class="col-md-6 col-sm-4">
                                      <div class="btn-2button">
                                          <div class="fileUpload btn btn-blue">
                                               <span>Upload</span>
							     {!! Form::file('uploadBtn01', ['id' => 'uploadBtn01', 'class'=>'upload', 'accept'=>".jpg, .png, .pdf"]) !!}

                                           </div>
                                      </div><!--end btn-2button-->
                                  </div>
                              </div><!--end row-->
					@if($errors->has('uploadBtn01'))
					<small>{{ $errors->first('uploadBtn01') }}</small>
					@endif
                          </div><!--end box-input2f-->
                          <div class="box-input2f">
                              <div class="text-input2f nopadding">รูปถ่ายหน้าตรงไม่สวมหมวก ไม่สวมแว่นตาดำ ฉากพื้นหลังไม่มีลวดลาย  ซึ่งถ่ายมาแล้วไม่เกิน  ๖  เดือน</div>
                              <div class="row">
                                  <div class="col-md-6 col-sm-8 nopaddingright">
                                      <div class="input2f">

							  <input type="text" name="uploadFile02" id="uploadFile02" class="form-control" placeholder="รูปถ่าย" readonly>
                                            <div class="t-notice">* สามารถอัพโหลดไฟล์ .jpg, .png, .gif หรือ .pdf เท่านั้น</div>
                                            <?php
                                           $file2 = Auth::user()->attach()->where('status', 1)->where('use_is', 'personal_photo')->first();
                                            ?>
                                            @if($file2)
                                            <small><a target="_blank" href="{{asset($file2->path)}}">{{ $file2->fileName }}</a></small> | <a onclick="if(!confirm('ต้องการทำรายการหรือไม่?')) return false" href="{{ url('asset/remove/'. $file2->id) }}">ลบ</a>
                                            @endif
                                      </div><!--end input2f-->
                                  </div>
                                  <div class="col-md-6 col-sm-4">
                                      <div class="btn-2button">
                                          <div class="fileUpload btn btn-blue">
                                               <span>Upload</span>
							     {!! Form::file('uploadBtn02', ['id' => 'uploadBtn02', 'class'=>'upload', 'accept'=>".jpg, .png, .pdf"]) !!}

                                           </div>
                                           <button type="button" name="button" class="btn btn-purple">ตัวอย่าง</button>
                                      </div><!--end btn-2button-->
                                  </div>
                              </div><!--end row-->
					@if($errors->has('uploadBtn02'))
					<small>{{ $errors->first('uploadBtn02') }}</small>
					@endif
                          </div><!--end box-input2f-->
                          <div class="box-input2f">
                              <div class="text-input2f nopadding">เอกสารสรุปผลงานอันเป็นที่ประจักษ์ ที่สอดคล้องกับประเภทกลุ่มผู้ทรงคุณวุฒิที่เลือกสมัคร<br>
                              (ไม่เกิน ๒ หน้ากระดาษ A4) พิมพ์โดยใช้ตัวอักษรขนาดไม่ต่ำกว่า ๑๖)</div>
                              <div class="row">
                                  <div class="col-md-6 col-sm-8 nopaddingright">
                                      <div class="input2f">
							  <input type="text" name="uploadFile03" id="uploadFile03" class="form-control" placeholder="เอกสารสรุปผลงานอันเป็นที่ประจักษ์" readonly>
                                            <div class="t-notice">* สามารถอัพโหลดไฟล์ .jpg, .png, .gif หรือ .pdf เท่านั้น</div>
                                            <?php
                                          $file3 = Auth::user()->attach()->where('status', 1)->where('use_is', 'document1')->first();
                                           ?>
                                           @if($file3)
                                           <small><a target="_blank" href="{{asset($file3->path)}}">{{ $file3->fileName }}</a></small> | <a onclick="if(!confirm('ต้องการทำรายการหรือไม่?')) return false" href="{{ url('asset/remove/'. $file3->id) }}">ลบ</a>
                                           @endif
                                      </div><!--end input2f-->
                                  </div>
                                  <div class="col-md-6 col-sm-4">
                                      <div class="btn-2button">
                                          <div class="fileUpload btn btn-blue">
                                               <span>Upload</span>
							     {!! Form::file('uploadBtn03', ['id' => 'uploadBtn03', 'class'=>'upload', 'accept'=>".jpg, .png, .pdf"]) !!}

                                           </div>
                                           <button type="button" name="button" class="btn btn-purple">ตัวอย่าง</button>
                                      </div><!--end btn-2button-->
                                  </div>
                              </div><!--end row-->
					@if($errors->has('uploadBtn03'))
					<small>{{ $errors->first('uploadBtn03') }}</small>
					@endif
                          </div><!--end box-input2f-->
                          <div class="box-confirm2f">
                            <div class="box-checkbox2f">
                              <label class="checkbox2f">ข้าพเจ้าขอรับรองว่าข้อมูลที่กรอกข้างต้น  และเอกสารที่แนบมาพร้อมใบสมัครเป็นความจริงทุกประการ
                                หากมีข้อมูลใดเป็นเท็จหรือไม่ตรงกับความเป็นจริง ข้าพเจ้ายินยอมให้ถูกตัดสิทธิ์จากการเป็นผู้สมัครหรือผู้ถูกเสนอชื่อในครั้งนี้
                                <input type="checkbox" id="accept">
                                <span class="checkmark"></span>
                              </label>
                            </div>
                          </div><!--end box-confirm2f-->

                        </div><!--end set-form2f-->
                        <div class="btn-center2f">
                             <a href="{{ url('/cancel-form') }}" onclick="if(!confirm('ระบบจะไม่บันทึกข้อมูลและกลับไปยังหน้าแรก')) return false" class="btn btn-border confirmed-alert">ยกเลิก</a>
                            <button type="submit" id="submit-btn" name="button" class="btn btn-green" disabled>ตรวจทานเอกสาร</button>
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
var filename4;
document.getElementById('uploadBtn04').onchange = function () {
	filename4 = this.value.split(String.fromCharCode(92));
	document.getElementById("uploadFile04").value = filename4[filename4.length-1];
};
$(function($) {
	$('#accept').on('change', function(event) {
		event.preventDefault();
		if($(this).is(":checked")) {
			$("#submit-btn").removeAttr('disabled')
		} else {
			$("#submit-btn").attr('disabled',"disabled")
		}
	});
})
</script>
<script type="text/javascript">
jQuery(document).ready(function($) {
      $('#form-step').on('submit', function(event) {
            event.preventDefault();
            alertConfirmForm('#form-step', 'กรอกแบบฟอร์มสมัครผู้ทรงคุณวุฒิ Step5 สำเร็จแล้ว คุณต้องการกรอกแบบฟอร์มสมัครผู้ทรงคุณวุฒิStepต่อไปไหม');
      })
});
</script>
@endsection
