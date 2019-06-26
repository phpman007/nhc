@php
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=ORcheck.xls");
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
<div><h2>ตรวจสอบหลักฐาน ผู้แทนองค์กรส่วนท้องถิ่น</h2></div>
        <table border="1" bordercolor="black" cellspacing="0">
            <tr align="middle">
                <th>ลำดับ</th>
                <th>รหัสเอกสาร</th>
                <th>ชื่อ - สกุล</th>
                <th>กลุ่มย่อย</th>
                <th>จังหวัด</th>
                <th>สถานะ</th>
                <th>ผู้ที่ตรวจสอบ</th>
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
                <td>{{$valmember->groupName}}</td>
                <td align="middle">{{$valmember->province}}</td>
                <td align="middle">{{$valmember->status}}</td>
                <td align="middle">{{$valmember->username}}</td>
                </tr>
            @endforeach
        </table>
</body>
</html>
