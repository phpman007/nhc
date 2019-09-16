@extends('backend.theme.master')
@section('title','NHCO ADMIN')

@section('content')
@php $One=0; @endphp
<div class="card border-info mb-16">
    <div class="card-header">
        <strong>ผลการลงคะแนนแบบ Real Time ผู้ทรงคุณวุฒิ {{ $group->groupName }} </strong>
    </div>
    <div class="card-body">
        <div class="control-insitepage2f">
            <div class="container">

                {{--  ยังไม่มีผู้มายืนยันสิทธิ์ลงคะแนน  --}}
                @if($canelection==0)

                    <div class="content-result2f">
                        <div class="content-table-list2f table-brown">
                            <div class="table-responsive">
                                <table class="table">
                                <thead>
                                    <tr>
                                    <th width="25%" class="t-center2f"><span>จำนวนผู้ที่มีสิทธิ์ลงคะแนน</span></th>
                                    <th width="25%" class="t-center2f"><span>จำนวนผู้ที่มาลงคะแนน</span></th>
                                    <th width="25%" class="t-center2f"><span>จำนวนผู้ที่ไม่ประสงค์ลงคะแนน</span></th>
                                    <th width="25%" class="t-center2f"><span>จำนวนผู้ที่ไม่มาลงคะแนน</span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <td width="25%" class="t-center2f"><span>{{$canelection}} คน</span></td>
                                    <td width="25%" class="t-center2f"><span>{{$vote}} คน</span></td>
                                    <td width="25%" class="t-center2f"><span>{{$notvote}} คน</span></td>
                                    <td width="25%" class="t-center2f"><span>{{$canelection-($vote+$notvote)}} คน</span></td>
                                    </tr>
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    {{--  <div class="d-flex justify-content-center">  --}}
                        <a href="/backend/RT/snRTAll/{{$group_id}}"><button type="button" class="btn btn-primary">Refresh</button></a>
                    {{--  </div>  --}}

                    <form id="frmRT" method="GET" action="{{url('backend/RT/snRTAll/'.$group_id)}}">
                        {{ csrf_field() }}
                    </form>

                {{--  //รับรองผลการลงคะแนนแล้ว  --}}
                @elseif(count($listpoint)>0)
                    <div class="content-result2f">
                        <div class="content-table-list2f table-brown">
                            <div class="table-responsive">
                                <table class="table">
                                <thead>
                                    <tr>
                                    <th width="25%" class="t-center2f"><span>จำนวนผู้ที่มีสิทธิ์ลงคะแนน</span></th>
                                    <th width="25%" class="t-center2f"><span>จำนวนผู้ที่มาลงคะแนน</span></th>
                                    <th width="25%" class="t-center2f"><span>จำนวนผู้ที่ไม่ประสงค์ลงคะแนน</span></th>
                                    <th width="25%" class="t-center2f"><span>จำนวนผู้ที่ไม่มาลงคะแนน</span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <td width="25%" class="t-center2f"><span>{{$canelection}} คน</span></td>
                                    <td width="25%" class="t-center2f"><span>{{$vote}} คน</span></td>
                                    <td width="25%" class="t-center2f"><span>{{$notvote}} คน</span></td>
                                    <td width="25%" class="t-center2f"><span>{{$canelection-($vote+$notvote)}} คน</span></td>
                                    </tr>
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="content-table-list2f table-blue">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th width="13%" class="t-center2f"><span>คะแนน</span></th>
                                    <th width="17%" class="t-center2f"><span>หมายเลขเลือกตั้ง</span></th>
                                    <th width="50%" class="t-center2f"><span>ชื่อ - นามสกุล</span></th>
                                    <th width="20%" lass="t-center2f"><span>รับรองผลการลงคะแนน</span></th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($listpoint as $key=>$valpoint)
                                    <tr>
                                        <td width="13%" class="t-center2f"><span>{{ $valpoint->memberPoint}}</span></td>
                                        <td width="17%" class="t-center2f"><span>{{$valpoint->member->candidateNumber}}</span></td>
                                        <td width="50%">
                                            <div class="box-td-name2f">
                                                <div class="img-person2f square">
                                                <span><img src="{{asset($valpoint->member->attach->where('use_is','personal_photo')->first()->path)}}" alt=""></span>
                                                </div>
                                                <div class="text-name2f">{{$valpoint->member->nameTitle}}{{$valpoint->member->firstname}} {{$valpoint->member->lastname}}</div>
                                            </div>
                                        </td>
                                        {{--  @if($valpoint->draw_status == 1)
                                            <td align="middle">รับรองผลการลงคะแนน</td>
                                        @else
                                            <td></td>
                                        @endif  --}}

                                        <td align="middle">รับรองผลการลงคะแนน</td>
                                    </tr>
                                    @endforeach

                                    @foreach($listpoint2 as $key=>$valpoint)
                                    <tr>
                                        <td width="13%" class="t-center2f"><span>0</span></td>
                                        <td width="17%" class="t-center2f"><span>{{$valpoint->candidateNumber}}</span></td>
                                        <td width="50%">
                                            <div class="box-td-name2f">
                                                <div class="img-person2f square">
                                                    @php
                                                        $listattach=DB::table('attach_files')
                                                        ->where('member_id',$valpoint->id)
                                                        ->where('status',1)
                                                        ->where('use_is','personal_photo')
                                                        ->select('path')
                                                        ->first();
                                                    @endphp
                                                <span><img src="{{asset($listattach->path)}}" alt=""></span>
                                                </div>
                                                <div class="text-name2f">{{$valpoint->nameTitle}}{{$valpoint->firstname}} {{$valpoint->lastname}}</div>
                                            </div>
                                        </td>
                                        <td align="middle">รับรองผลการลงคะแนน</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{--  <div class="d-flex justify-content-center">รับรองผลการลงคะแนนเรียบร้อยแล้ว</div>  --}}
                        </div>
                    </div>

                {{--  //ยังไม่ได้รับรองผลการลงคะแนน  --}}
                @else
                    <div class="content-result2f">
                        <div class="content-table-list2f table-brown">
                            <div class="table-responsive">
                                <table class="table">
                                <thead>
                                    <tr>
                                    <th width="25%" class="t-center2f"><span>จำนวนผู้ที่มีสิทธิ์ลงคะแนน</span></th>
                                    <th width="25%" class="t-center2f"><span>จำนวนผู้ที่มาลงคะแนน</span></th>
                                    <th width="25%" class="t-center2f"><span>จำนวนผู้ที่ไม่ประสงค์ลงคะแนน</span></th>
                                    <th width="25%" class="t-center2f"><span>จำนวนผู้ที่ไม่มาลงคะแนน</span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <td width="25%" class="t-center2f"><span>{{$canelection}} คน</span></td>
                                    <td width="25%" class="t-center2f"><span>{{$vote}} คน</span></td>
                                    <td width="25%" class="t-center2f"><span>{{$notvote}} คน</span></td>
                                    <td width="25%" class="t-center2f"><span>{{$canelection-($vote+$notvote)}} คน</span></td>
                                    </tr>
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    {{--  <div class="d-flex justify-content-center">  --}}
                        <a href="/backend/RT/snRTAll/{{$group_id}}"><button type="button" class="btn btn-primary">Refresh</button></a>
                    {{--  </div>  --}}
                    <br><br>
                    <div class="content-table-list2f table-blue">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th width="13%" class="t-center2f"><span>คะแนน</span></th>
                                    <th width="17%" class="t-center2f"><span>หมายเลขเลือกตั้ง</span></th>
                                    <th width="50%" class="t-center2f"><span>ชื่อ - นามสกุล</span></th>
                                    <th width="20%" class="t-center2f"><span>รับรองผลการลงคะแนน</span></th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($listvote as $key=>$valpoint)
                                        @php if($key==0){ $One = $valpoint->sumPoints; } @endphp

                                    <tr>
                                        <td width="13%" class="t-center2f"><span>{{ $valpoint->sumPoints}}</span></td>
                                        <td width="17%" class="t-center2f"><span>{{$valpoint->memberVoteTo->candidateNumber}}</span></td>
                                        <td width="50%">
                                            <div class="box-td-name2f">
                                                <div class="img-person2f square">
                                                <span><img src="{{asset($valpoint->memberVoteTo->attach->where('use_is','personal_photo')->first()->path)}}" alt=""></span>
                                                </div>
                                                <div class="text-name2f">{{$valpoint->memberVoteTo->nameTitle}}{{$valpoint->memberVoteTo->firstname}} {{$valpoint->memberVoteTo->lastname}}</div>
                                            </div>
                                        </td>
                                        {{--  @if($One == $valpoint->sumPoints )
                                                <td><a href="/backend/RT/SNconfirm/{{$group_id}}/{{$valpoint->voteTo}}"><button class="btn btn-primary" type="button">รับรองผลการลงคะแนน</button></a></td>
                                        @else <td></td> @endif  --}}

                                        @if($One == $valpoint->sumPoints )
                                        <form method="POST" name="frmOK[]" action="{{url('backend/RT/SNconfirm')}}">
                                            <td><button class="btn btn-primary" type="button">รับรองผลการลงคะแนน</button></td>
                                            <input type="hidden" name="Hidgroup[]" value={{$group_id}}>
                                            <input type="hidden" name="Hidmember[]" value={{$valpoint->voteTo}}>
                                        </form>
                                        @else <td></td> @endif


                                    </tr>
                                    @endforeach

                                    @foreach($listvote2 as $key=>$valvote)
                                    <tr>
                                        <td width="13%" class="t-center2f"><span>0</span></td>
                                        <td width="17%" class="t-center2f"><span>{{$valvote->candidateNumber}}</span></td>
                                        <td width="50%">
                                            <div class="box-td-name2f">
                                                <div class="img-person2f square">
                                                    @php
                                                        $listattach=DB::table('attach_files')
                                                        ->where('member_id',$valvote->id)
                                                        ->where('status',1)
                                                        ->where('use_is','personal_photo')
                                                        ->select('path')
                                                        ->first();
                                                    @endphp
                                                <span><img src="{{asset($listattach->path)}}" alt=""></span>
                                                </div>
                                                <div class="text-name2f">{{$valvote->nameTitle}}{{$valvote->firstname}} {{$valvote->lastname}}</div>
                                            </div>
                                        </td>
                                        <td></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <form id="frmRT" method="GET" action="{{url('backend/RT/snRTAll/'.$group_id)}}">
                                {{ csrf_field() }}
                                {{--  <input type="hidden" name="hQty" value="{{$countall}}">  --}}

                                {{--  <input class="form-control" value="{{request()->input('txtname')}}" name="txtname" id="txtname" placeholder="ค้นหาชื่อ, สกุล หรือรหัสเผู้สมัคร">  --}}
                            </form>

                            {{--<div class="d-flex justify-content-center">
                             @if(!empty($listelection))
                                @if($listelection->electionDate >= date('Y-m-d') and $listelection->electionTime >= date('H:i:s')) --}}
                                    {{--  @php if(!empty($listwin)){ $countqty=count($listwin); }else{ $countqty=0; } @endphp
                                    @if(  $countqty == 0)
                                        <a href="/backend/RT/SNconfirm/{{$group_id}}"><button type="button" style="width:500px"  class="btn btn-primary">รับรองผลการลงคะแนน</button></a>

                                    @endif  --}}
                                {{-- @endif
                            @endif
                            </div> --}}
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>


@endsection

@section('js')
<script>

    @if (Session::has('success'))
    toastr.options = {
        closeButton: true,
        progressBar: true,
        showMethod: 'slideDown',
        timeOut: 5000
    };
    toastr.success("{{ Session::get('success') }}", '');
    @endif

    @if (Session::has( 'error' ))
        toastr.options = {
            closeButton: true,
            progressBar: true,
            showMethod: 'slideDown',
            timeOut: 5000
        };
        toastr.error("{{ Session::get('error') }}", '');
    @endif

    var pointnow = setInterval(RT, 30000);
    {{--  var timenow = setInterval(time, 1000);  --}}

    function RT() {
      document.getElementById('frmRT').submit();
    }

    {{--  function time() {
        var a = new Date();
        document.getElementById("time").innerHTML = a.toLocaleTimeString();
    }  --}}
</script>
@endsection
