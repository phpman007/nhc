<!DOCTYPE html>
<html lang="en" dir="ltr">
      <head>
            <meta charset="utf-8">
            <title></title>
      </head>
      <body>
            เรื่อง  ผลการอนุมัติผู้สมัคร {{$group}}
            <p>เรียน {{$title}}{{$firstname}}  {{$lastname}} จังหวัด{{$province}}

            <br>ผลการอนุมัติ
            @if($statusid==4)
                <p>ไม่ผ่านการอนุม้ติ

                <br>เหตุผลการอนุมัติไม่ผ่าน
                <br>{{$reason}}
            @elseif($statusid==3)
                <p>ผ่านการอนุมัติ
                <br>ขอแสดงความยินดี
            @endif
        <br>
      </body>
</html>
