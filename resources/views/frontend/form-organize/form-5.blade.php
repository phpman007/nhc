@extends('frontend.theme.master')

@section('content')
{!! Form::open(['id' => 'form-step']) !!}

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
                        <li><span>&nbsp;</span></li>
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
                               <div class="control-select-date2f">
                                   <div class="row">
                                       <div class="col-md-3 col-sm-3 col-xs-2 nopaddingright">
                                           <div class="input2f">
                                                 <?php

                                                 $sday = array();
                                                 for($i = 1; $i <= 31; $i++) {
                                                       $sday[$i] = $i;
                                                 }
                                                  ?>
                                                  @if(!empty(Auth::user()->detail->dateOfBirth))
                                                 {!! Form::select('sday', $sday, Carbon\Carbon::parse(Auth::user()->detail->dateOfBirth)->format("d"), [ "class"=>"form-control"]) !!}
                                                  @else
                                                 {!! Form::select('sday', $sday, null, [ "class"=>"form-control"]) !!}
                                                 @endif
                                           </div>
                                       </div>
                                       <div class="col-md-5 col-sm-6 col-xs-6 nopaddingright">
                                           <div class="input2f">
                                             <?php
                                             $month = [
                                               '1' => "มกราคม",
                                                "2"=>   "กุมภาพันธ์",
                                                "3"=>  "มีนาคม",
                                                "4"=>  "เมษายน",
                                                "5"=>  "พฤษภาคม",
                                                "6"=>  "มิถุนายน",
                                                "7"=>  "กรกฎาคม",
                                                "8"=>  "สิงหาคม",
                                                "9"=>  "กันยายน",
                                                "10"=>  "ตุลาคม",
                                                "11"=>  "พฤษจิกายน",
                                                "12"=>  "ธันวาคม",
                                             ];
                                              ?>
                                              @if(!empty(Auth::user()->detail->dateOfBirth))
                                             {!! Form::select('smonth', $month, (int)Carbon\Carbon::parse(Auth::user()->detail->dateOfBirth)->format("m"), [ "class"=>"form-control"]) !!}
                                              @else
                                             {!! Form::select('smonth', $month, null, [ "class"=>"form-control"]) !!}
                                             @endif
                                           </div>
                                       </div>
                                       <div class="col-md-4 col-sm-3 col-xs-4 nopaddingright">
                                           <div class="input2f">
                                             <?php

                                             $syear = array();
                                             for($i = (date('Y')); $i >= (date('Y')-115); $i--) {
                                                   $syear[$i+543] = $i+543;
                                             }
                                              ?>
                                              @if(!empty(Auth::user()->detail->dateOfBirth))
                                             {!! Form::select('syear', $syear, (int)Carbon\Carbon::parse(Auth::user()->detail->dateOfBirth)->format("Y") +543, [ "class"=>"form-control"]) !!}
                                              @else
                                             {!! Form::select('syear', $syear, null, [ "class"=>"form-control"]) !!}
                                             @endif
                                           </div>
                                       </div>
                                   </div><!--end row-->
                                   @if($errors->has('dateOfBirth'))
                                   <small>{{ $errors->first('dateOfBirth') }}</small>
                                   @endif
                               </div><!--end control-select-date2f-->
                           </div>
                           <!-- <div class="col-md-6 col-sm-8">
                                <div class="box-date input-group date">
                                  {{ Form::text('dateOfBirth', null, ['class'=> 'form-control date-picker', 'id' => 'date-birdth', 'readonly'=>'', 'placeholder'=>'วัน/เดือน/พ.ศ.']) }}

                                  <span class="input-group-addon"><img src="{{asset("frontend/images/icon-calendar-gray.svg")}}" alt="" data-pin-nopin="true"></span>
                                  @if($errors->has('dateOfBirth'))
                                  <small>{{ $errors->first('dateOfBirth') }}</small>
                                  @endif
                                </div>
                           </div> -->
                       </div><!--end row-->
                   </div><!--end box-input2f-->
                   <div class="box-input2f">
                       <div class="row">
                           <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f">อาย(ปี)ุ</div>
                           </div>
                           <div class="col-md-6 col-sm-8">
                                <div class="input2f">
                                  <input readonly="" type="text" id="yearOld" name="yearOld" value="{{ !empty(@Auth::user()->detail->yearOld) ? @Auth::user()->detail->yearOld : old('yearOld') }}" class="form-control" placeholder="อายุ">
                                  <div class="t-notice">กรรมการสุขภาพแห่งชาติจะต้องมีอายุไม่ต่ำกว่า 20 ปี บริบูรณ์  </div>
                                  @if($errors->has('yearOld'))
                                  <small>{{ $errors->first('yearOld') }}</small>
                                  @endif

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
                                      {!! Form::text('no', @Auth::user()->detail->no, ["class"=>"form-control" ,"placeholder"=>"เลขที่", 'maxlength' => 7]) !!}
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
                                <div class="text-input2f">จังหวัด</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input2f">
                                      <?php $provide = \DB::table('provinces')->select('province', 'province_code')->groupBy('province', 'province_code')->get()->pluck('province', 'province_code') ?>
                                     {!! Form::select('provinceId', $provide, null, ['class'=>'form-control select2', 'placeholder' => 'จังหวัด', 'id'=>'provinceId']) !!}
                                     @if($errors->has('provinceId'))
                                    <small>{{ $errors->first('provinceId') }}</small>
                                    @endif
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
                                         {!! Form::select('districtId', [], null, ['class'=>'form-control select2', 'placeholder' => 'อำเภอ/เขต', 'id'=>'districtId']) !!}
                                         @if($errors->has('districtId'))
                                       <small>{{ $errors->first('districtId') }}</small>
                                       @endif
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

                                     {!! Form::select('subDistrictId', [], null, ['class'=>'form-control select2', 'placeholder' => 'ตำบล/แขวง', 'id'=>'subDistrictId']) !!}
                                     @if($errors->has('subDistrictId'))
                                   <small>{{ $errors->first('subDistrictId') }}</small>
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
                                <div class="text-input2f">โทรศัพท์</div>
                           </div>
                           <div class="col-md-4 col-sm-6">
                                <div class="input2f">
                                      {!! Form::text('tel', Auth::user()->detail->tel , ['class'=>'form-control', 'placeholder'=> 'โทรศํพท์', 'id'=>'tel']) !!}
                                      @if($errors->has('tel'))
                                  <small>{{ $errors->first('tel') }}</small>
                                  @endif
                                </div>
                           </div>
                           <div class="col-md-2 col-sm-2">
                               <div class="input2f">
                                     <?php $tel_slarp = substr(Auth::user()->detail->tel, 9) ?>
                                   {!! Form::text('tel_slarp', $tel_slarp , ['id'=>'tel','class'=>'form-control', 'placeholder'=> 'ต่อ']) !!}
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
                              <div class="text-input2f">โทรศัพท์มือถือ</div>
                           </div>
                           <div class="col-md-6 col-sm-8">
                              <div class="input2f">
                                     {!! Form::text('mobile', Auth::user()->detail->mobile, [ 'class'=>"form-control", 'placeholder'=>"โทรศัพท์เคลื่อนที่(มือถือ)", 'id' =>'mobile']) !!}
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
                           {!! Form::textarea('portfolio', Auth::user()->detail->portfolio, ["rows"=>"5", "cols"=>"50", "id" => "target1", "class"=>"form-control", "placeholder"=>"ผลงาน หรือประสบการณ์ที่ดำเนินงานเกี่ยวกับด้านสุขภาพ"]) !!}
                            @if($errors->has('portfolio'))
                                  <small>{{ $errors->first('portfolio') }}</small>
                                  @endif
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
                                      @if($errors->has('pastWork1'))
                                  <small>{{ $errors->first('pastWork1') }}</small>
                                  @endif
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
                                      @if($errors->has('pastOrganization1'))
                                  <small>{{ $errors->first('pastOrganization1') }}</small>
                                  @endif
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
                                       @if($errors->has('time1'))
                                  <small>{{ $errors->first('time1') }}</small>
                                  @endif
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
                                 @if($errors->has('roleTimeLeft'))
                                  <small>{{ $errors->first('roleTimeLeft') }}</small>
                                  @endif
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
                                  <div class="row">
                                      <div class="col-md-3 col-sm-3 col-xs-2 nopaddingright">
                                          <div class="input2f">
                                                 @if(!empty(Auth::user()->detail->startDate))
                                                {!! Form::select('stday', $sday, Carbon\Carbon::parse(Auth::user()->detail->startDate)->format("d"), [ "class"=>"form-control"]) !!}
                                                 @else
                                                {!! Form::select('stday', $sday, null, [ "class"=>"form-control"]) !!}
                                                @endif
                                          </div>
                                      </div>
                                      <div class="col-md-5 col-sm-6 col-xs-6 nopaddingright">
                                          <div class="input2f">
                                            @if(!empty(Auth::user()->detail->startDate))
                                           {!! Form::select('stmonth', $month, (int)Carbon\Carbon::parse(Auth::user()->detail->startDate)->format("m"), [ "class"=>"form-control"]) !!}
                                            @else
                                           {!! Form::select('stmonth', $month, null, [ "class"=>"form-control"]) !!}
                                           @endif
                                          </div>
                                      </div>
                                      <div class="col-md-4 col-sm-3 col-xs-4 nopaddingright">
                                          <div class="input2f">
                                            @if(!empty(Auth::user()->detail->startDate))
                                           {!! Form::select('styear', $syear, (int)Carbon\Carbon::parse(Auth::user()->detail->startDate)->format("Y") +543, [ "class"=>"form-control"]) !!}
                                            @else
                                           {!! Form::select('styear', $syear, null, [ "class"=>"form-control"]) !!}
                                           @endif
                                          </div>
                                      </div>
                                  </div><!--end row-->
                                  @if($errors->has('startDate'))
                                  <small>{{ $errors->first('startDate') }}</small>
                                  @endif
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
                                  <div class="row">
                                      <div class="col-md-3 col-sm-3 col-xs-2 nopaddingright">
                                          <div class="input2f">
                                                 @if(!empty(Auth::user()->detail->endDate))
                                                {!! Form::select('etday', $sday, Carbon\Carbon::parse(Auth::user()->detail->endDate)->format("d"), [ "class"=>"form-control"]) !!}
                                                 @else
                                                {!! Form::select('etday', $sday, null, [ "class"=>"form-control"]) !!}
                                                @endif
                                          </div>
                                      </div>
                                      <div class="col-md-5 col-sm-6 col-xs-6 nopaddingright">
                                          <div class="input2f">
                                            @if(!empty(Auth::user()->detail->endDate))
                                           {!! Form::select('etmonth', $month, (int)Carbon\Carbon::parse(Auth::user()->detail->endDate)->format("m"), [ "class"=>"form-control"]) !!}
                                            @else
                                           {!! Form::select('etmonth', $month, null, [ "class"=>"form-control"]) !!}
                                           @endif
                                          </div>
                                      </div>
                                      <div class="col-md-4 col-sm-3 col-xs-4 nopaddingright">
                                          <div class="input2f">
                                          @if(!empty(Auth::user()->detail->endDate))
                                         {!! Form::select('etyear', $syear, (int)Carbon\Carbon::parse(Auth::user()->detail->endDate)->format("Y") +543, [ "class"=>"form-control"]) !!}
                                          @else
                                         {!! Form::select('etyear', $syear, null, [ "class"=>"form-control"]) !!}
                                         @endif
                                          </div>
                                      </div>
                                  </div><!--end row-->
                                  @if($errors->has('endDate'))
                                  <small>{{ $errors->first('endDate') }}</small>
                                  @endif
                                </div><!--end input_form-->
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->

                  </div><!--end set-form2f-->
                  <div class="btn-center2f">
                       <a href="{{ url('/cancel-form') }}" class="btn btn-border confirmed-alert">ยกเลิก</a>
                      <button type="submit" name="button" class="btn btn-green">บันทึก</button>
                      <!-- <button type="button" name="button" class="btn btn-border">หน้าถัดไป<img src="images/right-arrow-gray.svg" alt=""></button> -->
                  </div><!--end btn-center2f-->
              </div><!--end content-form2f-->
            </div><!--end container-->
        </div><!--end control-insitepage2f-->

    </div><!--end insitepage2f-->

{!! Form::close() !!}
@endsection


@section('js')
@include('frontend.form-professional.global-js')
<script type="text/javascript">
$(document).ready(function() {

  @if(!empty(Auth::user()->detail->dateOfBirth))
  setTimeout(function () {
      $('[name="sday"]').trigger('change')
  }, 500);

  @endif
        $("#tel").mask('0-0-000-0000')
        $("#mobile").mask('00-0000-0000');

        $(document).on('change', '#provinceId', function(event) {
             $.getJSON('/api/getDistrict', {provinceId: $(this).val()}, function(json, textStatus) {
                           $("#districtId").html('');
                                    $("#subDistrictId").html('');
                       $("#districtId").select2({data:json, placeholder: "อำเภอ/เขต"});

                           $('#districtId').trigger('change');
             });
        });

        $(document).on('change', '#districtId', function(event) {
             $.getJSON('/api/getSubDistrict', {districtId: $(this).val()}, function(json, textStatus) {
                      $("#subDistrictId").html('');
                       $("#subDistrictId").select2({data:json, placeholder: "ตำบล/แขวง"})
             });
        })
        @if(!empty(old('provinceId', @Auth::user()->detail->provinceId)))
        $("#provinceId").val({{old('provinceId', @Auth::user()->detail->provinceId)}}).trigger('change');
        $.getJSON('/api/getDistrict', {provinceId: "{{old('provinceId', @Auth::user()->detail->provinceId)}}"}, function(json, textStatus) {
                      $("#districtId").html('');
                      $("#subDistrictId").html('');
                $("#districtId").select2({data:json, placeholder: "อำเภอ/เขต"});
                $("#districtId").val({{old('districtId', @Auth::user()->detail->districtId)}}).trigger('change');
        });
                @if(!empty(old('districtId', @Auth::user()->detail->districtId)))
                setTimeout(function () {
                      $.getJSON('/api/getSubDistrict', {districtId: "{{old('districtId', @Auth::user()->detail->districtId)}}"}, function(json, textStatus) {
                              $("#subDistrictId").html('');
                              $("#subDistrictId").select2({data:json, placeholder: "ตำบล/แขวง"})
                              $("#subDistrictId").val({{old('subDistrictId', @Auth::user()->detail->subDistrictId)}}).trigger('change');
                      });
                }, 50);
                @endif
        @endif


        $('[name="sday"], [name="smonth"], [name="syear"]').on('change', function(event) {
              $.get('{{ url('api/checkYear') }}?date=' + $("[name='sday']").val() + "/"+ $("[name='smonth']").val() + "/" + (parseInt($("[name='syear']").val()) ) , function(data) {
                  console.log(data);
                  $('#yearOld').val(data.old)
              });
        });
      @if(!empty(Auth::user()->detail->dateOfBirth))
		setTimeout(function () {
			$('[name="dateOfBirth"]').datepicker('update','{{ Carbon\Carbon::createFromFormat("Y-m-d",Auth::user()->detail->dateOfBirth)->format('d/m/Y') }}');

                  $('[name="startDate"]').datepicker('update','{{ Carbon\Carbon::createFromFormat("Y-m-d",Auth::user()->detail->startDate)->format('d/m/Y') }}');
                  $('[name="endDate"]').datepicker('update','{{ Carbon\Carbon::createFromFormat("Y-m-d",Auth::user()->detail->endDate)->format('d/m/Y') }}');

                  $.get('{{ url('api/checkYear') }}?date=' + $('[name="dateOfBirth"]').val() , function(data) {
                    console.log(data);
                    $('#yearOld').val(data.old)
                  });
		}, 500);

		// $('#date-birdth').datepicker('update', '{{ Carbon\Carbon::createFromFormat("Y-m-d",Auth::user()->detail->dateOfBirth)->format('d/m/Y') }}');
	@endif
      $("[name='zipCode']").on('keyup', function(event) {
		// var _zipcode = $(this).val();
            //
		// $.getJSON('{{ url('api/get_address') }}', {zipcode: _zipcode}, function(json, textStatus) {
		// 		console.log(json)
		// 		address = json
		// 		if(address[0] != null) {
		// 			// จังหวัด
		// 			address = address[0];
		// 			$("#provinceName").val(address.province);
		// 			$("#provinceId").val(address.province_code);
		// 			// อำเภอ
		// 			$("#districtName").val(address.amphoe);
		// 			$("#districtId").val(address.amphoe_code);
		// 			// ตำบล
		// 			$("#subDistrictName").val(address.district);
		// 			$("#subDistrictId").val(address.district_code);
		// 		} else {
		// 			// จังหวัด
		// 			$("#provinceName").val("");
		// 			$("#provinceId").val("");
		// 			// อำเภอ
		// 			$("#districtName").val("");
		// 			$("#districtId").val("");
		// 			// ตำบล
		// 			$("#subDistrictName").val("");
		// 			$("#subDistrictId").val("");
		// 		}
		// });
	});
});
$(document).ready(function() {
      $('#form-step').on('submit', function(event) {
            event.preventDefault();

            if($("#tel").val() == "" || $("#mobile").val() == "") {
                  Swal.fire({
                    title: 'ระบบแจ้งเตือน',
                    text: "ท่านไม่ได้ระบุหมายเลขโทรศัพท์ ต้องการทำรายการต่อหรือไม่",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'ตกลง'
                  }).then((result) => {
                    if (result.value) {
                          $('#form-step')[0].submit();
                    }
                  })
            }else {
                 $('#form-step')[0].submit();
            }

      })
});

</script>
@endsection
