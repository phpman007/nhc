@extends('backend.theme.master')
@section('title','NHCO ADMIN')

@section('content')
<div class="card border-info mb-3  table-responsive">
    <div class="card-header">
        <strong>ตั้งวันการลงทะเบียน ผู้ทรงคุณวุฒิ</strong>
    </div>
    <div class="card-body">
        <form id="frmsearchset" method="get" action="{{url('backend/election/snElection')}}">
        {{ csrf_field() }}
            <div class="col-md-12">
                <div class="form-group">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="txtgroup">กลุ่มย่อย : </label>
                            <select id="txtgroup" name="txtgroup[]" class="js-example-basic-multiple form-control" multiple="multiple">

                                @foreach ($listgroup as $valgroup)
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
                    <div class="d-flex justify-content-center  col-md-6">
                        <button id="ok" name="ok" type="submit" class="btn btn-primary"><i class="fa fa-search"></i> ค้นหา</button>&nbsp
                        <a href="{{url('backend/election/snElection')}}"><button id="clear" name="clear" type="button" class="btn btn-warning" onclick="">ล้างข้อมูล</button></a>
                    </div>
                </div>
            </div>
        </form>

        <hr>
        <span style="color:red;"> * ให้กำหนดวันที่เปิดรับสมัคร < วันที่ปิดรับสมัคร  และ  วันที่ยืนยันใช้สิทธิ์ < วันที่ลงคะแนน *</span>
        <div class="table-responsive">
            @if($listmember->isEmpty())
                <h3 class="d-flex justify-content-center">ไม่มีข้อมูล</h3>
            @else
                <table class="table table-striped table-bordered  table-responsive">
                    <tr align="middle">
                        <th width="2%">ลำดับ</th>
                        <th>กลุ่มย่อย</th>
                        <th width="8%">วันที่เปิดรับสมัคร</th>
                        <th width="8%">วันที่ปิดรับสมัคร</th>
                        <th width="8%">เวลาเริ่มต้น</th>
                        <th width="8%">เวลาสิ้นสุด</th>
                        <th width="8%">ยืนยันใช้สิทธิ์</th>
                        <th width="8%">วันลงคะแนน</th>
                        <th width="8%">เวลาเริ่มต้น</th>
                        <th width="8%">เวลาสิ้นสุด</th>
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
                        <td>{{$valmember->groupName}}</td>

                        <form name="frmchangedate[]" method="GET" action="{{url('backend/election/changedate')}}">
                            {{ csrf_field() }}
                            <input type="hidden" name="Hid[]" id="Hid" value={{$valmember->id}}>
                            <td>
                                @php
                                if($valmember->openDate!="0000-00-00"){
                                    $year1=date_format(date_create($valmember->openDate),"Y");
                                    $month1=date_format(date_create($valmember->openDate),"m");
                                    $day1=date_format(date_create($valmember->openDate),"d");
                                    $dateTH1=$day1."/".$month1."/".$year1;
                                }else{ $dateTH1="";}
                                @endphp
                                <div class="input-group mb-2">
                                    <input value="{{ $dateTH1 }}" style="font-size: 13px !important;" onchange="changedate('{{$key}}');" name="txtdatebegin[]"  class="form-control datepicker" data-date-format="mm/dd/yyyy">
                                    {{--  <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>  --}}
                                </div>
                            </td>
                            <td>
                                @php
                                if($valmember->endDate!="0000-00-00"){
                                    $year2=date_format(date_create($valmember->endDate),"Y");
                                    $month2=date_format(date_create($valmember->endDate),"m");
                                    $day2=date_format(date_create($valmember->endDate),"d");
                                    $dateTH2=$day2."/".$month2."/".$year2;
                                }else{ $dateTH2="";}
                                @endphp
                                <div class="input-group mb-2">
                                    <input value="{{ $dateTH2 }}" style="font-size: 13px !important;" onchange="changedate('{{$key}}');" name="txtdateend[]"  class="form-control datepicker" data-date-format="mm/dd/yyyy">
                                    {{--  <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>  --}}
                                </div>
                            </td>
                        </form>

                        <form name="frmchangetime1[]" method="GET" action="{{url('backend/election/changetime1')}}">
                            {{ csrf_field() }}
                            <input type="hidden" name="Hid3[]" id="Hid3" value={{$valmember->id}}>
                            <td>
                                <div class="input-group clockpicker" data-autoclose="true"  data-placement="left" data-align="top" >
                                    <input type="text" name="txttimebegin[]" class="form-control" onchange="changetime1('{{$key}}');" value="{{date_format(date_create($valmember->openDateTime),"H:i")}}" >
                                    {{--  <span class="input-group-addon">
                                        <span class="fa fa-clock-o"></span>
                                    </span>  --}}
                                </div>
                            </td>
                            <td>
                                <div class="input-group clockpicker" data-autoclose="true"  data-placement="left" data-align="top" >
                                    <input type="text" name="txttimeend[]" class="form-control" onchange="changetime1('{{$key}}');" value="{{date_format(date_create($valmember->endDateTime),"H:i")}}" >
                                    {{--  <span class="input-group-addon">
                                        <span class="fa fa-clock-o"></span>
                                    </span>  --}}
                                </div>
                            </td>
                        </form>

                        <form name="frmchangedate2[]" method="GET" action="{{url('backend/election/changedate2')}}">
                            {{ csrf_field() }}
                            <input type="hidden" name="Hid2[]" id="Hid2" value={{$valmember->id}}>
                            <td>
                                @php
                                if($valmember->confirmDate!="0000-00-00"){
                                    $year3=date_format(date_create($valmember->confirmDate),"Y");
                                    $month3=date_format(date_create($valmember->confirmDate),"m");
                                    $day3=date_format(date_create($valmember->confirmDate),"d");
                                    $dateTH3=$day3."/".$month3."/".$year3;
                                }else{ $dateTH3="";}
                                @endphp
                                <div class="input-group mb-2">
                                    <input value="{{ $dateTH3 }}" style="font-size: 13px !important;" onchange="changedate2('{{$key}}');" name="txtdateconfirm[]"  class="form-control datepicker" data-date-format="mm/dd/yyyy">
                                    {{--  <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>  --}}
                                </div>
                            </td>
                            <td>
                                @php
                                if($valmember->electionDate!="0000-00-00"){
                                    $year4=date_format(date_create($valmember->electionDate),"Y");
                                    $month4=date_format(date_create($valmember->electionDate),"m");
                                    $day4=date_format(date_create($valmember->electionDate),"d");
                                    $dateTH4=$day4."/".$month4."/".$year4;
                                }else{ $dateTH4="";}
                                @endphp
                                <div class="input-group mb-2">
                                    <input value="{{ $dateTH4 }}" style="font-size: 13px !important;" onchange="changedate2('{{$key}}');" name="txtdateelection[]"  class="form-control datepicker" data-date-format="mm/dd/yyyy">
                                    {{--  <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>  --}}
                                </div>
                            </td>
                        </form>
                        <form name="frmchangetime2[]" method="GET" action="{{url('backend/election/changetime2')}}">
                            {{ csrf_field() }}
                            <input type="hidden" name="Hid4[]" id="Hid4" value={{$valmember->id}}>
                            <td>
                                <div class="input-group clockpicker" data-autoclose="true"  data-placement="left" data-align="top" >
                                    <input type="text" name="txttimeElectionbegin[]" class="form-control" onchange="changetime2('{{$key}}');" value="{{date_format(date_create($valmember->openElectionTime),"H:i")}}" >
                                    {{--  <span class="input-group-addon">
                                        <span class="fa fa-clock-o"></span>
                                    </span>  --}}
                                </div>
                            </td>
                            <td>
                                <div class="input-group clockpicker" data-autoclose="true"  data-placement="left" data-align="top" >
                                    <input type="text" name="txttimeElectionend[]" class="form-control" onchange="changetime2('{{$key}}');" value="{{date_format(date_create($valmember->endElectionTime),"H:i")}}" >
                                    {{--  <span class="input-group-addon">
                                        <span class="fa fa-clock-o"></span>
                                    </span>  --}}
                                </div>
                            </td>
                        </form>

                    @endforeach
                </table>
                <div class="d-flex justify-content-center" style="font-size: 13px !important;"><b>{{ $listmember->links() }}</b></div>
            @endif
        </div>
    </div>
</div>

@endsection

@section('js')

<script>
    function changename(id){
        var a;
        alert(document.getElementsByName("txtname")[0].value);
    }

    $(function(){
        $('.js-example-basic-multiple').select2({
        maximumSelectionLength: 3
        });
    });

    $(document).ready(function () {
        $('.datepicker').datepicker({
            format: 'dd/mm/yyyy',
            todayBtn: true,
            language: 'th',             //เปลี่ยน label ต่างของ ปฏิทิน ให้เป็น ภาษาไทย   (ต้องใช้ไฟล์ bootstrap-datepicker.th.min.js นี้ด้วย)
            //thaiyear: true              //Set เป็นปี พ.ศ.
        });
        //}).datepicker("setDate", "0");  //กำหนดเป็นวันปัจุบัน

        $('.clockpicker').clockpicker();
    });

    @if (Session::has('success'))
    toastr.options = {
        closeButton: true,
        progressBar: true,
        showMethod: 'slideDown',
        timeOut: 1000
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
    toastr.success("{{ Session::get('error') }}", '');
    @endif

    @if (Session::has( 'warning' ))
    toastr.options = {
        closeButton: true,
        progressBar: true,
        showMethod: 'slideDown',
        timeOut: 3000
    };
    toastr.warning("{{ Session::get('warning') }}", '');
    @endif
</script>

<script>
    function changedate(id){
        document.getElementsByName('frmchangedate[]')[id].submit();
    }

    function changedate2(id){
        document.getElementsByName('frmchangedate2[]')[id].submit();
    }

    function changetime1(id){
        document.getElementsByName('frmchangetime1[]')[id].submit();
    }

    function changetime2(id){
        document.getElementsByName('frmchangetime2[]')[id].submit();
    }

</script>

@endsection
