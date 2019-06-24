@extends('frontend.theme.master')

@section('content')

    <div class="insitepage2f">
        <div class="navication2f">
            <div class="container">
              <ol class="breadcrumb">
                  <li><a href="">หน้าหลัก</a></li>
                  <li><a href="">สมัคร</a></li>
                  <li><a href="">ผู้แทนองค์กรภาคเอกชน</a></li>
                  <li><a href="">ขอขึ้นทะเบียนองค์กรภาคเอกชน</a></li>
                  <li class="active">Preview ผู้แทนองค์กรภาคเอกชน ขอขึ้นทะเบียนองค์กรภาคเอกชน</li>
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

              <div class="content-form2f">
                  <h4>Preview ผู้แทนองค์กรภาคเอกชน ขอขึ้นทะเบียนองค์กรภาคเอกชน</h4>
                  <div class="set-form2f">
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f nopadding">วัน/เดือน/พ.ศ.</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input2f">
                                  <input type="text" class="form-control" name="" value="10/มกราคม/2548" placeholder="วัน/เดือน/พ.ศ." readonly>
                                </div>
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
                                  <input type="text" name="" value="นาย" class="form-control" placeholder="นาย/นาง/นางสาว" readonly>
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
                                  <input type="text" name="" value="สำราญโรจน์ สุทัศน์ชูโต๊ะ" class="form-control" placeholder="ชื่อ-นามสกุล" readonly>
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
                                  <input type="text" name="" value="กรุงเทพมหานคร" class="form-control" placeholder="จังหวัด" readonly>
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
                                  <input type="text" name="" value="บริษัท ทริส คอร์ปอเรชั่น จำกัด" class="form-control" placeholder="ชื่อองค์กร" readonly>
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
                                      <input type="radio" id="test1" name="test" >
                                      <label for="test1">ไม่เป็นนิติบุคคล</label>
                                    </div>
                                    <div class="box-radio2f">
                                      <input type="radio" id="test2" name="test" checked>
                                      <label for="test2">เป็นนิติบุคคล</label>
                                    </div>
                                </div><!--end input-radio2f-->
                                <div class="input2f">
                                  <input type="text" name="" value="บริษัทจดทะเบียน" class="form-control" placeholder="สถานภาพขององค์กร" readonly>
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
                                  <textarea name="name" rows="4" cols="40" class="form-control" placeholder="ที่ตั้งองค์กร" readonly>
                                    เลขที่ 191 อาคารสีลมคอมเพล็กซ์ ชั้น 18 ห้อง 1-4, 4A
                                    ถนนสีลม แขวงสีลม เขตบางรัก
                                    กรุงเทพฯ 10500
                                  </textarea>
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
                                <div class="input2f">
                                  <input type="text" class="form-control" name="" value="27/กรกฎาคม/2536" placeholder="ก่อตั้งองค์กรวันที่" readonly>
                                </div><!--end input2f-->
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
                                  <input type="text" name="" value="300" class="form-control" placeholder="จำนวนสมาชิก" readonly>
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
                                    <textarea name="name" rows="5" cols="40" class="form-control"
                                    placeholder="วัตถุประสงค์ขององค์กรที่สอดคล้องกับกลุ่มกิจกรรมที่ขอขึ้นทะเบียน" readonly>
                                      บริการให้คำปรึกษาแนะนำแนวทางในการออกแบบระบบการประเมินผลความสำเร็จในการดำเนินงานตามแผนยุทธศาสตร์ตั้งแต่ระดับองค์กร
                                      ระดับหน่วยงาน ระดับบุคคลหรือในระดับโครงการรวมทั้งการประเมินผลความสำเร็จตามภารกิจในการจัดตั้งองค์การของหน่วยงานภาครัฐ
                                       เพื่อให้การถ่ายทอดวิสัยทัศน์และยุทธศาสตร์ลงไปสู่การปฏิบัติได้จริง
                                    </textarea>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                  </div><!--end set-form2f-->
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
                                    <input type="text" name="" value="โครงการทำนาข้าวปลอดสารพิษตามหลักปรัชญาเศรษฐกิจพอเพียง" class="form-control" placeholder="ชื่อกิจกรรม" readonly>
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
                                    <textarea name="name" rows="5" cols="40" class="form-control" placeholder="สรุปผลงานที่สำคัญ" readonly>
                                      - ห้องคอมพิวเตอร์เพื่อการเรียนรู้
                                      - เงินสนับสนุน โครงการเกษตรอินทรีย์
                                      - เงินสนับสนุน โครงการโรงเพาะเห็ด
                                      - เงินสนับสนุนทุนการศึกษานักเรียน
                                      - เงินสนับสนุนทุนพัฒนาครู
                                    </textarea>
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
                                    <input type="text" name="" value=" โครงการส่งเสริมพัฒนาปรับปรุงห้องสมุดให้มีชีวิต" class="form-control" placeholder="ชื่อกิจกรรม" readonly>
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
                                    <textarea name="name" rows="4" cols="40" class="form-control" placeholder="สรุปผลงานที่สำคัญ">
                                      - ห้องคอมพิวเตอร์เพื่อการเรียนรู้
                                      - เงินสนับสนุนทุนการศึกษานักเรียน
                                      - เงินสนับสนุนทุนพัฒนาครู
                                    </textarea>
                                  </div>
                              </div>
                          </div><!--end row-->
                      </div><!--end box-input2f-->
                  </div><!--end set-form2f-->
                  <div class="headform2f">ข้อมูลเสนอชื่อผู้แทนองค์กรภาคเอกชน</div>
                  <div class="set-form2f">
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f nopadding">ด้วยองค์กร</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input2f">
                                  <input type="text" name="" value="บริษัท ทริส คอร์ปอเรชั่น จำกัด" class="form-control" placeholder="ด้วยองค์กร" readonly>
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
                                  <input type="text" name="" value="นาย" class="form-control" placeholder="คำนำหน้า" readonly>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-5">
                                <div class="input2f">
                                  <input type="text" name="" value="สำราญโรจน์ สุทัศน์ชูโต๊ะ" class="form-control" placeholder="ชื่อ - นามสกุล" readonly>
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
                                  <input type="text" name="" value="ผู้บริหาร" class="form-control" placeholder="ตำแหน่งสมาชิกในองค์กร" readonly>
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
                        <div class="text-input2f nopadding">สำเนาหลักฐานที่แสดงความเป็นนิติบุคคล</div>
                        <div class="row">
                            <div class="col-md-6 col-sm-8 nopaddingright">
                                <div class="input2f">
                                  <input id="" class="form-control" placeholder="" value="สำเนาหลักฐานที่แสดงความเป็นนิติบุคคล.pdf" readonly>
                                </div><!--end input2f-->
                            </div>
                            <div class="col-md-6 col-sm-4">
                                <div class="btn-2button">
                                    <div class="fileUpload btn btn-blue">
                                         <span>Upload</span>
                                         <input id="" type="file" class="upload">
                                     </div>
                                     <button type="button" name="button" class="btn btn-purple">ตัวอย่าง</button>
                                </div><!--end btn-2button-->
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="text-input2f nopadding">สำเนาหลักฐานที่แสดงถึงวัตถุประสงค์การก่อตั้งองค์กร</div>
                        <div class="row">
                            <div class="col-md-6 col-sm-8 nopaddingright">
                                <div class="input2f">
                                  <input id="" class="form-control" placeholder="" value="สำเนาหลักฐานที่แสดงถึงวัตถุประสงค์การก่อตั้งองค์กร.pdf">
                                </div><!--end input2f-->
                            </div>
                            <div class="col-md-6 col-sm-4">
                                <div class="btn-2button">
                                    <div class="fileUpload btn btn-blue">
                                         <span>Upload</span>
                                         <input id="" type="file" class="upload">
                                     </div>
                                     <button type="button" name="button" class="btn btn-purple">ตัวอย่าง</button>
                                </div><!--end btn-2button-->
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="text-input2f nopadding">สำเนาหลักฐานซึ่งแสดงถึงการดำเนินกิจกรรมในกลุ่มองค์กรที่ขอขึ้นทะเบียนในพื้นที่จังหวัดมาแล้วไม่น้อยกว่า ๓ ปี
                          นับถึงวันที่สมัคร จำนวน ๒ กิจกรรมขึ้นไป เช่น โครงการ รายงานการดำเนินโครงการ รูปถ่ายกิจกรรมโดยระบุสถานที่จัดกิจกรรม เป็นต้น</div>
                        <div class="row">
                            <div class="col-md-6 col-sm-8 nopaddingright">
                                <div class="input2f">
                                  <input id="" class="form-control" placeholder="" value="สำเนาหลักฐานซึ่งแสดงถึงการดำเนินกิจกรรมในกลุ่มองค์กร.pdf" readonly>
                                </div><!--end input2f-->
                            </div>
                            <div class="col-md-6 col-sm-4">
                                <div class="btn-2button">
                                    <div class="fileUpload btn btn-blue">
                                         <span>Upload</span>
                                         <input id="" type="file" class="upload">
                                     </div>
                                     <button type="button" name="button" class="btn btn-purple">ตัวอย่าง</button>
                                </div><!--end btn-2button-->
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="text-input2f nopadding">สำเนาคำสั่งแต่งตั้งประธานองค์กรหรือรายงานการประชุมที่มีชื่อประธานองค์กร</div>
                        <div class="row">
                            <div class="col-md-6 col-sm-8 nopaddingright">
                                <div class="input2f">
                                  <input id="uploadFile03" class="form-control" placeholder="" value="สำเนาคำสั่งแต่งตั้งประธานองค์กรหรือรายงานการประชุม.pdf" readonly>
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
                                  <input id="" class="form-control" placeholder="" value="สำเนาบัตรประจำตัวประชาชนของประธานองค์กร.jpg" readonly>
                                </div><!--end input2f-->
                            </div>
                            <div class="col-md-6 col-sm-4">
                                <div class="btn-2button">
                                    <div class="fileUpload btn btn-blue">
                                         <span>Upload</span>
                                         <input id="" type="file" class="upload">
                                     </div>
                                     <button type="button" name="button" class="btn btn-purple">ตัวอย่าง</button>
                                </div><!--end btn-2button-->
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->

                  </div><!--end set-form2f-->
                  <div class="set-form2f">
                    <p class="green2f"><span class="underline2f">สำหรับกรณีที่องค์กรภาคเอกชนไม่เป็นนิติบุคคล</span> ประกอบด้วย</p>
                    <div class="box-input2f">
                        <div class="text-input2f nopadding">สำเนาหลักฐานที่แสดงถึงวัตถุประสงค์การก่อตั้งองค์กร</div>
                        <div class="row">
                            <div class="col-md-6 col-sm-8 nopaddingright">
                                <div class="input2f">
                                  <input id="" class="form-control" placeholder="" value="สำเนาหลักฐานที่แสดงความเป็นนิติบุคคล.pdf" readonly>
                                </div><!--end input2f-->
                            </div>
                            <div class="col-md-6 col-sm-4">
                                <div class="btn-2button">
                                    <div class="fileUpload btn btn-blue">
                                         <span>Upload</span>
                                         <input id="" type="file" class="upload">
                                     </div>
                                     <button type="button" name="button" class="btn btn-purple">ตัวอย่าง</button>
                                </div><!--end btn-2button-->
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="text-input2f nopadding">สำเนาหลักฐานที่แสดงถึงวัตถุประสงค์การก่อตั้งองค์กร</div>
                        <div class="row">
                            <div class="col-md-6 col-sm-8 nopaddingright">
                                <div class="input2f">
                                  <input id="uploadFile01" class="form-control" placeholder="" value="สำเนาหลักฐานที่แสดงถึงวัตถุประสงค์การก่อตั้งองค์กร.pdf">
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
                                  <input id="" class="form-control" placeholder="" value="สำเนาหลักฐานซึ่งแสดงถึงการดำเนินกิจกรรมในกลุ่มองค์กร.pdf">
                                </div><!--end input2f-->
                            </div>
                            <div class="col-md-6 col-sm-4">
                                <div class="btn-2button">
                                    <div class="fileUpload btn btn-blue">
                                         <span>Upload</span>
                                         <input id="" type="file" class="upload">
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
                                  <input id="" class="form-control" placeholder="" value="สำเนาหลักฐานที่แสดงถึงวัตถุประสงค์การก่อตั้งองค์กร.pdf" readonly>
                                </div><!--end input2f-->
                            </div>
                            <div class="col-md-6 col-sm-4">
                                <div class="btn-2button">
                                    <div class="fileUpload btn btn-blue">
                                         <span>Upload</span>
                                         <input id="" type="file" class="upload">
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
                                  <input id="" class="form-control" placeholder="" value="สำเนาคำสั่งแต่งตั้งประธานองค์กรหรือรายงานการประชุม.pdf" readonly>
                                </div><!--end input2f-->
                            </div>
                            <div class="col-md-6 col-sm-4">
                                <div class="btn-2button">
                                    <div class="fileUpload btn btn-blue">
                                         <span>Upload</span>
                                         <input id="" type="file" class="upload">
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
                                  <input id="" class="form-control" placeholder="" value="สำเนาบัตรประจำตัวประชาชนของประธานองค์กร.pdf" readonly>
                                </div><!--end input2f-->
                            </div>
                            <div class="col-md-6 col-sm-4">
                                <div class="btn-2button">
                                    <div class="fileUpload btn btn-blue">
                                         <span>Upload</span>
                                         <input id="" type="file" class="upload">
                                     </div>
                                     <button type="button" name="button" class="btn btn-purple">ตัวอย่าง</button>
                                </div><!--end btn-2button-->
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                  </div><!--end set-form2f-->
                  <div class="box-confirm2f">
                    <div class="box-checkbox2f">
                      <label class="checkbox2f">ข้าพเจ้าขอรับรองว่าข้อมูลที่กรอกข้างต้น  และเอกสารที่แนบมาพร้อมใบสมัครเป็นความจริงทุกประการ
                        หากมีข้อมูลใดเป็นเท็จหรือไม่ตรงกับความเป็นจริง  <br>ข้าพเจ้ายินยอมให้ถูกตัดสิทธิ์จากการเป็นผู้สมัครหรือผู้ถูกเสนอชื่อในครั้งนี้
                        <input type="checkbox" checked="checked">
                        <span class="checkmark"></span>
                      </label>
                    </div>
                  </div><!--end box-confirm2f-->

                <div class="box-captcha2f">
                    <img src="images/img-captcha.png" alt="">
                </div>
                  <div class="btn-center2f">
                      <button type="button" name="button" class="btn btn-border">ปิด</button>
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
