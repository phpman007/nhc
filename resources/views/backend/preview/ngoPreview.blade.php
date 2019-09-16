@extends('backend.theme.master')
@section('title','NHCO ADMIN')

@section('content')
{{-- <a href="#" class="previous round">&#8249;</a>
<a href="#" class="next round">&#8250;</a><br> --}}
<div class="mainpage">
<div class="card border-info mb-3">
    <div class="card-header">
        <strong>ตรวจสอบหลักฐาน ผู้แทนองค์กรภาคเอกชน (NGOs)</strong>
        <div align="right">
            @php
                $keynow=0;
                $id2=0;
                $id3=0;
                foreach($member2 as $key=>$vals){
                    if($vals->id == $member->id){
                        $keynow=$key;
                    }
                }
                if($member2->count()>1){
                    if($keynow==0){
                        $id3=$member2[$keynow+1]->id;
                    }elseif($keynow+1 == $member2->count()){
                        $id2=$member2[$keynow-1]->id;
                    }else{
                        $id2=$member2[$keynow-1]->id;
                        $id3=$member2[$keynow+1]->id;
                    }
                }
            @endphp

            @if($id2!=0)
                <a href="/backend/ngoPreview/{{ $id2 }}/{{ $name }}/{{ $group1 }}/{{ $group2 }}/{{ $group3 }}/{{ $status1 }}/{{ $status2 }}/{{ $status3 }}/{{ $section1 }}/{{ $section2 }}/{{ $section3 }}/{{ $pro1 }}/{{ $pro2 }}/{{ $pro3 }}"><button type="button" class="btn btn-primary"><i class="fa fa-chevron-left"></i> ก่อนหน้า</button></a>
            @endif

            @if($id3!=0)
                <a href="/backend/ngoPreview/{{ $id3 }}/{{ $name }}/{{ $group1 }}/{{ $group2 }}/{{ $group3 }}/{{ $status1 }}/{{ $status2 }}/{{ $status3 }}/{{ $section1 }}/{{ $section2 }}/{{ $section3 }}/{{ $pro1 }}/{{ $pro2 }}/{{ $pro3 }}"><button type="button" class="btn btn-primary">ถัดไป <i class="fa fa-chevron-right"></i></button></a>
            @endif

            {{-- <button class="btn btn-info" type="button" onClick="window.print()"><i class="fa fa-print"></i> พิมพ์</button> --}}

            @if(request()->idreturn==1)
                <a href="{{ url('backend/check/ngoCheck') }}">
            @elseif(request()->idreturn==2)
                    @php
                        $idprovince = request()->idprovince;
                        $idgroup = request()->idgroup;
                    @endphp
                {{-- <a href="{{ url('/backend/approveAll/ngoApproveAll/{{$idprovince}}/{{$idgroup}}') }}"></a> --}}
            @endif

            {{-- a={{$name}} g={{$group1}} s={{$status1}} sec={{$section1}} pro={{$pro1}} --}}
            @if(($name!="" or $name!=0) and $group1!=0 and $status1!=0 and $section1!=0 and $pro1!=0)
                <a href="{{ url('backend/check/ngoCheck')}}?txtname={{$name}}&txtgroup%5B%5D={{$group1}}&txtgroup%5B%5D={{$group2}}&txtgroup%5B%5D={{$group3}}&txtstatus%5B%5D={{$status1}}&txtstatus%5B%5D={{$status2}}&txtstatus%5B%5D={{$status3}}&txtsection%5B%5D={{$section1}}&txtsection%5B%5D={{$section2}}&txtsection%5B%5D={{$section3}}&txtprovince%5B%5D={{$pro1}}&txtprovince%5B%5D={{$pro2}}&txtprovince%5B%5D={{$pro3}}">
                    <button id="back" name="back" type="button" class="btn btn-danger"><i class="fa fa-times"></i> ปิด</button>
                </a>
            @elseif(($name!="" or $name!=0) and $group1!=0 and $status1!=0 and $section1!=0 )
                <a href="{{ url('backend/check/ngoCheck')}}?txtname={{$name}}&txtgroup%5B%5D={{$group1}}&txtgroup%5B%5D={{$group2}}&txtgroup%5B%5D={{$group3}}&txtstatus%5B%5D={{$status1}}&txtstatus%5B%5D={{$status2}}&txtstatus%5B%5D={{$status3}}&txtsection%5B%5D={{$section1}}&txtsection%5B%5D={{$section2}}&txtsection%5B%5D={{$section3}}">
                    <button id="back" name="back" type="button" class="btn btn-danger"><i class="fa fa-times"></i> ปิด</button>
                </a>
            @elseif(($name!="" or $name!=0) and $group1!=0 and $status1!=0 and $pro1!=0)
                <a href="{{ url('backend/check/ngoCheck')}}?txtname={{$name}}&txtgroup%5B%5D={{$group1}}&txtgroup%5B%5D={{$group2}}&txtgroup%5B%5D={{$group3}}&txtstatus%5B%5D={{$status1}}&txtstatus%5B%5D={{$status2}}&txtstatus%5B%5D={{$status3}}&txtprovince%5B%5D={{$pro1}}&txtprovince%5B%5D={{$pro2}}&txtprovince%5B%5D={{$pro3}}">
                    <button id="back" name="back" type="button" class="btn btn-danger"><i class="fa fa-times"></i> ปิด</button>
                </a>
            @elseif(($name!="" or $name!=0) and $group1!=0 and $section1!=0 and $pro1!=0)
                <a href="{{ url('backend/check/ngoCheck')}}?txtname={{$name}}&txtgroup%5B%5D={{$group1}}&txtgroup%5B%5D={{$group2}}&txtgroup%5B%5D={{$group3}}&txtsection%5B%5D={{$section1}}&txtsection%5B%5D={{$section2}}&txtsection%5B%5D={{$section3}}&txtprovince%5B%5D={{$pro1}}&txtprovince%5B%5D={{$pro2}}&txtprovince%5B%5D={{$pro3}}">
                    <button id="back" name="back" type="button" class="btn btn-danger"><i class="fa fa-times"></i> ปิด</button>
                </a>
            @elseif(($name!="" or $name!=0) and $status1!=0 and $section1!=0 and $pro1!=0)
                <a href="{{ url('backend/check/ngoCheck')}}?txtname={{$name}}&txtstatus%5B%5D={{$status1}}&txtstatus%5B%5D={{$status2}}&txtstatus%5B%5D={{$status3}}&txtsection%5B%5D={{$section1}}&txtsection%5B%5D={{$section2}}&txtsection%5B%5D={{$section3}}&txtprovince%5B%5D={{$pro1}}&txtprovince%5B%5D={{$pro2}}&txtprovince%5B%5D={{$pro3}}">
                    <button id="back" name="back" type="button" class="btn btn-danger"><i class="fa fa-times"></i> ปิด</button>
                </a>
            @elseif($group1!=0 or $status1!=0 and $section1!=0 and $pro1!=0)
                <a href="{{ url('backend/check/ngoCheck')}}?txtgroup%5B%5D={{$group1}}&txtgroup%5B%5D={{$group2}}&txtgroup%5B%5D={{$group3}}&txtstatus%5B%5D={{$status1}}&txtstatus%5B%5D={{$status2}}&txtstatus%5B%5D={{$status3}}&txtsection%5B%5D={{$section1}}&txtsection%5B%5D={{$section2}}&txtsection%5B%5D={{$section3}}&txtprovince%5B%5D={{$pro1}}&txtprovince%5B%5D={{$pro2}}&txtprovince%5B%5D={{$pro3}}">
                    <button id="back" name="back" type="button" class="btn btn-danger"><i class="fa fa-times"></i> ปิด</button>
                </a>
            @elseif(($name!="" or $name!=0) and $group1!=0 and $status1!=0 )
                <a href="{{ url('backend/check/ngoCheck')}}?txtname={{$name}}&txtgroup%5B%5D={{$group1}}&txtgroup%5B%5D={{$group2}}&txtgroup%5B%5D={{$group3}}&txtstatus%5B%5D={{$status1}}&txtstatus%5B%5D={{$status2}}&txtstatus%5B%5D={{$status3}}">
                    <button id="back" name="back" type="button" class="btn btn-danger"><i class="fa fa-times"></i> ปิด</button>
                </a>
            @elseif(($name!="" or $name!=0) and $group1!=0 and $section1!=0)
                <a href="{{ url('backend/check/ngoCheck')}}?txtname={{$name}}&txtgroup%5B%5D={{$group1}}&txtgroup%5B%5D={{$group2}}&txtgroup%5B%5D={{$group3}}&txtsection%5B%5D={{$section1}}&txtsection%5B%5D={{$section2}}&txtsection%5B%5D={{$section3}}">
                    <button id="back" name="back" type="button" class="btn btn-danger"><i class="fa fa-times"></i> ปิด</button>
                </a>
            @elseif(($name!="" or $name!=0) and $group1!=0 and $pro1!=0)
                <a href="{{ url('backend/check/ngoCheck')}}?txtname={{$name}}&txtgroup%5B%5D={{$group1}}&txtgroup%5B%5D={{$group2}}&txtgroup%5B%5D={{$group3}}&txtprovince%5B%5D={{$pro1}}&txtprovince%5B%5D={{$pro2}}&txtprovince%5B%5D={{$pro3}}">
                    <button id="back" name="back" type="button" class="btn btn-danger"><i class="fa fa-times"></i> ปิด</button>
                </a>
            @elseif(($name!="" or $name!=0) and $status1!=0 and $section1!=0 )
                <a href="{{ url('backend/check/ngoCheck')}}?txtname={{$name}}&txtstatus%5B%5D={{$status1}}&txtstatus%5B%5D={{$status2}}&txtstatus%5B%5D={{$status3}}&txtsection%5B%5D={{$section1}}&txtsection%5B%5D={{$section2}}&txtsection%5B%5D={{$section3}}">
                    <button id="back" name="back" type="button" class="btn btn-danger"><i class="fa fa-times"></i> ปิด</button>
                </a>
            @elseif(($name!="" or $name!=0) and $status1!=0 and $pro1!=0)
                <a href="{{ url('backend/check/ngoCheck')}}?txtname={{$name}}&txtstatus%5B%5D={{$status1}}&txtstatus%5B%5D={{$status2}}&txtstatus%5B%5D={{$status3}}&txtprovince%5B%5D={{$pro1}}&txtprovince%5B%5D={{$pro2}}&txtprovince%5B%5D={{$pro3}}">
                    <button id="back" name="back" type="button" class="btn btn-danger"><i class="fa fa-times"></i> ปิด</button>
                </a>
            @elseif($group1!=0 and $status1!=0 and $section1!=0)
                <a href="{{ url('backend/check/ngoCheck')}}?txtgroup%5B%5D={{$group1}}&txtgroup%5B%5D={{$group2}}&txtgroup%5B%5D={{$group3}}&txtstatus%5B%5D={{$status1}}&txtstatus%5B%5D={{$status2}}&txtstatus%5B%5D={{$status3}}&txtsection%5B%5D={{$section1}}&txtsection%5B%5D={{$section2}}&txtsection%5B%5D={{$section3}}">
                    <button id="back" name="back" type="button" class="btn btn-danger"><i class="fa fa-times"></i> ปิด</button>
                </a>
            @elseif($group1!=0 and $status1!=0 and $pro1!=0)
                <a href="{{ url('backend/check/ngoCheck')}}?txtgroup%5B%5D={{$group1}}&txtgroup%5B%5D={{$group2}}&txtgroup%5B%5D={{$group3}}&txtstatus%5B%5D={{$status1}}&txtstatus%5B%5D={{$status2}}&txtstatus%5B%5D={{$status3}}&txtprovince%5B%5D={{$pro1}}&txtprovince%5B%5D={{$pro2}}&txtprovince%5B%5D={{$pro3}}">
                    <button id="back" name="back" type="button" class="btn btn-danger"><i class="fa fa-times"></i> ปิด</button>
                </a>
            @elseif($status1!=0 and $section1!=0 and $pro1!=0)
                <a href="{{ url('backend/check/ngoCheck')}}?txtstatus%5B%5D={{$status1}}&txtstatus%5B%5D={{$status2}}&txtstatus%5B%5D={{$status3}}&txtsection%5B%5D={{$section1}}&txtsection%5B%5D={{$section2}}&txtsection%5B%5D={{$section3}}&txtprovince%5B%5D={{$pro1}}&txtprovince%5B%5D={{$pro2}}&txtprovince%5B%5D={{$pro3}}">
                    <button id="back" name="back" type="button" class="btn btn-danger"><i class="fa fa-times"></i> ปิด</button>
                </a>
            @elseif($group1!=0 and $section1!=0 and $pro1!=0)
                <a href="{{ url('backend/check/ngoCheck')}}?txtgroup%5B%5D={{$group1}}&txtgroup%5B%5D={{$group2}}&txtgroup%5B%5D={{$group3}}&txtsection%5B%5D={{$section1}}&txtsection%5B%5D={{$section2}}&txtsection%5B%5D={{$section3}}&txtprovince%5B%5D={{$pro1}}&txtprovince%5B%5D={{$pro2}}&txtprovince%5B%5D={{$pro3}}">
                    <button id="back" name="back" type="button" class="btn btn-danger"><i class="fa fa-times"></i> ปิด</button>
                </a>
            @elseif(($name!="" or $name!=0) and $section1!=0 and $pro1!=0)
                <a href="{{ url('backend/check/ngoCheck')}}?txtname={{$name}}&txtsection%5B%5D={{$section1}}&txtsection%5B%5D={{$section2}}&txtsection%5B%5D={{$section3}}&txtprovince%5B%5D={{$pro1}}&txtprovince%5B%5D={{$pro2}}&txtprovince%5B%5D={{$pro3}}">
                    <button id="back" name="back" type="button" class="btn btn-danger"><i class="fa fa-times"></i> ปิด</button>
                </a>
            @elseif(($name!="" or $name!=0) and $group1!=0)
                <a href="{{ url('backend/check/ngoCheck')}}?txtname={{$name}}&txtgroup%5B%5D={{$group1}}&txtgroup%5B%5D={{$group2}}&txtgroup%5B%5D={{$group3}}">
                    <button id="back" name="back" type="button" class="btn btn-danger"><i class="fa fa-times"></i> ปิด</button>
                </a>
            @elseif(($name!="" or $name!=0) and $section1!=0 )
                <a href="{{ url('backend/check/ngoCheck')}}?txtname={{$name}}&txtsection%5B%5D={{$section1}}&txtsection%5B%5D={{$section2}}&txtsection%5B%5D={{$section3}}">
                    <button id="back" name="back" type="button" class="btn btn-danger"><i class="fa fa-times"></i> ปิด</button>
                </a>
            @elseif(($name!="" or $name!=0) and $status1!=0)
                <a href="{{ url('backend/check/ngoCheck')}}?txtname={{$name}}&txtstatus%5B%5D={{$status1}}&txtstatus%5B%5D={{$status2}}&txtstatus%5B%5D={{$status3}}">
                    <button id="back" name="back" type="button" class="btn btn-danger"><i class="fa fa-times"></i> ปิด</button>
                </a>
            @elseif(($name!="" or $name!=0) and $pro1!=0)
                <a href="{{ url('backend/check/ngoCheck')}}?txtname={{$name}}&txtprovince%5B%5D={{$pro1}}&txtprovince%5B%5D={{$pro2}}&txtprovince%5B%5D={{$pro3}}">
                    <button id="back" name="back" type="button" class="btn btn-danger"><i class="fa fa-times"></i> ปิด</button>
                </a>
            @elseif($group1!=0 and $status1!=0)
                <a href="{{ url('backend/check/ngoCheck')}}?txtgroup%5B%5D={{$group1}}&txtgroup%5B%5D={{$group2}}&txtgroup%5B%5D={{$group3}}&txtstatus%5B%5D={{$status1}}&txtstatus%5B%5D={{$status2}}&txtstatus%5B%5D={{$status3}}">
                    <button id="back" name="back" type="button" class="btn btn-danger"><i class="fa fa-times"></i> ปิด</button>
                </a>
            @elseif($group1!=0 and $section1!=0)
                <a href="{{ url('backend/check/ngoCheck')}}?txtgroup%5B%5D={{$group1}}&txtgroup%5B%5D={{$group2}}&txtgroup%5B%5D={{$group3}}&txtsection%5B%5D={{$section1}}&txtsection%5B%5D={{$section2}}&txtsection%5B%5D={{$section3}}">
                    <button id="back" name="back" type="button" class="btn btn-danger"><i class="fa fa-times"></i> ปิด</button>
                </a>
            @elseif($group1!=0 and $pro1!=0)
                <a href="{{ url('backend/check/ngoCheck')}}?txtgroup%5B%5D={{$group1}}&txtgroup%5B%5D={{$group2}}&txtgroup%5B%5D={{$group3}}&txtprovince%5B%5D={{$pro1}}&txtprovince%5B%5D={{$pro2}}&txtprovince%5B%5D={{$pro3}}">
                    <button id="back" name="back" type="button" class="btn btn-danger"><i class="fa fa-times"></i> ปิด</button>
                </a>
            @elseif($status1!=0 and $section1!=0)
                <a href="{{ url('backend/check/ngoCheck')}}?txtstatus%5B%5D={{$status1}}&txtstatus%5B%5D={{$status2}}&txtstatus%5B%5D={{$status3}}&txtsection%5B%5D={{$section1}}&txtsection%5B%5D={{$section2}}&txtsection%5B%5D={{$section3}}">
                    <button id="back" name="back" type="button" class="btn btn-danger"><i class="fa fa-times"></i> ปิด</button>
                </a>
            @elseif($status1!=0 and $pro1!=0)
                <a href="{{ url('backend/check/ngoCheck')}}?txtstatus%5B%5D={{$status1}}&txtstatus%5B%5D={{$status2}}&txtstatus%5B%5D={{$status3}}&txtprovince%5B%5D={{$pro1}}&txtprovince%5B%5D={{$pro2}}&txtprovince%5B%5D={{$pro3}}">
                    <button id="back" name="back" type="button" class="btn btn-danger"><i class="fa fa-times"></i> ปิด</button>
                </a>
            @elseif($section1!=0 and $pro1!=0)
                <a href="{{ url('backend/check/ngoCheck')}}?txtsection%5B%5D={{$section1}}&txtsection%5B%5D={{$section2}}&txtsection%5B%5D={{$section3}}&txtprovince%5B%5D={{$pro1}}&txtprovince%5B%5D={{$pro2}}&txtprovince%5B%5D={{$pro3}}">
                    <button id="back" name="back" type="button" class="btn btn-danger"><i class="fa fa-times"></i> ปิด</button>
                </a>
            @elseif($name!="" or $name!=0)
                <a href="{{ url('backend/check/ngoCheck')}}?txtname={{$name}}">
                    <button id="back" name="back" type="button" class="btn btn-danger"><i class="fa fa-times"></i> ปิด</button>
                </a>
            @elseif($group1!=0)
                <a href="{{ url('backend/check/ngoCheck')}}?txtgroup%5B%5D={{$group1}}&txtgroup%5B%5D={{$group2}}&txtgroup%5B%5D={{$group3}}">
                    <button id="back" name="back" type="button" class="btn btn-danger"><i class="fa fa-times"></i> ปิด</button>
                </a>
            @elseif($status1!=0)
                <a href="{{ url('backend/check/ngoCheck')}}?txtstatus%5B%5D={{$status1}}&txtstatus%5B%5D={{$status2}}&txtstatus%5B%5D={{$status3}}">
                    <button id="back" name="back" type="button" class="btn btn-danger"><i class="fa fa-times"></i> ปิด</button>
                </a>
            @elseif($section1!=0 )
                <a href="{{ url('backend/check/ngoCheck')}}?txtsection%5B%5D={{$section1}}&txtsection%5B%5D={{$section2}}&txtsection%5B%5D={{$section3}}">
                    <button id="back" name="back" type="button" class="btn btn-danger"><i class="fa fa-times"></i> ปิด</button>
                </a>
            @elseif($pro1!=0)
                <a href="{{ url('backend/check/ngoCheck')}}?txtprovince%5B%5D={{$pro1}}&txtprovince%5B%5D={{$pro2}}&txtprovince%5B%5D={{$pro3}}">
                    <button id="back" name="back" type="button" class="btn btn-danger"><i class="fa fa-times"></i> ปิด</button>
                </a>
            @endif
        </div>
    </div>
    <div class="card-body">
        @if(!empty($member))

            {{-- <div class="col-md-12">
                <div class="form-group">
                @if(!empty($member->attach()->where('status',1)->where('use_is','personal_photo')->first()->path))
                    @if(!empty($member->attach()->where('status',1)->where('use_is','personal_photo')->where('type','jpg')->first()->path))
                        <img style="height:2.0in; width:1.7in" src="{{ asset($member->attach()->where('status',1)->where('use_is','personal_photo')->first()->path)}}">
                    @else
                        <embed type="application/pdf" src="{{ asset($member->attach()->where('status',1)->where('use_is','personal_photo')->first()->path) }}#zoom=FitH&view=fit&toolbar=0&navpanes=0&scrollbar=0&scrolling=0" value="FitH" style="display:block;margin:0px;padding:0px;border:none;overflow:hidden;overflow-x:hidden;overflow-y:hidden;top:0px;left:0px;right:0px;bottom:0px; height:2.0in; width:1.7in" scrolling="no" frameborder="0" class="embed-responsive-item">
                    @endif
                @endif
                </div>
            </div> --}}

            {{-- <img style="height:30px; width:30px" src="{{ url('backend/img/timesquare.png') }}">
            <img style="height:30px; width:30px" src="{{ url('backend/img/square.png') }}"> --}}

            <div>  แบบฟอร์ม สช./แบบขอขึ้นทะเบียนองค์กรภาคเอกชนและยืนยันการส่งผู้แทนองค์กรภาคชน/2562
                <br><br>
                <div style="position:absolute">
                    <img style="height:1.6in; width:1.34in" src="{{ url('backend/img/logo-pdf.jpg') }}" alt="">
                </div>
                <p class="text-center h1">
                    แบบขอขึ้นทะเบียนองค์กรภาคเอกชนและยืนยันการส่งสมาชิก<Br>
                    เป็นผู้แทนองค์กรภาคเอกชนเข้ารับการเลือกเป็นกรรมการสุขภาพแห่งชาติ<Br>พ.ศ.2562
                </p>
                <br>
                <div class="text-right">
                        @if(!empty($member->confirmed_at))
                            วันที่ {{ Carbon\Carbon::parse($member->confirmed_at)->addYears('543')->format('d') }} เดือน {{ Helper::monthThai( @ Carbon\Carbon::parse($member->confirmed_at)->addYears('543')->format('m')) }} พ.ศ.{{ Carbon\Carbon::parse($member->confirmed_at)->addYears('543')->format('Y') }}
                        @else
                            วันที่ ........ เดือน ................. ปี ............
                        @endif
                </div>
                <div>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ข้าพเจ้า <div class="box-input" style="width:600px;">{{ $member->nameTitle }} {{ $member->firstname }} {{ $member->lastname }}</div> <br>
                    <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ซึ่งเป็นผู้แจ้งรายละเอียดเพื่อขอขึ้นทะเบียนเป็นองค์กรผู้มีสิทธิเสนอชื่อผู้แทนเข้ารับการเลือกเป็นกรรมการสุขภาพแห่งชาติ โดยมีรายละเอียดดังนี้
                </div><br>
                <div class="head" style="background-color: #663300; color: #fff; line-height: 14px; vertical-align: middle;padding: 8px;">
                    ส่วนที่  1	ข้อมูลองค์กรภาคเอกชน
                </div><br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>1.  ชื่อองค์กร </strong><div class="box-input" style="width:600px;">{{ $member->detail->ngoName }}</div><br><br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>2.  สถานภาพขององค์กร</strong><br>

                <strong>
                    {{-- <span style="display:inline-block; border-radius:2px;border:1px solid #000; width: 20px; height: 20px; margin-right: 1px; margin-left: 5px;line-height: 0.5; font-size: 34px">{{ $member->detail->legalStastus == 0 ? 'x' :'' }}</span>  --}}
                    @if($member->detail->legalStastus == 0)
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="height:30px; width:30px" src="{{ url('backend/img/timesquare.png') }}"> ไม่เป็นนิติบุคคล
                    @else
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="height:30px; width:30px" src="{{ url('backend/img/square.png') }}"> ไม่เป็นนิติบุคคล
                    @endif
                    &nbsp;&nbsp;&nbsp;
                    @if($member->detail->legalStastus == 1)
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="height:30px; width:30px" src="{{ url('backend/img/timesquare.png') }}"> เป็นนิติบุคคล ประเภท
                    @else
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="height:30px; width:30px" src="{{ url('backend/img/square.png') }}"> เป็นนิติบุคคล ประเภท
                    @endif
                                    {{-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="display:inline-block; border-radius:2px;border:1px solid #000; width: 20px; height: 20px; margin-right: 1px; margin-left: 5px;line-height: 0.5; font-size: 34px">{{ $member->detail->legalStastus == 1 ? 'x' :'' }}</span> เป็นนิติบุคคล ประเภท --}}
                </strong>
                <strong>
                    @if (!empty($member->detail->ngoStatus))
                    {{-- @if($member->detail->legalStastus == 0) --}}
                        &nbsp;&nbsp;<div class="box-input" style="width:400px;">{{ $member->detail->ngoStatus }}</div>
                    @endif
                    <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>3.  ที่ตั้งองค์กร </strong><br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>เลขที่ <div class="box-input" style="width:100px;"> {{ $member->detail->ngoNo }}</div></strong>
                            <strong>หมู่ที่ <div class="box-input" style="width:80px;"> {{ $member->detail->ngoMoo }}</div></strong>
                            <strong>ตรอก/ซอย <div class="box-input" style="width:250px;"> {{ $member->detail->ngoSoi }}</div></strong>
                            <strong>ถนน <div class="box-input" style="width:250px;">{{ $member->detail->ngoStreet }}</div></strong>
                            <br>
                            @php
                                $district=DB::table('provinces')->where('district_code', $member->detail->ngoSubDistrictID)->first();
                                $amphoe=DB::table('provinces')->where('amphoe_code', $member->detail->ngoDistrictID)->first();
                                $province=DB::table('provinces')->where('province_code', $member->detail->ngoProvincetID)->first();

                            @endphp
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>ตำบล/แขวง <div class="box-input" style="width:150px;"> @if($district != NULL) {{$district->district}} @else     -      @endif </div></strong>
                            <strong>อำเภอ/เขต <div class="box-input" style="width:150px;"> @if($amphoe != NULL) {{$amphoe->amphoe}} @else     -      @endif </div></strong>
                            <strong>จังหวัด <div class="box-input" style="width:150px;"> @if($province != NULL) {{ $province->province }} @else     -       @endif</div></strong>
                            <strong>รหัสไปรษณีย์ <div class="box-input" style="width:100px;"> {{ $member->detail->ngoZipCode }}</div></strong>
                    <br><br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>4. ก่อตั้งองค์กรวันที่
                    <div class="box-input" style="width:350px;">
                        {{-- วันที่ {{ $member->created_at->addYears('543')->format('d') }} เดือน {{ Helper::monthThai($member->created_at->addYears('543')->format('m')) }} พ.ศ.{{ $member->created_at->addYears('543')->format('Y') }} --}}
                        {{-- {{ Helper::dateToThai($member->detail->ngoStartDate) }} --}}
                        {{-- {{date('d', strtotime($member->detail->ngoStartDate))}} เดือน {{date('m', strtotime($member->detail->ngoStartDate))}} ปี {{date('Y', strtotime($member->detail->ngoStartDate))}} --}}

                        {{ Helper::dateToThai(Carbon\Carbon::parse($member->detail->ngoStartDate)) }}
                    </div>

                    <strong style="padding-left:15px;">จำนวนสมาชิกในปัจจุบัน <div class="box-input" style="width:100px;"> {{ number_format($member->detail->ngoQtyMember) }}</div> คน</strong>
                </strong>
                <br><br>

                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>5. วัตถุประสงค์ขององค์กรที่สอดคล้องกับกลุ่มกิจกรรมที่ขอขึ้นทะเบียน</strong><br>
                <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div class="box-input" style="width:800px;">{{ $member->detail->ngoObjective }}</div></strong>
                <br><br>

                <div class="head" style="background-color: #663300; color: #fff; line-height: 14px; vertical-align: middle;padding: 8px;">
                    ส่วนที่ 2  ข้อมูลประกอบการขึ้นทะเบียน
                </div><br>

                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>1. องค์กรฯ ประสงค์ขอขึ้นทะเบียนในกลุ่ม (เลือกได้เพียงหนึ่งกลุ่มเท่านั้น)</strong><br>
                <ul style="padding-left: 15px;">

                            @foreach(DB::table('ngo_groups')->get() as $key => $item)
                                <li>
                                    @if($item->id == $member->ngoGroupId)
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="height:30px; width:30px" src="{{ url('backend/img/timesquare.png') }}"> {{$item->groupName}}
                                    @else
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="height:30px; width:30px" src="{{ url('backend/img/square.png') }}"> {{$item->groupName}}
                                    @endif
                                    {{-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="display:inline-block; border-radius:2px;border:1px solid #000; width: 20px; height: 20px; margin-right: 1px; margin-left: 5px;line-height: 0.5; font-size: 34px">{{$item->id == $member->ngoGroupId ? 'x' : ''}}</span> --}}

                                </li>
                            @endforeach
                    <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong style="border-bottom:1px solid #000000;">หมายเหตุ</strong> โปรดพิจารณารายละเอียดการจัดกลุ่มกิจกรรมที่เกี่ยวข้องกับสุขภาพ สำหรับองค์กรภาคเอกชนท้ายประกาศฯ</li>
                </ul>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>2. กิจกรรมการดำเนินงานที่เกี่ยวข้องกับสุขภาพในกลุ่มที่ขอขึ้นทะเบียนในพื้นที่จังหวัด 2 กิจกรรมที่สำคัญในระยะเวลาไม่เกิน 3 ปี นับถึงวันที่สมัคร (กิจกรรมในระหว่างเดือนสิงหาคม 2559 - ปัจจุบัน)  มีดังนี้</strong>
                    กิจกรรมที่สำคัญ ในระยะเวลาไม่เกิน 3 ปี มีดังนี้
                <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>กิจกรรมที่ 1</strong><br>

                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>(ชื่อกิจกรรม) <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div class="box-input" style="width:800px;">{{ $member->detail->activity1 }}</div></strong>
                <br><br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>สรุปผลงานที่สำคัญ</strong><br>
                    <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div class="box-input" style="width:800px;">{{ $member->detail->detail1 }}</div></strong>
                <br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>กิจกรรมที่ 2</strong><br>

                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>(ชื่อกิจกรรม) <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div class="box-input" style="width:800px;">{{ $member->detail->activity2 }}</div></strong>
                <br><br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>สรุปผลงานที่สำคัญ</strong><br>
                    <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div class="box-input" style="width:800px;">{{ $member->detail->detail2 }}</div></strong>
                <br><br>

                <div class="head" style="background-color: #663300; color: #fff; line-height: 14px; vertical-align: middle;padding: 8px;">
                    ส่วนที่ 3 ข้อมูลเสนอชื่อผู้แทนองค์กรภาคเอกชน
                </div><br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>ด้วยองค์กร <div class="box-input" style="width:500px;"> {{ $member->detail->byNgo }} </div> ได้เสนอ</strong><br><br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>ชื่อ <div class="box-input" style="width:650px;"> {{ $member->nameTitle }} {{ $member->firstname }} {{ $member->lastname }} </div></strong><br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>ตำแหน่งสมาชิกในองค์กร <div class="box-input" style="width:500px;"> {{ $member->detail->suggestPosition }}</div></strong><br><br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เป็นผู้แทนองค์กรเข้ารับการเลือกเป็นกรรมการสุขภาพแห่งชาติจากผู้แทนผู้แทนองค์กรภาคเอกชน ข้อมูลที่กรอกข้างต้นเป็นความจริงทุกประการ หากมีข้อมูลใดเป็นเท็จหรือ
                            ไม่ตรงกับความเป็นจริง ข้าพเจ้ายินยอมให้ถูกตัดสิทธิ์จากการเป็นผู้สมัครหรือผู้ถูกเสนอชื่อในครั้งนี้<br><br>
                <div class="head" style="background-color: #663300; color: #fff; line-height: 14px; vertical-align: middle;padding: 8px;">
                    ส่วนที่ 4 เอกสารแนบ
                </div>
                <br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ทั้งนี้ ข้าพเจ้าได้ยื่นแบบขอขึ้นทะเบียนองค์กรและยืนยันการส่งผู้แทนองค์กรภาคเอกชน พร้อมเอกสารหลักฐานประกอบการขอขึ้นทะเบียน มาพร้อมนี้
                <br>

                @if($member->detail->legalStastus == 1)

                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>สำหรับองค์กรภาคเอกชนที่เป็นนิติบุคคล</strong> ประกอบด้วย<br>

                {{-- <span style="display:inline-block; border-radius:2px;border:1px solid #000; width: 20px; height: 20px; margin-right: 1px; margin-left: 5px;line-height: 0.5; font-size: 34px">{{ $member->detail->legalStastus == 1 ? 'x' :'' }} --}}
                    <ul style="padding-left: 15px;">

                        @if(!empty($member->attach()->where('status',1)->where('use_is','company_history_copy')->first()->path))
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="height:30px; width:30px" src="{{ url('backend/img/timesquare.png') }}"> สำเนาหลักฐานที่แสดงความเป็นนิติบุคคล</li>
                            {{-- @if(!empty($member->attach()->where('status',1)->where('use_is','document_verify_has_company_copy')->where('type','jpg')->first()->path))
                                    <div class="d-flex justify-content-center">
                                        <img class="img-responsive" src="{{ asset($member->attach()->where('status',1)->where('use_is','document_verify_has_company_copy')->first()->path) }}">
                                    </div>
                                @else
                                    <div class="d-flex justify-content-center">
                                        <iframe class="embed-responsive-item" src="{{ asset($member->attach()->where('status',1)->where('use_is','document_verify_has_company_copy')->first()->path) }}" style="width:600px; height:800px;" frameborder="0"></iframe>
                                    </div>
                                @endif --}}
                            <div class="col-md-12">
                                <div class="form-group">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="{{ asset($member->attach()->where('status',1)->where('use_is','company_history_copy')->first()->path) }}" target="_blank">คลิ๊กที่นี่เพื่อเปิดเอกสาร</a>
                            </div></div>
                        @else
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="height:30px; width:30px" src="{{ url('backend/img/square.png') }}"> สำเนาหลักฐานที่แสดงความเป็นนิติบุคคล</li>
                        @endif

                        @if(!empty($member->attach()->where('status',1)->where('use_is','document_verify_copy')->first()->path))
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="height:30px; width:30px" src="{{ url('backend/img/timesquare.png') }}"> สำเนาหลักฐานที่แสดงถึงวัตถุประสงค์การก่อตั้งองค์กร</li>
                            {{-- @if(!empty($member->attach()->where('status',1)->where('use_is','company_verify_year')->where('type','jpg')->first()->path))
                                    <div class="d-flex justify-content-center">
                                        <img class="img-responsive" src="{{ asset($member->attach()->where('status',1)->where('use_is','company_verify_year')->first()->path) }}">
                                    </div>
                                @else
                                    <div class="d-flex justify-content-center">
                                        <iframe class="embed-responsive-item" src="{{ asset($member->attach()->where('status',1)->where('use_is','company_verify_year')->first()->path) }}" style="width:600px; height:800px;" frameborder="0"></iframe>
                                    </div>
                                @endif --}}
                            <div class="col-md-12">
                                <div class="form-group">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="{{ asset($member->attach()->where('status',1)->where('use_is','document_verify_copy')->first()->path) }}" target="_blank">คลิ๊กที่นี่เพื่อเปิดเอกสาร</a>
                            </div></div>
                        @else
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="height:30px; width:30px" src="{{ url('backend/img/square.png') }}"> สำเนาหลักฐานที่แสดงถึงวัตถุประสงค์การก่อตั้งองค์กร</li>
                        @endif

                        @if(!empty($member->attach()->where('status',1)->where('use_is','company_verify_year')->first()->path))
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="height:30px; width:30px" src="{{ url('backend/img/timesquare.png') }}"> สำเนาหลักฐานซึ่งแสดงถึงการดำเนินกิจกรรมในกลุ่มองค์กรที่ขอขึ้นทะเบียนในพื้นที่จังหวัดมาแล้วไม่น้อยกว่า 3 ปี นับถึงวันที่สมัคร จำนวน 2 กิจกรรมขึ้นไป เช่น โครงการ รายงานการดำเนินโครงการ รูปถ่ายกิจกรรมโดยระบุสถานที่จัดกิจกรรม เป็นต้น
                            </li>
                            {{-- @if(!empty($member->attach()->where('status',1)->where('use_is','company_history_copy')->where('type','jpg')->first()->path))
                                    <div class="d-flex justify-content-center">
                                        <img class="img-responsive" src="{{ asset($member->attach()->where('status',1)->where('use_is','company_history_copy')->first()->path) }}">
                                    </div>
                                @else
                                    <div class="d-flex justify-content-center">
                                        <iframe class="embed-responsive-item" src="{{ asset($member->attach()->where('status',1)->where('use_is','company_history_copy')->first()->path) }}" style="width:600px; height:800px;" frameborder="0"></iframe>
                                    </div>
                                @endif --}}
                            <div class="col-md-12">
                                <div class="form-group">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="{{ asset($member->attach()->where('status',1)->where('use_is','company_verify_year')->first()->path) }}" target="_blank">คลิ๊กที่นี่เพื่อเปิดเอกสาร</a>
                            </div></div>
                            @else
                                <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="height:30px; width:30px" src="{{ url('backend/img/square.png') }}"> สำเนาหลักฐานซึ่งแสดงถึงการดำเนินกิจกรรมในกลุ่มองค์กรที่ขอขึ้นทะเบียนในพื้นที่จังหวัดมาแล้วไม่น้อยกว่า 3 ปี นับถึงวันที่สมัคร จำนวน 2 กิจกรรมขึ้นไป เช่น โครงการ รายงานการดำเนินโครงการ รูปถ่ายกิจกรรมโดยระบุสถานที่จัดกิจกรรม เป็นต้น
                            </li>
                        @endif

                        @if(!empty($member->attach()->where('status',1)->where('use_is','personal_copy')->first()->path))
                        <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="height:30px; width:30px" src="{{ url('backend/img/timesquare.png') }}"> สำเนาคำสั่งแต่งตั้งประธานองค์กรหรือรายงานการประชุมที่มีชื่อประธานองค์กร
                        </li>
                        {{-- @if(!empty($member->attach()->where('status',1)->where('use_is','document_verify_copy')->where('type','jpg')->first()->path))
                                <div class="d-flex justify-content-center">
                                    <img class="img-responsive" src="{{ asset($member->attach()->where('status',1)->where('use_is','document_verify_copy')->first()->path) }}">
                                </div>
                            @else
                                <div class="d-flex justify-content-center">
                                    <iframe class="embed-responsive-item" src="{{ asset($member->attach()->where('status',1)->where('use_is','document_verify_copy')->first()->path) }}" style="width:600px; height:800px;" frameborder="0"></iframe>
                                </div>
                            @endif --}}
                            <div class="col-md-12">
                                <div class="form-group">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="{{ asset($member->attach()->where('status',1)->where('use_is','personal_copy')->first()->path) }}" target="_blank">คลิ๊กที่นี่เพื่อเปิดเอกสาร</a>
                            </div></div>
                        @else
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="height:30px; width:30px" src="{{ url('backend/img/square.png') }}"> สำเนาคำสั่งแต่งตั้งประธานองค์กรหรือรายงานการประชุมที่มีชื่อประธานองค์กร
                            </li>
                        @endif

                        @if(!empty($member->attach()->where('status',1)->where('use_is','document_verify_has_company_copy')->first()->path))
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="height:30px; width:30px" src="{{ url('backend/img/timesquare.png') }}"> สำเนาบัตรประจำตัวประชาชนของประธานองค์กร
                            </li>
                            {{-- @if(!empty($member->attach()->where('status',1)->where('use_is','personal_copy')->where('type','jpg')->first()->path))
                                    <div class="d-flex justify-content-center">
                                        <img class="img-responsive" src="{{ asset($member->attach()->where('status',1)->where('use_is','personal_copy')->first()->path) }}">
                                    </div>
                                @else
                                    <div class="d-flex justify-content-center">
                                        <iframe class="embed-responsive-item" src="{{ asset($member->attach()->where('status',1)->where('use_is','personal_copy')->first()->path) }}" style="width:600px; height:800px;" frameborder="0"></iframe>
                                    </div>
                                @endif --}}
                            <div class="col-md-12">
                                <div class="form-group">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="{{ asset($member->attach()->where('status',1)->where('use_is','document_verify_has_company_copy')->first()->path) }}" target="_blank">คลิ๊กที่นี่เพื่อเปิดเอกสาร</a>
                            </div></div>
                        @else
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="height:30px; width:30px" src="{{ url('backend/img/square.png') }}"> สำเนาบัตรประจำตัวประชาชนของประธานองค์กร
                            </li>
                        @endif

                    </ul>

                @else

                    {{-- <ul style="padding-left: 15px;">
                        <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="height:30px; width:30px" src="{{ url('backend/img/square.png') }}"> สำเนาหลักฐานที่แสดงความเป็นนิติบุคคล</li>
                        <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="height:30px; width:30px" src="{{ url('backend/img/square.png') }}"> สำเนาหลักฐานที่แสดงถึงวัตถุประสงค์การก่อตั้งองค์กร</li>
                        <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="height:30px; width:30px" src="{{ url('backend/img/square.png') }}"> สำเนาหลักฐานซึ่งแสดงถึงการดำเนินกิจกรรมในกลุ่มองค์กรที่ขอขึ้นทะเบียนในพื้นที่จังหวัดมาแล้วไม่น้อยกว่า 3 ปี นับถึงวันที่สมัคร จำนวน 2 กิจกรรมขึ้นไป เช่น โครงการ รายงานการดำเนินโครงการ รูปถ่ายกิจกรรมโดยระบุสถานที่จัดกิจกรรม เป็นต้น
                        </li>
                        <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="height:30px; width:30px" src="{{ url('backend/img/square.png') }}"> สำเนาคำสั่งแต่งตั้งประธานองค์กรหรือรายงานการประชุมที่มีชื่อประธานองค์กร
                        </li>
                        <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="height:30px; width:30px" src="{{ url('backend/img/square.png') }}"> สำเนาบัตรประจำตัวประชาชนของประธานองค์กร
                        </li>
                    </ul> --}}
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>สำหรับองค์กรภาคเอกชนที่ไม่เป็นนิติบุคคล</strong> ประกอบด้วย<br>

                    <ul style="padding-left: 15px;">
                            @if(!empty($member->attach()->where('status',1)->where('use_is','document_verify_copy')->first()->path))
                                <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="height:30px; width:30px" src="{{ url('backend/img/timesquare.png') }}"> สำเนาหลักฐานที่แสดงถึงวัตถุประสงค์การก่อตั้งองค์กร
                                </li>
                            {{-- @if(!empty($member->attach()->where('status',1)->where('use_is','document_verify_copy')->where('type','jpg')->first()->path))
                                    <div class="d-flex justify-content-center">
                                        <img class="img-responsive" src="{{ asset($member->attach()->where('status',1)->where('use_is','document_verify_copy')->first()->path) }}">
                                    </div>
                                @else
                                    <div class="d-flex justify-content-center">
                                        <iframe class="embed-responsive-item" src="{{ asset($member->attach()->where('status',1)->where('use_is','document_verify_copy')->first()->path) }}" style="width:600px; height:800px;" frameborder="0"></iframe>
                                    </div>
                                @endif --}}
                                <div class="col-md-12">
                                    <div class="form-group">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="{{ asset($member->attach()->where('status',1)->where('use_is','document_verify_copy')->first()->path) }}" target="_blank">คลิ๊กที่นี่เพื่อเปิดเอกสาร</a>
                                </div></div>
                            @else
                                <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="height:30px; width:30px" src="{{ url('backend/img/square.png') }}"> สำเนาหลักฐานที่แสดงถึงวัตถุประสงค์การก่อตั้งองค์กร
                                </li>
                            @endif

                            @if(!empty($member->attach()->where('status',1)->where('use_is','company_verify_year')->first()->path))
                                <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="height:30px; width:30px" src="{{ url('backend/img/timesquare.png') }}"> สำเนาหลักฐานซึ่งแสดงถึงการดำเนินกิจกรรมในกลุ่มองค์กรที่ขอขึ้นทะเบียนในพื่นที่จังหวัดมาแล้วไม่น้อยกว่า 3 ปี นับถึงวันที่สมัคร จำนวน 2 กิจกรรมขึ้นไป เช่น โครงการ
                                รายงานการ ดำเนินโครงการ รูปถ่ายกิจกรรม โดยระบุสถานที่จัดกิจกรรม เป็นต้น
                                </li>
                            {{-- @if(!empty($member->attach()->where('status',1)->where('use_is','company_history_copy')->where('type','jpg')->first()->path))
                                    <div class="d-flex justify-content-center">
                                        <img class="img-responsive" src="{{ asset($member->attach()->where('status',1)->where('use_is','company_history_copy')->first()->path) }}">
                                    </div>
                                @else
                                    <div class="d-flex justify-content-center">
                                        <iframe class="embed-responsive-item" src="{{ asset($member->attach()->where('status',1)->where('use_is','company_history_copy')->first()->path) }}" style="width:600px; height:800px;" frameborder="0"></iframe>
                                    </div>
                                @endif --}}
                                <div class="col-md-12">
                                    <div class="form-group">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="{{ asset($member->attach()->where('status',1)->where('use_is','company_verify_year')->first()->path) }}" target="_blank">คลิ๊กที่นี่เพื่อเปิดเอกสาร</a>
                                </div></div>
                            @else
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="height:30px; width:30px" src="{{ url('backend/img/square.png') }}"> สำเนาหลักฐานซึ่งแสดงถึงการดำเนินกิจกรรมในกลุ่มองค์กรที่ขอขึ้นทะเบียนในพื่นที่จังหวัดมาแล้วไม่น้อยกว่า 3 ปี นับถึงวันที่สมัคร จำนวน 2 กิจกรรมขึ้นไป เช่น โครงการ
                                รายงานการ ดำเนินโครงการ รูปถ่ายกิจกรรม โดยระบุสถานที่จัดกิจกรรม เป็นต้น
                                </li>
                            @endif

                            @if(!empty($member->attach()->where('status',1)->where('use_is','document_verify_copy')->first()->path))
                                {{-- @if(!empty($member->attach()->where('status',1)->where('use_is','document_verify_copy')->where('type','jpg')->first()->path))
                                    <div class="d-flex justify-content-center">
                                        <img class="img-responsive" src="{{ asset($member->attach()->where('status',1)->where('use_is','document_verify_copy')->first()->path) }}">
                                    </div>
                                @else
                                    <div class="d-flex justify-content-center">
                                        <iframe class="embed-responsive-item" src="{{ asset($member->attach()->where('status',1)->where('use_is','document_verify_copy')->first()->path) }}" style="width:600px; height:800px;" frameborder="0"></iframe>
                                    </div>
                                @endif --}}
                                <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="height:30px; width:30px" src="{{ url('backend/img/timesquare.png') }}"> สำเนาหนังสือที่แสดงว่าผู้ลงลายมือชื่อในแบบขอขึ้นทะเบียนองค์กรภาคเอกชนฯ เป็นประธานองค์กร หรือรายงานประชุมที่มีชื่อประธานองค์กร
                                </li>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="{{ asset($member->attach()->where('status',1)->where('use_is','document_verify_copy')->first()->path) }}" target="_blank">คลิ๊กที่นี่เพื่อเปิดเอกสาร</a>
                                </div></div>
                            @else
                                <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="height:30px; width:30px" src="{{ url('backend/img/square.png') }}"> สำเนาหนังสือที่แสดงว่าผู้ลงลายมือชื่อในแบบขอขึ้นทะเบียนองค์กรภาคเอกชนฯ เป็นประธานองค์กร หรือรายงานประชุมที่มีชื่อประธานองค์กร
                                </li>
                            @endif

                            @if(!empty($member->attach()->where('status',1)->where('use_is','personal_copy')->first()->path))
                                <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="height:30px; width:30px" src="{{ url('backend/img/timesquare.png') }}"> สำเนาบัตรประจำตัวประชาชนของประธานองค์กร
                                </li>
                            {{-- @if(!empty($member->attach()->where('status',1)->where('use_is','personal_copy')->where('type','jpg')->first()->path))
                                    <div class="d-flex justify-content-center">
                                        <img class="img-responsive" src="{{ asset($member->attach()->where('status',1)->where('use_is','personal_copy')->first()->path) }}">
                                    </div>
                                @else
                                    <div class="d-flex justify-content-center">
                                        <iframe class="embed-responsive-item" src="{{ asset($member->attach()->where('status',1)->where('use_is','personal_copy')->first()->path) }}" style="width:600px; height:800px;" frameborder="0"></iframe>
                                    </div>
                                @endif --}}
                                <div class="col-md-12">
                                    <div class="form-group">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="{{ asset($member->attach()->where('status',1)->where('use_is','personal_copy')->first()->path) }}" target="_blank">คลิ๊กที่นี่เพื่อเปิดเอกสาร</a>
                                </div></div>
                            @else
                                <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="height:30px; width:30px" src="{{ url('backend/img/square.png') }}"> สำเนาบัตรประจำตัวประชาชนของประธานองค์กร
                                </li>
                            @endif

                            @if(!empty($member->attach()->where('status',1)->where('use_is','document_verify_has_company_copy')->first()->path))
                                <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="height:30px; width:30px" src="{{ url('backend/img/timesquare.png') }}"> หนังสือรับรองความมีอยู่และการดำเนินกิจกรรมขององค์กรภาคเอกชนที่ไม่เป็นนิติบุคคล
                                </li>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="{{ asset($member->attach()->where('status',1)->where('use_is','document_verify_has_company_copy')->first()->path) }}" target="_blank">คลิ๊กที่นี่เพื่อเปิดเอกสาร</a>
                                    </div>
                                </div>
                            @else
                                <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="height:30px; width:30px" src="{{ url('backend/img/square.png') }}"> หนังสือรับรองความมีอยู่และการดำเนินกิจกรรมขององค์กรภาคเอกชนที่ไม่เป็นนิติบุคคล
                                </li>
                            @endif
                            {{-- @if(!empty($member->attach()->where('status',1)->where('use_is','document_verify_has_company_copy')->where('type','jpg')->first()->path))
                                    <div class="d-flex justify-content-center">
                                        <img class="img-responsive" src="{{ asset($member->attach()->where('status',1)->where('use_is','document_verify_has_company_copy')->first()->path) }}">
                                    </div>
                                @else
                                    <div class="d-flex justify-content-center">
                                        <iframe class="embed-responsive-item" src="{{ asset($member->attach()->where('status',1)->where('use_is','document_verify_has_company_copy')->first()->path) }}" style="width:600px; height:800px;" frameborder="0"></iframe>
                                    </div>
                                @endif --}}
                        </ul>

                @endif

                {{-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>สำหรับองค์กรภาคเอกชนที่ไม่เป็นนิติบุคคล</strong> ประกอบด้วย<br>
                @if($member->detail->legalStastus == 1)
                    <ul style="padding-left: 15px;">
                        <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="height:30px; width:30px" src="{{ url('backend/img/square.png') }}"> สำเนาหลักฐานที่แสดงถึงวัตถุประสงค์การก่อตั้งองค์กร
                        </li>
                        <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="height:30px; width:30px" src="{{ url('backend/img/square.png') }}"> สำเนาหลักฐานซึ่งแสดงถึงการดำเนินกิจกรรมในกลุ่มองค์กรที่ขอขึ้นทะเบียนในพื่นที่จังหวัดมาแล้วไม่น้อยกว่า 3 ปี นับถึงวันที่สมัคร จำนวน 2 กิจกรรมขึ้นไป เช่น โครงการ
                        รายงานการ ดำเนินโครงการ รูปถ่ายกิจกรรม โดยระบุสถานที่จัดกิจกรรม เป็นต้น
                        </li>
                        <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="height:30px; width:30px" src="{{ url('backend/img/square.png') }}"> สำเนาหนังสือที่แสดงว่าผู้ลงลายมือชื่อในแบบขอขึ้นทะเบียนองค์กรภาคเอกชนฯ เป็นประธานองค์กร หรือรายงานประชุมที่มีชื่อประธานองค์กร
                        </li>
                        <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="height:30px; width:30px" src="{{ url('backend/img/square.png') }}"> สำเนาบัตรประจำตัวประชาชนของประธานองค์กร
                        </li>
                        <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="height:30px; width:30px" src="{{ url('backend/img/square.png') }}"> หนังสือรับรองความมีอยู่และการดำเนินกิจกรรมขององค์กรภาคเอกชนที่ไม่เป็นนิติบุคคล
                        </li>
                    </ul>
                @else
                    <ul style="padding-left: 15px;">
                        @if(!empty($member->attach()->where('status',1)->where('use_is','document_verify_copy')->first()->path))
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="height:30px; width:30px" src="{{ url('backend/img/timesquare.png') }}"> สำเนาหลักฐานที่แสดงถึงวัตถุประสงค์การก่อตั้งองค์กร
                            </li> --}}
                        {{-- @if(!empty($member->attach()->where('status',1)->where('use_is','document_verify_copy')->where('type','jpg')->first()->path))
                                <div class="d-flex justify-content-center">
                                    <img class="img-responsive" src="{{ asset($member->attach()->where('status',1)->where('use_is','document_verify_copy')->first()->path) }}">
                                </div>
                            @else
                                <div class="d-flex justify-content-center">
                                    <iframe class="embed-responsive-item" src="{{ asset($member->attach()->where('status',1)->where('use_is','document_verify_copy')->first()->path) }}" style="width:600px; height:800px;" frameborder="0"></iframe>
                                </div>
                            @endif --}}
                            {{-- <div class="col-md-12">
                                <div class="form-group">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="{{ asset($member->attach()->where('status',1)->where('use_is','document_verify_copy')->first()->path) }}" target="_blank">คลิ๊กที่นี่เพื่อเปิดเอกสาร</a>
                            </div></div>
                        @else
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="height:30px; width:30px" src="{{ url('backend/img/square.png') }}"> สำเนาหลักฐานที่แสดงถึงวัตถุประสงค์การก่อตั้งองค์กร
                            </li>
                        @endif



                        @if(!empty($member->attach()->where('status',1)->where('use_is','company_history_copy')->first()->path))
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="height:30px; width:30px" src="{{ url('backend/img/timesquare.png') }}"> สำเนาหลักฐานซึ่งแสดงถึงการดำเนินกิจกรรมในกลุ่มองค์กรที่ขอขึ้นทะเบียนในพื่นที่จังหวัดมาแล้วไม่น้อยกว่า 3 ปี นับถึงวันที่สมัคร จำนวน 2 กิจกรรมขึ้นไป เช่น โครงการ
                            รายงานการ ดำเนินโครงการ รูปถ่ายกิจกรรม โดยระบุสถานที่จัดกิจกรรม เป็นต้น
                            </li> --}}
                        {{-- @if(!empty($member->attach()->where('status',1)->where('use_is','company_history_copy')->where('type','jpg')->first()->path))
                                <div class="d-flex justify-content-center">
                                    <img class="img-responsive" src="{{ asset($member->attach()->where('status',1)->where('use_is','company_history_copy')->first()->path) }}">
                                </div>
                            @else
                                <div class="d-flex justify-content-center">
                                    <iframe class="embed-responsive-item" src="{{ asset($member->attach()->where('status',1)->where('use_is','company_history_copy')->first()->path) }}" style="width:600px; height:800px;" frameborder="0"></iframe>
                                </div>
                            @endif --}}

                            {{-- <div class="col-md-12">
                                <div class="form-group">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="{{ asset($member->attach()->where('status',1)->where('use_is','company_history_copy')->first()->path) }}" target="_blank">คลิ๊กที่นี่เพื่อเปิดเอกสาร</a>
                            </div></div>
                        @else
                        <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="height:30px; width:30px" src="{{ url('backend/img/square.png') }}"> สำเนาหลักฐานซึ่งแสดงถึงการดำเนินกิจกรรมในกลุ่มองค์กรที่ขอขึ้นทะเบียนในพื่นที่จังหวัดมาแล้วไม่น้อยกว่า 3 ปี นับถึงวันที่สมัคร จำนวน 2 กิจกรรมขึ้นไป เช่น โครงการ
                            รายงานการ ดำเนินโครงการ รูปถ่ายกิจกรรม โดยระบุสถานที่จัดกิจกรรม เป็นต้น
                            </li>
                        @endif

                        @if(!empty($member->attach()->where('status',1)->where('use_is','document_verify_copy')->first()->path)) --}}
                            {{-- @if(!empty($member->attach()->where('status',1)->where('use_is','document_verify_copy')->where('type','jpg')->first()->path))
                                <div class="d-flex justify-content-center">
                                    <img class="img-responsive" src="{{ asset($member->attach()->where('status',1)->where('use_is','document_verify_copy')->first()->path) }}">
                                </div>
                            @else
                                <div class="d-flex justify-content-center">
                                    <iframe class="embed-responsive-item" src="{{ asset($member->attach()->where('status',1)->where('use_is','document_verify_copy')->first()->path) }}" style="width:600px; height:800px;" frameborder="0"></iframe>
                                </div>
                            @endif --}}
                            {{-- <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="height:30px; width:30px" src="{{ url('backend/img/timesquare.png') }}"> สำเนาหนังสือที่แสดงว่าผู้ลงลายมือชื่อในแบบขอขึ้นทะเบียนองค์กรภาคเอกชนฯ เป็นประธานองค์กร หรือรายงานประชุมที่มีชื่อประธานองค์กร
                            </li>
                            <div class="col-md-12">
                                <div class="form-group">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="{{ asset($member->attach()->where('status',1)->where('use_is','document_verify_copy')->first()->path) }}" target="_blank">คลิ๊กที่นี่เพื่อเปิดเอกสาร</a>
                            </div></div>
                        @else
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="height:30px; width:30px" src="{{ url('backend/img/square.png') }}"> สำเนาหนังสือที่แสดงว่าผู้ลงลายมือชื่อในแบบขอขึ้นทะเบียนองค์กรภาคเอกชนฯ เป็นประธานองค์กร หรือรายงานประชุมที่มีชื่อประธานองค์กร
                            </li>
                        @endif

                        @if(!empty($member->attach()->where('status',1)->where('use_is','personal_copy')->first()->path))
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="height:30px; width:30px" src="{{ url('backend/img/timesquare.png') }}"> สำเนาบัตรประจำตัวประชาชนของประธานองค์กร
                            </li> --}}
                        {{-- @if(!empty($member->attach()->where('status',1)->where('use_is','personal_copy')->where('type','jpg')->first()->path))
                                <div class="d-flex justify-content-center">
                                    <img class="img-responsive" src="{{ asset($member->attach()->where('status',1)->where('use_is','personal_copy')->first()->path) }}">
                                </div>
                            @else
                                <div class="d-flex justify-content-center">
                                    <iframe class="embed-responsive-item" src="{{ asset($member->attach()->where('status',1)->where('use_is','personal_copy')->first()->path) }}" style="width:600px; height:800px;" frameborder="0"></iframe>
                                </div>
                            @endif --}}
                            {{-- <div class="col-md-12">
                                <div class="form-group">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="{{ asset($member->attach()->where('status',1)->where('use_is','personal_copy')->first()->path) }}" target="_blank">คลิ๊กที่นี่เพื่อเปิดเอกสาร</a>
                            </div></div>
                        @else
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="height:30px; width:30px" src="{{ url('backend/img/square.png') }}"> สำเนาบัตรประจำตัวประชาชนของประธานองค์กร
                            </li>
                        @endif

                        @if(!empty($member->attach()->where('status',1)->where('use_is','document_verify_has_company_copy')->first()->path))
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="height:30px; width:30px" src="{{ url('backend/img/timesquare.png') }}"> หนังสือรับรองความมีอยู่และการดำเนินกิจกรรมขององค์กรภาคเอกชนที่ไม่เป็นนิติบุคคล
                            </li>
                            <div class="col-md-12">
                                <div class="form-group">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="{{ asset($member->attach()->where('status',1)->where('use_is','document_verify_has_company_copy')->first()->path) }}" target="_blank">คลิ๊กที่นี่เพื่อเปิดเอกสาร</a>
                                </div>
                            </div>
                        @else
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="height:30px; width:30px" src="{{ url('backend/img/square.png') }}"> หนังสือรับรองความมีอยู่และการดำเนินกิจกรรมขององค์กรภาคเอกชนที่ไม่เป็นนิติบุคคล
                            </li>
                        @endif --}}
                        {{-- @if(!empty($member->attach()->where('status',1)->where('use_is','document_verify_has_company_copy')->where('type','jpg')->first()->path))
                                <div class="d-flex justify-content-center">
                                    <img class="img-responsive" src="{{ asset($member->attach()->where('status',1)->where('use_is','document_verify_has_company_copy')->first()->path) }}">
                                </div>
                            @else
                                <div class="d-flex justify-content-center">
                                    <iframe class="embed-responsive-item" src="{{ asset($member->attach()->where('status',1)->where('use_is','document_verify_has_company_copy')->first()->path) }}" style="width:600px; height:800px;" frameborder="0"></iframe>
                                </div>
                            @endif --}}



                    {{-- </ul>
                @endif --}}
            {{-- </div> --}}
            <br><hr>

            แบบฟอร์ม สช./ใบสมัครผู้แทนองค์กรภาคเอกชน/2562
            <div class="col-md-12">
                <div class="form-group">
            {{-- {{ $member->attach()->where('status',1)->where('use_is','personal_photo')->first()->path }} --}}
            @if(file_exists($member->attach()->where('status',1)->where('use_is','personal_photo')->first()->path))
                @if(!empty($member->attach()->where('status',1)->where('use_is','personal_photo')->first()->path))
                    @if(!empty($member->attach()->where('status',1)->where('use_is','personal_photo')->where('type','jpg')->first()->path))
                        <img class="photoimg" style="height:2.0in; width:1.7in" src="{{ asset($member->attach()->where('status',1)->where('use_is','personal_photo')->first()->path)}}">
                    @elseif(!empty($member->attach()->where('status',1)->where('use_is','personal_photo')->where('type','jpeg')->first()->path))
                        <img class="photoimg" style="height:2.0in; width:1.7in" src="{{ asset($member->attach()->where('status',1)->where('use_is','personal_photo')->first()->path)}}">
                    @else
                        <embed type="application/pdf" src="{{ asset($member->attach()->where('status',1)->where('use_is','personal_photo')->first()->path) }}#zoom=FitH&view=fit&toolbar=0&navpanes=0&scrollbar=0&scrolling=0" value="FitH" style="display:block;margin:0px;padding:0px;border:none;overflow:hidden;overflow-x:hidden;overflow-y:hidden;top:0px;left:0px;right:0px;bottom:0px; height:2.0in; width:1.7in" scrolling="no" frameborder="0" class="embed-responsive-item">
                    @endif
                @endif
            @else

            @endif
                </div>
            </div>
            <br><br>

            <div style="position:absolute">
                <img style="height:1.6in; width:1.34in" src="{{ url('backend/img/logo-pdf.jpg') }}" alt="">
            </div>



            <p class="text-center h1">
                ใบสมัครผู้แทนองค์กรภาคเอกชน <br>
                เข้ารับการเลือกเป็นกรรมการสุขภาพแห่งชาติ <br>
                พ.ศ. 2562
            </p><br>
            <div class="text-right">
                @if(!empty($member->confirmed_at))
                    วันที่ {{ Carbon\Carbon::parse($member->confirmed_at)->format('d') }} เดือน {{ Helper::monthThai( @ Carbon\Carbon::parse($member->confirmed_at)->addYears('543')->format('m')) }} พ.ศ.{{ Carbon\Carbon::parse($member->confirmed_at)->addYears(543)->format('Y') }}
                @else
                    วันที่ ........ เดือน ................. ปี ............
                @endif
            </div>

            <br>
            <div>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ข้าพเจ้า <div class="box-input" style="width:600px;">{{ $member->nameTitle }} {{ $member->firstname }}  {{ $member->lastname }}</div> <br>
                <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;มีความประสงค์จะสมัครเข้ารับการเลือกเป็นกรรมการสุขภาพแห่งชาติ  จึงขอส่งใบสมัครของข้าพเจ้ามายังประธานคณะกรรมการสรรหา
            </div><br>
            <div class="head" style="background-color: #663300;">
                ส่วนที่  1	คุณสมบัติ
            </div>
            <p>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ข้าพเจ้าเป็นผู้มีคุณสมบัติของผู้แทนองค์กรภาคเอกชนที่จะเข้ารับการเลือกเป็นกรรมการสุขภาพแห่งชาติครบถ้วน  ดังนี้ <br>
                <ul>
                    <li>
                        1.  คุณสมบัติทั่วไป
                        <ul>
                            <li>1) <img style="height:30px; width:30px" src="{{ url('backend/img/timesquare.png') }}"> มีสัญชาติไทย</li>
                            <li>2) <img style="height:30px; width:30px" src="{{ url('backend/img/timesquare.png') }}"> มีอายุไม่ต่ำกว่ายี่สิบปีบริบูรณ์ ณ วันที่สมัคร</li>
                            <li>3) <img style="height:30px; width:30px" src="{{ url('backend/img/timesquare.png') }}"> ไม่เป็นคนไร้ความสามารถหรือคนเสมือนไร้ความสามารถ</li>
                            <li>4) <img style="height:30px; width:30px" src="{{ url('backend/img/timesquare.png') }}"> ไม่ติดยาเสพติดให้โทษ</li>
                            <li>5) <img style="height:30px; width:30px" src="{{ url('backend/img/timesquare.png') }}"> ไม่เคยถูกลงโทษไล่ออก ปลดออก เลิกจ้าง หรือพ้นจากตำแหน่ง เพราะเหตุจากการทุจริตหรือประพฤติมิชอบ</li>
                            <li>6) <img style="height:30px; width:30px" src="{{ url('backend/img/timesquare.png') }}"> ไม่เคยได้รับโทษจำคุกโดยคำพิพากษาถึงที่สุดให้จำคุก ไม่ว่าจะถูกจำคุกจริงหรือไม่ก็ตาม เว้นแต่เป็นโทษ
                                สำหรับความผิดที่ได้กระทำโดยประมาทหรือความผิดลหุโทษ</li>
                            </ul>
                        </li>

                        <li>
                            2.  คุณสมบัติเฉพาะ
                            <ul>
                                <li>1) <img style="height:30px; width:30px" src="{{ url('backend/img/timesquare.png') }}"> ไม่เป็นผู้ประกอบวิชาชีพด้านสาธารณสุขตามนิยามในพระราชบัญญัติสุขภาพแห่งชาติ พ.ศ. 2550</li>
                                <li>2) <img style="height:30px; width:30px" src="{{ url('backend/img/timesquare.png') }}"> มีประสบการณ์การทำงานไม่น้อยกว่า 10 ปี</li>
                                <li>3) <img style="height:30px; width:30px" src="{{ url('backend/img/timesquare.png') }}"> มีผลงานเป็นที่ประจักษ์ที่สอดคล้องกับประเภทกลุ่มผู้แทนองค์กรภาคเอกชนที่เลือกสมัคร</li>
                            </ul>
                        </li>
                    </li>
                </ul>
            </p>
            <div class="head" style="background-color: #663300;">
                ส่วนที่  2	การแสดงเจตนาสมัครเข้ากลุ่ม
            </div>
            <p>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ข้าพเจ้ามีความประสงค์ที่จะสมัครเป็นกรรมการสุขภาพแห่งชาติจากผู้แทนองค์กรภาคเอกชนในกลุ่ม <br>
                <ul>
                    @foreach(DB::table('ngo_groups')->get() as $key => $group)
                    @if($member->ngoGroupId == $group->id)
                        <li><img style="height:30px; width:30px" src="{{ url('backend/img/timesquare.png') }}"> {{ $group->groupName }}</li>
                    @else
                        <li><img style="height:30px; width:30px" src="{{ url('backend/img/square.png') }}">  {{ $group->groupName }}</li>
                    @endif
                    @endforeach
                </ul>

                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;หมายเหตุ   ผู้สมัครผู้แทนองค์กรภาคเอกชนสามารถสมัครได้กลุ่มใดกลุ่มหนึ่งใน 5 กลุ่มนี้ เท่านั้น
            </p>

            <div class="head" style="background-color: #663300;">
                ส่วนที่  3	ข้อมูลยืนยันตัวตนของผู้สมัคร เพื่อเข้าสู่ระบบการสรรหากรรมการสุขภาพแห่งชาติแบบอิเล็กทรอนิกส์
            </div>
            <p>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.  เลขบัตรประชาชน 13 หลัก
                <div class="" style="padding:0px 15pt;height:20pt;">
                    &nbsp;
                    @php
                        $idCardArray = $member->personalId;
                    @endphp
                    @for($i = 0 ; $i < strlen($idCardArray) ; $i ++)
                        <div style="display:inline-block;padding:0px 15px;border:1px solid #000">{{$idCardArray[$i]}}</div>
                    @endfor

                </div>
            </p><br>
            <p>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2. อีเมล (Email)
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div class="border-dot" style="border-bottom:1px dotted #ccc;padding-bottom:8px; padding-top:0px">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $member->email }}
                </div>
            </p>
            <p>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;รหัสผ่าน (Password)
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div class="" style="padding:0px 15pt;height:20pt;">
                    &nbsp;
                    <div style="display:inline-block;padding:0px 15px; border:1px solid #000">*</div>
                    <div style="display:inline-block;padding:0px 15px; border:1px solid #000">*</div>
                    <div style="display:inline-block;padding:0px 15px; border:1px solid #000">*</div>
                    <div style="display:inline-block;padding:0px 15px; border:1px solid #000">*</div>
                    <div style="display:inline-block;padding:0px 15px; border:1px solid #000">*</div>
                    <div style="display:inline-block;padding:0px 15px; border:1px solid #000">*</div>
                    <div style="display:inline-block;padding:0px 15px; border:1px solid #000">*</div>
                    <div style="display:inline-block;padding:0px 15px; border:1px solid #000">*</div>
                </div>
            </p>
            <p>
                <ul>
                    <li><span style="font-weight:bold">หมายเหตุ</span>
                        <ul>
                            <li>1. กรุณากำหนดรหัสผ่าน (Password) ของท่านเพื่อยืนยันตัวตนเข้าสู่ระบบสมัคร </li>
                            <li>2. กำหนดรหัสผ่าน (Password) เป็นตัวอักษรภาษาอังกฤษ และมีตัวเลขด้วย รวมกันจำนวน 8 ตัวอักษร</li>
                        </ul>
                    </li>
                </ul>
            </p>

            <div class="head" style="background-color: #663300;">
                ส่วนที่  4	ข้อมูลประวัติ
            </div>
            <p>
                <ul>
                    <li>
                        1.  ข้อมูลทั่วไป
                        <ul>
                            <li>
                                1) คำนำหน้าชื่อ <div class="box-input" style="width:100px;">{{ $member->nameTitle }}</div>
                                &nbsp;ชื่อ<div class="box-input" style="width:250px;">{{ $member->firstname }}</div>
                                &nbsp;นามสกุล<div class="box-input" style="width:350px;">{{ $member->lastname }}</div>
                            </li>
                            <li>2) เกิดวันที่<div class="box-input" style="width:100px;">{{ @ Carbon\Carbon::parse($member->detail->dateOfBirth)->format('d') }}</div>
                                &nbsp;เดือน<div class="box-input" style="width:300px;">{{ Helper::monthThai( Carbon\Carbon::parse($member->detail->dateOfBirth)->format('m')) }}</div>
                                &nbsp;พ.ศ<div class="box-input" style="width:200px;">{{ @ Carbon\Carbon::parse($member->detail->dateOfBirth)->addYears('543')->format('Y') }}</div>
                                &nbsp;อายุ<div class="box-input" style="width:100px;">
                                        @php
                                            $yearold = @ Carbon\Carbon::parse($member->detail->dateOfBirth)->format('Y');
                                            $now = now()->format('Y');
                                            echo ($now - $yearold);
                                        @endphp
                                </div>ปี
                            </li>
                            <li>3) เพศ
                                @if ($member->detail->genderId == 1)
                                    <img style="height:30px; width:30px" src="{{ url('backend/img/timesquare.png') }}"> &nbsp;ชาย <img style="height:30px; width:30px" src="{{ url('backend/img/square.png') }}"> &nbsp;หญิง <img style="height:30px; width:30px" src="{{ url('backend/img/square.png') }}"> &nbsp;นักบวช/สมณะเพศ
                                @elseif ($member->detail->genderId == 2)
                                    <img style="height:30px; width:30px" src="{{ url('backend/img/square.png') }}"> &nbsp;ชาย <img style="height:30px; width:30px" src="{{ url('backend/img/timesquare.png') }}"> &nbsp;หญิง <img style="height:30px; width:30px" src="{{ url('backend/img/square.png') }}"> &nbsp;นักบวช/สมณะเพศ
                                @elseif ($member->detail->genderId == 3)
                                    <img style="height:30px; width:30px" src="{{ url('backend/img/square.png') }}"> &nbsp;ชาย <img style="height:30px; width:30px" src="{{ url('backend/img/square.png') }}"> &nbsp;หญิง <img style="height:30px; width:30px" src="{{ url('backend/img/timesquare.png') }}"> &nbsp;นักบวช/สมณะเพศ
                                @else
                                    <img style="height:30px; width:30px" src="{{ url('backend/img/square.png') }}"> &nbsp;ชาย <img style="height:30px; width:30px" src="{{ url('backend/img/square.png') }}"> &nbsp;หญิง <img style="height:30px; width:30px" src="{{ url('backend/img/square.png') }}"> &nbsp;นักบวช/สมณะเพศ
                               @endif
                            </li>
                            <li>4)	สถานที่ที่สามารถติดต่อได้สะดวก <br>
                                @if ($member->detail->addressType == 1)
                                    <img style="height:30px; width:30px" src="{{ url('backend/img/timesquare.png') }}"> &nbsp;บ้าน <img style="height:30px; width:30px" src="{{ url('backend/img/square.png') }}"> &nbsp;ที่ทำงาน
                                @elseif ($member->detail->addressType == 2)
                                    <img style="height:30px; width:30px" src="{{ url('backend/img/square.png') }}"> &nbsp;บ้าน <img style="height:30px; width:30px" src="{{ url('backend/img/timesquare.png') }}"> &nbsp;ที่ทำงาน
                                @else
                                    <img style="height:30px; width:30px" src="{{ url('backend/img/square.png') }}"> &nbsp;บ้าน <img style="height:30px; width:30px" src="{{ url('backend/img/square.png') }}"> &nbsp;ที่ทำงาน
                                @endif

                                @if ($member->detail->addressType == 2)
                                    <div class="box-input" style="width:490px;">{{ $member->detail->workPlaceName }}</div>
                                    <br>
                                @endif
                                &nbsp;เลขที่<div class="box-input" style="width:100px;">{{ @ $member->detail->no }}</div>
                                &nbsp;หมู่ที่<div class="box-input" style="width:250px;">{{ @ $member->detail->moo }}</div>
                                &nbsp;ตรอก/ซอย<div class="box-input" style="width:300px;">{{ @ $member->detail->soi }}</div>
                                <br>
                                &nbsp;ถนน<div class="box-input" style="width:325px;">{{ @ $member->detail->street }}</div>
                                &nbsp;ตำบล/แขวง<div class="box-input" style="width:350px;">{{ @ $member->province->district }}</div>
                                <br>
                                &nbsp;อำเภอ/เขต<div class="box-input" style="width:250px;">{{ @$member->province->amphoe }}</div>
                                &nbsp;จังหวัด<div class="box-input" style="width:250px;">{{ @ $member->province->province }}</div>
                                &nbsp;รหัสไปรษณีย์<div class="box-input" style="width:100px;">{{ @ $member->detail->zipCode }}</div>

                                <br>
                                &nbsp; เบอร์โทรศัพท์ 1 <div class="box-input" style="width:300px;">{{ @ $member->detail->tel }}</div>
                                &nbsp; เบอร์โทรศัพท์ 2 <div class="box-input" style="width:300px;">{{ @ $member->detail->mobile }}</div>
                            </li>
                        </ul>
                    </li>

                    <li>
                    2.  ประวัติการศึกษา
                    @php $optionsArray = ["ปริญญาเอก", "ปริญญาโท", "ปริญญาตรี", "ต่ำกว่าปริญญาตรี", 'อื่นๆ']; @endphp
                    <div style="margin-bottom:15px;margin-top:15px;" class="table-responsive">
                        <table border="1"  style="width:100%;" class="table-border">
                            <thead>

                                <tr style="background-color: #663300;">
                                    <th width="8%" style="text-align:center;color:#fff;">ลำดับ</th>
                                    <th width="20%" style="text-align:center;color:#fff;">วุฒิการศึกษา</th>
                                    <th width="27%" style="text-align:center;color:#fff;">สาขา</th>
                                    <th width="35%" style="text-align:center;color:#fff;">สถาบัน</th>
                                    <th width="15%" style="text-align:center;color:#fff;">ปีที่จบ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td width="8%" class="text-center"><span>1</span></td>
                                    <td width="20%"><span>&nbsp;{{ @ $optionsArray[$member->detail->graduated1]}}</span></td>
                                    <td width="27%"><span>&nbsp;{{ @ $member->detail->faculty1 }}</span></td>
                                    <td width="35%"><span>&nbsp;{{ @ $member->detail->institution1 }}</span></td>
                                    <td width="15%" class="text-center"><span>&nbsp;{{ @ $member->detail->yearend1 }}</span></td>
                                </tr>
                                <tr>
                                    <td width="8%" class="text-center"><span>2</span></td>
                                    <td width="20%"><span>&nbsp;{{ @ $optionsArray[$member->detail->graduated2]}}</span></td>
                                    <td width="27%"><span>&nbsp;{{ @ $member->detail->faculty2 }}</span></td>
                                    <td width="35%"><span>&nbsp;{{ @ $member->detail->institution2 }}</span></td>
                                    <td width="15%" class="text-center"><span>&nbsp;{{ @ $member->detail->yearend2 }}</span></td>
                                </tr>
                                <tr>
                                    <td width="8%" class="text-center"><span>3</span></td>
                                    <td width="20%"><span>&nbsp;{{ @ $optionsArray[$member->detail->graduated3]}}</span></td>
                                    <td width="27%"><span>&nbsp;{{ @ $member->detail->faculty3 }}</span></td>
                                    <td width="35%"><span>&nbsp;{{ @ $member->detail->institution3 }}</span></td>
                                    <td width="15%" class="text-center"><span>&nbsp;{{ @ $member->detail->yearend3 }}</span></td>
                                </tr>
                                <tr>
                                    <td width="8%" class="text-center"><span>4</span></td>
                                    <td width="20%"><span>&nbsp;{{ @ $optionsArray[$member->detail->graduated4]}}</span></td>
                                    <td width="27%"><span>&nbsp;{{ @ $member->detail->faculty4 }}</span></td>
                                    <td width="35%"><span>&nbsp;{{ @ $member->detail->institution4 }}</span></td>
                                    <td width="15%" class="text-center"><span>{{ @ $member->detail->yearend4 }}</span></td>
                                </tr>
                                <tr>
                                    <td width="8%" class="text-center"><span>5</span></td>
                                    <td width="20%"><span>&nbsp;{{ @ $optionsArray[$member->detail->graduated5]}}</span></td>
                                    <td width="27%"><span>&nbsp;{{ @ $member->detail->faculty5 }}</span></td>
                                    <td width="35%"><span>&nbsp;{{ @ $member->detail->institution5 }}</span></td>
                                    <td width="15%" class="text-center"><span>&nbsp;{{ @ $member->detail->yearend5 }}</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </ul>

                    <ul>3.  ประวัติการทำงาน
                            <li>
                                1)  หน้าที่การงานและความรับผิดชอบในปัจจุบัน
                                <ol>
                                        <li>ปัจจุบันปฏิบัติหน้าที่ <br>
                                            <div class="box-input" style="width:800px;">&nbsp;{{ $member->detail->nowWork }}</div>
                                        </li>
                                        <li>สถานที่ปฏิบัติงาน <br>
                                            <div class="box-input" style="width:800px;">&nbsp;{{ $member->detail->nowWorkPlace }}</div>
                                        </li>
                                        <li>งานในความรับผิดชอบ <br>
                                            <div class="box-input" style="width:800px;">&nbsp;{{ $member->detail->nowRole }}</div>
                                        </li>
                                </ol>
                            </li>
                    </ul>
                    <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2)  การปฏิบัติหน้าที่ในอดีต  (โปรดระบุเฉพาะหน้าที่ที่สำคัญ)
                    <div class="table-responsive">
                        <table style="width:100%;" class="table-border">
                            <thead>
                                <tr style="background-color: #663300;">
                                    <th style="text-align:center;color:#fff;">ลำดับ</th>
                                    <th style="text-align:center;color:#fff;">ปฏิบัติหน้าที่</th>
                                    <th style="text-align:center;color:#fff;">องค์กร</th>
                                    <th style="text-align:center;color:#fff;">จากปี</th>
                                    <th style="text-align:center;color:#fff;">ถึงปี</th>
                                    <th style="text-align:center;color:#fff;">ระยะเวลา การปฏิบัติหน้าที่</th>
                                </tr>
                            </thead>
                            <tr>
                                <td class="text-center">1</td>
                                <td>&nbsp;{{ @ $member->detail->pastWork1 }}</td>
                                <td>&nbsp;{{ @ $member->detail->pastOrganization1 }}</td>
                                <td class="text-center">&nbsp;{{ @ $member->detail->fromyear1 }}</td>
                                <td class="text-center">&nbsp;{{ @ $member->detail->toyear1 }}</td>
                                <td class="text-center">&nbsp;{{ @ str_replace("ปี","",$member->detail->time1) }} ปี</td>
                            </tr>
                            <tr>
                                <td class="text-center">2</td>
                                <td>&nbsp;{{ @ $member->detail->pastWork2 }}</td>
                                <td>&nbsp;{{ @ $member->detail->pastOrganization2 }}</td>
                                <td class="text-center">&nbsp;{{ @ $member->detail->fromyear2 }}</td>
                                <td class="text-center">&nbsp;{{ @ $member->detail->toyear2 }}</td>
                                <td class="text-center">&nbsp;
                                    @if ($member->detail->time2!=null)
                                        {{ @ str_replace("ปี","",$member->detail->time2) }} ปี
                                    @else
                                        {{ @ $member->detail->time2 }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">3</td>
                                <td>&nbsp;{{ @ $member->detail->pastWork3 }}</td>
                                <td>&nbsp;{{ @ $member->detail->pastOrganization3 }}</td>
                                <td class="text-center">&nbsp;{{ @ $member->detail->fromyear3 }}</td>
                                <td class="text-center">&nbsp;{{ @ $member->detail->toyear3 }}</td>
                                <td class="text-center">&nbsp;
                                    @if ($member->detail->time3!=null)
                                        {{ @ str_replace("ปี","",$member->detail->time3) }} ปี
                                    @else
                                        {{ @ $member->detail->time3 }}
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                    {{-- <table style="width:100%" border="1">
                            <tr>
                                <th style="width :50px">ลำดับ</th>
                                <th>ปฏิบัติหน้าที่</th>
                                <th>องค์กร</th>
                                <th>จากปีที่</th>
                                <th>ถึง</th>
                                <th style="width :150px">ระยะเวลา
                                        การปฏิบัติหน้าที่
                                </th>
                            </tr>
                            <tr>
                                <td class="text-center">1</td>
                                <td>&nbsp;{{ $member->detail->pastWork1 }}</td>
                                <td>&nbsp;{{ $member->detail->pastOrganization1 }}</td>
                                <td>&nbsp;{{ $member->detail->fromyear1 }}</td>
                                <td>&nbsp;{{ $member->detail->toyear1 }}</td>
                                <td>&nbsp;{{ $member->detail->time1 }} ปี</td>
                            </tr>
                            <tr>
                                <td class="text-center">2</td>
                                <td>&nbsp;{{ $member->detail->pastWork2 }}</td>
                                <td>&nbsp;{{ $member->detail->pastOrganization2 }}</td>
                                <td>&nbsp;{{ $member->detail->fromyear2 }}</td>
                                <td>&nbsp;{{ $member->detail->toyear2 }}</td>
                                <td>&nbsp;{{ $member->detail->time2 }} ปี</td>
                            </tr>
                            <tr>
                                <td class="text-center">3</td>
                                <td>&nbsp;{{ $member->detail->pastWork3 }}</td>
                                <td>&nbsp;{{ $member->detail->pastOrganization3 }}</td>
                                <td>&nbsp;{{ $member->detail->fromyear3 }}</td>
                                <td>&nbsp;{{ $member->detail->toyear3 }}</td>
                                <td>&nbsp;{{ $member->detail->time3 }} ปี</td>
                            </tr>
                    </table> --}}
                <br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3)  ประสบการณ์สำคัญหรือประสบการณ์ที่ภาคภูมิใจที่สัมพันธ์กับประเภทกลุ่มผู้แทนองค์กรภาคเอกชนที่เลือกสมัคร
                    <ul>
                        <li>
                            <div class="box-input" style="width:800px;">&nbsp;{{ $member->detail->importantMemo }}</div>
                        </li>
                    </ul>
                </p>
                <br>
            <div class="head" style="background-color: #663300;">
                ส่วนที่ 5 วิสัยทัศน์ของข้าพเจ้าต่อการพัฒนาระบบสุขภาพแห่งชาติ
            </div>
            <br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div class="box-input" style="width:800px;">{{ $member->detail->vision }}</div>
            <br><br>
            <p>
            <div class="head" style="background-color: #663300;">
                ส่วนที่ 6 เอกสารแนบ
            </div>
            <br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ทั้งนี้  ข้าพเจ้าได้แนบสำเนาเอกสารหรือหลักฐานที่แนบมาพร้อมใบสมัคร <br>
                <ul>
                    @if(!empty($member->attach()->where('status',1)->where('use_is','copy_personal_card')->first()->path))
                        <li><img style="height:30px; width:30px" src="{{ url('backend/img/timesquare.png') }}"> สำเนาบัตรประจำตัวประชาชนของผู้แทนองค์กรภาคเอกชน</li>
                            <div class="col-md-12">
                                <div class="form-group">
                                    &nbsp;&nbsp;<a href="{{ asset($member->attach()->where('status',1)->where('use_is','copy_personal_card')->first()->path) }}" target="_blank">คลิ๊กที่นี่เพื่อเปิดเอกสาร</a>
                            </div>
                        </div>
                    @else
                        <li><img style="height:30px; width:30px" src="{{ url('backend/img/square.png') }}"> สำเนาบัตรประจำตัวประชาชนของผู้แทนองค์กรภาคเอกชน</li>
                    @endif
                    {{-- @if(!empty($member->attach()->where('status',1)->where('use_is','copy_personal_card')->first()->path))
                        <div class="d-flex justify-content-center">
                            <img class="img-responsive" src="{{ asset($member->attach()->where('status',1)->where('use_is','copy_personal_card')->first()->path)}}">
                        </div>
                    @endif --}}

                        {{-- {{dd($member->attach)}} --}}
                    {{-- @if(!empty($member->attach()->where('status',1)->where('use_is','copy_personal_card')->first()->path))
                        @if(!empty($member->attach()->where('status',1)->where('use_is','copy_personal_card')->where('type','jpg')->first()->path))
                            <div class="d-flex justify-content-center">
                                <img class="img-responsive" src="{{ asset($member->attach()->where('status',1)->where('use_is','copy_personal_card')->first()->path) }}">
                            </div>
                        @else
                            <iframe type="application/pdf" src="{{ asset($member->attach()->where('status',1)->where('use_is','copy_personal_card')->first()->path) }}" style="display:block;margin:0px;padding:0px;border:none;overflow:hidden;overflow-x:hidden;overflow-y:hidden;top:0px;left:0px;right:0px;bottom:0px; height:1.7in; width:1.5in" scrolling="no" frameborder="0" class="embed-responsive-item">
                        @endif
                    @endif --}}

                    {{-- @if(!empty($member->attach()->where('status',1)->where('use_is','copy_personal_card')->first()->path)) --}}
                        {{-- @if(!empty($member->attach()->where('status',1)->where('use_is','copy_personal_card')->where('type','jpg')->first()->path))
                            <div class="d-flex justify-content-center">
                                <img class="img-responsive" src="{{ asset($member->attach()->where('status',1)->where('use_is','copy_personal_card')->first()->path) }}">
                            </div>
                        @else
                            <div class="d-flex justify-content-center">
                                <iframe class="embed-responsive-item" src="{{ asset($member->attach()->where('status',1)->where('use_is','copy_personal_card')->first()->path) }}" style="width:600px; height:800px;" frameborder="0"></iframe>
                            </div>
                        @endif --}}

                    @if(!empty($member->attach()->where('status',1)->where('use_is','personal_photo')->first()->path))
                        <li><img style="height:30px; width:30px" src="{{ url('backend/img/timesquare.png') }}"> รูปถ่ายหน้าตรงไม่สวมหมวก ไม่สวมแว่นตาดำ ดำ ฉากพื้นหลังไม่มีลวดลาย  ซึ่งถ่ายมาแล้ว
                        ไม่เกิน  6  เดือน</li>
                        <div class="col-md-12">
                            <div class="form-group">
                                &nbsp;&nbsp;<a href="{{ asset($member->attach()->where('status',1)->where('use_is','personal_photo')->first()->path) }}" target="_blank">คลิ๊กที่นี่เพื่อเปิดเอกสาร</a>
                            </div>
                        </div>
                    @else
                        <li><img style="height:30px; width:30px" src="{{ url('backend/img/square.png') }}"> รูปถ่ายหน้าตรงไม่สวมหมวก ไม่สวมแว่นตาดำ ดำ ฉากพื้นหลังไม่มีลวดลาย  ซึ่งถ่ายมาแล้ว
                        ไม่เกิน  6  เดือน</li>
                    @endif

                    @if(!empty($member->attach()->where('status',1)->where('use_is','document1')->first()->path))
                        <li><img style="height:30px; width:30px" src="{{ url('backend/img/timesquare.png') }}"> แบบ สช./แบบขอขึ้นทะเบียนองค์กรภาคเอกชนและยืนยันการส่งผู้แทนภาคเอกชน/ พร้อมเอกสารหลักฐานประกอบ 1 ชุด </li>
                        <div class="col-md-12">
                            <div class="form-group">
                                &nbsp;&nbsp;<a href="{{ asset($member->attach()->where('status',1)->where('use_is','document1')->first()->path) }}" target="_blank">คลิ๊กที่นี่เพื่อเปิดเอกสาร</a>
                            </div>
                        </div>
                    @else
                        <li><img style="height:30px; width:30px" src="{{ url('backend/img/square.png') }}"> แบบ สช./แบบขอขึ้นทะเบียนองค์กรภาคเอกชนและยืนยันการส่งผู้แทนภาคเอกชน/ พร้อมเอกสารหลักฐานประกอบ 1 ชุด </li>
                    @endif
                    {{-- @if(!empty($member->attach()->where('status',1)->where('use_is','document1')->first()->path))
                        <div class="d-flex justify-content-center">
                            <img class="img-responsive" src="{{ asset($member->attach()->where('status',1)->where('use_is','document1')->first()->path)}}">
                        </div>
                    @endif --}}

                    {{-- @if(!empty($member->attach()->where('status',1)->where('use_is','document1')->where('type','jpg')->first()->path))
                            <div class="d-flex justify-content-center">
                                <img class="img-responsive" src="{{ asset($member->attach()->where('status',1)->where('use_is','document1')->first()->path)}}">
                            </div>
                        @else
                            <div class="d-flex justify-content-center">
                                <iframe class="embed-responsive-item" src="{{ asset($member->attach()->where('status',1)->where('use_is','document1')->first()->path) }}" style="width:600px; height:800px;" frameborder="0"></iframe>
                            </div>
                        @endif --}}


                </ul>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <img style="height:30px; width:30px" src="{{ url('backend/img/timesquare.png') }}"> ข้าพเจ้าขอรับรองว่าข้อมูลที่กรอกข้างต้น  และเอกสารที่แนบมาพร้อมใบสมัครเป็นความจริงทุกประการ  หากมีข้อมูลใดเป็นเท็จหรือไม่ตรงกับความเป็นจริง  ข้าพเจ้ายินยอมให้ถูกตัดสิทธิ์จากการเป็นผู้สมัครหรือผู้ถูกเสนอชื่อในครั้งนี้<br>
            </p>

            <div class="form-group">
                <a data-toggle="modal" id="gotomodal" href="#m-editstatus" style="display: none;"> test </a>
            @if(!empty($member->detail))
            @if ($member->confirmed_at != null and $member->detail->fixStatus != 1)
                <form id="frmstatuschange" method="GET" action="{{url('backend/check/editstatusNGO')}}">
                    {{ csrf_field() }}
                    {{-- <select data-default="{{$member->detail->statusId}}" name="txtstatuschange[]" class="form-control bg-warning" style="font-size: 15pt; height:1cm;" onchange="editstatus(0,this);" @if($member->detail->fixStatus==1) disabled="disabled" @endif>
                        @foreach ($liststatus as $valstatus)
                            @if($valstatus->id!=2)
                                <option @if($member->detail->statusId == $valstatus->id) selected @endif
                                value={{$valstatus->id}}>{{$valstatus->status}}</option>
                            @endif
                        @endforeach
                    </select> --}}
                    <input type="hidden" name="Hid[]" id="Hid" value={{$member->id}}>
                </form>

                <form name"frmnotpass[]" method="GET" action="{{url('backend/check/editnotpassNGO')}}">
                {{ csrf_field() }}
                    <input type="hidden" name="Hidmember[]" value={{$member->id}}>

                    <div id="m-editstatus" class="modal fade" aria-hidden="true">
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

                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">บันทึก</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
            <div align="right">
                @if($id2!=0)
                <a href="/backend/ngoPreview/{{ $id2 }}/{{ $name }}/{{ $group1 }}/{{ $group2 }}/{{ $group3 }}/{{ $status1 }}/{{ $status2 }}/{{ $status3 }}/{{ $section1 }}/{{ $section2 }}/{{ $section3 }}/{{ $pro1 }}/{{ $pro2 }}/{{ $pro3 }}"><button type="button" class="btn btn-primary"><i class="fa fa-chevron-left"></i> ก่อนหน้า</button></a>
            @endif

            @if($id3!=0)
                <a href="/backend/ngoPreview/{{ $id3 }}/{{ $name }}/{{ $group1 }}/{{ $group2 }}/{{ $group3 }}/{{ $status1 }}/{{ $status2 }}/{{ $status3 }}/{{ $section1 }}/{{ $section2 }}/{{ $section3 }}/{{ $pro1 }}/{{ $pro2 }}/{{ $pro3 }}"><button type="button" class="btn btn-primary">ถัดไป <i class="fa fa-chevron-right"></i></button></a>
            @endif
            {{-- 'member','member2','liststatus','name','group1','group2','group3','status1','status2','status3','section1','section2','section3','pro1','pro2','pro3' --}}
                    <a href="{{ url('backend/check/ngoCheck')}}?member={{$member}}&member2={{$member2}}&liststatus={{$liststatus}}&name={{$name}}&group1={{$group1}}&group2={{$group2}}&group3={{$group3}}&status1={{$status1}}&status2={{$status2}}&status3={{$status3}}&section1={{$section1}}&section2={{$section2}}&section3={{$section3}}&pro1={{$pro1}}&pro2={{$pro2}}&pro3={{$pro3}}">
                        <button id="back" name="back" type="button" class="btn btn-danger"><i class="fa fa-times"></i> ปิด</button>
                    </a>
            </div>

            @elseif($member->detail->fixStatus == 1)
                <div class="text-center">** ข้อมูลได้รับการอนุมัติแล้วไม่สามารถแก้ไขได้ **</div>
            @elseif($member->confirmed_at != null and $member->detail->fixStatus != 1)
                <div class="text-center">** ยังไม่ยืนยันการสมัคร **</div>
            @endif
            @endif
            <br><br>
        @endif

    </div>
</div>
@endsection

@section('js')
<script>
    var select_element;
    function editstatus(element){
        select_element = element
        var status = document.getElementsByName('txtstatuschange[]')[0].value;
        console.log(status)

        if(status==4){
            document.getElementById('gotomodal').click();
        }else{
            document.getElementById('frmstatuschange').submit();
        }

        $('#m-editstatus').on('hidden.bs.modal', function() {
            console.log($(select_element).val($(select_element).data('default')))
        });
    }
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

<style type="text/css">
    @font-face {
        font-family: THBaijam;
        font-style: normal;
        font-weight: normal;
        src: url('{{ url('frontend/fonts/THSarabunNew.ttf') }}');
    }
    @font-face {
        font-family: THBaijam;
        font-style: normal;
        font-weight: bold;
        src: url('{{ url('frontend/fonts/THSarabunNew Bold.ttf') }}');
    }
    body{
        /* font-family: "THBaijam";         */
        color:#1B802D;
        /* font-size: 16pt; */
    }
    .text-center{
        text-align: center;
    }
    .text-right{
        text-align: right;
    }
    .h1{
        font-size: 25pt;
        font-weight: bold;
    }
    .head{
        color:#fff;
        font-weight: bold;
        background-color: #549733;
        padding:3px;
    }
    ul li {
        list-style: none;
    }
    .box-input{
        display:inline-block;
        border-bottom:1px dotted #000;
        padding-bottom: 2px;
        padding-left: 15px;
    }
    p{
        padding:0px;
        margin-top:0px;
    }
    table {
    border-collapse: collapse;
    }

    table, th, td {
    border: 1px solid #663300;
    }
    th {
        text-align: center;
    }

    .photoimg { float:right; margin:10px; object-fit: cover;}
    embed { float:right; margin:0px; object-fit: cover; }

    .mainpage {
        /* font-size: 2em; */
        font-family: "THBaijam"; font-size: 2em; color: #663300;
    }
page-wrapper
</style>
@endsection
