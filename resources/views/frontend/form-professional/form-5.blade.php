@extends('frontend.theme.master')

@section('content')
<style media="screen">
.modal-loading {
display:    none;
position:   fixed;
z-index:    1000;
top:        0;
left:       0;
height:     100%;
width:      100%;
background: rgba( 255, 255, 255, .8 )
           url('{{asset('frontend/images/loading.gif')}}')
           50% 50%
           no-repeat;
}
.content-form2f .text-input2f {
    padding-left: 0px;
}
/* When the body has the loading class, we turn
the scrollbar off with overflow:hidden */
body.loading .modal-loading {
overflow: hidden;
}

/* Anytime the body has the loading class, our
modal element will be visible */
body.loading .modal-loading {
display: block;
}
</style>
<form class="" id="form-step" method="post" enctype="multipart/form-data">
{!! Form::hidden('last_step', 5, []) !!}
{{ csrf_field() }}
          <div class="insitepage2f">
              <div class="navication2f">
                  <div class="container">
                    <ol class="breadcrumb">
                        <li><a href="{{ url('/') }}">หน้าหลัก</a></li>
                        <li><a href="">สมัคร</a></li>
                        <li class="active">ผู้ทรงคุณวุฒิ สมัครเป็นกรรมการสุขภาพแห่งชาติ ขั้นตอนที่ 5</li>
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
                        <h4>ผู้ทรงคุณวุฒิ สมัครเป็นกรรมการสุขภาพแห่งชาติ ขั้นตอนที่ 5</h4>
                        <div class="headform2f">วิสัยทัศน์ของข้าพเจ้าต่อการพัฒนาระบบสุขภาพแห่งชาติ</div>
                        <div class="set-form2f">
                          <div class="box-input2f">
					  {!! Form::textarea('vision',  Auth::user()->detail->vision, ["maxlength"=>"2048",'rows'=>"5" ,'cols'=>"50" ,'class'=>"form-control"
                                ,"onkeyup"=>"countChar(this)" ,'placeholder'=>"วิสัยทัศน์ของข้าพเจ้าต่อการพัฒนาระบบสุขภาพแห่งชาติ"]) !!}
                                ท่านพิมพ์ได้อีก <span id="charNum">2048</span> ตัวอักษร
					  @if($errors->has('vision'))
					<small>{{ $errors->first('vision') }}</small>
					@endif
                          </div><!--end box-input2f-->
                          <!-- <div class="box-input2f">
                             <div class="text-input2f nopadding">แนบไฟล์วิสัยทัศน์ (ไม่บังคับแนบไฟล์)</div>
                             <div class="row">
                                 <div class="col-md-6 col-sm-8 nopaddingright">
                                     <div class="input2f">
                                            <input type="text" name="uploadFile04" id="uploadFile04" class="form-control" placeholder="แนบไฟล์วิสัยทัศน์" readonly>
                                            <?php
                                            $file4 = Auth::user()->attach()->where('status', 1)->where('use_is', 'vision')->first();
                                             ?>
                                             <div class="t-notice">* สามารถอัพโหลดไฟล์ .jpg หรือ .pdf เท่านั้น ไฟล์ที่อัพโหลดจะถูก resize หากมีขนาดมากกว่าที่กำหนด (1024 พิกเซล) </div>
                                             @if($file4)
                                             <small><a target="_blank" href="{{asset($file4->path)}}">{{ $file4->fileName }}</a></small> |
                                             <a onclick="if(!confirm('ต้องการทำรายการหรือไม่?')) return false" href="{{ url('asset/remove/'. $file4->id) }}">ลบ</a>
                                             @endif
                                     </div>
                                 </div>
                                 <div class="col-md-6 col-sm-4">
                                     <div class="btn-2button">
                                         <div class="fileUpload btn btn-blue">
                                              <span>เลือกไฟล์</span>
                                              {!! Form::file('uploadBtn04', ['id' => 'uploadBtn04', 'class'=>'upload', 'accept'=>".jpg, .pdf"]) !!}

                                          </div>
                                     </div>
                                 </div>
                             </div>
                             @if($errors->has('uploadBtn04'))
                             <small>{{ $errors->first('uploadBtn04') }}</small>
                             @endif
                        </div> -->
                          <h5>ทั้งนี้  ข้าพเจ้าได้แนบสำเนาเอกสารหรือหลักฐานที่แนบมาพร้อมใบสมัคร</h5>

                          <div class="box-input2f">
                              <div class="text-input2f nopadding">สำเนาบัตรประจำตัวประชาชน</div>
                              <div class="row">
						<div class="col-md-12">
						  <div class="t-notice">* สามารถอัพโหลดไฟล์ .jpg ไฟล์ที่อัพโหลดจะถูก resize หากมีขนาดมากกว่าที่กำหนด (1024 พิกเซล)
	หรือ .pdf เท่านั้น ไฟล์ PDF ไม่ควรมีขนาดเกิน 20 mb </div>
						</div>
                                  <div class="col-md-6 col-sm-8 nopaddingright">
                                      <div class="input2f">
							   <input type="text" name="uploadFile01" id="uploadFile01" class="form-control" placeholder="สำเนาบัตรประจำตัวประชาชน" readonly>
                                             <?php
                                             $file1 = Auth::user()->attach()->where('status', 1)->where('use_is', 'copy_personal_card')->first();
                                              ?>
                                              @if($file1)
                                              @if($file1->type == "jpg")
                                              <img src="{{asset($file1->path)}}" alt="{{ $file1->fileName }}" class="img-responsive">
                                              @endif
                                              <small><a target="_blank" href="{{asset($file1->path)}}">{{ $file1->fileName }}</a></small> |
                                              <a onclick="if(!confirm('ต้องการทำรายการหรือไม่?')) return false" href="{{ url('asset/remove/'. $file1->id) }}">ลบ</a>
                                              @endif
                                      </div><!--end input2f-->
                                  </div>
                                  <div class="col-md-6 col-sm-4">
                                      <div class="btn-2button">
                                          <div class="fileUpload btn btn-blue">
                                               <span>เลือกไฟล์</span>
							     {!! Form::file('uploadBtn01', ['id' => 'uploadBtn01', 'class'=>'upload', 'accept'=>".jpg, .pdf"]) !!}

                                           </div>
                                      </div><!--end btn-2button-->
                                  </div>
                              </div><!--end row-->
					@if($errors->has('uploadBtn01'))
					<small>{{ $errors->first('uploadBtn01') }}</small>
					@endif
                          </div><!--end box-input2f-->
                          <div class="box-input2f">
                              <div class="text-input2f nopadding">รูปถ่ายหน้าตรงไม่สวมหมวก ไม่สวมแว่นตาดำ ฉากพื้นหลังไม่มีลวดลาย  ซึ่งถ่ายมาแล้วไม่เกิน  6  เดือน</div>
                              <div class="row">
						<div class="col-md-12">
						  <div class="t-notice">* สามารถอัพโหลดไฟล์ .jpg ไฟล์ที่อัพโหลดจะถูก resize หากมีขนาดมากกว่าที่กำหนด (1024 พิกเซล)
	หรือ .pdf เท่านั้น ไฟล์ PDF ไม่ควรมีขนาดเกิน 20 mb </div>
						</div>
                                  <div class="col-md-6 col-sm-8 nopaddingright">
                                      <div class="input2f">

							  <input type="text" name="uploadFile02" id="uploadFile02" class="form-control" placeholder="รูปถ่าย" readonly>

                                            <?php
                                           $file2 = Auth::user()->attach()->where('status', 1)->where('use_is', 'personal_photo')->first();
                                            ?>
                                            @if($file2)
                                            @if($file2->type == "jpg")
                                            <img src="{{asset($file2->path)}}" alt="{{ $file2->fileName }}" class="img-responsive">
                                            @endif
                                            <small><a target="_blank" href="{{asset($file2->path)}}">{{ $file2->fileName }}</a></small> | <a onclick="if(!confirm('ต้องการทำรายการหรือไม่?')) return false" href="{{ url('asset/remove/'. $file2->id) }}">ลบ</a>
                                            @endif
                                      </div><!--end input2f-->
                                  </div>
                                  <div class="col-md-6 col-sm-4">
                                      <div class="btn-2button">
                                          <div class="fileUpload btn btn-blue">
                                               <span>เลือกไฟล์</span>
							     {!! Form::file('uploadBtn02', ['id' => 'uploadBtn02', 'class'=>'upload', 'accept'=>".jpg, .pdf"]) !!}

                                           </div>
                                      </div><!--end btn-2button-->
                                  </div>
                              </div><!--end row-->
					@if($errors->has('uploadBtn02'))
					<small>{{ $errors->first('uploadBtn02') }}</small>
					@endif
                          </div><!--end box-input2f-->
                          <div class="box-input2f">
                              <div class="text-input2f nopadding">เอกสารสรุปผลงานอันเป็นที่ประจักษ์ ที่สอดคล้องกับประเภทกลุ่มผู้ทรงคุณวุฒิที่เลือกสมัคร<br>
                              (ไม่เกิน 2 หน้ากระดาษ A4) พิมพ์โดยใช้ตัวอักษรขนาดไม่ต่ำกว่า 16)</div>
                              <div class="row">
						<div class="col-md-12">
						  <div class="t-notice">* สามารถอัพโหลดไฟล์ .jpg ไฟล์ที่อัพโหลดจะถูก resize หากมีขนาดมากกว่าที่กำหนด (1024 พิกเซล)
	หรือ .pdf เท่านั้น ไฟล์ PDF ไม่ควรมีขนาดเกิน 20 mb </div>
						</div>
                                  <div class="col-md-6 col-sm-8 nopaddingright">
                                      <div class="input2f">
							  <input type="text" name="uploadFile03" id="uploadFile03" class="form-control" placeholder="เอกสารสรุปผลงานอันเป็นที่ประจักษ์" readonly>

                                            <?php
                                          $file3 = Auth::user()->attach()->where('status', 1)->where('use_is', 'document1')->first();
                                           ?>
                                           @if($file3)
                                           @if($file3->type == "jpg")
                                           <img src="{{asset($file3->path)}}" alt="{{ $file3->fileName }}" class="img-responsive">
                                           @endif
                                           <small><a target="_blank" href="{{asset($file3->path)}}">{{ $file3->fileName }}</a></small> | <a onclick="if(!confirm('ต้องการทำรายการหรือไม่?')) return false" href="{{ url('asset/remove/'. $file3->id) }}">ลบ</a>
                                           @endif
                                      </div><!--end input2f-->
                                  </div>
                                  <div class="col-md-6 col-sm-4">
                                      <div class="btn-2button">
                                          <div class="fileUpload btn btn-blue">
                                               <span>เลือกไฟล์</span>
							     {!! Form::file('uploadBtn03', ['id' => 'uploadBtn03', 'class'=>'upload', 'accept'=>".jpg, .pdf"]) !!}

                                           </div>
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

                              <small id="valid-check" style="display:none;">โปรดคลิกรับรองข้อมูลที่กรอกข้างต้นฯ ก่อนกดตรวจทานเอกสาร</small>
                            </div>
                          </div><!--end box-confirm2f-->

                        </div><!--end set-form2f-->
                        <div class="btn-center2f">
                             <a href="{{ url('/form-professional/4') }}" class="btn btn-border">ย้อนกลับ</a>
                             <a href="{{ url('/cancel-form') }}/1/5" class="btn btn-border confirmed-alert">ยกเลิก</a>
                            <button type="submit" id="submit-btn" name="button" class="btn btn-green disabled">ตรวจทานเอกสาร</button>
                        </div><!--end btn-center2f-->
                    </div><!--end content-form2f-->
                  </div><!--end container-->
              </div><!--end control-insitepage2f-->

          </div><!--end insitepage2f-->

	    </form>
          @if($errors->any())
          <div class="modal" id="myModal">
           <div class="modal-dialog">
              <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">แจ้งเตือน</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <ul>
                         @foreach ($errors->all() as $key =>$error)
                             <li> {{ $error }}</li>
                         @endforeach
                      </ul>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

              </div>
           </div>
          </div>
          @endif
          <div class="modal-loading"><!-- Place at bottom of page --></div>
@endsection


@section('js')

@include('frontend.form-professional.global-js')
<script type="text/javascript">
var filename;
$('#uploadBtn01, #uploadBtn02, #uploadBtn03').bind('change', function(e) {
	var element = $(this);
	  var kb = parseInt(this.files[0].size / 1024);
	  var mb = kb / 1024;
	  if(mb > 20) {
		  Swal.fire	('แจ้งเตือน', 'ไม่สามารถอัพโหลดไฟล์ที่เลือกได้เนื่องจากไฟล์มีขนาดใหญ่เกินกว่าที่กำหนด <br> <span style="color:red">ควรอัพไฟล์ไม่เกินกว่า 20mb</span>', 'info');
		  element.val('');
	  }

});
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
// var filename4;
// document.getElementById('uploadBtn04').onchange = function () {
// 	filename4 = this.value.split(String.fromCharCode(92));
// 	document.getElementById("uploadFile04").value = filename4[filename4.length-1];
// };
$(function($) {
     $('#accept').on('change', function(event) {
           event.preventDefault();
           if($(this).is(":checked")) {
                     $("#submit-btn").removeClass('disabled')
           } else {
                     $("#submit-btn").addClass('disabled',"disabled")
           }
     });
     $('#form-step').on('submit', function(e) {
          e.preventDefault()
          if($('#accept').is(":checked")) {
               $("#valid-check").hide();
               $('#form-step')[0].submit();
          } else {
               $("#valid-check").show();
               setTimeout(function () {
                    $('body').removeClass('loading')
               }, 500);

          }

     })
})
</script>
<script type="text/javascript">
jQuery(document).ready(function($) {
      $('#form-step').on('submit', function(event) {
            event.preventDefault();
            // alertConfirmForm('#form-step', 'กรอกแบบฟอร์มสมัครผู้ทรงคุณวุฒิ Step5 สำเร็จแล้ว คุณต้องการกรอกแบบฟอร์มสมัครผู้ทรงคุณวุฒิStepต่อไปไหม');
      })
});
</script>
<script>
      function countChar(val) {
        var len = val.value.length;
           $('#charNum').text(2048 - len);
      };
    </script>
<script type="text/javascript">
jQuery(document).ready(function($) {
     @if($errors->any())
     $('#myModal').modal('show')
     @endif
      $('#form-step').on('submit', function(event) {
           $('body').addClass('loading')
      })
});
</script>
@endsection
