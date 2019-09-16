@extends('frontend.theme.master')

@section('content')
<div id="wrapper2f">
<div class="insitepage2f">
  <div class="navication2f">
      <div class="container">
        <ol class="breadcrumb">
            <li><a href="">หน้าหลัก</a></li>
            <!-- <li><a href="">ข่าวงานสรรหาคณะกรรมการ</a></li> -->
            <li class="active">รายการเอกสารที่ต้องใช้ประกอบการสมัคร สำหรับผู้แทนองค์กรภาคเอกชน</li>
        </ol>
      </div>
  </div><!--end navication2f-->
  <div class="insite-banner2f">
      <div class="control-bannertext2f">
          <div class="container">
            <div class="headline2f line-brown">
             <h1>รายการเอกสารที่ต้องใช้ประกอบการสมัคร สำหรับผู้แทนองค์กรภาคเอกชน</h1>
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
                          <h2 class="text-center">  รายการเอกสารที่ต้องใช้ประกอบการสมัคร สำหรับผู้แทนองค์กรภาคเอกชน <br>
                          </h2>
                          <br> <h3><small><u>เอกสารหลักฐานประกอบการขอขึ้นทะเบียน สำหรับองค์กรภาคเอกชนที่เป็นนิติบุคคล ประกอบด้วย</u></small></h3>

                          <h3><small><u></u></small></h3>
                          <ul>
                                <li>1. สำเนาหลักฐานที่แสดงความเป็นนิติบุคคล</li>
                              <li> 2. สำเนาหลักฐานที่แสดงถึงวัตถุประสงค์การก่อตั้งองค์กร</li>
					<li>3 .สำเนาหลักฐานซึ่งแสดงถึงการดำเนินกิจกรรมในกลุ่มองค์กรที่ขอขึ้นทะเบียนในพื้นที่จังหวัดมาแล้วไม่เกิน 3 ปี นับถึงวันที่สมัคร  จำนวน  2  กิจกรรมขึ้นไป เช่น โครงการ รายงานการดำเนินโครงการ รูปถ่ายกิจกรรมโดยระบุสถานที่จัดกิจกรรม เป็นต้น</li>
                                            <li>
                                            4. สำเนาคำสั่งแต่งตั้งประธานองค์กรหรือรายงานการประชุมที่มีชื่อประธานองค์กร</li>
                                            <li>
                                           5. สำเนาบัตรประจำตัวประชาชนของประธานองค์กร</li>
                          </ul><br>
                          <h3><small><u>เอกสารหลักฐานประกอบการขอขึ้นทะเบียน สำหรับกรณีที่องค์กรภาคเอกชนไม่เป็นนิติบุคคล ประกอบด้วย</u></small></h3>
                          <ul>
                                <li>1. สำเนาหลักฐานที่แสดงถึงวัตถุประสงค์การก่อตั้งองค์กร</li>
                              <li> 2. สำเนาหลักฐานซึ่งแสดงถึงการดำเนินกิจกรรมในกลุ่มองค์กรที่ขอขึ้นทะเบียนในพื้นที่จังหวัด มาแล้วไม่เกิน 3 ปี นับถึงวันที่สมัคร  จำนวน  2  กิจกรรมขึ้นไป เช่น โครงการ รายงานการดำเนินโครงการ รูปถ่ายกิจกรรม โดยระบุสถานที่จัดกิจกรรม เป็นต้น</li>
                                            <li>
                                            3. สำเนาหนังสือที่แสดงว่าผู้ลงลายมือชื่อในแบบขอขึ้นทะเบียนองค์กรภาคเอกชนฯเป็นประธาน องค์กร หรือรายงานประชุมที่มีชื่อประธานองค์กร</li>
                                            <li>
                                           4. สำเนาบัตรประจำตัวประชาชนของประธานองค์กร</li>
                                           <li style="font-weight:bold">
                                          5. หนังสือรับรองความมีอยู่และการดำเนินกิจกรรมขององค์กรภาคเอกชนที่ไม่เป็นนิติบุคคล <a target="_blank" href="{{ url('mock/ngo-doc2.pdf') }}" style="font-weight:bold">ดาวน์โหลดเอกสาร</a></li>
                          </ul><br>

                          <h3><small><u>เอกสารหลักฐานที่แนบมาพร้อมใบสมัคร</u></small></h3>
                          <ul>
                                <li>1. สำเนาบัตรประจำตัวประชาชนของผู้แทนองค์กรภาคเอกชน</li>
                              <li>2. รูปถ่ายหน้าตรงไม่สวมหมวก ไม่สวมแว่นตาดำ ฉากพื้นหลังไม่มีลวดลาย  ซึ่งถ่ายมาแล้วไม่เกิน  6  เดือน</li>
                            <li>3. แบบ สช./แบบขอขึ้นทะเบียนองค์กรภาคเอกชนและยืนยันการส่งผู้แทนภาคเอกชน/2562 พร้อมเอกสารหลักฐานประกอบ 1 ชุด</li>

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
