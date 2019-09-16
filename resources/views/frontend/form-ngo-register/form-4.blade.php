@extends('frontend.theme.master')

@section('content')
<style media="screen">
.modal-loading {
display:    none;
position:   fixed;
z-index:    1000;
top:        0;
left:       0;
height:     100%;
width:      100%;
background: rgba( 255, 255, 255, .8 )
           url('{{asset('frontend/images/loading.gif')}}')
           50% 50%
           no-repeat;
}

.content-form2f .text-input2f {
    padding-left: 0px;
}
/* When the body has the loading class, we turn
the scrollbar off with overflow:hidden */
body.loading .modal-loading {
overflow: hidden;
}

/* Anytime the body has the loading class, our
modal element will be visible */
body.loading .modal-loading {
display: block;
}
</style>
{!! Form::open(['files' => true, 'id' => 'form-step']) !!}
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
              <div class="control-progress2f fivestep">
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
                                      {!! Form::text('byNgo', Auth::user()->detail->ngoName, ["class"=>"form-control", "placeholder"=>"ด้วยองค์กร"]) !!}
                                      @if($errors->has("byNgo"))
                                      <small>{{ $errors->first('byNgo') }}</small>
                                      @endif
                                </div>
                                <div class="text-underline">ได้เสนอ</div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f nopadding">คำนำหน้า</div>
                            </div>
                            <div class="col-md-6 col-sm-8 nopaddingright">
                                <div class="input2f">
                                      {!! Form::text('nameTitle', Auth::user()->nameTitle, ["class"=>"form-control", "placeholder"=>"คำนำหน้า"]) !!}
                                      @if($errors->has("nameTitle"))
                                      <small>{{ $errors->first('nameTitle') }}</small>
                                      @endif
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
                                  {!! Form::text('firstname', Auth::user()->firstname, ["class"=>"form-control", "placeholder"=>"ชื่อ"]) !!}
                                  @if($errors->has("firstname"))
                                  <small>{{ $errors->first('firstname') }}</small>
                                  @endif
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 nopaddingright">
                                <div class="text-input2f nopadding">สกุล</div>
                            </div>

                            <div class="col-md-6 col-sm-8">
                                <div class="input2f">
                                  {!! Form::text('lastname', Auth::user()->lastname, ["class"=>"form-control", "placeholder"=>" นามสกุล"]) !!}
                                  @if($errors->has("lastname"))
                                  <small>{{ $errors->first('lastname') }}</small>
                                  @endif
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
                                      {!! Form::text('suggestPosition', Auth::user()->detail->suggestPosition, ["class"=>"form-control", "placeholder"=>"ตำแหน่งสมาชิกในองค์กร"]) !!}
                                     @if($errors->has("suggestPosition"))
                                     <small>{{ $errors->first('suggestPosition') }}</small>
                                     @endif

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
    ข้อมูลที่กรอกข้างต้นเป็นความจริงทุกประการ  หากมีข้อมูลใดเป็นเท็จหรือไม่ตรงกับความเป็นจริง ข้าพเจ้ายินยอมให้ถูกตัดสิทธิ์จากการเป็นผู้สมัครหรือผู้ถูกเสนอชื่อในครั้งนี้

                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <h5>ทั้งนี้   ข้าพเจ้าได้ยื่นแบบขอขึ้นทะเบียนองค์กรและยืนยันการส่งผู้แทนองค์กรภาคเอกชน พร้อมเอกสารหลักฐานประกอบการขอขึ้นทะเบียน มาพร้อมนี้</h5>
                    <p class="green2f"><span class="underline2f">
                          @if(Auth::user()->detail->legalStastus == 1)
                          สำเนาหนังสือสำคัญที่แสดงความเป็นนิติบุคคล
                          @else
                          สำหรับองค์กรภาคเอกชนที่ไม่เป็นนิติบุคคล
                          @endif
                    </span> ประกอบด้วย</p>

			  @if(Auth::user()->detail->legalStastus == 1)
			  <!-- html_เป็นนิติ -->
                    <div class="box-input2f">
                        <div class="text-input2f nopadding">
					สำเนาหนังสือสำคัญที่แสดงความเป็นนิติบุคคล

                        </div>
                        <div class="row">
					<div class="col-md-12">
					  <div class="t-notice">* สามารถอัพโหลดไฟล์ .jpg ไฟล์ที่อัพโหลดจะถูก resize หากมีขนาดมากกว่าที่กำหนด (1024 พิกเซล)
					หรือ .pdf เท่านั้น ไฟล์ PDF ไม่ควรมีขนาดเกิน 20 mb </div>
					</div>
                            <div class="col-md-6 col-sm-8 nopaddingright">
                                <div class="input2f">
                                  <input id="uploadFile01" class="form-control" placeholder="">
                                  <?php
                                  $file = Auth::user()->attach()->where('status', 1)->where('use_is', 'company_history_copy')->first();
                                   ?>
                                   @if($file)
                                   @if($file->type == "jpg")
                                   <img src="{{asset($file->path)}}" alt="{{ $file->fileName }}" class="img-responsive">
                                   @endif
                                   <small><a target="_blank" href="{{asset($file->path)}}">{{ $file->fileName }}</a> | <a onclick="if(!confirm('ต้องการทำรายการหรือไม่?')) return false" href="{{ url('asset/remove/'. $file->id) }}">ลบ</a></small>
                                   @endif
                                   @if($errors->has('file1'))
                                   <small>{{ $errors->first('file1') }}</small>
                                   @endif
                                </div><!--end input2f-->
                            </div>
                            <div class="col-md-6 col-sm-4">
                                <div class="btn-2button">
                                    <div class="fileUpload btn btn-blue">
                                         <span>เลือกไฟล์</span>
                                         <input id="file1" name="file1" type="file" class="upload">
                                     </div>
                                </div><!--end btn-2button-->
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
			  <div class="box-input2f">
                        <div class="text-input2f nopadding">สำเนาหลักฐานที่แสดงถึงวัตถุประสงค์การก่อตั้งองค์กร</div>
                        <div class="row">
					<div class="col-md-12">
					  <div class="t-notice">* สามารถอัพโหลดไฟล์ .jpg ไฟล์ที่อัพโหลดจะถูก resize หากมีขนาดมากกว่าที่กำหนด (1024 พิกเซล)
หรือ .pdf เท่านั้น ไฟล์ PDF ไม่ควรมีขนาดเกิน 20 mb </div>
					</div>
                            <div class="col-md-6 col-sm-8 nopaddingright">
                                <div class="input2f">
                                  <input id="uploadFile03" class="form-control" placeholder="">

                                  <?php
                                  $file = Auth::user()->attach()->where('status', 1)->where('use_is', 'document_verify_copy')->first();
                                   ?>
                                   @if($file)
                                   @if($file->type == "jpg")
                                   <img src="{{asset($file->path)}}" alt="{{ $file->fileName }}" class="img-responsive">
                                   @endif
                                   <small><a target="_blank" href="{{asset($file->path)}}">{{ $file->fileName }}</a> | <a onclick="if(!confirm('ต้องการทำรายการหรือไม่?')) return false" href="{{ url('asset/remove/'. $file->id) }}">ลบ</a></small>
                                   @endif
                                   @if($errors->has('file3'))
                                   <small>{{ $errors->first('file3') }}</small>
                                   @endif
                                </div><!--end input2f-->
                            </div>
                            <div class="col-md-6 col-sm-4">
                                <div class="btn-2button">
                                    <div class="fileUpload btn btn-blue">
                                         <span>เลือกไฟล์</span>
                                         <input id="file3" name="file3" type="file" class="upload">
                                     </div>
                                </div><!--end btn-2button-->
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="text-input2f nopadding">สำเนาหลักฐานซึ่งแสดงถึงการดำเนินกิจกรรมในพื้นที่จังหวัดนั้นตามกลุ่มองค์กรที่ขอขึ้นทะเบียน มาแล้วไม่เกิน 3 ปี นับถึงวันที่สมัคร จำนวน 2 กิจกรรมขึ้นไป เช่น โครงการ รายงานการดำเนินโครงการ รูปถ่ายกิจกรรมโดยระบุสถานที่จัดกิจกรรม เป็นต้น</div>
                        <div class="row">
					<div class="col-md-12">
					  <div class="t-notice">* สามารถอัพโหลดไฟล์ .jpg ไฟล์ที่อัพโหลดจะถูก resize หากมีขนาดมากกว่าที่กำหนด (1024 พิกเซล)
หรือ .pdf เท่านั้น ไฟล์ PDF ไม่ควรมีขนาดเกิน 20 mb </div>
					</div>
                            <div class="col-md-6 col-sm-8 nopaddingright">
                                <div class="input2f">
                                  <input id="uploadFile02" class="form-control" placeholder="">

                                  <?php
                                  $file = Auth::user()->attach()->where('status', 1)->where('use_is', 'company_verify_year')->first();
                                   ?>
                                   @if($file)
                                   @if($file->type == "jpg")
                                   <img src="{{asset($file->path)}}" alt="{{ $file->fileName }}" class="img-responsive">
                                   @endif
                                   <small><a target="_blank" href="{{asset($file->path)}}">{{ $file->fileName }}</a> | <a onclick="if(!confirm('ต้องการทำรายการหรือไม่?')) return false" href="{{ url('asset/remove/'. $file->id) }}">ลบ</a></small>
                                   @endif
                                   @if($errors->has('file2'))
                                   <small>{{ $errors->first('file2') }}</small>
                                   @endif

                                </div><!--end input2f-->
                            </div>
                            <div class="col-md-6 col-sm-4">
                                <div class="btn-2button">
                                    <div class="fileUpload btn btn-blue">
                                         <span>เลือกไฟล์</span>
                                         <input id="file2" name="file2" type="file" class="upload">
                                     </div>
                                </div><!--end btn-2button-->
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->

                    <div class="box-input2f">
                        <div class="text-input2f nopadding">สำเนาคำสั่งแต่งตั้งประธานองค์กรหรือรายงานการประชุมที่ระบุชื่อและตำแหน่งประธานองค์กร</div>
                        <div class="row">
					<div class="col-md-12">
					  <div class="t-notice">* สามารถอัพโหลดไฟล์ .jpg ไฟล์ที่อัพโหลดจะถูก resize หากมีขนาดมากกว่าที่กำหนด (1024 พิกเซล)
หรือ .pdf เท่านั้น ไฟล์ PDF ไม่ควรมีขนาดเกิน 20 mb </div>
					</div>
                            <div class="col-md-6 col-sm-8 nopaddingright">
                                <div class="input2f">
                                  <input id="uploadFile04" class="form-control" placeholder="">

                                  <?php
                                  $file = Auth::user()->attach()->where('status', 1)->where('use_is', 'personal_copy')->first();
                                   ?>
                                   @if($file)
                                   @if($file->type == "jpg")
                                   <img src="{{asset($file->path)}}" alt="{{ $file->fileName }}" class="img-responsive">
                                   @endif
                                   <small><a target="_blank" href="{{asset($file->path)}}">{{ $file->fileName }}</a> | <a onclick="if(!confirm('ต้องการทำรายการหรือไม่?')) return false" href="{{ url('asset/remove/'. $file->id) }}">ลบ</a></small>
                                   @endif
                                   @if($errors->has('file4'))
                                   <small>{{ $errors->first('file4') }}</small>
                                   @endif
                                </div><!--end input2f-->
                            </div>
                            <div class="col-md-6 col-sm-4">
                                <div class="btn-2button">
                                    <div class="fileUpload btn btn-blue">
                                         <span>เลือกไฟล์</span>
                                         <input id="file4" name="file4" type="file" class="upload">
                                     </div>
                                </div><!--end btn-2button-->
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="text-input2f nopadding">
                              สำเนาบัตรประจำตัวประชาชนของประธานองค์กร
                        </div>
                        <div class="row">
					<div class="col-md-12">
					  <div class="t-notice">* สามารถอัพโหลดไฟล์ .jpg ไฟล์ที่อัพโหลดจะถูก resize หากมีขนาดมากกว่าที่กำหนด (1024 พิกเซล)
หรือ .pdf เท่านั้น ไฟล์ PDF ไม่ควรมีขนาดเกิน 20 mb </div>
					</div>
                            <div class="col-md-6 col-sm-8 nopaddingright">
                                <div class="input2f">
                                  <input id="uploadFile05" class="form-control" placeholder="">
                                 
                                  <?php
                                  $file = Auth::user()->attach()->where('status', 1)->where('use_is', 'document_verify_has_company_copy')->first();
                                   ?>
                                   @if($file)
                                   @if($file->type == "jpg")
                                   <img src="{{asset($file->path)}}" alt="{{ $file->fileName }}" class="img-responsive">
                                   @endif
                                   <small><a target="_blank" href="{{asset($file->path)}}">{{ $file->fileName }}</a> | <a onclick="if(!confirm('ต้องการทำรายการหรือไม่?')) return false" href="{{ url('asset/remove/'. $file->id) }}">ลบ</a></small>
                                   @endif
                                   @if($errors->has('file5'))
                                  <small>{{ $errors->first('file5') }}</small>
                                  @endif
                                </div><!--end input2f-->
                            </div>
                            <div class="col-md-6 col-sm-4">
                                <div class="btn-2button">
                                    <div class="fileUpload btn btn-blue">
                                         <span>เลือกไฟล์</span>
                                         <input id="file5" name="file5" type="file" class="upload">
                                     </div>
                                </div><!--end btn-2button-->
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
			  <!-- END_HTML_เป็น นิติ -->

			  @else
			  <!-- HTML_ไม่เป็นนิติ -->
			  <div class="box-input2f">
                        <div class="text-input2f nopadding">
					สำเนาหลักฐานที่แสดงถึงวัตถุประสงค์การก่อตั้งองค์กร
                        </div>
                        <div class="row">
					<div class="col-md-12">
					  <div class="t-notice">* สามารถอัพโหลดไฟล์ .jpg ไฟล์ที่อัพโหลดจะถูก resize หากมีขนาดมากกว่าที่กำหนด (1024 พิกเซล)
หรือ .pdf เท่านั้น ไฟล์ PDF ไม่ควรมีขนาดเกิน 20 mb </div>
					</div>
                            <div class="col-md-6 col-sm-8 nopaddingright">
                                <div class="input2f">
                                  <input id="uploadFile01" class="form-control" placeholder="">

                                  <?php
                                  $file = Auth::user()->attach()->where('status', 1)->where('use_is', 'company_history_copy')->first();
                                   ?>
                                   @if($file)
                                   @if($file->type == "jpg")
                                   <img src="{{asset($file->path)}}" alt="{{ $file->fileName }}" class="img-responsive">
                                   @endif
                                   <small><a target="_blank" href="{{asset($file->path)}}">{{ $file->fileName }}</a> | <a onclick="if(!confirm('ต้องการทำรายการหรือไม่?')) return false" href="{{ url('asset/remove/'. $file->id) }}">ลบ</a></small>
                                   @endif
                                   @if($errors->has('file1'))
                                   <small>{{ $errors->first('file1') }}</small>
                                   @endif
                                </div><!--end input2f-->
                            </div>
                            <div class="col-md-6 col-sm-4">
                                <div class="btn-2button">
                                    <div class="fileUpload btn btn-blue">
                                         <span>เลือกไฟล์</span>
                                         <input id="file1" name="file1" type="file" class="upload">
                                     </div>
                                </div><!--end btn-2button-->
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="text-input2f nopadding">สำเนาหลักฐานซึ่งแสดงถึงกิจกรรมการดำเนินงานที่เกี่ยวข้องกับสุขภาพในกลุ่มที่ขอขึ้นทะเบียนในพื้นที่จังหวัด 2
กิจกรรมที่สำคัญในระยะเวลาไม่เกิน 3 ปีนับถึงวันที่สมัคร(กิจกรรมในระหว่างเดือนสิงหาคม 2559 - ปัจจุบัน) เช่น โครงการ รายงานการดำเนินโครงการ รูปถ่ายกิจกรรม โดยระบุสถานที่จัดกิจกรรม เป็นต้น</div>
                        <div class="row">
					<div class="col-md-12">
					  <div class="t-notice">* สามารถอัพโหลดไฟล์ .jpg ไฟล์ที่อัพโหลดจะถูก resize หากมีขนาดมากกว่าที่กำหนด (1024 พิกเซล)
หรือ .pdf เท่านั้น ไฟล์ PDF ไม่ควรมีขนาดเกิน 20 mb </div>
					</div>
                            <div class="col-md-6 col-sm-8 nopaddingright">
                                <div class="input2f">
                                  <input id="uploadFile02" class="form-control" placeholder="">

                                  <?php
                                  $file = Auth::user()->attach()->where('status', 1)->where('use_is', 'company_verify_year')->first();
                                   ?>
                                   @if($file)
                                   @if($file->type == "jpg")
                                   <img src="{{asset($file->path)}}" alt="{{ $file->fileName }}" class="img-responsive">
                                   @endif
                                   <small><a target="_blank" href="{{asset($file->path)}}">{{ $file->fileName }}</a> | <a onclick="if(!confirm('ต้องการทำรายการหรือไม่?')) return false" href="{{ url('asset/remove/'. $file->id) }}">ลบ</a></small>
                                   @endif
                                   @if($errors->has('file2'))
                                   <small>{{ $errors->first('file2') }}</small>
                                   @endif

                                </div><!--end input2f-->
                            </div>
                            <div class="col-md-6 col-sm-4">
                                <div class="btn-2button">
                                    <div class="fileUpload btn btn-blue">
                                         <span>เลือกไฟล์</span>
                                         <input id="file2" name="file2" type="file" class="upload">
                                     </div>
                                </div><!--end btn-2button-->
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="text-input2f nopadding">สำเนาหนังสือที่แสดงว่าผู้ลงลายมือชื่อในแบบขอขึ้นทะเบียนองค์กรภาคเอกชนเป็นประธาน องค์กร หรือรายงานประชุมที่ระบุชื่อและตำแหน่งประธานองค์กร</div>
                        <div class="row">
					<div class="col-md-12">
					  <div class="t-notice">* สามารถอัพโหลดไฟล์ .jpg ไฟล์ที่อัพโหลดจะถูก resize หากมีขนาดมากกว่าที่กำหนด (1024 พิกเซล)
หรือ .pdf เท่านั้น ไฟล์ PDF ไม่ควรมีขนาดเกิน 20 mb </div>
					</div>
                            <div class="col-md-6 col-sm-8 nopaddingright">
                                <div class="input2f">
                                  <input id="uploadFile03" class="form-control" placeholder="">

                                  <?php
                                  $file = Auth::user()->attach()->where('status', 1)->where('use_is', 'document_verify_copy')->first();
                                   ?>
                                   @if($file)
                                   @if($file->type == "jpg")
                                   <img src="{{asset($file->path)}}" alt="{{ $file->fileName }}" class="img-responsive">
                                   @endif
                                   <small><a target="_blank" href="{{asset($file->path)}}">{{ $file->fileName }}</a> | <a onclick="if(!confirm('ต้องการทำรายการหรือไม่?')) return false" href="{{ url('asset/remove/'. $file->id) }}">ลบ</a></small>
                                   @endif
                                   @if($errors->has('file3'))
                                   <small>{{ $errors->first('file3') }}</small>
                                   @endif
                                </div><!--end input2f-->
                            </div>
                            <div class="col-md-6 col-sm-4">
                                <div class="btn-2button">
                                    <div class="fileUpload btn btn-blue">
                                         <span>เลือกไฟล์</span>
                                         <input id="file3" name="file3" type="file" class="upload">
                                     </div>
                                </div><!--end btn-2button-->
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="text-input2f nopadding">สำเนาบัตรประจำตัวประชาชนของประธานองค์กร</div>
                        <div class="row">
					<div class="col-md-12">
					  <div class="t-notice">* สามารถอัพโหลดไฟล์ .jpg ไฟล์ที่อัพโหลดจะถูก resize หากมีขนาดมากกว่าที่กำหนด (1024 พิกเซล)
หรือ .pdf เท่านั้น ไฟล์ PDF ไม่ควรมีขนาดเกิน 20 mb </div>
					</div>
                            <div class="col-md-6 col-sm-8 nopaddingright">
                                <div class="input2f">
                                  <input id="uploadFile04" class="form-control" placeholder="">

                                  <?php
                                  $file = Auth::user()->attach()->where('status', 1)->where('use_is', 'personal_copy')->first();
                                   ?>
                                   @if($file)
                                   @if($file->type == "jpg")
                                   <img src="{{asset($file->path)}}" alt="{{ $file->fileName }}" class="img-responsive">
                                   @endif
                                   <small><a target="_blank" href="{{asset($file->path)}}">{{ $file->fileName }}</a> | <a onclick="if(!confirm('ต้องการทำรายการหรือไม่?')) return false" href="{{ url('asset/remove/'. $file->id) }}">ลบ</a></small>
                                   @endif
                                   @if($errors->has('file4'))
                                   <small>{{ $errors->first('file4') }}</small>
                                   @endif
                                </div><!--end input2f-->
                            </div>
                            <div class="col-md-6 col-sm-4">
                                <div class="btn-2button">
                                    <div class="fileUpload btn btn-blue">
                                         <span>เลือกไฟล์</span>
                                         <input id="file4" name="file4" type="file" class="upload">
                                     </div>
                                </div><!--end btn-2button-->
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
                    <div class="box-input2f">
                        <div class="text-input2f nopadding">
                              หนังสือรับรองความมีอยู่และการดำเนินกิจกรรมขององค์กรภาคเอกชนที่ไม่เป็นนิติบุคคล
                        </div>
                        <div class="row">
					<div class="col-md-12">
					  <div class="t-notice">* สามารถอัพโหลดไฟล์ .jpg ไฟล์ที่อัพโหลดจะถูก resize หากมีขนาดมากกว่าที่กำหนด (1024 พิกเซล)
หรือ .pdf เท่านั้น ไฟล์ PDF ไม่ควรมีขนาดเกิน 20 mb </div>
					</div>
                            <div class="col-md-6 col-sm-8 nopaddingright">
                                <div class="input2f">
                                  <input id="uploadFile05" class="form-control" placeholder="">

                                  <?php
                                  $file = Auth::user()->attach()->where('status', 1)->where('use_is', 'document_verify_has_company_copy')->first();
                                   ?>
                                   @if($file)
                                   @if($file->type == "jpg")
                                   <img src="{{asset($file->path)}}" alt="{{ $file->fileName }}" class="img-responsive">
                                   @endif
                                   <small><a target="_blank" href="{{asset($file->path)}}">{{ $file->fileName }}</a> | <a onclick="if(!confirm('ต้องการทำรายการหรือไม่?')) return false" href="{{ url('asset/remove/'. $file->id) }}">ลบ</a></small>
                                   @endif
                                   @if($errors->has('file5'))
                                  <small>{{ $errors->first('file5') }}</small>
                                  @endif
                                </div><!--end input2f-->
                            </div>
                            <div class="col-md-6 col-sm-4">
                                <div class="btn-2button">
                                    <div class="fileUpload btn btn-blue">
                                         <span>เลือกไฟล์</span>
                                         <input id="file5" name="file5" type="file" class="upload">
                                     </div>
                                </div><!--end btn-2button-->
                            </div>
                        </div><!--end row-->
                    </div><!--end box-input2f-->
			  <!-- END_HTML_ไม่เป็นนิติ -->
			  @endif
                  </div><!--end set-form2f-->
                  <div class="box-confirm2f">
                    <div class="box-checkbox2f">
                      <label class="checkbox2f">ข้าพเจ้าขอรับรองว่าข้อมูลที่กรอกข้างต้น  และเอกสารที่แนบมาพร้อมแบบขอขึ้นทะเบียนองค์กรภาคเอกชนเป็นความจริงทุกประการ
                        หากมีข้อมูลใดเป็นเท็จหรือไม่ตรงกับความเป็นจริง  ข้าพเจ้ายินยอมให้ถูกตัดสิทธิ์จากการเป็นผู้สมัครหรือผู้ถูกเสนอชื่อในครั้งนี้
                        <input type="checkbox" id="accept">
                        <span class="checkmark"></span>
                      </label>
                                                    <small id="valid-check" style="display:none;">โปรดคลิกรับรองข้อมูลที่กรอกข้างต้นฯ ก่อนกดตรวจทานเอกสาร</small>
                    </div>
                  </div>
                  <div class="btn-center2f">
			     <a href="{{ url('/form-ngo-register/3') }}" class="btn btn-border">ย้อนกลับ</a>
                      <a href="{{ url('/cancel-form') }}/2/4" onclick="if(!confirm('ระบบจะไม่บันทึกข้อมูลและกลับไปยังหน้าแรก')) return false" class="btn btn-border confirmed-alert">ยกเลิก</a>
                      <button type="submit"  id="submit-btn" name="button" class="btn btn-green disabled">ตรวจทานเอกสาร</button>
                  </div><!--end btn-center2f-->
              </div><!--end content-form2f-->
            </div><!--end container-->
        </div><!--end control-insitepage2f-->

    </div><!--end insitepage2f-->
{!! Form::close() !!}
@if($errors->any())
<div class="modal" id="myModal">
 <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">แจ้งเตือน</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
          <ul>
               @foreach ($errors->all() as $key =>$error)
                   <li> {{ $error }}</li>
               @endforeach
            </ul>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
 </div>
</div>
@endif
<div class="modal-loading"><!-- Place at bottom of page --></div>
@endsection



@section('js')

@include('frontend.form-professional.global-js')
<script type="text/javascript">
var filename;
$('#file1, #file2, #file3, #file4, #file5').bind('change', function(e) {
	var element = $(this);
	  var kb = parseInt(this.files[0].size / 1024);
	  var mb = kb / 1024;
	  if(mb > 20) {
		  Swal.fire	('แจ้งเตือน', 'ไม่สามารถอัพโหลดไฟล์ที่เลือกได้เนื่องจากไฟล์มีขนาดใหญ่เกินกว่าที่กำหนด <br> <span style="color:red">ควรอัพไฟล์ไม่เกินกว่า 20mb</span>', 'info');
		  element.val('');
	  }

});
document.getElementById('file1').onchange = function () {
	filename = this.value.split(String.fromCharCode(92));
	document.getElementById("uploadFile01").value = filename[filename.length-1];
};
var filename;
document.getElementById('file2').onchange = function () {
	filename = this.value.split(String.fromCharCode(92));
	document.getElementById("uploadFile02").value = filename[filename.length-1];
};
var filename;
document.getElementById('file3').onchange = function () {
	filename = this.value.split(String.fromCharCode(92));
	document.getElementById("uploadFile03").value = filename[filename.length-1];
};
var filename;
document.getElementById('file4').onchange = function () {
	filename = this.value.split(String.fromCharCode(92));
	document.getElementById("uploadFile04").value = filename[filename.length-1];
};
var filename;
document.getElementById('file5').onchange = function () {
	filename = this.value.split(String.fromCharCode(92));
	document.getElementById("uploadFile05").value = filename[filename.length-1];
};
</script>

<script type="text/javascript">
jQuery(document).ready(function($) {
     $(function($) {
	     setTimeout(function () {
	     	$("#accept").trigger('change')
	     }, 200);
          $('#accept').on('change', function(event) {
                event.preventDefault();
                if($(this).is(":checked")) {
                          $("#submit-btn").removeClass('disabled')
                } else {
                          $("#submit-btn").addClass('disabled',"disabled")
                }
          });
          $('#form-step').on('submit', function(e) {
               e.preventDefault()
               if($('#accept').is(":checked")) {
                    $("#valid-check").hide();
                    $('#form-step')[0].submit();
               } else {
                    $("#valid-check").show();
                    setTimeout(function () {
                         $('body').removeClass('loading')
                    }, 500);

               }

          })
     })
     @if($errors->any())
     $('#myModal').modal('show')
     @endif
      $('#form-step').on('submit', function(event) {
           $('body').addClass('loading')
      })
});
</script>
@endsection
