@extends('backend.theme.master')
@section('title','NHCO ADMIN')

@section('content')
<div class="card border-info mb-16">
    <div class="card-header">
        <strong>ผลการลงคะแนนแบบ Real Time ผู้แทนองค์กรภาคเอกชน {{ $group->groupName }} </strong>
    </div>
    <div class="card-body">
        <div class="control-insitepage2f">
            <div class="container">

                    {{-- {{$listvote}} <br><br>{{$listpoint}} --}}

                @if($listvote->isEmpty() and $listpoint->isEmpty())
                    ยังไม่มีผลการลงคะแนน
                    <form id="frmRT" method="GET" action="{{url('backend/RT/ngoRTAll/'.$group_id)}}">
                        {{ csrf_field() }}
                    </form>


                @elseif(count($listpoint)>0)

                    รับรองผลการลงคะแนนเรียบร้อยแล้ว
                    <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th width="100px" class="t-center2f text-center"><span>ลำดับ</span></th>
                                <th width="100px" class="t-center2f text-center"><span>คะแนนรวม</span></th>
                                <th width="100px" class="t-center2f text-center"><span>หมายเลข</span></th>
                                <th width="58%" class="text-center"><span class="paddingleft20">ชื่อ - นามสกุล</span></th>
                            </tr>
                        </thead>

                        <tbody>
                        @foreach($listpoint as $key=>$valpoint)
                            <tr>
                                <td width="100px" class="t-center2f"><span>
                                <div class="box-order2f text-center">
                                    <h1><span>{{$key+1}}</span></h1>
                                </div>
                                </span>
                                </td>

                                <td align="middle">
                                    {{--  {{$valpoint->point}}  --}}
                                    <h1><span>{{ $valpoint->memberPoint}}</span></h1>
                                </td>

                                <td width="100px" class="t-center2f text-center">
                                    <h1><span>{{$valpoint->member->candidateNumber}}</span></h1>
                                </td>

                                <td width="58%">
                                <div class="box-td-name2f">
                                    <div class="img-person2f square">
                                        {{--  {{$valpoint->voteToJoin->attach->where('use_is','personal_photo')->first()->path}}  --}}
                                    <span><img src="{{asset($valpoint->member->attach->where('use_is','personal_photo')->first()->path)}}" width="100px" alt=""></span>
                                        &nbsp;&nbsp;{{$valpoint->member->nameTitle}}{{$valpoint->member->firstname}} {{$valpoint->member->lastname}} ( {{$valpoint->draw_status}} )
                                    </div>
                                </div><!--end box-td-name2f-->
                                </td>

                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                    </div>



                @else

                    {{--  <p id="time"></p>  --}}
                    <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th width="100px" class="t-center2f text-center"><span>ลำดับ</span></th>
                                <th width="100px" class="t-center2f text-center"><span>คะแนนรวม</span></th>
                                <th width="100px" class="t-center2f text-center"><span>หมายเลข</span></th>
                                <th width="58%" class="text-center"><span class="paddingleft20">ชื่อ - นามสกุล</span></th>
                            </tr>
                        </thead>

                        <tbody>
                        @foreach($listvote as $key=>$valpoint)
                            <tr>
                                <td width="100px" class="t-center2f"><span>
                                <div class="box-order2f text-center">
                                    <h1><span>{{$key+1}}</span></h1>
                                </div>
                                </span>
                                </td>

                                <td align="middle">
                                    {{--  {{$valpoint->point}}  --}}
                                    <h1><span>{{ $valpoint->sumPoints}}</span></h1>
                                </td>

                                <td width="100px" class="t-center2f text-center">
                                    <h1><span>{{$valpoint->memberVoteTo->candidateNumber}}</span></h1>
                                </td>

                                <td width="58%">
                                <div class="box-td-name2f">
                                    <div class="img-person2f square">
                                        {{--  {{$valpoint->voteToJoin->attach->where('use_is','personal_photo')->first()->path}}  --}}
                                    <span><img src="{{asset($valpoint->memberVoteTo->attach->where('use_is','personal_photo')->first()->path)}}" width="100px" alt=""></span>
                                        &nbsp;&nbsp;{{$valpoint->memberVoteTo->nameTitle}}{{$valpoint->memberVoteTo->firstname}} {{$valpoint->memberVoteTo->lastname}}
                                    </div>
                                </div><!--end box-td-name2f-->
                                </td>

                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                    </div>

                    <form id="frmRT" method="GET" action="{{url('backend/RT/ngoRTAll/'.$group_id)}}">
                        {{ csrf_field() }}
                    </form>

                    <div class="d-flex justify-content-center">
                    {{-- @if(!empty($listelection))
                        @if($listelection->electionDate >= date('Y-m-d') and $listelection->electionTime >= date('H:i:s')) --}}
                            @php if(!empty($listwin)){ $countqty=count($listwin); }else{ $countqty=0; } @endphp
                            @if(  $countqty == 0)
                                <a href="/backend/RT/NGOconfirm/{{$group_id}}"><button type="button" style="width:500px"  class="btn btn-primary">รับรองผลการลงคะแนน</button></a>

                            @endif
                        {{-- @endif
                    @endif --}}
                    </div>


                @endif

            </div>
    </div>
</div>
@endsection

@section('js')
<script>
    var pointnow = setInterval(RT, 60000);
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
