<ul class="nav metismenu" id="side-menu">
        <li class="nav-header">
            <div class="dropdown profile-element">
                    <span class="block m-t-xs font-bold">
                        <font color="white">

                            สวัสดี {{ (Auth::guard('admin')->user()->username) }}

                        </font>
                    </span>
            </div>
            <div class="logo-element">
                    NHCO
            </div>
        </li>

        <li>
            @if(Auth::guard('admin')->user()->can('set_date_register_ngo')||Auth::guard('admin')->user()->can('set_date_register_organize')||Auth::guard('admin')->user()->can('set_date_register_professional'))
            <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label"> ตั้งวันการลงทะเบียน</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    @if(Auth::guard('admin')->user()->can('set_date_register_professional'))
                        <li><a href="{{ url('backend/election/snElection') }}"><i class="fa fa-th-large"></i> ตั้งวันการลงทะเบียน ผู้ทรงคุณวุฒิ</a></li>
                    @endif
                    @if(Auth::guard('admin')->user()->can('set_date_register_ngo'))
                        <li><a href="{{ url('backend/election/ngoElection') }}"><i class="fa fa-th-large"></i> ตั้งวันการลงทะเบียน ผู้แทนองค์กรภาคเอกชน</a></li>
                    @endif
                    @if(Auth::guard('admin')->user()->can('set_date_register_organize'))
                        <li><a href="{{ url('backend/election/orElection') }}"><i class="fa fa-th-large"></i> ตั้งวันการลงทะเบียน ผู้แทนองค์กรส่วนท้องถิ่น</a></li>
                    @endif
                </ul>
            @endif
        </li>

        <li>
            @if(Auth::guard('admin')->user()->can('logs_professional')||Auth::guard('admin')->user()->can('logs_ngo'))
            <a href="{{ url('/backend/home') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span><span class="fa arrow"></span></a>
            <ul class="nav nav-second-level collapse">
                    <li><a href="{{ url('/backend/home') }}"><i class="fa fa-th-large"></i> Dashboard</a></li>
                @if(Auth::guard('admin')->user()->can('logs_professional'))
                    <li><a href="{{ url('backend/reportlog/logSN1') }}"><i class="fa fa-th-large"></i> สถิติการเข้าชมเว็บไซต์ ผู้ทรงคุณวุฒิ</a></li>
                @endif
                @if(Auth::guard('admin')->user()->can('logs_ngo'))
                    <li><a href="{{ url('backend/reportlog/logNGO1') }}"><i class="fa fa-th-large"></i> สถิติการเข้าชมเว็บไซต์ ผู้แทนองค์กรภาคเอกชน</a></li>
                @endif
                {{-- @if(Auth::guard('admin')->user()->can('logs_or'))
                    <li><a href="{{ url('backend/reportlog/logOr1') }}"><i class="fa fa-th-large"></i>สถิติการเข้าชมเว็บไซต์ ผู้แทนองค์กรส่วนท้องถิ่น</a></li>
                @endif --}}
            </ul>
            @endif
        </li>

        <li>
            @if(Auth::guard('admin')->user()->can('check_evidence_professional')||Auth::guard('admin')->user()->can('approve_professional'))
                <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">ผู้ทรงคุณวุฒิ</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    @if(Auth::guard('admin')->user()->can('check_evidence_professional'))
                        <li><a href="{{ url('backend/view/snView') }}"><i class="fa fa-th-large"></i> ข้อมูลการสมัคร ผู้ทรงคุณวุฒิ</a></li>
                        <li><a href="{{ url('backend/check/index') }}"><i class="fa fa-th-large"></i> ตรวจสอบหลักฐานผู้ทรงคุณวุฒิ</a></li>
                    @endif
                    @if(Auth::guard('admin')->user()->can('approve_professional'))
                        <li><a href="{{ url('backend/approve/snApprove') }}"><i class="fa fa-th-large"></i> อนุมัติ ผู้ทรงคุณวุฒิ</a></li>
                        <li><a href="{{ url('backend/approve/docSN') }}"><i class="fa fa-th-large"></i> รายงานส่งอีเมล์ผู้ทรงคุณวุฒิ</a></li>
                        <li><a href="{{ url('/backend/ElectionConfirm/snEConfirm') }}"><i class="fa fa-th-large"></i> ตรวจสอบรายชื่อผู้ทรงคุณวุฒิ ยืนยันใช้สิทธิลงคะแนน</a></li>
                        <li><a href="{{ url('/backend/RT/snRT') }}"><i class="fa fa-th-large"></i> ผลการลงคะแนนแบบ Real Time ผู้ทรงคุณวุฒิ</a></li>
                    @endif
                </ul>
            @endif
        </li>

        <li>
            @if(Auth::guard('admin')->user()->can('check_evidence_ngo')||Auth::guard('admin')->user()->can('approve_ngo'))
                <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">ผู้แทนองค์กรภาคเอกชน</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    @if(Auth::guard('admin')->user()->can('check_evidence_ngo'))
                        <li><a href="{{ url('backend/view/ngoView') }}"><i class="fa fa-th-large"></i> ข้อมูลการสมัคร ผู้แทนองค์กรภาคเอกชน</a></li>
                    @endif
                    @if(Auth::guard('admin')->user()->can('check_evidence_ngo'))
                        <li><a href="{{ url('backend/check/ngoCheck') }}"><i class="fa fa-th-large"></i> ตรวจสอบหลักฐานผู้แทนองค์กรภาคเอกชน</a></li>
                    @endif
                    @if(Auth::guard('admin')->user()->can('approve_ngo'))
                        <li><a href="{{ url('backend/approve/ngoApprove') }}"><i class="fa fa-th-large"></i> อนุมัติ ผู้แทนองค์กรภาคเอกชน</a></li>
                        <li><a href="{{ url('backend/approve/docNGO') }}"><i class="fa fa-th-large"></i> รายงานส่งอีเมล์ผู้แทนองค์กรภาคเอกชน</a></li>
                        <li><a href="{{ url('/backend/ElectionConfirm/ngoEConfirm') }}"><i class="fa fa-th-large"></i> ตรวจสอบรายชื่อผู้แทนองค์กรภาคเอกชน ยืนยันใช้สิทธิลงคะแนน</a></li>
                        <li><a href="{{ url('/backend/RT/ngoRT') }}"><i class="fa fa-th-large"></i> ผลการลงคะแนนแบบ Real Time ผู้แทนองค์กรภาคเอกชน</a></li>
                    @endif
                </ul>
            @endif
        </li>

        {{-- <li>
            @if(Auth::guard('admin')->user()->can('check_evidence_or'))
                <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">ผู้แทนองค์กรส่วนท้องถิ่น</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    @if(Auth::guard('admin')->user()->can('check_evidence_or'))
                        <li><a href="{{ url('backend/view/orView') }}"><i class="fa fa-th-large"></i> ข้อมูลการสมัคร ผู้แทนองค์กรส่วนท้องถิ่น</a></li>
                    @endif
                    @if(Auth::guard('admin')->user()->can('check_evidence_or'))
                        <li><a href="{{ url('backend/check/orCheck') }}"><i class="fa fa-th-large"></i> ตรวจสอบหลักฐานผู้แทนองค์กรส่วนท้องถิ่น</a></li>
                    @endif
                    @if(Auth::guard('admin')->user()->can('approve_or'))
                        <li><a href="{{ url('backend/approve/orApprove') }}"><i class="fa fa-th-large"></i> อนุมัติ ผู้แทนองค์กรส่วนท้องถิ่น</a></li>
                        <li><a href="{{ url('backend/approve/docOr') }}"><i class="fa fa-th-large"></i> รายงานส่งอีเมล์ผู้แทนองค์กรส่วนท้องถิ่น</a></li>
                        <li><a href="{{ url('/backend/ElectionConfirm/orEConfirm') }}"><i class="fa fa-th-large"></i> ตรวจสอบรายชื่อผู้แทนองค์กรส่วนท้องถิ่น ยืนยันใช้สิทธิลงคะแนน</a></li>
                        <li><a href="{{ url('/backend/RT/orRT') }}"><i class="fa fa-th-large"></i> ผลการลงคะแนนแบบ Real Time ผู้แทนองค์กรส่วนท้องถิ่น</a></li>
                    @endif
                </ul>
            @endif
        </li> --}}

        @if(Auth::guard('admin')->user()->hasRole('super-admin'))
            <li>
                <a href="{{ url('/backend/user')}}"><i class="fa fa-th-large"></i> <span class="nav-label">จัดการผู้ใช้</span></a>
            </li>

            <li>
                <a href="{{ route('backend.groupadmin.index')}}"><i class="fa fa-th-large"></i> <span class="nav-label">กลุ่มผู้ใช้งาน</span></a>
            </li>

            <li>
                <a href="{{ url('#')}}"><i class="fa fa-th-large"></i> <span class="nav-label">เมนู</span></a>
            </li>

            <li>
                <a href="{{ url('#')}}"><i class="fa fa-th-large"></i> <span class="nav-label">บทความ</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{ url('#') }}">หมวดหมู่บทความ</a></li>
                    <li><a href="{{ url('#') }}">บทความ</a></li>
                </ul>
            </li>

            <li>
                <a href="{{ url('#')}}"><i class="fa fa-th-large"></i> <span class="nav-label">widget</span> <span class="fa arrow"></span></a>
            </li>

            <li>
                <a href="{{ url('#')}}"><i class="fa fa-th-large"></i> <span class="nav-label">blog</span> <span class="fa arrow"></span></a>
            </li>

            <li>
                <a href="{{ url('#')}}"><i class="fa fa-th-large"></i> <span class="nav-label">Banner</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{ url('#') }}">หมวดหมู่ Banner</a></li>
                    <li><a href="{{ url('#') }}">Banner</a></li>
                </ul>
            </li>

            <li>
                <a href="{{ url('#')}}"><i class="fa fa-th-large"></i> <span class="nav-label">Contact</span> <span class="fa arrow"></span></a>
            </li>

            <li>
                <a href="{{ url('#')}}"><i class="fa fa-th-large"></i> <span class="nav-label">Page Management</span> <span class="fa arrow"></span></a>
            </li>

            <li>
                <a href="{{ url('#')}}"><i class="fa fa-th-large"></i> <span class="nav-label">Image Management</span> <span class="fa arrow"></span></a>
            </li>

            <li>
                <a href="{{ url('#')}}"><i class="fa fa-th-large"></i> <span class="nav-label">Video Management</span> <span class="fa arrow"></span></a>
            </li>

            <li>
                <a href="{{ url('#')}}"><i class="fa fa-th-large"></i> <span class="nav-label">Calendar Management</span> <span class="fa arrow"></span></a>
            </li>

            <li>
                <a href="{{ url('#')}}"><i class="fa fa-th-large"></i> <span class="nav-label">Publish Management</span> <span class="fa arrow"></span></a>
            </li>

            <li>
                <a href="{{ url('#')}}"><i class="fa fa-th-large"></i> <span class="nav-label">Link Management</span> <span class="fa arrow"></span></a>
            </li>

            <li>
                <a href="{{ url('#')}}"><i class="fa fa-th-large"></i> <span class="nav-label">Logo Management</span> <span class="fa arrow"></span></a>
            </li>
        @endif


        {{-- {{ route('backend.groupadmin.index')}} --}}

        {{-- Menu Management Start--}}

        {{-- @foreach ($menus as $menu)
        <li>
            @if (!$menu->parent->isEmpty() )
            <a href="{{ $menu->getLink() }}" target="{{$menu->menu_target}}"><i class="{{$menu->menu_icon}}"></i> <span class="nav-label">{{$menu->menu_title}}</span><span class="fa arrow"></span></a>
            <ul class="nav nav-second-level collapse">
                @foreach ($menu->parent as $parent)
                <li><a href="{{ $parent->getLink() }}" target="{{$parent->menu_target}}"><i class="{{$parent->menu_icon}}"></i> <span class="nav-label">{{$parent->menu_title}}</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-third-level">
                            @foreach ($parent->parent as $underparent)
                             <li><a href="{{ $underparent->getLink() }}" target="{{$underparent->menu_target}}">{{$underparent->menu_title}}</a></li>
                            @endforeach
                    </ul>
                </li>
                @endforeach
            </ul>
            @else
            <a href="{{ $menu->getLink() }}" target="{{$menu->menu_target}}"><i class="{{$menu->menu_icon}}"></i> <span class="nav-label">{{$menu->menu_title}}</span></a>
            @endif

        </li>
        @endforeach --}}

    </ul>
