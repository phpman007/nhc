@extends('frontend.theme.master')

@section('content')
<div id="wrapper2f">
<div class="insitepage2f">
  <div class="navication2f">
      <div class="container">
        <ol class="breadcrumb">
            <li><a href="/">หน้าหลัก</a></li>
            <!-- <li><a href="">ข่าวงานสรรหาคณะกรรมการ</a></li> -->
            <li class="active">ติดต่อเรา</li>
        </ol>
      </div>
  </div><!--end navication2f-->
  <div class="insite-banner2f">
      <div class="control-bannertext2f">
          <div class="container">
            <div class="headline2f line-brown">
             <h1>ติดต่อเรา</h1>
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
                          สำนักงานคณะกรรมการสุขภาพแห่งชาติ (สช.) <br>
ชั้น ๓ อาคารสุขภาพแห่งชาติ ๘๘/๓๙ หมู่ที่ ๔ ซอยติวานนท์ ๑๔ ถนนติวานนท์ <br>
ตำบลตลาดขวัญ  อำเภอเมือง  จังหวัดนนทบุรี ๑๑๐๐๐ <br>
โทรศัพท์ ๐ ๒๘๓๒ ๙๐๒๓-๒๔   อีเมล  nhcvote@nationalhealth.or.th<br>
https://nhc.nationalhealth.or.th<br>
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
