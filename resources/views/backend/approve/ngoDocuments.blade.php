@extends('backend.theme.master')
@section('title','NHCO ADMIN')

@section('content')
<style>
    .ibox {
        position: fixed;
        clear: both;
        margin-bottom: 25px;
        margin-top: 0;
        padding: 0;
        top: 0;
        left: 0;
        z-index: 99999;
        width: 100%;
        height: 100vh !important;
        display: none;
    }

    .ibox-content.sk-loading {
        position: relative;
        height: 100%;
        display: block;
        background-color: rgba(0, 0, 0, 0.25);
    }
    .ibox-active {
        display:inherit;
    }
</style>
<div class="ibox" id="ibox2">
<div class="ibox-content">
<div class="sk-spinner sk-spinner-fading-circle">
    <div class="sk-circle1 sk-circle"></div>
    <div class="sk-circle2 sk-circle"></div>
    <div class="sk-circle3 sk-circle"></div>
    <div class="sk-circle4 sk-circle"></div>
    <div class="sk-circle5 sk-circle"></div>
    <div class="sk-circle6 sk-circle"></div>
    <div class="sk-circle7 sk-circle"></div>
    <div class="sk-circle8 sk-circle"></div>
    <div class="sk-circle9 sk-circle"></div>
    <div class="sk-circle10 sk-circle"></div>
    <div class="sk-circle11 sk-circle"></div>
    <div class="sk-circle12 sk-circle"></div>
</div>
</div>
</div>
{{--  [ <a href="function_query_repor_print.php" onClick="NewWindow(this.href,'name','400','400','yes');return false">คลิก</a> ]  --}}

    <nav aria-label="breadcrumb">
        <h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/backend/home">&nbsp;&nbsp;หน้าแรก</a></li>
                <li class="breadcrumb-item active" aria-current="page">รายงานและส่งอีเมล์ ผู้แทนองค์กรภาคเอกชน</li>
            </ol>
        </h4>
    </nav>

<div class="card border-info mb-3">

    <div class="card-header">
        <strong>รายงานและส่งอีเมล์ ผู้แทนองค์กรภาคเอกชน</strong>
    </div>
    <div class="card-body">

        @if (!empty($listdocs))
        <div class="form-row">
                <div class="form-group col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th class="text-center">ลำดับ</th>
                                <th class="text-center">เขต</th>
                                <th class="text-center">สถานะ</th>
                                <th class="text-center">วันที่อนุมัติ</th>
                                <th class="text-center">Export Word</th>
                                <th class="text-center">Upload PDF</th>
                                <th class="text-center">ส่งอีเมล์</th>
                            </tr>
                            @foreach($listdocs as $key=>$valdocs)

                            <tr>
                                <td align="middle">
                                    {{$valdocs->section}}
                                        {{-- {{$valgroup->id}} --}}

                                    {{-- @if (!empty($_GET['page']))
                                        {{ $key + ($_GET['page'] - 1) * $listmember->PerPage() + 1  }}
                                    @else
                                        {{$key + 1}}
                                    @endif --}}
                                </td>
                                <td align="middle">
                                    เขต{{$valdocs->section}}
                                </td>


                                <td align="middle">
                                    @php
                                        $list1=DB::table('members')->join('member_details','members.id','=','member_details.memberId')
                                        ->join('ngo_sections','members.provinceId','=','ngo_sections.provinceId')
                                        ->where('members.groupId','=',3)
                                        //->where('members.status_accept','=',1)
                                        ->where('members.confirmed_at', '!=', null)
                                        ->where('ngo_sections.section','=',$valdocs->section)
                                        ->where(function ($query) {
                                            $query->where('members.deleted_at',NULL)
                                            ->where('member_details.deleted_at',NULL);
                                        })
                                        ->get();

                                        $list2=DB::table('members')->join('member_details','members.id','=','member_details.memberId')
                                        ->join('ngo_sections','members.provinceId','=','ngo_sections.provinceId')
                                        ->where('members.groupId','=',3)
                                        //->where('members.status_accept','=',1)
                                        ->where('members.confirmed_at', '!=', null)
                                        ->where('ngo_sections.section','=',$valdocs->section)
                                        ->whereIn('member_details.statusId',[3,4])
                                        ->where(function ($query) {
                                            $query->where('members.deleted_at',NULL)
                                            ->where('member_details.deleted_at',NULL);
                                        })
                                        ->get();

                                        $list3=DB::table('members')->join('member_details','members.id','=','member_details.memberId')
                                        ->join('ngo_sections','members.provinceId','=','ngo_sections.provinceId')
                                        ->where('members.groupId','=',3)
                                        //->where('members.status_accept','=',1)
                                        ->where('members.confirmed_at', '!=', null)
                                        ->where('ngo_sections.section','=',$valdocs->section)
                                        ->whereIn('member_details.statusId',[3,4])
                                        ->where('member_details.fixStatus','=',1)
                                        ->where(function ($query) {
                                            $query->where('members.deleted_at',NULL)
                                            ->where('member_details.deleted_at',NULL);
                                        })
                                        ->select('member_details.approveDate','members.id','members.status_accept','member_details.statusId','member_details.fixStatus')
                                        ->get();

                                        //จำนวนผู้ผ่าน
                                        $list4=DB::table('members')->join('member_details','members.id','=','member_details.memberId')
                                        ->join('ngo_sections','members.provinceId','=','ngo_sections.provinceId')
                                        ->where('members.groupId','=',3)
                                        //->where('members.status_accept','=',1)
                                        ->where('members.confirmed_at', '!=', null)
                                        ->where('ngo_sections.section','=',$valdocs->section)
                                        ->where('member_details.statusId',4)
                                        ->where('member_details.fixStatus','=',1)
                                        ->where(function ($query) {
                                            $query->where('members.deleted_at',NULL)
                                            ->where('member_details.deleted_at',NULL);
                                        })
                                        ->get();
                                    @endphp
                                    {{--  {{count($list1)}} {{count($list2)}} {{count($list3)}} {{count($list4)}}  --}}
                                    @if(count($list1) == 0)
                                        ยังไม่มีผู้สมัครที่ยืนยันการสมัคร
                                    @elseif ((count($list1) == count($list3)) and (count($list1)>0))
                                        อนุมัติแล้ว
                                    @elseif ((count($list1)==count($list2)) and (count($list1)>0))
                                        รอการอนุมัติ
                                    @else
                                        รอการตรวจสอบ
                                    @endif
                                </td>

                                <td align="middle">
                                        @if ((count($list3)==count($list1)) and  (count($list1)>0))
                                        อนุมัติเรียบร้อยเมื่อ <br>
                                        {{ Carbon\Carbon::parse($list3->first()->approveDate)->addYears(543)->format('d/m/Y H:i:s') }}
                                    @endif

                                </td>

                                <td align="middle">
                                    @if (Auth::guard('admin')->user()->can('approve_ngo'))
                                        @if ((count($list3)==count($list1)) and  (count($list1)>0))
                                            @if(count($list1) == count($list4))
                                            @else
                                                @if(count($list4)>0)
                                                <button type="button" class="btn btn-primary" onclick="location.href='{{ asset('backend/approve/wordNGO/'.$valdocs->id) }}'; "><i class="fa fa-file-word-o"></i> Export Word</button>
                                                @endif
                                            @endif
                                        @endif
                                    @endif
                                </td>

                                <td align="middle">
                                    @if (Auth::guard('admin')->user()->can('approve_ngo'))
                                        @if ((count($list3)==count($list1)) and  (count($list1)>0))
                                            @if(count($list1) == count($list4))

                                            @else
                                                @if($valdocs->pdf_complete == NULL)

                                                    {{-- modal --}}
                                                    <a data-toggle="modal" name="gotomodal[]" href="#m-editstatus-{{$key}}" style="display: block;">
                                                    <button type="button" class="btn btn-primary">Upload PDF</button></a>

                                                    <form name="frmupload[]" method="POST" enctype="multipart/form-data" action="{{url('backend/approve/uploadPDFngo/'.$valdocs->id)}}">
                                                    {{ csrf_field() }}

                                                        <div id="m-editstatus-{{$key}}" class="modal fade" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h3 class="modal-title">อัพโหลดไฟล์PDF รายชื่อผู้สมัครที่ลงนามเรียบร้อยแล้ว</h3>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <label for="txtpdf">เลือกไฟล์PDF :</label>
                                                                        <input type="file" name="txtpdf" id="txtpdf" class="form-control" required>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" class="btn btn-primary" id="uploadSpinners">บันทึก</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                @else
                                                    @php
                                                        $filename="";
                                                        $str=explode("/",$valdocs->pdf_complete);
                                                        $filename=$str[2];
                                                    @endphp
                                                    <a href="{{ asset('pdf/doc/ngoCompletePDF'.$valdocs->id.'.pdf') }}" target="_blank">{{$filename}}</a>

                                                    {{-- <a href="/backend/approve/deletePDFsn"><button type="button" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button></a> --}}
                                                    {{-- Button trigger modal --}}

                                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#confirm-{{$key}}">
                                                    <i class="fa fa-trash"></i>
                                                    </button>

                                                    {{-- Modal --}}
                                                    <div class="modal fade" id="confirm-{{$key}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                    <div class="modal-body">
                                                    <h1><span style="color:red; font-size:100px"><i class="fa fa-exclamation-circle"></i></span><br>
                                                    ยืนยันลบไฟล์ PDF ประกาศชื่อผู้ผ่านคุณสมบัติลงนามแล้ว {{$filename}} </h1>
                                                    </div>
                                                    <div class="modal-footer">
                                                    <form action="{{url('backend/approve/deletePDFngo/'.$valdocs->id)}}" method="GET">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก
                                                    </button>
                                                    <button type="submit" class="btn btn-danger">ลบข้อมูล!!</button>
                                                    </form>
                                                    </div>
                                                    </div>
                                                    </div>
                                                    </div>
                                                @endif
                                            @endif
                                        @endif
                                    @endif
                                </td>

                                <td align="middle">
                                    @if (Auth::guard('admin')->user()->can('approve_ngo'))
                                        @if ((count($list3)==count($list1)) and  (count($list1)>0))
                                            @if( $valdocs->pdf_complete != NULL)
                                                @if($valdocs->statusmail == 1)
                                                    <button type="button" class="btn btn-primary" onclick="location.href='{{ asset('backend/approve/mailNGO/'.$valdocs->id) }}'; " id="emailSpinners{{$key+1}}">ส่งอีเมล์อีกครั้ง</button>
                                                    <br>{{ Carbon\Carbon::parse($valdocs>sendmail_date)->addYears(543)->format('d/m/Y H:i:s') }}
                                                @else
                                                    <button type="button" class="btn btn-primary" onclick="location.href='{{ asset('backend/approve/mailNGO/'.$valdocs->id) }}'; " id="emailSpinners{{$key+1}}">ส่งอีเมล์</button>
                                                @endif
                                            @endif
                                        @endif
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            @endif

            {{$key}}
    </div>
</div>

@endsection

@section('js')

<script>

    @if (Session::has('success'))
    toastr.options = {
        closeButton: true,
        progressBar: true,
        showMethod: 'slideDown',
        timeOut: 5000
    };
    toastr.success("{{ Session::get('success') }}", '');
    @endif

    @if (Session::has( 'error' ))
        toastr.options = {
            closeButton: true,
            progressBar: true,
            showMethod: 'slideDown',
            timeOut: 5000
        };
        toastr.error("{{ Session::get('error') }}", '');
    @endif

    @if (Session::has( 'warning' ))
        toastr.options = {
            closeButton: true,
            progressBar: true,
            showMethod: 'slideDown',
            timeOut: 5000
        };
        toastr.warning("{{ Session::get('warning') }}", '');
    @endif

    $(function(){
       $('#emailSpinners1').on('click', function(){
            $('#ibox2').children('.ibox-content').toggleClass('sk-loading');
            $('#ibox2').toggleClass('ibox-active');
        })

        $('#emailSpinners2').on('click', function(){
            $('#ibox2').children('.ibox-content').toggleClass('sk-loading');
            $('#ibox2').toggleClass('ibox-active');
        })

        $('#emailSpinners3').on('click', function(){
            $('#ibox2').children('.ibox-content').toggleClass('sk-loading');
            $('#ibox2').toggleClass('ibox-active');
        })

        $('#emailSpinners4').on('click', function(){
            $('#ibox2').children('.ibox-content').toggleClass('sk-loading');
            $('#ibox2').toggleClass('ibox-active');
        })

        $('#emailSpinners5').on('click', function(){
            $('#ibox2').children('.ibox-content').toggleClass('sk-loading');
            $('#ibox2').toggleClass('ibox-active');
        })

        $('#emailSpinners6').on('click', function(){
            $('#ibox2').children('.ibox-content').toggleClass('sk-loading');
            $('#ibox2').toggleClass('ibox-active');
        })

        $('#emailSpinners7').on('click', function(){
            $('#ibox2').children('.ibox-content').toggleClass('sk-loading');
            $('#ibox2').toggleClass('ibox-active');
        })

        $('#emailSpinners8').on('click', function(){
            $('#ibox2').children('.ibox-content').toggleClass('sk-loading');
            $('#ibox2').toggleClass('ibox-active');
        })

        $('#emailSpinners9').on('click', function(){
            $('#ibox2').children('.ibox-content').toggleClass('sk-loading');
            $('#ibox2').toggleClass('ibox-active');
        })

        $('#emailSpinners10').on('click', function(){
            $('#ibox2').children('.ibox-content').toggleClass('sk-loading');
            $('#ibox2').toggleClass('ibox-active');
        })

        $('#emailSpinners11').on('click', function(){
            $('#ibox2').children('.ibox-content').toggleClass('sk-loading');
            $('#ibox2').toggleClass('ibox-active');
        })

        $('#emailSpinners12').on('click', function(){
            $('#ibox2').children('.ibox-content').toggleClass('sk-loading');
            $('#ibox2').toggleClass('ibox-active');
        })

        $('#emailSpinners13').on('click', function(){
            $('#ibox2').children('.ibox-content').toggleClass('sk-loading');
            $('#ibox2').toggleClass('ibox-active');
        })

        $('#uploadSpinners').on('click', function(){
            $('#ibox2').children('.ibox-content').toggleClass('sk-loading');
            $('#ibox2').toggleClass('ibox-active');
        })

    })


</script>

@endsection
