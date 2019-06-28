@extends('backend.theme.master')
@section('title','NHC ADMIN')
@section('loginname','สวัสดี A')

<script>
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
</script>

@section('content')

<div class="card border-info mb-3">

    <div class="card-header">
        <strong>อนุมัติผู้สมัคร ผู้แทนองค์กรภาคเอกชน</strong>
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

        <form id="frmsearchapprove" method="get" action="{{url('backend/approve/ngoApprove')}}">
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
                    <label for="txtsection">เขต : </label>
                    <select id="txtsection" name="txtsection[]" class="js-example-basic-multiple form-control" multiple="multiple">
                        <option
                            @for($i=0;$i<$countsection;$i++)
                                @if(request()->input('txtsection')[$i]!=null && request()->input('ok')=="1" && request()->input('txtsection')[$i] == 1)
                                selected
                                @endif
                            @endfor
                        value="1">เขต 1</option>
                        <option
                            @for($i=0;$i<$countsection;$i++)
                                @if(request()->input('txtsection')[$i]!=null && request()->input('ok')=="1" && request()->input('txtsection')[$i] == 2)
                                selected
                                @endif
                            @endfor
                        value="2">เขต 2</option>
                        <option
                            @for($i=0;$i<$countsection;$i++)
                                @if(request()->input('txtsection')[$i]!=null && request()->input('ok')=="1" && request()->input('txtsection')[$i] == 3)
                                selected
                                @endif
                            @endfor
                        value="3">เขต 3</option>
                        <option
                            @for($i=0;$i<$countsection;$i++)
                                @if(request()->input('txtsection')[$i]!=null && request()->input('ok')=="1" && request()->input('txtsection')[$i] == 4)
                                selected
                                @endif
                            @endfor
                        value="4">เขต 4</option>
                        <option
                            @for($i=0;$i<$countsection;$i++)
                                @if(request()->input('txtsection')[$i]!=null && request()->input('ok')=="1" && request()->input('txtsection')[$i] == 5)
                                selected
                                @endif
                            @endfor
                        value="5">เขต 5</option>
                        <option
                            @for($i=0;$i<$countsection;$i++)
                                @if(request()->input('txtsection')[$i]!=null && request()->input('ok')=="1" && request()->input('txtsection')[$i] == 6)
                                selected
                                @endif
                            @endfor
                        value="6">เขต 6</option>
                        <option
                            @for($i=0;$i<$countsection;$i++)
                                @if(request()->input('txtsection')[$i]!=null && request()->input('ok')=="1" && request()->input('txtsection')[$i] == 7)
                                selected
                                @endif
                            @endfor
                        value="7">เขต 7</option>
                        <option
                            @for($i=0;$i<$countsection;$i++)
                                @if(request()->input('txtsection')[$i]!=null && request()->input('ok')=="1" && request()->input('txtsection')[$i] == 8)
                                selected
                                @endif
                            @endfor
                        value="8">เขต 8</option>
                        <option
                            @for($i=0;$i<$countsection;$i++)
                                @if(request()->input('txtsection')[$i]!=null && request()->input('ok')=="1" && request()->input('txtsection')[$i] == 9)
                                selected
                                @endif
                            @endfor
                        value="9">เขต 9</option>
                        <option
                            @for($i=0;$i<$countsection;$i++)
                                @if(request()->input('txtsection')[$i]!=null && request()->input('ok')=="1" && request()->input('txtsection')[$i] == 10)
                                selected
                                @endif
                            @endfor
                        value="10">เขต 10</option>
                        <option
                            @for($i=0;$i<$countsection;$i++)
                                @if(request()->input('txtsection')[$i]!=null && request()->input('ok')=="1" && request()->input('txtsection')[$i] == 11)
                                selected
                                @endif
                            @endfor
                        value="11">เขต 11</option>
                        <option
                            @for($i=0;$i<$countsection;$i++)
                                @if(request()->input('txtsection')[$i]!=null && request()->input('ok')=="1" && request()->input('txtsection')[$i] == 12)
                                selected
                                @endif
                            @endfor
                        value="12">เขต 12</option>
                        <option
                            @for($i=0;$i<$countsection;$i++)
                                @if(request()->input('txtsection')[$i]!=null && request()->input('ok')=="1" && request()->input('txtsection')[$i] == 13)
                                selected
                                @endif
                            @endfor
                        value="13">เขต 13</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
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
                <table class="table table-striped table-bordered">
                    <tr align="middle">
                        <th width="5%">ลำดับ</th>
                        <th width="10%">รหัสเอกสาร</th>
                        <th width="20%">ชื่อ - สกุล</th>
                        <th width="15%">กลุ่มย่อย</th>
                        <th width="10%">จังหวัด</th>
                        <th width="5%">เขต</th>
                        <th width="5%">ดาวน์โหลด</th>
                        <th width="15%">สถานะ</th>
                        <th width="15%">ผู้ที่ตรวจสอบ</th>
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
                        <td>{{$valmember->nameTitle}}{{$valmember->firstname}}  {{$valmember->lastname}}</td>
                        <td>{{$valmember->groupName}}</td>
                        <td>{{$valmember->province}}</td>
                        <td align="middle">{{$valmember->section}}</td>
                        <td align="middle"><a href="{{ asset('uploads/'.$valmember->zipFile) }}"><button type="button" class="btn btn-primary">ดาวน์โหลด</button></a></td>

                        {{-- สถานะ  --}}
                        <td>
                            <a data-toggle="modal" name="gotomodal[]" href="#m-editstatus-{{$key}}" style="display: none;"> test {{$key}} </a>

                            <form name="frmstatuschange[]" method="GET" action="{{url('backend/approve/editstatusNGO')}}">
                                {{ csrf_field() }}
                                <select data-default="{{$valmember->statusid}}" name="txtstatuschange[]" class="form-control" onchange="editstatus('{{$key}}', this);">
                                    @foreach ($liststatus as $valstatus)
                                    <option @if($valmember->status!=null && $valmember->statusid == $valstatus->id) selected @endif
                                    value={{$valstatus->id}}>{{$valstatus->status}}</option>
                                    @endforeach
                                </select>
                                <input type="hidden" name="Hid[]" id="Hid" value={{$valmember->id}}>
                            </form>

                            {{--  //modal สถานะไม่ผ่าน  --}}
                            <form name"frmnotpass[]" method="GET" action="{{url('backend/approve/editnotpassNGO')}}">
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

                        <td>{{$valmember->username}}</td>

                        </tr>
                    @endforeach
                </table>
                <div class="d-flex justify-content-center"><h3>{{ $listmember->links() }} </h3></div>
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
</script>

@endsection


