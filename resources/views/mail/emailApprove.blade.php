<!DOCTYPE html>
<html lang="en" dir="ltr">
      <head>
            <meta charset="utf-8">
            <title></title>
      </head>
      <body>
        {{--  <img src="public/img/logo.png">  --}}
        เรียน {{$list->nameTitle}}{{$list->firstname}}  {{$list->lastname}}
        <p>เรื่อง  ผลการอนุมัติผู้สมัคร {{$group}}
        <p>ชื่อผู้สมัคร {{$list->nameTitle}}{{$list->firstname}}  {{$list->lastname}} 
        <br>{{$list->groupName}} จังหวัด{{$list->province}}
        <br>ผลการอนุมัติ {{$list->status}}
        
        @if($list->statusId==4)
        <p>เหตุผลการอนุมัติไม่ผ่าน
        <br>{{$list->reason}}
        @else
        <br>ขอแสดงความยินดีด้วย
        @endif
        <br>
      </body>
</html>