@extends('frontend.theme.master')

@section('content')
<div id="wrapper2f">
          <div class="insitepage2f">
              <div class="navication2f">
                  <div class="container">
                    <ol class="breadcrumb">
                        <li><a href="{{url('')}}">หน้าหลัก</a></li>
                        <li><a href="#">ผู้ทรงคุณวุฒิ</a></li>
                        {{-- <li><a href="">ประกาศผล</a></li>
                        <li class="active">ทำเนียบรายชื่อและข้อมูลของผู้ผ่านคุณสมบัติผู้ทรงคุณวุฒิ</li> --}}
                    </ol>
                  </div>
              </div><!--end navication2f-->
              <div class="insite-banner2f">
                  <div class="control-bannertext2f">
                      <div class="container">
                        <div class="headline2f line-purple">
                          <h1>ผู้ทรงคุณวุฒิ</h1><form action="{{route('professional.logging')}}" method="post">
                        </div>
                      </div><!--end container-->
                  </div><!--end control-bannertext2f-->
                  <div class="img-banner2f">
                    <img src="{{url('frontend/images/insite-banner06.jpg')}}" alt="">
                  </div>
                  <div class="bg-banner"><img src="{{url('frontend/images/bg-banner.png')}}" alt=""></div>
                  <div class="shape-banner"></div>
              </div><!--end insite-banner2f-->
              <div class="control-insitepage2f">
                  <div class="container">
                    <div class="content-listvdo2f">
                        <div class="row">
                            <div class="col-sm-6 paddingright30">
                              <h4>คลิปวิดีโอบทบาทหน้าที่ของ คสช.</h4>
                              <div class="box-vdo2f">
                                <video poster="{{url('frontend/images/poster-clip1.jpg')}}" id="player" playsinline controls>
                                  <source src="{{url('frontend/vdo/vdo.mp4')}}" type="video/mp4" />
                                </video>
                              </div><!--end box-vdo2f-->
                            </div>
                            <div class="col-sm-6 paddingleft30">
                              <h4>คลิปวิดีโอคู่มือวิธีการลงคะแนน</h4>
                              <div class="box-vdo2f">
                                <video poster="{{url('frontend/images/poster-clip2.jpg')}}" id="player" playsinline controls>
                                  <source src="{{url('frontend/vdo/vdo.mp4')}}" type="video/mp4" />
                                </video>
                              </div><!--end box-vdo2f-->
                            </div>
                        </div><!--end row-->
                    </div><!--end content-listvdo2f-->

                     <div class="content-seat2f">
                        <h3>ทำเนียบผู้สมัคร</h3>
                        <h5>กรรมการสุขภาพแห่งชาติ</h5>
                        <div class="control-linkseat2f">
                            <div id="flipbook" >
                                <div class="hard">  <img src="{{url('plugins/turnjs/pages/0001.jpg')}}" width="400px" height="400px"   class="page-1"> </div>
                                <div class="hard">  <img src="{{url('plugins/turnjs/pages/0002.jpg')}}" width="400px" height="400px"   class="page-2"></div>
                                <div>  <img src="{{url('plugins/turnjs/pages/0003.jpg')}}" width="400px" height="400px"   class="page-3"> </div>
                                <div>  <img src="{{url('plugins/turnjs/pages/0004.jpg')}}" width="400px" height="400px"   class="page-4"> </div>

                                <div class="hard"><img src="{{url('plugins/turnjs/pages/0001.jpg')}}" width="400px" height="400px" class="page-5"></div>
                                <div class="hard"><img src="{{url('plugins/turnjs/pages/0001.jpg')}}" width="400px" height="400px" class="page-6"></div>
                            </div>

                          <div class="box-link-in">
                            {{-- <a href="">
                              <img src="{{url('frontend/images/icon-plus-white.svg')}}" alt="">
                              <span>ดูทั้งหมด</span>
                            </a> --}}
                          </div><!--end box-link-in-->
                        </div>
                     </div><!--end content-seat2f-->
                  </div><!--end container-->
              </div><!--end control-insitepage2f-->

          </div><!--end insitepage2f-->
      </div><!--end wrapper2f-->
@endsection

@section('css')

@endsection

@section('js')
<script type="text/javascript" src="{{url('plugins/turnjs/js/magazine.js')}}"></script>
<script type="text/javascript" src="{{url('plugins/turnjs/js/turn.min.js')}}"></script>
<script type="text/javascript" src="{{url('plugins/turnjs/js/modernizr.2.5.3.min.js')}}"></script>
<script type="text/javascript" src="{{('plugins/turnjs/js/hash.js')}}"></script>
<script type = "text/javascript" >
    $("#flipbook").turn({
        height:400,
        width:800,
        autoCenter: true
    });


</script>
@endsection
