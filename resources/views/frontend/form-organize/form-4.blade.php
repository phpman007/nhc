@extends('frontend.theme.master')

@section('content')
{!! Form::open(['files' => true]) !!}
    <div class="insitepage2f">
        <div class="navication2f">
            <div class="container">
              <ol class="breadcrumb">
                  <li><a href="">หน้าหลัก</a></li>
                  <li><a href="">สมัคร</a></li>
                  <li class="active">ผู้แทนองค์กรปกครองส่วนท้องถิ่น สมัครสมาชิก ขั้นตอนที่ 3</li>
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
                  <h4>ผู้แทนองค์กรปกครองส่วนท้องถิ่น สมัครสมาชิก ขั้นตอนที่ 3</h4>
                  <div class="set-form2f">
                      <h5>ข้าพเจ้ามีความประสงค์ที่จะสมัครเป็นกรรมการสุขภาพแห่งชาติจากผู้แทนองค์กรปกครองส่วนท้องถิ่นในกลุ่ม</h5>
                      <div class="input-radio2f">
                           @foreach(DB::table('organization_groups')->get() as $key => $organize)
                          <div class="box-radio2f">
                            @if($key == 0 )
                            {!! Form::radio('organizationGroupId', $organize->id, Auth::user()->organizationGroupId == $organize->id, ['id' => 'group'.$key, 'checked' =>'' ]) !!}
                            @else
                            {!! Form::radio('organizationGroupId', $organize->id, Auth::user()->organizationGroupId == $organize->id, ['id' => 'group'.$key ]) !!}
                            @endif
                            <label for="group{{$key}}">{{ $organize->groupName  }}</label>
                          </div>
                          @endforeach
                      </div>
                  </div><!--end set-form2f-->
                  <div class="set-form2f">
                    <h5>ทั้งนี้ ข้าพเจ้าได้แนบสำเนาเอกสารหรือหลักฐานที่แนบมาพร้อมใบสมัคร</h5>
                    <div class="box-input2f">
                        <div class="text-input2f nopadding">สำเนาบัตรประจำตัวข้าราชการที่แสดงการดำรงตำแหน่งนายกองค์กรปกครองส่วนท้องถิ่นอยู่ ณ วันที่ยื่นใบสมัคร</div>
                        <div class="row">
                            <div class="col-md-6 col-sm-8 nopaddingright">
                                <div class="input2f">
                                  <input id="uploadFile01" class="form-control" placeholder="สำเนาบัตรประจำตัวข้าราชการ">
                                  <?php
                                  $file = Auth::user()->attach()->where('status', 1)->where('use_is', 'government_official_card')->first();
                                   ?>
                                   @if($file)
                                   <small><a target="_blank" href="{{asset($file->path)}}">{{ $file->newName }}</a></small> | <a onclick="if(!confirm('ต้องการทำรายการหรือไม่?')) return false" href="{{ url('asset/remove/'. $file->id) }}">ลบ</a>
                                   @endif
                                </div><!--end input2f-->
                                @if($errors->has('file_ref'))
                                  <small>{{ $errors->first('file_ref') }}</small>
                                @endif
                            </div>
                            <div class="col-md-6 col-sm-4">
                                <div class="btn-2button">
                                    <div class="fileUpload btn btn-blue">
                                         <span>Upload</span>
                                         {!! Form::file('file_ref', ["class"=>"upload", "id"=>"uploadBtn01"]) !!}

                                     </div>
                                </div><!--end btn-2button-->
                            </div>
                        </div><!--end row-->
                    </div>
                  </div><!--end set-form2f-->
                  <div class="btn-center2f">
                       <a href="{{ url('/cancel-form') }}" onclick="if(!confirm('ระบบจะไม่บันทึกข้อมูลและกลับไปยังหน้าแรก')) return false" class="btn btn-border confirmed-alert">ยกเลิก</a>
                      <button type="submit" name="button" class="btn btn-green">บันทึก</button>
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
var filename;
document.getElementById('uploadBtn01').onchange = function () {
  filename = this.value.split(String.fromCharCode(92));
  document.getElementById("uploadFile01").value = filename[filename.length-1];
};
</script>
@endsection
