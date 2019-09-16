@extends('frontend.theme.master')

@section('content')
<div id="wrapper2f">
<div class="insitepage2f">
  <div class="navication2f">
      <div class="container">
        <ol class="breadcrumb">
            <li><a href="">หน้าหลัก</a></li>
            <!-- <li><a href="">ข่าวงานสรรหาคณะกรรมการ</a></li> -->
            <li class="active">รายการเอกสารที่ต้องใช้ประกอบการสมัคร สำหรับผู้ทรงคุณวุฒิ</li>
        </ol>
      </div>
  </div><!--end navication2f-->
  <div class="insite-banner2f">
      <div class="control-bannertext2f">
          <div class="container">
            <div class="headline2f line-brown">
             <h1>รายการเอกสารที่ต้องใช้ประกอบการสมัคร สำหรับผู้ทรงคุณวุฒิ</h1>
            </div>
          </div><!--end container-->
      </div><!--end control-bannertext2f-->
      <div class="img-banner2f">
        <img src="{{asset("frontend/images/insite-banner04.jpg")}}" alt="">
      </div>
      <div class="bg-banner"><img src="{{asset("frontend/images/bg-banner.png")}}" alt=""></div>
      <div class="shape-banner"></div>
  </div><!--end insite-banner2f-->
  <div class="control-insitepage2f">
      <div class="container">
        <div class="list-announce2f listcontent">
          <div class="row">

                <div class="col-sm-12">
                    <div class="box-announce2f">
                          <h2 class="text-center">รายการเอกสารที่ต้องใช้ประกอบการสมัคร สำหรับผู้ทรงคุณวุฒิ
                          </h2>
                          <br>
                          <ul>
                                <li>1. สำเนาบัตรประจำตัวประชาชน</li>
                              <li> 2. รูปถ่ายตรงไม่สวมหมวก ไม่สวมแว่นตาดำ ฉากพิ้นหลังไม่มีลวดลาย ซึ่งถ่ายมาแล้วไม่เกิน 6 เดือน</li>
                                            <li>
                                            3. เอกสารสรุปผลงานอันเป็นที่ประจักษ์ ที่สอดคล้องกับประเภทกลุ่มผู้ทรงคุณวุฒิที่เลือกสมัคร (ไม่เกิน 2 หน้ากระดาษ A 4) พิมพ์โดยใช้ตัวอักษรขนาดไม่ต่ำกว่า 16</li>
                          </ul>


                    </div><!--end box-announce2f-->
                </div>




          </div><!--end row-->
      </div><!--end list-announce2f-->

      </div><!--end container-->
  </div><!--end control-insitepage2f-->

</div><!--end insitepage2f-->
</div><!--end wrapper2f-->
@endsection

@section('css')
@endsection

@section('js')
<script type="text/javascript"></script>
@endsection
