@extends('frontend.theme.master')

    <div class="insitepage2f">
        <div class="navication2f">
            <div class="container">
              <ol class="breadcrumb">
                  <li><a href="">หน้าหลัก</a></li>
                  <li><a href="">สมัคร</a></li>
                  <li class="active">ผู้แทนองค์กรภาคเอกชน สมัครสมาชิก ขั้นตอนที่ 1</li>
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
                        <li><span>&nbsp;</span></li>
                        <li><span>&nbsp;</span></li>
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
                      <li>
                          <div class="box-step2f">
                              <span>ขั้นตอนที่</span>
                              <strong>2</strong>
                          </div><!--end box-step2f-->
                      </li>
                      <li>
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
                  <h4>ผู้แทนองค์กรภาคเอกชน สมัครสมาชิก ขั้นตอนที่ 1</h4>
                  <div class="set-form2f">
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f nopadding">วัน/เดือน/พ.ศ.</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="box-date input-group date">
                                  <input type="text" class="form-control" name="" value="" placeholder="วัน/เดือน/พ.ศ.">
                                  <span class="input-group-addon"><img src="images/icon-calendar-gray.svg" alt="" data-pin-nopin="true"></span>
                                </div><!--end input_form-->
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f nopadding">ข้าพเจ้า</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input2f">
                                  <input type="text" name="" value="" class="form-control" placeholder="นาย/นาง/นางสาว">
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f nopadding">ชื่อ-นามสกุล</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input2f">
                                  <input type="text" name="" value="" class="form-control" placeholder="ชื่อ-นามสกุล">
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="text-input2f nopadding">
                        มีความประสงค์จะสมัครเข้ารับการเลือกเป็นกรรมการสุขภาพแห่งชาติ  จึงขอส่งใบสมัครของข้าพเจ้ามายังประธานคณะกรรมการสรรหา
                        </div><!--end text-input2f-->
                    </div><!--end box-input2f-->
                  </div><!--end set-form2f-->
                  <div class="headform2f">คุณสมบัติ</div>
                  <div class="set-form2f">
                    <div class="box-input2f">
                        <div class="text-input2f nopadding">
                          ข้าพเจ้าเป็นผู้มีคุณสมบัติของผู้ทรงคุณวุฒิที่จะเข้ารับการเลือกเป็นกรรมการสุขภาพแห่งชาติครบถ้วน  ดังนี้
                        </div><!--end text-input2f-->
                    </div><!--end box-input2f-->
                    <h5>๑.  คุณสมบัติทั่วไป</h5>
                    <div class="input-checkbox2f">
                        <div class="box-checkbox2f">
                          <label class="checkbox2f">๑) มีสัญชาติไทย
                            <input type="checkbox" checked="checked">
                            <span class="checkmark"></span>
                          </label>
                        </div><!--end box-checkbox2f-->
                        <div class="box-checkbox2f">
                          <label class="checkbox2f">๒) มีอายุไม่ต่ำกว่ายี่สิบปีบริบูรณ์
                            <input type="checkbox" checked="checked">
                            <span class="checkmark"></span>
                          </label>
                        </div><!--end box-checkbox2f-->
                        <div class="box-checkbox2f">
                          <label class="checkbox2f">๓) ไม่เป็นคนไร้ความสามารถหรือคนเสมือนไร้ความสามารถ
                            <input type="checkbox" checked="checked">
                            <span class="checkmark"></span>
                          </label>
                        </div><!--end box-checkbox2f-->
                        <div class="box-checkbox2f">
                          <label class="checkbox2f">๔) ไม่ติดยาเสพติดให้โทษ
                            <input type="checkbox">
                            <span class="checkmark"></span>
                          </label>
                        </div><!--end box-checkbox2f-->
                        <div class="box-checkbox2f">
                          <label class="checkbox2f">๕) ไม่เคยถูกลงโทษไล่ออก ปลดออก เลิกจ้าง หรือพ้นจากตำแหน่ง เพราะเหตุจากการทุจริตหรือประพฤติมิชอบ
                            <input type="checkbox">
                            <span class="checkmark"></span>
                          </label>
                        </div><!--end box-checkbox2f-->
                        <div class="box-checkbox2f">
                          <label class="checkbox2f">๖) ไม่เคยได้รับโทษจำคุกโดยคำพิพากษาถึงที่สุดให้จำคุก ไม่ว่าจะถูกจำคุกจริงหรือไม่ก็ตาม
                            เว้นแต่เป็นโทษสำหรับความผิดที่ได้กระทำโดยประมาทหรือ ความผิดลหุโทษ
                            <input type="checkbox">
                            <span class="checkmark"></span>
                          </label>
                        </div><!--end box-checkbox2f-->
                    </div><!--end input-checkbox2f-->

                  </div><!--end set-form2f-->
                  <div class="btn-center2f">
                      <button type="button" name="button" class="btn btn-border">ยกเลิก</button>
                      <button type="button" name="button" class="btn btn-green">บันทึก</button>
                      <button type="button" name="button" class="btn btn-border">หน้าถัดไป<img src="images/right-arrow-gray.svg" alt=""></button>
                  </div><!--end btn-center2f-->
              </div><!--end content-form2f-->
            </div><!--end container-->
        </div><!--end control-insitepage2f-->

    </div><!--end insitepage2f-->

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