<!DOCTYPE html>
<html lang="en" dir="ltr">
      <head>
            <meta charset="utf-8">
            <title></title>
      </head>
      <body>
          {{--  @php $now=date('Y-m-d H:i:s') @endphp  --}}
@if($groupid==1)
{{--  path {{$pdfpath}}  --}}
<p>วันที่ส่งเมล  {{ date('d') }} {{ Helper::monthThai1(date('m')) }} {{date('Y')+543}}</p>
<p>เรื่อง  แจ้งผลประกาศบัญชีรายชื่อผู้ทรงคุณวุฒิที่มีคุณสมบัติเข้ารับการเลือกกันเองเป็นกรรมการสุขภาพแห่งชาติ</p>
<p>เรียน  {{$title}}{{$firstname}}  {{$lastname}}</p>
<p>คณะกรรมการสรรหากรรมการสุขภาพแห่งชาติ ขอแจ้งให้ท่านทราบว่า {{$title}}{{$firstname}}  {{$lastname}} เป็นผู้ทรงคุณวุฒิด้าน{{$group}} ที่ผ่านคุณสมบัติเข้ารับการเลือกกันเองเป็นกรรมการสุขภาพแห่งชาติ  ดังมีรายชื่อปรากฏอยู่ในประกาศบัญชีรายชื่อผู้ทรงคุณวุฒิที่มีคุณสมบัติเข้ารับการเลือกกันเองเป็นกรรมการสุขภาพแห่งชาติ  ตามตามไฟล์ที่แนบมาด้วยนี้   ขอให้ท่านเตรียมข้อมูลผู้ใช้งาน (Username) และรหัสผ่าน (Password) ของตนเอง ในการลงทะเบียนยืนยันการใช้สิทธิ์ลงคะแนนเพื่อเลือกกันเองเอาไว้  โดยระบบการสรรหาคณะกรรมการสุขภาพแห่งชาติแบบอิเล็กทรอนิกส์ จะเปิดให้ลงทะเบียนยืนยันการใช้สิทธิ์ลงคะแนนฯ ที่ลิงค์เว็บไซต์ "https://nhc.nationalhealth.or.th/login" ตั้งแต่วันที่ 4-20 ตุลาคม 2562 เวลา 16.30 น.   ถ้าไม่ได้ลงทะเบียนภายในวันและเวลาที่กำหนด ถือว่าสละสิทธิ์การลงคะแนนเพื่อเลือกกันเองเป็นกรรมการ </p>
<p>เมื่อลงทะเบียนยืนยันการใช้สิทธิ์ลงคะแนนแล้ว ผู้มีสิทธิ์ลงคะแนนจะทราบข้อมูลเพื่อประกอบการลงคะแนนเลือกกันเอง ดังนี้
<br>(๑)	สื่อแนะนำบทบาทหน้าที่ของคณะกรรมการสุขภาพแห่งชาติ
<br>(๒)	คู่มือการลงคะแนนแบบออนไลน์ และตัวอย่างบัตรลงคะแนนแบบออนไลน์
<br>(๓)	บัญชีรายชื่อผู้ผ่านคุณสมบัติที่เข้ารับการเลือกกันเองและข้อมูลจากใบสมัครของผู้ทรงคุณวุฒิในแต่ละกลุ่ม</p>
<p>สิ่งสำคัญ คือ ระบบจะส่งรหัสลงคะแนนให้กับผู้มีสิทธิ์ลงคะแนนผ่านทางอีเมลของท่าน หลังจากที่ได้ลงทะเบียนยืนยันการใช้สิทธิ์เรียบร้อยแล้ว ทั้งนี้ รหัสลงคะแนน ถือเป็นข้อมูลความลับเฉพาะบุคคล</p>
<p>หากท่านพบปัญหาในขั้นตอนลงทะเบียนยืนยันการใช้สิทธิ์ลงคะแนนฯ  โปรดติดต่อกลับมายัง ฝ่ายเลขานุการคณะกรรมการสรรหากรรมการสุขภาพแห่งชาติ ที่ คุณภัทรพงศ์ เบอร์โทร 02-8329023, 061-405355 และคุณวริฎฐา เบอร์โทร 02-8329024, 092-0965455</p>

@elseif($groupid==3)

<p>วันที่ส่งเมล  {{ date('d') }} {{ Helper::monthThai1(date('m')) }} {{date('Y')+543}}</p>
<p>เรื่อง  แจ้งผลประกาศบัญชีรายชื่อผู้แทนองค์กรภาคเอกชนที่มีคุณสมบัติเข้ารับการเลือกกันเองเป็นกรรมการสุขภาพแห่งชาติ</p>
<p>เรียน  {{$title}}{{$firstname}}  {{$lastname}}</p>
<p>คณะกรรมการสรรหากรรมการสุขภาพแห่งชาติ ขอแจ้งให้ท่านทราบว่า{{$title}}{{$firstname}}  {{$lastname}} เป็นผู้แทนองค์กรภาคเอกชน จากจังหวัด{{$province}} ในเขต{{$section}}  ที่ผ่านคุณสมบัติเข้ารับการเลือกกันเองเป็นกรรมการสุขภาพแห่งชาติ  ดังมีรายชื่อปรากฏอยู่ในประกาศบัญชีรายชื่อผู้แทนองค์กรภาคเอกชนมีคุณสมบัติเข้ารับ การเลือกกันเองเป็นกรรมการสุขภาพแห่งชาติตามตามไฟล์ที่แนบมาด้วยนี้   ขอให้ท่านเตรียมข้อมูลผู้ใช้งาน (Username) และรหัสผ่าน (Password) ของตนเอง ในการลงทะเบียนยืนยันการใช้สิทธิ์ลงคะแนนเพื่อเลือกกันเองเอาไว้  โดยระบบการสรรหาคณะกรรมการสุขภาพแห่งชาติแบบอิเล็กทรอนิกส์ จะเปิดให้ลงทะเบียนยืนยันการใช้สิทธิ์ลงคะแนนฯ ที่ลิงค์เว็บไซต์ "https://nhc.nationalhealth.or.th/login" ตั้งแต่วันที่ 4-20 ตุลาคม 2562 เวลา 16.30 น. ถ้าไม่ได้ลงทะเบียนภายในวันและเวลาที่กำหนด ถือว่าสละสิทธิ์การลงคะแนนเพื่อเลือกกันเองเป็นกรรมการ </p>
<p>เมื่อลงทะเบียนยืนยันการใช้สิทธิ์ลงคะแนนแล้ว ผู้มีสิทธิ์ลงคะแนนจะทราบข้อมูลเพื่อประกอบการลงคะแนนเลือกกันเอง ดังนี้
<br>(๑)	สื่อแนะนำบทบาทหน้าที่ของคณะกรรมการสุขภาพแห่งชาติ
<br>(๒)	คู่มือการลงคะแนนแบบออนไลน์ และตัวอย่างบัตรลงคะแนนแบบออนไลน์
<br>(๓)	บัญชีรายชื่อผู้ผ่านคุณสมบัติที่เข้ารับการเลือกกันเองและข้อมูลจากใบสมัครของผู้แทนองค์กรภาคเอกชนในแต่ละเขต</p>

<p>สิ่งสำคัญ คือ ระบบจะส่งรหัสลงคะแนนให้กับผู้มีสิทธิ์ลงคะแนนผ่านทางอีเมลของท่านหลังจากที่ลงทะเบียนยืนยันการใช้สิทธิ์เรียบร้อยแล้ว ทั้งนี้ รหัสลงคะแนน ถือเป็นข้อมูลความลับเฉพาะบุคคล</p>
<p>หากท่านพบปัญหาในขั้นตอนลงทะเบียนยืนยันการใช้สิทธิ์ลงคะแนนฯ  โปรดติดต่อกลับมายัง ฝ่ายเลขานุการคณะกรรมการสรรหากรรมการสุขภาพแห่งชาติ ที่ คุณภัทรพงศ์ เบอร์โทร 02-8329023, 061-405355 และคุณวริฎฐา เบอร์โทร 02-8329024, 092-0965455</p>

@endif
      </body>
</html>
