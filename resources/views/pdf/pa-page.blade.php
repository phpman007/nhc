<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
      <meta charset="utf-8">
      <title></title>
      <style type="text/css">
      @font-face {
            font-family: THBaijam;
            font-style: normal;
            font-weight: normal;
            src: url('{{ public_path('frontend/fonts/THSarabunNew.ttf') }}');
      }
      @font-face {
            font-family: THBaijam;
            font-style: normal;
            font-weight: bold;
            src: url('{{ public_path('frontend/fonts/THSarabunNew Bold.ttf') }}');
      }
      body{
            font-family: "THBaijam";
            color:#549733;
            font-size: 16pt;
      }
</style>
</head>
<body>
      <h3 style="width:90%">{{ $header }}</h3>
	{!! $html !!}
</body>

</html>
