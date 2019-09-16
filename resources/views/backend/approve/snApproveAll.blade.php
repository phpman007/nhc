@extends('backend.theme.master')
@section('title','NHCO ADMIN')

@section('content')

    <nav aria-label="breadcrumb">
        <h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/backend/home">&nbsp;&nbsp;หน้าแรก</a></li>
                <li class="breadcrumb-item"><a href="/backend/approve/snApprove">อนุมัติผู้สมัครผู้ทรงคุณวุฒิ</a></li>
                <li class="breadcrumb-item active" aria-current="page">รายละเอียดการอนุมัติผู้ทรงคุณวุฒิ</li>
            </ol>
        </h4>
    </nav>

<div class="card border-info mb-3">

    <div class="card-header">
        <strong>อนุมัติผู้สมัคร ผู้ทรงคุณวุฒิ</strong>
    </div>
    <div class="card-body">
        @if(session('flash_message')=="ok")
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="glyphicon glyphicon-ok"></span><i>แก้ไขสถานะเรียบร้อยแล้ว</i>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        @elseif(session('flash_message')=="not")
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <span class="glyphicon glyphicon-ok"></span><i>แก้ไขสถานะไม่ได้!!!</i>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        @endif
            @php  $idgroup=request()->idgroup; @endphp
        <form id="frmsearchsnapproveall" method="GET" action="{{url('backend/approveAll/snApproveSearch/'.$idgroup)}}">
            {{ csrf_field() }}


            <div class="col-md-12">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="txtname">ค้นหาจาก : </label>
                                <input class="form-control" value="{{request()->input('txtname')}}" name="txtname" id="txtname" placeholder="ค้นหาชื่อ, สกุล หรือรหัสเผู้สมัคร">
                            </div>
                        <div class="form-group col-md-12 d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> ค้นหา</button>&nbsp
                            <a href="{{url('backend/approveAll/snApproveSearch/'.$idgroup)}}"><button type="button" class="btn btn-warning">ล้างข้อมูล</button></a>
                        </div>
                    </div>
                </div>
            </div>

        </form>
        <hr>
        @if($listmember->isEmpty())
            <div class="text-center text-danger"><strong>** ไม่มีข้อมูล **</strong></div>
        @else
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <tr align="middle">
                        <th>ลำดับ</th>
                        <th>รหัสผู้สมัคร</th>
                        <th>ชื่อ - สกุล</th>
                        <th>เลขที่บัตรประชาชน</th>
                        <th width="30%">กลุ่มย่อย</th>
                        {{-- <th>ดาวน์โหลด</th> --}}
                        <th>สถานะ</th>
                        <th>ผู้ที่ตรวจสอบ</th>
                    </tr>
                    @foreach ($listmember as $key=>$valmember)
                        <tr>
                        <td align="middle">
                            @if (!empty($_GET['page']))
                                {{ $key + ($_GET['page'] - 1) * $listmember->PerPage() + 1  }}
                            @else
                                {{$key + 1}}
                            @endif
                        </td>
                        <td align="middle">{{@ $valmember->docId}}</td>

                        <td align="middle">
                            {{-- <a href="/backend/ngoPreview/{{ $valmember->id }}/2/{{ request()->idprovince }}/{{ request()->idgroup }}"> --}}
                                  {{--  <a href="/backend/ngoPreview/{{ $valmember->id }}/2/{{ request()->idprovince }}/{{ request()->idgroup }}">  --}}
                                {{$valmember->nameTitle}}{{$valmember->firstname}}  {{$valmember->lastname}}
                          {{--  </a>  --}}
                            {{-- </a> --}}
                        </td>
                        <td align="middle">{{ $valmember->personalId}}</td>
                        <td>{{ @ $valmember->groupName}}</td>
                        <td align="middle">

                            @if(!empty($valmember->statusId))
                                @if($valmember->statusId != 0)
                                    @if($valmember->statusId == 4)
                                        <span title="{{ @ $valmember->reason}}">{{ @ $valmember->status}} </span>
                                    @else
                                        {{ @ $valmember->status}}
                                    @endif
                                @else
                                    ยังไม่ยืนยันการสมัคร
                                @endif</td>
                            @endif
                        </td>
                        <td align="middle">{{ @ $valmember->username }} <br> {{ \Carbon\Carbon::parse(@ $valmember->updateStatusTime)->addYears(543)->format('d/m/Y H:m:i') }}</td>
                        {{-- date('d-m-Y', strtotime($user->from_date)); \Carbon\Carbon::parse($user->from_date)->format('d/m/Y') --}}
                        </tr>
                    @endforeach
                </table>
            </div>
            {{-- <div class="d-flex justify-content-center" style="font-size: 13px !important;"> --}}
            <div class="col-md-12 col-sm-6 d-flex justify-content-center">
                    <div class="row">
                        {{--  1={{count($list2)}}  2={{count($list3)}} 3={{count($list4)}} {{count($listmember)}}  --}}
                        @if(count($list4)==count($list2))
                            <div class="text-warning"><strong>** กลุ่มนี้ได้รับการอนุมัติเป็นที่เรียบร้อยแล้ว **</strong></div>
                        @elseif(count($list2) == count($list3))
                            @if(Auth::guard('admin')->user()->hasRole('super-admin'))
                                <a href="/backend/approve/editfixstatusSN/{{request()->idgroup}}"><button type="button" style="width:500px" class="btn btn-primary"><i class="fa fa-check-circle-o"></i> ยืนยันการอนุมัติทั้งหมด</button></a>
                            @endif
                        @else
                            <div class="text-danger"><strong>** ยังไม่สามารถยืนยันการอนุมัติทั้งหมดได้ กรุณาแก้ไขสถานะให้เป็นผ่าน หรือไม่ผ่านทั้งหมดก่อน **</strong></div>
                        @endif
                    </div>

            </div><br><br>
            <div class="d-flex justify-content-center" style="font-size: 13px important;">

                <b>{{ $listmember->links() }}</b>
            </div>

        @endif

    </div>
</div>

{{-- {{count($liststatus2)}} {{count($liststatus3)}} --}}

@endsection

@section('js')
<script>
    $(function(){
        $('.js-example-basic-multiple').select2({
        maximumSelectionLength: 3
        });
    })

    @if (Session::has('success'))
    toastr.options = {
        closeButton: true,
        progressBar: true,
        showMethod: 'slideDown',
        timeOut: 2000
    };
    toastr.success("{{ Session::get('success') }}", '');
    @endif

    @if (Session::has( 'error' ))
        toastr.options = {
            closeButton: true,
            progressBar: true,
            showMethod: 'slideDown',
            timeOut: 2000
        };
        toastr.error("{{ Session::get('error') }}", '');
    @endif

    @if (Session::has( 'warning' ))
        toastr.options = {
            closeButton: true,
            progressBar: true,
            showMethod: 'slideDown',
            timeOut: 2000
        };
        toastr.warning("{{ Session::get('warning') }}", '');
    @endif

</script>
@endsection
