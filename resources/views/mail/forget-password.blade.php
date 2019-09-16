<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    แจ้งลืมรหัสผ่าน <br>
    ท่านสามารถ Reset รหัสผ่านได้ที่ลิ้งค์ด้านล้างนี้ <br>
    OTP : {{ ($user->key_forget) }}<br>
    URL : <a href="{{ url('change-password') }}?key={{ encrypt($user->email) }}">{{ url('change-password') }}?key={{ encrypt($user->email) }}</a>
  </body>
</html>
