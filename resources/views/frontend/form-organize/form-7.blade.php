@extends('frontend.theme.master')

@section('content')

    <div class="insitepage2f">
        <div class="navication2f">
            <div class="container">
              <ol class="breadcrumb">
                  <li><a href="">หน้าหลัก</a></li>
                  <li><a href="">สมัคร</a></li>
                  <li><a href="">ผู้แทนองค์กรปกครองส่วนท้องถิ่น</a></li>
                  <li class="active">Preview สมัครผู้แทนองค์กรปกครองส่วนท้องถิ่น</li>
              </ol>
            </div>
        </div><!--end navication2f-->
        <div class="insite-banner2f">
            <div class="control-bannertext2f">
                <div class="container">
                  <div class="headline2f">
                    <h1>ผู้แทนองค์กรปกครองส่วนท้องถิ่น</h1>
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
                  <h4>Preview สมัครผู้แทนองค์กรปกครองส่วนท้องถิ่น</h4>
                  <div class="set-form2f">
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f nopadding">วัน/เดือน/พ.ศ.</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input2f">
                                  <input type="text" class="form-control" name="" value="{{ Auth::user()->created_at->addYears('543')->format('d/m/Y') }}" placeholder="วัน/เดือน/พ.ศ." readonly>
                                </span>
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
                                  <input type="text" name="" value="{{ Auth::user()->nameTitle }}" class="form-control" placeholder="นาย/นาง/นางสาว" readonly>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f nopadding">ชื่อ</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input2f">
                                  <input type="text" name="" value="{{ Auth::user()->firstname }}" class="form-control" placeholder="ชื่อ-นามสกุล" readonly>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="row">
                           <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f nopadding">นามสกุล</div>
                           </div>
                           <div class="col-md-6 col-sm-8">
                                <div class="input2f">
                                  <input type="text" name="" value="{{ Auth::user()->lastname }}" class="form-control" placeholder="ชื่อ-นามสกุล" readonly>
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
                            {!! Form::checkbox('thaiStatus', 1, @Auth::user()->detail->thaiStatus, ["class"=>"checkmark"]) !!}
                            <span class="checkmark"></span>
                          </label>
                        </div><!--end box-checkbox2f-->
                        <div class="box-checkbox2f">
                          <label class="checkbox2f">๒) มีอายุไม่ต่ำกว่ายี่สิบปีบริบูรณ์ ณ วันที่สมัคร
                            {!! Form::checkbox('ageQualify', 1, @Auth::user()->detail->ageQualify, ["class"=>"checkmark"]) !!}
                            <span class="checkmark"></span>
                          </label>
                        </div><!--end box-checkbox2f-->
                        <div class="box-checkbox2f">
                          <label class="checkbox2f">๓) ไม่เป็นคนไร้ความสามารถหรือคนเสมือนไร้ความสามารถ
                            {!! Form::checkbox('enoughAbility', 1, @Auth::user()->detail->enoughAbility, ["class"=>"checkmark"]) !!}
                            <span class="checkmark"></span>
                          </label>
                        </div><!--end box-checkbox2f-->
                        <div class="box-checkbox2f">
                          <label class="checkbox2f">๔) ไม่ติดยาเสพติดให้โทษ
                            {!! Form::checkbox('noDrug', 1, @Auth::user()->detail->noDrug, ["class"=>"checkmark"]) !!}
                            <span class="checkmark"></span>
                          </label>
                        </div><!--end box-checkbox2f-->
                        <div class="box-checkbox2f">
                          <label class="checkbox2f">๕) ไม่เคยถูกลงโทษไล่ออก ปลดออก เลิกจ้าง หรือพ้นจากตำแหน่ง เพราะเหตุจากการทุจริตหรือประพฤติมิชอบ
                            {!! Form::checkbox('noCriminal', 1, @Auth::user()->detail->noCriminal, ["class"=>"checkmark"]) !!}
                            <span class="checkmark"></span>
                          </label>
                        </div><!--end box-checkbox2f-->
                        <div class="box-checkbox2f">
                          <label class="checkbox2f">๖) ไม่เคยได้รับโทษจำคุกโดยคำพิพากษาถึงที่สุดให้จำคุก ไม่ว่าจะถูกจำคุกจริงหรือไม่ก็ตาม
                            เว้นแต่เป็นโทษสำหรับความผิดที่ได้กระทำโดยประมาทหรือ ความผิดลหุโทษ
                              {!! Form::checkbox('noJail', 1, @Auth::user()->detail->noJail, ["class"=>"checkmark"]) !!}
                            <span class="checkmark"></span>
                          </label>
                        </div><!--end box-checkbox2f-->
                    </div><!--end input-checkbox2f-->

                  </div><!--end set-form2f-->
                  <div class="headform2f">การแสดงเจตนาสมัครเข้ากลุ่ม</div>
                  <div class="set-form2f">
                    <h5>ข้าพเจ้ามีความประสงค์ที่จะสมัครเป็นกรรมการสุขภาพแห่งชาติจากผู้แทนองค์กรปกครองส่วนท้องถิ่นในกลุ่ม</h5>
                    <div class="input-radio2f">
                          @foreach(DB::table('organization_groups')->get() as $key => $organize)
                         <div class="box-radio2f">
                           {!! Form::radio('organizationGroupId', $organize->id, Auth::user()->organizationGroupId == $organize->id, ['id' => 'group'.$key]) !!}
                           <label for="group{{$key}}">{{ $organize->groupName  }}</label>
                         </div>
                         @endforeach
                    </div>
                  </div><!--end set-form2f-->
                  <div class="headform2f">ข้อมูลประวัติ</div>
                  <div class="set-form2f">
                    <h5>๑.  ข้อมูลทั่วไป</h5>
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f">
                                  <span>๑)</span>
                                   คำนำหน้า
                                </div><!--end text-input2f-->
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input2f">
                                  <input type="text" name="" value="{{ Auth::user()->nameTitle }}" class="form-control" placeholder="นาย/นาง/นางสาว" readonly>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f">ชื่อ</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input2f">
                                  <input type="text" name="" value="{{ Auth::user()->firstname }}" class="form-control" placeholder="ชื่อ" readonly>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f">นามสกุล</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input2f">
                                  <input type="text" name="" value="{{ Auth::user()->lastname }}" class="form-control" placeholder="นามสกุล" readonly>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f">
                                  <span>๒)</span>เกิดวันที่
                                </div><!--end text-input2f-->
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input2f">
                                  <input type="text" class="form-control" value="{{ Carbon\Carbon::createFromFormat("Y-m-d",Auth::user()->detail->dateOfBirth)->addYears('543')->format('d/m/Y') }}"  placeholder="วัน/เดือน/พ.ศ." readonly>
                                </div><!--end input2f-->
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f">อายุ</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input2f">
                                  <input type="text" name="" value="{{ now()->format('Y') - Carbon\Carbon::createFromFormat('Y-m-d', Auth::user()->detail->dateOfBirth)->format('Y') }}" class="form-control" placeholder="อายุ" readonly>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="text-input2f">
                          <span>๓)</span>สถานที่ ที่สามารถติดต่อได้สะดวก
                        </div><!--end text-input2f-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright"></div>
                            <div class="col-md-6 col-sm-8">
                                  <div class="input-radio2f inline-check">
                                      <div class="box-radio2f">
                                        <input type="radio" id="home" name="radio-group" checked>
                                        <label for="home">บ้าน</label>
                                      </div>
                                      <div class="box-radio2f">
                                        <input type="radio" id="office" name="radio-group">
                                        <label for="office">ที่ทำงาน</label>
                                      </div>
                                      <div class="input2f width65per">
                                        <input type="text" name="" value="" class="form-control" placeholder="สถานที่ทำงาน">
                                      </div>
                                  </div><!--end input-radio2f-->
                              </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f">เลขที่</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input2f">
                                  <input type="text" name="" value="999/99" class="form-control" placeholder="เลขที่" readonly>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f">หมู่ที่</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input2f">
                                  <input type="text" name="" value="9" class="form-control" placeholder="หมู่ที่" readonly>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f">ตรอก/ซอย</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input2f">
                                  <input type="text" name="" value="นารีเจริญทรัพย์" class="form-control" placeholder="ตรอก/ซอย" readonly>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f">ถนน</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input2f">
                                  <input type="text" name="" value="กาญจนาภิเษก" class="form-control" placeholder="ถนน" readonly>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f">ตำบล/แขวง</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input2f">
                                  <input type="text" name="" value="บางแค" class="form-control" placeholder="ตำบล/แขวง" readonly>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f">อำเภอ/เขต</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input2f">
                                  <input type="text" name="" value="บางแค" class="form-control" placeholder="อำเภอ/เขต" readonly>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f">จังหวัด</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input2f">
                                  <input type="text" name="" value="กรุงเทพมหานคร" class="form-control" placeholder="จังหวัด" readonly>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f">รหัสไปรษณีย์</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input2f">
                                  <input type="text" name="" value="10160" class="form-control" placeholder="รหัสไปรษณีย์" readonly>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f">โทรศัพท์</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input2f">
                                  <input type="text" name="" value="02 999 8888" class="form-control" placeholder="โทรศัพท์" readonly>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f">โทรศัพท์เคลื่อนที่ (มือถือ)</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input2f">
                                  <input type="text" name="" value="089 999 9999" class="form-control" placeholder="โทรศัพท์เคลื่อนที่(มือถือ)" readonly>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <h5>๒.  ประวัติการศึกษา (เรียงจากวุฒิการศึกษาสูงสุดลงไปตามลำดับ)</h5>
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 col-xs-1 nopaddingright">
                                <div class="text-input2f"><span>๑)</span></div>
                            </div>
                            <div class="col-md-6 col-sm-8 col-xs-11">
                                <div class="input2f">
                                  <input type="text" name="" value="ปริญญาเอก" class="form-control" placeholder="วุฒิการศึกษา" readonly>
                                </div>
                            </div>
                            <div class="col-md-1 col-sm-4 col-xs-1 nopadding text-major">
                              <div class="text-input2f nopadding">สาขา</div>
                            </div>
                            <div class="col-md-3 col-sm-8 col-xs-11">
                                <div class="input2f">
                                  <input type="text" name="" value="บริหารธุรกิจ" class="form-control" placeholder="สาขา" readonly>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                      <div class="row">
                          <div class="col-md-2 col-sm-4 col-xs-1 nopaddingright">
                              <div class="text-input2f"><span>๒)</span></div>
                          </div>
                          <div class="col-md-6 col-sm-8 col-xs-11">
                              <div class="input2f">
                                <input type="text" name="" value="ปริญญาโท" class="form-control" placeholder="วุฒิการศึกษา" readonly>
                              </div>
                          </div>
                          <div class="col-md-1 col-sm-4 col-xs-1 nopadding text-major">
                            <div class="text-input2f nopadding">สาขา</div>
                          </div>
                          <div class="col-md-3 col-sm-8 col-xs-11">
                              <div class="input2f">
                                <input type="text" name="" value="จิตวิทยา" class="form-control" placeholder="สาขา" readonly>
                              </div>
                          </div>
                      </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                      <div class="row">
                          <div class="col-md-2 col-sm-4 col-xs-1 nopaddingright">
                              <div class="text-input2f"><span>๓)</span></div>
                          </div>
                          <div class="col-md-6 col-sm-8 col-xs-11">
                              <div class="input2f">
                                <input type="text" name="" value="ปริญญาตรี" class="form-control" placeholder="วุฒิการศึกษา" readonly>
                              </div>
                          </div>
                          <div class="col-md-1 col-sm-4 col-xs-1 nopadding text-major">
                            <div class="text-input2f nopadding">สาขา</div>
                          </div>
                          <div class="col-md-3 col-sm-8 col-xs-11">
                              <div class="input2f">
                                <input type="text" name="" value="การจัดการ" class="form-control" placeholder="สาขา" readonly>
                              </div>
                          </div>
                      </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                      <div class="row">
                          <div class="col-md-2 col-sm-4 col-xs-1 nopaddingright">
                              <div class="text-input2f"><span>๔)</span></div>
                          </div>
                          <div class="col-md-6 col-sm-8 col-xs-11">
                              <div class="input2f">
                                <input type="text" name="" value="มัธยมศึกษา" class="form-control" placeholder="วุฒิการศึกษา" readonly>
                              </div>
                          </div>
                          <div class="col-md-1 col-sm-4 col-xs-1 nopadding text-major">
                            <div class="text-input2f nopadding">สาขา</div>
                          </div>
                          <div class="col-md-3 col-sm-8 col-xs-11">
                              <div class="input2f">
                                <input type="text" name="" value="วิชาการศึกษาวิทยาศาสตร์" class="form-control" placeholder="สาขา" readonly>
                              </div>
                          </div>
                      </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                      <div class="row">
                          <div class="col-md-2 col-sm-4 col-xs-1 nopaddingright">
                              <div class="text-input2f"><span>๕)</span></div>
                          </div>
                          <div class="col-md-6 col-sm-8 col-xs-11">
                              <div class="input2f">
                                <input type="text" name="" value="ประถมศึกษา" class="form-control" placeholder="วุฒิการศึกษา" readonly>
                              </div>
                          </div>
                          <div class="col-md-1 col-sm-4 col-xs-1 nopadding text-major">
                            <div class="text-input2f nopadding">สาขา</div>
                          </div>
                          <div class="col-md-3 col-sm-8 col-xs-11">
                              <div class="input2f">
                                <input type="text" name="" value="วิทยาศาสตร์" class="form-control" placeholder="สาขา" readonly>
                              </div>
                          </div>
                      </div><!--end row-->
                    </div><!--end box-input2f-->
                    <h5>๓. ผลงาน หรือประสบการณ์ที่ดำเนินงานเกี่ยวกับด้านสุขภาพ</h5>
                    <div class="box-input2f">
                      <div class="input2f">
                          <textarea name="name" rows="5" cols="50" class="form-control" placeholder="ผลงาน หรือประสบการณ์ที่ดำเนินงานเกี่ยวกับด้านสุขภาพ" readonly>
                            ผู้ตรวจสอบบัญชีต้องรับมอบหมายงานจาก Manager ทำความเข้าใจธุรกิจของลูกค้า วางแผนการตรวจงาน ดูขั้นตอนการทำงานของลูกค้าว่ามีปัญหาและแก้ไขอย่างไร
                            นำข้อมูลที่ได้มาประกอบกับการทำงาน เพื่อ Set ค่า pmte คือค่ามูลค่าความผิดผลาดที่ยอมรับ ผู้ตรวจสอบบัญชีหรือ C.P.A
                            ตรวจความถูกต้องของงานก่อนที่จะเซ็นท์รับรองการผ่านการประเมินอย่างที่บอกว่าการตรวจสอบบัญชีอาจไม่ต้องถูกต้อง 100%
                          </textarea>
                      </div>
                    </div><!--end box-input2f-->
                    <h5>๔. ผลงาน หรือประสบการณ์ที่ดำเนินงานเกี่ยวกับด้านสุขภาพ</h5>

                    <div class="text-titlenumber"><span>ลำดับที่ ๑</span></div>
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f title-sm">ตำแหน่ง</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input2f">
                                  <input type="text" name="" value="ผู้ช่วยเลขานุการบริษัท" class="form-control" placeholder="ตำแหน่ง" readonly>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f title-sm">หน่วยงาน</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input2f">
                                  <input type="text" name="" value="บริษัทโพสต์ พับลิชชิง จำกัด (มหาชน)" class="form-control" placeholder="หน่วยงาน" readonly>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f title-sm">ระยะเวลาการปฏิบัติหน้าที่</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input2f">
                                  <input type="text" name="" value="พ.ศ. 2552 - พ.ศ. 2562" class="form-control" placeholder="ระยะเวลาการปฏิบัติหน้าที่" readonly>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="text-titlenumber"><span>ลำดับที่ ๒</span></div>
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f title-sm">ตำแหน่ง</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input2f">
                                  <input type="text" name="" value="เลขานุการ ประธานเจ้าหน้าที่ฝ่ายการเงิน และเลขานุการบริษัท" class="form-control" placeholder="ตำแหน่ง" readonly>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f title-sm">หน่วยงาน</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input2f">
                                  <input type="text" name="" value="บริษัทโพสต์ พับลิชชิง จำกัด (มหาชน)" class="form-control" placeholder="หน่วยงาน" readonly>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f title-sm">ระยะเวลาการปฏิบัติหน้าที่</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input2f">
                                  <input type="text" name="" value="พ.ศ. 2549 - พ.ศ. 2552" class="form-control" placeholder="ระยะเวลาการปฏิบัติหน้าที่" readonly>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="text-titlenumber"><span>ลำดับที่ ๓</span></div>
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f title-sm">ตำแหน่ง</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input2f">
                                  <input type="text" name="" value="เลขานุการกรรมการผู้จัดการ" class="form-control" placeholder="ตำแหน่ง" readonly>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f title-sm">หน่วยงาน</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input2f">
                                  <input type="text" name="" value="บริษัทหลักทรัพย์จัดการกองทุน ฟินันซ่า จำกัด" class="form-control" placeholder="หน่วยงาน" readonly>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f title-sm">ระยะเวลาการปฏิบัติหน้าที่</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input2f">
                                  <input type="text" name="" value="พ.ศ. 2547 - พ.ศ. 2548" class="form-control" placeholder="ระยะเวลาการปฏิบัติหน้าที่" readonly>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="headlineform2f">
                      <h5>๕. วาระการดำรงตำแหน่งในองค์กรปกครองส่วนท้องถิ่น (ปัจจุบัน)</h5>
                      <div class="input2f width200 input-center">
                        <input type="text" name="" value="4" class="form-control" placeholder="ปี" readonly>
                      </div>
                      <div class="text-unit">ปี</div>
                    </div>
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f">
                                  <span>๑)</span>เริ่มตั้งแต่
                                </div><!--end text-input2f-->
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input2f">
                                  <input type="text" class="form-control" name="" value="01/มิถุนายน/2558" placeholder="วัน/เดือน/พ.ศ." readonly>
                                </div><!--end input2f-->
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f">
                                  <span>๒)</span>หมดวาระ
                                </div><!--end text-input2f-->
                            </div>
                            <div class="col-md-6 col-sm-8">
                              <div class="input2f">
                                <input type="text" class="form-control" name="" value="01/มิถุนายน/2558" placeholder="วัน/เดือน/พ.ศ." readonly>
                              </div><!--end input2f-->
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                  </div><!--end set-form2f-->
                  <div class="headform2f">วิสัยทัศน์ของข้าพเจ้าต่อการพัฒนาระบบสุขภาพแห่งชาติ</div>
                  <div class="set-form2f">
                    <div class="box-input2f">
                        <textarea name="name" rows="5" cols="50" class="form-control" placeholder="วิสัยทัศน์ของข้าพเจ้าต่อการพัฒนาระบบสุขภาพแห่งชาติ" readonly>
                          ๑) เพื่อสร้างความเข้มแข็งของ บุคคล ชุมชน ประชาชน องค์กร ปกครองส่วนท้องถิ่น ภาคีเครือข่าย ภาคประชาชนและภาคประชา สังคมด้านสุขภาพ ให้มีศักยภาพ มี ความรู้และทัศนคติที่ถูกต้องด้าน พฤติกรรมสุขภาพ มีการเรียนรู้ มี พฤติกรรมเสี่ยงทางสุขภาพลดลง สามารถช่วยเหลือ ดูแลตนเองและ ชุมชน ตลอดจนมีส่วนร่วมในการ สร้างและจัดการระบบสุขภาพ
๒) เพื่อสร้างระบบสุขภาพเชิงรุก ที่ มุ่งสร้างเสริมให้คนไทยทุกช่วงวัยมี สุขภาพดี มีระบบการปูองกัน ควบคุมโรคและปัจจัยเสี่ยงด้าน สุขภาพ มีการคุ้มครองผู้บริโภค ด้านสุขภาพที่ดี มีสภาพแวดล้อมที่ เอื้อต่อการมีสุขภาพดี
3) เพื่อพัฒนาระบบการดูแล ผู้สูงอายุระยะยาวที่เกิดจากความ ร่วมมือของครอบครัว ชุมชน
                        </textarea>
                    </div><!--end box-input2f-->
                    <div class="box-confirm2f">
                      <div class="box-checkbox2f">
                        <label class="checkbox2f">ข้าพเจ้าขอรับรองว่าข้อมูลที่กรอกข้างต้น  และเอกสารที่แนบมาพร้อมใบสมัครเป็นความจริงทุกประการ  หากมีข้อมูลใดเป็นเท็จหรือไม่ตรงกับความเป็นจริง  ข้าพเจ้ายินยอมให้ถูกตัดสิทธิ์จากการเป็นผู้สมัครหรือผู้ถูกเสนอชื่อในครั้งนี้
                          <input type="checkbox" checked="checked">
                          <span class="checkmark"></span>
                        </label>
                      </div>
                    </div><!--end box-confirm2f-->

                  </div><!--end set-form2f-->
                  <div class="box-captcha2f">
                      <img src="images/img-captcha.png" alt="">
                  </div>
                  <div class="btn-center2f">
                      <button type="button" name="button" class="btn btn-border">ปิด</button>
                      <button type="button" name="button" class="btn btn-green">ยื่นเอกสาร</button>
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
