@extends('frontend.theme.master')

@section('content')

    <div class="insitepage2f">
        <div class="navication2f">
            <div class="container">
              <ol class="breadcrumb">
                  <li><a href="">หน้าหลัก</a></li>
                  <li><a href="">สมัคร</a></li>
                  <li class="active">ผู้แทนองค์กรภาคเอกชน ขอขึ้นทะเบียนองค์กรภาคเอกชน ขั้นตอนที่ 3</li>
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
                        <li><span>&nbsp;</span></li>
                      </ul>
                    </div><!--end line-progress2f-->
                </div><!--end box-line-progress2f-->
                <div class="box-step-progress2f">
                    <ul class="list-inline">
                      <li class="active">
                          <div class="box-step2f">
                              <span>ขั้นตอนที่</span>
                              <strong>1</strong>
                          </div><!--end box-step2f-->
                      </li>
                      <li class="active">
                          <div class="box-step2f">
                              <span>ขั้นตอนที่</span>
                              <strong>2</strong>
                          </div><!--end box-step2f-->
                      </li>
                      <li class="active">
                          <div class="box-step2f">
                              <span>ขั้นตอนที่</span>
                              <strong>3</strong>
                          </div><!--end box-step2f-->
                      </li>
                      <li>
                          <div class="box-step2f">
                              <span>ขั้นตอนที่</span>
                              <strong>4</strong>
                          </div><!--end box-step2f-->
                      </li>
                    </ul>
                </div><!--end box-step-progress2f-->
                <div class="clear2f"></div>
              </div><!--end control-progress2f-->
              <div class="content-form2f">
                  <h4>ผู้แทนองค์กรภาคเอกชน ขอขึ้นทะเบียนองค์กรภาคเอกชน ขั้นตอนที่ 3</h4>
                  <div class="headform2f">ข้อมูลประกอบการขึ้นทะเบียน</div>
                  <div class="set-form2f">
                    <h5>๑. องค์กรฯ ประสงค์ขอขึ้นทะเบียนในกลุ่ม (เลือกได้เพียงหนึ่งกลุ่มเท่านั้น)</h5>
                    <div class="input-radio2f">
                        <div class="box-radio2f">
                          <input type="radio" id="group1" name="radio-group" checked>
                          <label for="group1">๑) กลุ่มขององค์กรที่ดำเนินงานเกี่ยวกับการดูแลสุขภาพของตนเองและสมาชิก</label>
                        </div>
                        <div class="box-radio2f">
                          <input type="radio" id="group2" name="radio-group">
                          <label for="group2">๒) กลุ่มขององค์กรที่ดำเนินงานด้านอาสาสมัคร งานจิตอาสา หรือการรณรงค์เผยแพร่</label>
                        </div>
                        <div class="box-radio2f">
                          <input type="radio" id="group3" name="radio-group">
                          <label for="group3">๓) กลุ่มขององค์กรที่ดำเนินงานด้านการแพทย์และสาธารณสุข</label>
                        </div>
                        <div class="box-radio2f">
                          <input type="radio" id="group4" name="radio-group">
                          <label for="group4">๔) กลุ่มขององค์กรชุมชนที่ดำเนินงานด้านการพัฒนาในพื้นที่ชุมชน</label>
                        </div>
                        <div class="box-radio2f">
                          <input type="radio" id="group5" name="radio-group">
                          <label for="group5">๕) กลุ่มขององค์กรที่ดำเนินงานด้านการพัฒนาชุมชน สังคม นโยบายสาธารณะ การพิทักษ์สิทธิมนุษยชน การศึกษา ศาสนา  ทรัพยากรธรรมชาติ
                          และสิ่งแวดล้อม หรืออื่นๆ ในเชิงประเด็น</label>
                        </div>
                    </div><!--end input-radio2f-->
                    <div class="box-input2f boxremark">
                        <div class="text-input2f nopadding">
                          <strong>หมายเหตุ</strong>   โปรดพิจารณารายละเอียดการจัดกลุ่มกิจกรรมที่เกี่ยวข้องกับสุขภาพ สำหรับองค์กรภาคเอกชนท้ายประกาศฯ
                        </div><!--end text-input2f-->
                    </div><!--end box-input2f-->
                  </div><!--end set-form2f-->
                  <div class="set-form2f">
                      <h5>๒. กิจกรรมการดำเนินงานที่เกี่ยวข้องกับสุขภาพในกลุ่มที่ขอขึ้นทะเบียนในพื้นที่จังหวัด(เขต) ๒ กิจกรรมที่สำคัญ ในระยะเวลาไม่เกิน ๓ ปี มีดังนี้</h5>
                      <div class="text-titlenumber"><span>กิจกรรมที่  ๑</span></div>
                      <div class="box-input2f">
                          <div class="row">
                              <div class="col-md-2 col-sm-4 nopaddingright">
                                  <div class="text-input2f textinput02">ชื่อกิจกรรม</div>
                              </div>
                              <div class="col-md-6 col-sm-8">
                                  <div class="input2f">
                                    <input type="text" name="" value="" class="form-control" placeholder="ชื่อกิจกรรม">
                                  </div>
                              </div>
                          </div><!--end row-->
                      </div><!--end box-input2f-->
                      <div class="box-input2f">
                          <div class="row">
                              <div class="col-md-2 col-sm-4 nopaddingright">
                                  <div class="text-input2f textinput02">สรุปผลงานที่สำคัญ</div>
                              </div>
                              <div class="col-md-6 col-sm-8">
                                  <div class="input2f">
                                    <textarea name="name" rows="4" cols="40" class="form-control" placeholder="สรุปผลงานที่สำคัญ"></textarea>
                                  </div>
                              </div>
                          </div><!--end row-->
                      </div><!--end box-input2f-->
                      <div class="text-titlenumber"><span>กิจกรรมที่  ๒</span></div>
                      <div class="box-input2f">
                          <div class="row">
                              <div class="col-md-2 col-sm-4 nopaddingright">
                                  <div class="text-input2f textinput02">ชื่อกิจกรรม</div>
                              </div>
                              <div class="col-md-6 col-sm-8">
                                  <div class="input2f">
                                    <input type="text" name="" value="" class="form-control" placeholder="ชื่อกิจกรรม">
                                  </div>
                              </div>
                          </div><!--end row-->
                      </div><!--end box-input2f-->
                      <div class="box-input2f">
                          <div class="row">
                              <div class="col-md-2 col-sm-4 nopaddingright">
                                  <div class="text-input2f textinput02">สรุปผลงานที่สำคัญ</div>
                              </div>
                              <div class="col-md-6 col-sm-8">
                                  <div class="input2f">
                                    <textarea name="name" rows="4" cols="40" class="form-control" placeholder="สรุปผลงานที่สำคัญ"></textarea>
                                  </div>
                              </div>
                          </div><!--end row-->
                      </div><!--end box-input2f-->
                  </div><!--end set-form2f-->
                  <div class="btn-center2f">
                      <button type="button" name="button" class="btn btn-border"><img src="images/left-arrow-gray.svg" alt="">ย้อนกลับ</button>
                      <button type="button" name="button" class="btn btn-green">บันทึก</button>
                      <button type="button" name="button" class="btn btn-border">หน้าถัดไป<img src="images/right-arrow-gray.svg" alt=""></button>
                  </div><!--end btn-center2f-->
              </div><!--end content-form2f-->
            </div><!--end container-->
        </div><!--end control-insitepage2f-->

    </div><!--end insitepage2f-->

@endsection

@section('css')

<link href="{{ asset("frontend/css/insitepage.css") }}" rel="stylesheet">
@endsection

@section('js')

@include('frontend.form-professional.global-js')
<script type="text/javascript">

</script>
@endsection
