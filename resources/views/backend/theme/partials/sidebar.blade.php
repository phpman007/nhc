<ul class="nav metismenu" id="side-menu">
      <li class="nav-header">
            <div class="dropdown profile-element">
                  {{--  <img alt="image" class="rounded-circle" src="img/profile_small.jpg"/>  --}}
                  {{--  <a data-toggle="dropdown" class="dropdown-toggle" href="#">  --}}
                    <span class="block m-t-xs font-bold">
                        <font color="white">

                            สวัสดี {{ (Auth::guard('admin')->user()->username) }}

                        </font>
                    </span>                        {{--  <span class="text-muted text-xs block">Art Director <b class="caret"></b></span>  --}}
                  {{--  </a>  --}}
                  {{--<ul class="dropdown-menu animated fadeInRight m-t-xs">
                          <li><a class="dropdown-item" href="profile.html">Profile</a></li>
                        <li><a class="dropdown-item" href="contacts.html">Contacts</a></li>
                        <li><a class="dropdown-item" href="mailbox.html">Mailbox</a></li>
                        <li class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{ route('backend.logout.get') }}">Logout</a></li>
                  </ul>--}}
            </div>
            <div class="logo-element">
                  NHCO
            </div>
      </li>

      <li>
            <a href="{{ url('/backend/home') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>
      </li>

      <li>
            <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">รับสมัคร</span> <span class="fa arrow"></span></a>
            <ul class="nav nav-second-level collapse">

                @if(Auth::guard('admin')->user()->hasRole('super-admin'))
                  <li><a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">ตั้งวันการลงทะเบียน</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                              {{-- <li><a href="{{ url('backend/election/snSet') }}">ผู้ทรงคุณวุฒิ</a></li>
                              <li><a href="{{ url('backend/election/orSet') }}">ผู้แทนองค์กรส่วนท้องถิ่น</a></li>
                              <li><a href="{{ url('backend/election/ngoSet') }}">ผู้แทนองค์กรภาคเอกชน</a></li> --}}
                              <li><a href="{{ url('backend/election/snElection') }}">ผู้ทรงคุณวุฒิ</a></li>
                              <li><a href="{{ url('backend/election/orElection') }}">ผู้แทนองค์กรส่วนท้องถิ่น</a></li>
                              <li><a href="{{ url('backend/election/ngoElection') }}">ผู้แทนองค์กรภาคเอกชน</a></li>
                        </ul>
                  </li>
                  @endif

                  <li><a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">ตรวจสอบหลักฐาน</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-third-level">
                          <li><a href="{{ url('backend/check/index') }}">ผู้ทรงคุณวุฒิ</a></li>
                          <li><a href="{{ url('backend/check/memCheck') }}">ผู้รับสิทธิลงคะแนน</a></li>
                          <li><a href="{{ url('backend/check/orCheck') }}">ผู้แทนองค์กรส่วนท้องถิ่น</a></li>
                          <li><a href="{{ url('backend/check/ngoCheck') }}">ผู้แทนองค์กรภาคเอกชน</a></li>
                    </ul>
                  </li>

                  {{-- @if(Auth::guard('admin')->user()->hasRole('super-admin'))
                  <li><a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">อนุมัติผู้สมัคร</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                              <li><a href="{{ url('backend/approve/snApprove') }}">ผู้ทรงคุณวุฒิ</a></li>
                              <li><a href="{{ url('backend/approve/orApprove') }}">ผู้แทนองค์กรส่วนท้องถิ่น</a></li>
                              <li><a href="{{ url('backend/approve/ngoApprove') }}">ผู้แทนองค์กรภาคเอกชน</a></li>
                        </ul>
                  </li>
                  <li><a href="{{ url('backend/approve/memApprove') }}"><i class="fa fa-th-large"></i> <span class="nav-label">อนุมัติรับสิทธิลงคะแนน</span></a></li>
                  @endif --}}

            </ul>

            <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">ลงคะแนน</span> <span class="fa arrow"></span></a>

            @if(Auth::guard('admin')->user()->hasRole('super-admin'))
            <ul class="nav nav-second-level collapse">
                  <li><a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">รับรองผลการลงคะแนน</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                              <li><a href="{{ url('backend/confirm/snConfirm') }}">ผู้ทรงคุณวุฒิ</a></li>
                              <li><a href="{{ url('backend/confirm/orConfirm') }}">ผู้แทนองค์กรส่วนท้องถิ่น</a></li>
                              <li><a href="{{ url('backend/confirm/ngoConfirm') }}">ผู้แทนองค์กรภาคเอกชน</a></li>
                        </ul>
                  </li>
            </ul>
            @endif
            <ul class="nav nav-second-level collapse">
                    <li><a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">แสดงผลการลงคะแนนแบบ Real Time</span> <span class="fa arrow"></span></a>
                          <ul class="nav nav-third-level">
                                <li><a href="{{ url('backend/RT/snRT') }}">ผู้ทรงคุณวุฒิ</a></li>
                                <li><a href="{{ url('backend/RT/orRT') }}">ผู้แทนองค์กรส่วนท้องถิ่น</a></li>
                                <li><a href="{{ url('backend/RT/ngoRT') }}">ผู้แทนองค์กรภาคเอกชน</a></li>
                          </ul>
                    </li>
            </ul>

            @if(Auth::guard('admin')->user()->hasRole('super-admin'))
            <ul class="nav nav-second-level collapse">
                    <li><a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">จับฉลากหากรรมการสุขภาพแห่งชาติ</span> <span class="fa arrow"></span></a>
                          <ul class="nav nav-third-level">
                                <li><a href="{{ url('backend/draw/snDraw') }}">ผู้ทรงคุณวุฒิ</a></li>
                                <li><a href="{{ url('backend/draw/orDraw') }}">ผู้แทนองค์กรส่วนท้องถิ่น</a></li>
                                <li><a href="{{ url('backend/draw/ngoDraw') }}">ผู้แทนองค์กรภาคเอกชน</a></li>
                          </ul>
                    </li>
            </ul>
            @endif
      </li>
      {{-- @if(Auth::guard('admin')->user()->hasRole('super-admin')) --}}
      <li>
            <a href="{{ url('/backend/user')}}"><i class="fa fa-th-large"></i> <span class="nav-label">จัดการผู้ใช้</span></a>
      </li>
      {{-- @endif --}}

      {{-- Set Permission menu --}}
      {{-- <li>
            <a href="{{ url('/backend/permission')}}"><i class="fa fa-th-large"></i> <span class="nav-label">จัดการสิทธิ์</span></a>
      </li> --}}



      {{-- <li>
            <a href="layouts.html"><i class="fa fa-th-large"></i> <span class="nav-label">จัดการข้อมูลคลังภาพ</span></a>
      </li>

      <li>
            <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">จัดการข้อมูลผู้ใช้งาน</span><span class="fa arrow"></span></a>
            <ul class="nav nav-second-level collapse">
                  <li><a href="graph_rickshaw.html">ข้อมูลผู้ใช้งาน</a></li>
                  <li><a href="graph_flot.html">กลุ่มผู้ใช้งาน</a></li>
                  <li><a href="graph_morris.html">กำหนดสิทธิ</a></li>
            </ul>
      </li>

      <li>
            <a href="layouts.html"><i class="fa fa-th-large"></i> <span class="nav-label">จัดการเครื่องประดับเว็บไซต์</span></a>
      </li>
      <li>
            <a href="layouts.html"><i class="fa fa-th-large"></i> <span class="nav-label">จัดการปฏิทินกิจกรรม</span></a>
      </li>
      <li>
            <a href="layouts.html"><i class="fa fa-th-large"></i> <span class="nav-label">จัดการข้อมูลติดต่อ</span></a>
      </li>
      <li>
            <a href="layouts.html"><i class="fa fa-th-large"></i> <span class="nav-label">จัดการป้ายโฆษณา</span></a>
      </li>

      <li>
            <a href="layouts.html"><i class="fa fa-th-large"></i> <span class="nav-label">จัดการเว็บลิงค์</span></a>
      </li>
      <li>
            <a href="layouts.html"><i class="fa fa-th-large"></i> <span class="nav-label">สถิติการเข้าชมเว็บไซต์</span></a>
      </li> --}}


</ul>
