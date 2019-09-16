<!DOCTYPE html>
<html lang="en" dir="ltr">
      <head>
            <meta charset="utf-8">
            <title>ผู้แทนองค์กรภาคเอกชน (NGOs)</title>
      </head>
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
	            color:#000;
	            font-size: 16pt;
	            line-height: 16pt;
	      }
	     .text-center{
            text-align: center;
	      }
	      .text-right{
	            text-align: right;
	      }
	      h1{
	            font-size: 20pt;
	            font-weight: bold;
	      }
	      ul li {
	            list-style: none;
	      }
	      p,ul{
	            padding:0px;
	            margin:0px;
	      }
	      table {
	        border-collapse: collapse;
	      }

	      th {
	            text-align: center;
	      }
	      span{
	      	display: inline-block;
	      }
	      strong{
	      	font-weight: normal;
	      }
	      .table-id tr td{
	      	border-color: #000;
	      	padding:5px;
	      	padding-top: 2px;
	      	text-align: center;
	      	vertical-align: middle;
	      	line-height: 14pt;
	      }
		  .table-border tr th{
			  vertical-align: middle;
			  text-align:center;
			  border-color: #000;
			  padding:5px;
			  line-height: 14pt;
		  }
		  .table-border tr td{
				padding:8px;
				vertical-align: middle;
				line-height: 14pt;
				border-color: #000;
				text-align:center;
			  }
			  .table-border tr td span{
				  display:block;
			  }
			  table {
				table-layout: fixed;

				}
				table td {
					word-wrap: break-word;
					overflow-wrap: break-word;
				}
				.box-dot{
				display:block;
				/*background-image: url(http://192.168.200.1/frontend/images/dot-brown.jpg);
				background-repeat: repeat;
				background-position: left 30px;
				background-size: auto 20px;*/
				word-wrap: break-word;
				word-break: break-all;
			  }
			  .box-profile{
				  width:90px;
				  height:120px;
				  background-color:#eee;
				  overflow:hidden;
				  float:right;
			  }
			  .box-profile img{
				  width:100%;
				  height:100%;
				  object-fit:contain;
				  }
			.page-break {
  				  page-break-after: always;
			}
      </style>
      <body>
		<script type="text/php">
		    if ( isset($pdf) ) {
		        $pdf->page_text(300, 10, "- {PAGE_NUM} -", null, 14, array(0,0,0));
		    }
		</script>
      	<div class="control-pdf">
      		<table width="100%" border="0" bgcolor="#FFFFFF" align="center"  cellspacing="0" cellpadding="0" style="font-size: 16pt; line-height: 16pt;" >
      			<tr>
      				<td width="60%" style="vertical-align: middle;">แบบฟอร์ม สช./ใบสมัครผู้แทนองค์กรภาคเอกชน/2562</td>
      				<td width="40%" style="padding: 15px 10px;border:1px solid #000;">
      					<div style="width: 350px;font-size: 15pt;">
      						<strong>เขต <span style="border-bottom:1px dotted #000;display: inline-block; width: 50px;">{{ @DB::table('elections')->where('provinceId', Auth::user()->provinceId)->first()->section }}</span> จังหวัด <span style="border-bottom:1px dotted #000;display: inline-block; width: 150px;">{{ @DB::table('provinces')->where('province_code',@Auth::user()->provinceId)->first()->province }}</span></strong>

      					</div>
      				</td>
      			</tr>
      		</table>
      		<br>
      		<table width="100%" border="0" bgcolor="#FFFFFF" align="center"  cellspacing="0" cellpadding="0" style="font-size: 16pt; line-height: 14pt;" >
      			<tr>
      				<td width="20%" style="vertical-align: middle;">

      				</td>
      				<td width="65%" style="vertical-align: middle;">
      					<div style="text-align: center;">
      						<h1>ใบสมัครผู้แทนองค์กรภาคเอกชน<br>เข้ารับการเลือกเป็นกรรมการสุขภาพแห่งชาติ <br>พ.ศ. 2562</h1>
      					</div>
      				</td>
      				<td width="15%">
					   <div class="box-profile">
					   <?php
                            $file2 = Auth::user()->attach()->where('status', 1)->where('use_is', 'personal_photo')->first();
                                     ?>

                            @if($file2->type == "jpg")
					 		<img src="{{asset($file2->path)}}" alt="">
							 @endif
					   </div>
					</td>
      			</tr>
      		</table>
      		<br>
      		<table width="100%" border="0" bgcolor="#FFFFFF"   cellspacing="0" cellpadding="0" style="font-size: 16pt; line-height: 16pt;">
      			<tbody>
      				<tr>
                                    <td width="100%">
      						<div style="text-align: left;padding-left:400px">
      							<strong>วัน <span style="border-bottom:1px dotted #000000;width: 30px;"> {{ Auth::user()->created_at->addYears('543')->format('d') }}</span></strong>
      							<strong>เดือน <span style="border-bottom:1px dotted #000000;width: 120px;"> {{ Helper::monthThai(Auth::user()->created_at->addYears('543')->format('m')) }}</span></strong>
      							<strong>พ.ศ. <span style="border-bottom:1px dotted #000000;width: 80px;"> {{ Auth::user()->created_at->addYears('543')->format('Y') }}</span></strong>
      						</div>
      					</td>
      				</tr>
      				<tr>
      					<td width="100%">
      						<strong style="padding-left: 50px;">ข้าพเจ้า  <span style="border-bottom:1px dotted #000;width: 627px;"> {{@Auth::user()->nameTitle}} {{@Auth::user()->firstname}}  {{@Auth::user()->lastname}}</span></strong>
      					</td>
      				</tr>
      				<tr>
      					<td width="100%" style="padding-bottom: 10px;">
      						<strong style="padding-left: 50px;">มีความประสงค์จะสมัครเข้ารับการเลือกเป็นกรรมการสุขภาพแห่งชาติ  จึงขอส่งใบสมัครของข้าพเจ้ามายัง<br>ประธานคณะกรรมการสรรหา</strong>
      					</td>
      				</tr>
      				<tr>
      					<td width="100%" style="background-color: #663300; color: #fff; line-height: 14px; vertical-align: middle;padding: 8px;"><strong style="font-weight: bold;">ส่วนที่  1	คุณสมบัติ</strong></td>
      				</tr>
      				<tr>
      					<td width="100%;" style="padding:10px 0 0 10px;">
      						<p>ข้าพเจ้าเป็นผู้มีคุณสมบัติของผู้ทรงคุณวุฒิที่จะเข้ารับการเลือกเป็นกรรมการสุขภาพแห่งชาติครบถ้วน  ดังนี้ </p>
      						<p><strong style="font-weight: bold;">คุณสมบัติทั่วไป</strong></p>
      						<ul style="padding-left: 50px; margin-bottom: 10px;">
      							<li><span style="text-align:center;font-weight:bolder;border-radius:2px;border:1px solid #000; width: 12px; height: 12px; margin-right: 5px;line-height: 0.38;font-size:25px;">x</span> มีสัญชาติไทย</li>
      							<li><span style="text-align:center;font-weight:bolder;border-radius:2px;border:1px solid #000; width: 12px; height: 12px; margin-right: 5px;line-height: 0.38;font-size:25px;">x</span> มีอายุไม่ต่ำกว่ายี่สิบปีบริบูรณ์</li>
      							<li><span style="text-align:center;font-weight:bolder;border-radius:2px;border:1px solid #000; width: 12px; height: 12px; margin-right: 5px;line-height: 0.38;font-size:25px;">x</span> ไม่เป็นคนไร้ความสามารถหรือคนเสมือนไร้ความสามารถ</li>
      							<li><span style="text-align:center;font-weight:bolder;border-radius:2px;border:1px solid #000; width: 12px; height: 12px; margin-right: 5px;line-height: 0.38;font-size:25px;">x</span> ไม่ติดยาเสพติดให้โทษ</li>
      							<li><span style="text-align:center;font-weight:bolder;border-radius:2px;border:1px solid #000; width: 12px; height: 12px; margin-right: 5px;line-height: 0.38;font-size:25px;">x</span> ไม่เคยถูกลงโทษไล่ออก ปลดออก เลิกจ้าง หรือพ้นจากตำแหน่ง เพราะเหตุจากการทุจริตหรือประพฤติมิชอบ</li>
      							<li><span style="text-align:center;font-weight:bolder;border-radius:2px;border:1px solid #000; width: 12px; height: 12px; margin-right: 5px;line-height: 0.38;font-size:25px;">x</span>  ไม่เคยได้รับโทษจำคุกโดยคำพิพากษาถึงที่สุดให้จำคุก ไม่ว่าจะถูกจำคุกจริงหรือไม่ก็ตาม เว้นแต่เป็นโทษสำหรับความผิดที่ได้กระทำโดยประมาทหรือความผิดลหุโทษ</li>
      						</ul>
      					</td>
      				</tr>
				</tbody>
			</table>
			<div class="page-break"></div>
			<table width="100%" border="0" bgcolor="#FFFFFF"   cellspacing="0" cellpadding="0" style="font-size: 16pt; line-height: 16pt;">
				<tbody>
      				<tr>
      					<td width="100%" style="background-color: #663300; color: #fff; line-height: 14px; vertical-align: middle;padding: 8px;"><strong style="font-weight: bold;">ส่วนที่  2	การแสดงเจตนาสมัครเข้ากลุ่ม</strong></td>
      				</tr>
      				<tr>
      					<td width="100%;" style="padding:10px 0 0 10px;">
      						<ul style="padding-left: 50px;">
                                        @foreach(DB::table('ngo_groups')->get() as $key => $item)
      							<li><span style="text-align:center;font-weight:bolder;border-radius:2px;border:1px solid #000; width: 12px; height: 12px; margin-right: 5px;line-height: 0.38;font-size:25px;">{{$item->id == Auth::user()->ngoGroupId ? 'x' : ''}}</span>{{$item->groupName}}</li>
                                        @endforeach
                                        <!-- <li><span style="border-radius:2px;border:1px solid #663300; width: 12px; height: 12px; margin-right: 5px;"></span>ผู้แทนองค์กรที่ดำเนินงานด้านอาสาสมัคร จิตอาสา หรือรณรงค์เผยแพร่</li>
      							<li><span style="border-radius:2px;border:1px solid #663300; width: 12px; height: 12px; margin-right: 5px;"></span>ผู้แทนองค์กรที่ดำเนินงานด้านการแพทย์และสาธารณสุข</li>
      							<li><span style="border-radius:2px;border:1px solid #663300; width: 12px; height: 12px; margin-right: 5px;"></span>ผู้แทนองค์กรชุมชนที่ดำเนินงานด้านการพัฒนาในพื้นที่ชุมชน</li>
      							<li><span style="border-radius:2px;border:1px solid #663300; width: 12px; height: 12px; margin-right: 5px;"></span>ผู้แทนองค์กรที่ดำเนินงานด้านพัฒนาชุมชน สังคม นโยบายสาธารณะ พิทักษ์สิทธิมนุษยชน การศึกษา ศาสนา ทรัพยากรธรรมชาติและสิ่งแวดล้อมหรืออื่นๆในเชิงประเด็น </li> -->
      						</ul>
      						<p><strong style="border-bottom:1px solid #000; font-weight: bold;">หมายเหตุ</strong> ผู้สมัครผู้แทนองค์กรภาคเอกชนสามารถสมัครได้กลุ่มใดกลุ่มหนึ่งใน 5 กลุ่มนี้ เท่านั้น</p><br>
      					</td>
      				</tr>
      				<tr>
      					<td width="100%" style="background-color: #663300; color: #fff; line-height: 14px; vertical-align: middle;padding: 8px;"><strong style="font-weight: bold;">ส่วนที่  3 ข้อมูลยืนยันตัวตนของผู้สมัครเพื่อเข้าสู่ระบบการสรรหากรรมการสุขภาพแห่งชาติแบบอิเล็กทรอนิกส์</strong></td>
      				</tr>
      				<tr>
      					<td width="100%" style="padding-bottom: 20px;">
      						<p style="font-weight: bold;margin-bottom: 10px;">1.  เลขบัตรประชาชน 13 หลัก</p>
      						<table class="table-id" width="400px" border="1" style="padding-left: 50px;font-size: 18pt; line-height: 16pt;">
      							<tr>
                      <?php
                            $idCardArray = $member->personalId;
                       ?>
                      @for($i = 0 ; $i < strlen($idCardArray) ; $i ++)
      								<td style="text-align: center; vertical-align: middle; width: 20px;">
      									<span style="display: block; height: 16pt;">{{$idCardArray[$i]}}</span>
      								</td>
                      @endfor
      							</tr>
      						</table>
      					</td>
      				</tr>
					  <tr>
      					<td width="100%" style="padding-bottom: 20px;">
      						<p style="font-weight: bold;">2. อีเมล (Email) </p>
		  					<p><span style="border-bottom:1px dotted #000; width: 720px;">{{ $member->email }}</span></p>
      					</td>
      				</tr>
					  <tr>
      					<td width="100%" style="padding-bottom: 20px;">
      						<p style="font-weight: bold;margin-bottom: 10px;">3. รหัสผ่าน (Password)</p>
      						<table class="table-id" width="216px" border="1" style="padding-left: 50px;font-size: 18pt; line-height: 16pt;">
      							<tr>
      								<td style="text-align: center; vertical-align: middle; width: 20px;">
      									<span style="display: block; height: 16pt;">*</span>
      								</td>
      								<td style="text-align: center; vertical-align: middle; width: 20px;">
      									<span style="display: block; height: 16pt;">*</span>
      								</td>
      								<td style="text-align: center; vertical-align: middle; width: 20px;">
      									<span style="display: block; height: 16pt;">*</span>
      								</td>
      								<td style="text-align: center; vertical-align: middle; width: 20px;">
      									<span style="display: block; height: 16pt;">*</span>
      								</td>
      								<td style="text-align: center; vertical-align: middle; width: 20px;">
      									<span style="display: block; height: 16pt;">*</span>
      								</td>
      								<td style="text-align: center; vertical-align: middle; width: 20px;">
      									<span style="display: block; height: 16pt;">*</span>
      								</td>
      								<td style="text-align: center; vertical-align: middle; width: 20px;">
      									<span style="display: block; height: 16pt;">*</span>
      								</td>
      							</tr>
      						</table>
							  <p style="padding-left: 50px; margin-top:10px;"><strong style="border-bottom:1px solid #000; font-weight: bold;">หมายเหตุ</strong> 1. กรุณากำหนดรหัสผ่าน (Password) ของท่านเพื่อยืนยันตัวตนเข้าสู่ระบบสมัคร
         					<Br>2. กำหนดรหัสผ่าน (Password) เป็นตัวอักษรภาษาอังกฤษ และมีตัวเลขด้วย รวมกันจำนวน  8 ตัวอักษร </p>
      					</td>
      				</tr>
				</tbody>
			</table>
			<div class="page-break"></div>
			<table width="100%" border="0" bgcolor="#FFFFFF"   cellspacing="0" cellpadding="0" style="font-size: 16pt; line-height: 16pt;">
				<tbody>
					  <tr>
      					<td width="100%" style="background-color: #663300; color: #fff; line-height: 14px; vertical-align: middle;padding: 8px;"><strong style="font-weight: bold;">ส่วนที่  4	ข้อมูลประวัติ</strong></td>
      				</tr>
					  <tr>
					 	 <td width="100%">
						  <p style="font-weight: bold;">1.  ข้อมูลทั่วไป</p>
						  <div style="padding-left:30px; margin-bottom:15px;">
							<p>
								<strong>1)	คำนำหน้าชื่อ <span style="border-bottom:1px dotted #000;width: 600px;"> {{ $member->nameTitle  }}</span></strong>
							</p>
							<p style="padding-left:20px;">
								<strong>ชื่อ <span style="border-bottom:1px dotted #000;width: 273px;"> {{ $member->firstname  }}</span></strong>
								<strong>นามสกุล <span style="border-bottom:1px dotted #000;width: 320px;">{{ $member->lastname  }}</span></strong>
							</p>
							<p>
                                        <strong>2)	เกิดวันที่ <span style="border-bottom:1px dotted #000;width: 80px;"> {{ Carbon\Carbon::createFromFormat("Y-m-d",$member->detail->dateOfBirth)->addYears('543')->format('d') }}</span></strong>
								<strong>เดือน <span style="border-bottom:1px dotted #000;width:195px;"> {{ Helper::monthThai(Carbon\Carbon::createFromFormat("Y-m-d",$member->detail->dateOfBirth)->addYears('543')->format('m')) }}</span></strong>
								<strong>พ.ศ <span style="border-bottom:1px dotted #000;width: 130px;"> {{ Carbon\Carbon::createFromFormat("Y-m-d",$member->detail->dateOfBirth)->addYears('543')->format('Y') }}</span></strong>
								<strong>อายุ <span style="border-bottom:1px dotted #000;width: 100px;">     <?php
                                             $yearSelect = \Carbon\Carbon::createFromFormat('Y-m-d',$member->detail->dateOfBirth);
                                           	$yearNow = \Carbon\Carbon::now()->diffInYears($yearSelect);
                                              ?>
                                              {{ $yearNow }}
                                         </span> ปี</strong>
							</p>
							<p>
                                <strong>3)	เพศ <span style="text-align:center;font-weight:bolder;border-radius:2px;border:1px solid #000; width: 12px; height: 12px; margin-right: 5px;line-height: 0.38;font-size:25px;">{{$member->detail->genderId == 1 ? "x" :''}}</span>
								 ชาย <span style="text-align:center;font-weight:bolder;border-radius:2px;border:1px solid #000; width: 12px; height: 12px; margin-right: 5px;line-height: 0.38;font-size:25px;">{{$member->detail->genderId == 2 ? "x" :''}}</span>
								 หญิง <span style="text-align:center;font-weight:bolder;border-radius:2px;border:1px solid #000; width: 12px; height: 12px; margin-right: 5px;line-height: 0.38;font-size:25px;">{{$member->detail->genderId == 3 ? "x" :''}}</span>
								 นักบวช/สมณะเพศ </span>
								</strong>
							</p>
							<p>
								<strong>4) สถานที่ที่สามารถติดต่อได้สะดวก</strong>
							</p>
							<p style="padding-left:20px;">
                                <strong><span style="text-align:center;font-weight:bolder;border-radius:2px;border:1px solid #000; width: 12px; height: 12px; margin-right: 5px;line-height: 0.38;font-size:25px;">{{$member->detail->addressType == 1 ? "x" :''}}</span> บ้าน
								<span style="text-align:center;font-weight:bolder;border-radius:2px;border:1px solid #000; width: 12px; height: 12px; margin-right: 5px;line-height: 0.38;font-size:25px;">{{$member->detail->addressType == 2 ? "x" :''}}</span> ที่ทำงาน
								<span style="border-bottom:1px dotted #000;width: 539px;">{{ $member->detail->addressType == 2 ? @Auth::user()->detail->workPlaceName : "" }}</span>
								</strong>
							</p>
							<p>
                                <strong>เลขที่ <span style="border-bottom:1px dotted #000;width: 130px;"> {{ @Auth::user()->detail->no }}</span></strong>
								<strong>หมู่ที่ <span style="border-bottom:1px dotted #000;width:150px;"> {{ @Auth::user()->detail->moo }}</span></strong>
								<strong>ตรอก/ซอย <span style="border-bottom:1px dotted #000;width: 270px;"> {{ @Auth::user()->detail->soi }}</span></strong>
							</p>
							<p>
                                <strong>ถนน <span style="border-bottom:1px dotted #000;width: 255px;"> {{ @Auth::user()->detail->street }}</span></strong>
								<strong>ตำบล/แขวง <span style="border-bottom:1px dotted #000;width:330px;"> {{ Auth::user()->detail->subdistrict->district }}</span></strong>
							</p>
							<p>
                                <strong>อำเภอ/เขต <span style="border-bottom:1px dotted #000;width: 190px;"> {{ Auth::user()->detail->district->amphoe }}</span></strong>
								<strong>จังหวัด <span style="border-bottom:1px dotted #000;width:155px;"> {{ Auth::user()->detail->province->province }}</span></strong>
								<strong>รหัสไปรษณีย์ <span style="border-bottom:1px dotted #000;width:150px;"> {{ Auth::user()->detail->zipCode }}</span></strong>
							</p>
							<p>
                                        <strong>เบอร์โทรศัพท์ที่ 1 : <span style="border-bottom:1px dotted #000;width: 210px;"> {{ Auth::user()->detail->tel }}</span></strong>
								<strong>เบอร์โทรศัพท์ที่ 2 : <span style="border-bottom:1px dotted #000;width:250px;"> {{ Auth::user()->detail->mobile }}</span></strong>
							</p>
						  </div>
						 </td>
					  </tr>
					  <tr>
					 	 <td width="100%">
						  <p>
							<strong style="font-weight: bold;">2.  ประวัติการศึกษา</strong> (เรียงจากวุฒิการศึกษาสูงสุดลงไปตามลำดับ)
                                   <?php
                                   $optionsArray = ["ปริญญาเอก", "ปริญญาโท", "ปริญญาตรี", "ต่ำกว่าปริญญาตรี", 'อื่นๆ'];
                                    ?>
						</p>
						<div style="margin-bottom:15px;margin-top:15px;">
		  					<table border="1"  style="width:100%;" class="table-border">
								  <thead>
									  <tr style="background-color: #663300;">
										  <th width="8%" style="text-align:center;color:#fff;">ลำดับ</th>
										  <th width="20%" style="text-align:center;color:#fff;">วุฒิการศึกษา</th>
										  <th width="27%" style="text-align:center;color:#fff;">สาขา</th>
										  <th width="35%" style="text-align:center;color:#fff;">สถาบัน</th>
										  <th width="15%" style="text-align:center;color:#fff;">ปีที่จบ</th>
									  </tr>
								  </thead>
								  <tbody>
									  <tr>
										  <td width="8%"><span>1</span></td>
										  <td width="20%"><span>{{$optionsArray[Auth::user()->detail->graduated1]}}</span></td>
										  <td width="27%"><span>{{ Auth::user()->detail->faculty1 }}</span></td>
										  <td width="35%"><span>{{ Auth::user()->detail->institution1 }}</span></td>
										  <td width="15%"><span>{{ Auth::user()->detail->yearend1 }}</span></td>
									  </tr>
									  <tr>
										  <td width="8%"><span>2</span></td>
										  <td width="20%"><span>{{@$optionsArray[Auth::user()->detail->graduated2]}}</span></td>
										  <td width="27%"><span>{{ Auth::user()->detail->faculty2 }}</span></td>
										  <td width="35%"><span>{{ Auth::user()->detail->institution2 }}</span></td>
										  <td width="15%"><span>{{ Auth::user()->detail->yearend2 }}</span></td>
									  </tr>
									  <tr>
										  <td width="8%"><span>3</span></td>
										  <td width="20%"><span>{{@$optionsArray[Auth::user()->detail->graduated3]}}</span></td>
										  <td width="27%"><span>{{ Auth::user()->detail->faculty3 }}</span></td>
										  <td width="35%"><span>{{ Auth::user()->detail->institution3 }}</span></td>
										  <td width="15%"><span>{{ Auth::user()->detail->yearend3 }}</span></td>
									  </tr>
                                                        <tr>
                                                              <td width="8%"><span>4</span></td>
                                                              <td width="20%"><span>{{@$optionsArray[Auth::user()->detail->graduated4]}}</span></td>
                                                              <td width="27%"><span>{{ Auth::user()->detail->faculty4 }}</span></td>
                                                              <td width="45%"><span>{{ Auth::user()->detail->institution4 }}</span></td>
                                                              <td width="15%"><span>{{ Auth::user()->detail->yearend4 }}</span></td>
                                                        </tr>
                                                        <tr>
										  <td width="8%"><span>5</span></td>
										  <td width="20%"><span>{{@$optionsArray[Auth::user()->detail->graduated5]}}</span></td>
										  <td width="27%"><span>{{ Auth::user()->detail->faculty5 }}</span></td>
										  <td width="55%"><span>{{ Auth::user()->detail->institution5 }}</span></td>
										  <td width="15%"><span>{{ Auth::user()->detail->yearend5 }}</span></td>
									  </tr>
								  </tbody>
							  </table>
						</div>

						 </td>
					  </tr>
				</tbody>
			</table>
			<div class="page-break"></div>
			<table width="100%" border="0" bgcolor="#FFFFFF"   cellspacing="0" cellpadding="0" style="font-size: 16pt; line-height: 16pt;">
				<tbody>
					  <tr>
			  			<td width="100%">
						  <p>
							<strong style="font-weight: bold;">3.  ประวัติการทำงาน</strong>
						</p>
							<div style="margin-bottom:15px;">
									<p>1)  หน้าที่การงานและความรับผิดชอบในปัจจุบัน</p>
                                   <p style="padding-left:20px;">ปัจจุบันปฏิบัติหน้าที่</p>
                                   <p style="padding-left:20px;"><span style="width: 650px; ">.....{!! nl2br(Auth::user()->detail->nowWork) !!}.....</span></p>
                                   <p style="padding-left:20px;">สถานที่ปฏิบัติงาน</p>
                                   <p style="padding-left:20px;"><span style="width: 650px;">.....{!! nl2br(Auth::user()->detail->nowWorkPlace) !!}.....</span></p>
                                   <p style="padding-left:20px;">งานในความรับผิดชอบ</p>
                                   <p style="padding-left:20px;"><span style="width: 650px;">.....{{ Auth::user()->detail->nowRole }}.....</span></p>

							</div>
						</td>
					  </tr>
					  </tbody>
				</table>
				<div class="page-break"></div>
				<table width="100%" border="0" bgcolor="#FFFFFF"   cellspacing="0" cellpadding="0" style="font-size: 16pt; line-height: 16pt;">
					<tbody>
					  <tr>
			  			<td width="100%">
							<div style="margin-bottom:15px;">
							<p style="margin-bottom:10px;margin-top:10px;">2)  การปฏิบัติหน้าที่ในอดีต  (โปรดระบุเฉพาะหน้าที่ที่สำคัญ)</p>
								   <div style="padding-left:20px; margin-bottom:20px;">
										<table width="100%" border="1" bordercolor="#663300">
											<tr style="text-align:center; vertical-align: middle;line-height:14px;">
												<td width="8%" style="font-weight:bold; height:55px;">ลำดับ</td>
												<td width="35%" style="font-weight:bold;">ปฏิบัติหน้าที่</td>
												<td width="35%" style="font-weight:bold;">องค์กร</td>
												<td width="22%" style="font-weight:bold;">ระยะเวลา<br>การปฏิบัติหน้าที่</td>
											</tr>
											<tr style="text-align:left; vertical-align: top;line-height:14px;">
														<td width="8%" style="font-weight:bold; height:55px;text-align:center;">1</td>
												<td width="35%">{{ Auth::user()->detail->pastWork1 }}</td>
												<td width="35%">{{ Auth::user()->detail->pastOrganization1 }}</td>
												<td width="22%">{{ Auth::user()->detail->time1 }} ปี ({{ Auth::user()->detail->fromyear1 }} - {{ Auth::user()->detail->toyear1 }})</td>
											</tr>
											<tr style="text-align:left; vertical-align: top;line-height:14px;">
														<td width="8%" style="font-weight:bold; height:55px;text-align:center;">2</td>
														<td width="35%">{{ Auth::user()->detail->pastWork2 }}</td>
												<td width="35%">{{ Auth::user()->detail->pastOrganization2 }}</td>
												<td width="22%">
																		@if(!empty(Auth::user()->detail->time2))
																		{{ Auth::user()->detail->time2 }} ปี ({{ Auth::user()->detail->fromyear2 }} - {{ Auth::user()->detail->toyear2 }})
																		@endif
																	</td>
											</tr>
											<tr style="text-align:left; vertical-align: top;line-height:14px;">
														<td width="8%" style="font-weight:bold; height:55px;text-align:center;">3</td>
														<td width="35%">{{ Auth::user()->detail->pastWork3 }}</td>
												<td width="35%">{{ Auth::user()->detail->pastOrganization3 }}</td>
												<td width="22%">
																		@if(!empty(Auth::user()->detail->time3))
																		{{ Auth::user()->detail->time3 }} ปี ({{ Auth::user()->detail->fromyear3 }} - {{ Auth::user()->detail->toyear3 }})</td>
																		@endif
																	</td>
											</tr>
										</table>
									</div>
							</div>
						</td>
					  </tr>
					  </tbody>
				</table>


				<table width="100%" border="0" bgcolor="#FFFFFF"   cellspacing="0" cellpadding="0" style="font-size: 16pt; line-height: 16pt;">
					<tbody>
						<tr>
							<td width="100%">
								<div style="margin-bottom:15px;">
									<!-- <p><span style="border-bottom:1px dotted #000;width: 670px;">&nbsp;</span></p> -->
									<!-- <p><span style="border-bottom:1px dotted #000;width: 670px;">&nbsp;</span></p> -->
									<!-- <p><span style="border-bottom:1px dotted #000;width: 670px;">&nbsp;</span></p> -->
									<p style="margin-top:10px;">3)  ประสบการณ์สำคัญหรือประสบการณ์ที่ภาคภูมิใจที่สัมพันธ์กับประเภทกลุ่มผู้แทนองค์กรภาคเอกชนที่เลือกสมัคร</p>
									<p>.....{{ Auth::user()->detail->importantMemo }}.....</p>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
			<div class="page-break"></div>
			<table width="100%" border="0" bgcolor="#FFFFFF"   cellspacing="0" cellpadding="0" style="font-size: 16pt; line-height: 16pt;">
				<tbody>
					  <tr>
      					<td width="100%" style="background-color: #663300; color: #fff; line-height: 14px; vertical-align: middle;padding: 8px;">
						  <strong style="font-weight: bold;">ส่วนที่ 5  วิสัยทัศน์ของข้าพเจ้าต่อการพัฒนาระบบสุขภาพแห่งชาติ</strong>
						  </td>
      				</tr>
					  <tr>
						 <td width="100%">
						 <p><span>{{ Auth::user()->detail->vision }}</span></p><Br><br>
						 </td>
					  </tr>
					  <tr>
		  				<td>
						  <p style="padding-left:50px;">ทั้งนี้  ข้าพเจ้าได้แนบสำเนาเอกสารหรือหลักฐานที่แนบมาพร้อมใบสมัคร  </p>
						  <ul style="padding-left: 80px;">
							<li><span style="text-align:center;font-weight:bolder;border-radius:2px;border:1px solid #000; width: 12px; height: 12px; margin-right: 5px;line-height: 0.38;font-size:25px;">x</span>
								สำเนาบัตรประจำตัวประชาชนของผู้แทนองค์กรภาคเอกชน</li>
							<li><span style="text-align:center;font-weight:bolder;border-radius:2px;border:1px solid #000; width: 12px; height: 12px; margin-right: 5px;line-height: 0.38;font-size:25px;">x</span>
								รูปถ่ายหน้าตรงไม่สวมหมวก ไม่สวมแว่นตาดำ ฉากพื้นหลังไม่มีลวดลาย  ซึ่งถ่ายมาแล้วไม่เกิน  6  เดือน</li>
							<li><span style="text-align:center;font-weight:bolder;border-radius:2px;border:1px solid #000; width: 12px; height: 12px; margin-right: 5px;line-height: 0.38;font-size:25px;">x</span>
								แบบ สช./แบบขอขึ้นทะเบียนองค์กรภาคเอกชนและยืนยันการส่งผู้แทนภาคเอกชน/2562 <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;พร้อมเอกสารหลักฐานประกอบ 1 ชุด </li>
							</ul><Br><br>
							<p style="position:relative;"><span style="padding-left:50px;">&nbsp;</span><span style="text-align:center;font-weight:bolder;border-radius:2px;border:1px solid #000; width: 12px; height: 12px; margin-right: 5px;line-height: 0.38;font-size:25px;">x</span>ข้าพเจ้าขอรับรองว่าข้อมูลที่กรอกข้างต้น  และเอกสารที่แนบมาพร้อมใบสมัครเป็นความจริงทุกประการ
							หากมีข้อมูลใดเป็นเท็จหรือไม่ตรงกับความเป็นจริง   ข้าพเจ้ายินยอมให้ถูกตัดสิทธิ์จากการเป็นผู้สมัครหรือผู้ถูกเสนอชื่อในครั้งนี้</p>
						</td>
					  </tr>

      			</tbody>
      		</table>
      	</div><!--end control-pdf-->
      </body>
</html>
