@extends('backend.theme.master')
@section('title','NHCO ADMIN')

@section('content')

@php
    $name=0;
    $group1=0;
    $group2=0;
    $group3=0;
    $status1=0;
    $status2=0;
    $status3=0;
    $section1=0;
    $section2=0;
    $section3=0;
    $pro1=0;
    $pro2=0;
    $pro3=0;

    $a=0;
@endphp

    <nav aria-label="breadcrumb">
        <h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/backend/home">&nbsp;&nbsp;หน้าแรก</a></li>
                <li class="breadcrumb-item active" aria-current="page">ตรวจสอบหลักฐานผู้แทนองค์กรภาคเอกชน</li>
            </ol>
        </h4>
    </nav>

<div class="mainpage">
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

        <form id="frmsearchngocheck" method="GET" action="{{url('backend/check/ngoCheck')}}">
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
                            <select id="txtsection" name="txtsection[]"  onchange="search(1);" class="js-example-basic-multiple form-control" multiple="multiple">
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
                                {{--  <option value="" selected>จังหวัด ...</option>  --}}
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

                        <div class="form-group col-md-6">
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
            <div class="col-md-12">
                <div class="form-group">
                    <div class="form-row">
                        <div class="form-group col-md-12 d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> ค้นหา</button>&nbsp
                            <a href="{{url('backend/check/ngoCheck')}}"><button type="button" class="btn btn-warning">ล้างคำค้น</button></a>
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

                    <button type="submit" class="btn btn-primary" ><i class="fa fa-file-excel-o"></i> Export Excel</button></a>
                </form>
            </div>
            {{-- @php
            $countmember=0;
            $countmember=count($listmember);
            @endphp
            @if($countmember<10)
            <span style="color:red;">* จำนวนผู้สมัครมีน้อยกว่า 10 คน *</span>
            @endif
                <br> --}}

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
                                    <th width="20%">กลุ่มย่อย</th>
                                    <th>จังหวัด</th>
                                    <th>เขต</th>
                                    <th width="20%">สถานะ</th>
                                    <th>พิมพ์</th>
                                    <th>ผู้ที่ตรวจสอบ</th>

                                    {{-- <th>วันที่สมัครขั้นตอนที่ 1</th>
                                    <th>วันที่ยืนยันการสมัคร</th> --}}
                                </tr>

                                @foreach ($listmember as $key=>$valmember)
                                    @if (!empty($valmember->confirmed_at))
                                    <tr>
                                        <td align="middle">
                                            @if (!empty($_GET['page']))
                                                {{ $key + ($_GET['page'] - 1) * $listmember->PerPage() + 1  }}
                                            @else
                                                {{$key + 1}}
                                            @endif
                                        </td>

                                        <td align="middle">{{ @ $valmember->docId}}</td>

                                        @php
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

                                            if($countsection==1){
                                                $section1=request()->input('txtsection')[0];
                                            }elseif($countsection==2){
                                                $section1=request()->input('txtsection')[0];
                                                $section2=request()->input('txtsection')[1];
                                            }elseif($countsection==3){
                                                $section1=request()->input('txtsection')[0];
                                                $section2=request()->input('txtsection')[1];
                                                $section3=request()->input('txtsection')[2];
                                            }

                                            if($countprovince==1){
                                                $pro1=request()->input('txtprovince')[0];
                                            }elseif($countprovince==2){
                                                $pro1=request()->input('txtprovince')[0];
                                                $pro2=request()->input('txtprovince')[1];
                                            }elseif($countprovince==3){
                                                $pro1=request()->input('txtprovince')[0];
                                                $pro2=request()->input('txtprovince')[1];
                                                $pro3=request()->input('txtprovince')[2];
                                            }

                                        @endphp

                                        <td align="middle">
                                            <a href="/backend/ngoPreview/{{ $valmember->id }}/{{$name}}/{{$group1}}/{{$group2}}/{{$group3}}/{{$status1}}/{{$status2}}/{{$status3}}/{{$section1}}/{{$section2}}/{{$section3}}/{{$pro1}}/{{$pro2}}/{{$pro3}}">{{$valmember->nameTitle}}{{$valmember->firstname}}  {{$valmember->lastname}}</a>
                                        </td>

                                        <td align="middle">{{ $valmember->personalId}}</td>

                                        <td>{{ @ $valmember->groupName}}</td>

                                        <td align="middle">{{ @ $valmember->province}} </td>

                                        <td align="middle">{{ @ $valmember->section}}</td>

                                        {{--  สถานะ  --}}
                                        @if (!empty($valmember->status_accept) and $valmember->status_accept == 1)
                                            @if(!empty($valmember->fixStatus) and $valmember->fixStatus == 1)
                                                <td align="middle">อนุมัติแล้ว {{$valmember->status}} ไม่สามารถแก้ไขได้</td>
                                            @else
                                                @if(!empty($valmember->statusId))

                                                    <td align="middle">

                                                    <a data-toggle="modal" name="gotomodal[]" href="#m-editstatus-{{$key}}" style="display: none;"> test {{$key}} </a>

                                                    <form name="frmstatuschange[]" method="GET" action="{{url('backend/check/editstatusNGO')}}">
                                                        {{ csrf_field() }}

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

                                                    <form name="frmnotpass[]" method="GET" action="{{url('backend/check/editnotpassNGO')}}">
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
                                            <td align="middle"><button type="button text-right" class="btn btn-primary" onclick="window.open('{{url('backend/pdf/'.$valmember->id)}}');">พิมพ์</button></td>
                                        @else
                                            <td></td>
                                        @endif

                                        {{--  ผู้ที่ตรวจสอบ  --}}
                                        @if (!empty($valmember->username))
                                            <td>{{ @ $valmember->username }}<br>{{ \Carbon\Carbon::parse($valmember->updateStatusTime)->addYears(543)->format('d/m/Y H:i:s') }}</td>
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
                                <button type="submit" class="btn btn-primary"  style="width:1200px"><i class="fa fa-check-circle-o"></i> ยืนยันการอนุมัติทั้งหมด</button>
                            @endif
                        </div> --}}
                </div>
            </div>
        @endif
    </div>
</div>
</div>
@endsection

@section('js')
<script>
    function search(bt){
        //alert ('AAAA');
        if(bt==1){
            document.getElementById('txtprovince').value="";
            document.getElementById('frmsearchngocheck').submit();
        }else{
            document.getElementById('frmsearchngocheck').submit();
        }
    }

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

