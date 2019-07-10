@extends('frontend.theme.master')

@section('content')
<style media="screen">

.line-progress2f {
top: 43px;
z-index: 4;
width: 78%;
left: 10%;
}
</style>
		<form method="post" id="form-step">
          <div class="insitepage2f">
              <div class="navication2f">
                  <div class="container">
                    <ol class="breadcrumb">
                        <li><a href="">หน้าหลัก</a></li>
                        <li><a href="">สมัคร</a></li>
                        <li class="active">ผู้ทรงคุณวุฒิ สมัครสมาชิก ขั้นตอนที่ 7</li>
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
                        <h4>ผู้ทรงคุณวุฒิ สมัครสมาชิก ขั้นตอนที่ 7</h4>

                        <div class="headform2f">การยืนยันข้อมูลการส่งใบสมัครผู้ทรงคุณวุฒิ</div>
                        <div class="set-form2f">
                          <div class="box-input2f">
                              <div class="text-input2f nopadding">
                                หากคุณกดส่งใบสมัครแล้วจะไม่สามารถแก้ไขข้อมูลใบสมัครได้อีก
                              </div><!--end text-input2f-->
                          </div><!--end box-input2f-->
                        </div><!--end set-form2f-->
                        <div class="btn-center2f">
                             <a href="{{ url('/cancel-form') }}" onclick="if(!confirm('ระบบจะไม่บันทึกข้อมูลและกลับไปยังหน้าแรก')) return false" class="btn btn-border confirmed-alert">ยกเลิก</a>
                            <button type="submit" name="button" class="btn btn-green">ตกลง</button>
                        </div><!--end btn-center2f-->
                    </div><!--end content-form2f-->
                  </div><!--end container-->
              </div><!--end control-insitepage2f-->

          </div><!--end insitepage2f-->
          {{ csrf_field() }}
      </form>
@endsection

@section('css')

    <link href="{{ asset("frontend/css/insitepage.css") }}" rel="stylesheet">
@endsection

@section('js')

@include('frontend.form-professional.global-js')
<script type="text/javascript">
jQuery(document).ready(function($) {
      $('#form-step').on('submit', function(event) {
            event.preventDefault();
            alertConfirmForm('#form-step', 'กรอกแบบฟอร์มสมัครผู้ทรงคุณวุฒิ Step3 สำเร็จแล้ว คุณต้องการกรอกแบบฟอร์มสมัครผู้ทรงคุณวุฒิStepต่อไปไหม');
      })
});
</script>
@endsection
