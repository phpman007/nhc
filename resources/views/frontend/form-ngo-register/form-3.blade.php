@extends('frontend.theme.master')

@section('content')
{!! Form::open() !!}
    <div class="insitepage2f">
        <div class="navication2f">
            <div class="container">
              <ol class="breadcrumb">
                  <li><a href="">หน้าหลัก</a></li>
                  <li><a href="">สมัคร</a></li>
                  <li class="active">ผู้แทนองค์กรภาคเอกชน ขอขึ้นทะเบียนองค์กรภาคเอกชน ขั้นตอนที่ 3</li>
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
                  <h4>ผู้แทนองค์กรภาคเอกชน ขอขึ้นทะเบียนองค์กรภาคเอกชน ขั้นตอนที่ 3</h4>
                  <div class="headform2f">ข้อมูลประกอบการขึ้นทะเบียน</div>
                  <div class="set-form2f">
                    <h5>1. องค์กรฯ ประสงค์ขอขึ้นทะเบียนในกลุ่ม (เลือกได้เพียงหนึ่งกลุ่มเท่านั้น)</h5>
                    <div class="input-radio2f">
                        @foreach(DB::table('ngo_groups')->get() as $key => $item)
                        <div class="box-radio2f">
                              @if($key == 0)
                          {!! Form::radio('ngoGroupId', $item->id, $item->id == Auth::user()->ngoGroupId ? 'checked' : '', ['id' => "group".$key, 'checked' => 1]) !!}
                              @else
                          {!! Form::radio('ngoGroupId', $item->id, $item->id == Auth::user()->ngoGroupId ? 'checked' : '', ['id' => "group".$key]) !!}
                          @endif
                          <label for="group{{$key}}">{{$key+1}}) {{$item->groupName}}</label>
                        </div>
                        @endforeach

                    </div><!--end input-radio2f-->
                    <div class="box-input2f boxremark">
                        <div class="text-input2f nopadding">
                          <strong>หมายเหตุ</strong>   โปรดพิจารณารายละเอียดการจัดกลุ่มกิจกรรมที่เกี่ยวข้องกับสุขภาพ สำหรับองค์กรภาคเอกชนท้ายประกาศฯ  <a href="{{asset('mock/ngo-doc3.pdf')}}" target="_blank" style="font-weight:bold; "><u>รายละเอียดเพิ่มเติม</u></a>
                        </div><!--end text-input2f-->
                    </div><!--end box-input2f-->
                  </div><!--end set-form2f-->
                  <div class="set-form2f">
                      <h5>2. กิจกรรมการดำเนินงานที่เกี่ยวข้องกับสุขภาพในกลุ่มที่ขอขึ้นทะเบียนในพื้นที่จังหวัด 2 กิจกรรม ที่สำคัญในระยะเวลาไม่เกิน 3 ปี มีดังนี้
</h5>
                      <div class="text-titlenumber"><span>กิจกรรมที่  1</span></div>
                      <div class="box-input2f">
                          <div class="row">
                              <div class="col-md-2 col-sm-4 nopaddingright">
                                  <div class="text-input2f textinput02">ชื่อกิจกรรม</div>
                              </div>
                              <div class="col-md-6 col-sm-8">
                                  <div class="input2f">
                                        {!! Form::text('activity1', Auth::user()->detail->activity1, ["class"=>"form-control", "placeholder"=>"ชื่อกิจกรรม", 'maxlength' => '255']) !!}
                                        @if($errors->has("activity1"))
                                        <small>{{ $errors->first('activity1') }}</small>
                                        @endif
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
                                    {!! Form::textarea('detail1', @Auth::user()->detail->detail1, ["rows"=>"4", "cols"=>"40", "class"=>"form-control", "onkeyup"=>"countChar(this, 800, 'charNum-1')",
                                   "placeholder"=>"สรุปผลงานที่สำคัญ"]) !!}
					    ท่านพิมพ์ได้อีก <span id="charNum-1">800</span> ตัวอักษร
                                   @if($errors->has('detail1'))
                                   <small>{{ $errors->first('detail1') }}</small>
                                   @endif
                                  </div>
                              </div>
                          </div><!--end row-->
                      </div><!--end box-input2f-->
                      <div class="text-titlenumber"><span>กิจกรรมที่  2</span></div>
                      <div class="box-input2f">
                          <div class="row">
                              <div class="col-md-2 col-sm-4 nopaddingright">
                                  <div class="text-input2f textinput02">ชื่อกิจกรรม</div>
                              </div>
                              <div class="col-md-6 col-sm-8">
                                  <div class="input2f">
                                        {!! Form::text('activity2', Auth::user()->detail->activity2, ["class"=>"form-control", "placeholder"=>"ชื่อกิจกรรม", 'maxlength' => '255']) !!}

                                        @if($errors->has("activity2"))
                                        <small>{{ $errors->first('activity2') }}</small>
                                        @endif
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
                                        {!! Form::textarea('detail2', @Auth::user()->detail->detail2, ["rows"=>"4", "cols"=>"40", "class"=>"form-control", 'onkeyup'=>"countChar(this, 800, 'charNum-2')",
                                       "placeholder"=>"สรุปผลงานที่สำคัญ"]) !!}
						      ท่านพิมพ์ได้อีก <span id="charNum-2">800</span> ตัวอักษร
                                       @if($errors->has('detail2'))
                                       <small>{{ $errors->first('detail2') }}</small>
                                       @endif
                                  </div>
                              </div>
                          </div><!--end row-->
                      </div><!--end box-input2f-->
                  </div><!--end set-form2f-->
                  <div class="btn-center2f">
			     <a href="{{ url('/form-ngo-register/2') }}" class="btn btn-border">ย้อนกลับ</a>
                      <a href="{{ url('/cancel-form') }}/2/3" onclick="if(!confirm('ระบบจะไม่บันทึกข้อมูลและกลับไปยังหน้าแรก')) return false" class="btn btn-border confirmed-alert">ยกเลิก</a>
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
function countChar(val, set_num, select) {
  var len = val.value.length;
  if (len >= set_num) {
    val.value = val.value.substring(0, set_num);
      $('#' + select).text(0);
  } else {
    $('#' + select).text(set_num - len);
  }
}
countChar($('[name="detail1"]')[0], 800, 'charNum-1')
countChar($('[name="detail2"]')[0], 800, 'charNum-2')
</script>
@endsection
