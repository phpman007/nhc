@extends('backend.theme.master')
@section('title','NHCO ADMIN')

@section('content')
@php
    $a=0;

    $countmember1 = 11;
    $countmember2 = 11;
    $countmember3 = 11;
    $countmember4 = 11;
    $countmember5 = 11;
    $countmember6 = 11;

    $name=0;
    $group1=0;
    $group2=0;
    $group3=0;
    $status1=0;
    $status2=0;
    $status3=0;

@endphp
    <nav aria-label="breadcrumb">
        <h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/backend/home">&nbsp;&nbsp;หน้าแรก</a></li>
                <li class="breadcrumb-item active" aria-current="page">ตรวจสอบหลักฐานผู้ทรงคุณวุฒิ</li>
            </ol>
        </h4>
    </nav>

<div class="mainpage">
<div class="card border-info mb-3">

    <div class="card-header">
        <strong>ตรวจสอบหลักฐาน ผู้ทรงคุณวุฒิ</strong>
    </div>
    <div class="card-body">
        <form id="frmsearchcheck" method="GET" action="{{url('backend/check/index')}}">
        {{ csrf_field() }}
        {{-- <div class="col-md-12">
            <div class="form-group">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="txtname">ค้นหาจาก : </label>
                        <input class="form-control" value="{{request()->input('txtname')}}" name="txtname" id="txtname" placeholder="ค้นหาชื่อ, นามสกุล, ชื่อผู้ใช้, อีเมล์ หรือรหัสผู้สมัคร">
                    </div>
                </div>

            <div class="form-group col-md-6">
                <label for="txtgroup">กลุ่มย่อย : </label>
                <select id="txtgroup" name="txtgroup[]" class="js-example-basic-multiple form-control" multiple="multiple">

                    @foreach ($listgroupsn as $valgroup)
                        <option
                            @for($i=0;$i<$countgroup;$i++)
                                @if(request()->input('txtgroup')[$i]!=null && request()->input('txtgroup')[$i] == $valgroup->id)
                                selected
                                @endif
                            @endfor
                        value={{$valgroup->id}}>{{$valgroup->groupName}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div> --}}

        <div class="col-md-12">
            <div class="form-group">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="txtname">ค้นหาจาก : </label>
                        <input class="form-control" value="{{request()->input('txtname')}}" name="txtname" id="txtname" placeholder="ค้นหาชื่อ, นามสกุล, ชื่อผู้ใช้, อีเมล์ หรือรหัสผู้สมัคร">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="txtgroup">กลุ่มย่อย : </label>
                        <select id="txtgroup" name="txtgroup[]" class="js-example-basic-multiple form-control" multiple="multiple">

                            @foreach ($listgroupsn as $valgroup)
                                <option
                                    @for($i=0;$i<$countgroup;$i++)
                                        @if(request()->input('txtgroup')[$i]!=null && request()->input('txtgroup')[$i] == $valgroup->id)
                                        selected
                                        @endif
                                    @endfor
                                value={{$valgroup->id}}>{{$valgroup->groupName}}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <div class="form-row">
                    {{--  <div class="form-group col-md-6">
                        <label for="txtprovince">จังหวัด : </label>
                        <select id="txtprovince" class="js-example-basic-multiple form-control" name="txtprovince[]" multiple="multiple">
                            @foreach ($listprovince as $valprovince)
                            <option
                                @for($i=0;$i<$countprovince;$i++)
                                    @if(request()->input('txtprovince')[$i]!=null && request()->input('txtprovince')[$i] == $valprovince->provinceId)
                                    selected
                                    @endif
                                @endfor
                            value={{$valprovince->provinceId}}>{{$valprovince->province}}</option>
                            @endforeach
                        </select>
                    </div>  --}}

                    <div class="form-group col-md-12">
                        <div class="form-row">
                            <label for="txtstatus">สถานะ : </label>
                            <select id="txtstatus" name="txtstatus[]" class="js-example-basic-multiple form-control" multiple="multiple">
                                {{--  @if($countstatus==1)
                                    <option value="0"  @if(request()->input('txtstatus')[0] == 0) selected @endif>ยังไม่ยืนยันการสมัคร</option>

                                @elseif($countstatus==2)
                                    <option value="0"  @if(request()->input('txtstatus')[0] == 0 or request()->input('txtstatus')[1] == 0) selected @endif>ยังไม่ยืนยันการสมัคร</option>

                                @elseif($countstatus==3)
                                    <option value="0"  @if(request()->input('txtstatus')[0] == 0 or request()->input('txtstatus')[1] == 0 or request()->input('txtstatus')[2] == 0) selected @endif>ยังไม่ยืนยันการสมัคร</option>
                                @else
                                    <option value="0">ยังไม่ยืนยันการสมัคร</option>
                                @endif  --}}
                                @foreach ($liststatus as $valstatus)
                                    @if($valstatus->id != 2)
                                    <option
                                        @for($i=0;$i<$countstatus;$i++)
                                            @if(request()->input('txtstatus')[$i]!=null  && request()->input('txtstatus')[$i] == $valstatus->id)
                                            selected
                                            @endif
                                        @endfor
                                    value={{$valstatus->id}}>{{$valstatus->status}} </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <div class="form-row">
                    <div class="form-group col-md-12 d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> ค้นหา</button>&nbsp
                        <a href="{{url('backend/check/index')}}"><button type="button" class="btn btn-warning">ล้างคำค้น</button></a>
                    </div>
                </div>
            </div>
        </div>
        </form>
        <hr>

        @if($listmember->isEmpty())
            <div class="d-flex justify-content-center"><b>ไม่มีข้อมูล</b></div>
        @else
            <div class="d-flex justify-content-end">
                <form  method="get" action="{{url('backend/check/excelSN')}}">
                    <input type="hidden" name="Hname" value={{request()->input('txtname')}}>
                    @if($countgroup==1)
                        <input type="hidden" name="Hgroup[]" value={{request()->input('txtgroup')[0]}}>
                    @elseif($countgroup==2)
                        <input type="hidden" name="Hgroup[]" value={{request()->input('txtgroup')[0]}}>
                        <input type="hidden" name="Hgroup[]" value={{request()->input('txtgroup')[1]}}>
                    @elseif($countgroup==3)
                        <input type="hidden" name="Hgroup[]" value={{request()->input('txtgroup')[0]}}>
                        <input type="hidden" name="Hgroup[]" value={{request()->input('txtgroup')[1]}}>
                        <input type="hidden" name="Hgroup[]" value={{request()->input('txtgroup')[2]}}>
                    @endif

                    @if($countstatus==1)
                        <input type="hidden" name="Hstatus[]" value={{request()->input('txtstatus')[0]}}>
                    @elseif($countstatus==2)
                        <input type="hidden" name="Hstatus[]" value={{request()->input('txtstatus')[0]}}>
                        <input type="hidden" name="Hstatus[]" value={{request()->input('txtstatus')[1]}}>
                    @elseif($countstatus==3)
                        <input type="hidden" name="Hstatus[]" value={{request()->input('txtstatus')[0]}}>
                        <input type="hidden" name="Hstatus[]" value={{request()->input('txtstatus')[1]}}>
                        <input type="hidden" name="Hstatus[]" value={{request()->input('txtstatus')[2]}}>
                    @endif

                    {{--  @if($countprovince==1)
                        <input type="hidden" name="Hprovince[]" value={{request()->input('txtprovince')[0]}}>
                    @elseif($countprovince==2)
                        <input type="hidden" name="Hprovince[]" value={{request()->input('txtprovince')[0]}}>
                        <input type="hidden" name="Hprovince[]" value={{request()->input('txtprovince')[1]}}>
                    @elseif($countprovince==3)
                        <input type="hidden" name="Hprovince[]" value={{request()->input('txtprovince')[0]}}>
                        <input type="hidden" name="Hprovince[]" value={{request()->input('txtprovince')[1]}}>
                        <input type="hidden" name="Hprovince[]" value={{request()->input('txtprovince')[2]}}>
                    @endif  --}}

                    <button type="submit" class="btn btn-primary"><i class="fa fa-file-excel-o"></i> Export Excel</button></a>
                </form>
            </div>
            <br>
            <div class="col-md-12">
                <div class="form-group">
                    <div class="form-row">

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <tr align="middle">
                                    <th>ลำดับ</th>
                                    <th>รหัสผู้สมัคร</th>
                                    <th>ชื่อ - นามสกุล</th>
                                    <th>เลขบัตรประชาชน</th>
                                    <th>กลุ่มย่อย</th>

                                    {{--  <th>จังหวัด</th>  --}}
                                    <th>สถานะ</th>
                                    <th>พิมพ์</th>
                                    <th>ผู้ที่ตรวจสอบ</th>
                                    {{-- <th>วันที่สมัครขั้นตอนที่ 1</th>
                                    <th>วันที่ยืนยันการสมัคร</th> --}}
                                </tr>

                                @foreach ($listmember as $key=>$valmember)
                                    @if (!empty($valmember->status_accept) and $valmember->status_accept == 1)
                                    {{-- @if (true) --}}
                                    <tr>
                                        <td align="middle">
                                            @if (!empty($_GET['page']))
                                                {{ $key + ($_GET['page'] - 1) * $listmember->PerPage() + 1  }}
                                            @else
                                                {{$key + 1}}
                                            @endif
                                        </td>

                                        <td align="middle">{{ @ $valmember->docId}} </td>

                                        <td align="middle">

                                            @php
                                                $chk1=0; $chk2=0; $chk3=0; $chk4=0; $chk5=0; $chk6=0;

                                                if(request()->input('txtname')!=""){
                                                    $name=request()->input('txtname');
                                                }


                                                    if($countgroup==1){
                                                        $group1=request()->input('txtgroup')[0];
                                                    }elseif($countgroup==2){
                                                        $group1=request()->input('txtgroup')[0];
                                                        $group2=request()->input('txtgroup')[1];
                                                    }elseif($countgroup==3){
                                                        $group1=request()->input('txtgroup')[0];
                                                        $group2=request()->input('txtgroup')[1];
                                                        $group3=request()->input('txtgroup')[2];
                                                    }


                                                    if($countstatus==1){
                                                        $status1=request()->input('txtstatus')[0];
                                                    }elseif($countstatus==2){
                                                        $status1=request()->input('txtstatus')[0];
                                                        $status2=request()->input('txtstatus')[1];
                                                    }elseif($countstatus==3){
                                                        $status1=request()->input('txtstatus')[0];
                                                        $status2=request()->input('txtstatus')[1];
                                                        $status3=request()->input('txtstatus')[2];
                                                    }
                                            @endphp

                                            @if($valmember->seniorGroupId==1)
                                                @if($countmember1 < 10 )
                                                    {{$valmember->nameTitle}}{{$valmember->firstname}}  {{$valmember->lastname}}
                                                @else
                                                    @php
                                                        $chk1=1;
                                                    @endphp
                                                        <a href="/backend/previewRegister/{{ $valmember->id }}/{{$name}}/{{$group1}}/{{$group2}}/{{$group3}}/{{$status1}}/{{$status2}}/{{$status3}}">{{$valmember->nameTitle}}{{$valmember->firstname}}  {{$valmember->lastname}}</a>
                                                @endif
                                            @elseif($valmember->seniorGroupId==2)
                                                @if($countmember2 < 10 )
                                                    {{$valmember->nameTitle}}{{$valmember->firstname}}  {{$valmember->lastname}}
                                                @else
                                                    @php $chk2=1; @endphp
                                                    <a href="/backend/previewRegister/{{ $valmember->id }}/{{$name}}/{{$group1}}/{{$group2}}/{{$group3}}/{{$status1}}/{{$status2}}/{{$status3}}">{{$valmember->nameTitle}}{{$valmember->firstname}}  {{$valmember->lastname}}</a>
                                                @endif
                                            @elseif($valmember->seniorGroupId==3)
                                                @if($countmember3 < 10 )
                                                    {{$valmember->nameTitle}}{{$valmember->firstname}}  {{$valmember->lastname}}
                                                @else
                                                    @php $chk3=1; @endphp
                                                    <a href="/backend/previewRegister/{{ $valmember->id }}/{{$name}}/{{$group1}}/{{$group2}}/{{$group3}}/{{$status1}}/{{$status2}}/{{$status3}}">{{$valmember->nameTitle}}{{$valmember->firstname}}  {{$valmember->lastname}}</a>
                                                @endif
                                            @elseif($valmember->seniorGroupId==4)
                                                @if($countmember4 < 10 )
                                                    {{$valmember->nameTitle}}{{$valmember->firstname}}  {{$valmember->lastname}}
                                                @else
                                                    @php $chk4=1; @endphp
                                                    <a href="/backend/previewRegister/{{ $valmember->id }}/{{$name}}/{{$group1}}/{{$group2}}/{{$group3}}/{{$status1}}/{{$status2}}/{{$status3}}">{{$valmember->nameTitle}}{{$valmember->firstname}}  {{$valmember->lastname}}</a>
                                                @endif
                                            @elseif($valmember->seniorGroupId==5)
                                                @if($countmember5 < 10 )
                                                    {{$valmember->nameTitle}}{{$valmember->firstname}}  {{$valmember->lastname}}
                                                @else
                                                    @php $chk5=1; @endphp
                                                    <a href="/backend/previewRegister/{{ $valmember->id }}/{{$name}}/{{$group1}}/{{$group2}}/{{$group3}}/{{$status1}}/{{$status2}}/{{$status3}}">{{$valmember->nameTitle}}{{$valmember->firstname}}  {{$valmember->lastname}}</a>
                                                @endif
                                            @elseif($valmember->seniorGroupId==6)
                                                @if($countmember6 < 10 )
                                                    {{$valmember->nameTitle}}{{$valmember->firstname}}  {{$valmember->lastname}}
                                                @else
                                                    @php $chk6=1; @endphp
                                                    <a href="/backend/previewRegister/{{ $valmember->id }}/{{$name}}/{{$group1}}/{{$group2}}/{{$group3}}/{{$status1}}/{{$status2}}/{{$status3}}">{{$valmember->nameTitle}}{{$valmember->firstname}}  {{$valmember->lastname}}</a>
                                                @endif
                                            @endif
                                        </td>

                                        <td align="middle">
                                            <span data-toggle="tooltip" rel="tooltip" data-placement="right" title="{{$valmember->email}}">{{ $valmember->personalId }}</span>
                                        </td>

                                        <td>{{ @ $valmember->groupName}}</td>

                                        {{--  <td align="middle">{{ @ $valmember->province}} </td>  --}}
                                        {{-- @if($valmember->detail->zipFile==null or $countmember < 10)
                                            <td></td>
                                        @else
                                            <td align="middle"><button  onclick="window.open('{{ asset('uploads/'.$valmember->detail->zipFile) }}'); location.href='editSN/{{$valmember->id}}';" type="button" class="btn btn-primary">ดาวน์โหลด</button></td> --}}
                                        {{-- @endif --}}
                                        {{--  <td align="middle"><a onclick="location.href='editSN/{{$valmember->id}}'"  href="{{ asset('uploads/'.$valmember->detail->zipFile) }}"><button onclick="location.href = '{{url('backend/check/edit')}}" type="button" class="btn btn-primary">ดาวน์โหลด</button></a></td>  --}}

                                        {{--  สถานะ  --}}
                                        @if (!empty($valmember->status_accept) and $valmember->status_accept == 1)
                                            @php $bbb=0; @endphp
                                            @if(!empty($valmember->fixStatus) and $valmember->fixStatus == 1)
                                                <td align="middle">
                                                    {{-- {{$valmember->status}} --}}
                                                    อนุมัติแล้ว {{$valmember->status}} ไม่สามารถแก้ไขได้
                                                </td>
                                            @else
                                                @if(!empty($valmember->statusId))
                                                    <td align="middle">
                                                        {{-- {{ csrf_field() }} --}}

                                                        @if($chk1==1 and $countmember1 >= 10)
                                                            <a data-toggle="modal" name="gotomodal[]" href="#m-editstatus-{{$key}}" style="display: none;"> test {{$key}} </a>
                                                            <form name="frmstatuschange[]" method="GET" action="{{url('backend/check/editstatusSN')}}">
                                                                <select data-default="{{ @ $valmember->statusId}}" name="txtstatuschange[]" class="form-control" onchange="editstatus('{{$a}}', this);" @if($valmember->fixStatus==1) disabled="disabled" @endif>
                                                                    @foreach ($liststatus as $valstatus)
                                                                        @if($valstatus->id !=2)
                                                                        <option @if( $valmember->statusId == $valstatus->id) selected @endif
                                                                        value={{$valstatus->id}} >{{$valstatus->status}}</option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                                @php $a++; @endphp
                                                            <input type="hidden" name="Hid[]" id="Hid" value={{$valmember->id}}>
                                                            </form>

                                                        @elseif($chk2==1 and $countmember2 >= 10)
                                                            <a data-toggle="modal" name="gotomodal[]" href="#m-editstatus-{{$key}}" style="display: none;"> test {{$key}} </a>
                                                            <form name="frmstatuschange[]" method="GET" action="{{url('backend/check/editstatusSN')}}">
                                                                <select data-default="{{ @ $valmember->statusId}}" name="txtstatuschange[]" class="form-control" onchange="editstatus('{{$a}}', this);" @if($valmember->fixStatus==1) disabled="disabled" @endif>
                                                                    @foreach ($liststatus as $valstatus)
                                                                        @if($valstatus->id !=2)
                                                                        <option @if( $valmember->statusId == $valstatus->id) selected @endif
                                                                        value={{$valstatus->id}} >{{$valstatus->status}}</option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                                @php $a++; @endphp
                                                            <input type="hidden" name="Hid[]" id="Hid" value={{$valmember->id}}>
                                                            </form>

                                                        @elseif($chk3==1 and $countmember3 >= 10)
                                                            <a data-toggle="modal" name="gotomodal[]" href="#m-editstatus-{{$key}}" style="display: none;"> test {{$key}} </a>
                                                            <form name="frmstatuschange[]" method="GET" action="{{url('backend/check/editstatusSN')}}">
                                                                <select data-default="{{ @ $valmember->statusId}}" name="txtstatuschange[]" class="form-control" onchange="editstatus('{{$a}}', this);" @if($valmember->fixStatus==1) disabled="disabled" @endif>
                                                                    @foreach ($liststatus as $valstatus)
                                                                        @if($valstatus->id !=2)
                                                                        <option  @if( $valmember->statusId == $valstatus->id) selected @endif
                                                                        value={{$valstatus->id}} >{{$valstatus->status}}</option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                                @php $a++; @endphp
                                                            <input type="hidden" name="Hid[]" id="Hid" value={{$valmember->id}}>
                                                            </form>

                                                        @elseif($chk4==1 and $countmember4 >= 10)
                                                            <a data-toggle="modal" name="gotomodal[]" href="#m-editstatus-{{$key}}" style="display: none;"> test {{$key}} </a>
                                                            <form name="frmstatuschange[]" method="GET" action="{{url('backend/check/editstatusSN')}}">
                                                                <select data-default="{{ @ $valmember->statusId}}" name="txtstatuschange[]" class="form-control" onchange="editstatus('{{$a}}', this);" @if($valmember->fixStatus==1) disabled="disabled" @endif>
                                                                    @foreach ($liststatus as $valstatus)
                                                                        @if($valstatus->id !=2)
                                                                        <option  @if( $valmember->statusId == $valstatus->id) selected @endif
                                                                        value={{$valstatus->id}} >{{$valstatus->status}}</option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                                @php $a++; @endphp
                                                            <input type="hidden" name="Hid[]" id="Hid" value={{$valmember->id}}>
                                                            </form>

                                                        @elseif($chk5==1 and $countmember5 >= 10)
                                                                <a data-toggle="modal" name="gotomodal[]" href="#m-editstatus-{{$key}}" style="display: none;"> test {{$key}} </a>
                                                                <form name="frmstatuschange[]" method="GET" action="{{url('backend/check/editstatusSN')}}">
                                                                    <select data-default="{{ @ $valmember->statusId}}" name="txtstatuschange[]" class="form-control" onchange="editstatus('{{$a}}', this);" @if($valmember->fixStatus==1) disabled="disabled" @endif>
                                                                        @foreach ($liststatus as $valstatus)
                                                                            @if($valstatus->id !=2)
                                                                            <option @if( $valmember->statusId == $valstatus->id) selected @endif
                                                                            value={{$valstatus->id}} >{{$valstatus->status}}</option>
                                                                            @endif
                                                                        @endforeach
                                                                    </select>
                                                                    @php $a++; @endphp
                                                                <input type="hidden" name="Hid[]" id="Hid" value={{$valmember->id}}>
                                                                </form>

                                                        @elseif($chk6==1 and $countmember6 >= 10)
                                                            <a data-toggle="modal" name="gotomodal[]" href="#m-editstatus-{{$key}}" style="display: none;"> test {{$key}} </a>
                                                            <form name="frmstatuschange[]" method="GET" action="{{url('backend/check/editstatusSN')}}">
                                                                <select data-default="{{ @ $valmember->statusId}}" name="txtstatuschange[]" class="form-control" onchange="editstatus('{{$a}}', this);" @if($valmember->fixStatus==1) disabled="disabled" @endif>
                                                                    @foreach ($liststatus as $valstatus)
                                                                        @if($valstatus->id !=2)
                                                                        <option @if( $valmember->statusId == $valstatus->id) selected @endif
                                                                        value={{$valstatus->id}} >{{$valstatus->status}}</option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                                @php $a++; @endphp
                                                            <input type="hidden" name="Hid[]" id="Hid" value={{$valmember->id}}>
                                                            </form>

                                                        @else
                                                            {{-- {{$valmember->status}} --}}
                                                            @php $bbb=1; @endphp
                                                            ผู้สมัครไม่ถึง 10 คน
                                                        @endif

                                                        <form name="frmnotpass[]" method="GET" action="{{url('backend/check/editnotpassSN')}}">
                                                        {{ csrf_field() }}
                                                            <input type="hidden" name="Hidmember[]" value={{$valmember->id}}>

                                                            <div id="m-editstatus-{{$key}}" class="modal fade" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h3 class="modal-title">กำหนดเหตุผลสถานะไม่ผ่าน</h3>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <label for="txtreason[]">เหตุผลสถานะไม่ผ่าน :</label>
                                                                            <textarea name="txtreason[]" rows="10" class="form-control" required></textarea>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="submit" class="btn btn-primary">บันทึก</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </td>
                                                @endif
                                            @endif
                                        @else
                                            <td align="middle">ยังไม่ยืนยันการสมัคร</td>
                                        @endif

                                        {{--  ปุ่มพิมพ์  --}}
                                        @if (!empty($valmember->docId))
                                            {{-- @if($bbb==1)
                                                <td></td>
                                            @else --}}
                                                <td align="middle"><button type="button" class="btn btn-primary" onclick="window.open('{{url('backend/pdf/'.$valmember->id)}}');">พิมพ์</button></td>
                                            {{-- @endif --}}
                                        @else
                                            <td></td>
                                        @endif

                                        {{--  ผู้ที่ตรวจสอบ  --}}
                                        @if (!empty($valmember->username))
                                            <td align="middle">{{ @ $valmember->username }}<br>{{ \Carbon\Carbon::parse($valmember->updateStatusTime)->addYears(543)->format('d/m/Y H:i:s') }}</td>
                                        @else
                                            <td align="middle">ไม่มีข้อมูล</td>
                                        @endif

                                        {{-- <td>{{ @ \Carbon\Carbon::parse($valmember->created_at)->format('d/m/Y H:m:i') }}</td>
                                        <td>{{ @ \Carbon\Carbon::parse($valmember->confirmed_at)->format('d/m/Y H:m:i') }}</td> --}}

                                    </tr>
                                    @endif
                                @endforeach
                            </table>
                        </div>
                    </div>
                        <div class="d-flex justify-content-center"><b>{{ $listmember->links() }}</b></div>
                        {{-- <div class="text-center">
                            @if(Auth::guard('admin')->user()->hasRole('super-admin'))
                                @if($countmember>=10)
                                <a href="/backend/check/editfixstatusSN"><button type="button" style="width:1200px" class="btn btn-primary"><i class="fa fa-check-circle-o"></i> ยืนยันการอนุมัติทั้งหมด</button></a>
                                @endif
                            @endif
                        </div> --}}
                </div>
            </div>
        @endif
    </div>
</div>
</div>

{{-- <div class="wrapper wrapper-content animated fadeIn">
        <div class="row">
            <div class="col-lg-6">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Alerts Styles</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#" class="dropdown-item">Config option 1</a>
                            </li>
                            <li><a href="#" class="dropdown-item">Config option 2</a>
                            </li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                        <div class="alert alert-success">
                            How quickly daft jumping zebras vex. <a class="alert-link" href="#">Alert Link</a>.
                        </div>
                        <div class="alert alert-info">
                            How quickly daft jumping zebras vex. <a class="alert-link" href="#">Alert Link</a>.
                        </div>
                        <div class="alert alert-warning">
                            How quickly daft jumping zebras vex. <a class="alert-link" href="#">Alert Link</a>.
                        </div>
                        <div class="alert alert-danger">
                            How quickly daft jumping zebras vex. <a class="alert-link" href="#">Alert Link</a>.
                        </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Dismissable Alerts</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#" class="dropdown-item">Config option 1</a>
                            </li>
                            <li><a href="#" class="dropdown-item">Config option 2</a>
                            </li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                        <div class="alert alert-success alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            A wonderful serenity has taken possession. <a class="alert-link" href="#">Alert Link</a>.
                        </div>
                        <div class="alert alert-info alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            A wonderful serenity has taken possession. <a class="alert-link" href="#">Alert Link</a>.
                        </div>
                        <div class="alert alert-warning alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            A wonderful serenity has taken possession. <a class="alert-link" href="#">Alert Link</a>.
                        </div>
                        <div class="alert alert-danger alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            A wonderful serenity has taken possession. <a class="alert-link" href="#">Alert Link</a>.
                        </div>
                </div>
            </div>
        </div>
        </div>
        <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Tooltips and Popovers</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#" class="dropdown-item">Config option 1</a>
                            </li>
                            <li><a href="#" class="dropdown-item">Config option 2</a>
                            </li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content text-center">
                    <h4>Tooltip Demo <small>Background color more gentle.</small></h4>
                    <div class="tooltip-demo">
                        <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="left" title="Tooltip on left">Tooltip on left</button>
                        <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Tooltip on top">Tooltip on top</button>
                        <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Tooltip on bottom">Tooltip on bottom</button>
                        <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="right" title="Tooltip on right">Tooltip on right</button>
                    </div>
                    <br>
                    <h4>Clickable Popover Demo</h4>
                    <div class="tooltip-demo text-center" >
                        <button type="button" class="btn btn-primary"  data-toggle="popover" data-placement="left" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
                            Popover on left
                        </button>
                        <button type="button" class="btn btn-primary"  data-toggle="popover" data-placement="top" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
                            Popover on top
                        </button>
                        <button type="button" class="btn btn-primary"  data-toggle="popover" data-placement="bottom" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
                            Popover on bottom
                        </button>
                        <button type="button" class="btn btn-primary" data-toggle="popover" data-placement="right" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
                            Popover on right
                        </button>
                    </div>
                </div>
            </div>
        </div>

        </div>
    </div>
</div> --}}
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
    timeOut: 3000
};
toastr.success("{{ Session::get('success') }}", '');
@endif

@if (Session::has( 'error' ))
    toastr.options = {
        closeButton: true,
        progressBar: true,
        showMethod: 'slideDown',
        timeOut: 3000
    };
    toastr.error("{{ Session::get('error') }}", '');
@endif
@if (Session::has( 'sendemail' ))
toastr.options = {
    closeButton: true,
    progressBar: true,
    showMethod: 'slideDown',
    timeOut: 3000
};
toastr.success("{{ Session::get('sendemail') }}", '');
@endif

var select_element;
function editstatus(id, element){

    select_element = element
    var status = document.getElementsByName('txtstatuschange[]')[id].value;
    console.log(status)

    if(status==4){
        document.getElementsByName('gotomodal[]')[id].click();
    }else{
        document.getElementsByName('frmstatuschange[]')[id].submit();
    }

    $('#m-editstatus-'+id).on('hidden.bs.modal', function() {
        console.log($(select_element).val($(select_element).data('default')))
    });
}

    /*function NewWindow(mypage,myname,w,h,scroll){
        var win = null;
        LeftPosition = (screen.width) ? (screen.width-w)/2 : 0;
        TopPosition = (screen.height) ? (screen.height-h)/2 : 0;
        settings =
        'height='+h+',width='+w+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+',resizable'
        win = window.open(mypage,myname,settings)
    }*/

            $( document ).ready(function() {
                $('[data-toggle="tooltip"]');
            });

</script>

<style>
    .mainpage {
            /* font-size: 2em; */
            /* font-family: "THSarabunPSK"; */
            sans-serif;
            font-size: 1.2em;
        }

        /* html {
            font-size: 18px;
        } */

        /* .aaa { */
            /* font-size: 2em; */
            /* font-family: "THSarabunPSK";
            sans-serif;
            font-size: 1.2em;
        } */

        /* .bbb { */
            /* font-size: 2em; */
            /* font-family: "THSarabunPSK";
            sans-serif;
            font-size: 1.3em;
        } */

        /* .ccc { */
            /* font-size: 2em; */
            /* font-family: "THSarabunPSK";
            sans-serif;
            font-size: 0.8em;
        } */

</style>

@endsection

