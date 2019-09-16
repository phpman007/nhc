@extends('backend.theme.master')

{{-- @section('css')

@endsection --}}

@section('title','NHCO ADMIN')

{{-- @section('script')

    <script type="application/javascript">

        function resizeIFrameToFitContent( iFrame ) {

            iFrame.width  = iFrame.contentWindow.document.body.scrollWidth;
            iFrame.height = iFrame.contentWindow.document.body.scrollHeight;
        }

        window.addEventListener('DOMContentLoaded', function(e) {

            var iFrame = document.getElementById( 'iFrame1' );
            resizeIFrameToFitContent( iFrame );

            // or, to resize all iframes:
            var iframes = document.querySelectorAll("iframe");
            for( var i = 0; i < iframes.length; i++) {
                resizeIFrameToFitContent( iframes[i] );
            }
        } );

    </script>

@endsection --}}

@section('content')
{{-- {{dd($member2, $member)}} --}}
{{-- <a href="#" class="previous round">&#8249;</a>
<a href="#" class="next round">&#8250;</a><br> --}}
<div class="mainpage">
<div class="card border-info mb-3">
    <div class="card-header">
    <strong>แสดงข้อมูล ผู้ทรงคุณวุฒิ</strong>
        <div align="right">
            {{-- @php
                $keynow=0;
                $id2=0;
                $id3=0;
                foreach($member2 as $key=>$vals){
                    if($vals->id == $member->id){
                        $keynow=$key;
                    }
                }

                if($keynow==0){
                    $id3=$member2[$keynow+1]->id;
                }elseif($keynow+1 == $member2->count()){
                    $id2=$member2[$keynow-1]->id;
                }else{
                    $id2=$member2[$keynow-1]->id;
                    $id3=$member2[$keynow+1]->id;
                }
            @endphp --}}

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

            <a href="{{ url('backend/view/snView') }}"><button id="back" name="back" type="button" class="btn btn-danger"><i class="fa fa-times"></i> ปิด</button></a>
        </div>
    </div>
    <div class="card-body">
    @if(!empty($member))
        <div class="col-md-12">
                <div class="form-group">
            {{-- @if(file_exists($member->attach()->where('status',1)->where('use_is','personal_photo')->first())) --}}
                @if(!empty($member->attach()->where('status',1)->where('use_is','personal_photo')->where('type','jpg')->first()))
                    <img class="photoimg" style="height:2.0in; width:1.7in" src="{{ asset($member->attach()->where('status',1)->where('use_is','personal_photo')->first()->path)}}">
                @elseif(!empty($member->attach()->where('status',1)->where('use_is','personal_photo')->where('type','jpeg')->first()->path))
                    <img class="photoimg" style="height:2.0in; width:1.7in" src="{{ asset($member->attach()->where('status',1)->where('use_is','personal_photo')->first()->path)}}">
                @elseif(!empty($member->attach()->where('status',1)->where('use_is','personal_photo')->where('type','pdf')->first()->path))
                    <embed type="application/pdf" src="{{ asset($member->attach()->where('status',1)->where('use_is','personal_photo')->first()->path) }}#zoom=FitH&view=fit&toolbar=0&navpanes=0&scrollbar=0&scrolling=0" value="FitH" style="display:block;margin:0px;padding:0px;border:none;overflow:hidden;overflow-x:hidden;overflow-y:hidden;top:0px;left:0px;right:0px;bottom:0px; height:2.0in; width:1.7in" scrolling="no" frameborder="0" class="embed-responsive-item">
                @else

                @endif
            {{-- @else
            @endif --}}
            </div></div>
            <div class="text-right"><font size="5px">รหัสผู้สมัคร {{ $member->id }}</font></div>
        แบบฟอร์ม สช./ใบสมัครผู้ทรงคุณวุฒิ/2562

        <br><br>

        <div style="position:absolute">
            <img style="height:1.6in; width:1.34in" src="{{ url('backend/img/logo-pdf.jpg') }}" alt="">
        </div>

        <p class="text-center h1">
            ใบสมัครผู้ทรงคุณวุฒิ <br>
            เข้ารับการเลือกเป็นกรรมการสุขภาพแห่งชาติ <br>
            พ.ศ. 2562
        </p><br>
        <div class="text-right">
            @if (!empty($member->confirmed_at))
                วันที่ {{ $member->confirmed_at->format('d') }} เดือน {{ Helper::monthThai($member->confirmed_at->format('m')) }} พ.ศ.{{ $member->confirmed_at->addYears(543)->format('Y') }}
            @else
                วันที่ ........ เดือน ................. ปี ............
            @endif
        </div>
        <br>
        <div>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ข้าพเจ้า <div class="box-input" style="width:600px;">{{ $member->nameTitle }} {{ $member->firstname }}  {{ $member->lastname }}</div> <br>
            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;มีความประสงค์จะสมัครเข้ารับการเลือกเป็นกรรมการสุขภาพแห่งชาติ  จึงขอส่งใบสมัครของข้าพเจ้ามายังประธานคณะกรรมการสรรหา
        </div><br>
        <div class="head">
            ส่วนที่  1	คุณสมบัติ
        </div>
        <p>
            ข้าพเจ้าเป็นผู้มีคุณสมบัติของผู้ทรงคุณวุฒิที่จะเข้ารับการเลือกเป็นกรรมการสุขภาพแห่งชาติครบถ้วน  ดังนี้ <br>
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
                            <li>3) <img style="height:30px; width:30px" src="{{ url('backend/img/timesquare.png') }}"> มีผลงานเป็นที่ประจักษ์ที่สอดคล้องกับประเภทกลุ่มผู้ทรงคุณวุฒิที่เลือกสมัคร</li>
                        </ul>
                    </li>
                </li>
            </ul>
        </p>
        <div class="head">
            ส่วนที่  2	การแสดงเจตนาสมัครเข้ากลุ่ม
        </div>
        <p>
                ข้าพเจ้ามีความประสงค์ที่จะสมัครเป็นกรรมการสุขภาพแห่งชาติจากผู้ทรงคุณวุฒิในกลุ่ม <br>
            <ul>
                @foreach(DB::table('senior_groups')->get() as $key => $group)
                    @if($member->seniorGroupId == $group->id)
                    <li><img style="height:30px; width:30px" src="{{ url('backend/img/timesquare.png') }}"> {{ $group->groupName }}</li>
                    @else
                    <li><img style="height:30px; width:30px" src="{{ url('backend/img/square.png') }}">  {{ $group->groupName }}</li>
                    @endif
                @endforeach
            </ul>

            หมายเหตุ   ผู้ทรงคุณวุฒิสามารถสมัครได้กลุ่มใดกลุ่มหนึ่งใน ๖ กลุ่มนี้ เท่านั้น
        </p>

        <div class="head">
            ส่วนที่  3	ข้อมูลยืนยันตัวตนของผู้สมัครเพื่อเข้าสู่ระบบการสรรหากรรมการสุขภาพแห่งชาติแบบอิเล็กทรอนิกส์
        </div>
        <p>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.  เลขบัตรประชาชน 13 หลัก
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
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2. อีเมล (Email)
            <div class="box-input" style="width:600px;">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $member->email }}
            </div>
        </p><br>
        <p>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;รหัสผ่าน (Password)
            <div class="" style="padding:0px 15pt;height:20pt;">
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

        <div class="head">
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
                            &nbsp;นามสกุล<div class="box-input" style="width:330px;">{{ $member->lastname }}</div>
                            <br>
                        </li>
                        <li>2) เกิดวันที่<div class="box-input" style="width:50px;">
                            @if(!empty($member->detail->dateOfBirth))
                                {{ @ Carbon\Carbon::parse($member->detail->dateOfBirth)->format('d') }}
                            @endif
                            </div>
                            &nbsp;เดือน<div class="box-input" style="width:350px;">
                            @if(!empty($member->detail->dateOfBirth))
                                {{ Helper::monthThai( Carbon\Carbon::parse($member->detail->dateOfBirth)->format('m')) }}
                            @endif
                            </div>

                            &nbsp;พ.ศ<div class="box-input" style="width:200px;">
                                    @if(!empty($member->detail->dateOfBirth))
                                {{ @ Carbon\Carbon::parse($member->detail->dateOfBirth)->addYears('543')->format('Y') }}
                                @endif
                            </div>
                            &nbsp;อายุ

                            <div class="box-input" style="width:100px;">
                                @if(!empty($member->detail->dateOfBirth))
                                    @php
                                        $yearold = @ Carbon\Carbon::parse($member->detail->dateOfBirth)->format('Y');
                                        $now = now()->format('Y');
                                        echo ($now - $yearold);
                                    @endphp
                                @endif
                            </div>ปี

                            <br>
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
                            {{-- {!! @ $member->detail->genderId == 1 ? 'X' :'&nbsp;' !!}</div> <img style="height:30px; width:30px" src="{{ url('backend/img/timesquare.png') }}"> ชาย
                            {!! @ $member->detail->genderId == 2 ? 'X' :'&nbsp;' !!}</div> <img style="height:30px; width:30px" src="{{ url('backend/img/timesquare.png') }}">  หญิง
                            {!! @ $member->detail->genderId == 3 ? 'X' :'&nbsp;' !!}</div> <img style="height:30px; width:30px" src="{{ url('backend/img/timesquare.png') }}"> นักบวช/สมณะเพศ --}}
                        </li>
                        <li>4)	สถานที่ที่สามารถติดต่อได้สะดวก <br>
                            @if ($member->detail->addressType == 1)
                                <img style="height:30px; width:30px" src="{{ url('backend/img/timesquare.png') }}"> &nbsp;บ้าน <img style="height:30px; width:30px" src="{{ url('backend/img/square.png') }}"> &nbsp;ที่ทำงาน
                           @elseif ($member->detail->addressType == 2)
                                <img style="height:30px; width:30px" src="{{ url('backend/img/square.png') }}"> &nbsp;บ้าน <img style="height:30px; width:30px" src="{{ url('backend/img/timesquare.png') }}"> &nbsp;ที่ทำงาน
                            @else
                                <img style="height:30px; width:30px" src="{{ url('backend/img/square.png') }}"> &nbsp;บ้าน <img style="height:30px; width:30px" src="{{ url('backend/img/square.png') }}"> &nbsp;ที่ทำงาน
                            @endif
                            {{-- <div style="display:inline-block;padding:0px 6px;line-height: 0.6;border:1px solid #000">{!! @ $member->detail->addressType == 1 ? 'X' :'&nbsp;' !!}</div>  บ้าน
                            <div style="display:inline-block;padding:0px 6px;line-height: 0.6;border:1px solid #000">{!! @ $member->detail->addressType == 2 ? 'X' :'&nbsp;' !!}</div>  ที่ทำงาน --}}
                            @if ($member->detail->addressType == 2)
                                <div class="box-input" style="width:500px;">{{ @ $member->workPlaceName }}</div>
                                <br>
                            @endif
                            &nbsp;เลขที่<div class="box-input" style="width:100px;">{{ @ $member->detail->no }}</div>
                            &nbsp;หมู่ที่<div class="box-input" style="width:275px;">{{ @ $member->detail->moo }}</div>
                            &nbsp;ตรอก/ซอย<div class="box-input" style="width:275px;">{{ @ $member->detail->soi }}</div>
                            <br>
                            &nbsp;ถนน<div class="box-input" style="width:350px;">{{ @ $member->detail->street }}</div>
                            &nbsp;ตำบล/แขวง<div class="box-input" style="width:350px;">{{ @ $member->detail->province->district }}</div>
                            <br>
                            &nbsp;อำเภอ/เขต<div class="box-input" style="width:250px;">{{ @$member->detail->province->amphoe }}</div>
                            &nbsp;จังหวัด<div class="box-input" style="width:250px;">{{ @ $member->detail->province->province }}</div>
                            &nbsp;รหัสไปรษณีย์<div class="box-input" style="width:100px;">{{ @ $member->detail->zipCode }}</div>

                            <br>
                            &nbsp;เบอร์โทรศัพท์ 1 <div class="box-input" style="width:300px;">{{ @ $member->detail->tel }}</div>
                            &nbsp;เบอร์โทรศัพท์ 2 <div class="box-input" style="width:300px;">{{ @ $member->detail->mobile }}</div>
                        </li>
                    </ul>
                </li><br>

                <li>
                    2.  ประวัติการศึกษา
                    @php $optionsArray = ["ปริญญาเอก", "ปริญญาโท", "ปริญญาตรี", "ต่ำกว่าปริญญาตรี", 'อื่นๆ']; @endphp
						<div style="margin-bottom:15px;margin-top:15px;" class="table-responsive">
		  					<table border="1"  style="width:100%;" class="table-border">
								  <thead>
									  <tr style="background-color: #006600;">
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
										  <td width="15%" class="text-center"><span>{{ @ $member->detail->yearend1 }}</span></td>
                                      </tr>
									  <tr>
                                          <td width="8%" class="text-center"><span>2</span></td>
                                        @if (!empty($member->detail->graduated2))
                                            <td width="20%"><span>&nbsp;{{ @ $optionsArray[$member->detail->graduated2]}}</span></td>
                                            <td width="27%"><span>&nbsp;{{ @ $member->detail->faculty2 }}</span></td>
                                            <td width="35%"><span>&nbsp;{{ @ $member->detail->institution2 }}</span></td>
                                            <td width="15%" class="text-center"><span>{{ @ $member->detail->yearend2 }}</span></td>
                                        @else
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        @endif
                                      </tr>
									  <tr>
                                          <td width="8%" class="text-center"><span>3</span></td>
                                        @if (!empty($member->detail->graduated3))
                                            <td width="20%"><span>&nbsp;{{ @ $optionsArray[$member->detail->graduated3]}}</span></td>
                                            <td width="27%"><span>&nbsp;{{ @ $member->detail->faculty3 }}</span></td>
                                            <td width="35%"><span>&nbsp;{{ @ $member->detail->institution3 }}</span></td>
                                            <td width="15%" class="text-center"><span>{{ @ $member->detail->yearend3 }}</span></td>
                                        @else
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        @endif
                                      </tr>
                                      <tr>
                                        <td width="8%" class="text-center"><span>4</span></td>
                                        @if (!empty($member->detail->graduated4))
                                            <td width="20%"><span>&nbsp;{{ @ $optionsArray[$member->detail->graduated4]}}</span></td>
                                            <td width="27%"><span>&nbsp;{{ @ $member->detail->faculty4 }}</span></td>
                                            <td width="35%"><span>&nbsp;{{ @ $member->detail->institution4 }}</span></td>
                                            <td width="15%" class="text-center"><span>{{ @ $member->detail->yearend4 }}</span></td>
                                        @else
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <td width="8%" class="text-center"><span>5</span></td>
                                        @if (!empty($member->detail->graduated5))
                                            <td width="20%"><span>&nbsp;{{ @ $optionsArray[$member->detail->graduated5]}}</span></td>
                                            <td width="27%"><span>&nbsp;{{ @ $member->detail->faculty5 }}</span></td>
                                            <td width="35%"><span>&nbsp;{{ @ $member->detail->institution5 }}</span></td>
                                            <td width="15%" class="text-center"><span>{{ @ $member->detail->yearend5 }}</span></td>
                                        @else
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        @endif
                                    </tr>
								  </tbody>
							  </table>
						</div>
                    {{--  <div style="padding-left:30px; margin-bottom:15px;">
                            @if($member->detail->graduated1!=null)
                                <strong>1) <div class="box-input" style="width:335px;">{{ $member->detail->graduated1 }}</div></strong>
                                <strong>สาขา <div class="box-input" style="width:270px;">{{ $member->detail->faculty1 }}</div></strong>
                            @else
                                <strong>1) <span style="border-bottom:1px dotted #006600; width: 335px; display:inline-block">&nbsp</span></strong>
                                <strong>สาขา <span style="border-bottom:1px dotted #006600; width: 270px; display:inline-block">&nbsp</span></strong>
                            @endif
                            <br>
                            @if($member->detail->graduated2!=null)
                                <strong>2) <div class="box-input" style="width:335px;">{{ $member->detail->graduated2 }}</div></strong>
                                <strong>สาขา <div class="box-input" style="width:270px;">{{ $member->detail->faculty2 }}</div></strong>
                            @else
                                <strong>2) <span style="border-bottom:1px dotted #006600; width: 335px; display:inline-block">&nbsp</span></strong>
                                <strong>สาขา <span style="border-bottom:1px dotted #006600; width: 270px; display:inline-block">&nbsp</span></strong>
                            @endif
                            <br>
                            @if($member->detail->graduated3!=null)
                                <strong>3) <div class="box-input" style="width:335px;">{{ $member->detail->graduated3 }}</div></strong>
                                <strong>สาขา <div class="box-input" style="width:270px;">{{ $member->detail->faculty3 }}</div></strong>

                            @else
                                <strong>3) <span style="border-bottom:1px dotted #006600; width: 335px; display:inline-block">&nbsp</span></strong>
                                <strong>สาขา <span style="border-bottom:1px dotted #006600; width: 270px; display:inline-block">&nbsp</span></strong>
                            @endif
                            <br>
                            @if($member->detail->graduated4!=null)
                                <strong>4) <div class="box-input" style="width:335px;">{{ $member->detail->graduated4 }}</div></strong>
                                <strong>สาขา <div class="box-input" style="width:270px;">{{ $member->detail->faculty4 }}</div></strong>

                            @else
                                <strong>4) <span style="border-bottom:1px dotted #006600; width: 335px; display:inline-block">&nbsp</span></strong>
                                <strong>สาขา <span style="border-bottom:1px dotted #006600; width: 270px; display:inline-block">&nbsp</span></strong>
                            @endif
                            <br>
                            @if($member->detail->graduated5!=null)
                                <strong>5) <div class="box-input" style="width:335px;">{{ $member->detail->graduated5 }}</div></strong>
                                <strong>สาขา <div class="box-input" style="width:270px;">{{ $member->detail->faculty5 }}</div></strong>

                            @else
                                <strong>5) <span style="border-bottom:1px dotted #006600; width: 335px; display:inline-block">&nbsp</span></strong>
                                <strong>สาขา <span style="border-bottom:1px dotted #006600; width: 270px; display:inline-block">&nbsp</span></strong>
                            @endif
                            <br>
                      </div>  --}}
                </li><br>

                <li>
                    3.  ประวัติการทำงาน
                    <ul>
                            <li>
                                1)  หน้าที่การงานและความรับผิดชอบในปัจจุบัน
                                <ol>
                                        <li>ปัจจุบันปฏิบัติหน้าที่ <br>
                                            <div class="box-input" style="width:800px;">&nbsp;{{ @ $member->detail->nowWork }}</div>
                                        </li>
                                        <li>สถานที่ปฏิบัติงาน <br>
                                            <div class="box-input" style="width:800px;">&nbsp;{{ @ $member->detail->nowWorkPlace }}</div>
                                        </li>
                                        <li>งานในความรับผิดชอบ <br>
                                            <div class="box-input" style="width:800px;">&nbsp;{{ @ $member->detail->nowRole }}</div>
                                        </li>
                                </ol>
                            </li>
                    </ul>
                </li><br>
                <li>
                    2)  การปฏิบัติหน้าที่ในอดีต  (โปรดระบุเฉพาะหน้าที่ที่สำคัญ)
                    <div class="table-responsive">
                    <table border="1"  style="width:100%;" class="table-border">
                            <thead>
                                <tr style="background-color: #006600;">
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
                                @if (!empty($member->detail->pastWork2))
                                    <td>&nbsp;{{ @ $member->detail->pastWork2 }}</td>
                                    <td>&nbsp;{{ @ $member->detail->pastOrganization2 }}</td>
                                    <td class="text-center">&nbsp;{{ @ $member->detail->fromyear2 }}</td>
                                    <td class="text-center">&nbsp;{{ @ $member->detail->toyear2 }}</td>
                                    <td class="text-center">&nbsp;{{ @ str_replace("ปี","",$member->detail->time2) }} ปี</td>
                                @else
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                @endif
                            </tr>
                            <tr>
                                <td class="text-center">3</td>
                                @if (!empty($member->detail->pastWork3))
                                    <td>&nbsp;{{ @ $member->detail->pastWork3 }}</td>
                                    <td>&nbsp;{{ @ $member->detail->pastOrganization3 }}</td>
                                    <td class="text-center">&nbsp;{{ @ $member->detail->fromyear3 }}</td>
                                    <td class="text-center">&nbsp;{{ @ $member->detail->toyear3 }}</td>
                                    <td class="text-center">&nbsp;{{ @ str_replace("ปี","",$member->detail->time3) }} ปี</td>
                                @else
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                @endif
                            </tr>
                    </table></div>
                </li><br>
                <li>
                    3)  ประสบการณ์สำคัญหรือประสบการณ์ที่ภาคภูมิใจที่สัมพันธ์กับประเภทกลุ่มผู้ทรงคุณวุฒิที่เลือกสมัคร <br>
                    <div class="box-input" style="width:800px;">&nbsp;{{ $member->detail->importantMemo }}</div>
                </li>
            </ul>
        </p><br>
        <div class="head">
            ส่วนที่ 5  วิสัยทัศน์ของข้าพเจ้าต่อการพัฒนาระบบสุขภาพแห่งชาติ
        </div>
        <br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div class="box-input" style="width:800px;">{{ $member->detail->vision }}</div>
        <br><br>
        <p>
        <div class="head">
            ส่วนที่ 6  เอกสารแนบ
        </div>
        <br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ทั้งนี้  ข้าพเจ้าได้แนบสำเนาเอกสารหรือหลักฐานที่แนบมาพร้อมใบสมัคร <br>
            <ul>
                @if(!empty($member->attach()->where('status',1)->where('use_is','copy_personal_card')->first()->path))
                    <li><img style="height:30px; width:30px" src="{{ url('backend/img/timesquare.png') }}"> สำเนาบัตรประจำตัวประชาชน</li>
                    <div class="col-md-12">
                        <div class="form-group">
                            @if(!empty($member->attach()->where('status',1)->where('use_is','copy_personal_card')->first()->path))
                                &nbsp;&nbsp;<a href="{{ asset($member->attach()->where('status',1)->where('use_is','copy_personal_card')->first()->path) }}" target="_blank">คลิ๊กที่นี่เพื่อเปิดเอกสาร</a>
                            @endif
                        </div>
                    </div>
                @else
                    <li><img style="height:30px; width:30px" src="{{ url('backend/img/square.png') }}"> สำเนาบัตรประจำตัวประชาชน</li>
                @endif

                @if(!empty($member->attach()->where('status',1)->where('use_is','personal_photo')->first()->path))
                    <li><img style="height:30px; width:30px" src="{{ url('backend/img/timesquare.png') }}"> รูปถ่ายหน้าตรงไม่สวมหมวก ไม่สวมแว่นตาดำ ดำ ฉากพื้นหลังไม่มีลวดลาย  ซึ่งถ่ายมาแล้ว
                        ไม่เกิน  6  เดือน</li>
                    <div class="col-md-12">
                        <div class="form-group">
                            &nbsp;&nbsp;<a href="{{ asset($member->attach()->where('status',1)->where('use_is','personal_photo')->first()->path) }}" target="_blank">คลิ๊กที่นี่เพื่อเปิดเอกสาร</a>
                    </div></div>
                @else
                    <li><img style="height:30px; width:30px" src="{{ url('backend/img/square.png') }}"> รูปถ่ายหน้าตรงไม่สวมหมวก ไม่สวมแว่นตาดำ ดำ ฉากพื้นหลังไม่มีลวดลาย  ซึ่งถ่ายมาแล้ว
                        ไม่เกิน  6  เดือน</li>
                @endif

                @if(!empty($member->attach()->where('status',1)->where('use_is','document1')->first()->path))
                    <li><img style="height:30px; width:30px" src="{{ url('backend/img/timesquare.png') }}"> เอกสารสรุปผลงานอันเป็นที่ประจักษ์ ที่สอดคล้องกับประเภทกลุ่มผู้ทรงคุณวุฒิที่เลือกสมัคร (ไม่เกิน 2 หน้ากระดาษ A 4) พิมพ์โดยใช้ตัวอักษรขนาดไม่ต่ำกว่า 16</li>
                    <div class="col-md-12">
                        <div class="form-group">
                            &nbsp;&nbsp;<a href="{{ asset($member->attach()->where('status',1)->where('use_is','document1')->first()->path) }}" target="_blank">คลิ๊กที่นี่เพื่อเปิดเอกสาร</a>
                    </div></div>
                @else
                    <li><img style="height:30px; width:30px" src="{{ url('backend/img/square.png') }}"> เอกสารสรุปผลงานอันเป็นที่ประจักษ์ ที่สอดคล้องกับประเภทกลุ่มผู้ทรงคุณวุฒิที่เลือกสมัคร (ไม่เกิน 2 หน้ากระดาษ A 4) พิมพ์โดยใช้ตัวอักษรขนาดไม่ต่ำกว่า 16</li>
                @endif

            </ul>
            @if(!empty($member->attach()->where('status',1)->where('use_is','document1')->first()->path))
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="height:30px; width:30px" src="{{ url('backend/img/timesquare.png') }}"> ข้าพเจ้าขอรับรองว่าข้อมูลที่กรอกข้างต้น  และเอกสารที่แนบมาพร้อมใบสมัครเป็นความจริงทุกประการ  หากมีข้อมูลใดเป็นเท็จหรือไม่ตรงกับความเป็นจริง  ข้าพเจ้ายินยอมให้ถูกตัดสิทธิ์จากการเป็นผู้สมัครหรือผู้ถูกเสนอชื่อในครั้งนี้<br>
            @else
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="height:30px; width:30px" src="{{ url('backend/img/square.png') }}"> ข้าพเจ้าขอรับรองว่าข้อมูลที่กรอกข้างต้น  และเอกสารที่แนบมาพร้อมใบสมัครเป็นความจริงทุกประการ  หากมีข้อมูลใดเป็นเท็จหรือไม่ตรงกับความเป็นจริง  ข้าพเจ้ายินยอมให้ถูกตัดสิทธิ์จากการเป็นผู้สมัครหรือผู้ถูกเสนอชื่อในครั้งนี้<br>
            @endif
        </p>
        <div class="col-md-12">
        <div class="form-group">
            <a data-toggle="modal" id="gotomodal" href="#m-editstatus" style="display: none;"> test </a>
            @if(!empty($member->detail))
                @if ($member->detail->fixStatus != 1 and $member->status_accept == 1)
                <form id="frmstatuschange" method="GET" action="{{url('backend/check/editstatusSN')}}">
                    {{ csrf_field() }}
                    {{-- <select data-default="{{ @ $member->detail->statusId}}" name="txtstatuschange[]" class="form-control bg-warning" style="font-size: 15pt; height:1cm;" onchange="editstatus(this);" @if( @ $member->detail->fixStatus==1) disabled="disabled" @endif>
                        @foreach ($liststatus as $valstatus)
                            @if($valstatus->id!=2)
                                <option @if( @ $member->detail->statusId == $valstatus->id) selected @endif
                                value={{$valstatus->id}}>{{$valstatus->status}}</option>
                            @endif
                        @endforeach
                    </select> --}}
                    <input type="hidden" name="Hid[]" id="Hid" value={{$member->id}}>
                </form>

                <form name"frmnotpass[]" method="GET" action="{{url('backend/check/editnotpassSN')}}">
                {{ csrf_field() }}
                    <input type="hidden" name="Hidmember[]" value={{$member->id}}>

                    <div id="m-editstatus" class="modal fade" aria-hidden="true">
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

            </div>

        </div>

            @elseif($member->detail->fixStatus == 1)
            <div class="text-center">** ข้อมูลได้รับการอนุมัติแล้วไม่สามารถแก้ไขได้ **</div>
            @elseif($member->status_accept != 1)
                <div class="text-center">** ยังไม่ยืนยันการสมัคร **</div>
            @endif
        @else
            <div class="text-center">** ยังไม่ยืนยันการสมัคร **</div>
        @endif
        <br><br>
    @endif

    <div align="right">
        <a href="{{ url('backend/view/snView') }}"><button id="back" name="back" type="button" class="btn btn-danger"><i class="fa fa-times"></i> ปิด</button></a>
    </div><br><br><br><br>

    </div></div>
{{-- </div>
</div> --}}
@endsection

@section('js')
<script>

    let iframe = $("#pdf")

    // console.log('iframe', iframe.contents())
    console.log('dd', $( "#content", iframe.contents()))
    var select_element;
    function editstatus(element){
        select_element = element
        var status = document.getElementsByName('txtstatuschange[]')[0].value;

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
        /* font-family: "THBaijam"; */
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
    border: 1px solid #549733;
    }
    th {
        text-align: center;
    }


    .photoimg { float:right; margin:10px; object-fit: cover; }
    embed { float:right; margin:0px; object-fit: cover; }
    /* iframe::-webkit-scrollbar { display: none; width: 0; } */
    /* .element::-webkit-scrollbar { width: 0 !important }
    .element { overflow: -moz-scrollbars-none; }
    .element { -ms-overflow-style: none; } */
    .mainpage {
        /* font-size: 2em; */
        font-family: "THBaijam"; font-size: 2em;
    }

</style>

@endsection
