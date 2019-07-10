@extends('backend.theme.master')
@section('title','NHCO ADMIN')

@section('content')

<div class="card border-info mb-3">

    <div class="card-header">
        <strong>ตรวจสอบหลักฐาน ผู้แทนองค์กรส่วนท้องถิ่น</strong>
    </div>
    <div class="card-body">
        @if(session('flash_message')=="ok")
            {{-- <div class="alert alert-success alert-dismissible fade show"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div> --}}
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

        <form id="frmsearchorcheck" method="post" action="{{url('backend/check/orCheck')}}">
        {{ csrf_field() }}
            <div class="form-row">

                <div class="form-group col-md-6">
                <label for="txtname">ค้นหาจาก : </label>
                <input class="form-control" @if(request()->input('ok')=="1") value="{{request()->input('txtname')}}" @else value="" @endif
                name="txtname" id="txtname" placeholder="ค้นหาชื่อ, สกุล หรือรหัสเอกสาร">
                </div>

                <div class="form-group col-md-6">
                        <label for="txtgroup">กลุ่มย่อย : </label>
                        <select id="txtgroup" name="txtgroup[]" class="js-example-basic-multiple form-control" multiple="multiple">

                            @foreach ($listgroupor as $valgroup)
                                <option
                                    @for($i=0;$i<$countgroup;$i++)
                                        @if(request()->input('txtgroup')[$i]!=null && request()->input('ok')=="1" && request()->input('txtgroup')[$i] == $valgroup->id)
                                        selected
                                        @endif
                                    @endfor
                                value={{$valgroup->id}}>{{$valgroup->groupName}}</option>
                            @endforeach
                        </select>
                </div>

            </div>
            <div class="form-row">

                <div class="form-group col-md-6">
                        <label for="txtprovince">จังหวัด : </label>
                        <select id="txtprovince" class="js-example-basic-multiple form-control" name="txtprovince[]" multiple="multiple">
                            @foreach ($listprovince as $valprovince)
                            <option
                                @for($i=0;$i<$countprovince;$i++)
                                    @if(request()->input('txtprovince')[$i]!=null && request()->input('ok')=="1" && request()->input('txtprovince')[$i] == $valprovince->provinceId)
                                    selected
                                    @endif
                                @endfor
                            value={{$valprovince->provinceId}}>{{$valprovince->province}}</option>
                            @endforeach
                        </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="txtstatus">สถานะ : </label>
                        <select id="txtstatus" name="txtstatus[]" class="js-example-basic-multiple form-control" multiple="multiple">
                            @foreach ($liststatus as $valstatus)
                                <option
                                    @for($i=0;$i<$countstatus;$i++)
                                        @if(request()->input('txtstatus')[$i]!=null && request()->input('ok')=="1" && request()->input('txtstatus')[$i] == $valstatus->id)
                                        selected
                                        @endif
                                    @endfor
                                value={{$valstatus->id}}>{{$valstatus->status}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="d-flex justify-content-center">
                    <button id="ok" name="ok" type="submit" value="1" class="btn btn-primary">ค้นหา</button>&nbsp
                    <button id="clear" name="clear" type="submit" value="2" class="btn btn-warning" onclick="">ล้างข้อมูล</button>
                </div>
        </form>
        <hr>
        <div>

            @if($listmember->isEmpty())
                <h3 class="d-flex justify-content-center">ไม่มีข้อมูล</h3>
            @else
                <div class="d-flex justify-content-end">
                    <form  method="get" action="{{url('backend/check/excelOR')}}">
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

                        <button type="submit" class="btn btn-primary"><i class="fa fa-file-excel-o"></i> Export Excel</button></a>
                    </form>
                </div>
                <br>
                <table class="table table-striped table-bordered">
                    <tr align="middle">
                        <th>ลำดับ</th>
                        <th>รหัสเอกสาร</th>
                        <th>ชื่อ - สกุล</th>
                        <th>กลุ่มย่อย</th>
                        <th>จังหวัด</th>
                        <th>ดาวน์โหลด</th>
                        <th>สถานะ</th>
                        <th>ผู้ที่ตรวจสอบ</th>
                    </tr>
                    @foreach ($listmember as $key=>$valmember)
                        <tr>
                        <td align="middle">
                            @if(!empty($_GET['page']))
                                {{ ($key+1) * (int)$_GET['page'] }}
                            @else
                                {{ $key+1 }}
                            @endif
                        </td>
                        <td align="middle">{{$valmember->docId}}</td>
                        <td align="middle"><a href="/pdf/register/{{ $valmember->id }}">{{$valmember->nameTitle}}{{$valmember->firstname}} {{$valmember->lastname}}</a></td>
                        <td>{{$valmember->groupName}}</td>
                        <td align="middle">{{$valmember->province}}</td>
                        @if($valmember->zipFile==null)
                            <td></td>
                        @else
                            <td align="middle"><button  onclick="window.open('{{ asset('uploads/'.$valmember->zipFile) }}'); location.href='editOR/{{$valmember->id}}';" type="button" class="btn btn-primary">ดาวน์โหลด</button></td>
                        @endif
                        <td align="middle">{{$valmember->status}}</td>
                        <td align="middle">{{$valmember->username}}</td>
                        </tr>
                    @endforeach
                </table>
                <div class="d-flex justify-content-center" style="font-size: 13px !important;"><b>{{ $listmember->appends($_GET)->links() }}</b></div>
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
toastr.success('บันทึกผู้แก้ไขเรียบร้อยแล้ว', '');
@endif

</script>
@endsection



