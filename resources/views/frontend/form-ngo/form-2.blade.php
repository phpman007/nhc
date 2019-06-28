@extends('frontend.theme.master')
{!! Form::open() !!}
    <div class="insitepage2f">
        <div class="navication2f">
            <div class="container">
              <ol class="breadcrumb">
                  <li><a href="">หน้าหลัก</a></li>
                  <li><a href="">สมัคร</a></li>
                  <li class="active">ผู้แทนองค์กรภาคเอกชน สมัครสมาชิก ขั้นตอนที่ 2</li>
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
                  <h4>ผู้แทนองค์กรภาคเอกชน สมัครสมาชิก ขั้นตอนที่ 2</h4>
                  <div class="headform2f">การแสดงเจตนาสมัครเข้ากลุ่ม</div>
                  <div class="set-form2f">
                    <div class="box-input2f">
                        <div class="text-input2f nopadding">
                          ข้าพเจ้ามีความประสงค์ที่จะสมัครเป็นกรรมการสุขภาพแห่งชาติจากผู้แทนองค์กรเอกชนในกลุ่ม
                        </div><!--end text-input2f-->
                    </div><!--end box-input2f-->
                    <div class="input-radio2f">
                        <div class="box-radio2f">
                          <input type="radio" id="group1" name="radio-group" checked>
                          <label for="group1">ผู้แทนองค์กรที่ดำเนินงานเกี่ยวกับการดูแลสุขภาพตนเองและสมาชิก</label>
                        </div>
                        <div class="box-radio2f">
                          <input type="radio" id="group2" name="radio-group">
                          <label for="group2">ผู้แทนองค์กรที่ดำเนินงานด้านอาสาสมัคร จิตอาสา หรือรณรงค์เผยแพร่</label>
                        </div>
                        <div class="box-radio2f">
                          <input type="radio" id="group3" name="radio-group">
                          <label for="group3">ผู้แทนองค์กรที่ดำเนินงานด้านการแพทย์และสาธารณสุข</label>
                        </div>
                        <div class="box-radio2f">
                          <input type="radio" id="group4" name="radio-group">
                          <label for="group4">ผู้แทนองค์กรชุมชนที่ดำเนินงานด้านการพัฒนาในพื้นที่ชุมชน</label>
                        </div>
                        <div class="box-radio2f">
                          <input type="radio" id="group5" name="radio-group">
                          <label for="group5">กลุ่มพัฒนาประชาชนกลุ่มเป้าหมายเฉพาะ</label>
                        </div>
                        <div class="box-radio2f">
                          <input type="radio" id="group6" name="radio-group">
                          <label for="group6">ผู้แทนองค์กรที่ดำเนินงานด้านพัฒนาชุมชน สังคม นโยบายสาธารณะ พิทักษ์สิทธิมนุษยชน
                            การศึกษา ศาสนา ทรัพยากรธรรมชาติและสิ่งแวดล้อม หรืออื่นๆ ในเชิงประเด็น</label>
                        </div>
                    </div><!--end input-radio2f-->
                    <div class="box-input2f boxremark">
                        <div class="text-input2f nopadding">
                          <strong>หมายเหตุ</strong>   ผู้สมัครผู้แทนองค์กรภาคเอกชนสามารถสมัครได้กลุ่มใดกลุ่มหนึ่งใน ๕ กลุ่มนี้ เท่านั้น
                        </div><!--end text-input2f-->
                    </div><!--end box-input2f-->
                  </div><!--end set-form2f-->
                  <div class="btn-center2f">
                      <button type="button" name="button" class="btn btn-border"><img src="images/left-arrow-gray.svg" alt="">ย้อนกลับ</button>
                      <button type="submit" name="button" class="btn btn-green">บันทึก</button>
                      <button type="button" name="button" class="btn btn-border">หน้าถัดไป<img src="images/right-arrow-gray.svg" alt=""></button>
                  </div><!--end btn-center2f-->
              </div><!--end content-form2f-->
            </div><!--end container-->
        </div><!--end control-insitepage2f-->

    </div><!--end insitepage2f-->
{!! Form::close() !!}
@section('content')

@endsection

@section('css')

<link href="{{ asset("frontend/css/insitepage.css") }}" rel="stylesheet">
@endsection

@section('js')

@include('frontend.form-professional.global-js')
<script type="text/javascript">

</script>
@endsection
