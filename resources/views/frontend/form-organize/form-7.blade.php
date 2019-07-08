@extends('frontend.theme.master')

@section('content')
{!! Form::open() !!}
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
                                 <div class="text-input2f nopadding"> {{ Auth::user()->created_at->addYears('543')->format('d/m/Y') }}</div>
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
                                    <div class="text-input2f nopadding"> {{ Auth::user()->nameTitle }}</div>
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
                                      <div class="text-input2f nopadding">{{ Auth::user()->firstname }}</div>
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
                                    <div class="text-input2f nopadding">{{ Auth::user()->lastname }}</div>
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
                            {!! Form::checkbox('thaiStatus', 1, @Auth::user()->detail->thaiStatus, ["class"=>"checkmark", 'disabled'=>'']) !!}
                            <span class="checkmark"></span>
                          </label>
                        </div><!--end box-checkbox2f-->
                        <div class="box-checkbox2f">
                          <label class="checkbox2f">๒) มีอายุไม่ต่ำกว่ายี่สิบปีบริบูรณ์ ณ วันที่สมัคร
                            {!! Form::checkbox('ageQualify', 1, @Auth::user()->detail->ageQualify, ["class"=>"checkmark", 'disabled'=>'']) !!}
                            <span class="checkmark"></span>
                          </label>
                        </div><!--end box-checkbox2f-->
                        <div class="box-checkbox2f">
                          <label class="checkbox2f">๓) ไม่เป็นคนไร้ความสามารถหรือคนเสมือนไร้ความสามารถ
                            {!! Form::checkbox('enoughAbility', 1, @Auth::user()->detail->enoughAbility, ["class"=>"checkmark", 'disabled'=>'']) !!}
                            <span class="checkmark"></span>
                          </label>
                        </div><!--end box-checkbox2f-->
                        <div class="box-checkbox2f">
                          <label class="checkbox2f">๔) ไม่ติดยาเสพติดให้โทษ
                            {!! Form::checkbox('noDrug', 1, @Auth::user()->detail->noDrug, ["class"=>"checkmark", 'disabled'=>'']) !!}
                            <span class="checkmark"></span>
                          </label>
                        </div><!--end box-checkbox2f-->
                        <div class="box-checkbox2f">
                          <label class="checkbox2f">๕) ไม่เคยถูกลงโทษไล่ออก ปลดออก เลิกจ้าง หรือพ้นจากตำแหน่ง เพราะเหตุจากการทุจริตหรือประพฤติมิชอบ
                            {!! Form::checkbox('noCriminal', 1, @Auth::user()->detail->noCriminal, ["class"=>"checkmark", 'disabled'=>'']) !!}
                            <span class="checkmark"></span>
                          </label>
                        </div><!--end box-checkbox2f-->
                        <div class="box-checkbox2f">
                          <label class="checkbox2f">๖) ไม่เคยได้รับโทษจำคุกโดยคำพิพากษาถึงที่สุดให้จำคุก ไม่ว่าจะถูกจำคุกจริงหรือไม่ก็ตาม
                            เว้นแต่เป็นโทษสำหรับความผิดที่ได้กระทำโดยประมาทหรือ ความผิดลหุโทษ
                              {!! Form::checkbox('noJail', 1, @Auth::user()->detail->noJail, ["class"=>"checkmark", 'disabled'=>'']) !!}
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
                           {!! Form::radio('organizationGroupId', $organize->id, Auth::user()->organizationGroupId == $organize->id, ['id' => 'group'.$key, 'disabled' => '']) !!}
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
                                      <div class="text-input2f nopadding">{{ Auth::user()->nameTitle }}</div>
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
                                         <div class="text-input2f nopadding">{{ Auth::user()->firstname }}</div>
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
                                      <div class="text-input2f nopadding">{{ Auth::user()->lastname }}</div>
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
                                    <div class="text-input2f nopadding">{{ Carbon\Carbon::createFromFormat("Y-m-d",Auth::user()->detail->dateOfBirth)->addYears('543')->format('d/m/Y') }}</div>
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
                                      <div class="text-input2f nopadding">{{ now()->format('Y') - Carbon\Carbon::createFromFormat('Y-m-d', Auth::user()->detail->dateOfBirth)->format('Y') }}</div>
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
                                            <div class="text-input2f nopadding">{{ Auth::user()->detail->workPlaceName }}</div>
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
                                       <div class="text-input2f nopadding">{{ Auth::user()->detail->no }}</div>

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
                                      <div class="text-input2f nopadding">{{ Auth::user()->detail->moo }}</div>
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
                                           <div class="text-input2f nopadding">{{ Auth::user()->detail->soi }}</div>
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
                                    <div class="text-input2f nopadding">{{ Auth::user()->detail->street }}</div>
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
                                    <div class="text-input2f nopadding">{{ Auth::user()->detail->subDistrictId }} : {{ Auth::user()->detail->subdistrict->district }}</div>
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
                                      <div class="text-input2f nopadding">{{ Auth::user()->detail->districtId }} : {{ Auth::user()->detail->district->amphoe }}</div>
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
                                      <div class="text-input2f nopadding">{{ Auth::user()->detail->provinceId }} : {{ Auth::user()->detail->province->province }}</div>
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
                                  <div class="text-input2f nopadding">{{ Auth::user()->detail->zipCode }}</div>
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
                                  <div class="text-input2f nopadding">{{ Auth::user()->detail->tel }}</div>
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
                                  <div class="text-input2f nopadding">{{ Auth::user()->detail->mobile }}</div>
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
                                    <div class="text-input2f nopadding">{{ Auth::user()->detail->graduated1 }}</div>
                                </div>
                            </div>
                            <div class="col-md-1 col-sm-4 col-xs-1 nopadding text-major">
                              <div class="text-input2f nopadding">สาขา</div>
                            </div>
                            <div class="col-md-3 col-sm-8 col-xs-11">
                                <div class="input2f">
                                    <div class="text-input2f nopadding">{{ Auth::user()->detail->faculty1 }}</div>
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
                                  <div class="text-input2f nopadding">{{ Auth::user()->detail->graduated2 }}</div>
                              </div>
                          </div>
                          <div class="col-md-1 col-sm-4 col-xs-1 nopadding text-major">
                            <div class="text-input2f nopadding">สาขา</div>
                          </div>
                          <div class="col-md-3 col-sm-8 col-xs-11">
                              <div class="input2f">
                                  <div class="text-input2f nopadding">{{ Auth::user()->detail->faculty2 }}</div>
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
                                  <div class="text-input2f nopadding">{{ Auth::user()->detail->graduated3 }}</div>
                              </div>
                          </div>
                          <div class="col-md-1 col-sm-4 col-xs-1 nopadding text-major">
                            <div class="text-input2f nopadding">สาขา</div>
                          </div>
                          <div class="col-md-3 col-sm-8 col-xs-11">
                              <div class="input2f">
                                    <div class="text-input2f nopadding">{{ Auth::user()->detail->faculty3 }}</div>
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
                                    <div class="text-input2f nopadding">{{ Auth::user()->detail->graduated4 }}</div>
                              </div>
                          </div>
                          <div class="col-md-1 col-sm-4 col-xs-1 nopadding text-major">
                            <div class="text-input2f nopadding">สาขา</div>
                          </div>
                          <div class="col-md-3 col-sm-8 col-xs-11">
                              <div class="input2f">
                                    <div class="text-input2f nopadding">{{ Auth::user()->detail->faculty4 }}</div>
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
                                    <div class="text-input2f nopadding">{{ Auth::user()->detail->graduated5 }}</div>
                              </div>
                          </div>
                          <div class="col-md-1 col-sm-4 col-xs-1 nopadding text-major">
                            <div class="text-input2f nopadding">สาขา</div>
                          </div>
                          <div class="col-md-3 col-sm-8 col-xs-11">
                              <div class="input2f">
                                    <div class="text-input2f nopadding">{{ Auth::user()->detail->faculty5 }}</div>
                              </div>
                          </div>
                      </div><!--end row-->
                    </div><!--end box-input2f-->
                    <h5>๓. ผลงาน หรือประสบการณ์ที่ดำเนินงานเกี่ยวกับด้านสุขภาพ</h5>
                    <div class="box-input2f">
                      <div class="input2f">
                        <div class="text-input2f nopadding">{{ Auth::user()->detail->portfolio }}</div>
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
                                  <div class="text-input2f nopadding">{{ Auth::user()->detail->pastWork1 }}</div>
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
                                  <div class="text-input2f nopadding">{{ Auth::user()->detail->pastOrganization1 }}</div>
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
                                  <div class="text-input2f nopadding">{{ Auth::user()->detail->time1 }}</div>
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
                                  <div class="text-input2f nopadding">{{ Auth::user()->detail->pastWork2 }}</div>
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
                                  <div class="text-input2f nopadding">{{ Auth::user()->detail->pastOrganization2 }}</div>
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
                                  <div class="text-input2f nopadding">{{ Auth::user()->detail->time2 }}</div>
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
                                  <div class="text-input2f nopadding">{{ Auth::user()->detail->pastWork3 }}</div>
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
                                  <div class="text-input2f nopadding">{{ Auth::user()->detail->pastOrganization3 }}</div>
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
                                  <div class="text-input2f nopadding">{{ Auth::user()->detail->time3 }}</div>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="headlineform2f">
                      <h5>๕. วาระการดำรงตำแหน่งในองค์กรปกครองส่วนท้องถิ่น (ปัจจุบัน)</h5>
                      <div class="input2f width200 input-center">
                        <div class="text-input2f nopadding">{{ Auth::user()->detail->roleTimeLeft }}</div>
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
                                    <div class="text-input2f nopadding">{{ Helper::dateToThai(Auth::user()->detail->startDate) }}</div>

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
                                    <div class="text-input2f nopadding">{{ Helper::dateToThai(Auth::user()->detail->endDate) }}</div>
                              </div><!--end input2f-->
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                  </div><!--end set-form2f-->
                  <div class="headform2f">วิสัยทัศน์ของข้าพเจ้าต่อการพัฒนาระบบสุขภาพแห่งชาติ</div>
                  <div class="set-form2f">
                    <div class="box-input2f">
                        {{ Auth::user()->detail->vision }}
                    </div><!--end box-input2f-->
                    <div class="box-confirm2f">
                      <div class="box-checkbox2f">
                        <label class="checkbox2f">ข้าพเจ้าขอรับรองว่าข้อมูลที่กรอกข้างต้น  และเอกสารที่แนบมาพร้อมใบสมัครเป็นความจริงทุกประการ  หากมีข้อมูลใดเป็นเท็จหรือไม่ตรงกับความเป็นจริง  ข้าพเจ้ายินยอมให้ถูกตัดสิทธิ์จากการเป็นผู้สมัครหรือผู้ถูกเสนอชื่อในครั้งนี้
                          <input type="checkbox" checked>
                          <span class="checkmark"></span>
                        </label>
                      </div>
                    </div><!--end box-confirm2f-->

                  </div><!--end set-form2f-->
                  <div class="box-captcha2f1">
                        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                        {!! htmlFormSnippet() !!}
                        @if($errors->has('g-recaptcha-response'))
                        กรุณากดยืนยันตัวก่อนยื่นเอกสาร
                        @endif
                  </div>
                  <div class="btn-center2f">
                       <a href="{{ url('/') }}" onclick="if(!confirm('ระบบจะไม่บันทึกข้อมูลและกลับไปยังหน้าแรก')) return false" class="btn btn-border confirmed-alert">ยกเลิก</a>
                      <button type="submit" name="button" class="btn btn-green">ยื่นเอกสาร</button>
                  </div><!--end btn-center2f-->
              </div><!--end content-form2f-->
            </div><!--end container-->
        </div><!--end control-insitepage2f-->

    </div><!--end insitepage2f-->

{!! Form::close() !!}
@endsection

@section('css')

<link href="{{ asset("frontend/css/insitepage.css") }}" rel="stylesheet">
<style media="screen">
      .swal2-popup{
            font-size: 2rem;
      }
</style>
@endsection

@section('js')

@include('frontend.form-professional.global-js')
<script type="text/javascript">
$(document).ready(function() {
      @if(Session::get('success'))
      Swal.fire({
        type: 'success',
        title: 'ลงทะเบียน',
        text: 'ลงทะเบียนเรียบร้อยแล้วระบบจะส่งยืนยันไปทาง Email ภายใน 1 ชม.',
        confirmButtonText: 'ปิด',
        footer: '<a href="{{ url('/') }}">กลับหน้าแรก</a>'
      })
      @endif
});

</script>
@endsection
