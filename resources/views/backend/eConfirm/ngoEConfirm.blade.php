@extends('backend.theme.master')
@section('title','NHCO ADMIN')

@section('content')

<nav aria-label="breadcrumb">
    <h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/backend/home">&nbsp;&nbsp;หน้าแรก</a></li>
            <li class="breadcrumb-item active" aria-current="page">ตรวจสอบรายชื่อผู้แทนองค์กรภาคเอกชน ยืนยันใช้สิทธิลงคะแนน</li>
        </ol>
    </h4>
</nav>

<div class="mainpage">
        <div class="card border-info mb-3">
            <div class="card-header">
                <strong>ตรวจสอบรายชื่อผู้แทนองค์กรภาคเอกชน ยืนยันใช้สิทธิลงคะแนน</strong>
            </div>
            <div class="card-body">
                    <form id="frmsearch" method="GET" action="{{url('backend/ElectionConfirm/ngoEConfirm')}}">
                    {{ csrf_field() }}
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

                                        @foreach ($listgroupngo as $valgroup)
                                            <option
                                                @for($i=0;$i<$countgroup;$i++)
                                                    @if(request()->input('txtgroup')[$i]!=null && request()->input('txtgroup')[$i] == $valgroup->id)
                                                    selected
                                                    @endif
                                                @endfor
                                                    value={{$valgroup->id}}>{{$valgroup->groupName}}
                                            </option>
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

                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="form-row">
                                <div class="form-group col-md-12 d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> ค้นหา</button>&nbsp
                                    <a href="{{url('backend/ElectionConfirm/ngoEConfirm')}}"><button type="button" class="btn btn-warning">ล้างคำค้น</button></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    </form>
                    <hr>

                    @if($listmember->isEmpty())
                        <div class="d-flex justify-content-center"><b>ไม่มีข้อมูล</b></div>
                    @else
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered">
                                                <tr align="middle">
                                                    <th width="5%">ลำดับ</th>
                                                    <th width="10%">รหัสผู้สมัคร</th>
                                                    <th width="25%">ชื่อ - นามสกุล</th>
                                                    <th width="30%">กลุ่มย่อย</th>
                                                    <th width="30%">วันยืนยันใช้สิทธิ์ลงคะแนน</th>
                                                </tr>

                                                @foreach ($listmember as $key=>$valmember)
                                                    @if (!empty($valmember->fixStatus) and $valmember->fixStatus == 1)
                                                        <tr>
                                                            <td align="middle">
                                                                @if (!empty($_GET['page']))
                                                                    {{ $key + ($_GET['page'] - 1) * $listmember->PerPage() + 1  }}
                                                                @else
                                                                    {{$key + 1}}
                                                                @endif
                                                            </td>
                                                            <td align="middle">
                                                                {{ $valmember->docId }}
                                                            </td>
                                                            <td align="middle">
                                                                {{ $valmember->nameTitle }} {{ $valmember->firstname }} {{ $valmember->lastname }}
                                                            </td>
                                                            <td>
                                                                {{ $valmember->groupName }}
                                                            </td>
                                                            <td align="middle">
                                                                {{ $valmember->confirmed_vote_at }}
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                        </table>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-center"><b>{{ $listmember->links() }}</b></div>

                            </div>
                        </div>
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

    function search(bt){
        //alert ('AAAA');
        if(bt==1){
            document.getElementById('txtprovince').value="";
            document.getElementById('frmsearch').submit();
        }else{
            document.getElementById('frmsearch').submit();
        }
    }

</script>

<style>
    .mainpage {
            /* font-size: 2em; */
            /* font-family: "THSarabunPSK"; */
            sans-serif;
            font-size: 1em;
        }
</style>

@endsection

