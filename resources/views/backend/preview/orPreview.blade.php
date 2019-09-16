@extends('backend.theme.master')
@section('title','NHCO ADMIN')

@section('content')
{{-- <a href="#" class="previous round">&#8249;</a>
<a href="#" class="next round">&#8250;</a><br> --}}

<div class="card border-info mb-3">
    <div class="card-header">
        <strong>ตรวจสอบหลักฐาน ผู้แทนองค์กรปกครองส่วนท้องถิ่น</strong>
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

                if($keynow==0){
                    $id3=$member2[$keynow+1]->id;
                }elseif($keynow+1 == $member2->count()){
                    $id2=$member2[$keynow-1]->id;
                }else{
                    $id2=$member2[$keynow-1]->id;
                    $id3=$member2[$keynow+1]->id;
                }
            @endphp

            @if($id2!=0)
            <a href="/backend/orPreview/{{ $id2 }}"><button type="button" class="btn btn-primary"><i class="fa fa-chevron-left"></i> ก่อนหน้า</button></a>
            @endif

            @if($id3!=0)
            <a href="/backend/orPreview/{{ $id3 }}"><button type="button" class="btn btn-primary">ถัดไป <i class="fa fa-chevron-right"></i></button></a>
            @endif
            {{-- <i class="fa fa-print"></i> --}}
            <button class="btn btn-primary" type="button" onClick="window.print()"><i class="fa fa-print"></i> พิมพ์</button>
            <a href="{{ url('backend/check/orCheck') }}"><button id="back" name="back" type="button" class="btn btn-info"><i class="fa fa-times"></i> ปิด</button></a>
        </div>
    </div>
    <div class="card-body">
        @if(!empty($member->attach()->where('status',1)->where('use_is','personal_copy')->first()->path))
            <img style="height:1.7in; width:1.5in" src="{{ asset($member->attach()->where('status',1)->where('use_is','personal_photo')->first()->path)}}" alt="" class="rounded-circle">
        @endif

        @if(!empty($member))
        แบบฟอร์ม สช./ใบสมัครผู้แทนองค์กรปกครองส่วนท้องถิ่น/๒๕๖๒
        <br><br>

        <div style="position:absolute">
            <img style="height:1.6in; width:1.34in" src="{{ url('backend/img/logo-pdf.jpg') }}" alt="">
        </div>

        <p class="text-center h1">
            ใบสมัครผู้แทนองค์กรปกครองส่วนท้องถิ่น <br>
            เข้ารับการเลือกเป็นกรรมการสุขภาพแห่งชาติ <br>
            พ.ศ. ๒๕๖๒
        </p><br>
        <div class="text-right">
        วันที่ {{ $member->created_at->format('d') }} เดือน {{ $member->created_at->format('m') }} พ.ศ.{{ $member->created_at->addYears(543)->format('Y') }}

        </div>
        <br>
        <div>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ข้าพเจ้า นาย/นาง/นางสาว <div class="box-input" style="width:450px;">{{ $member->nameTitle }} {{ $member->firstname }}  {{ $member->lastname }}</div> <br>
            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;มีความประสงค์จะสมัครเข้ารับการเลือกเป็นกรรมการสุขภาพแห่งชาติ  จึงขอส่งใบสมัครของข้าพเจ้ามายังประธานคณะกรรมการสรรหา
        </div>
        <div class="head">
            ส่วนที่  ๑	คุณสมบัติ
        </div>
        <p>
            ข้าพเจ้าเป็นผู้มีคุณสมบัติของผู้แทนองค์กรปกครองส่วนท้องถิ่นที่จะเข้ารับการเลือกเป็นกรรมการสุขภาพแห่งชาติครบถ้วน  ดังนี้ <br>
            <ul>
                <li>
                    ๑.  คุณสมบัติ
                    <ul>
                        <li>๑) <i class="fa fa-check-square"></i> มีสัญชาติไทย</li>
                        <li>๒) <i class="fa fa-check-square"></i> มีอายุไม่ต่ำกว่ายี่สิบปีบริบูรณ์ ณ วันที่สมัคร</li>
                        <li>๓) <i class="fa fa-check-square"></i> ไม่เป็นคนไร้ความสามารถหรือคนเสมือนไร้ความสามารถ</li>
                        <li>๔) <i class="fa fa-check-square"></i> ไม่ติดยาเสพติดให้โทษ</li>
                        <li>๕) <i class="fa fa-check-square"></i> ไม่เคยถูกลงโทษไล่ออก ปลดออก เลิกจ้าง หรือพ้นจากตำแหน่ง เพราะเหตุจากการทุจริตหรือประพฤติมิชอบ</li>
                        <li>๖) <i class="fa fa-check-square"></i> ไม่เคยได้รับโทษจำคุกโดยคำพิพากษาถึงที่สุดให้จำคุก ไม่ว่าจะถูกจำคุกจริงหรือไม่ก็ตาม เว้นแต่เป็นโทษ
                            สำหรับความผิดที่ได้กระทำโดยประมาทหรือความผิดลหุโทษ</li>
                        </ul>
                    </li>
                </li>
            </ul>
        </p>
        <div class="head">
            ส่วนที่  ๒	การแสดงเจตนาสมัครเข้ากลุ่ม
        </div>
        <p>
            ข้าพเจ้ามีความประสงค์ที่จะสมัครเป็นกรรมการสุขภาพแห่งชาติจากผู้แทนองค์กรปกครองส่วนท้องถิ่นในกลุ่ม <br>
            <ul>
                @foreach(DB::table('organization_groups')->get() as $key => $group)
                @if($member->organizationGroupId == $group->id)
                <li><i class="fa fa-check-square"></i> {{ $group->groupName }}</li>
                @else
                <li>  {{ $group->groupName }}</li>
                @endif
                @endforeach
            </ul>

            หมายเหตุ   ผู้สมัครผู้แทนองค์กรปกครองส่วนท้องถิ่นสามารถสมัครได้กลุ่มใดกลุ่มหนึ่งใน ๓ กลุ่มนี้ เท่านั้น
        </p>

        <div class="head">
            ส่วนที่  ๓	ข้อมูลยืนยันตัวตนของผู้สมัคร เพื่อเข้าสู่ระบบการสรรหากรรมการสุขภาพแห่งชาติแบบอิเล็กทรอนิกส์
        </div>
        <p>
            ๑.  เลขที่บัตรประจำตัวข้าราชการ
            <div class="" style="padding:0px 15pt;height:20pt;">
                &nbsp;
                @php
                    $idCardArray = $member->officialId;
                @endphp
                @for($i = 0 ; $i < strlen($idCardArray) ; $i ++)
                <div style="display:inline-block;padding:0px 15px;border:1px solid #000">{{$idCardArray[$i]}}</div>
                @endfor

            </div>
        </p>
        <p>
            ๒. อีเมล (Email)
            <div class="border-dot" style="border-bottom:1px dotted #ccc;padding-bottom:8px; padding-top:0px">
                    {{ $member->email }}
            </div>
        </p>
        <p>
            รหัสผ่าน (Password)
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
                        <li>๑. กรุณากำหนดรหัสผ่าน (Password) ของท่านเพื่อยืนยันตัวตนเข้าสู่ระบบสมัคร </li>
                        <li>๒. กำหนดรหัสผ่าน (Password) เป็นตัวอักษรภาษาอังกฤษ และมีตัวเลขด้วย รวมกันจำนวน ๘ ตัวอักษร</li>
                    </ul>
                </li>
            </ul>
        </p>

        <div class="head">
            ส่วนที่  ๔	ข้อมูลประวัติ
        </div>
        <p>
            <ul>
                <li>
                    ๑.  ข้อมูลทั่วไป
                    <ul>
                        <li>
                            ๑) คำนำหน้าชื่อ <div class="box-input" style="width:500px;">{{ $member->nameTitle }}</div><br>
                            ชื่อ<div class="box-input" style="width:260px;">{{ $member->firstname }}</div>
                            นามสกุล<div class="box-input" style="width:260px;">{{ $member->lastname }}</div>
                        </li>
                        <li>๒) เกิดวันที่<div class="box-input" style="width:100px;">{{ Carbon\Carbon::parse($member->detail->dateOfBirth)->format('d') }}</div>
                            เดือน<div class="box-input" style="width:150px;">{{ Carbon\Carbon::parse($member->detail->dateOfBirth)->format('m') }}</div>
                            พ.ศ<div class="box-input" style="width:100px;">{{ Carbon\Carbon::parse($member->detail->dateOfBirth)->addYears('543')->format('Y') }}</div>
                            อายุ<div class="box-input" style="width:80px;">
                                    @php
                                    $yearold = Carbon\Carbon::parse($member->detail->dateOfBirth)->format('Y');
                                    $now = now()->format('Y');
                                    echo ($now - $yearold);
                                    @endphp
                            </div>ปี
                        </li>
                        <li>๓) เพศ
                            <div style="display:inline-block;padding:0px 6px;line-height: 0.6;border:1px solid #000">{!! $member->detail->genderId == 1 ? '/' :'&nbsp;' !!}</div> ชาย
                            <div style="display:inline-block;padding:0px 6px;line-height: 0.6;border:1px solid #000">{!! $member->detail->genderId == 2 ? '/' :'&nbsp;' !!}</div>  หญิง
                            <div style="display:inline-block;padding:0px 6px;line-height: 0.6;border:1px solid #000">{!! $member->detail->genderId == 3 ? '/' :'&nbsp;' !!}</div> นักบวช/สมณะเพศ
                        </li>
                        <li>๔)	สถานที่ที่สามารถติดต่อได้สะดวก <br>
                            <div style="display:inline-block;padding:0px 6px;line-height: 0.6;border:1px solid #000">{!! $member->detail->addressType == 1 ? '/' :'&nbsp;' !!}</div>  บ้าน
                            <div style="display:inline-block;padding:0px 6px;line-height: 0.6;border:1px solid #000">{!! $member->detail->addressType == 2 ? '/' :'&nbsp;' !!}</div>  ที่ทำงาน
                            <div class="box-input" style="width:490px;">{{ $member->detail->workPlaceName }}</div><br>
                            เลขที่<div class="box-input" style="width:100px;">{{ $member->detail->no }}</div>
                            หมู่ที<div class="box-input" style="width:100px;">{{ $member->detail->moo }}</div>
                            ตรอก/ซอย<div class="box-input" style="width:240px;">{{ $member->detail->soi }}</div>
                            <br>
                            ถนน<div class="box-input" style="width:245px;">{{ $member->detail->street }}</div>
                            ตำบล/แขวง<div class="box-input" style="width:245px;">{{ @$member->detail->subdistrict->district }}</div>
                            <br>
                            อำเภอ/เขต<div class="box-input" style="width:125px;">{{ @$member->detail->district->amphoe }}</div>
                            จังหวัด<div class="box-input" style="width:125px;">{{ @$member->detail->province->province }}</div>
                            รหัสไปรษณีย์<div class="box-input" style="width:125px;">{{ $member->detail->zipCode }}</div>

                            <br>โทรศัพท์<div class="box-input" style="width:200px;">{{ $member->detail->tel }}</div>
                            โทรศัพท์เคลื่อนที่{{" (มือถือ)"}}<div class="box-input" style="width:200px;">{{ $member->detail->mobile }}</div>
                        </li>
                    </ul>
                </li>

                <li>
                    ๒.  ประวัติการศึกษา
                    <div style="padding-left:30px; margin-bottom:15px;">
                            @if($member->detail->graduated2!=null)
                                <strong>๑) <div class="box-input" style="width:335px;">{{ $member->detail->graduated1 }}</div></strong>
                                <strong>สาขา <div class="box-input" style="width:270px;">{{ $member->detail->faculty1 }}</div></strong>
                            @else
                                <strong>๑) <span style="border-bottom:1px dotted #006600; width: 335px; display:inline-block">&nbsp</span></strong>
                                <strong>สาขา <span style="border-bottom:1px dotted #006600; width: 270px; display:inline-block">&nbsp</span></strong>
                            @endif
                            <br>
                            @if($member->detail->graduated2!=null)
                                <strong>๒) <div class="box-input" style="width:335px;">{{ $member->detail->graduated2 }}</div></strong>
                                <strong>สาขา <div class="box-input" style="width:270px;">{{ $member->detail->faculty2 }}</div></strong>
                            @else
                                <strong>๒) <span style="border-bottom:1px dotted #006600; width: 335px; display:inline-block">&nbsp</span></strong>
                                <strong>สาขา <span style="border-bottom:1px dotted #006600; width: 270px; display:inline-block">&nbsp</span></strong>
                            @endif
                            <br>
                            @if($member->detail->graduated3!=null)
                                <strong>๓) <div class="box-input" style="width:335px;">{{ $member->detail->graduated3 }}</div></strong>
                                <strong>สาขา <div class="box-input" style="width:270px;">{{ $member->detail->faculty3 }}</div></strong>
                            @else
                                <strong>๓) <span style="border-bottom:1px dotted #006600; width: 335px; display:inline-block">&nbsp</span></strong>
                                <strong>สาขา <span style="border-bottom:1px dotted #006600; width: 270px; display:inline-block">&nbsp</span></strong>
                            @endif
                            <br>
                            @if($member->detail->graduated4!=null)
                                <strong>๔) <div class="box-input" style="width:335px;">{{ $member->detail->graduated4 }}</div></strong>
                                <strong>สาขา <div class="box-input" style="width:270px;">{{ $member->detail->faculty4 }}</div></strong>

                            @else
                                <strong>๔) <span style="border-bottom:1px dotted #006600; width: 335px; display:inline-block">&nbsp</span></strong>
                                <strong>สาขา <span style="border-bottom:1px dotted #006600; width: 270px; display:inline-block">&nbsp</span></strong>
                            @endif
                            <br>
                            @if($member->detail->graduated5!=null)
                                <strong>๕) <div class="box-input" style="width:335px;">{{ $member->detail->graduated5 }}</div></strong>
                                <strong>สาขา <div class="box-input" style="width:270px;">{{ $member->detail->faculty5 }}</div></strong>

                            @else
                                <strong>๕) <span style="border-bottom:1px dotted #006600; width: 335px; display:inline-block">&nbsp</span></strong>
                                <strong>สาขา <span style="border-bottom:1px dotted #006600; width: 270px; display:inline-block">&nbsp</span></strong>
                            @endif
                            <br>
                      </div>
                </li>

                <li>
                    ๓.  ผลงาน หรือประสบการณ์ที่ดำเนินงานเกี่ยวกับด้านสุขภาพ
                    <ul>
                            <li>
                                <div class="box-input" style="width:565px;">&nbsp;{{ $member->detail->portfolio }}</div>
                            </li>
                    </ul>
                </li><br>

                <li>
                    ๔.  ประวัติการทำงานในองค์กรปกครองส่วนท้องถิ่น  (โปรดระบุเฉพาะหน้าที่ที่สำคัญ)
                <li>
                    <table style="width:100%" border="1">
                            <tr>
                                <th style="width :50px">ลำดับ</th>
                                <th>ปฏิบัติหน้าที่</th>
                                <th>องค์กร</th>
                                <th style="width :150px">ระยะเวลา
                                        การปฏิบัติหน้าที่
                                </th>
                            </tr>
                            <tr>
                                <td class="text-center">๑</td>
                                <td>&nbsp;{{ $member->detail->pastWork1 }}</td>
                                <td>&nbsp;{{ $member->detail->pastOrganization1 }}</td>
                                <td>&nbsp;{{ $member->detail->time1 }}</td>
                            </tr>
                            <tr>
                                <td class="text-center">๒</td>
                                <td>&nbsp;{{ $member->detail->pastWork2 }}</td>
                                <td>&nbsp;{{ $member->detail->pastOrganization2 }}</td>
                                <td>&nbsp;{{ $member->detail->time2 }}</td>
                            </tr>
                            <tr>
                                <td class="text-center">๓</td>
                                <td>&nbsp;{{ $member->detail->pastWork3 }}</td>
                                <td>&nbsp;{{ $member->detail->pastOrganization3 }}</td>
                                <td>&nbsp;{{ $member->detail->time3 }}</td>
                            </tr>
                    </table>
                </li><br>
                <li>
                    ๕.  วาระการดำรงตำแหน่งในองค์กรปกครองส่วนท้องถิ่น (ปัจจุบัน)
                    <div style="padding-left:30px; margin-bottom:15px;">
                        <strong>๑) เริ่มตั้งแต่ <div class="box-input" style="width:200px;">{{ $member->detail->startDate }}</div></strong>
                        {{-- <strong>จังหวัด <div class="box-input" style="width:270px;">{{ $member->detail->faculty1 }}</div></strong> --}}
                    </div>
                    <div style="padding-left:30px; margin-bottom:15px;">
                        <strong>๒) หมดวาระ <div class="box-input" style="width:200px;">{{ $member->detail->endDate }}</div></strong>
                        {{-- <strong>จังหวัด <div class="box-input" style="width:270px;">{{ $member->detail->faculty1 }}</div></strong> --}}
                    </div>
                </li><br>
            </ul>
        </p>
        <div class="head">
            ส่วนที่ ๕  วิสัยทัศน์ของข้าพเจ้าต่อการพัฒนาระบบสุขภาพแห่งชาติ
        </div>
        <p></p>
        <p>
            ทั้งนี้  ข้าพเจ้าได้แนบสำเนาเอกสารหรือหลักฐานที่แนบมาพร้อมใบสมัคร <br>
            <ul>
                <li><i class="fa fa-check-square"></i> 	สำเนาบัตรประจำตัวข้าราชการที่แสดงการดำรงตำแหน่งนายกองค์กรปกครองส่วนท้องถิ่นอยู่  ณ วันที่ยื่นใบสมัคร </li>
                @if(!empty($member->attach()->where('status',1)->where('use_is','government_official_card')->first()->path))
                    <div class="d-flex justify-content-center">
                        <img class="img-responsive" src="{{ asset($member->attach()->where('status',1)->where('use_is','government_official_card')->first()->path)}}">
                    </div>
                @endif
                <li><i class="fa fa-check-square"></i> 	รูปถ่ายหน้าตรงไม่สวมหมวก ไม่สวมแว่นตาดำ ขนาด  ๒  นิ้ว ถ่ายมาแล้วไม่เกิน  ๖  เดือน</li>

                {{-- <li><i class="fa fa-check-square"></i>  แบบ สช./แบบขอขึ้นทะเบียนองค์กรปกครองส่วนท้องถิ่น/๒๕๖๒ พร้อมเอกสารหลักฐานประกอบ ๑ ชุด </li>
                @if(!empty($member->attach()->where('status',1)->where('use_is','document1')->first()->path))
                    <div class="d-flex justify-content-center">
                        <img class="img-responsive" src="{{ asset($member->attach()->where('status',1)->where('use_is','document1')->first()->path)}}">
                    </div>
                @endif --}}

            </ul><br>
&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-check-square"></i> ข้าพเจ้าขอรับรองว่าข้อมูลที่กรอกข้างต้น  และเอกสารที่แนบมาพร้อมใบสมัครเป็นความจริงทุกประการ  หากมีข้อมูลใดเป็นเท็จหรือไม่ตรงกับความเป็นจริง  ข้าพเจ้ายินยอมให้ถูกตัดสิทธิ์จากการเป็นผู้สมัครหรือผู้ถูกเสนอชื่อในครั้งนี้<br>
        </p>

        <div class="form-group">
            <a data-toggle="modal" id="gotomodal" href="#m-editstatus" style="display: none;"> test </a>

            <form id="frmstatuschange" method="GET" action="{{url('backend/check/editstatusOr')}}">
                {{ csrf_field() }}
                <select data-default="{{$member->detail->statusId}}" name="txtstatuschange[]" class="form-control bg-warning" style="font-size: 15pt; height:1cm;" onchange="editstatus(0,this);" @if($member->detail->fixStatus==1) disabled="disabled" @endif>
                    @foreach ($liststatus as $valstatus)
                    <option @if($member->detail->statusId == $valstatus->id) selected @endif
                    value={{$valstatus->id}}>{{$valstatus->status}}</option>
                    @endforeach
                </select>
                <input type="hidden" name="Hid[]" id="Hid" value={{$member->id}}>
            </form>

            {{--  //modal สถานะไม่ผ่าน  --}}
            <form name"frmnotpass[]" method="GET" action="{{url('backend/check/editnotpassOr')}}">
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
        </div>

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
        font-family: "THBaijam";
        color:#549733;
        font-size: 16pt;
    }
    .text-center{
        text-align: center;
    }
    .text-right{
        text-align: right;
    }
    .h1{
        font-size: 18pt;
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

    img { float:right; margin:10px; object-fit: cover;}

</style>
@endsection
