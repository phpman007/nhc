@extends('frontend.theme.master')

@section('content')
<div id="wrapper2f">
<div class="insitepage2f">
  <div class="navication2f">
      <div class="container">
        <ol class="breadcrumb">
            <li><a href="">หน้าหลัก</a></li>
            <!-- <li><a href="">ข่าวงานสรรหาคณะกรรมการ</a></li> -->
            <li class="active">แบบฟอร์มข้อมูลติดต่อเจ้าหน้าที่สำนักงานสาธารณสุขจังหวัด</li>
        </ol>
      </div>
  </div><!--end navication2f-->
  <div class="insite-banner2f">
      <div class="control-bannertext2f">
          <div class="container">
            <div class="headline2f line-brown">
             <h1>แบบฟอร์มข้อมูลติดต่อเจ้าหน้าที่สำนักงานสาธารณสุขจังหวัด</h1>
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
                          <h2 class="text-center">  แบบฟอร์มข้อมูลติดต่อเจ้าหน้าที่สำนักงานสาธารณสุขจังหวัด <br>
                          </h2>
              <br>
                          <ul>
                                <li><a target="_blank" href="{{asset('mock/แบบฟอร์มข้อมูลติดต่อเจ้าหน้าที่สำนักงาน.doc')}}">-  แบบฟอร์มข้อมูลติดต่อเจ้าหน้าที่สำนักงาน.doc</a></li>
                                <li><a target="_blank" href="{{asset('mock/แบบฟอร์มข้อมูลติดต่อเจ้าหน้าที่สำนักงาน.pdf')}}">-  แบบฟอร์มข้อมูลติดต่อเจ้าหน้าที่สำนักงาน.pdf</a></li>

                          </ul><br>

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
