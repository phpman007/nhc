@extends('backend.theme.master')
@section('title','NHCO ADMIN')

@section('content')

    <nav aria-label="breadcrumb">
        <h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/backend/home">&nbsp;&nbsp;หน้าแรก</a></li>
                <li class="breadcrumb-item active" aria-current="page">แสดงข้อมูลการสมัครผู้แทนองค์กรภาคเอกชน</li>
            </ol>
        </h4>
    </nav>

<div class="card border-info mb-3">

    <div class="card-header">
        <strong>แสดงข้อมูลการสมัคร ผู้แทนองค์กรภาคเอกชน</strong>
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

        <form id="frmsearchngo" method="GET" action="{{url('backend/view/ngoView')}}">
            {{ csrf_field() }}
            <div class="col-md-12">
                <div class="form-group">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="txtname">ค้นหาจาก : </label>
                            <input class="form-control" value="{{request()->input('txtname')}}" name="txtname" id="txtname" placeholder="ค้นหาชื่อ, นามสกุล หรือรหัสผู้สมัคร">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="txtgroup">กลุ่มย่อย : </label>
                            <select id="txtgroup" name="txtgroup[]" class="js-example-basic-multiple form-control" multiple="multiple">

                                @foreach ($listgroupngo as $valgroup)
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
            <div class="col-md-12">
                <div class="form-group">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="txtsection">เขต : </label>
                            <select id="txtsection" name="txtsection[]" onchange="search(1);" class="js-example-basic-multiple form-control" multiple="multiple">
                                @foreach($listsection as $valsection)
                                <option
                                    @for($i=0;$i<$countsection;$i++)
                                        @if(request()->input('txtsection')[$i]!=null && request()->input('txtsection')[$i] == $valsection->section)
                                        selected
                                        @endif
                                    @endfor
                                value={{$valsection->section}}>เขต{{$valsection->section}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="txtprovince">จังหวัด : </label>
                            <select id="txtprovince" class="js-example-basic-multiple form-control" name="txtprovince[]" multiple="multiple">
                                @if(!empty($listprovince))
                                @foreach ($listprovince as $valprovince)
                                <option
                                    @for($i=0;$i<$countprovince;$i++)
                                        @if(request()->input('txtprovince')[$i]!=null && request()->input('txtprovince')[$i] == $valprovince->provinceId)
                                        selected
                                        @endif
                                    @endfor
                                value={{$valprovince->provinceId}}>{{$valprovince->province}}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-md-12">
                <div class="form-group">
                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label for="txtstatus">สถานะ : </label>
                            <select id="txtstatus" name="txtstatus[]" class="js-example-basic-multiple form-control" multiple="multiple">
                                @if($countstatus==1)
                                    <option value="0"  @if(request()->input('txtstatus')[0] == 0) selected @endif>ยังไม่ยืนยันการสมัคร</option>
                                @elseif($countstatus==2)
                                   <option value="0"  @if(request()->input('txtstatus')[0] == 0 or request()->input('txtstatus')[1] == 0) selected @endif>ยังไม่ยืนยันการสมัคร</option>
                                @elseif($countstatus==3)
                                   <option value="0"  @if(request()->input('txtstatus')[0] == 0 or request()->input('txtstatus')[1] == 0 or request()->input('txtstatus')[2] == 0) selected @endif>ยังไม่ยืนยันการสมัคร</option>
                                @else
                                <option value="0">ยังไม่ยืนยันการสมัคร</option>
                                @endif

                                @foreach ($liststatus as $valstatus)
                                    <option
                                        @for($i=0;$i<$countstatus;$i++)
                                            @if(request()->input('txtstatus')[$i]!=null && request()->input('txtstatus')[$i] == $valstatus->id)
                                            selected
                                            @endif
                                        @endfor
                                    value={{$valstatus->id}}>{{$valstatus->status}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="col-md-12">
                <div class="form-group">
                    <div class="form-row">
                        <div class="form-group col-md-12 d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> ค้นหา</button>&nbsp
                            <a href="{{url('backend/view/ngoView')}}"><button type="button" class="btn btn-warning">ล้างคำค้น</button></a>
                        </div>
                    </div>
                </div>
            </div>

        </form>
        <hr>
        <div class="col-md-12">
            <div class="form-group">
                @if($listmember->isEmpty())
                    <h3 class="d-flex justify-content-center">ไม่มีข้อมูล</h3>
                @else
                <div class="d-flex justify-content-end">
                    <form  method="get" action="{{url('backend/view/excelNGO')}}">
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

                        {{--  @if($countstatus==1)
                            <input type="hidden" name="Hstatus[]" value={{request()->input('txtstatus')[0]}}>
                        @elseif($countstatus==2)
                            <input type="hidden" name="Hstatus[]" value={{request()->input('txtstatus')[0]}}>
                            <input type="hidden" name="Hstatus[]" value={{request()->input('txtstatus')[1]}}>
                        @elseif($countstatus==3)
                            <input type="hidden" name="Hstatus[]" value={{request()->input('txtstatus')[0]}}>
                            <input type="hidden" name="Hstatus[]" value={{request()->input('txtstatus')[1]}}>
                            <input type="hidden" name="Hstatus[]" value={{request()->input('txtstatus')[2]}}>
                        @endif  --}}

                        @if($countprovince==1)
                            <input type="hidden" name="Hprovince[]" value={{request()->input('txtprovince')[0]}}>
                        @elseif($countprovince==2)
                            <input type="hidden" name="Hprovince[]" value={{request()->input('txtprovince')[0]}}>
                            <input type="hidden" name="Hprovince[]" value={{request()->input('txtprovince')[1]}}>
                        @elseif($countprovince==3)
                            <input type="hidden" name="Hprovince[]" value={{request()->input('txtprovince')[0]}}>
                            <input type="hidden" name="Hprovince[]" value={{request()->input('txtprovince')[1]}}>
                            <input type="hidden" name="Hprovince[]" value={{request()->input('txtprovince')[2]}}>
                        @endif

                        @if($countsection==1)
                            <input type="hidden" name="Hsection[]" value={{request()->input('txtsection')[0]}}>
                        @elseif($countsection==2)
                            <input type="hidden" name="Hsection[]" value={{request()->input('txtsection')[0]}}>
                            <input type="hidden" name="Hsection[]" value={{request()->input('txtsection')[1]}}>
                        @elseif($countsection==3)
                            <input type="hidden" name="Hsection[]" value={{request()->input('txtsection')[0]}}>
                            <input type="hidden" name="Hsection[]" value={{request()->input('txtsection')[1]}}>
                            <input type="hidden" name="Hsection[]" value={{request()->input('txtsection')[2]}}>
                        @endif
                        <button type="submit" class="btn btn-primary"><i class="fa fa-file-excel-o"></i> Export Excel</button></a>

                    </form>
                </div>
            </div>

                <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <tr align="middle">
                        <th>ลำดับ</th>
                        <th>รหัสผู้สมัคร</th>
                        <th>ชื่อ - นามสกุล</th>
                        <th>เลขบัตรประชาชน</th>
                        <th width="30%">กลุ่มย่อย</th>
                        <th>เขต/จังหวัด</th>
                        <th>วันที่สมัครขั้นตอนที่ 1</th>
                        <th>วันที่ยืนยันการสมัคร</th>
                    </tr>

                    @php $a=0; @endphp

                    @foreach ($listmember as $key=>$valmember)
                        {{-- @if(empty($valmember->confirmed_at)) --}}
                            <tr>
                            <td align="middle">
                                @if (!empty($_GET['page']))
                                    {{ $key + ($_GET['page'] - 1) * $listmember->PerPage() + 1  }}
                                @else
                                    {{$key + 1}}
                                @endif
                            </td>
                            <td align="middle">{{ @ $valmember->docId2}}</td>
                            <td align="middle">
                                <a href="/backend/ngoPreviewV/{{ $valmember->id }}">{{$valmember->nameTitle}}{{$valmember->firstname}}  {{$valmember->lastname}}</a>
                                {{-- {{$valmember->nameTitle}}{{$valmember->firstname}}  {{$valmember->lastname}} --}}

                            </td>
                            <td align="middle">{{ $valmember->personalId}}</td>
                            <td>{{ @ $valmember->groupName}}</td>
                            <td align="middle">{{ @ $valmember->section}} / {{ @ $valmember->province}}</td>
                                    <td>{{ @ \Carbon\Carbon::parse($valmember->created_at)->addYear(543)->format('d/m/Y H:m:i') }}</td>
                                @if($valmember->confirmed_at!=null)
                                    <td>{{ @ \Carbon\Carbon::parse($valmember->confirmed_at)->addYear(543)->format('d/m/Y H:m:i') }}</td>
                                @else
                                    <td align="middle">ยังไม่ยืนยันการสมัคร</td>
                                @endif
                            </tr>
                        {{-- @endif --}}
                    @endforeach
                </table></div>

                <div class="d-flex justify-content-center" style="font-size: 13px !important;"><b>{{ $listmember->links() }}</b></div>

            @endif
        </div>
    </div>
</div>

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

    function search(bt){
        //alert ('AAAA');
        if(bt==1){
            document.getElementById('txtprovince').value="";
            document.getElementById('frmsearchngo').submit();
        }else{
            document.getElementById('frmsearchngo').submit();
        }
    }
</script>
@endsection

