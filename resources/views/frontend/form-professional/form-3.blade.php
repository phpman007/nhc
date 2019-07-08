@extends('frontend.theme.master')

@section('content')
		<form method="post" id="form-step">
          <div class="insitepage2f">
              <div class="navication2f">
                  <div class="container">
                    <ol class="breadcrumb">
                        <li><a href="">หน้าหลัก</a></li>
                        <li><a href="">สมัคร</a></li>
                        <li class="active">ผู้ทรงคุณวุฒิ สมัครสมาชิก ขั้นตอนที่ 3</li>
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
                        <h4>ผู้ทรงคุณวุฒิ สมัครสมาชิก ขั้นตอนที่ 3</h4>

                        <div class="headform2f">การแสดงเจตนาสมัครเข้ากลุ่ม</div>
                        <div class="set-form2f">
                          <div class="box-input2f">
                              <div class="text-input2f nopadding">
                                ข้าพเจ้ามีความประสงค์ที่จะสมัครเป็นกรรมการสุขภาพแห่งชาติจากผู้ทรงคุณวุฒิในกลุ่ม
                              </div><!--end text-input2f-->
                          </div><!--end box-input2f-->
                          <div class="input-radio2f">
                              @foreach(DB::table('senior_groups')->get() as $key => $group)
                              <div class="box-radio2f">
                                <input type="radio" id="group{{ $key }}" name="seniorGroupId" value="{{ $group->id }}" {{ Auth::user()->seniorGroupId == $group->id ? 'checked' : $key == 0 ? 'checked' : '' }}>
                                <label for="group{{ $key }}">{{ $group->groupName }}</label>
                              </div>
                              @endforeach
                          </div><!--end input-radio2f-->
                          <div class="box-input2f boxremark">
                              <div class="text-input2f nopadding">
                                <strong>หมายเหตุ</strong>   ผู้ทรงคุณวุฒิสามารถสมัครได้กลุ่มใดกลุ่มหนึ่งใน ๖ กลุ่มนี้ เท่านั้น
                              </div><!--end text-input2f-->
                          </div><!--end box-input2f-->
                        </div><!--end set-form2f-->
                        <div class="btn-center2f">
                             <a href="{{ url('/cancel-form') }}" onclick="if(!confirm('ระบบจะไม่บันทึกข้อมูลและกลับไปยังหน้าแรก')) return false" class="btn btn-border confirmed-alert">ยกเลิก</a>
                            <button type="submit" name="button" class="btn btn-green">บันทึก</button>
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
