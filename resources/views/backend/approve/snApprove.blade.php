@extends('backend.theme.master')
@section('title','NHCO ADMIN')

@section('content')
{{--  [ <a href="function_query_repor_print.php" onClick="NewWindow(this.href,'name','400','400','yes');return false">คลิก</a> ]  --}}

    <nav aria-label="breadcrumb">
        <h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/backend/home">&nbsp;&nbsp;หน้าแรก</a></li>
                <li class="breadcrumb-item active" aria-current="page">อนุมัติผู้สมัครผู้ทรงคุณวุฒิ</li>
            </ol>
        </h4>
    </nav>

<div class="card border-info mb-3">

    <div class="card-header">
        <strong>อนุมัติผู้สมัคร ผู้ทรงคุณวุฒิ</strong>
    </div>
    <div class="card-body">

        @if (!empty($listgroupsn))
        <div class="form-row">
                <div class="form-group col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th class="text-center">ลำดับ</th>
                                <th class="text-center">กลุ่มย่อย</th>
                                <th class="text-center">สถานะ</th>
                                <th class="text-center">วันที่อนุมัติ</th>
                                {{-- <th class="text-center">Export Word</th>
                                <th class="text-center">Upload PDF</th>
                                <th class="text-center">ส่งอีเมล์</th> --}}
                            </tr>
                            @foreach ($listgroupsn as $key=>$valgroup)

                                @php
                                    //จำนวนยืนยันทั้งหมด
                                    $list1=$valgroup
                                    ->member()
                                    ->join('member_details','members.id','=','member_details.memberId')
                                    ->where('members.groupId','=',1)
                                    ->where('members.seniorGroupId','=',$valgroup->id)
                                    //->where('members.status_accept','=',1)
                                    ->where('members.confirmed_at', '!=', null)
                                    ->where(function ($query) {
                                        $query->where('members.deleted_at',NULL)
                                        ->where('member_details.deleted_at',NULL);
                                    })
                                    ->get();

                                    //จำนวนยืนยัน และสถานะผ่าน หรือไม่ผ่าน
                                    $list2=$valgroup
                                    ->member()
                                    ->join('member_details','members.id','=','member_details.memberId')
                                    ->where('members.groupId','=',1)
                                    ->where('members.seniorGroupId','=',$valgroup->id)
                                    //->where('members.status_accept','=',1)
                                    ->where('members.confirmed_at', '!=', null)
                                    ->whereIn('member_details.statusId',[3,4])
                                    ->where(function ($query) {
                                        $query->where('members.deleted_at',NULL)
                                        ->where('member_details.deleted_at',NULL);
                                    })
                                    ->get();

                                    //จำนวนยืนยัน และสถานะผ่านไม่ผ่าน และอนุมัติแล้ว
                                    $list3=$valgroup
                                    ->member()
                                    ->join('member_details','members.id','=','member_details.memberId')
                                    ->where('members.groupId','=',1)
                                    ->where('members.seniorGroupId','=',$valgroup->id)
                                    //->where('members.status_accept','=',1)
                                    ->where('members.confirmed_at', '!=', null)
                                    ->whereIn('member_details.statusId',[3,4])
                                    ->where('member_details.fixStatus','=',1)
                                    ->where(function ($query) {
                                        $query->where('members.deleted_at',NULL)
                                        ->where('member_details.deleted_at',NULL);
                                    })
                                    ->get();
                                @endphp

                                {{-- {{dd($list->approveDate[2])}} --}}

                            <tr>
                                <td align="middle">
                                        {{-- {{$valgroup->id}} --}}

                                    @if (!empty($_GET['page']))
                                        {{ $key + ($_GET['page'] - 1) * $listmember->PerPage() + 1  }}
                                    @else
                                        {{$key + 1}}
                                    @endif
                                </td>
                                <td>
                                    @if((count($list1) == count($list2)) and (count($list1)>0))
                                        <a href="/backend/approveAll/snApproveSearch/{{$valgroup->id}}">{{$valgroup->groupName}}</a>
                                    @else
                                        {{$valgroup->groupName}}
                                    @endif
                                </td>


                                <td align="middle">
                                     {{-- count1 {{count($list1)}} count2 {{count($list2)}} count3 {{count($list3)}}
                                    <br><br> --}}
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
                                        {{-- {{ $list4->first()->approveDate->format('d') }} / {{ Helper::monthThai($list4->first()->approveDate->format('m')) }} /{{ $list4->first()->approveDate->addYears(543)->format('Y') }} --}}
                                    @endif

                                </td>

                                {{-- <td align="middle">
                                    @if (Auth::guard('admin')->user()->can('approve_professional'))
                                        @if (count($list3)==count($list1))
                                        <button type="button" class="btn btn-primary" onclick="location.href='{{ asset('backend/approve/wordSN/'.$valgroup->id) }}'; "><i class="fa fa-file-word-o"></i> Export Word</button>
                                        @endif
                                    @endif
                                </td>

                                <td align="middle">
                                    @if (Auth::guard('admin')->user()->can('approve_professional'))
                                        @if (count($list3)==count($list1))
                                        <button type="button" class="btn btn-primary" onclick="location.href='{{ asset('backend/approve/uploadPDFsn/'.$valgroup->id) }}'; ">Upload PDF</button>
                                        @endif
                                    @endif
                                </td>

                                <td align="middle">
                                    @if (Auth::guard('admin')->user()->can('approve_professional'))
                                        @if (count($list3)==count($list1))
                                            <button type="button" class="btn btn-primary" onclick="location.href='{{ asset('backend/approve/pdfSN/'.$valgroup->id) }}'; ">ส่งอีเมล์</button>
                                        @endif
                                    @endif
                                </td> --}}
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            @endif

    </div>
</div>

{{-- {{count($list)}} {{count($list2)}} --}}

@endsection

@section('js')

<script>
    $(function(){
        $('.js-example-basic-multiple').select2({
        maximumSelectionLength: 3
        });
    });

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

    function search(){
        document.getElementById('frmsearchapprove').submit();
    }

</script>

@endsection
