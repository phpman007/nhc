@php
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=แสดงข้อมูลการสมัคร ผู้ทรงคุณวุฒิ".date('Y-m-d-His').".xls");
	//header("content-type: text charset=tis-620");
@endphp
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<style>

    body, table {
        font-family: "TH SarabunPSK";
        font-size: 16pt;
    }
</style>

</head>
<body>
<div><h2>แสดงข้อมูลการสมัคร ผู้ทรงคุณวุฒิ</h2></div>
        <table border="1" bordercolor="black" cellspacing="0">
            <tr align="middle">
                <th>ลำดับ</th>
                <th>รหัสผู้สมัคร</th>
                <th>ชื่อ - สกุล</th>
                <th>เลขบัตรประชาชน</th>
                <th>หมายเลขโทรศัพท์</th>
                <th>กลุ่มย่อย</th>
                <th>วันที่สมัคร</th>
                <th>วันที่เข้าระบบครั้งสุดท้าย</th>
                <th>ขั้นตอนล่าสุด</th>
                <th>สำเนาบัตรประจำตัวประชาชน</th>
                <th>รูปถ่ายหน้าตรง</th>
                <th>เอกสารสรุปผลงานอันเป็นที่ประจักษ์</th>
            </tr>
             @foreach ($listmember as $key=>$valmember)

                <tr valign="top">
                <td align="middle">
                    @if (!empty($_GET['page']))
                        {{ $key + ($_GET['page'] - 1) * $listmember->PerPage() + 1  }}
                    @else
                        {{$key + 1}}
                    @endif
                </td>
                <td align="middle">{{$valmember->docId}}</td>
                <td align="middle">{{$valmember->nameTitle}}{{$valmember->firstname}}  {{$valmember->lastname}}</td>
                {{--  <td align="middle">{{$valmember->personalId}} <font color="white">{{ "." }}</font></td>  --}}
                <td align="middle">{{$valmember->personalId}}&nbsp;</td>
                <td align="middle">{{$valmember->tel}}&nbsp;<br>{{$valmember->mobile}}&nbsp;</td>
                <td align="middle">{{$valmember->groupName}}</td>
                <td align="middle">{{ \Carbon\Carbon::parse($valmember->created_at)->addYears(543)->format('d/m/Y H:i:s') }}</td>
                <td align="middle">{{ \Carbon\Carbon::parse($valmember->updated_at)->addYears(543)->format('d/m/Y H:i:s') }}</td>
                <td align="middle">{{$valmember->last_step}}</td>

                @php
                    $list1=DB::table('members')
                    ->join('attach_files','members.id','=','attach_files.member_id')
                    ->where('attach_files.member_id',$valmember->id)
                    ->where('use_is','=','copy_personal_card')
                    ->get();
                @endphp

                @if($list1->isEmpty())
                    <td align="middle" style="color:red;">ไม่มี</td>
                @else
                    @if(count($list1)>0)
                        <td align="middle"> มี </td>
                    @else
                        <td align="middle" style="color:red;">ไม่มี</td>
                    @endif
                @endif

                @php
                    $list2=DB::table('members')
                    ->join('attach_files','members.id','=','attach_files.member_id')
                    ->where('attach_files.member_id',$valmember->id)
                    ->where('use_is','=','personal_photo')
                    ->get();
                @endphp

                @if($list2->isEmpty())
                    <td align="middle" style="color:red;">ไม่มี</td>
                @else
                    @if(count($list2)>0)
                        <td align="middle"> มี </td>
                    @else
                        <td align="middle" style="color:red;">ไม่มี</td>
                    @endif
                @endif

                @php
                    $list3=DB::table('members')
                    ->join('attach_files','members.id','=','attach_files.member_id')
                    ->where('attach_files.member_id',$valmember->id)
                    ->where('use_is','=','document1')
                    ->get();
                @endphp

                @if($list3->isEmpty())
                    <td align="middle" style="color:red;">ไม่มี</td>
                @else
                    @if(count($list3)>0)
                        <td align="middle"> มี </td>
                    @else
                        <td align="middle" style="color:red;">ไม่มี</td>
                    @endif
                @endif

            </tr>
            @endforeach
        </table>
</body>
</html>
