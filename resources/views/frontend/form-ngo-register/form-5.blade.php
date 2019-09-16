@extends('frontend.theme.master')

@section('content')
{!! Form::open() !!}
    <div class="insitepage2f">
        <div class="navication2f">
            <div class="container">
              <ol class="breadcrumb">
                  <li><a href="">หน้าหลัก</a></li>
                  <li><a href="">สมัคร</a></li>
                  <li><a href="">ผู้แทนองค์กรภาคเอกชน</a></li>
                  <li><a href="">ขอขึ้นทะเบียนองค์กรภาคเอกชน</a></li>
                  <li class="active">ข้อมูลแบบขอขึ้นทะเบียนองค์กรภาคเอกชนขององค์กรท่าน</li>
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
                  <div class="control-progress2f fivestep">
                   <div class="box-line-progress2f">
                       <div class="bg-progress2f"></div>
                       <div class="line-progress2f">
                         <ul>
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
              <div class="content-form2f">
                  <h4>ข้อมูลแบบขอขึ้นทะเบียนองค์กรภาคเอกชนขององค์กรท่าน</h4>
                  <div class="set-form2f">
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f nopadding bold">วัน/เดือน/พ.ศ.</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input2f">
                                  <div class="text-input2f nopadding"> {{ Helper::dateMonthThai(Auth::user()->created_at->addYears('543')->format('d/m/Y')) }}</div>
                                </div>
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
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f nopadding bold">จังหวัดที่ขอขึ้นทะเบียน</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input2f">
                                     <div class="text-input2f nopadding">{{ @DB::table('provinces')->where('province_code',@Auth::user()->provinceId)->first()->province }}</div>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="text-input2f nopadding">
                         ซึ่งเป็นผู้แจ้งรายละเอียดเพื่อขอขึ้นทะเบียนเป็นองค์กรผู้มีสิทธิเสนอชื่อผู้แทนเข้ารับการเลือกเป็นกรรมการสุขภาพแห่งชาติ
                            โดยมีรายละเอียดดังนี้
                        </div><!--end text-input2f-->
                    </div><!--end box-input2f-->
                  </div><!--end set-form2f-->
                  <div class="headform2f">ข้อมูลองค์กรภาคเอกชน</div>
                  <div class="set-form2f">
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f nopadding bold">1.ชื่อองค์กร</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input2f">
                                      <div class="text-input2f nopadding">{{ Auth::user()->detail->ngoName }}</div>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-3 col-sm-4">
                                <div class="text-input2f nopadding bold">2.ประเภทขององค์กร</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                            <div class="input2f">
                                      <div class="text-input2f nopadding">
                                      <?php $optionsArray = ['ไม่เป็นนิติบุคคล' , 'เป็นนิติบุคคล'] ?>
                                      {!! $optionsArray[Auth::user()->detail->legalStastus] !!}
                                     {{ Auth::user()->detail->legalStastus == 1 ? 'ประเภท '. Auth::user()->detail->ngoStatus : '' }}


                                      </div>
                                </div>

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
                                    <div class="text-input2f nopadding">{{ Auth::user()->detail->ngoNo }}</div>

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
                                    <div class="text-input2f nopadding">{{ Auth::user()->detail->ngoMoo }}</div>
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
                                    <div class="text-input2f nopadding">{{ Auth::user()->detail->ngoSoi }}</div>
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
                                    <div class="text-input2f nopadding">{{ Auth::user()->detail->ngoStreet }}</div>
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
                                    <div class="text-input2f nopadding">{{ @DB::table('provinces')->where('district_code',@Auth::user()->detail->ngoSubDistrictID)->first()->district }}</div>

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
                                      <div class="text-input2f nopadding">{{ @DB::table('provinces')->where('amphoe_code',@Auth::user()->detail->ngoDistrictID)->first()->amphoe }}</div>

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
                                    <div class="text-input2f nopadding">{{ @DB::table('provinces')->where('province_code',@Auth::user()->detail->ngoProvincetID)->first()->province }}</div>
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
                                    <div class="text-input2f nopadding">{{ Auth::user()->detail->ngoZipCode }}</div>
                                </div>
                           </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f bold">เบอร์โทรศํพท์</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input2f">
                                  <div class="text-input2f nopadding">{{ Auth::user()->detail->suggestTel }}</div>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f nopadding bold">4.ก่อตั้งองค์กรวันที่</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input2f">
                                      <div class="text-input2f nopadding">{{ Helper::dateMonthThai(Helper::dateToThai(Auth::user()->detail->ngoStartDate)) }}</div>
                                </div><!--end input2f-->
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->

                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-3 col-sm-4 col-xs-12 ">
                                <div class="text-input2f nopadding bold">จำนวนสมาชิกในปัจจุบัน</div>
                            </div>
                            <div class="col-md-1 col-sm-8 col-xs-9">
                                <div class="input2f">
                                    <div class="text-input2f nopadding">{{ Auth::user()->detail->ngoQtyMember }}</div>

                                </div>
                            </div>
                            <div class="col-md-3 col-sm-2 col-xs-3 nopaddingleft">
                                <div class="text-unit2f text-input2f">คน</div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->

                    <div class="box-input2f">
                        <div class="text-input2f nopadding bold">5.วัตถุประสงค์ขององค์กรที่สอดคล้องกับกลุ่มกิจกรรมที่ขอขึ้นทะเบียน</div>
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input2f">
                                    <div class="text-input2f nopadding">{{ Auth::user()->detail->ngoObjective }}</div>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                  </div><!--end set-form2f-->
                  <div class="headform2f">ข้อมูลประกอบการขึ้นทะเบียน</div>
                  <div class="set-form2f">
                    <h5>1. องค์กรฯ ประสงค์ขอขึ้นทะเบียนในกลุ่ม (เลือกได้เพียงหนึ่งกลุ่มเท่านั้น)</h5>
                    <div class="input-radio2f">
                          @foreach(DB::table('ngo_groups')->get() as $key => $item)
				  @if($item->id == Auth::user()->ngoGroupId)
                          <div class="box-radio2f">

                           <div class="text-input2f nopadding"> {{$item->groupName}} </div>
                          </div>
				  @endif
                          @endforeach
                    </div><!--end input-radio2f-->
                    <div class="box-input2f boxremark">
                        <div class="text-input2f nopadding">
                          <strong>หมายเหตุ</strong>   โปรดพิจารณารายละเอียดการจัดกลุ่มกิจกรรมที่เกี่ยวข้องกับสุขภาพ สำหรับองค์กรภาคเอกชนท้ายประกาศฯ
                        </div><!--end text-input2f-->
                    </div><!--end box-input2f-->
                  </div><!--end set-form2f-->
                  <div class="set-form2f">
                      <h5>2. กิจกรรมการดำเนินงานที่เกี่ยวข้องกับสุขภาพในกลุ่มที่ขอขึ้นทะเบียนในพื้นที่จังหวัด  2 กิจกรรมที่สำคัญ ในระยะเวลาไม่เกิน 3 ปี นับถึงวันที่สมัคร (กิจกรรมในระหว่างเดือนสิงหาคม 2559 - ปัจจุบัน)</h5>
                      <div class="text-titlenumber"><span>กิจกรรมที่  1</span></div>
                      <div class="box-input2f">
                          <div class="row">
                              <div class="col-md-2 col-sm-4 nopaddingright">
                                  <div class="text-input2f textinput02 bold">ชื่อกิจกรรม</div>
                              </div>
                              <div class="col-md-6 col-sm-8">
                                  <div class="input2f">
                                      <div class="text-input2f nopadding">{{ Auth::user()->detail->activity1 }}</div>
                                  </div>
                              </div>
                          </div><!--end row-->
                      </div><!--end box-input2f-->
                      <div class="box-input2f">
                          <div class="row">
                              <div class="col-md-2 col-sm-4 nopaddingright">
                                  <div class="text-input2f textinput02 bold">สรุปผลงานที่สำคัญ</div>
                              </div>
                              <div class="col-md-6 col-sm-8">
                                  <div class="input2f">
                                      <div class="text-input2f nopadding">{{ Auth::user()->detail->detail1 }}</div>
                                  </div>
                              </div>
                          </div><!--end row-->
                      </div><!--end box-input2f-->
                      <div class="text-titlenumber"><span>กิจกรรมที่  2</span></div>
                      <div class="box-input2f">
                          <div class="row">
                              <div class="col-md-2 col-sm-4 nopaddingright">
                                  <div class="text-input2f textinput02 bold">ชื่อกิจกรรม</div>
                              </div>
                              <div class="col-md-6 col-sm-8">
                                  <div class="input2f">
                                      <div class="text-input2f nopadding">{{ Auth::user()->detail->activity2 }}</div>
                                  </div>
                              </div>
                          </div><!--end row-->
                      </div><!--end box-input2f-->
                      <div class="box-input2f">
                          <div class="row">
                              <div class="col-md-2 col-sm-4 nopaddingright">
                                  <div class="text-input2f textinput02 bold">สรุปผลงานที่สำคัญ</div>
                              </div>
                              <div class="col-md-6 col-sm-8">
                                  <div class="input2f">
                                      <div class="text-input2f nopadding">{{ Auth::user()->detail->detail2 }}</div>
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
                                <div class="text-input2f nopadding bold">ด้วยองค์กร</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input2f">
                                   <div class="text-input2f nopadding">{{ Auth::user()->detail->byNgo }}</div>
                                </div>
                                <div class="text-underline bold">ได้เสนอ</div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f nopadding bold">ชื่อ</div>
                            </div>
                            <div class="col-md-2 col-sm-3 nopaddingright">
                                <div class="input2f">
                                 <div class="text-input2f nopadding">{{ Auth::user()->nameTitle }}</div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-5">
                                <div class="input2f">
                                      <div class="text-input2f nopadding">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</div>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f nopadding bold">ตำแหน่งสมาชิกในองค์กร</div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="input2f">
                                  <div class="text-input2f nopadding">{{ Auth::user()->detail->suggestPosition }}</div>
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
                    @if(Auth::user()->detail->legalStastus == 1)
                    <p class="green2f"><span class="underline2f">สำหรับองค์กรภาคเอกชนที่เป็นนิติบุคคล</span> ประกอบด้วย</p>
                    @else
                    <p class="green2f"><span class="underline2f">สำหรับกรณีที่องค์กรภาคเอกชนไม่เป็นนิติบุคคล</span> ประกอบด้วย</p>
                    @endif

			  @if(Auth::user()->detail->legalStastus == 1)
			  <!-- html_เป็นนิติ -->
                    <div class="box-input2f">
                        <div class="text-input2f nopadding">สำเนาหนังสือสำคัญที่แสดงความเป็นนิติบุคคล </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-8 nopaddingright">
                                <div class="input2f">
                                  <?php
                                  $file = Auth::user()->attach()->where('status', 1)->where('use_is', 'company_history_copy')->first();
                                   ?>
                                   @if($file)
                                   @if($file->type == "jpg")
                                   <img src="{{asset($file->path)}}" alt="{{ $file->fileName }}" class="img-responsive">
                                   @endif
                                   <small><a target="_blank" href="{{asset($file->path)}}">{{ $file->fileName }}</a></small>
                                   @endif
                                </div><!--end input2f-->
                            </div>
                            <!-- <div class="col-md-6 col-sm-4">
                                <div class="btn-2button">
                                    <div class="fileUpload btn btn-blue">
                                         <span>Upload</span>
                                         <input id="" type="file" class="upload">
                                     </div>
                                     <button type="button" name="button" class="btn btn-purple">ตัวอย่าง</button>
                                </div>
                            </div> -->
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="text-input2f nopadding">สำเนาหลักฐานที่แสดงถึงวัตถุประสงค์การก่อตั้งองค์กร</div>
                        <div class="row">
                            <div class="col-md-6 col-sm-8 nopaddingright">
                                <div class="input2f">
                                  <?php
                                  $file = Auth::user()->attach()->where('status', 1)->where('use_is', 'document_verify_copy')->first();
                                   ?>
                                   @if($file)
                                   @if($file->type == "jpg")
                                   <img src="{{asset($file->path)}}" alt="{{ $file->fileName }}" class="img-responsive">
                                   @endif
                                   <small><a target="_blank" href="{{asset($file->path)}}">{{ $file->fileName }}</a></small>
                                   @endif
                                </div><!--end input2f-->
                            </div>
                            <!-- <div class="col-md-6 col-sm-4">
                                <div class="btn-2button">
                                    <div class="fileUpload btn btn-blue">
                                         <span>Upload</span>
                                         <input id="" type="file" class="upload">
                                     </div>
                                     <button type="button" name="button" class="btn btn-purple">ตัวอย่าง</button>
                                </div>
                            </div> -->
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="text-input2f nopadding">สำเนาหลักฐานซึ่งแสดงถึงการดำเนินกิจกรรมในกลุ่มองค์กรที่ขอขึ้นทะเบียนในพื้นที่จังหวัดมาแล้วไม่เกิน 3 ปี
                          นับถึงวันที่สมัคร จำนวน 2 กิจกรรมขึ้นไป เช่น โครงการ รายงานการดำเนินโครงการ รูปถ่ายกิจกรรมโดยระบุสถานที่จัดกิจกรรม เป็นต้น</div>
                        <div class="row">
                            <div class="col-md-6 col-sm-8 nopaddingright">
                                <div class="input2f">
                                  <?php
                                  $file = Auth::user()->attach()->where('status', 1)->where('use_is', 'company_verify_year')->first();
                                   ?>
                                   @if($file)
                                   @if($file->type == "jpg")
                                   <img src="{{asset($file->path)}}" alt="{{ $file->fileName }}" class="img-responsive">
                                   @endif
                                   <small><a target="_blank" href="{{asset($file->path)}}">{{ $file->fileName }}</a></small>
                                   @endif
                                </div><!--end input2f-->
                            </div>
                            <!-- <div class="col-md-6 col-sm-4">
                                <div class="btn-2button">
                                    <div class="fileUpload btn btn-blue">
                                         <span>Upload</span>
                                         <input id="" type="file" class="upload">
                                     </div>
                                     <button type="button" name="button" class="btn btn-purple">ตัวอย่าง</button>
                                </div>
                            </div> -->
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="text-input2f nopadding">สำเนาคำสั่งแต่งตั้งประธานองค์กรหรือรายงานการประชุมที่ระบุชื่อและตำแหน่งประธานองค์กร</div>
                        <div class="row">
                            <div class="col-md-6 col-sm-8 nopaddingright">
                                <div class="input2f">
                                  <?php
                                  $file = Auth::user()->attach()->where('status', 1)->where('use_is', 'personal_copy')->first();
                                   ?>
                                   @if($file)
                                   @if($file->type == "jpg")
                                   <img src="{{asset($file->path)}}" alt="{{ $file->fileName }}" class="img-responsive">
                                   @endif
                                   <small><a target="_blank" href="{{asset($file->path)}}">{{ $file->fileName }}</a></small>
                                   @endif
                                </div><!--end input2f-->
                            </div>
                            <!-- <div class="col-md-6 col-sm-4">
                                <div class="btn-2button">
                                    <div class="fileUpload btn btn-blue">
                                         <span>Upload</span>
                                         <input id="uploadBtn03" type="file" class="upload">
                                     </div>
                                     <button type="button" name="button" class="btn btn-purple">ตัวอย่าง</button>
                                </div>
                            </div> -->
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="text-input2f nopadding">สำเนาบัตรประจำตัวประชาชนของประธานองค์กร</div>
                        <div class="row">
                            <div class="col-md-6 col-sm-8 nopaddingright">
                                <div class="input2f">
                                  <?php
                                  $file = Auth::user()->attach()->where('status', 1)->where('use_is', 'document_verify_has_company_copy')->first();
                                   ?>
                                   @if($file)
                                   @if($file->type == "jpg")
                                   <img src="{{asset($file->path)}}" alt="{{ $file->fileName }}" class="img-responsive">
                                   @endif
                                   <small><a target="_blank" href="{{asset($file->path)}}">{{ $file->fileName }}</a></small>
                                   @endif
                                </div><!--end input2f-->
                            </div>
                            <!-- <div class="col-md-6 col-sm-4">
                                <div class="btn-2button">
                                    <div class="fileUpload btn btn-blue">
                                         <span>Upload</span>
                                         <input id="" type="file" class="upload">
                                     </div>
                                     <button type="button" name="button" class="btn btn-purple">ตัวอย่าง</button>
                                </div>
                            </div> -->
                        </div><!--end row-->
                    </div><!--end box-input2f-->
			  @else
			  <!-- html_ไม่เป็นนิติ -->
                    <div class="box-input2f">
	                        <div class="text-input2f nopadding">สำเนาหลักฐานที่แสดงถึงวัตถุประสงค์การก่อตั้งองค์กร</div>
                        <div class="row">
                            <div class="col-md-6 col-sm-8 nopaddingright">
                                <div class="input2f">
                                  <?php
                                  $file = Auth::user()->attach()->where('status', 1)->where('use_is', 'company_history_copy')->first();
                                   ?>
                                   @if($file)
                                   @if($file->type == "jpg")
                                   <img src="{{asset($file->path)}}" alt="{{ $file->fileName }}" class="img-responsive">
                                   @endif
                                   <small><a target="_blank" href="{{asset($file->path)}}">{{ $file->fileName }}</a></small>
                                   @endif
                                </div><!--end input2f-->
                            </div>
                            <!-- <div class="col-md-6 col-sm-4">
                                <div class="btn-2button">
                                    <div class="fileUpload btn btn-blue">
                                         <span>Upload</span>
                                         <input id="" type="file" class="upload">
                                     </div>
                                     <button type="button" name="button" class="btn btn-purple">ตัวอย่าง</button>
                                </div>
                            </div> -->
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="text-input2f nopadding">สำเนาหลักฐานซึ่งแสดงถึงการดำเนินกิจกรรมในพื้นที่จังหวัดนั้นตามกลุ่มองค์กรที่ขอขึ้นทะเบียน มาแล้วไม่เกิน 3 ปี นับถึงวันที่สมัคร จำนวน 2 กิจกรรมขึ้นไป เช่น โครงการ รายงานการดำเนินโครงการ รูปถ่ายกิจกรรม โดยระบุสถานที่จัดกิจกรรม เป็นต้น</div>
                        <div class="row">
                            <div class="col-md-6 col-sm-8 nopaddingright">
                                <div class="input2f">
                                  <?php
                                  $file = Auth::user()->attach()->where('status', 1)->where('use_is', 'company_verify_year')->first();
                                   ?>
                                   @if($file)
                                   @if($file->type == "jpg")
                                   <img src="{{asset($file->path)}}" alt="{{ $file->fileName }}" class="img-responsive">
                                   @endif
                                   <small><a target="_blank" href="{{asset($file->path)}}">{{ $file->fileName }}</a></small>
                                   @endif
                                </div><!--end input2f-->
                            </div>
                            <!-- <div class="col-md-6 col-sm-4">
                                <div class="btn-2button">
                                    <div class="fileUpload btn btn-blue">
                                         <span>Upload</span>
                                         <input id="" type="file" class="upload">
                                     </div>
                                     <button type="button" name="button" class="btn btn-purple">ตัวอย่าง</button>
                                </div>
                            </div> -->
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="text-input2f nopadding">สำเนาหนังสือที่แสดงว่าผู้ลงลายมือชื่อในแบบขอขึ้นทะเบียนองค์กรภาคเอกชนเป็นประธาน องค์กร หรือรายงานประชุมที่ระบุชื่อและตำแหน่งประธานองค์กร</div>
                        <div class="row">
                            <div class="col-md-6 col-sm-8 nopaddingright">
                                <div class="input2f">
                                  <?php
                                  $file = Auth::user()->attach()->where('status', 1)->where('use_is', 'document_verify_copy')->first();
                                   ?>
                                   @if($file)
                                   @if($file->type == "jpg")
                                   <img src="{{asset($file->path)}}" alt="{{ $file->fileName }}" class="img-responsive">
                                   @endif
                                   <small><a target="_blank" href="{{asset($file->path)}}">{{ $file->fileName }}</a></small>
                                   @endif
                                </div><!--end input2f-->
                            </div>
                            <!-- <div class="col-md-6 col-sm-4">
                                <div class="btn-2button">
                                    <div class="fileUpload btn btn-blue">
                                         <span>Upload</span>
                                         <input id="" type="file" class="upload">
                                     </div>
                                     <button type="button" name="button" class="btn btn-purple">ตัวอย่าง</button>
                                </div>
                            </div> -->
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="text-input2f nopadding">สำเนาบัตรประจำตัวประชาชนของประธานองค์กร</div>
                        <div class="row">
                            <div class="col-md-6 col-sm-8 nopaddingright">
                                <div class="input2f">
                                  <?php
                                  $file = Auth::user()->attach()->where('status', 1)->where('use_is', 'personal_copy')->first();
                                   ?>
                                   @if($file)
                                   @if($file->type == "jpg")
                                   <img src="{{asset($file->path)}}" alt="{{ $file->fileName }}" class="img-responsive">
                                   @endif
                                   <small><a target="_blank" href="{{asset($file->path)}}">{{ $file->fileName }}</a></small>
                                   @endif
                                </div><!--end input2f-->
                            </div>
                            <!-- <div class="col-md-6 col-sm-4">
                                <div class="btn-2button">
                                    <div class="fileUpload btn btn-blue">
                                         <span>Upload</span>
                                         <input id="uploadBtn03" type="file" class="upload">
                                     </div>
                                     <button type="button" name="button" class="btn btn-purple">ตัวอย่าง</button>
                                </div>
                            </div> -->
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="text-input2f nopadding">หนังสือรับรองความมีอยู่และการดำเนินกิจกรรมขององค์กรภาคเอกชนที่ไม่เป็นนิติบุคคล</div>
                        <div class="row">
                            <div class="col-md-6 col-sm-8 nopaddingright">
                                <div class="input2f">
                                  <?php
                                  $file = Auth::user()->attach()->where('status', 1)->where('use_is', 'document_verify_has_company_copy')->first();
                                   ?>
                                   @if($file)
                                   @if($file->type == "jpg")
                                   <img src="{{asset($file->path)}}" alt="{{ $file->fileName }}" class="img-responsive">
                                   @endif
                                   <small><a target="_blank" href="{{asset($file->path)}}">{{ $file->fileName }}</a></small>
                                   @endif
                                </div><!--end input2f-->
                            </div>
                            <!-- <div class="col-md-6 col-sm-4">
                                <div class="btn-2button">
                                    <div class="fileUpload btn btn-blue">
                                         <span>Upload</span>
                                         <input id="" type="file" class="upload">
                                     </div>
                                     <button type="button" name="button" class="btn btn-purple">ตัวอย่าง</button>
                                </div>
                            </div> -->
                        </div><!--end row-->
                    </div><!--end box-input2f-->
			  @endif
                  </div><!--end set-form2f-->
                  <div class="set-form2f" style="display:none">

                    <p class="green2f"><span class="underline2f">สำหรับกรณีที่องค์กรภาคเอกชนไม่เป็นนิติบุคคล</span> ประกอบด้วย</p>

                    <div class="box-input2f">
                        <div class="text-input2f nopadding">สำเนาหลักฐานที่แสดงถึงวัตถุประสงค์การก่อตั้งองค์กร</div>
                        <div class="row">
                            <div class="col-md-6 col-sm-8 nopaddingright">
                                <div class="input2f">
                                </div><!--end input2f-->
                            </div>
                            <!-- <div class="col-md-6 col-sm-4">
                                <div class="btn-2button">
                                    <div class="fileUpload btn btn-blue">
                                         <span>Upload</span>
                                         <input id="uploadBtn01" type="file" class="upload">
                                     </div>
                                     <button type="button" name="button" class="btn btn-purple">ตัวอย่าง</button>
                                </div>
                            </div> -->
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="text-input2f nopadding">สำเนาหลักฐานซึ่งแสดงถึงการดำเนินกิจกรรมในกลุ่มองค์กรที่ขอขึ้นทะเบียนในพื้นที่จังหวัด มาแล้วไม่น้อยกว่า 3 ปี นับถึงวันที่สมัคร
                          จำนวน 2 กิจกรรมขึ้นไป เช่น โครงการ รายงานการดำเนินโครงการ รูปถ่ายกิจกรรม โดยระบุสถานที่จัดกิจกรรม เป็นต้น</div>
                        <div class="row">
                            <div class="col-md-6 col-sm-8 nopaddingright">
                                <div class="input2f">
                                </div><!--end input2f-->
                            </div>
                            <!-- <div class="col-md-6 col-sm-4">
                                <div class="btn-2button">
                                    <div class="fileUpload btn btn-blue">
                                         <span>Upload</span>
                                         <input id="" type="file" class="upload">
                                     </div>
                                     <button type="button" name="button" class="btn btn-purple">ตัวอย่าง</button>
                                </div>
                            </div> -->
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="text-input2f nopadding">สำเนาหนังสือที่แสดงว่าผู้ลงลายมือชื่อในแบบขอขึ้นทะเบียนองค์กรภาคเอกชนฯเป็นประธาน องค์กร หรือรายงานประชุมที่มีชื่อประธานองค์กร</div>
                        <div class="row">
                            <div class="col-md-6 col-sm-8 nopaddingright">
                                <div class="input2f">
                                </div><!--end input2f-->
                            </div>
                            <!-- <div class="col-md-6 col-sm-4">
                                <div class="btn-2button">
                                    <div class="fileUpload btn btn-blue">
                                         <span>Upload</span>
                                         <input id="" type="file" class="upload">
                                     </div>
                                     <button type="button" name="button" class="btn btn-purple">ตัวอย่าง</button>
                                </div>
                            </div> -->
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
                            <!-- <div class="col-md-6 col-sm-4">
                                <div class="btn-2button">
                                    <div class="fileUpload btn btn-blue">
                                         <span>Upload</span>
                                         <input id="" type="file" class="upload">
                                     </div>
                                     <button type="button" name="button" class="btn btn-purple">ตัวอย่าง</button>
                                </div>
                            </div> -->
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
                            <!-- <div class="col-md-6 col-sm-4">
                                <div class="btn-2button">
                                    <div class="fileUpload btn btn-blue">
                                         <span>Upload</span>
                                         <input id="" type="file" class="upload">
                                     </div>
                                     <button type="button" name="button" class="btn btn-purple">ตัวอย่าง</button>
                                </div>
                            </div> -->
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                  </div><!--end set-form2f-->
                  <div class="box-confirm2f">
                    <div class="box-checkbox2f">
                      <label class="checkbox2f">ข้าพเจ้าขอรับรองว่าข้อมูลที่กรอกข้างต้น  และเอกสารที่แนบมาพร้อมแบบขอขึ้นทะเบียนองค์กรภาคเอกชนเป็นความจริงทุกประการ
                        หากมีข้อมูลใดเป็นเท็จหรือไม่ตรงกับความเป็นจริง  ข้าพเจ้ายินยอมให้ถูกตัดสิทธิ์จากการเป็นผู้สมัครหรือผู้ถูกเสนอชื่อในครั้งนี้
                        <input type="checkbox" checked>
                        <span class="checkmark"></span>
                      </label>
                    </div>
                  </div><!--end box-confirm2f-->

                <div class="box-captcha2f">
                    <div class="row">
                          <div class="col-sm-4"></div>
                          <div class="col-sm-4">
                              <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                                 @if($errors->has('g-recaptcha-response'))
                                 กรุณากดยืนยันตัวก่อนยื่นเอกสาร
                                 @endif
                          </div>
                    </div>

                </div>
                  <div class="btn-center2f">

				<a href="{{ url('/form-ngo-register') }}/4" class="btn btn-border">ย้อนกลับ</a>
                      <a href="{{ url('/cancel-form') }}/2/5" onclick="if(!confirm('ระบบจะไม่บันทึกข้อมูลและกลับไปยังหน้าแรก')) return false" class="btn btn-border confirmed-alert">ยกเลิก</a>
                      <button type="submit" name="button" class="btn btn-green">ยืนยันการขึ้นทะเบียน</button>
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

      $('input, radio').attr("disabled", 'true');
      $('[name="captcha"]').removeAttr('disabled');
</script>
@endsection
