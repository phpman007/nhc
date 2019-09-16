@extends('frontend.theme.master')

@section('content')
</style>
		<form method="post" id="form-step">
          <div class="insitepage2f">
              <div class="navication2f">
                  <div class="container">
                    <ol class="breadcrumb">
                        <li><a href="{{ url('/') }}">หน้าหลัก</a></li>
                        <li><a href="">สมัคร</a></li>
                        <li class="active">ผู้ทรงคุณวุฒิ สมัครเป็นกรรมการสุขภาพแห่งชาติ ขั้นตอนที่ 7</li>
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
                        <h4>ผู้ทรงคุณวุฒิ สมัครเป็นกรรมการสุขภาพแห่งชาติ ขั้นตอนที่ 7</h4>

                        <div class="headform2f">การยืนยันข้อมูลการส่งใบสมัครผู้ทรงคุณวุฒิ</div>
                        <div class="set-form2f">
                          <div class="box-input2f">
                              <div class="text-input2f nopadding" style="color:red;font-size:30px !important">
                                ท่านสามารถแก้ไขข้อมูลใบสมัคร และส่งใบสมัครให้แล้วเสร็จภายในวันที่ 13 กันยายน 2562 เวลา 16.30 น.
                              </div><!--end text-input2f-->
                          </div><!--end box-input2f-->
                        </div><!--end set-form2f-->
                        <div class="btn-center2f">
                             <a href="{{ url('/form-professional/6') }}" class="btn btn-border">ย้อนกลับ</a>
		                         <a href="{{ url('/cancel-form') }}/1/7" class="btn btn-border confirmed-alert">ส่งใบสมัครภายหลัง</a>
                            <button type="submit" name="button" class="btn btn-green">ยืนยันการส่งใบสมัคร</button>
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
            alertConfirmForm('#form-step', 'กรอกแบบฟอร์มสมัครผู้ทรงคุณวุฒิ Step3 สำเร็จแล้ว คุณต้องการกรอกแบบฟอร์มสมัครผู้ทรงคุณวุฒิStepต่อไปไหม');
      })
	@if(session('success'))
      Swal.fire({
         type: 'success',
         title: 'สำเร็จ',
	   showCancelButton: false,
	   showConfirmButton: false,
         html : 'ท่านได้ยื่นใบสมัครเข้ารับการเลือกเป็นกรรมการสุขภาพแห่งชาติเรียบร้อยแล้ว <br>ท่านสามารถสั่งพิมพ์ใบสมัครได้ โดยการ<a style="color:blue;font-weight:bold" target="_blank" href="{{asset('pdf/professional-merge/'.Auth::user()->detail->docId.'.pdf')}}"> "คลิกที่นี่"</a> <br><br>หมายเหตุ : ระบบจะจัดส่งไฟล์ "ใบสมัครกรรมการสุขภาพแห่งชาติ" ไปยังอีเมลของท่าน <br>หากไม่พบในกล่องจดหมาย (Inbox) กรุณาตรวจสอบในกล่องจดหมายขยะ (Spam)',
         confirmButtonText: 'ปิด',
         footer: '<a style="font-size: 29px;font-weight: bold;" href="{{ url('/') }}">กลับหน้าแรก</a>'
      })
      @endif
});
</script>
@endsection
