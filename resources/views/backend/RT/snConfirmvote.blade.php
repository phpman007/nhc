@extends('backend.theme.master')
@section('title','NHCO ADMIN')

@section('content')
<div class="card border-info mb-16">
    <div class="card-header">
        <strong>รับรอง ผลการลงคะแนนแบบ Real Time ผู้ทรงคุณวุฒิ {{ $group->groupName }} </strong>
    </div>
    <div class="card-body">
        <div class="control-insitepage2f">
            <div class="container">

                @if($listpoint->isEmpty())
                    ยังไม่มีผลการลงคะแนน
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
                                <th width="100px" class="t-center2f text-center"><span>เลือกผู้ชนะ</span></th>
                            </tr>
                        </thead>
                        <tbody>
                        @php $i=0; @endphp
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
                                        {{-- @php
                                            $listpath=DB::table('attach_files')
                                            ->where('member_id','=',$valpoint->memberId)
                                            ->where('use_is','=','personal_photo')
                                            ->where('status','=',1)
                                            ->select('path')
                                            ->get();

                                            foreach($listpath as $val){
                                                $path=$val->path;
                                            }

                                        @endphp --}}

                                         {{-- {{$valpoint->member->attach->where('use_is','personal_photo')->first()->path}} --}}
                                    <span><img src="{{asset($valpoint->member->attach->where('use_is','personal_photo')->first()->path)}}" width="100px" alt=""></span>
                                        &nbsp;&nbsp;{{$valpoint->member->nameTitle}}{{$valpoint->member->firstname}} {{$valpoint->member->lastname}}
                                    </div>
                                </div><!--end box-td-name2f-->
                                </td>


                                <td>

                                    @if($No1point > 1 and $i<$No1point)
                                        @php $i++; @endphp
                                        <a href="/backend/RT/SNselect/{{$group_id}}/{{$valpoint->id}}"><div class="d-flex justify-content-center"><button type="button" class="btn btn-primary">เลือกผู้ชนะ</button></div></a>
                                    @elseif($valpoint->draw_status==1)
                                        OK
                                    @endif

                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                    </div>


                @endif

                <form id="frmRT" method="GET" action="{{url('backend/RT/snRTAll/'.$group_id)}}">
                    {{ csrf_field() }}
                </form>

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

</script>
@endsection
