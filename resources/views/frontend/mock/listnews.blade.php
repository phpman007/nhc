@extends('frontend.theme.master')

@section('content')
<div id="wrapper2f">
<div class="insitepage2f">
  <div class="navication2f">
      <div class="container">
        <ol class="breadcrumb">
            <li><a href="">หน้าหลัก</a></li>
            <!-- <li><a href="">ข่าวงานสรรหาคณะกรรมการ</a></li> -->
            <li class="active">ประกาศคณะกรรมการสรรหา</li>
        </ol>
      </div>
  </div><!--end navication2f-->
  <div class="insite-banner2f">
      <div class="control-bannertext2f">
          <div class="container">
            <div class="headline2f line-brown">
             <h1>ข่าวจากสื่อ</h1>
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
                <div class="col-sm-6">
                    <div class="box-announce2f">
                        <div class="box-icon-announce2f">
                           <span><img src="{{asset("frontend/images/icon-announce-white.svg")}}" alt=""></span>
                        </div><!--end box-icon-announce2f-->
                        <div class="box-detail-announce2f">
                           <div class="t-category2f">24 พ.ค. 2562</div>
                           <div class="t-announce2f">
                              <a target="_blank" href={{ asset('mock/info_evoting_003_6647.pdf') }}">ทำความรู้จักคณะกรรมการสุขภาพแห่งชาติ</a>
                           </div>
                           <div class="box-link-attr2f">
                              <a target="_blank" href={{ asset('mock/info_evoting_003_6647.pdf') }}">
                                 <img src="{{asset("frontend/images/icon-pdf.svg")}}" class="icon-filetype" alt="">
                                 <img src="{{asset("frontend/images/icon-paper-clip.svg")}}" alt="">
                                 <span>เอกสารแนบ</span>
                              </a>
                           </div>
                        </div><!--end box-detail-announce2f-->
                    </div><!--end box-announce2f-->
                </div>
                <div class="col-sm-6">
                    <div class="box-announce2f">
                        <div class="box-icon-announce2f">
                           <span><img src="{{asset("frontend/images/icon-announce-white.svg")}}" alt=""></span>
                        </div><!--end box-icon-announce2f-->
                        <div class="box-detail-announce2f">
                           <div class="t-category2f">24 พ.ค. 2562</div>
                           <div class="t-announce2f">
                              <a target="_blank" href="{{ asset('mock/info_evoting_001_8365.pdf') }}">ทำความรู้จักกลุ่มผู้ทรงคุณวุฒิ(คสช.)</a>
                           </div>
                           <div class="box-link-attr2f">
                              <a target="_blank" href="{{ asset('mock/info_evoting_001_8365.pdf') }}">
                                 <img src="{{asset("frontend/images/icon-pdf.svg")}}" class="icon-filetype" alt="">
                                 <img src="{{asset("frontend/images/icon-paper-clip.svg")}}" alt="">
                                 <span>เอกสารแนบ</span>
                              </a>
                           </div>
                        </div><!--end box-detail-announce2f-->
                    </div><!--end box-announce2f-->
                </div>
                <div class="col-sm-6">
                    <div class="box-announce2f">
                        <div class="box-icon-announce2f">
                           <span><img src="{{asset("frontend/images/icon-announce-white.svg")}}" alt=""></span>
                        </div><!--end box-icon-announce2f-->
                        <div class="box-detail-announce2f">
                           <div class="t-category2f">24 พ.ค. 2562</div>
                           <div class="t-announce2f">
                              <a target="_blank" href="{{ asset('mock/info_evoting_002_7734e.pdf') }}">ทำความรู้จักกลุ่มองค์กรภาคเอกชน(คสช.)</a>
                           </div>
                           <div class="box-link-attr2f">
                              <a target="_blank" href="{{ asset('mock/info_evoting_002_7734e.pdf') }}">
                                 <img src="{{asset("frontend/images/icon-pdf.svg")}}" class="icon-filetype" alt="">
                                 <img src="{{asset("frontend/images/icon-paper-clip.svg")}}" alt="">
                                 <span>เอกสารแนบ</span>
                              </a>
                           </div>
                        </div><!--end box-detail-announce2f-->
                    </div><!--end box-announce2f-->
                </div>
          </div><!--end row-->
      </div><!--end list-announce2f-->
          <!-- <div class="box-pagination2f">
             <div class="box-pagin2f">
                <nav aria-label="Page navigation">
                  <ul class="pagination">
                    <li class="prev2f">
                      <a href="#" aria-label="Previous">&nbsp;</a>
                    </li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li class="page-dots"><span>...</span></li>
                    <li><a href="#">8</a></li>
                    <li class="next2f">
                      <a href="#" aria-label="Next">&nbsp;</a>
                    </li>
                  </ul>
                  </nav>
             </div>
             <div class="text-pagin2f">หน้าที่ 1 จาก 10</div>
          </div> -->
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
