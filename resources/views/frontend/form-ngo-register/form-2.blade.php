@extends('frontend.theme.master')

@section('content')

    <div class="insitepage2f">
        <div class="navication2f">
            <div class="container">
              <ol class="breadcrumb">
                  <li><a href="">หน้าหลัก</a></li>
                  <li><a href="">สมัคร</a></li>
                  <li class="active">ผู้แทนองค์กรภาคเอกชน ขอขึ้นทะเบียนองค์กรภาคเอกชน ขั้นตอนที่ 2</li>
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
                  <h4>ผู้แทนองค์กรภาคเอกชน ขอขึ้นทะเบียนองค์กรภาคเอกชน ขั้นตอนที่ 2</h4>
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
                                <div class="text-input2f nopadding">คำนำหน้า</div>
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
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f nopadding">จังหวัด</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input2f">
                                  <input type="text" name="" value="" class="form-control" placeholder="จังหวัด">
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="text-input2f nopadding">
                          ซึ่งเป็นผู้มีอำนาจกระทำการแทนองค์กร  ประสงค์จะขึ้นทะเบียนเป็นองค์กรผู้มีสิทธิเสนอชื่อผู้แทนเข้ารับการเลือกเป็นกรรมการสุขภาพแห่งชาติ
โดยมีรายละเอียดดังนี้
                        </div><!--end text-input2f-->
                    </div><!--end box-input2f-->
                  </div><!--end set-form2f-->
                  <div class="headform2f">ข้อมูลองค์กรภาคเอกชน</div>
                  <div class="set-form2f">
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f nopadding">๑.ชื่อองค์กร</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input2f">
                                  <input type="text" name="" value="" class="form-control" placeholder="ชื่อองค์กร">
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f nopadding">๒.สถานภาพขององค์กร</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input-radio2f inline-check">
                                    <div class="box-radio2f">
                                      <input type="radio" id="test1" name="test" checked>
                                      <label for="test1">ไม่เป็นนิติบุคคล</label>
                                    </div>
                                    <div class="box-radio2f">
                                      <input type="radio" id="test2" name="test">
                                      <label for="test2">เป็นนิติบุคคล</label>
                                    </div>
                                </div><!--end input-radio2f-->
                                <div class="input2f">
                                  <input type="text" name="" value="" class="form-control" placeholder="สถานภาพขององค์กร">
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f nopadding">๓.ที่ตั้งองค์กร</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input2f">
                                  <textarea name="name" rows="4" cols="40" class="form-control" placeholder="ที่ตั้งองค์กร"></textarea>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f nopadding">๔.ก่อตั้งองค์กรวันที่</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="box-date input-group date">
                                  <input type="text" class="form-control" name="" value="" placeholder="ก่อตั้งองค์กรวันที่">
                                  <span class="input-group-addon"><img src="images/icon-calendar-gray.svg" alt="" data-pin-nopin="true"></span>
                                </div><!--end input_form-->
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->

                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 col-xs-12 nopaddingright">
                                <div class="text-input2f nopadding">จำนวนสมาชิกในปัจจุบัน</div>
                            </div>
                            <div class="col-md-3 col-sm-8 col-xs-9">
                                <div class="input2f">
                                  <input type="text" name="" value="" class="form-control" placeholder="จำนวนสมาชิก">
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-2 col-xs-3 nopaddingleft">
                                <div class="text-unit2f text-input2f">คน</div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->

                    <div class="box-input2f">
                        <div class="text-input2f nopadding">๕.วัตถุประสงค์ขององค์กรที่สอดคล้องกับกลุ่มกิจกรรมที่ขอขึ้นทะเบียน</div>
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright"></div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input2f">
                                    <textarea name="name" rows="4" cols="40" class="form-control"
                                    placeholder="วัตถุประสงค์ขององค์กรที่สอดคล้องกับกลุ่มกิจกรรมที่ขอขึ้นทะเบียน"></textarea>
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
