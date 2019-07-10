@extends('frontend.theme.master')

@section('content')
<style media="screen">
.line-progress2f ul li {
float: left;
width: 27%;
}
</style>
{!! Form::open() !!}
    <div class="insitepage2f">
        <div class="navication2f">
            <div class="container">
              <ol class="breadcrumb">
                  <li><a href="">หน้าหลัก</a></li>
                  <li><a href="">สมัคร</a></li>
                  <li><a href="">ผู้แทนองค์กรภาคเอกชน</a></li>
                  <li class="active">Preview สมัครผู้แทนองค์กรภาคเอกชน</li>
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
                  <div class="control-progress2f sixstep">
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
                                @include('frontend.form-professional.step-nav')
                       </ul>
                   </div><!--end box-step-progress2f-->
                   <div class="clear2f"></div>
                 </div><!--end control-progress2f-->
              <div class="content-form2f">
                  <h4>Preview สมัครผู้แทนองค์กรภาคเอกชน</h4>
                  <div class="set-form2f">
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f nopadding bold">วัน/เดือน/พ.ศ.</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input2f">
                                  <div class="text-input2f nopadding">{{ now()->addYears('543')->format('d/m/Y') }}</div>
                                </div><!--end input2f-->
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
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
                                <div class="text-input2f nopadding bold">นามสกุล</div>
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
                        <div class="text-input2f nopadding">
                          ข้าพเจ้าเป็นผู้มีคุณสมบัติของผู้ทรงคุณวุฒิที่จะเข้ารับการเลือกเป็นกรรมการสุขภาพแห่งชาติครบถ้วน  ดังนี้
                        </div><!--end text-input2f-->
                    </div><!--end box-input2f-->
                    <h5>๑.  คุณสมบัติทั่วไป</h5>
                    <div class="input-checkbox2f">
                        <div class="box-checkbox2f">
                          <label class="checkbox2f">๑) มีสัญชาติไทย
                            <input name="thaiStatus" type="checkbox" {{ @Auth::user()->detail->thaiStatus == 1 ? 'checked="checked"' : !empty(old('thaiStatus')) ? 'checked="checked"' : '' }}>
                            <span class="checkmark"></span>
                          </label>
                        </div><!--end box-checkbox2f-->
                        <div class="box-checkbox2f">
                          <label class="checkbox2f">๒) มีอายุไม่ต่ำกว่ายี่สิบปีบริบูรณ์ ณ วันที่สมัคร
                            <input name="ageQualify" type="checkbox" {{ @Auth::user()->detail->ageQualify ==1 ? 'checked="checked"' : !empty(old('ageQualify')) ? 'checked="checked"' : '' }}>
                            <span class="checkmark"></span>
                          </label>
                        </div><!--end box-checkbox2f-->
                        <div class="box-checkbox2f">
                          <label class="checkbox2f">๓) ไม่เป็นคนไร้ความสามารถหรือคนเสมือนไร้ความสามารถ
                            <input name="enoughAbility" type="checkbox" {{ @Auth::user()->detail->enoughAbility == 1 ? 'checked="checked"' : !empty(old('enoughAbility')) ? 'checked="checked"' : '' }}>
                            <span class="checkmark"></span>
                          </label>
                        </div><!--end box-checkbox2f-->
                        <div class="box-checkbox2f">
                          <label class="checkbox2f">๔) ไม่ติดยาเสพติดให้โทษ
                            <input name="noDrug" type="checkbox" {{ @Auth::user()->detail->noDrug == 1 ? 'checked="checked"' : !empty(old('noDrug')) ? 'checked="checked"' : '' }}>
                            <span class="checkmark"></span>
                          </label>
                        </div><!--end box-checkbox2f-->
                        <div class="box-checkbox2f">
                          <label class="checkbox2f">๕) ไม่เคยถูกลงโทษไล่ออก ปลดออก เลิกจ้าง หรือพ้นจากตำแหน่ง เพราะเหตุจากการทุจริตหรือประพฤติมิชอบ
                            <input name="noCriminal" type="checkbox" {{ @Auth::user()->detail->noCriminal == 1 ? 'checked="checked"' : !empty(old('noCriminal')) ? 'checked="checked"' : '' }}>
                            <span class="checkmark"></span>
                          </label>
                        </div><!--end box-checkbox2f-->
                        <div class="box-checkbox2f">
                          <label class="checkbox2f">๖) ไม่เคยได้รับโทษจำคุกโดยคำพิพากษาถึงที่สุดให้จำคุก ไม่ว่าจะถูกจำคุกจริงหรือไม่ก็ตาม
                            เว้นแต่เป็นโทษสำหรับความผิดที่ได้กระทำโดยประมาทหรือ ความผิดลหุโทษ
                            <input name="noJail" type="checkbox" {{ @Auth::user()->detail->noJail == 1 ? 'checked="checked"' : !empty(old('noJail')) ? 'checked="checked"' : '' }}>
                            <span class="checkmark"></span>
                          </label>
                        </div><!--end box-checkbox2f-->
                    </div><!--end input-checkbox2f-->

                  </div><!--end set-form2f-->
                  <div class="headform2f">การแสดงเจตนาสมัครเข้ากลุ่ม</div>
                  <div class="set-form2f">
                    <div class="box-input2f">
                        <div class="text-input2f nopadding">
                          ข้าพเจ้ามีความประสงค์ที่จะสมัครเป็นกรรมการสุขภาพแห่งชาติจากผู้แทนองค์กรเอกชนในกลุ่ม
                        </div><!--end text-input2f-->
                    </div><!--end box-input2f-->
                    <div class="input-radio2f">
                          @foreach(DB::table('ngo_groups')->get() as $key => $item)
                         <div class="box-radio2f">
                            {!! Form::radio('ngoGroupId', $item->id, $item->id == Auth::user()->ngoGroupId ? 'checked' : '', ['id' => "group".$key]) !!}
                            <label for="group{{$key}}">{{$key+1}}) {{$item->groupName}}</label>
                         </div>
                         @endforeach
                    </div><!--end input-radio2f-->
                    <div class="box-input2f boxremark">
                        <div class="text-input2f nopadding">
                          <strong>หมายเหตุ</strong>   ผู้สมัครผู้แทนองค์กรภาคเอกชนสามารถสมัครได้กลุ่มใดกลุ่มหนึ่งใน ๕ กลุ่มนี้ เท่านั้น
                        </div><!--end text-input2f-->
                    </div><!--end box-input2f-->
                  </div><!--end set-form2f-->
                  <div class="headform2f">ข้อมูลประวัติ</div>
                  <div class="set-form2f">
                    <h5>๑.  ข้อมูลทั่วไป</h5>
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f bold">
                                  <span>๑)</span>คำนำหน้า
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
                                  <span>๒)</span>เกิดวันที่
                                </div><!--end text-input2f-->
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input2f">
                                      <div class="text-input2f nopadding">{{ Carbon\Carbon::createFromFormat("Y-m-d",Auth::user()->detail->dateOfBirth)->addYears('543')->format('d/m/Y') }}
                                     </div>
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
                          <span>๓)</span>สถานที่ ที่สามารถติดต่อได้สะดวก
                        </div><!--end text-input2f-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright"></div>
                            <div class="col-md-6 col-sm-8">
                                  <div class="input-radio2f inline-check">
                                        <div class="box-radio2f">
                                           {{ Form::radio('addressType', 1, @Auth::user()->detail->addressType == 1 ? "checked" :'checked', ['id'=>'home']) }}
                                           <label for="home">บ้าน</label>
                                        </div>
                                        <div class="box-radio2f">
                                           {{ Form::radio('addressType', 2, @Auth::user()->detail->addressType == 1 ? "checked" :'', ['id'=>'office']) }}
                                           <label for="office">ที่ทำงาน</label>
                                        </div>
                                        <div class="input2f width65per">
                                             <div class="text-input2f nopadding">{{ @Auth::user()->detail->workPlaceName }}</div>
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
                                  <div class="text-input2f nopadding"> {{ Auth::user()->detail->province->province }}</div>
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
                                <div class="text-input2f bold">โทรศัพท์</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input2f">
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
                                <div class="text-input2f bold">โทรศัพท์เคลื่อนที่ (มือถือ)</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input2f">
                                  <div class="text-input2f nopadding">
                                        {{ substr(Auth::user()->detail->mobile, 0, 2) }}
                                        -
                                        {{ substr(Auth::user()->detail->mobile, 2, 4) }}
                                        -
                                        {{ substr(Auth::user()->detail->mobile, 6, 4) }}
                                  </div>
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
                              <div class="text-input2f nopadding bold">สาขา</div>
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
                            <div class="text-input2f nopadding bold">สาขา</div>
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
                            <div class="text-input2f nopadding bold">สาขา</div>
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
                            <div class="text-input2f nopadding bold">สาขา</div>
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
                            <div class="text-input2f nopadding bold">สาขา</div>
                          </div>
                          <div class="col-md-3 col-sm-8 col-xs-11">
                              <div class="input2f">
                                    <div class="text-input2f nopadding">{{ Auth::user()->detail->faculty5 }}</div>
                              </div>
                          </div>
                      </div><!--end row-->
                    </div><!--end box-input2f-->
                    <h5>๓.  ประวัติการทำงาน</h5>
                    <div class="box-input2f">
                        <div class="text-input2f bold"><span>๑)</span>หน้าที่การงานและความรับผิดชอบในปัจจุบัน</div>
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f title-sm bold">ปัจจุบันปฏิบัติหน้าที่</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input2f">

                                       <div class="text-input2f nopadding">{{ Auth::user()->detail->nowWork }}</div>
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
                                 <div class="text-input2f nopadding">{{ Auth::user()->detail->nowWorkPlace }}</div>
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
                        <div class="text-input2f bold"><span>๒)</span>การปฏิบัติหน้าที่ในอดีต  (โปรดระบุเฉพาะหน้าที่ที่สำคัญ)</div>
                    </div><!--end box-input2f-->
                    <div class="text-titlenumber bold"><span>ลำดับที่ ๑</span></div>
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
                                    <div class="text-input2f nopadding">{{ Auth::user()->detail->time1 }}</div>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="text-titlenumber bold"><span>ลำดับที่ ๒</span></div>
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
                                    <div class="text-input2f nopadding">{{ Auth::user()->detail->time2 }}</div>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="text-titlenumber bold"><span>ลำดับที่ ๓</span></div>
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
                    <div class="box-input2f">
                        <div class="text-input2f bold"><span>๓)</span>ประสบการณ์สำคัญหรือประสบการณ์ที่ภาคภูมิใจที่สัมพันธ์กับประเภทกลุ่มผู้แทนองค์กรภาคเอกชนที่เลือกสมัคร</div>
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright"></div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input2f">
                                    <div class="text-input2f nopadding">{{ Auth::user()->detail->importantMemo }}</div>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
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
                                     <a target="_blank" href="{{asset($file1->path)}}">{{ $file1->fileName }}</a>
                                     @endif
                                </div><!--end input2f-->
                            </div>
                            <div class="col-md-6 col-sm-4"></div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="text-input2f nopadding bold">รูปถ่ายหน้าตรงไม่สวมหมวก ไม่สวมแว่นตาดำ ฉากพื้นหลังไม่มีลวดลาย  ซึ่งถ่ายมาแล้วไม่เกิน  ๖  เดือน</div>
                        <div class="row">
                            <div class="col-md-6 col-sm-8 nopaddingright">
                                <div class="input2f">
                                      <?php
                                   $file2 = Auth::user()->attach()->where('status', 1)->where('use_is', 'personal_photo')->first();
                                    ?>
                                    @if($file2)
                                    <a target="_blank" href="{{asset($file2->path)}}">{{ $file2->fileName }}</a>
                                    @endif
                                </div><!--end input2f-->
                            </div>
                            <div class="col-md-6 col-sm-4"></div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="text-input2f nopadding bold">แบบ สช./แบบขอขึ้นทะเบียนองค์กรภาคเอกชนและยืนยันการส่งผู้แทนภาคเอกชน/๒๕๖๒ พร้อมเอกสารหลักฐานประกอบ ๑ ชุด</div>
                        <div class="row">
                            <div class="col-md-6 col-sm-8 nopaddingright">
                                <div class="input2f">
                                      <?php
                                  $file3 = Auth::user()->attach()->where('status', 1)->where('use_is', 'document1')->first();
                                   ?>
                                   @if($file3)
                                   <a target="_blank" href="{{asset($file3->path)}}">{{ $file3->fileName }}</a>
                                   @endif
                                </div><!--end input2f-->
                            </div>
                            <div class="col-md-6 col-sm-4"></div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->

                  </div><!--end set-form2f-->
                  <div class="box-confirm2f">
                    <div class="box-checkbox2f">
                      <label class="checkbox2f">ข้าพเจ้าขอรับรองว่าข้อมูลที่กรอกข้างต้น  และเอกสารที่แนบมาพร้อมใบสมัครเป็นความจริงทุกประการ  หากมีข้อมูลใดเป็นเท็จหรือไม่ตรงกับความเป็นจริง  ข้าพเจ้ายินยอมให้ถูกตัดสิทธิ์จากการเป็นผู้สมัครหรือผู้ถูกเสนอชื่อในครั้งนี้
                        <input type="checkbox" checked="checked">
                        <span class="checkmark"></span>
                      </label>
                    </div>
                  </div><!--end box-confirm2f-->
                <div class="box-captcha2f">
                      <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                     {!! htmlFormSnippet() !!}
                     @if($errors->has('g-recaptcha-response'))
                     กรุณากดยืนยันตัวก่อนยื่นเอกสาร
                     @endif
                </div>
                  <div class="btn-center2f">
                      <a href="{{ url('/cancel-form') }}" onclick="if(!confirm('ระบบจะไม่บันทึกข้อมูลและกลับไปยังหน้าแรก')) return false" class="btn btn-border confirmed-alert">ยกเลิก</a>
                      <button type="submit" name="button" class="btn btn-green">ยืนยันข้อมูล</button>
                  </div><!--end btn-center2f-->
              </div><!--end content-form2f-->
            </div><!--end container-->
        </div><!--end control-insitepage2f-->

    </div><!--end insitepage2f-->
{!! Form::close() !!}
@endsection

@section('css')

<link href="{{ asset("frontend/css/insitepage.css") }}" rel="stylesheet">
@endsection

@section('js')

@include('frontend.form-professional.global-js')
<script type="text/javascript">

</script>
@endsection
