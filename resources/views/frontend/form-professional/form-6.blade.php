@extends('frontend.theme.master')

@section('content')
{!! Form::open() !!}
    <div class="insitepage2f">
        <div class="navication2f">
            <div class="container">
              <ol class="breadcrumb">
                  <li><a href="{{ url('/') }}">หน้าหลัก</a></li>
                  <li><a href="">สมัคร</a></li>
                  <li><a href="">ผู้ทรงคุณวุฒิ</a></li>
                  <li class="active">ข้อมูลใบสมัครผู้ทรงคุณวุฒิของท่าน</li>
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
                            <li class="active"><span>&nbsp;</span></li>
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
              <div class="content-form2f pagepreveiw">
                  <h4>ข้อมูลใบสมัครผู้ทรงคุณวุฒิของท่าน</h4>
                  <div class="set-form2f">
                    <!-- <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f nopadding bold">วัน/เดือน/พ.ศ.</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                              <div class="input2f">
                                 <div class="text-input2f nopadding">{{ now()->addYears('543')->format('d/m/Y') }}</div>
                              </div>
                            </div>
                        </div>
                    </div> -->
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f nopadding bold">คำนำหน้า</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input2f">
                                   <div class="text-input2f nopadding">{{ Auth::user()->nameTitle  }}</div>

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
                                   <div class="text-input2f nopadding">{{ Auth::user()->firstname  }}</div>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f nopadding bold">สกุล</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input2f">
                                   <div class="text-input2f nopadding">{{ Auth::user()->lastname  }}</div>
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
                        <div class="text-input2f nopadding bold">
                          ข้าพเจ้าเป็นผู้มีคุณสมบัติของผู้ทรงคุณวุฒิที่จะเข้ารับการเลือกเป็นกรรมการสุขภาพแห่งชาติครบถ้วน  ดังนี้
                        </div><!--end text-input2f-->
                    </div><!--end box-input2f-->
                    <h5>1.  คุณสมบัติทั่วไป</h5>
                    <div class="input-checkbox2f">
                        <div class="box-checkbox2f">
                          <label class="checkbox2f">1) มีสัญชาติไทย
                            <input name="thaiStatus" type="checkbox" {{ @Auth::user()->detail->thaiStatus == 1 ? 'checked="checked"' : !empty(old('thaiStatus')) ? 'checked="checked"' : '' }}>
                            <span class="checkmark"></span>
                          </label>
                        </div><!--end box-checkbox2f-->
                        <div class="box-checkbox2f">
                          <label class="checkbox2f">2) มีอายุไม่ต่ำกว่ายี่สิบปีบริบูรณ์ ณ วันที่สมัคร
                            <input name="ageQualify" type="checkbox" {{ @Auth::user()->detail->ageQualify ==1 ? 'checked="checked"' : !empty(old('ageQualify')) ? 'checked="checked"' : '' }}>
                            <span class="checkmark"></span>
                          </label>
                        </div><!--end box-checkbox2f-->
                        <div class="box-checkbox2f">
                          <label class="checkbox2f">3) ไม่เป็นคนไร้ความสามารถหรือคนเสมือนไร้ความสามารถ
                            <input name="enoughAbility" type="checkbox" {{ @Auth::user()->detail->enoughAbility == 1 ? 'checked="checked"' : !empty(old('enoughAbility')) ? 'checked="checked"' : '' }}>
                            <span class="checkmark"></span>
                          </label>
                        </div><!--end box-checkbox2f-->
                        <div class="box-checkbox2f">
                          <label class="checkbox2f">4) ไม่ติดยาเสพติดให้โทษ
                            <input name="noDrug" type="checkbox" {{ @Auth::user()->detail->noDrug == 1 ? 'checked="checked"' : !empty(old('noDrug')) ? 'checked="checked"' : '' }}>
                            <span class="checkmark"></span>
                          </label>
                        </div><!--end box-checkbox2f-->
                        <div class="box-checkbox2f">
                          <label class="checkbox2f">5) ไม่เคยถูกลงโทษไล่ออก ปลดออก เลิกจ้าง หรือพ้นจากตำแหน่ง เพราะเหตุจากการทุจริตหรือประพฤติมิชอบ
                            <input name="noCriminal" type="checkbox" {{ @Auth::user()->detail->noCriminal == 1 ? 'checked="checked"' : !empty(old('noCriminal')) ? 'checked="checked"' : '' }}>
                            <span class="checkmark"></span>
                          </label>
                        </div><!--end box-checkbox2f-->
                        <div class="box-checkbox2f">
                          <label class="checkbox2f">6) ไม่เคยได้รับโทษจำคุกโดยคำพิพากษาถึงที่สุดให้จำคุก ไม่ว่าจะถูกจำคุกจริงหรือไม่ก็ตาม
                            เว้นแต่เป็นโทษสำหรับความผิดที่ได้กระทำโดยประมาทหรือ ความผิดลหุโทษ
                            <input name="noJail" type="checkbox" {{ @Auth::user()->detail->noJail == 1 ? 'checked="checked"' : !empty(old('noJail')) ? 'checked="checked"' : '' }}>
                            <span class="checkmark"></span>
                          </label>
                        </div><!--end box-checkbox2f-->
                    </div><!--end input-checkbox2f-->
                    <h5>2.  คุณสมบัติเฉพาะ</h5>
                    <div class="input-checkbox2f">
                        <div class="box-checkbox2f">
                          <label class="checkbox2f">1) ไม่เป็นผู้ประกอบวิชาชีพด้านสาธารณสุขตามนิยามในพระราชบัญญัติสุขภาพแห่งชาติ พ.ศ. 2550
                            <input name="noNHCworking" type="checkbox" {{ @Auth::user()->detail->noNHCworking == 1 ? 'checked="checked"' : !empty(old('noNHCworking')) ? 'checked="checked"' : '' }}>
                            <span class="checkmark"></span>
                          </label>
                        </div><!--end box-checkbox2f-->
                        <div class="box-checkbox2f">
                          <label class="checkbox2f">2) มีประสบการณ์การทำงานไม่น้อยกว่า 10 ปี
                            <input name="enoughExperience" type="checkbox" {{ @Auth::user()->detail->enoughExperience == 1 ? 'checked="checked"' : !empty(old('enoughExperience')) ? 'checked="checked"' : '' }}>
                            <span class="checkmark"></span>
                          </label>
                        </div><!--end box-checkbox2f-->
                        <div class="box-checkbox2f">
                          <label class="checkbox2f">3) มีผลงานเป็นที่ประจักษ์ที่สอดคล้องกับประเภทกลุ่มผู้ทรงคุณวุฒิที่เลือกสมัคร
                            <input name="enoughProfile" type="checkbox" {{ @Auth::user()->detail->enoughProfile == 1 ? 'checked="checked"' : !empty(old('enoughProfile')) ? 'checked="checked"' : '' }}>
                            <span class="checkmark"></span>
                          </label>
                        </div><!--end box-checkbox2f-->
                    </div><!--end input-checkbox2f-->
                  </div><!--end set-form2f-->
                  <div class="headform2f">การแสดงเจตนาสมัครเข้ากลุ่ม</div>
                  <div class="set-form2f">
                    <div class="box-input2f">
                        <div class="text-input2f nopadding bold">
                          ข้าพเจ้ามีความประสงค์ที่จะสมัครเป็นกรรมการสุขภาพแห่งชาติจากผู้ทรงคุณวุฒิในกลุ่ม
                        </div><!--end text-input2f-->
                    </div><!--end box-input2f-->
                    <div class="input-radio2f">
                          @foreach(DB::table('senior_groups')->get() as $key => $group)
				  @if(Auth::user()->seniorGroupId == $group->id)
                          <div class="box-radio2f">
                            <!-- <input  type="radio" id="group{{ $key }}" name="seniorGroupId" value="{{ $group->id }}" {{ Auth::user()->seniorGroupId == $group->id ? 'checked' : $key == 0 ? 'checked' : '' }}> -->
				      <div class="text-input2f nopadding">{{ $group->groupName }}</div>
                            <!-- <label for="group{{ $key }}">{{ $group->groupName }}</label> -->
                          </div>
				  @endif
                          @endforeach
                    </div><!--end input-radio2f-->
                    <div class="box-input2f boxremark">
                        <div class="text-input2f nopadding">
                          <strong>หมายเหตุ</strong>   ผู้ทรงคุณวุฒิสามารถสมัครได้กลุ่มใดกลุ่มหนึ่งใน 6 กลุ่มนี้ เท่านั้น
                        </div><!--end text-input2f-->
                    </div><!--end box-input2f-->
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
                                        <div class="text-input2f nopadding">{{ Auth::user()->nameTitle  }}</div>
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
                                        <div class="text-input2f nopadding">{{ Auth::user()->firstname  }}</div>
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
                                        <div class="text-input2f nopadding">{{ Auth::user()->lastname  }}</div>
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
                                        <div class="text-input2f nopadding">{{ Helper::dateMonthThai(Carbon\Carbon::createFromFormat("Y-m-d",Auth::user()->detail->dateOfBirth)->addYears('543')->format('d/m/Y')) }}
                                        </div>
                                </div>
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
                                      <?php
                                     $yearSelect = \Carbon\Carbon::createFromFormat('Y-m-d',Auth::user()->detail->dateOfBirth);
                                   	$yearNow = \Carbon\Carbon::now()->diffInYears($yearSelect);

                                       $datetime1 = new DateTime($yearSelect);
                                       $datetime2 = new DateTime(now());
                                       $interval = $datetime1->diff($datetime2);
                                      ?>
                                 <div class="text-input2f nopadding">{{ $interval->format('%y ปี %m เดือน และ %d วัน') }}</div>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f bold">เพศ</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input-radio2f inline-check">
						  <div class="text-input2f nopadding">
						  @if(@Auth::user()->detail->genderId == 1)
                                      <div class="box-radio2f">
                                       <!-- {{ Form::radio('genderId',1, @Auth::user()->detail->genderId == 1 ? "checked" :'checked' , ['id' => 'test1']) }} -->
                                       ชาย
                                     </div>
						 @elseif(@Auth::user()->detail->genderId == 2)
                                     <div class="box-radio2f">
                                       <!-- {{ Form::radio('genderId',2, @Auth::user()->detail->genderId == 2 ? "checked" :'' , ['id' => 'test2']) }} -->
                                       หญิง
                                     </div>
						 @else
                                     <div class="box-radio2f">
                                       <!-- {{ Form::radio('genderId',3, @Auth::user()->detail->genderId == 3 ? "checked" :'' , ['id' => 'test3']) }} -->
                                       นักบวช/สมณะ
                                     </div>
						 @endif
					 </div>
                                </div><!--end input-radio2f-->
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
                                        <div class="input-radio2f inline-check">

			                               <div class="text-input2f nopadding">
									  @if(@Auth::user()->detail->addressType == 1)


		                                              บ้าน
									 @else
		                                           <div class="box-radio2f">

		                                              ที่ทำงาน
		                                              <div class="t-office">{{ @Auth::user()->detail->workPlaceName }}</div>
		                                           </div>
									 @endif
								 </div>
                                           <div class="input2f">
                                           </div>
                                        </div><!--end input-radio2f-->
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
                                  <div class="text-input2f nopadding">{{ @Auth::user()->detail->no }}</div>
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

                                       <div class="text-input2f nopadding">{{ @Auth::user()->detail->moo }}</div>
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
                                 <div class="text-input2f nopadding">{{ @Auth::user()->detail->soi }}</div>
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
                                 <div class="text-input2f nopadding">{{ @Auth::user()->detail->street }}</div>
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
                                 <div class="text-input2f nopadding">{{ Auth::user()->detail->subdistrict->district }}</div>
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
                            <div class="col-md-3 col-sm-4">
                                <div class="text-input2f bold">เบอร์โทรศํพท์ที่ 1</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input2f">
                                  <div class="text-input2f nopadding">
                                        {{ Auth::user()->detail->tel }}
                                  </div>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-3 col-sm-4 ">
                                <div class="text-input2f bold">เบอร์โทรศํพท์ที่ 2</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input2f">
                                  <div class="text-input2f nopadding">
                                        {{ Auth::user()->detail->mobile }}
                                  </div>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <h5>2.  ประวัติการศึกษา (เรียงจากวุฒิการศึกษาสูงสุดลงไปตามลำดับ)</h5>
                    <?php
                    $optionsArray = ["ปริญญาเอก", "ปริญญาโท", "ปริญญาตรี", "ต่ำกว่าปริญญาตรี", 'อื่นๆ'];
                     ?>
                     <div class="list-education2f">
                         <div class="table-responsive">
                             <table class="table table-bordered">
                                  <thead>
                                      <tr>
                                          <th class="t-center2f" width="8%"><span>ลำดับ</span></th>
                                          <th class="t-center2f" width="15%"><span>วุฒิการศึกษา</span></th>
                                          <th class="t-center2f" width="22%"><span>สาขา</span></th>
                                          <th class="t-center2f" width="35%"><span>สถาบัน</span></th>
                                          <th class="t-center2f" width="15%"><span>ปีที่จบ</span></th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <tr>
                                          <td class="t-center2f"><span>1</span></td>
                                          <td class="t-center2f"><span>{{$optionsArray[Auth::user()->detail->graduated1]}}</span></td>
                                          <td class="t-center2f"><span>{{ Auth::user()->detail->faculty1 }}</span></td>
                                          <td class="t-center2f"><span>{{ Auth::user()->detail->institution1 }}</span></td>
                                          <td class="t-center2f"><span>{{ Auth::user()->detail->yearend1 }}</span></td>
                                      </tr>
                                      <tr>
                                          <td class="t-center2f"><span>2</span></td>
                                          <td class="t-center2f"><span>{{@$optionsArray[Auth::user()->detail->graduated2]}}</span></td>
                                          <td class="t-center2f"><span>{{ Auth::user()->detail->faculty2 }}</span></td>
                                          <td class="t-center2f"><span>{{ Auth::user()->detail->institution2 }}</span></td>
                                          <td class="t-center2f"><span>{{ Auth::user()->detail->yearend2 }}</span></td>
                                      </tr>
                                      <tr>
                                          <td class="t-center2f"><span>3</span></td>
                                          <td class="t-center2f"><span>{{@$optionsArray[Auth::user()->detail->graduated3]}}</span></td>
                                          <td class="t-center2f"><span>{{ Auth::user()->detail->faculty3 }}</span></td>
                                          <td class="t-center2f"><span>{{ Auth::user()->detail->institution3 }}</span></td>
                                          <td class="t-center2f"><span>{{ Auth::user()->detail->yearend3 }}</span></td>
                                      </tr>
                                      <tr>
                                          <td class="t-center2f"><span>4</span></td>
                                          <td class="t-center2f"><span>{{@$optionsArray[Auth::user()->detail->graduated4]}}</span></td>
                                          <td class="t-center2f"><span>{{ Auth::user()->detail->faculty4 }}</span></td>
                                          <td class="t-center2f"><span>{{ Auth::user()->detail->institution4 }}</span></td>
                                          <td class="t-center2f"><span>{{ Auth::user()->detail->yearend4 }}</span></td>
                                      </tr>
                                      <tr>
                                      <td class="t-center2f"><span>5</span></td>
                                          <td class="t-center2f"><span>{{@$optionsArray[Auth::user()->detail->graduated5]}}</span></td>
                                          <td class="t-center2f"><span>{{ Auth::user()->detail->faculty5 }}</span></td>
                                          <td class="t-center2f"><span>{{ Auth::user()->detail->institution5 }}</span></td>
                                          <td class="t-center2f"><span>{{ Auth::user()->detail->yearend5 }}</span></td>
                                      </tr>

                                  </tbody>
                             </table>
                         </div>
                     </div>




                    <h5>3.  ประวัติการทำงาน</h5>
                    <div class="box-input2f">
                        <div class="text-input2f bold"><span>1)</span>หน้าที่การงานและความรับผิดชอบในปัจจุบัน</div>
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright bold">
                                <div class="text-input2f title-sm">ปัจจุบันปฏิบัติหน้าที่</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input2f">

                                       <div class="text-input2f nopadding" style="">{!! nl2br(Auth::user()->detail->nowWork) !!}</div>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f title-sm bold">สถานที่ปฏิบัติงาน</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input2f">
                                 <div class="text-input2f nopadding">{!! nl2br(Auth::user()->detail->nowWorkPlace) !!}</div>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f title-sm bold">งานในความรับผิดชอบ</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input2f">

                                      <div class="text-input2f nopadding">{{ Auth::user()->detail->nowRole }}</div>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->

                    <div class="box-input2f">
                        <div class="text-input2f bold"><span>2)</span>การปฏิบัติหน้าที่ในอดีต  (โปรดระบุเฉพาะหน้าที่ที่สำคัญ)</div>
                    </div><!--end box-input2f-->
                    <div class="text-titlenumber bold"><span>ลำดับที่ 1</span></div>
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f title-sm bold">ปฏิบัติหน้าที่</div>
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
                                <div class="text-input2f title-sm bold">องค์กร</div>
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
                                    <div class="text-input2f nopadding">{{ Auth::user()->detail->time1 }} {{ !empty(Auth::user()->detail->time1) ? 'ปี' : '' }}</div>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f title-sm bold">จากปีที่</div>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <div class="input2f">
                                    <div class="text-input2f nopadding">{{ Auth::user()->detail->fromyear1 }}</div>

                                </div>
                            </div>
                            <div class="col-md-1 col-sm-2 nopaddingright">
                                <div class="text-input2f title-sm bold">ถึง</div>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <div class="input2f">
                                      <div class="text-input2f nopadding">{{ Auth::user()->detail->toyear1 }}</div>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="text-titlenumber bold"><span>ลำดับที่ 2</span></div>
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f title-sm bold">ปฏิบัติหน้าที่</div>
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
                                <div class="text-input2f title-sm bold">องค์กร</div>
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
                                    <div class="text-input2f nopadding">{{ Auth::user()->detail->time2 }} {{ !empty(Auth::user()->detail->time2) ? 'ปี' : '' }}</div>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f title-sm bold">จากปีที่</div>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <div class="input2f">
                                    <div class="text-input2f nopadding">{{ Auth::user()->detail->fromyear2 }}</div>

                                </div>
                            </div>
                            <div class="col-md-1 col-sm-2 nopaddingright">
                                <div class="text-input2f title-sm bold">ถึง</div>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <div class="input2f">
                                      <div class="text-input2f nopadding">{{ Auth::user()->detail->toyear2 }}</div>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="text-titlenumber bold"><span>ลำดับที่ 3</span></div>
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f title-sm bold">ปฏิบัติหน้าที่</div>
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
                                <div class="text-input2f title-sm bold">องค์กร</div>
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
                                    <div class="text-input2f nopadding">{{ Auth::user()->detail->time3 }} {{ !empty(Auth::user()->detail->time3) ? 'ปี' : '' }}</div>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f title-sm bold">จากปีที่</div>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <div class="input2f">
                                    <div class="text-input2f nopadding">{{ Auth::user()->detail->fromyear3 }}</div>

                                </div>
                            </div>
                            <div class="col-md-1 col-sm-2 nopaddingright">
                                <div class="text-input2f title-sm bold">ถึง</div>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <div class="input2f">
                                      <div class="text-input2f nopadding">{{ Auth::user()->detail->toyear3 }}</div>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="text-input2f  bold"><span>3)</span>ประสบการณ์สำคัญหรือประสบการณ์ที่ภาคภูมิใจที่สัมพันธ์กับประเภทกลุ่มผู้ทรงคุณวุฒิที่เลือกสมัคร</div>
                    </div><!--end box-input2f-->

                      <div class="box-preview2f">
                          <div class="input-value2f paddingleft20">{{ Auth::user()->detail->importantMemo }}</div>
                      </div>

                  </div><!--end set-form2f-->
                  <div class="headform2f">วิสัยทัศน์ของข้าพเจ้าต่อการพัฒนาระบบสุขภาพแห่งชาติ</div>
                  <div class="set-form2f">
                    <div class="box-input2f">
                        <div class="text-input2f nopadding">{{ Auth::user()->detail->vision }}</div>
                    </div><!--end box-input2f-->
                    <h5>ทั้งนี้  ข้าพเจ้าได้แนบสำเนาเอกสารหรือหลักฐานที่แนบมาพร้อมใบสมัคร</h5>

                    <div class="box-input2f">
                        <div class="text-input2f nopadding bold">สำเนาบัตรประจำตัวประชาชน</div>
                        <div class="row">
                            <div class="col-md-6 col-sm-8 nopaddingright">
                                <div class="input2f">
                                      <?php
                                     $file1 = Auth::user()->attach()->where('status', 1)->where('use_is', 'copy_personal_card')->first();
                                      ?>
                                      @if($file1)
                                      @if($file1->type == "jpg")
                                      <img src="{{asset($file1->path)}}" alt="{{ $file1->fileName }}" class="img-responsive">
                                      @endif
                                      <a target="_blank" href="{{asset($file1->path)}}">{{ $file1->fileName }}</a>
                                      @endif
                                </div><!--end input2f-->
                            </div>
                            <div class="col-md-6 col-sm-4">

                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="text-input2f nopadding bold">รูปถ่ายหน้าตรงไม่สวมหมวก ไม่สวมแว่นตาดำ ฉากพื้นหลังไม่มีลวดลาย  ซึ่งถ่ายมาแล้วไม่เกิน  6  เดือน</div>
                        <div class="row">
                            <div class="col-md-6 col-sm-8 nopaddingright">
                                <div class="input2f">
                                      <?php
                                    $file2 = Auth::user()->attach()->where('status', 1)->where('use_is', 'personal_photo')->first();
                                     ?>
                                     @if($file2)
                                     @if($file2->type == "jpg")
                                     <img src="{{asset($file2->path)}}" alt="{{ $file2->fileName }}" class="img-responsive">
                                     @endif
                                     <a target="_blank" href="{{asset($file2->path)}}">{{ $file2->fileName }}</a>
                                     @endif
                                </div><!--end input2f-->
                            </div>
                            <div class="col-md-6 col-sm-4">

                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="text-input2f nopadding bold">เอกสารสรุปผลงานอันเป็นที่ประจักษ์ ที่สอดคล้องกับประเภทกลุ่มผู้ทรงคุณวุฒิที่เลือกสมัคร
                        (ไม่เกิน 2 หน้ากระดาษ A4) พิมพ์โดยใช้ตัวอักษรขนาดไม่ต่ำกว่า 16)</div>
                        <div class="row">
                            <div class="col-md-6 col-sm-8 nopaddingright">
                                <div class="box-input2f">
                                      <?php
                                   $file3 = Auth::user()->attach()->where('status', 1)->where('use_is', 'document1')->first();
                                    ?>
                                    @if($file3)
                                    @if($file3->type == "jpg")
                                    <img src="{{asset($file3->path)}}" alt="{{ $file3->fileName }}" class="img-responsive">
                                    @endif
                                    <a target="_blank" href="{{asset($file3->path)}}">{{ $file3->fileName }}</a>
                                    @endif
                                </div><!--end box-input2f-->
                            </div>
                            <div class="col-md-6 col-sm-4">

                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-confirm2f">
                      <div class="box-checkbox2f">
                        <label class="checkbox2f">ข้าพเจ้าขอรับรองว่าข้อมูลที่กรอกข้างต้น  และเอกสารที่แนบมาพร้อมใบสมัครเป็นความจริงทุกประการ
                          หากมีข้อมูลใดเป็นเท็จหรือไม่ตรงกับความเป็นจริง ข้าพเจ้ายินยอมให้ถูกตัดสิทธิ์จากการเป็นผู้สมัครหรือผู้ถูกเสนอชื่อในครั้งนี้
                          <input type="checkbox" checked="checked">
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

                        <!-- <input type="text" name="captcha" class="form-control" value=""> -->
                        @if($errors->has('captcha'))
                        <span> ระบบข้อมูลไม่ถูกต้อง</span>
                        @endif
                      </div>
                      <div class="col-sm-4"></div>
                    </div>

                  </div>
                  <div class="btn-center2f">

				<a href="{{ url('/form-professional') }}/5" class="btn btn-border">ย้อนกลับ</a>
                       <a href="{{ url('/cancel-form') }}/1/6" class="btn btn-border confirmed-alert">ยกเลิก</a>
                      <button type="submit" name="button" class="btn btn-green">ยืนยันข้อมูล</button>
                  </div><!--end btn-center2f-->
              </div><!--end content-form2f-->
            </div><!--end container-->
        </div><!--end control-insitepage2f-->

    </div><!--end insitepage2f-->
{!! Form::close() !!}
@endsection

@section('css')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.css" integrity="sha256-JHRpjLIhLC03YGajXw6DoTtjpo64HQbY5Zu6+iiwRIc=" crossorigin="anonymous" />
    <style media="screen">
          .swal2-popup{
                font-size: 2rem;
          }
    </style>
@endsection

@section('js')

@include('frontend.form-professional.global-js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.js" integrity="sha256-FmcrRIeUicq2hy0eo5tD5h2Iv76IBfc3A51x8r9xeIY=" crossorigin="anonymous"></script>
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
