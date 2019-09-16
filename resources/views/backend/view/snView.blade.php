@extends('backend.theme.master')
@section('title','NHCO ADMIN')

@section('content')

<nav aria-label="breadcrumb">
    <h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/backend/home">&nbsp;&nbsp;หน้าแรก</a></li>
            <li class="breadcrumb-item active" aria-current="page">แสดงข้อมูลการสมัครผู้ทรงคุณวุฒิ</li>
        </ol>
    </h4>
</nav>

<div class="card border-info mb-3">

    <div class="card-header">
        <strong>แสดงข้อมูลการสมัคร ผู้ทรงคุณวุฒิ</strong>
    </div>
    <div class="card-body">

        <form id="frmsearchcheck" method="GET" action="{{url('backend/view/snView')}}">
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

            <div class="col-md-12">
                <div class="form-group">
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> ค้นหา</button>&nbsp
                        <a href="{{url('backend/view/snView')}}"><button type="button"  class="btn btn-warning">ล้างคำค้น</button></a>
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
                    <form  method="get" action="{{url('backend/view/excelSN')}}">
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

                        <button type="submit" class="btn btn-primary"><i class="fa fa-file-excel-o"></i> Export Excel</button></a>
                    </form>
                </div>

            {{-- @if($countmember < 10)
                <span style="color:red;">* จำนวนผู้สมัครมีน้อยกว่า 10 คน *</span>
            @endif --}}
                <br>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <tr align="middle">
                            <th>ลำดับ</th>
                            <th>รหัสผู้สมัคร</th>
                            <th>ชื่อ - นามสกุล</th>
                            <th>เลขบัตรประชาชน</th>
                            <th>กลุ่มย่อย</th>
                            <th>วันที่สมัครขั้นตอนที่ 1</th>
                            <th>วันที่ยืนยันการสมัคร</th>
                        </tr>
                        @php $a=0; @endphp

                        @foreach ($listmember as $key=>$valmember)
                            {{-- @if(empty($valmember->confirmed_at)) --}}
                            <tr>
                            <td align="middle">
                                {{-- {{$key}} --}}
                                @if (!empty($_GET['page']))
                                    {{ $key + ($_GET['page'] - 1) * $listmember->PerPage() + 1  }}
                                @else
                                    {{$key + 1}}
                                @endif
                            </td>

                            <td align="middle">{{ @ $valmember->docId}}</td>

                            <td align="middle">
                            {{-- @php $chk1=0; $chk2=0; $chk3=0; $chk4=0; $chk5=0; $chk6=0; @endphp --}}
                            {{-- @if($valmember->seniorGroupId==1)
                                @if($countmember1 < 10)
                                    {{$valmember->nameTitle}}{{$valmember->firstname}}  {{$valmember->lastname}}
                                @else
                                    @php $chk1=1; @endphp
                                    <a href="/backend/previewRegisterV/{{ $valmember->id }}">{{$valmember->nameTitle}}{{$valmember->firstname}}  {{$valmember->lastname}}</a>
                                @endif
                            @elseif($valmember->seniorGroupId==2)
                                @if($countmember2 < 10)
                                    {{$valmember->nameTitle}}{{$valmember->firstname}}  {{$valmember->lastname}}
                                @else
                                    @php $chk2=1; @endphp
                                    <a href="/backend/previewRegisterV/{{ $valmember->id }}">{{$valmember->nameTitle}}{{$valmember->firstname}}  {{$valmember->lastname}}</a>
                                @endif
                            @elseif($valmember->seniorGroupId==3)
                                @if($countmember3 < 10)
                                    {{$valmember->nameTitle}}{{$valmember->firstname}}  {{$valmember->lastname}}
                                @else
                                    @php $chk3=1; @endphp
                                    <a href="/backend/previewRegisterV/{{ $valmember->id }}">{{$valmember->nameTitle}}{{$valmember->firstname}}  {{$valmember->lastname}}</a>
                                @endif
                            @elseif($valmember->seniorGroupId==4)
                                @if($countmember4 < 10)
                                    {{$valmember->nameTitle}}{{$valmember->firstname}}  {{$valmember->lastname}}
                                @else
                                    @php $chk4=1; @endphp
                                    <a href="/backend/previewRegisterV/{{ $valmember->id }}">{{$valmember->nameTitle}}{{$valmember->firstname}}  {{$valmember->lastname}}</a>
                                @endif
                            @elseif($valmember->seniorGroupId==5)
                                @if($countmember5 < 10)
                                    {{$valmember->nameTitle}}{{$valmember->firstname}}  {{$valmember->lastname}}
                                @else
                                    @php $chk5=1; @endphp
                                    <a href="/backend/previewRegisterV/{{ $valmember->id }}">{{$valmember->nameTitle}}{{$valmember->firstname}}  {{$valmember->lastname}}</a>
                                @endif
                            @elseif($valmember->seniorGroupId==6)
                                @if($countmember6 < 10)
                                    {{$valmember->nameTitle}}{{$valmember->firstname}}  {{$valmember->lastname}}
                                @else
                                    @php $chk6=1; @endphp
                                    <a href="/backend/previewRegisterV/{{ $valmember->id }}">{{$valmember->nameTitle}}{{$valmember->firstname}}  {{$valmember->lastname}}</a>
                                @endif
                            @endif --}}
                            {{-- {{$valmember->nameTitle}}{{$valmember->firstname}}  {{$valmember->lastname}}</td> --}}
                            <a href="/backend/previewRegisterV/{{ $valmember->id }}">{{$valmember->nameTitle}}{{$valmember->firstname}}  {{$valmember->lastname}}</a>

                            <td align="middle">
                                <span data-toggle="tooltip" rel="tooltip" data-placement="right" title="{{$valmember->email}}">{{ $valmember->personalId }}</span>
                            </td>
                            <td>{{ @ $valmember->groupName}}</td>
                            <td>{{ @ \Carbon\Carbon::parse($valmember->created_at)->addYear(543)->format('d/m/Y H:m:i') }}</td>
                                @if ($valmember->confirmed_at == null)
                                    <td align="middle"> ยังไม่ยืนยันการสมัคร </td>
                                @else
                                    <td>{{ @ \Carbon\Carbon::parse($valmember->confirmed_at)->addYear(543)->format('d/m/Y H:m:i') }}</td>
                                @endif
                            </tr>
                            {{-- @endif --}}
                        @endforeach
                    </table>
                </div>

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

            $( document ).ready(function() {
                $('[data-toggle="tooltip"]');
            });

</script>

@endsection

