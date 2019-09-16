<header>
      <div id="top2f">
        <div class="container">
            <div class="row">
              <div class="col-md-4 col-sm-0">
                <div class="top-logo2f">
                  <a href="{{url('/')}}"><img src="{{asset("frontend/images/logo.png")}}" alt=""></a>
                </div>
              </div>
              <div class="col-md-8 col-sm-12">
                  <div class="top-manage2f">
                      <div class="manage-color2f">
                        <ul class="list-inline">
                          <li><span>การแสดงผล</span></li>
				  <li><a onclick="$('body').addClass('templatewhite');$('body').removeClass('templateyellow')" href="javascript:void(0)" class="icon-color color-frontwhite">C</a></li>
 				 <li><a onclick="$('body').removeClass('templatewhite');$('body').removeClass('templateyellow')" href="javascript:void(0)" class="icon-color color-default">C</a></li>
 				 <li><a onclick="$('body').addClass('templateyellow');$('body').removeClass('templatewhite')" href="javascript:void(0)" class="icon-color color-frontyellow">C</a></li>
                        </ul>
                      </div><!--end manage-color2f-->
                      <div class="manage-font2f">
                          <ul class="list-inline">
                            <li><span>ขนาดตัวอักษร</span></li>
                            <li><a onclick="$('body').addClass('fontdecrease');$('body').removeClass('fontincrease')" href="javascript:void(0)" class="icon-font fontdecrease">-</a></li>
                            <li><a onclick="$('body').removeClass('fontincrease');$('body').removeClass('fontdecrease')" href="javascript:void(0)" class="icon-font fontdefault">ก</a></li>
                            <li><a onclick="$('body').addClass('fontincrease');$('body').removeClass('fontdecrease')" href="javascript:void(0)" class="icon-font fontincrease">+</a></li>
                          </ul>
                      </div><!--end manage-font2f-->
                      <div class="manage-lang2f">
                          <a href="">ENGLISH</a>
                      </div><!--end manage-lang2f-->
                      <div class="manage-search2f">
                          <div class="box-search2f">
                              <input type="text" class="form-control" placeholder="ค้นหา...">
                              <button type="button" name="button" class="btn btn-nobg"><img src="{{asset("frontend/images/search-gray.svg")}}" alt=""></button>
                          </div><!--end box-search2f-->
                      </div><!--end manage-search2f-->
                  </div><!--end top-manage2f-->
                  <div class="manage-login2f">
                      <div class="control-login2f">
                           @if(Auth::check())
                          <div class="box-login2f">{{@Auth::user()->nameTitle}} {{@Auth::user()->firstname}} {{@Auth::user()->lastname}} | <a href="{{ url('/logout') }}">ออกจากระบบ</a></div>
                           @else
                          <div class="box-login2f"><a href="{{ url('/login') }}">เข้าสู่ระบบ</a></div>
                          @endif
                          <div class="box-user2f">
                              <div class="img-user2f"><img src="{{asset("frontend/images/icon-user.svg")}}" alt=""></div>
                              <div class="text-username2f">2fellows</div>
                          </div>
                      </div><!--end control-login2f-->
                  </div><!--end manage-login2f-->
                  <div class="search-mobile">
                    <button type="button" name="button" class="btn btn-nobg" data-toggle="modal" data-target="#myModal_topsarch">
                      <img src="{{asset("frontend/images/search-gray01.svg")}}" alt=""></button>
                  </div>
              </div>
            </div><!--end row-->
        </div><!--end container-->
      </div><!--end top2f-->
      <div id="menu2f">
        <div class="navbar navbar-default navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <div class="navbar-brand"><a href=""><img src="{{asset("frontend/images/logo.png")}}" alt=""></a></div>
              <button class="navbar-toggle" data-toggle="collapse" data-target=".btnCollapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>
            <div class="collapse navbar-collapse btnCollapse">
              <ul class="nav navbar-nav">
                <li class="active"><a href="{{url('/')}}">หน้าหลัก</a></li>
                <!-- <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">เกี่ยวกับคณะกรรมการสรรหา<span class="caret"></span></a>
                  <div class="dropdown-menu" role="menu">
                      <ul class="submenu_level02">
                        <li><span>คณะกรรมการสรรหา</span>
                          <ul class="submenu_level03 " >
                              <li><a href="">เกี่ยวกับคณะกรรมการสรรหา</a></li>
                              <li><a href="">โครงสร้างและ อำนาจหน้าที่ของคณะกรรมการสรรหา</a></li>
                              <li><a href="">รายชื่อคณะกรรมการ</a></li>
                          </ul>
                        </li>
                        <li><span>คณะกรรมการสุขภาพแห่งชาติ</span>
                          <ul class="submenu_level03" >
                              <li><a href="">เกี่ยวกับคณะกรรมการสุขภาพแห่งชาติ</a></li>
                              <li><a href="">โครงสร้างและ อำนาจหน้าที่ของคณะกรรมการสุขภาพแห่งชาติ</a></li>
                              <li><a href="">ภาคีความร่วมมือ</a></li>
                          </ul>
                        </li>
                      </ul>
                  </div>
                </li> -->
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">เกี่ยวกับคณะกรรมการสรรหา<span class="caret"></span></a>
                  <div class="dropdown-menu" role="menu">
                     <ul class="submenu_level02">
                       <li><span>เกี่ยวกับคณะกรรมการสรรหา</span>
                         <ul class="submenu_level03" >
                             <li><a target="_blank" href="{{ asset('mock/menu/pdf1.pdf') }}">คณะกรรมการสรรหากรรมการสุขภาพแห่งชาติ</a></li>
                             <!-- <li><a href="">ผู้แทนองค์กรปกครองส่วนท้องถิ่น</a></li> -->
                             <li><a target="_blank" href="{{ asset('mock/menu/2.png') }}">องค์ประกอบของคณะกรรมการสุขภาพแห่งชาติ</a></li>
                             <li><a target="_blank" href="{{ asset('mock/menu/3.png') }}">กรรมการสุขภาพแห่งชาติที่มาจากกระบวนการเลือกกันเอง</a></li>
                             <li><a target="_blank" href="{{ asset('mock/menu/4.png') }}">หน้าที่และอำนาจคณะกรรมการสุขภาพแห่งชาติ (คสช.)</a></li>

                             <li><a target="_blank" href="{{ url('documentcontact') }}">แบบฟอร์มข้อมูลติดต่อเจ้าหน้าที่สำนักงานสาธารณสุขจังหวัด</a></li>
                         </ul>
                       </li>

                      </ul>
                  </div><!--end dropdown-menu-->
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">ประกาศคณะกรรมการสรรหา<span class="caret"></span></a>
                  <div class="dropdown-menu" role="menu">
                     <ul class="submenu_level02">
                       <li><span>ประกาศคณะกรรมการสรรหา</span>
                         <ul class="submenu_level03" >
                             <li><a href="{{ url('listprofessional-file') }}">ผู้ทรงคุณวุฒิ</a></li>
                             <!-- <li><a href="">ผู้แทนองค์กรปกครองส่วนท้องถิ่น</a></li> -->
                             <li><a href="{{ url('listngo-file') }}">ผู้แทนองค์กรภาคเอกชน (NGOs)</a></li>
                         </ul>
                       </li>

                      </ul>
                  </div><!--end dropdown-menu-->
                </li>
		    @if(now() <= Carbon\Carbon::parse(config('time.register.date')) && now() >= Carbon\Carbon::parse('2019-09-04'))
		      <!-- <li class="active"><a href="{{ url('form-professional/1') }}">สมัคร</a></li> -->
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">สมัคร<span class="caret"></span></a>
                  <div class="dropdown-menu" role="menu">
                     <ul class="submenu_level02">
                       <!-- <li><span>สื่อแนะนำการสรรหา</span>
                         <ul class="submenu_level03" >
                             <li><a href="">รับสมัคร</a></li>
                         </ul>
                       </li> -->
                       <li><span>ผู้ทรงคุณวุฒิ</span>
                         <ul class="submenu_level03" >

                                     <li><a href="{{ url('list-doc-pro') }}">รายการเอกสารที่ต้องใช้ประกอบการสมัคร</a></li>
                             <li><a href="{{ url('form-professional/1') }}">สมัคร</a></li>
                            <li><a href="{{ url('form-professional/2') }}?get_page=1">แก้ไขข้อมูลใบสมัคร</a></li>
                         </ul>
                       </li>

                       <!-- <li><span>ผู้แทนองค์กรปกครองส่วนท้องถิ่น</span>
                         <ul class="submenu_level03" >

                                     <li><a href="{{ url('list-doc-org') }}">รายการเอกสารที่ต้องใช้ประกอบการสมัคร</a></li>
                             <li><a href="{{ url('form-organization/2') }}">สมัคร</a></li>
                            <li><a href="{{ url('form-organization/3') }}?get_page=1">แก้ไขข้อมูลใบสมัคร</a></li>
                         </ul>
                       </li> -->
                       <li><span>ผู้แทนองค์กรภาคเอกชน (NGOs)</span>
                         <ul class="submenu_level03" >
                               <li><a href="{{ url('list-doc-ngo') }}">รายการเอกสารที่ต้องใช้ประกอบการสมัคร</a></li>
                             <li><a href="{{ url('form-ngo-register/1') }}">ขอขึ้นทะเบียนองค์กรภาคเอกชน</a></li>
                             <li><a href="{{ url('form-ngo-register/2') }}?get_page=1">แก้ไขข้อมูลแบบขอขึ้นทะเบียน</a></li>
                            <li><a href="{{ url('form-ngo/1') }}">สมัคร</a></li>
                            <li><a href="{{ url('form-ngo/2') }}?get_page=1">แก้ไขข้อมูลใบสมัคร</a></li>

                         </ul>
                       </li>
                      </ul>
                  </div><!--end dropdown-menu-->
                </li>
            @elseif(now() >= Carbon\Carbon::parse(config('time.register.date')) && now() >= Carbon\Carbon::parse('2019-11-04'))
                <li class="active"><a href="{{url('/vote-schedule')}}">กำหนดการใช้สิทธิ์ลงคะแนน</a></li>
            @elseif ( Carbon\Carbon::parse(config('time.vote_menu_confirm.start_date'))  <= now() && Carbon\Carbon::parse(config('time.vote_menu_confirm.end_date')) >= now() )

                @if (@Auth::user()->detail->statusId == '4')
                    {{-- <li class="active"><a href="{{url('/vote-confirm')}}">ยืนยันการใช้สิทธิ์ </a></li> --}}
                    <li class="active"><a href="{{url('/login')}}">ยืนยันการใช้สิทธิ์ </a></li>
                @elseif (@Auth::user()->detail->statusId == '3')
                    <li class="active"><a href="{{url('/login')}}">ยืนยันการใช้สิทธิ์ </a></li>
                @else
                    <li class="active"><a href="{{url('/login')}}">ยืนยันการใช้สิทธิ์ </a></li>
                @endif

                {{-- vote-confirm
                vote-confirm-notpass
                vote-confirm-notpass2 --}}

		    @else
                  <li class="active"><a href="{{url('/vote')}}">ลงคะแนน</a></li>
		    @endif
                <!-- <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">ข่าวงานสรรหาคณะกรรมการ<span class="caret"></span></a>
                  <div class="dropdown-menu" role="menu">
                     <ul class="submenu_level02">
                       <li><a href="">บทความ/ข่าวเด่น</a></li>
                       <li><a href="">ข่าวจากสื่อ</a></li>
                       <li><span>อัลบั้มภาพกิจกรรม</span>
                         <ul class="submenu_level03" >
                             <li><a href="">คณะกรรมการสรรหา</a></li>
                             <li><a href="">คณะอนุกรรมการสรรหา</a></li>
                         </ul>
                       </li>
                      </ul>
                  </div>
                </li> -->
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">ติดต่อเรา<span class="caret"></span></a>
                  <div class="dropdown-menu" role="menu">
                     <ul class="submenu_level02">
                         <li><a href="{{url('contact-us')}}">ช่องทางการติดต่อ</a></li>
                      </ul>
                  </div><!--end dropdown-menu-->
                </li>
              </ul>
            </div>

          </div><!-- end container -->
        </div><!-- end navbar navbar-inverse navbar-static-top -->
      </div><!--end menu2f-->
    </header>
