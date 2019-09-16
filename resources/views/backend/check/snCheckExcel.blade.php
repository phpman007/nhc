@php

header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=ตรวจสอบหลักฐานผู้ทรงคุณวุฒิ".date('Y-m-d-His').".xls");
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
<div><h2>ตรวจสอบหลักฐาน ผู้ทรงคุณวุฒิ</h2></div>
        <table border="1" bordercolor="black" cellspacing="0">
            <tr align="middle">
                <th>ลำดับ</th>
                <th>รหัสผู้สมัคร</th>
                <th>ชื่อ - สกุล</th>
                <th>เลขบัตรประชาชน</th>
                <th>กลุ่มย่อย</th>
                <th>จังหวัด</th>
                <th>สถานะ</th>
                <th>วันที่ยืนยันการสมัคร</th>
                <th>เหตุผลไม่ผ่าน</th>
                <th>ผู้ที่ตรวจสอบ</th>
                {{-- <th>วันเวลาที่ตรวจสอบ</th> --}}
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
                <td align="middle">{{$valmember->personalId}}&nbsp;</font></td>
                <td>{{$valmember->groupName}}</td>
                <td align="middle">{{$valmember->province}}</td>

                {{--  @if ($valmember->status=="รอการตรวจสอบคุณสมบัติ")
                    <td align="middle">ผู้สมัครไม่ถึง 10 คน</td>
                @else
                    <td align="middle">{{$valmember->status}}</td>
                @endif  --}}

                @if($valmember->seniorGroupId==1)
                    @if($countmember1 < 10)
                        <td align="middle">ผู้สมัครไม่ถึง 10 คน</td>
                    @else
                        <td align="middle">{{$valmember->status}}</td>
                    @endif
                @elseif($valmember->seniorGroupId==2)
                    @if($countmember2 < 10)
                    <td align="middle">ผู้สมัครไม่ถึง 10 คน</td>
                    @else
                        <td align="middle">{{$valmember->status}}</td>
                    @endif
                @elseif($valmember->seniorGroupId==3)
                    @if($countmember3 < 10)
                    <td align="middle">ผู้สมัครไม่ถึง 10 คน</td>
                    @else
                        <td align="middle">{{$valmember->status}}</td>
                    @endif
                @elseif($valmember->seniorGroupId==4)
                    @if($countmember4 < 10)
                    <td align="middle">ผู้สมัครไม่ถึง 10 คน</td>
                    @else
                        <td align="middle">{{$valmember->status}}</td>
                    @endif
                @elseif($valmember->seniorGroupId==5)
                    @if($countmember5 < 10)
                    <td align="middle">ผู้สมัครไม่ถึง 10 คน</td>
                    @else
                        <td align="middle">{{$valmember->status}}</td>
                    @endif
                @elseif($valmember->seniorGroupId==6)
                    @if($countmember6 < 10)
                    <td align="middle">ผู้สมัครไม่ถึง 10 คน</td>
                    @else
                        <td align="middle">{{$valmember->status}}</td>
                    @endif

                @endif

                @if(!empty($valmember->confirmed_at))
                    <td>{{ \Carbon\Carbon::parse($valmember->confirmed_at)->addYears(543)->format('d/m/Y H:i:s') }}</td>
                @else
                    <td>{{ \Carbon\Carbon::parse($valmember->updated_at)->addYears(543)->format('d/m/Y H:i:s') }}</td>
                @endif

                @if(!empty($valmember->reason))
                    <td align="middle">{{ $valmember->reason }}</td>
                @else
                    <td align="middle"> ไม่มีข้อมูล </td>
                @endif

                @if(!empty($valmember->username))
                    <td align="middle">{{ $valmember->username }}</td>
                @else
                    <td align="middle"> ไม่มีข้อมูล </td>
                @endif

                {{-- @if(!empty($valmember->updateStatusTime))
                    <td align="middle">{{ \Carbon\Carbon::parse($valmember->updateStatusTime)->addYears(543)->format('d/m/Y H:m:i') }}</td>
                @else
                    <td align="middle"> ไม่มีข้อมูล </td>
                @endif --}}
            </tr>
            @endforeach
        </table>
</body>
</html>
