@php
header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment; filename=".$filename.date('Y-m-d-His').".doc");
//header("content-type: text charset=tis-620");
@endphp
{{-- header("Content-Disposition: attachment; filename=".$groupname.".doc"); --}}

<html>
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        @font-face {
            font-family: 'THSarabunPSK';
            font-style: normal;
            font-weight: normal;
            src: url("{{ ('backend/fonts/THSarabunPSK.ttf') }}") format('truetype');
        }

        body {
            font-family: "THSarabunPSK";
            font-size: 16pt;
        }

    </style>
</head>
<body>

{{--  @if(count($list1)>0)  --}}
    @if($group==1)
        @if(count($list1)>0)
            {{$groupname}}
            <table width="100%" style="border:1px solid blue; border-collapse: collapse;" >
                <tr align="center"  valign="top" bgcolor="lightblue">
                    <td width="5%" style="border:1px solid blue;">หมายเลข</td>
                    <td width="40%" style="border:1px solid blue;">ชื่อ - สกุล</td>
                    <td style="border:1px solid blue;">ตำแหน่ง</td>
                </tr>
                @foreach($list1 as $key => $val)
                    <tr valign="top">
                        <td align="center" style="border:1px solid blue;">{{$val->candidateNumber}}</td>
                        <td style="border:1px solid blue;">&nbsp;&nbsp;{{$val->nameTitle}}{{$val->firstname}}&nbsp;&nbsp;{{$val->lastname}}</td>
                        <td style="border:1px solid blue;">&nbsp;&nbsp;{{$val->nowWork}}</td>
                    </tr>
                @endforeach
            </table>
        @endif
    @elseif($group==3)
        @if(count($list1)>0)
            {{$groupname1}}
            <table width="100%" style="border:1px solid blue; border-collapse: collapse;" >
                <tr align="center"  valign="top" bgcolor="lightblue">
                    <td width="5%" style="border:1px solid blue;">หมายเลข</td>
                    <td width="40%" style="border:1px solid blue;">ชื่อ - สกุล</td>
                    <td style="border:1px solid blue;">ตำแหน่ง</td>
                </tr>
                @foreach($list1 as $key => $val)
                    <tr valign="top">
                        <td align="center" style="border:1px solid blue;">{{$val->candidateNumber}}</td>
                        <td style="border:1px solid blue;">&nbsp;&nbsp;{{$val->nameTitle}}{{$val->firstname}}&nbsp;&nbsp;{{$val->lastname}}</td>
                        <td style="border:1px solid blue;">&nbsp;&nbsp;{{$val->nowWork}}</td>
                    </tr>
                @endforeach
            </table>
            <br clear=all style='mso-special-character:line-break;page-break-before:always'>
        @endif

        @if(count($list2)>0)
            {{$groupname2}}
            <table width="100%" style="border:1px solid blue; border-collapse: collapse;" >
                <tr align="center"  valign="top" bgcolor="lightblue">
                    <td width="5%" style="border:1px solid blue;">หมายเลข</td>
                    <td width="40%" style="border:1px solid blue;">ชื่อ - สกุล</td>
                    <td style="border:1px solid blue;">ตำแหน่ง</td>
                </tr>
                @foreach($list2 as $key => $val)
                    <tr valign="top">
                        <td align="center" style="border:1px solid blue;">{{$val->candidateNumber}}</td>
                        <td style="border:1px solid blue;">&nbsp;&nbsp;{{$val->nameTitle}}{{$val->firstname}}&nbsp;&nbsp;{{$val->lastname}}</td>
                        <td style="border:1px solid blue;">&nbsp;&nbsp;{{$val->nowWork}}</td>
                    </tr>
                @endforeach
            </table>
            <br clear=all style='mso-special-character:line-break;page-break-before:always'>
        @endif

        @if(count($list3)>0)
            {{$groupname3}}
            <table width="100%" style="border:1px solid blue; border-collapse: collapse;" >
                <tr align="center"  valign="top" bgcolor="lightblue">
                    <td width="5%" style="border:1px solid blue;">หมายเลข</td>
                    <td width="40%" style="border:1px solid blue;">ชื่อ - สกุล</td>
                    <td style="border:1px solid blue;">ตำแหน่ง</td>
                </tr>
                @foreach($list3 as $key => $val)
                    <tr valign="top">
                        <td align="center" style="border:1px solid blue;">{{$val->candidateNumber}}</td>
                        <td style="border:1px solid blue;">&nbsp;&nbsp;{{$val->nameTitle}}{{$val->firstname}}&nbsp;&nbsp;{{$val->lastname}}</td>
                        <td style="border:1px solid blue;">&nbsp;&nbsp;{{$val->nowWork}}</td>
                    </tr>
                @endforeach
            </table>
            <br clear=all style='mso-special-character:line-break;page-break-before:always'>
        @endif

        @if(count($list4)>0)
            {{$groupname4}}
            <table width="100%" style="border:1px solid blue; border-collapse: collapse;" >
                <tr align="center"  valign="top" bgcolor="lightblue">
                    <td width="5%" style="border:1px solid blue;">หมายเลข</td>
                    <td width="40%" style="border:1px solid blue;">ชื่อ - สกุล</td>
                    <td style="border:1px solid blue;">ตำแหน่ง</td>
                </tr>
                @foreach($list4 as $key => $val)
                    <tr valign="top">
                        <td align="center" style="border:1px solid blue;">{{$val->candidateNumber}}</td>
                        <td style="border:1px solid blue;">&nbsp;&nbsp;{{$val->nameTitle}}{{$val->firstname}}&nbsp;&nbsp;{{$val->lastname}}</td>
                        <td style="border:1px solid blue;">&nbsp;&nbsp;{{$val->nowWork}}</td>
                    </tr>
                @endforeach
            </table>
            <br clear=all style='mso-special-character:line-break;page-break-before:always'>
        @endif

        @if(count($list5)>0)
            {{$groupname5}}
            <table width="100%" style="border:1px solid blue; border-collapse: collapse;" >
                <tr align="center"  valign="top" bgcolor="lightblue">
                    <td width="5%" style="border:1px solid blue;">หมายเลข</td>
                    <td width="40%" style="border:1px solid blue;">ชื่อ - สกุล</td>
                    <td style="border:1px solid blue;">ตำแหน่ง</td>
                </tr>
                @foreach($list5 as $key => $val)
                    <tr valign="top">
                        <td align="center" style="border:1px solid blue;">{{$val->candidateNumber}}</td>
                        <td style="border:1px solid blue;">&nbsp;&nbsp;{{$val->nameTitle}}{{$val->firstname}}&nbsp;&nbsp;{{$val->lastname}}</td>
                        <td style="border:1px solid blue;">&nbsp;&nbsp;{{$val->nowWork}}</td>
                    </tr>
                @endforeach
            </table>

        @endif
    @endif
{{--  @endif  --}}
</body>
</html>
