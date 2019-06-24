@extends('frontend.theme.master')

@section('content')
{!! Form::open() !!}
    <div class="insitepage2f">
        <div class="navication2f">
            <div class="container">
              <ol class="breadcrumb">
                  <li><a href="">หน้าหลัก</a></li>
                  <li><a href="">สมัคร</a></li>
                  <li class="active">ผู้แทนองค์กรปกครองส่วนท้องถิ่น สมัครสมาชิก ขั้นตอนที่ 4</li>
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
              <div class="content-form2f">
                  <h4>ผู้แทนองค์กรปกครองส่วนท้องถิ่น สมัครสมาชิก ขั้นตอนที่ 4</h4>
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
                                      {!! Form::text('nameTitle', Auth::user()->nameTitle, ['class'=>"form-control", 'placeholder'=>"นาย/นาง/นางสาว", 'readonly' => '']) !!}
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
                                      {!! Form::text('firstname', Auth::user()->firstname, ['class'=>"form-control", 'placeholder'=>"ชื่อ", 'readonly' => '']) !!}
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
                                      {!! Form::text('firstname', Auth::user()->lastname, ['class'=>"form-control", 'placeholder'=>"นามสกุล", 'readonly' => '']) !!}
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
                                <div class="box-date input-group date">
                                  {{ Form::text('dateOfBirth', null, ['class'=> 'form-control date-picker', 'id' => 'date-birdth', 'readonly'=>'', 'placeholder'=>'วัน/เดือน/พ.ศ.']) }}

                                  <span class="input-group-addon"><img src="{{asset("frontend/images/icon-calendar-gray.svg")}}" alt="" data-pin-nopin="true"></span>
                                  @if($errors->has('dateOfBirth'))
                                  <small>{{ $errors->first('dateOfBirth') }}</small>
                                  @endif
                                </div><!--end input_form-->
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
                                  <input readonly="" type="text" id="yearOld" name="yearOld" value="{{ !empty(@Auth::user()->detail->yearOld) ? @Auth::user()->detail->yearOld : old('yearOld') }}" class="form-control" placeholder="อายุ">
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
                                          {{ Form::radio('addressType', 1, @Auth::user()->detail->addressType == 1 ? "checked" :'checked', ['id'=>'home']) }}
                                          <label for="home">บ้าน</label>
                                        </div>
                                        <div class="box-radio2f">
                                          {{ Form::radio('addressType', 2, @Auth::user()->detail->addressType == 1 ? "checked" :'', ['id'=>'office']) }}
                                          <label for="office">ที่ทำงาน</label>
                                        </div>
                                        <div class="input2f width65per">
                                           {!! Form::text('workPlaceName', @Auth::user()->detail->workPlaceName, ["class"=>"form-control" ,"placeholder"=>"สถานที่ทำงาน"]) !!}
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
                                      {!! Form::text('no', @Auth::user()->detail->no, ["class"=>"form-control" ,"placeholder"=>"เลขที่"]) !!}
                                     @if($errors->has('no'))
                                     <small>{{ $errors->first('no') }}</small>
                                     @endif
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
                                      {!! Form::text('moo', @Auth::user()->detail->moo, ["class"=>"form-control" ,"placeholder"=>"หมู่ที่"]) !!}
                                     @if($errors->has('moo'))
                                     <small>{{ $errors->first('moo') }}</small>
                                     @endif
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
                                      {!! Form::text('soi', @Auth::user()->detail->soi, ["class"=>"form-control" ,"placeholder"=>"ซอย"]) !!}
                                    @if($errors->has('soi'))
                                    <small>{{ $errors->first('soi') }}</small>
                                    @endif
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
                                      {!! Form::text('street', @Auth::user()->detail->street, ["class"=>"form-control" ,"placeholder"=>"ถนน"]) !!}
                                     @if($errors->has('street'))
                                     <small>{{ $errors->first('street') }}</small>
                                     @endif
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
                                      {!! Form::text('zipCode',  Auth::user()->detail->zipCode , ["class"=>"form-control" , "placeholder"=>"รหัสไปรษณีย์"]) !!}
                                 @if($errors->has('zipCode'))
                                 <small>{{ $errors->first('zipCode') }}</small>
                                 @endif
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
                                      {!! Form::text('provinceName', @DB::table('provinces')->where('province_code',Auth::user()->detail->provinceId)->first()->province, ['class'=>'form-control', 'placeholder' => 'จังหวัด', 'id'=>'provinceName', 'readonly'=>'']) !!}
                                      {!! Form::hidden('provinceId', Auth::user()->detail->provinceId, ['id'=>'provinceId']) !!}
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
                                        {!! Form::text('districtName', @DB::table('provinces')->where('amphoe_code',Auth::user()->detail->districtId)->first()->amphoe, ['class'=>'form-control', 'placeholder' => 'อำเภอ', 'id'=>'districtName', 'readonly'=>'']) !!}
                                        {!! Form::hidden('districtId', Auth::user()->detail->districtId, ['id'=>'districtId']) !!}
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

                                      {!! Form::text('subDistrictName', @DB::table('provinces')->where('district_code',Auth::user()->detail->subDistrictId)->first()->district, ['class'=>'form-control', 'placeholder' => 'ตำบล/แขวง', 'id'=>'subDistrictName', 'readonly'=>'']) !!}

                                      {!! Form::hidden('subDistrictId', Auth::user()->detail->subDistrictId, ['id'=>'subDistrictId']) !!}
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
                                      {!! Form::text('tel', Auth::user()->detail->tel , ['class'=>'form-control', 'placeholder'=> 'โทรศํพท์']) !!}
                                      @if($errors->has('tel'))
                                  <small>{{ $errors->first('tel') }}</small>
                                  @endif
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
                                     {!! Form::text('mobile', Auth::user()->detail->mobile, [ 'class'=>"form-control", 'placeholder'=>"โทรศัพท์เคลื่อนที่(มือถือ)"]) !!}
                                     @if($errors->has('mobile'))
                                 <small>{{ $errors->first('mobile') }}</small>
                                 @endif
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
                                      {!! Form::text('graduated1', Auth::user()->detail->graduated1, [ 'class'=>"form-control", 'placeholder'=>"วุฒิการศึกษา"]) !!}
                                      @if($errors->has('graduated1'))
                                  <small>{{ $errors->first('graduated1') }}</small>
                                  @endif
                                </div>
                            </div>
                            <div class="col-md-1 col-sm-4 col-xs-1 nopadding text-major">
                              <div class="text-input2f nopadding">สาขา</div>
                            </div>
                            <div class="col-md-3 col-sm-8 col-xs-11">
                                <div class="input2f">
                                    {!! Form::text('faculty1', Auth::user()->detail->faculty1, [ 'class'=>"form-control", 'placeholder'=>"สาขา"]) !!}
                                    @if($errors->has('faculty1'))
                                <small>{{ $errors->first('faculty1') }}</small>
                                @endif
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
                                    {!! Form::text('graduated2', Auth::user()->detail->graduated2, [ 'class'=>"form-control", 'placeholder'=>"วุฒิการศึกษา"]) !!}
                              </div>
                          </div>
                          <div class="col-md-1 col-sm-4 col-xs-1 nopadding text-major">
                            <div class="text-input2f nopadding">สาขา</div>
                          </div>
                          <div class="col-md-3 col-sm-8 col-xs-11">
                              <div class="input2f">
                                    {!! Form::text('faculty2', Auth::user()->detail->faculty2, [ 'class'=>"form-control", 'placeholder'=>"สาขา"]) !!}
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
                                    {!! Form::text('graduated3', Auth::user()->detail->graduated3, [ 'class'=>"form-control", 'placeholder'=>"วุฒิการศึกษา"]) !!}
                              </div>
                          </div>
                          <div class="col-md-1 col-sm-4 col-xs-1 nopadding text-major">
                            <div class="text-input2f nopadding">สาขา</div>
                          </div>
                          <div class="col-md-3 col-sm-8 col-xs-11">
                              <div class="input2f">
                                    {!! Form::text('faculty3', Auth::user()->detail->faculty3, [ 'class'=>"form-control", 'placeholder'=>"สาขา"]) !!}
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
                                    {!! Form::text('graduated4', Auth::user()->detail->graduated4, [ 'class'=>"form-control", 'placeholder'=>"วุฒิการศึกษา"]) !!}
                              </div>
                          </div>
                          <div class="col-md-1 col-sm-4 col-xs-1 nopadding text-major">
                            <div class="text-input2f nopadding">สาขา</div>
                          </div>
                          <div class="col-md-3 col-sm-8 col-xs-11">
                              <div class="input2f">
                                    {!! Form::text('faculty4', Auth::user()->detail->faculty4, [ 'class'=>"form-control", 'placeholder'=>"สาขา"]) !!}
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
                                    {!! Form::text('graduated5', Auth::user()->detail->graduated5, [ 'class'=>"form-control", 'placeholder'=>"วุฒิการศึกษา"]) !!}
                              </div>
                          </div>
                          <div class="col-md-1 col-sm-4 col-xs-1 nopadding text-major">
                            <div class="text-input2f nopadding">สาขา</div>
                          </div>
                          <div class="col-md-3 col-sm-8 col-xs-11">
                              <div class="input2f">
                                    {!! Form::text('faculty5', Auth::user()->detail->faculty5, [ 'class'=>"form-control", 'placeholder'=>"สาขา"]) !!}
                              </div>
                          </div>
                      </div><!--end row-->
                    </div><!--end box-input2f-->
                    <h5>๓. ผลงาน หรือประสบการณ์ที่ดำเนินงานเกี่ยวกับด้านสุขภาพ</h5>
                    <div class="box-input2f">
                      <div class="input2f">
                           {!! Form::textarea('portfolio', Auth::user()->detail->portfolio, ["rows"=>"5", "cols"=>"50", "class"=>"form-control", "placeholder"=>"ผลงาน หรือประสบการณ์ที่ดำเนินงานเกี่ยวกับด้านสุขภาพ"]) !!}
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
                                      {!! Form::text('pastWork1',  Auth::user()->detail->pastWork1, ["class"=>"form-control", "placeholder"=>"ตำแหน่ง"]) !!}
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
                                      {!! Form::text('pastOrganization1',  Auth::user()->detail->pastOrganization1, ["class"=>"form-control", "placeholder"=>"หน่วยงาน"]) !!}
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
                                       {!! Form::text('time1',  Auth::user()->detail->time1, ["class"=>"form-control", "placeholder"=>"ระยะเวลาการปฏิบัติหน้าที่"]) !!}
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
                                      {!! Form::text('pastWork2',  Auth::user()->detail->pastWork2, ["class"=>"form-control", "placeholder"=>"ตำแหน่ง"]) !!}
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
                                      {!! Form::text('pastOrganization2',  Auth::user()->detail->pastOrganization2, ["class"=>"form-control", "placeholder"=>"หน่วยงาน"]) !!}
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
                                    {!! Form::text('time2',  Auth::user()->detail->time2, ["class"=>"form-control", "placeholder"=>"ระยะเวลาการปฏิบัติหน้าที่"]) !!}
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
                                      {!! Form::text('pastWork3',  Auth::user()->detail->pastWork3, ["class"=>"form-control", "placeholder"=>"ตำแหน่ง"]) !!}
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
                                      {!! Form::text('pastOrganization3',  Auth::user()->detail->pastOrganization3, ["class"=>"form-control", "placeholder"=>"หน่วยงาน"]) !!}
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
                                      {!! Form::text('time3',  Auth::user()->detail->time3, ["class"=>"form-control", "placeholder"=>"ระยะเวลาการปฏิบัติหน้าที่"]) !!}
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="headlineform2f">
                      <h5>๕. วาระการดำรงตำแหน่งในองค์กรปกครองส่วนท้องถิ่น (ปัจจุบัน)</h5>
                      <div class="input2f width200 input-center">

                                 {!! Form::text('roleTimeLeft',  Auth::user()->detail->roleTimeLeft, ["class"=>"form-control", "placeholder"=>"ปี"]) !!}
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
                                <div class="box-date input-group date">
                                    {!! Form::text('startDate',  null, ["class"=>"form-control date-picker", "placeholder"=>"วัน/เดือน/พ.ศ.", "readonly" =>""]) !!}
                                  <span class="input-group-addon"><img src="{{asset("frontend/images/icon-calendar-gray.svg")}}" alt="" data-pin-nopin="true"></span>
                                </div><!--end input_form-->
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
                                <div class="box-date input-group date">
                                      {!! Form::text('endDate',  null, ["class"=>"form-control date-picker", "placeholder"=>"วัน/เดือน/พ.ศ.", "readonly" =>""]) !!}
                                  <span class="input-group-addon"><img src="{{asset("frontend/images/icon-calendar-gray.svg")}}" alt="" data-pin-nopin="true"></span>
                                </div><!--end input_form-->
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->

                  </div><!--end set-form2f-->
                  <div class="btn-center2f">
                      <button type="button" name="button" class="btn btn-border"><img src="images/left-arrow-gray.svg" alt="">ย้อนกลับ</button>
                      <button type="submit" name="button" class="btn btn-green">บันทึก</button>
                      <button type="button" name="button" class="btn btn-border">หน้าถัดไป<img src="images/right-arrow-gray.svg" alt=""></button>
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
$(document).ready(function() {
      $("#date-birdth").on('change', function(event) {
        event.preventDefault();
        $.get('{{ url('api/checkYear') }}?date=' + $(this).val() , function(data) {
          console.log(data);
          $('#yearOld').val(data.old)
        });
      });
      @if(!empty(Auth::user()->detail->dateOfBirth))
		setTimeout(function () {
			$('[name="dateOfBirth"]').datepicker('update','{{ Carbon\Carbon::createFromFormat("Y-m-d",Auth::user()->detail->dateOfBirth)->format('d/m/Y') }}')
		}, 500);
		// $('#date-birdth').datepicker('update', '{{ Carbon\Carbon::createFromFormat("Y-m-d",Auth::user()->detail->dateOfBirth)->format('d/m/Y') }}');
	@endif
});

</script>
@endsection