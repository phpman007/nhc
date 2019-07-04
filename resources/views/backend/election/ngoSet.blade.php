@extends('backend.theme.master')
@section('title','NHC ADMIN')

@section('content')
<div class="card border-info mb-3">
    <div class="card-header">
        <strong>ตั้งวันการลงทะเบียน ผู้แทนองค์กรภาคเอกชน</strong>
    </div>
    <div class="card-body">
        <form id="frmsearchset" name="frmsearchset" method="get" action="{{url('backend/election/ngoElection')}}">
        {{ csrf_field() }}

            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="txtgroup">กลุ่มย่อย : </label>
                <select id="txtgroup" name="txtgroup[]" class="js-example-basic-multiple form-control" multiple="multiple">

                    @foreach ($listgroup as $valgroup)
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
                        <th>กลุ่มย่อย</th>
                        <th>จังหวัด</th>
                        <th width="12%">วันที่เปิดรับสมัคร</th>
                        <th width="12%">วันที่ปิดรับสมัคร</th>
                        <th width="12%">ยืนยันใช้สิทธิ์</th>
                        <th width="12%">วันลงคะแนน</th>
                        <th width="10%">เวลาเริ่มต้น</th>
                        <th width="10%">เวลาสิ้นสุด</th>
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
                        <td>{{$valmember->province}}</td>

                        <form name="frmchangedate[]" method="GET" action="{{url('backend/election/NGOchangedate')}}">
                            {{ csrf_field() }}
                            <input type="hidden" name="Hid[]" id="Hid" value={{$valmember->id}}>
                            {{--  <input type="hidden" name="Hidgroup[0]" id="Hidgroup" value={{request()->input('txtgroup')[0]}}>
                            <input type="hidden" name="Hidgroup[1]" id="Hidgroup" value={{request()->input('txtgroup')[1]}}>  --}}
                            {{--  <input type="hidden" name="Hidgroup[2]" id="Hidgroup" value={{request()->input('txtgroup')[2]}}>  --}}
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
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
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
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </td>
                        {{--  </form>
                        <form name="frmchangedate2[]" method="GET" action="{{url('backend/election/NGOchangedate2')}}">
                            {{ csrf_field() }}
                            <input type="hidden" name="Hid2[]" id="Hid2" value={{$valmember->id}}>  --}}
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
                                    <input value="{{ $dateTH3 }}" style="font-size: 13px !important;" onchange="changedate('{{$key}}');" name="txtdateconfirm[]"  class="form-control datepicker" data-date-format="mm/dd/yyyy">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
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
                                    <input value="{{ $dateTH4 }}" style="font-size: 13px !important;" onchange="changedate('{{$key}}');" name="txtdateelection[]"  class="form-control datepicker" data-date-format="mm/dd/yyyy">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </td>
                        </form>
                        <form name="frmchangedate3[]" method="GET" action="{{url('backend/election/NGOchangedate3')}}">
                            {{ csrf_field() }}
                            <input type="hidden" name="Hid3[]" id="Hid3" value={{$valmember->id}}>
                            <td>
                                <select name="txttimebegin[]" style="font-size: 13px !important;" onchange="changedate3('{{$key}}');" class="form-control">
                                    <option value="00:00:00">เลือก</option>
                                    <option value="06:00:00" @if($valmember->openElectionTime=="06:00:00") selected @endif>06.00 น.</option>
                                    <option value="07:00:00" @if($valmember->openElectionTime=="07:00:00") selected @endif>07.00 น.</option>
                                    <option value="08:00:00" @if($valmember->openElectionTime=="08:00:00") selected @endif>08.00 น.</option>
                                    <option value="09:00:00" @if($valmember->openElectionTime=="09:00:00") selected @endif>09.00 น.</option>
                                    <option value="10:00:00" @if($valmember->openElectionTime=="10:00:00") selected @endif>10.00 น.</option>
                                    <option value="11:00:00" @if($valmember->openElectionTime=="11:00:00") selected @endif>11.00 น.</option>
                                    <option value="12:00:00" @if($valmember->openElectionTime=="12:00:00") selected @endif>12.00 น.</option>
                                    <option value="13:00:00" @if($valmember->openElectionTime=="13:00:00") selected @endif>13.00 น.</option>
                                    <option value="14:00:00" @if($valmember->openElectionTime=="14:00:00") selected @endif>14.00 น.</option>
                                    <option value="15:00:00" @if($valmember->openElectionTime=="15:00:00") selected @endif>15.00 น.</option>
                                    <option value="16:00:00" @if($valmember->openElectionTime=="16:00:00") selected @endif>16.00 น.</option>
                                    <option value="17:00:00" @if($valmember->openElectionTime=="17:00:00") selected @endif>17.00 น.</option>
                                    <option value="18:00:00" @if($valmember->openElectionTime=="18:00:00") selected @endif>18.00 น.</option>
                                </select>
                            </td>
                            <td>
                                <select name="txttimeend[]" style="font-size: 13px !important;" onchange="changedate3('{{$key}}');" class="form-control">
                                        <option value="00:00:00">เลือก</option>
                                    <option value="06:00:00" @if($valmember->endElectionTime=="06:00:00") selected @endif>06.00 น.</option>
                                    <option value="07:00:00" @if($valmember->endElectionTime=="07:00:00") selected @endif>07.00 น.</option>
                                    <option value="08:00:00" @if($valmember->endElectionTime=="08:00:00") selected @endif>08.00 น.</option>
                                    <option value="09:00:00" @if($valmember->endElectionTime=="09:00:00") selected @endif>09.00 น.</option>
                                    <option value="10:00:00" @if($valmember->endElectionTime=="10:00:00") selected @endif>10.00 น.</option>
                                    <option value="11:00:00" @if($valmember->endElectionTime=="11:00:00") selected @endif>11.00 น.</option>
                                    <option value="12:00:00" @if($valmember->endElectionTime=="12:00:00") selected @endif>12.00 น.</option>
                                    <option value="13:00:00" @if($valmember->endElectionTime=="13:00:00") selected @endif>13.00 น.</option>
                                    <option value="14:00:00" @if($valmember->endElectionTime=="14:00:00") selected @endif>14.00 น.</option>
                                    <option value="15:00:00" @if($valmember->endElectionTime=="15:00:00") selected @endif>15.00 น.</option>
                                    <option value="16:00:00" @if($valmember->endElectionTime=="16:00:00") selected @endif>16.00 น.</option>
                                    <option value="17:00:00" @if($valmember->endElectionTime=="17:00:00") selected @endif>17.00 น.</option>
                                    <option value="18:00:00" @if($valmember->endElectionTime=="18:00:00") selected @endif>18.00 น.</option>
                                </select>
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
    });

    @if (Session::has('success'))
    toastr.options = {
        closeButton: true,
        progressBar: true,
        showMethod: 'slideDown',
        timeOut: 1000
    };
    toastr.success('แก้ไขเรียบร้อยแล้ว', '');
    @endif
    @if (Session::has( 'error' ))
    toastr.options = {
        closeButton: true,
        progressBar: true,
        showMethod: 'slideDown',
        timeOut: 2000
    };
    toastr.error('แก้ไขไม่ได้!!!', '');
    @endif
    @if (Session::has( 'warning1' ))
    toastr.options = {
        closeButton: true,
        progressBar: true,
        showMethod: 'slideDown',
        timeOut: 3000
    };
    toastr.warning('กำหนดวันที่ ให้ถูกต้อง!!!', '');
    @endif
    @if (Session::has( 'warning2' ))
    toastr.options = {
        closeButton: true,
        progressBar: true,
        showMethod: 'slideDown',
        timeOut: 3000
    };
    toastr.warning('วันที่ไม่ควรมีค่าว่าง!!!', '');
    @endif
    @if (Session::has( 'warning3' ))
    toastr.options = {
        closeButton: true,
        progressBar: true,
        showMethod: 'slideDown',
        timeOut: 3000
    };
    toastr.warning('กำหนด เวลาเริ่มต้น-สิ้นสุด ให้ถูกต้อง!!!', '');
    @endif
</script>

<script>
    function changedate(id){
        document.getElementsByName('frmchangedate[]')[id].submit();
    }

    function changedate2(id){
        document.getElementsByName('frmchangedate2[]')[id].submit();
    }

    function changedate3(id){
        document.getElementsByName('frmchangedate3[]')[id].submit();
    }
</script>

@endsection
