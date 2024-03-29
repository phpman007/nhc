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
                  <div class="control-progress2f">
                   <div class="box-line-progress2f">
                       <div class="bg-progress2f"></div>
                       <div class="line-progress2f">
                          <ul>
                            <li class="active"><span>&nbsp;</span></li>
                            <li class="active"><span>&nbsp;</span></li>
                            <li class="active"><span>&nbsp;</span></li>
                            <li class="active"><span>&nbsp;</span></li>
                            <li class="active"><span>&nbsp;</span></li>
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
              <div class="content-form2f pagepreveiw">
                  <h4>Preview สมัครผู้แทนองค์กรปกครองส่วนท้องถิ่น</h4>
                  <div class="set-form2f">
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f nopadding bold">วัน/เดือน/พ.ศ.</div>
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
                                <div class="text-input2f nopadding bold">ข้าพเจ้า</div>
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
                                <div class="text-input2f nopadding bold">ชื่อ</div>
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
                                <div class="text-input2f nopadding bold">นามสกุล</div>
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
                    <h5>1.  คุณสมบัติทั่วไป</h5>
                    <div class="input-checkbox2f">
                        <div class="box-checkbox2f">
                          <label class="checkbox2f">1) มีสัญชาติไทย
                            {!! Form::checkbox('thaiStatus', 1, @Auth::user()->detail->thaiStatus, ["class"=>"checkmark", 'disabled'=>'']) !!}
                            <span class="checkmark"></span>
                          </label>
                        </div><!--end box-checkbox2f-->
                        <div class="box-checkbox2f">
                          <label class="checkbox2f">2) มีอายุไม่ต่ำกว่ายี่สิบปีบริบูรณ์ ณ วันที่สมัคร
                            {!! Form::checkbox('ageQualify', 1, @Auth::user()->detail->ageQualify, ["class"=>"checkmark", 'disabled'=>'']) !!}
                            <span class="checkmark"></span>
                          </label>
                        </div><!--end box-checkbox2f-->
                        <div class="box-checkbox2f">
                          <label class="checkbox2f">3) ไม่เป็นคนไร้ความสามารถหรือคนเสมือนไร้ความสามารถ
                            {!! Form::checkbox('enoughAbility', 1, @Auth::user()->detail->enoughAbility, ["class"=>"checkmark", 'disabled'=>'']) !!}
                            <span class="checkmark"></span>
                          </label>
                        </div><!--end box-checkbox2f-->
                        <div class="box-checkbox2f">
                          <label class="checkbox2f">4) ไม่ติดยาเสพติดให้โทษ
                            {!! Form::checkbox('noDrug', 1, @Auth::user()->detail->noDrug, ["class"=>"checkmark", 'disabled'=>'']) !!}
                            <span class="checkmark"></span>
                          </label>
                        </div><!--end box-checkbox2f-->
                        <div class="box-checkbox2f">
                          <label class="checkbox2f">5) ไม่เคยถูกลงโทษไล่ออก ปลดออก เลิกจ้าง หรือพ้นจากตำแหน่ง เพราะเหตุจากการทุจริตหรือประพฤติมิชอบ
                            {!! Form::checkbox('noCriminal', 1, @Auth::user()->detail->noCriminal, ["class"=>"checkmark", 'disabled'=>'']) !!}
                            <span class="checkmark"></span>
                          </label>
                        </div><!--end box-checkbox2f-->
                        <div class="box-checkbox2f">
                          <label class="checkbox2f">6) ไม่เคยได้รับโทษจำคุกโดยคำพิพากษาถึงที่สุดให้จำคุก ไม่ว่าจะถูกจำคุกจริงหรือไม่ก็ตาม
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
                    <h5>1.  ข้อมูลทั่วไป</h5>
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f bold">
                                  <span>1)</span>
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
                                <div class="text-input2f bold">ชื่อ</div>
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
                                <div class="text-input2f bold">นามสกุล</div>
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
                                <div class="text-input2f bold">
                                  <span>2)</span>เกิดวันที่
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
                                <div class="text-input2f bold">อายุ</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input2f">
                                      <div class="text-input2f nopadding">{{ now()->format('Y') - Carbon\Carbon::createFromFormat('Y-m-d', Auth::user()->detail->dateOfBirth)->format('Y') }}</div>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="text-input2f bold">
                          <span>3)</span>สถานที่ ที่สามารถติดต่อได้สะดวก
                        </div><!--end text-input2f-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-12">
                                  <div class="input-radio2f inline-check padddingleft40">
                                      <div class="box-radio2f">
                                        <input type="radio" id="home" name="radio-group" checked>
                                        <label for="home">บ้าน</label>
                                      </div>
                                      <div class="box-radio2f">
                                        <input type="radio" id="office" name="radio-group">
                                        <label for="office">ที่ทำงาน</label>
                                        <div class="t-office">{{ Auth::user()->detail->workPlaceName }}</div>
                                      </div>

                                  </div><!--end input-radio2f-->
                              </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f bold">เลขที่</div>
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
                                <div class="text-input2f bold">หมู่ที่</div>
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
                                <div class="text-input2f bold">ตรอก/ซอย</div>
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
                                <div class="text-input2f bold">ถนน</div>
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
                                <div class="text-input2f bold">ตำบล/แขวง</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input2f">
                                    <div class="text-input2f nopadding"> {{ Auth::user()->detail->subdistrict->district }}</div>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f bold">อำเภอ/เขต</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input2f">
                                      <div class="text-input2f nopadding">{{ Auth::user()->detail->district->amphoe }}</div>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f bold">จังหวัด</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input2f">
                                      <div class="text-input2f nopadding">{{ Auth::user()->detail->province->province }}</div>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f bold">รหัสไปรษณีย์</div>
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
                                <div class="text-input2f bold">โทรศัพท์บ้าน</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input2f">

                                           <?php $tel_slarp = substr(Auth::user()->detail->tel, 9) ?>
                                  <div class="text-input2f nopadding">
                                        @if(!empty(Auth::user()->detail->tel))
                                        {{ substr(Auth::user()->detail->tel, 0, 2) }}
                                        -
                                        {{ substr(Auth::user()->detail->tel, 2, 4) }}
                                        -
                                        {{ substr(Auth::user()->detail->tel, 6, 3) }}
                                        @if(!empty(substr(Auth::user()->detail->tel, 9)))
                                        ต่อ
                                        {{ substr(Auth::user()->detail->tel, 9) }}
                                        @endif
                                        @endif
                                  </div>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f bold">โทรศัพท์มือถือ</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input2f">
                                  <div class="text-input2f nopadding"> {{ substr(Auth::user()->detail->mobile, 0, 2) }}
                                   -
                                   {{ substr(Auth::user()->detail->mobile, 2, 4) }}
                                   -
                                   {{ substr(Auth::user()->detail->mobile, 6, 4) }}</div>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <h5>2.  ประวัติการศึกษา (เรียงจากวุฒิการศึกษาสูงสุดลงไปตามลำดับ)</h5>
                    <div class="box-preview2f">
                        <div class="row">
                            <div class="col-sm-1 col-xs-2">
                                <div class="input-title2f t-center2f"><span>1)</span></div>
                            </div>
                            <div class="col-sm-4 col-xs-10">
                            <div class="input-value2f">{{ Auth::user()->detail->graduated1 }}</div>
                            </div>
                            <div class="col-sm-1 col-xs-2">
                              <div class="input-title2f">สาขา</div>
                            </div>
                            <div class="col-sm-3 col-xs-10">
                            <div class="input-value2f">{{ Auth::user()->detail->faculty1 }}</div>
                            </div>
                        </div><!--end row-->
                        <div class="row">
                            <div class="col-sm-1 col-xs-2"></div>
                            <div class="col-sm-4 col-xs-10">
                                <div class="input-value2f">สถาบัน </div>
                            </div>
                            <div class="col-sm-1 col-xs-2 nopaddingright">
                              <div class="input-title2f">ปีที่จบ</div>
                            </div>
                            <div class="col-sm-2 col-xs-10">
                                <div class="input-value2f"></div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-preview2f">
                        <div class="row">
                            <div class="col-sm-1 col-xs-2">
                                <div class="input-title2f t-center2f"><span>2)</span></div>
                            </div>
                            <div class="col-sm-4 col-xs-10">
                            <div class="input-value2f">{{ Auth::user()->detail->graduated2 }}</div>
                            </div>
                            <div class="col-sm-1 col-xs-2">
                              <div class="input-title2f">สาขา</div>
                            </div>
                            <div class="col-sm-3 col-xs-10">
                            <div class="input-value2f">{{ Auth::user()->detail->faculty2 }}</div>
                            </div>
                        </div><!--end row-->
                        <div class="row">
                            <div class="col-sm-1 col-xs-2"></div>
                            <div class="col-sm-4 col-xs-10">
                                <div class="input-value2f">สถาบัน </div>
                            </div>
                            <div class="col-sm-1 col-xs-2 nopaddingright">
                              <div class="input-title2f">ปีที่จบ</div>
                            </div>
                            <div class="col-sm-2 col-xs-10">
                                <div class="input-value2f"></div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-preview2f">
                        <div class="row">
                            <div class="col-sm-1 col-xs-2">
                                <div class="input-title2f t-center2f"><span>3)</span></div>
                            </div>
                            <div class="col-sm-4 col-xs-10">
                            <div class="input-value2f">{{ Auth::user()->detail->graduated3 }}</div>
                            </div>
                            <div class="col-sm-1 col-xs-2">
                              <div class="input-title2f">สาขา</div>
                            </div>
                            <div class="col-sm-3 col-xs-10">
                            <div class="input-value2f">{{ Auth::user()->detail->faculty3 }}</div>
                            </div>
                        </div><!--end row-->
                        <div class="row">
                            <div class="col-sm-1 col-xs-2"></div>
                            <div class="col-sm-4 col-xs-10">
                                <div class="input-value2f">สถาบัน </div>
                            </div>
                            <div class="col-sm-1 col-xs-2 nopaddingright">
                              <div class="input-title2f">ปีที่จบ</div>
                            </div>
                            <div class="col-sm-2 col-xs-10">
                                <div class="input-value2f"></div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-preview2f">
                        <div class="row">
                            <div class="col-sm-1 col-xs-2">
                                <div class="input-title2f t-center2f"><span>4)</span></div>
                            </div>
                            <div class="col-sm-4 col-xs-10">
                            <div class="input-value2f">{{ Auth::user()->detail->graduated4 }}</div>
                            </div>
                            <div class="col-sm-1 col-xs-2">
                              <div class="input-title2f">สาขา</div>
                            </div>
                            <div class="col-sm-3 col-xs-10">
                            <div class="input-value2f">{{ Auth::user()->detail->faculty4 }}</div>
                            </div>
                        </div><!--end row-->
                        <div class="row">
                            <div class="col-sm-1 col-xs-2"></div>
                            <div class="col-sm-4 col-xs-10">
                                <div class="input-value2f">สถาบัน </div>
                            </div>
                            <div class="col-sm-1 col-xs-2 nopaddingright">
                              <div class="input-title2f">ปีที่จบ</div>
                            </div>
                            <div class="col-sm-2 col-xs-10">
                                <div class="input-value2f"></div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-preview2f">
                        <div class="row">
                            <div class="col-sm-1 col-xs-2">
                                <div class="input-title2f t-center2f"><span>5)</span></div>
                            </div>
                            <div class="col-sm-4 col-xs-10">
                            <div class="input-value2f">{{ Auth::user()->detail->graduated5 }}</div>
                            </div>
                            <div class="col-sm-1 col-xs-2">
                              <div class="input-title2f">สาขา</div>
                            </div>
                            <div class="col-sm-3 col-xs-10">
                            <div class="input-value2f">{{ Auth::user()->detail->faculty5 }}</div>
                            </div>
                        </div><!--end row-->
                        <div class="row">
                            <div class="col-sm-1 col-xs-2"></div>
                            <div class="col-sm-4 col-xs-10">
                                <div class="input-value2f">สถาบัน </div>
                            </div>
                            <div class="col-sm-1 col-xs-2 nopaddingright">
                              <div class="input-title2f">ปีที่จบ</div>
                            </div>
                            <div class="col-sm-2 col-xs-10">
                                <div class="input-value2f"></div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <h5>3. ผลงาน หรือประสบการณ์ที่ดำเนินงานเกี่ยวกับด้านสุขภาพ</h5>
                    <div class="box-input2f">
                      <div class="input2f">
                        <div class="text-input2f nopadding">{{ Auth::user()->detail->portfolio }}</div>
                      </div>
                    </div><!--end box-input2f-->
                    <h5>4. ผลงาน หรือประสบการณ์ที่ดำเนินงานเกี่ยวกับด้านสุขภาพ</h5>

                    <div class="text-titlenumber bold"><span>ลำดับที่ 1</span></div>
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f title-sm bold">ตำแหน่ง</div>
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
                                <div class="text-input2f title-sm bold">หน่วยงาน</div>
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
                                <div class="text-input2f title-sm bold">ระยะเวลาการปฏิบัติหน้าที่</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input2f">
                                  <div class="text-input2f nopadding">{{ Auth::user()->detail->time1 }}</div>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="text-titlenumber bold"><span>ลำดับที่ 2</span></div>
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f title-sm bold">ตำแหน่ง</div>
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
                                <div class="text-input2f title-sm bold">หน่วยงาน</div>
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
                                <div class="text-input2f title-sm bold">ระยะเวลาการปฏิบัติหน้าที่</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input2f">
                                  <div class="text-input2f nopadding">{{ Auth::user()->detail->time2 }}</div>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="text-titlenumber bold"><span>ลำดับที่ 3</span></div>
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f title-sm bold">ตำแหน่ง</div>
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
                                <div class="text-input2f title-sm bold">หน่วยงาน</div>
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
                                <div class="text-input2f title-sm bold">ระยะเวลาการปฏิบัติหน้าที่</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input2f">
                                  <div class="text-input2f nopadding">{{ Auth::user()->detail->time3 }}</div>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="headlineform2f">
                      <h5>4. วาระการดำรงตำแหน่งในองค์กรปกครองส่วนท้องถิ่น (ปัจจุบัน)</h5>
                      <div class="input2f width200 input-center">
                        <div class="text-input2f nopadding">{{ Auth::user()->detail->roleTimeLeft }}</div>
                      </div>
                      <div class="text-unit">ปี</div>
                    </div>
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f bold">
                                  <span>1)</span>เริ่มตั้งแต่
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
                                <div class="text-input2f bold">
                                  <span>2)</span>หมดวาระ
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
                  <div class="box-captcha2f">
                    <div class="row">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4">
                           <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                           <input type="text" name="captcha" class="form-control" value="">
                           @if($errors->has('captcha'))
                           <span> ระบบข้อมูลไม่ถูกต้อง</span>
                           @endif
                        </div>
                    </div>

                  </div>
                  <div class="btn-center2f">
                       <a href="{{ url('/') }}" class="btn btn-border confirmed-alert">ยกเลิก</a>
                      <button type="submit" name="button" class="btn btn-green">ยืนยันข้อมูล</button>
                  </div><!--end btn-center2f-->
              </div><!--end content-form2f-->
            </div><!--end container-->
        </div><!--end control-insitepage2f-->

    </div><!--end insitepage2f-->

{!! Form::close() !!}
@endsection

@section('css')

<style media="screen">
      .swal2-popup{
            font-size: 2rem;
      }
</style>
@endsection

@section('js')

@include('frontend.form-professional.global-js')
<script type="text/javascript">
      $('input, radio').attr("disabled", 'true');
      $('[name="captcha"]').removeAttr('disabled');
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
