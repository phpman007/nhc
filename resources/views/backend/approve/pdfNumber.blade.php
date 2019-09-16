<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    {{-- @include('components.font-face-th-saraban') --}}
    <style>
        @font-face {
            font-family: 'THSarabunPSK';
            font-style: normal;
            font-weight: normal;
            src: url("{{ ('backend/fonts/THSarabunPSK.ttf') }}") format('truetype');
        }

        body {
            font-family: "THSarabunPSK";
            font-size: 18pt;
        }

        .whatever { page-break-after: always; }

        img { float:right; margin:10px; object-fit: cover; }

        .wordwrap {
            white-space: pre-wrap;      /* CSS3 */
            white-space: -moz-pre-wrap; /* Firefox */
            white-space: -pre-wrap;     /* Opera <7 */
            white-space: -o-pre-wrap;   /* Opera 7 */
            word-wrap: break-word;      /* IE */
        }

        table.fixed { table-layout:fixed; }
        table.fixed td { overflow: hidden; }

    </style>

</head>
<body>
@if(count($list)>0)
@foreach($list as $key => $val)

    {{-- @php
    $path=$val->attach()->where('status',1)->where('use_is','personal_photo')->first()->path;
    $type=$val->attach()->where('status',1)->where('use_is','personal_photo')->first()->type;
    if($type=="pdf"){
        //exec('convert "'.public_path($path).'" -colorspace RGB -resize 800 "'.public_path("uploads\proffessional\AAA.jpg"), $output, $return_var);

        $a=1;
    }else{
        $a=2;
        $output="";
        $return_var="";
    }

    @endphp --}}

    {{--  output = {{$output}} returna = {{$return_var}}  --}}
    <table style="float:right;">
        <tr><td>
        @php
            $listpic=DB::table('attach_files')
            ->where('member_id',$val->id)
            ->where('status',1)
            ->where('use_is','personal_photo')
            ->select('path')
            ->first();
        @endphp


        <img src="{{ public_path($listpic->path) }}" style="height:2.3in; width:2in">

        {{--  <embed type="application/pdf" src="{{ public_path($path) }}">  --}}
        {{--  <iframe src="{{ public_path($path) }}" style="height:2.0in; width:1.9in "></iframe>  --}}
        </td></tr>
        <tr align="center"><td>
            <br><br><br><br><br><br><br><br><span style="font-size: 25pt; color:blue;">หมายเลข {{$val->candidateNumber}}</span>
        </td></tr>
    </table>

    <span style="font-size: 25pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    {{$key+1}}. {{$val->nameTitle}}{{$val->firstname}}&nbsp;&nbsp;{{$val->lastname}}</span>
    <br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    ชื่อ-นามสกุล&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    {{$val->nameTitle}}{{$val->firstname}}&nbsp;&nbsp;{{$val->lastname}}
    <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    ตำแหน่ง&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    {{$val->nowWork}}
    <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    สถานที่ติดต่อ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    @if (!empty($val->workPlaceName))
        {{$val->workPlaceName}}
    <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    @endif
    @if($val->no !=NULL )เลขที่ {{$val->no}}@endif
    @if($val->moo != NULL or $val->moo == "-" )หมู่ {{$val->moo}}@endif
    @if($val->soi !=NULL )ซอย {{$val->soi}}@endif
    <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    @if($val->street !=NULL )ถนน{{$val->street}}@endif
    <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    {{--  {{ @ $val->province}}  --}}
    @if($val->district !=NULL )@if($val->province != "กรุงเทพมหานคร") ตำบล@else แขวง@endif{{ @ $val->district}}@endif &nbsp;&nbsp;
    @if($val->amphoe !=NULL )@if($val->province != "กรุงเทพมหานคร") อำเภอ@else เขต@endif{{ @ $val->amphoe}}@endif &nbsp;&nbsp;
    <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    @if($val->province !=NULL ) @if($val->province != "กรุงเทพมหานคร") จังหวัด@endif{{ @ $val->province}}@endif

    @if($val->zipCode !=NULL )รหัสไปรษณีย์ {{ @ $val->zipCode}}@endif
    <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    @if($val->tel !=NULL )เบอร์โทรศัพท์ที่ 1 {{ @ $val->tel}}@endif &nbsp;&nbsp;
    @if($val->mobile !=NULL )เบอร์โทรศัพท์ที่ 2 {{ @ $val->mobile}}@endif
    <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    การดำรงตำแหน่งปัจจุบันใน{{ @ $val->nowWorkPlace}}
    <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    วันที่ดำรงตำแหน่ง&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    @if($val->startDate!="0000-00-00") {{ @ Carbon\Carbon::parse($val->startDate)->format('d') }} เดือน{{ Helper::monthThai( Carbon\Carbon::parse($val->startDate)->format('m')) }} พ.ศ.{{ @ Carbon\Carbon::parse($val->startDate)->addYears('543')->format('Y') }} @endif
    <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    วันที่หมดวาระ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    @if($val->endDate!="0000-00-00") {{ @ Carbon\Carbon::parse($val->endDate)->format('d') }} เดือน{{ Helper::monthThai( Carbon\Carbon::parse($val->endDate)->format('m')) }} พ.ศ.{{ @ Carbon\Carbon::parse($val->endDate)->addYears('543')->format('Y') }} @endif

    @php
        $yearold = @ Carbon\Carbon::parse($val->dateOfBirth)->format('Y');
        $now = now()->format('Y');
        $age = $now - $yearold;

        $optionsArray = ["ปริญญาเอก", "ปริญญาโท", "ปริญญาตรี", "ต่ำกว่าปริญญาตรี", 'อื่นๆ'];
    @endphp

    <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    วัน/เดือน/ปี เกิด&nbsp;&nbsp; วันที่ {{ @ Carbon\Carbon::parse($val->dateOfBirth)->format('d') }} เดือน{{ Helper::monthThai( Carbon\Carbon::parse($val->dateOfBirth)->format('m')) }} พ.ศ.{{ @ Carbon\Carbon::parse($val->dateOfBirth)->addYears('543')->format('Y') }} &nbsp;&nbsp; อายุ &nbsp;&nbsp;{{$age}}&nbsp;&nbsp; ปี
    <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    วุฒิการศึกษา
    @for($i=1;$i<6;$i++)
        @php $a="graduated".$i; $b="faculty".$i;  @endphp
        @if($val->$a != NULL)
            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            {{$i}}. {{ $optionsArray[$val->$a]}} &nbsp;&nbsp;สาขา &nbsp;&nbsp;{{ $val->$b}}
        @endif
    @endfor

    <div class="whatever"></div>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ประวัติการทำงาน
    <table width="19cm !important" style="border:1px solid blue; border-collapse: collapse;" class="fixed" cellpadding="10px">
        <tr align="center" bgcolor="lightblue">
            <td width="8%" style="border:1px solid blue;" class="fixed">ลำดับ</td>
            <td width="42%"style="border:1px solid blue;">ตำแหน่ง</td>
            <td width="30%" style="border:1px solid blue;">หน่วยงาน</td>
            <td width="20%" width="5%" style="border:1px solid blue;">ระยะเวลา<br>ดำรงตำแหน่ง</td>
        </tr>
        <tr valign="top">
            <td align="center" style="border:1px solid blue;">1</td>
            <td style="border:1px solid blue;" class="wordwrap">{{$val->nowRole}}</td>
            <td style="border:1px solid blue;" class="wordwrap">{{$val->nowWorkPlace}}</td>
            <td  align="center" style="border:1px solid blue;" class="wordwrap">
                @if($val->startDate!="0000-00-00") {{ @ Carbon\Carbon::parse($val->startDate)->format('d') }} เดือน{{ Helper::monthThai( Carbon\Carbon::parse($val->startDate)->format('m')) }} พ.ศ.{{ @ Carbon\Carbon::parse($val->startDate)->addYears('543')->format('Y') }} @endif
                @if($val->endDate!="0000-00-00") <br>-<br> {{ @ Carbon\Carbon::parse($val->endDate)->format('d') }} เดือน{{ Helper::monthThai( Carbon\Carbon::parse($val->endDate)->format('m')) }} พ.ศ.{{ @ Carbon\Carbon::parse($val->endDate)->addYears('543')->format('Y') }} @endif
            </td>
        </tr>
        <tr valign="top">
            <td align="center" style="border:1px solid blue;">2</td>
            <td style="border:1px solid blue;" class="wordwrap">{{$val->pastWork1}}</td>
            <td style="border:1px solid blue;" class="wordwrap">{{$val->pastOrganization1}}</td>
            <td align="center" style="border:1px solid blue;" class="wordwrap">@if($val->time1!=NULL) {{ str_replace("ปี","",$val->time1) }}  ปี @endif</td>
        </tr>
        <tr valign="top">
            <td align="center" style="border:1px solid blue;">3</td>
            <td style="border:1px solid blue;" class="wordwrap">{{$val->pastWork2}}</td>
            <td style="border:1px solid blue;" class="wordwrap">{{$val->pastOrganization2}}</td>
            <td align="center" style="border:1px solid blue;" class="wordwrap">@if($val->time2!=NULL) {{ str_replace("ปี","",$val->time2) }}  ปี @endif</td>
        </tr>
        <tr valign="top">
            <td align="center" style="border:1px solid blue;">4</td>
            <td style="border:1px solid blue;" class="wordwrap">{{$val->pastWork3}}</td>
            <td style="border:1px solid blue;" class="wordwrap">{{$val->pastOrganization3}}</td>
            <td align="center" style="border:1px solid blue;" class="wordwrap">@if($val->time3!=NULL) {{ str_replace("ปี","",$val->time3) }}  ปี @endif</td>
        </tr>
    </table>
    <div class="whatever"></div>
    <table width="19cm" align="center" style="border:3px solid blue;" class="fixed" cellpadding="10px">
        <tr><td>
                <div style="color:blue; font-size: 18pt; text-align:center;" class="wordwrap">วิสัยทัศน์ของข้าพเจ้าต่อการพัฒนาระบบสุขภาพแห่งชาติ และสิ่งที่คาดหวังว่าจะทำในบทบาทกรรมการสุขภาพแห่งชาติ</div>

                <div style="font-size: 16pt;" class="wordwrap"><br>{{ $val->vision }}</div>

        </td></tr>
    </table>

    {{--  ข้อมูลสมัคร{{$groupname}}
    @if(!empty($val->attach()->where('status',1)->where('use_is','personal_photo')->where('type','jpg')->first()->path))
        @php $path=$val->attach()->where('status',1)->where('use_is','personal_photo')->where('type','jpg')->first()->path; @endphp

        <br><br><br>
        <table width="100%">
            <tr>
                <td width="50%"></td>
                <td align="right"><img src={{$path}} style="height:2.0in; width:1.9in"><td>
            </tr>
        </table>
    @endif

    @php
        $yearold = @ Carbon\Carbon::parse($val->detail->dateOfBirth)->format('Y');
        $now = now()->format('Y');
        $age = $now - $yearold;

        $optionsArray = ["ปริญญาเอก", "ปริญญาโท", "ปริญญาตรี", "ต่ำกว่าปริญญาตรี", 'อื่นๆ'];
    @endphp
        <br>หมายเลขเลือกตั้ง {{$val->candidateNumber}}
        <br>ชื่อ-นามสกุล {{$val->nameTitle}}{{$val->firstname}}  {{$val->lastname}}
        <br>อายุ {{$age}} ปี
        <br>ประวัติการศึกษา
        <br>1) {{ @ $optionsArray[$val->detail->graduated1]}} {{ @ $val->detail->faculty1}}
        <br>2) {{ @ $optionsArray[$val->detail->graduated2]}} {{ @ $val->detail->faculty2}}
        <br>3) {{ @ $optionsArray[$val->detail->graduated3]}} {{ @ $val->detail->faculty3}}
        <br>4) {{ @ $optionsArray[$val->detail->graduated4]}} {{ @ $val->detail->faculty4}}
        <br>5) {{ @ $optionsArray[$val->detail->graduated5]}} {{ @ $val->detail->faculty5}}
        <br>
        <br>ประวัติการทำงาน
        <br>หน้าที่การงานและความรับผิดชอบในปัจจุบัน
        <br>ปัจจุบันปฏิบัติหน้าที่ {{ @ $val->detail->nowWork }}
        <br>สถานที่ปฏิบัติงาน {{ @ $val->detail->nowWorkPlace }}
        <br>งานในความรับผิดชอบ {{ @ $val->detail->nowRole }}
        <br>
        <br>การปฏิบัติหน้าที่ในอดีต
        <br>ลำดับ 1
        <br>ปฏิบัติหน้าที่ {{ @ $member->detail->pastWork1 }}
        <br>องค์กร {{ @ $member->detail->pastOrganization1 }}
        <br>ระยะเวลาการปฏิบัติหน้าที่ {{ @ $member->detail->time1 }} ปี
        <br>
        <br>ลำดับ 2
        <br>ปฏิบัติหน้าที่ {{ @ $member->detail->pastWork2 }}
        <br>องค์กร {{ @ $member->detail->pastOrganization2 }}
        <br>ระยะเวลาการปฏิบัติหน้าที่ {{ @ $member->detail->time2 }} ปี
        <br>
        <br>ลำดับ 3
        <br>ปฏิบัติหน้าที่ {{ @ $member->detail->pastWork3 }}
        <br>องค์กร {{ @ $member->detail->pastOrganization3 }}
        <br>ระยะเวลาการปฏิบัติหน้าที่ {{ @ $member->detail->time3 }} ปี
        <hr>
        {{--  ขึ้นหน้าใหม่  --}}

        @if($key+1 < count($list) )
        <div class="whatever"></div>
        @endif

@endforeach
@endif
        {{-- <img style="height:1.6in; width:1.34in" src="{{ public_path('frontend/images/logo-pdf.jpg') }}" alt=""> --}}
{{-- <font size="5">หมายเลขเลือกตั้ง ผู้สมัครผู้ทรงคุณวุฒิ {{$groupname}}</font>
<br><br>
<table  border="1" bordercolor="black" cellspacing="0" width="100%">
    <tr align="center">
        <td>หมายเลขเลือกตั้ง</td>
        <td>ชื่อผู้สมัคร</td>
    </tr>
    @foreach($list as $val)
        <tr>
            <td align="center">{{$val->candidateNumber}}</td>
            <td>{{$val->nameTitle}}{{$val->firstname}}  {{$val->lastname}}</td>
        </tr>
    @endforeach
</table> --}}

</body>
</html>
