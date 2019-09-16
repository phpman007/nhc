<!DOCTYPE html>
<html lang="en" dir="ltr">
      <head>
            <meta charset="utf-8">
            <title>แบบฟอร์ม สช./ใบสมัครผู้ทรงคุณวุฒิ/2562</title>
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
            .page-break {
                page-break-after: always;
            }
	      body{
	            font-family: "THBaijam";
	            color:#006600;
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
				/* background-image: url(http://192.168.200.1/frontend/images/dot.jpg);
				background-repeat: repeat;
				background-position: left 30px; 
				background-size: auto 20px; */
				word-wrap: break-word;
				word-break: break-all;
			  }
			  .box-profile{
				  width:90px;
				  height:120px;
				  background-color:#eee;
				  overflow:hidden;
				  float:right;
				  margin-top:15px;
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
      				<td width="65%" style="vertical-align: middle;">แบบฟอร์ม สช./ใบสมัครผู้ทรงคุณวุฒิ/2562</td>
      				<td width="35%" ></td>
      			</tr>
      		</table>
      		<br>
      		<table width="100%" border="0" bgcolor="#FFFFFF" align="center"  cellspacing="0" cellpadding="0" style="font-size: 16pt; line-height: 14pt;" >
      			<tr>
      				<td width="20%" style="vertical-align: middle;">
      					<div style="margin-top:20px;text-align: center;"><img src="http://192.168.200.1/frontend/images/logo-small.png" alt="" style="height:120px;"></div>
      				</td>
      				<td width="55%" style="vertical-align: middle;">
      					<div style="text-align: center;">
      						<h1>ใบสมัครผู้ทรงคุณวุฒิ<br>เข้ารับการเลือกเป็นกรรมการสุขภาพแห่งชาติ <br>พ.ศ. 2562</h1>
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
      							<strong>วัน <span style="border-bottom:1px dotted #006600;width: 30px;"> {{ Auth::user()->created_at->addYears('543')->format('d') }}</span></strong>
      							<strong>เดือน <span style="border-bottom:1px dotted #006600;width: 120px;"> {{ Helper::monthThai(Auth::user()->created_at->addYears('543')->format('m')) }}</span></strong>
      							<strong>พ.ศ. <span style="border-bottom:1px dotted #006600;width: 70px;"> {{ Auth::user()->created_at->addYears('543')->format('Y') }}</span></strong>
      						</div>
      					</td>
      				</tr>
      				<tr>
      					<td width="100%">
      						<strong style="padding-left: 50px;">ข้าพเจ้า  <span style="border-bottom:1px dotted #006600; width: 617px;">{{ $member->nameTitle  }} {{ $member->firstname  }} {{ $member->lastname  }} </span></strong>
      					</td>
      				</tr>
      				<tr>
      					<td width="100%" style="padding-bottom: 10px;">
      						<strong style="padding-left: 50px;">มีความประสงค์จะสมัครเข้ารับการเลือกเป็นกรรมการสุขภาพแห่งชาติ  จึงขอส่งใบสมัครของข้าพเจ้ามายัง<BR>ประธานคณะกรรมการสรรหา</strong>
      					</td>
      				</tr>
      				<tr>
      					<td width="100%" style="background-color: #006600; color: #fff; line-height: 14px; vertical-align: middle;padding: 8px;"><strong style="font-weight: bold;">ส่วนที่  1	คุณสมบัติ</strong></td>
      				</tr>
      				<tr>
      					<td width="100%;" style="padding:10px 0 0 10px;">
      						<p>ข้าพเจ้าเป็นผู้มีคุณสมบัติของผู้ทรงคุณวุฒิที่จะเข้ารับการเลือกเป็นกรรมการสุขภาพแห่งชาติครบถ้วน  ดังนี้ </p>
      						<p><strong style="font-weight: bold;">1. คุณสมบัติทั่วไป</strong></p>
      						<ul style="padding-left: 50px; margin-bottom: 10px;">
      							<li><span style="text-align:center;font-weight:bolder;border-radius:2px;border:1px solid #006600; width: 12px; height: 12px; margin-right: 5px;line-height: 0.38;font-size:25px;">x</span> มีสัญชาติไทย</li>
      							<li><span style="text-align:center;font-weight:bolder;border-radius:2px;border:1px solid #006600; width: 12px; height: 12px; margin-right: 5px;line-height: 0.38;font-size:25px;">x</span> มีอายุไม่ต่ำกว่ายี่สิบปีบริบูรณ์ ณ วันที่สมัคร</li>
      							<li><span style="text-align:center;font-weight:bolder;border-radius:2px;border:1px solid #006600; width: 12px; height: 12px; margin-right: 5px;line-height: 0.38;font-size:25px;">x</span> ไม่เป็นผู้มีความผิดปกติทางจิตอันเป็นอุปสรรคต่อการปฏิบัติหน้าที่</li>
      							<li><span style="text-align:center;font-weight:bolder;border-radius:2px;border:1px solid #006600; width: 12px; height: 12px; margin-right: 5px;line-height: 0.38;font-size:25px;">x</span> ไม่ติดยาเสพติดให้โทษ</li>
      							<li><span style="text-align:center;font-weight:bolder;border-radius:2px;border:1px solid #006600; width: 12px; height: 12px; margin-right: 5px;line-height: 0.38;font-size:25px;">x</span> ไม่เคยถูกลงโทษทางวินัยถึงไล่ออก ปลดออก หรือให้ออกจากหน่วยงานรัฐ</li>
      							<li><span style="text-align:center;font-weight:bolder;border-radius:2px;border:1px solid #006600; width: 12px; height: 12px; margin-right: 5px;line-height: 0.38;font-size:25px;">x</span> ไม่เคยได้รับโทษจำคุกโดยคำพิพากษาถึงที่สุดให้จำคุก เว้นแต่เป็นโทษ สำหรับความผิดที่ได้
     							กระทำโดยประมาทหรือความผิดลหุโทษ</li>
      						</ul>
							<p><strong style="font-weight: bold;">2.  คุณสมบัติเฉพาะ</strong></p>
      						<ul style="padding-left: 50px; margin-bottom: 10px;">
      							<li><span style="text-align:center;font-weight:bolder;border-radius:2px;border:1px solid #006600; width: 12px; height: 12px; margin-right: 5px;line-height: 0.38;font-size:25px;">x</span> ไม่เป็นผู้ประกอบวิชาชีพด้านสาธารณสุขตามนิยามในพระราชบัญญัติสุขภาพแห่งชาติ พ.ศ. 2550</li>
      							<li><span style="text-align:center;font-weight:bolder;border-radius:2px;border:1px solid #006600; width: 12px; height: 12px; margin-right: 5px;line-height: 0.38;font-size:25px;">x</span> มีประสบการณ์การทำงานไม่น้อยกว่า 10 ปี </li>
      							<li><span style="text-align:center;font-weight:bolder;border-radius:2px;border:1px solid #006600; width: 12px; height: 12px; margin-right: 5px;line-height: 0.38;font-size:25px;">x</span> มีผลงานเป็นที่ประจักษ์ที่สอดคล้องกับประเภทกลุ่มผู้ทรงคุณวุฒิที่เลือกสมัคร</li>
      						</ul>
      					</td>
      				</tr>
				</tbody>
			</table>
			<div class="page-break"></div><br>
			<table width="100%" border="0" bgcolor="#FFFFFF"   cellspacing="0" cellpadding="0" style="font-size: 16pt; line-height: 16pt;">
      			<tbody>	  
      				<tr>
      					<td width="100%" style="background-color: #006600; color: #fff; line-height: 14px; vertical-align: middle;padding: 8px;"><strong style="font-weight: bold;">ส่วนที่  2	การแสดงเจตนาสมัครเข้ากลุ่ม</strong></td>
      				</tr>
      				<tr>
      					<td width="100%;" style="padding:10px 0 0 10px;">
      						<ul style="padding-left: 80px;">
		  						<li>ข้าพเจ้ามีความประสงค์ที่จะสมัครเป็นกรรมการสุขภาพแห่งชาติจากผู้ทรงคุณวุฒิในกลุ่ม</li>
                                        @foreach(DB::table('senior_groups')->get() as $key => $group)
                                        <li><span style="text-align:center;font-weight:bolder;border-radius:2px;border:1px solid #006600; width: 12px; height: 12px; margin-right: 5px;line-height: 0.38;font-size:25px;">{{ $member->seniorGroupId == $group->id ? 'x' :  '' }}</span>{{ $group->groupName }}</li>
                                        @endforeach
      						</ul>
      						<p  style="padding-left: 80px; margin-bottom:20px;"><strong style="border-bottom:1px solid #006600; font-weight: bold;">หมายเหตุ</strong> ผู้ทรงคุณวุฒิสามารถสมัครได้กลุ่มใดกลุ่มหนึ่งใน 6 กลุ่มนี้ เท่านั้น</p>
      					</td>
      				</tr>
      				<tr>
      					<td width="100%" style="background-color: #006600; color: #fff; line-height: 14px; vertical-align: middle;padding: 8px;">
						  <strong style="font-weight: bold;">ส่วนที่  3	 ข้อมูลยืนยันตัวตนของผู้สมัครเพื่อเข้าสู่ระบบการสรรหากรรมการสุขภาพ 		 แห่งชาติแบบอิเล็กทรอนิกส์</strong></td>
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
		  					<p><span style="border-bottom:1px dotted #006600; width: 720px;">{{ $member->email }}</span></p>
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
							  <p style="padding-left: 50px; margin-top:10px;"><strong style="border-bottom:1px solid #006600; font-weight: bold;">หมายเหตุ</strong> 1. กรุณากำหนดรหัสผ่าน (Password) ของท่านเพื่อยืนยันตัวตนเข้าสู่ระบบสมัคร
         					<Br>2. กำหนดรหัสผ่าน (Password) เป็นตัวอักษรภาษาอังกฤษ และมีตัวเลขด้วย รวมกันจำนวน  8 ตัวอักษร </p>
      					</td>
      				</tr>
				</tbody>
			</table>
			<div class="page-break"></div><br>
			<table width="100%" border="0" bgcolor="#FFFFFF"   cellspacing="0" cellpadding="0" style="font-size: 16pt; line-height: 16pt;">
      			<tbody>		  
					<tr>
      					<td width="100%" style="background-color: #006600; color: #fff; line-height: 14px; vertical-align: middle;padding: 8px;"><strong style="font-weight: bold;">ส่วนที่  4	ข้อมูลประวัติ</strong></td>
      				</tr>
					  <tr>
					 	 <td width="100%">
						  <p style="font-weight: bold;">1.  ข้อมูลทั่วไป</p>
						  <div style="padding-left:30px;">
							<p>
								<strong>1)	คำนำหน้าชื่อ <span style="border-bottom:1px dotted #006600; width: 570px;"> {{ $member->nameTitle  }}</span></strong>
							</p>
							<p style="padding-left:20px;">
								<strong>ชื่อ <span style="border-bottom:1px dotted #006600; width: 250px;"> {{ $member->firstname  }}</span></strong>
								<strong>นามสกุล <span style="border-bottom:1px dotted #006600; width: 320px;">{{ $member->lastname  }}</span></strong>
							</p>
							<p>
								<strong>2)	เกิดวันที่ <span style="border-bottom:1px dotted #006600; width: 80px;"> {{ Carbon\Carbon::createFromFormat("Y-m-d",$member->detail->dateOfBirth)->addYears('543')->format('d') }}</span></strong>
								<strong>เดือน <span style="border-bottom:1px dotted #006600; width:195px;"> {{ Helper::monthThai(Carbon\Carbon::createFromFormat("Y-m-d",$member->detail->dateOfBirth)->addYears('543')->format('m')) }}</span></strong>
								<strong>พ.ศ <span style="border-bottom:1px dotted #006600; width: 130px;"> {{ Carbon\Carbon::createFromFormat("Y-m-d",$member->detail->dateOfBirth)->addYears('543')->format('Y') }}</span></strong>
								<strong>อายุ <span style="border-bottom:1px dotted #006600; width: 80px;">
                                             <?php
                                             $yearSelect = \Carbon\Carbon::createFromFormat('Y-m-d',$member->detail->dateOfBirth);
                                           	$yearNow = \Carbon\Carbon::now()->diffInYears($yearSelect);
                                              ?>
                                              {{ $yearNow }}
                                         </span> ปี</strong>
							</p>
							<p>
								<strong>3)	เพศ <span style="text-align:center;font-weight:bolder;border-radius:2px;border:1px solid #006600; width: 12px; height: 12px; margin-right: 5px;line-height: 0.38;font-size:25px;">{{$member->detail->genderId == 1 ? "x" :''}}</span>
								 ชาย <span style="text-align:center;font-weight:bolder;border-radius:2px;border:1px solid #006600; width: 12px; height: 12px; margin-right: 5px;line-height: 0.38;font-size:25px;">{{$member->detail->genderId == 2 ? "x" :''}}</span>
								 หญิง <span style="text-align:center;font-weight:bolder;border-radius:2px;border:1px solid #006600; width: 12px; height: 12px; margin-right: 5px;line-height: 0.38;font-size:25px;">{{$member->detail->genderId == 3 ? "x" :''}}</span>
								 นักบวช/สมณะเพศ </span>
								</strong>
							</p>
						  </div>
						 </td>
					  </tr>
					  <tr>
						  <td width="100%">
						  	<p style="padding-left:30px;">
								<strong>4) สถานที่ที่สามารถติดต่อได้สะดวก</strong>
							</p>
							<p style="padding-left:50px;">
								<strong><span style="text-align:center;font-weight:bolder;border-radius:2px;border:1px solid #006600; width: 12px; height: 12px; margin-right: 5px;line-height: 0.38;font-size:25px;">{{$member->detail->addressType == 1 ? "x" :''}}</span> บ้าน
								<span style="text-align:center;font-weight:bolder;border-radius:2px;border:1px solid #006600; width: 12px; height: 12px; margin-right: 5px;line-height: 0.38;font-size:25px;">{{$member->detail->addressType == 2 ? "x" :''}}</span> ที่ทำงาน
								<span style="border-bottom:1px dotted #006600; width: 505px;">{{ @Auth::user()->detail->workPlaceName }}</span>
								</strong>
							</p>
						  </td>
					  </tr>
					  <tr>
						  <td width="100%">
						 	 <p style="padding-left:30px;">
								<strong>เลขที่ <span style="border-bottom:1px dotted #006600; width: 130px;"> {{ @Auth::user()->detail->no }}</span></strong>
								<strong>หมู่ที่ <span style="border-bottom:1px dotted #006600; width:150px;"> {{ @Auth::user()->detail->moo }}</span></strong>
								<strong>ตรอก/ซอย <span style="border-bottom:1px dotted #006600; width: 240px;"> {{ @Auth::user()->detail->soi }}</span></strong>
							</p>
						  </td>
					  </tr>
					  <tr>
						  <td width="100%">
						 	 <p style="padding-left:30px;">
								<strong>ถนน <span style="border-bottom:1px dotted #006600; width: 255px;"> {{ @Auth::user()->detail->street }}</span></strong>
								<strong>ตำบล/แขวง <span style="border-bottom:1px dotted #006600; width:300px;"> {{ Auth::user()->detail->subdistrict->district }}</span></strong>
							</p>
						  </td>
					  </tr>
					  <tr>
						  <td width="100%">
						  <p style="padding-left:30px;">
								<strong>อำเภอ/เขต <span style="border-bottom:1px dotted #006600; width: 190px;"> {{ Auth::user()->detail->district->amphoe }}</span></strong>
								<strong>จังหวัด <span style="border-bottom:1px dotted #006600; width:155px;"> {{ Auth::user()->detail->province->province }}</span></strong>
								<strong>รหัสไปรษณีย์ <span style="border-bottom:1px dotted #006600; width:120px;"> {{ Auth::user()->detail->zipCode }}</span></strong>
							</p>
						  </td>
					  </tr>
					  <tr>
						  <td width="100%">
						  <p style="padding-left:30px;">
								<strong>เบอร์โทรศัพท์ที่ 1 : <span style="border-bottom:1px dotted #006600; width: 210px;"> {{ Auth::user()->detail->tel }}</span></strong>
								<strong>เบอร์โทรศัพท์ที่ 2 : <span style="border-bottom:1px dotted #006600; width:230px;"> {{ Auth::user()->detail->mobile }}</span></strong>
							</p><br>
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
		  					<table border="1"  style="width:100%; " class="table-border">
								  <thead>
									  <tr style="background-color: #006600;">
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
										  <td width="27%"><span>{!! @Auth::user()->detail->faculty1 !!}</span></td>
										  <td width="35%"><span>{{ @Auth::user()->detail->institution1 }}</span></td>
										  <td width="15%"><span>{{ @Auth::user()->detail->yearend1 }}</span></td>
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
							<p><strong style="font-weight: bold;">3.  ประวัติการทำงาน</strong></p>
						</td>
					</tr>
					<tr>
						<td width="100%">
							<div style="padding-left:30px; margin-bottom:15px;">
								<p>1)  หน้าที่การงานและความรับผิดชอบในปัจจุบัน</p>
								<p style="padding-left:20px;">ปัจจุบันปฏิบัติหน้าที่</p>
								<p style="padding-left:20px;"><span class="box-dot" style="width: 650px; ">.....{!! nl2br(Auth::user()->detail->nowWork) !!}.....</span></p>
								<p style="padding-left:20px;">สถานที่ปฏิบัติงาน</p>
								<p style="padding-left:20px;"><span class="box-dot" style="width: 650px;">.....{!! nl2br(Auth::user()->detail->nowWorkPlace) !!}.....</span></p>
								<p style="padding-left:20px;">งานในความรับผิดชอบ</p>
								<p style="padding-left:20px;"><span class="box-dot" style="width: 650px;">.....{{ Auth::user()->detail->nowRole }}.....</span></p>
								<!-- <p><span style="border-bottom:1px dotted #006600; width: 670px;">&nbsp;</span></p>
								<p><span style="border-bottom:1px dotted #006600; width: 670px;">&nbsp;</span></p> -->
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
							<div style="padding-left:30px; margin-bottom:15px;">
								<p style="margin-bottom:10px;margin-top:10px;">2)  การปฏิบัติหน้าที่ในอดีต  (โปรดระบุเฉพาะหน้าที่ที่สำคัญ)</p>
								<div style="padding-left:20px; margin-bottom:20px;">
									<table width="100%" border="1" bordercolor="#006600">
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
      					<td width="100%" >
							<div style="padding-left:30px; margin-bottom:15px;">
								<p style="margin-top:10px;">3)  ประสบการณ์สำคัญหรือประสบการณ์ที่ภาคภูมิใจที่สัมพันธ์กับประเภทกลุ่มผู้ทรงคุณวุฒิที่เลือกสมัคร</p>
								<p><span style="width: 700px;">.....{{ Auth::user()->detail->importantMemo }}.....</span></p><br>
							</div>
						</td>
      				</tr>
				</tbody>
			</table>	
			<div class="page-break"></div><Br>
			<table width="100%" border="0" bgcolor="#FFFFFF"   cellspacing="0" cellpadding="0" style="font-size: 16pt; line-height: 16pt;">
      			<tbody>		  
					<tr>
      					<td width="100%" style="background-color: #006600; color: #fff; line-height: 14px; vertical-align: middle;padding: 8px;">
						  <strong style="font-weight: bold;">ส่วนที่ 5  วิสัยทัศน์ของข้าพเจ้าต่อการพัฒนาระบบสุขภาพแห่งชาติ</strong>
						</td>
      				</tr>
					<tr>
						<td width="100%">
							<p><span style="width: 720px;">.....{{ Auth::user()->detail->vision }}.....</span></p><Br>
						</td>
					</tr>
				</tbody>
			</table>	
			<div class="page-break"></div><Br>	
			<table width="100%" border="0" bgcolor="#FFFFFF"   cellspacing="0" cellpadding="0" style="font-size: 16pt; line-height: 16pt;">
      			<tbody>		
					<tr>
		  				<td>
						  <p style="padding-left:50px;">ทั้งนี้  ข้าพเจ้าได้แนบสำเนาเอกสารหรือหลักฐานที่แนบมาพร้อมใบสมัคร  </p>
						  <ul style="padding-left: 80px;">
							<li><span style="text-align:center;font-weight:bolder;border-radius:2px;border:1px solid #006600; width: 12px; height: 12px; margin-right: 5px;line-height: 0.38;font-size:25px;">x</span>
								สำเนาบัตรประจำตัวประชาชน</li>
							<li><span style="text-align:center;font-weight:bolder;border-radius:2px;border:1px solid #006600; width: 12px; height: 12px; margin-right: 5px;line-height: 0.38;font-size:25px;">x</span>
								รูปถ่ายหน้าตรงไม่สวมหมวก ไม่สวมแว่นตาดำ ฉากพื้นหลังไม่มีลวดลาย  ซึ่งถ่ายมาแล้วไม่เกิน  6  เดือน</li>
							<li><span style="text-align:center;font-weight:bolder;border-radius:2px;border:1px solid #006600; width: 12px; height: 12px; margin-right: 5px;line-height: 0.38;font-size:25px;">x</span>
								เอกสารสรุปผลงานอันเป็นที่ประจักษ์ ที่สอดคล้องกับประเภทกลุ่มผู้ทรงคุณวุฒิที่เลือกสมัคร<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(ไม่เกิน 2 หน้ากระดาษ A4) พิมพ์โดยใช้ตัวอักษรขนาดไม่ต่ำกว่า 16</li>
							</ul>
							<p style="position:relative;"><span style="padding-left:50px;">&nbsp;</span><span style="text-align:center;font-weight:bolder;border-radius:2px;border:1px solid #006600; width: 12px; height: 12px; margin-right: 5px;line-height: 0.38;font-size:25px;">x</span>ข้าพเจ้าขอรับรองว่าข้อมูลที่กรอกข้างต้น  และเอกสารที่แนบมาพร้อมใบสมัครเป็นความจริงทุกประการ
							หากมีข้อมูลใดเป็นเท็จหรือไม่ตรงกับความเป็นจริง   ข้าพเจ้ายินยอมให้ถูกตัดสิทธิ์จากการเป็นผู้สมัครหรือผู้ถูกเสนอชื่อในครั้งนี้</p>
						</td>
					  </tr>
      			</tbody>
      		</table>
      	</div><!--end control-pdf-->

      </body>
</html>
