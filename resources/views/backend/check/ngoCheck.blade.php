@extends('backend.theme.master')
@section('title','NHCO ADMIN')

@section('content')

<div class="card border-info mb-3">

    <div class="card-header">
        <strong>ตรวจสอบหลักฐาน ผู้แทนองค์กรภาคเอกชน</strong>
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

        <form id="frmsearchngocheck" method="post" action="{{url('backend/check/ngoCheck')}}">
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

                            @foreach ($listgroupngo as $valgroup)
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
                                {{--  <option value="" selected>จังหวัด ...</option>  --}}
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

                </div></div></div>
                <div class="col-md-12">
                    <div class="form-group">
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
                        </div></div></div>
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="form-group col-md-12 d-flex justify-content-center">
                                <button id="ok" name="ok" type="submit" value="1" class="btn btn-primary"><i class="fa fa-search"></i> ค้นหา</button>&nbsp
                                <button id="clear" name="clear" type="submit" value="2" class="btn btn-warning" onclick="">ล้างข้อมูล</button>
                            </div>

                        </div></div></div>

        </form>
        <hr>
        <div class="col-md-12">
            <div class="form-group">
            @if($listmember->isEmpty())
                <h3 class="d-flex justify-content-center">ไม่มีข้อมูล</h3>
            @else
            <div class="d-flex justify-content-end">
                    <form  method="get" action="{{url('backend/check/excelNGO')}}">
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
                </div></div>
                <br>
                <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <tr align="middle">
                        <th>ลำดับ</th>
                        <th>รหัสเอกสาร</th>
                        <th>ชื่อ - สกุล</th>
                        <th width="30%">กลุ่มย่อย</th>
                        <th>จังหวัด</th>
                        <th>เขต</th>
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
                        <td align="middle"><a href="/pdf/register/{{ $valmember->id }}">{{$valmember->nameTitle}}{{$valmember->firstname}}  {{$valmember->lastname}}</a></td>
                        <td>{{$valmember->groupName}}</td>
                        <td align="middle">{{$valmember->province}}</td>
                        <td align="middle">{{$valmember->section}}</td>
                        @if($valmember->zipFile==null)
                            <td></td>
                        @else
                            <td align="middle"><button  onclick="window.open('{{ asset('uploads/'.$valmember->zipFile) }}'); location.href='editNGO/{{$valmember->id}}';" type="button" class="btn btn-primary">ดาวน์โหลด</button></td>
                        @endif
                        @if(Auth::guard('admin')->user()->hasRole('super-admin'))
                            <td align="middle">
                                <a data-toggle="modal" name="gotomodal[]" href="#m-editstatus-{{$key}}" style="display: none;"> test {{$key}} </a>

                                <form name="frmstatuschange[]" method="GET" action="{{url('backend/approve/editstatusNGO')}}">
                                    {{ csrf_field() }}
                                    <select data-default="{{$valmember->statusid}}" name="txtstatuschange[]" style="font-size: 13px !important;" class="form-control" onchange="editstatus('{{$key}}', this);">
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
                        @else <td align="middle">{{$valmember->status}}</td>
                        @endif

                        <td align="middle">{{$valmember->username}}</td>
                        </tr>
                    @endforeach
                </table></div>
                <div class="d-flex justify-content-center" style="font-size: 13px !important;"><b>{{ $listmember->links() }}</b></div>

            @endif
        </div>
    </div>
    @if(Auth::guard('admin')->user()->hasRole('super-admin'))
    <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle-o"></i> ยืนยันการอนุมัติทั้งหมด</button>
    @endif
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
</script>
@endsection

