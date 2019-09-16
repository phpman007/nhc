@php
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=แสดงข้อมูลการสมัคร ผู้แทนองค์กรภาคเอกชน".date('Y-m-d-His').".xls");
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
<div><h2>แสดงข้อมูลการสมัคร  ผู้แทนองค์กรภาคเอกชน</h2></div>
        <table border="1" bordercolor="black" cellspacing="0">
            <tr align="middle">
                <th>ลำดับ</th>
                <th>รหัสผู้สมัคร</th>
                <th width="1000px">ชื่อ - สกุล</th>
                <th>เลขบัตรประชาชน</th>
                <th>หมายเลขโทรศัพท์</th>
                <th width="1000px">กลุ่มย่อย</th>
                <th>วันที่สมัคร</th>
                <th>วันที่เข้าระบบครั้งสุดท้าย</th>
                <th width="100px">ขั้นตอนล่าสุด</th>
                <th width="100px">สำเนาหลักฐานที่แสดงถึงวัตถุประสงค์การก่อตั้งองค์กร</th>
                <th width="100px">สำเนาบัตรประจำตัวประชาชนของประธานองค์กร</th>
                <th width="100px">สำเนาหลักฐานซึ่งแสดงถึงกิจกรรมการดำเนินงานที่เกี่ยวข้องกับสุขภาพในกลุ่มที่ขอขึ้นทะเบียนในพื้นที่จังหวัด</th>
                <th width="100px">สำเนาหนังสือสำคัญที่แสดงความเป็นนิติบุคคล</th>
                <th width="100px">สำเนาคำสั่งแต่งตั้งประธานองค์กรหรือรายงานการประชุมที่ระบุชื่อและตำแหน่งประธานองค์กร</th>
                <th width="100px">สำเนาหนังสือที่แสดงว่าผู้ลงลายมือชื่อในแบบขอขึ้นทะเบียนองค์กรภาคเอกชนเป็นประธาน องค์กร หรือรายงานประชุมที่ระบุชื่อและตำแหน่งประธานองค์กร</th>
                <th width="100px">หนังสือรับรองความมีอยู่และการดำเนินกิจกรรมขององค์กรภาคเอกชนที่ไม่เป็นนิติบุคคล</th>
            </tr>
             @foreach ($listmember as $key=>$valmember)

                @php
                    $list=DB::table('members')
                    ->join('attach_files','members.id','=','attach_files.member_id')
                    ->where('attach_files.member_id',$valmember->id)
                    ->get();
                @endphp

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

                @if($valmember->legalStastus == 1)
                    @php
                        $list1=DB::table('members')
                        ->join('attach_files','members.id','=','attach_files.member_id')
                        ->where('attach_files.member_id',$valmember->id)
                        ->where('use_is','=','document_verify_copy')
                        ->where('status','=',1)
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
                        ->where('use_is','=','document_verify_has_company_copy')
                        ->where('status','=',1)
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
                        ->where('use_is','=','company_verify_year')
                        ->where('status','=',1)
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

                    @php
                        $list4=DB::table('members')
                        ->join('attach_files','members.id','=','attach_files.member_id')
                        ->where('attach_files.member_id',$valmember->id)
                        ->where('use_is','=','company_history_copy')
                        ->where('status','=',1)
                        ->get();
                    @endphp
                    @if($list4->isEmpty())
                        <td align="middle" style="color:red;">ไม่มี</td>
                    @else
                        @if(count($list4)>0)
                            <td align="middle"> มี </td>
                        @else
                            <td align="middle" style="color:red;">ไม่มี</td>
                        @endif
                    @endif

                    @php
                        $list5=DB::table('members')
                        ->join('attach_files','members.id','=','attach_files.member_id')
                        ->where('attach_files.member_id',$valmember->id)
                        ->where('use_is','=','personal_copy')
                        ->where('status','=',1)
                        ->get();
                    @endphp
                    @if($list5->isEmpty())
                        <td align="middle" style="color:red;">ไม่มี</td>
                    @else
                        @if(count($list5)>0)
                            <td align="middle"> มี </td>
                        @else
                            <td align="middle" style="color:red;">ไม่มี</td>
                        @endif
                    @endif

                    <td align="middle">-</td>
                    <td align="middle">-</td>

                @else

                    @php
                        $list1=DB::table('members')
                        ->join('attach_files','members.id','=','attach_files.member_id')
                        ->where('attach_files.member_id',$valmember->id)
                        ->where('use_is','=','company_history_copy')
                        ->where('status','=',1)
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
                        ->where('use_is','=','personal_copy')
                        ->where('status','=',1)
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
                        ->where('use_is','=','company_verify_year')
                        ->where('status','=',1)
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

                    <td align="middle">-</td>
                    <td align="middle">-</td>

                    @php
                        $list4=DB::table('members')
                        ->join('attach_files','members.id','=','attach_files.member_id')
                        ->where('attach_files.member_id',$valmember->id)
                        ->where('use_is','=','document_verify_copy')
                        ->where('status','=',1)
                        ->get();
                    @endphp
                    @if($list4->isEmpty())
                        <td align="middle" style="color:red;">ไม่มี</td>
                    @else
                        @if(count($list4)>0)
                            <td align="middle"> มี </td>
                        @else
                            <td align="middle" style="color:red;">ไม่มี</td>
                        @endif
                    @endif

                    @php
                        $list5=DB::table('members')
                        ->join('attach_files','members.id','=','attach_files.member_id')
                        ->where('attach_files.member_id',$valmember->id)
                        ->where('use_is','=','document_verify_has_company_copy')
                        ->where('status','=',1)
                        ->get();
                    @endphp
                    @if($list5->isEmpty())
                        <td align="middle" style="color:red;">ไม่มี</td>
                    @else
                        @if(count($list5)>0)
                            <td align="middle"> มี </td>
                        @else
                            <td align="middle" style="color:red;">ไม่มี</td>
                        @endif
                    @endif

                @endif

                {{-- <td>{{$valmember->legalStatus}}</td> --}}
            </tr>
            @endforeach
        </table>
</body>
</html>
