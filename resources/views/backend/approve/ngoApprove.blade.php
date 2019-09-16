@extends('backend.theme.master')
@section('title','NHCO ADMIN')

@section('content')

    <nav aria-label="breadcrumb">
        <h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/backend/home">&nbsp;&nbsp;หน้าแรก</a></li>
                <li class="breadcrumb-item active" aria-current="page">อนุมัติผู้สมัครผู้แทนองค์กรภาคเอกชน</li>
            </ol>
        </h4>
    </nav>

<div class="card border-info mb-3">

    <div class="card-header">
        <strong>อนุมัติผู้สมัคร ผู้แทนองค์กรภาคเอกชน</strong>
    </div>
    <div class="card-body">
        @if(empty(json_decode(Auth::guard('admin')->user()->sectionControl)))
            ผู้ใช้ไม่มีสิทธิ์ใช้งาน กรุณากำหนดสิทธิ์การใช้งาน
        @else
            <form id="frmsearchapprove" method="get" action="{{url('backend/approve/ngoApprove/index')}}">
            {{ csrf_field() }}
                <div class="form-row">
                    <div class="form-group col-md-6">

                        <label for="txtsection">เขต : </label>
                        <select id="txtsection" class="form-control" name="txtsection" onchange="search(1);">
                            <option @if(request()->input('txtsection')==null)
                                    selected
                                    @endif value="">เลือกเขต</option>
                            <option @if(request()->input('txtsection')==1)
                                    selected
                                    @endif value="1">เขต1</option>
                            <option @if(request()->input('txtsection')==2)
                                    selected
                                    @endif value="2">เขต2</option>
                            <option @if(request()->input('txtsection')==3)
                                    selected
                                    @endif value="3">เขต3</option>
                            <option @if(request()->input('txtsection')==4)
                                    selected
                                    @endif value="4">เขต4</option>
                            <option @if(request()->input('txtsection')==5)
                                    selected
                                    @endif value="5">เขต5</option>
                            <option @if(request()->input('txtsection')==6)
                                    selected
                                    @endif value="6">เขต6</option>
                            <option @if(request()->input('txtsection')==7)
                                    selected
                                    @endif value="7">เขต7</option>
                            <option @if(request()->input('txtsection')==8)
                                    selected
                                    @endif value="8">เขต8</option>
                            <option @if(request()->input('txtsection')==9)
                                    selected
                                    @endif value="9">เขต9</option>
                            <option @if(request()->input('txtsection')==10)
                                    selected
                                    @endif value="10">เขต10</option>
                            <option @if(request()->input('txtsection')==11)
                                    selected
                                    @endif value="11">เขต11</option>
                            <option  @if(request()->input('txtsection')==12)
                                    selected
                                    @endif value="12">เขต12</option>
                            <option @if(request()->input('txtsection')==13)
                                    selected
                                    @endif value="13">เขต13</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="txtprovince">จังหวัด : </label>
                        <select id="txtprovince" class="form-control" name="txtprovince" onchange="search(2);">
                            <option
                                @if(request()->input('txtprovince')==null)
                                selected
                                @endif
                                value="" >
                                เลือกจังหวัด
                            </option>
                            @if(!empty($listprovince))
                            @foreach ($listprovince as $valprovince)
                            <option
                                    @if(request()->input('txtprovince')!=null && request()->input('txtprovince') == $valprovince->provinceId)
                                    selected
                                    @endif
                                    value={{$valprovince->provinceId}}> {{$valprovince->province}}
                            </option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                </div>
            </form>
            <hr>

            @if (!empty($listgroupngo) )
            <div class="form-row">
                    <div class="form-group col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <tr>
                                    <th class="text-center">ลำดับ</th>
                                    <th class="text-center" width="50%">กลุ่มย่อย</th>
                                    <th class="text-center">สถานะ</th>
                                    <th class="text-center">วันที่อนุมัติ</th>
                                    {{-- <th class="text-center">ส่งอีเมล์</th>
                                    <th class="text-center">Export Word</th> --}}
                                </tr>
                                @foreach ($listgroupngo as $key=>$valgroup)
                                    @php

                                    //จำนวนยืนยันทั้งหมด
                                    $list1=$valgroup
                                    ->member()
                                    ->join('member_details','members.id','=','member_details.memberId')
                                    ->where('members.groupId','=',3)
                                    ->where('members.provinceId','=',request()->input('txtprovince'))
                                    ->where('members.ngoGroupId','=',$valgroup->id)
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
                                    ->where('members.groupId','=',3)
                                    ->where('members.provinceId','=',request()->input('txtprovince'))
                                    ->where('members.ngoGroupId','=',$valgroup->id)
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
                                    ->where('members.groupId','=',3)
                                    ->where('members.provinceId','=',request()->input('txtprovince'))
                                    ->where('members.ngoGroupId','=',$valgroup->id)
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

                                    <tr>
                                        <td align="middle">
                                            @if (!empty($_GET['page']))
                                                {{ $key + ($_GET['page'] - 1) * $listmember->PerPage() + 1  }}
                                            @else
                                                {{$key + 1}}
                                            @endif
                                        </td>

                                        <td>
                                            @if((count($list1) == count($list2)) and (count($list1)>0))
                                                <a href="/backend/approveAll/ngoApproveAll/{{ request()->input('txtprovince') }}/{{$valgroup->id}}/{{ request()->input('txtsection') }}">{{$valgroup->groupName}}</a>
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
                                            @endif

                                        </td>

                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
                @endif
        </div>
        @endif
</div>



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
        toastr.success('แก้ไขสถานะเรียบร้อยแล้ว', '');
    @endif
    @if (Session::has( 'error' ))
        toastr.options = {
            closeButton: true,
            progressBar: true,
            showMethod: 'slideDown',
            timeOut: 2000
        };
        toastr.error('แก้ไขสถานะไม่ได้!!!', '');
    @endif
    @if (Session::has( 'sendemail' ))
    toastr.options = {
        closeButton: true,
        progressBar: true,
        showMethod: 'slideDown',
        timeOut: 3000
    };
    toastr.success('แก้ไขสถานะ และส่งอีเมล์แจ้งเรียบร้อยแล้ว', '');
    @endif

    function search(bt){
        if(bt==1){
            document.getElementById('txtprovince').value="";
            document.getElementById('frmsearchapprove').submit();
        }else{
            document.getElementById('frmsearchapprove').submit();
        }
        // alert ('AAAA');
    }

</script>

@endsection


