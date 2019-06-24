@extends('frontend.theme.master')

@section('content')

    <div class="insitepage2f">
        <div class="navication2f">
            <div class="container">
              <ol class="breadcrumb">
                  <li><a href="">หน้าหลัก</a></li>
                  <li><a href="">สมัคร</a></li>
                  <li class="active">ผู้แทนองค์กรภาคเอกชน ขอขึ้นทะเบียนองค์กรภาคเอกชน ขั้นตอนที่ 4</li>
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
                      <li class="active">
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
                  <h4>ผู้แทนองค์กรภาคเอกชน ขอขึ้นทะเบียนองค์กรภาคเอกชน ขั้นตอนที่ 4</h4>
                  <div class="headform2f">ข้อมูลเสนอชื่อผู้แทนองค์กรภาคเอกชน</div>
                  <div class="set-form2f">
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f nopadding">ด้วยองค์กร</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input2f">
                                  <input type="text" name="" value="" class="form-control" placeholder="ด้วยองค์กร">
                                </div>
                                <div class="text-underline">ได้เสนอ</div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f nopadding">ชื่อ</div>
                            </div>
                            <div class="col-md-2 col-sm-3 nopaddingright">
                                <div class="input2f">
                                  <input type="text" name="" value="" class="form-control" placeholder="คำนำหน้า">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-5">
                                <div class="input2f">
                                  <input type="text" name="" value="" class="form-control" placeholder="ชื่อ - นามสกุล">
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f nopadding">ตำแหน่งสมาชิกในองค์กร</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input2f">
                                  <input type="text" name="" value="" class="form-control" placeholder="ตำแหน่งสมาชิกในองค์กร">
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-10">
                                <div class="text-desinput2f">
                                  เป็นผู้แทนองค์กรเข้ารับการเลือกเป็นกรรมการสุขภาพแห่งชาติจากผู้แทนองค์กรภาคเอกชน
                                  ข้อมูลที่กรอกข้างต้นเป็นความจริง
                                  ทุกประการ  หากมีข้อมูลใดเป็นเท็จหรือไม่ตรงกับความเป็นจริง ข้าพเจ้ายินยอมให้ถูกตัดสิทธิ์จากการเป็นผู้สมัครหรือ
                                  ผู้ถูกเสนอชื่อในครั้งนี้
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <h5>ทั้งนี้ ข้าพเจ้าได้ยื่นแบบขอขึ้นทะเบียนองค์กรและยืนยันการส่งผู้แทนองค์กรภาคเอกชน พร้อมเอกสารหลักฐานประกอบการขอขึ้นทะเบียน มาพร้อมนี้</h5>
                    <p class="green2f"><span class="underline2f">สำหรับองค์กรภาคเอกชนที่เป็นนิติบุคคล</span> ประกอบด้วย</p>
                    <div class="box-input2f">
                        <div class="text-input2f nopadding">สำเนาหลักฐานที่แสดงถึงวัตถุประสงค์การก่อตั้งองค์กร</div>
                        <div class="row">
                            <div class="col-md-6 col-sm-8 nopaddingright">
                                <div class="input2f">
                                  <input id="uploadFile01" class="form-control" placeholder="">
                                </div><!--end input2f-->
                            </div>
                            <div class="col-md-6 col-sm-4">
                                <div class="btn-2button">
                                    <div class="fileUpload btn btn-blue">
                                         <span>Upload</span>
                                         <input id="uploadBtn01" type="file" class="upload">
                                     </div>
                                     <button type="button" name="button" class="btn btn-purple">ตัวอย่าง</button>
                                </div><!--end btn-2button-->
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="text-input2f nopadding">สำเนาหลักฐานซึ่งแสดงถึงการดำเนินกิจกรรมในกลุ่มองค์กรที่ขอขึ้นทะเบียนในพื้นที่จังหวัด มาแล้วไม่น้อยกว่า ๓ ปี นับถึงวันที่สมัคร
                          จำนวน ๒ กิจกรรมขึ้นไป เช่น โครงการ รายงานการดำเนินโครงการ รูปถ่ายกิจกรรม โดยระบุสถานที่จัดกิจกรรม เป็นต้น</div>
                        <div class="row">
                            <div class="col-md-6 col-sm-8 nopaddingright">
                                <div class="input2f">
                                  <input id="uploadFile02" class="form-control" placeholder="">
                                </div><!--end input2f-->
                            </div>
                            <div class="col-md-6 col-sm-4">
                                <div class="btn-2button">
                                    <div class="fileUpload btn btn-blue">
                                         <span>Upload</span>
                                         <input id="uploadBtn02" type="file" class="upload">
                                     </div>
                                     <button type="button" name="button" class="btn btn-purple">ตัวอย่าง</button>
                                </div><!--end btn-2button-->
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="text-input2f nopadding">สำเนาหนังสือที่แสดงว่าผู้ลงลายมือชื่อในแบบขอขึ้นทะเบียนองค์กรภาคเอกชนฯเป็นประธาน องค์กร หรือรายงานประชุมที่มีชื่อประธานองค์กร</div>
                        <div class="row">
                            <div class="col-md-6 col-sm-8 nopaddingright">
                                <div class="input2f">
                                  <input id="uploadFile03" class="form-control" placeholder="">
                                </div><!--end input2f-->
                            </div>
                            <div class="col-md-6 col-sm-4">
                                <div class="btn-2button">
                                    <div class="fileUpload btn btn-blue">
                                         <span>Upload</span>
                                         <input id="uploadBtn03" type="file" class="upload">
                                     </div>
                                     <button type="button" name="button" class="btn btn-purple">ตัวอย่าง</button>
                                </div><!--end btn-2button-->
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="text-input2f nopadding">สำเนาบัตรประจำตัวประชาชนของประธานองค์กร</div>
                        <div class="row">
                            <div class="col-md-6 col-sm-8 nopaddingright">
                                <div class="input2f">
                                  <input id="uploadFile04" class="form-control" placeholder="">
                                </div><!--end input2f-->
                            </div>
                            <div class="col-md-6 col-sm-4">
                                <div class="btn-2button">
                                    <div class="fileUpload btn btn-blue">
                                         <span>Upload</span>
                                         <input id="uploadBtn04" type="file" class="upload">
                                     </div>
                                     <button type="button" name="button" class="btn btn-purple">ตัวอย่าง</button>
                                </div><!--end btn-2button-->
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="text-input2f nopadding">หนังสือรับรองความมีอยู่และการดำเนินกิจกรรมขององค์กรภาคเอกชนที่ไม่เป็นนิติบุคคล</div>
                        <div class="row">
                            <div class="col-md-6 col-sm-8 nopaddingright">
                                <div class="input2f">
                                  <input id="uploadFile05" class="form-control" placeholder="">
                                </div><!--end input2f-->
                            </div>
                            <div class="col-md-6 col-sm-4">
                                <div class="btn-2button">
                                    <div class="fileUpload btn btn-blue">
                                         <span>Upload</span>
                                         <input id="uploadBtn05" type="file" class="upload">
                                     </div>
                                     <button type="button" name="button" class="btn btn-purple">ตัวอย่าง</button>
                                </div><!--end btn-2button-->
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                  </div><!--end set-form2f-->
                  <div class="btn-center2f">
                      <button type="button" name="button" class="btn btn-border"><img src="images/left-arrow-gray.svg" alt="">ย้อนกลับ</button>
                      <button type="button" name="button" class="btn btn-green">ตรวจทานเอกสาร</button>
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
