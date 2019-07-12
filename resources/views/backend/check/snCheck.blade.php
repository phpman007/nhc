@extends('backend.theme.master')
@section('title','NHCO ADMIN')

@section('content')

<div class="card border-info mb-3">

    <div class="card-header">
        <strong>ตรวจสอบหลักฐาน ผู้ทรงคุณวุฒิ</strong>
    </div>
    <div class="card-body">

        <form id="frmsearchcheck" method="post" action="{{url('backend/check/index')}}">
        {{ csrf_field() }}
        <div class="col-md-12">
            <div class="form-group">
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="txtname">ค้นหาจาก : </label>
                    <input class="form-control" @if(request()->input('ok')=="1") value="{{request()->input('txtname')}}" @else value="" @endif
                    name="txtname" id="txtname" placeholder="ค้นหาชื่อ, สกุล หรือรหัสเอกสาร">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="txtgroup">กลุ่มย่อย : </label>
                        <select id="txtgroup" name="txtgroup[]" class="js-example-basic-multiple form-control" multiple="multiple">

                            @foreach ($listgroupsn as $valgroup)
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
            </div></div>
            <div class="col-md-12">
                <div class="form-group">
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
                </div></div>
            <div class="col-md-12">
                <div class="form-group">
                    <div class="d-flex justify-content-center">
                        <button id="ok" name="ok" type="submit" value="1" class="btn btn-primary">ค้นหา</button>&nbsp
                        <button id="clear" name="clear" type="submit" value="2" class="btn btn-warning">ล้างข้อมูล</button>
                    </div></div></div>

        </form>
        <hr>

        <div class="col-md-12">
            <div class="form-group">

            @if($listmember->isEmpty())
                <h3 class="d-flex justify-content-center">ไม่มีข้อมูล</h3>
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
                </div></div>
                <br>
                <div class="table-responsive">
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
                                @if (!empty($_GET['page']))
                                    {{ $key + ($_GET['page'] - 1) * $listmember->PerPage() + 1  }}
                                @else
                                    {{$key + 1}}
                                @endif
                            </td>
                            <td align="middle">{{$valmember->docId}}</td>
                        <td align="middle"><a href="/backend/previewRegister/{{ $valmember->id }}">{{$valmember->nameTitle}}{{$valmember->firstname}}  {{$valmember->lastname}}</a></td>
                            <td>{{$valmember->groupName}}</td>
                            <td align="middle">{{$valmember->province}}</td>
                            @if($valmember->zipFile==null)
                                <td></td>
                            @else
                                <td align="middle"><button  onclick="window.open('{{ asset('uploads/'.$valmember->zipFile) }}'); location.href='editSN/{{$valmember->id}}';" type="button" class="btn btn-primary">ดาวน์โหลด</button></td>
                                {{--  <td align="middle"><a onclick="location.href='editSN/{{$valmember->id}}'"  href="{{ asset('uploads/'.$valmember->zipFile) }}"><button onclick="location.href = '{{url('backend/check/edit')}}" type="button" class="btn btn-primary">ดาวน์โหลด</button></a></td>  --}}
                            @endif
                            @if(Auth::guard('admin')->user()->hasRole('super-admin'))
                                <td align="middle">
                                    <a data-toggle="modal" name="gotomodal[]" href="#m-editstatus-{{$key}}" style="display: none;"> test {{$key}} </a>

                                    <form name="frmstatuschange[]" method="GET" action="{{url('backend/approve/editstatusSN')}}">
                                        {{ csrf_field() }}
                                        <select data-default="{{$valmember->statusid}}" name="txtstatuschange[]" class="form-control" style="font-size: 13px !important;" onchange="editstatus('{{$key}}', this);">
                                            @foreach ($liststatus as $valstatus)
                                            <option @if($valmember->status!=null && $valmember->statusid == $valstatus->id) selected @endif
                                            value={{$valstatus->id}}>{{$valstatus->status}}</option>
                                            @endforeach
                                        </select>
                                        <input type="hidden" name="Hid[]" id="Hid" value={{$valmember->id}}>
                                    </form>

                                    {{--  //modal สถานะไม่ผ่าน  --}}
                                    <form name"frmnotpass[]" method="GET" action="{{url('backend/approve/editnotpassSN')}}">
                                    {{ csrf_field() }}
                                        <input type="hidden" name="Hidmember[]" value={{$valmember->id}}>

                                        <div id="m-editstatus-{{$key}}" class="modal fade" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3 class="modal-title">กำหนดเหตุผลสถานะไม่ผ่าน</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <label for="txtreason[]">เหตุผลสถานะไม่ผ่าน :</label>
                                                        <textarea name="txtreason[]" rows="10" class="form-control" required></textarea>
                                                        {{-- @if($valmember->reason!=""){{$valmember->reason}} @endif --}}

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">บันทึก</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    {{--  //end modal  --}}
                                </td>
                            @else <td align="middle">{{$valmember->status}}</td>
                            @endif

                            <td align="middle">{{$valmember->username}}</td>
                            </tr>
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
    timeOut: 2000
};
toastr.success('บันทึกผู้แก้ไขเรียบร้อยแล้ว', '');
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

</script>

@endsection

