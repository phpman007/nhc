<!DOCTYPE html>
<html lang="en" dir="ltr">
      <head>
            <meta charset="utf-8">
            <title>ผู้แทนองค์กรปกครองส่วนท้องถิ่น</title>
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
      				<td width="65%" style="vertical-align: middle;">แบบฟอร์ม สช./ใบสมัครผู้แทนองค์กรปกครองส่วนท้องถิ่น/2562</td>
      				<td width="35%" ></td>
      			</tr>
      		</table>
      		<br>
      		<table width="100%" border="0" bgcolor="#FFFFFF" align="center"  cellspacing="0" cellpadding="0" style="font-size: 16pt; line-height: 14pt;" >
      			<tr>
      				<td width="20%" style="vertical-align: middle;">
      				<div style="margin-top:20px;text-align: center;"><img src="http://192.168.200.1/frontend/images/logo-small.png" alt="" style="height:120px;"></div>
      				</td>
      				<td width="70%" style="vertical-align: middle;">
      					<div style="text-align: center;">
      						<h1>ใบสมัครผู้แทนองค์กรปกครองส่วนท้องถิ่น<br>เข้ารับการเลือกเป็นกรรมการสุขภาพแห่งชาติ <br>พ.ศ. 2562</h1>
      					</div>
      				</td>
      				<td width="10%"></td>
      			</tr>
      		</table>
      		<br>
      		<table width="100%" border="0" bgcolor="#FFFFFF"   cellspacing="0" cellpadding="0" style="font-size: 16pt; line-height: 16pt;">
      			<tbody>
      				<tr>
      					<td width="100%">
      						<div style="text-align: left;">
      							<strong>จังหวัด <span style="border-bottom:1px dotted #006600;width: 30px;"> </span></strong>
      							<strong>เดือน <span style="border-bottom:1px dotted #006600;width: 120px;"> </span></strong>
      							<strong>พ.ศ. <span style="border-bottom:1px dotted #006600;width: 70px;"> </span></strong>
      						</div>
      					</td>
      				</tr>
      				<tr>
      					<td width="100%">
      						<strong style="padding-left: 50px;">ข้าพเจ้า  <span style="border-bottom:1px dotted #006600; width: 510px;"> </span></strong>
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
      						<p>ข้าพเจ้าเป็นผู้มีคุณสมบัติของผู้ทรงคุณวุฒิที่จะเข้ารับการเลือกเป็นกรรมการสุขภาพแห่งชาติครบถ้วน  ตามมาตรา ๑๔ แห่งพระราชบัญญัติสุขภาพแห่งชาติ พ.ศ. 2550 ดังนี้ </p>
      						<p><strong style="font-weight: bold;">คุณสมบัติทั่วไป</strong></p>
      						<ul style="padding-left: 50px; margin-bottom: 10px;">
      							<li>1. มีสัญชาติไทย</li>
      							<li>2. มีอายุไม่ต่ำกว่ายี่สิบปีบริบูรณ์  </li>
      							<li>3. ไม่เป็นคนไร้ความสามารถหรือคนเสมือนไร้ความสามารถ  </li>
      							<li>4. ไม่ติดยาเสพติดให้โทษ</li>
      							<li>5. ไม่เคยถูกลงโทษไล่ออก ปลดออก เลิกจ้าง หรือพ้นจากตำแหน่ง เพราะเหตุจากการทุจริต หรือประพฤติมิชอบ </li>
      							<li>6.  ไม่เคยได้รับโทษจำคุกโดยคำพิพากษาถึงที่สุดให้จำคุก ไม่ว่าจะถูกจำคุกจริงหรือไม่ก็ตาม เว้นแต่เป็นโทษสำหรับความผิดที่ได้กระทำโดยประมาทหรือความผิดลหุโทษ</li>
      						</ul><br>
      					</td>
      				</tr>
      				<tr>
      					<td width="100%" style="background-color: #006600; color: #fff; line-height: 14px; vertical-align: middle;padding: 8px;">
						  <strong style="font-weight: bold;">ส่วนที่  2	การแสดงเจตนาสมัครเข้ากลุ่ม</strong></td>
      				</tr>
      				<tr>
      					<td width="100%;" style="padding:10px 0 0 10px;">
      						<ul style="padding-left: 80px;">
		  						<li>ข้าพเจ้ามีความประสงค์ที่จะสมัครเป็นกรรมการสุขภาพแห่งชาติจากผู้แทนองค์กรปกครองส่วนท้องถิ่นในกลุ่ม </li>
      							<li><span style="border-radius:2px;border:1px solid #006600; width: 12px; height: 12px; margin-right: 5px;"></span> ผู้แทนนายกองค์กรบริหารส่วนจังหวัด</li>
      							<li><span style="border-radius:2px;border:1px solid #006600; width: 12px; height: 12px; margin-right: 5px;"></span> ผู้แทนนายกเทศมนตรี</li>
      							<li><span style="border-radius:2px;border:1px solid #006600; width: 12px; height: 12px; margin-right: 5px;"></span> ผู้แทนนายกองค์การบริหารส่วนตำบล</li>
      						</ul><Br><br>
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
      								<td style="text-align: center; vertical-align: middle; width: 20px;">
      									<span style="display: block; height: 16pt;"></span>
      								</td>
      								<td style="text-align: center; vertical-align: middle; width: 20px;">
      									<span style="display: block; height: 16pt;"></span>
      								</td>
      								<td style="text-align: center; vertical-align: middle; width: 20px;">
      									<span style="display: block; height: 16pt;"></span>
      								</td>
      								<td style="text-align: center; vertical-align: middle; width: 20px;">
      									<span style="display: block; height: 16pt;"></span>
      								</td>
      								<td style="text-align: center; vertical-align: middle; width: 20px;">
      									<span style="display: block; height: 16pt;"></span>
      								</td>
      								<td style="text-align: center; vertical-align: middle; width: 20px;">
      									<span style="display: block; height: 16pt;"></span>
      								</td>
      								<td style="text-align: center; vertical-align: middle; width: 20px;">
      									<span style="display: block; height: 16pt;"></span>
      								</td>
      								<td style="text-align: center; vertical-align: middle; width: 20px;">
      									<span style="display: block; height: 16pt;"></span>
      								</td>
      								<td style="text-align: center; vertical-align: middle; width: 20px;">
      									<span style="display: block; height: 16pt;"></span>
      								</td>
      								<td style="text-align: center; vertical-align: middle; width: 20px;">
      									<span style="display: block; height: 16pt;"></span>
      								</td>
      								<td style="text-align: center; vertical-align: middle; width: 20px;">
      									<span style="display: block; height: 16pt;"></span>
      								</td>
      								<td style="text-align: center; vertical-align: middle; width: 20px;">
      									<span style="display: block; height: 16pt;"></span>
      								</td>
      								<td style="text-align: center; vertical-align: middle; width: 20px;">
      									<span style="display: block; height: 16pt;"></span>
      								</td>
      							</tr>
      						</table>
      					</td>
      				</tr>
					  <tr>
      					<td width="100%" style="padding-bottom: 20px;">
      						<p style="font-weight: bold;">2. อีเมล (Email) </p>
		  					<p><span style="border-bottom:1px dotted #006600; width: 720px;">&nbsp;</span></p>
      					</td>
      				</tr>
					  <tr>
      					<td width="100%" style="padding-bottom: 20px;">
      						<p style="font-weight: bold;margin-bottom: 10px;">3. รหัสผ่าน (Password)</p>
      						<table class="table-id" width="216px" border="1" style="padding-left: 50px;font-size: 18pt; line-height: 16pt;">
      							<tr>
      								<td style="text-align: center; vertical-align: middle; width: 20px;">
      									<span style="display: block; height: 16pt;"></span>
      								</td>
      								<td style="text-align: center; vertical-align: middle; width: 20px;">
      									<span style="display: block; height: 16pt;"></span>
      								</td>
      								<td style="text-align: center; vertical-align: middle; width: 20px;">
      									<span style="display: block; height: 16pt;"></span>
      								</td>
      								<td style="text-align: center; vertical-align: middle; width: 20px;">
      									<span style="display: block; height: 16pt;"></span>
      								</td>
      								<td style="text-align: center; vertical-align: middle; width: 20px;">
      									<span style="display: block; height: 16pt;"></span>
      								</td>
      								<td style="text-align: center; vertical-align: middle; width: 20px;">
      									<span style="display: block; height: 16pt;"></span>
      								</td>
      								<td style="text-align: center; vertical-align: middle; width: 20px;">
      									<span style="display: block; height: 16pt;"></span>
      								</td>
      							</tr>
      						</table>
							  <p style="padding-left: 50px; margin-top:10px;"><strong style="border-bottom:1px solid #006600; font-weight: bold;">หมายเหตุ</strong> ๑. กรุณากำหนดรหัสผ่าน (Password) ของท่านเพื่อยืนยันตัวตนเข้าสู่ระบบสมัคร
         					<Br>2. กำหนดรหัสผ่าน (Password) เป็นตัวอักษรภาษาอังกฤษ และมีตัวเลขด้วย รวมกันจำนวน  8 ตัวอักษร </p>
      					</td>
      				</tr>
					  <tr>
      					<td width="100%" style="background-color: #006600; color: #fff; line-height: 14px; vertical-align: middle;padding: 8px;"><strong style="font-weight: bold;">ส่วนที่  ๔	ข้อมูลประวัติ</strong></td>
      				</tr>
					  <tr>
					 	 <td width="100%">
						  <p style="font-weight: bold;">1.  ข้อมูลทั่วไป</p>
						  <div style="padding-left:30px;">
							<p>
								<strong>1)	คำนำหน้าชื่อ <span style="border-bottom:1px dotted #006600; width: 570px;"> </span></strong>
							</p>
							<p style="padding-left:20px;">
								<strong>ชื่อ <span style="border-bottom:1px dotted #006600; width: 250px;"> </span></strong>
								<strong>นามสกุล <span style="border-bottom:1px dotted #006600; width: 320px;"></span></strong>
							</p>
							<p>
								<strong>2)	เกิดวันที่ <span style="border-bottom:1px dotted #006600; width: 80px;"> </span></strong>
								<strong>เดือน <span style="border-bottom:1px dotted #006600; width:195px;"> </span></strong>
								<strong>พ.ศ <span style="border-bottom:1px dotted #006600; width: 130px;"> </span></strong>
								<strong>อายุ <span style="border-bottom:1px dotted #006600; width: 80px;"> </span> ปี</strong>
							</p>
							<p>
								<strong>3)	เพศ <span style="border-radius:2px;border:1px solid #006600; width: 12px; height: 12px; margin-right: 5px; margin-left: 5px;"></span>
								 ชาย <span style="border-radius:2px;border:1px solid #006600; width: 12px; height: 12px; margin-right: 5px; margin-left: 5px;"></span>
								 หญิง <span style="border-radius:2px;border:1px solid #006600; width: 12px; height: 12px; margin-right: 5px; margin-left: 5px;"></span>
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
								<strong><span style="border-radius:2px;border:1px solid #006600; width: 12px; height: 12px; margin-right: 1px; margin-left: 5px;"></span> บ้าน
								<span style="border-radius:2px;border:1px solid #006600; width: 12px; height: 12px; margin-right: 5px; margin-left: 5px;"></span> ที่ทำงาน
								<span style="border-bottom:1px dotted #006600; width: 505px;"></span>
								</strong>
							</p>
						  </td>
					  </tr>
					  <tr>
						  <td width="100%">
						 	 <p style="padding-left:30px;">
								<strong>เลขที่ <span style="border-bottom:1px dotted #006600; width: 130px;"> </span></strong>
								<strong>หมู่ที่ <span style="border-bottom:1px dotted #006600; width:150px;"> </span></strong>
								<strong>ตรอก/ซอย <span style="border-bottom:1px dotted #006600; width: 240px;"> </span></strong>
							</p>
						  </td>
					  </tr>
					  <tr>
						  <td width="100%">
						 	 <p style="padding-left:30px;">
								<strong>ถนน <span style="border-bottom:1px dotted #006600; width: 255px;"> </span></strong>
								<strong>ตำบล/แขวง <span style="border-bottom:1px dotted #006600; width:300px;"> </span></strong>
							</p>
						  </td>
					  </tr>
					  <tr>
						  <td width="100%">
						  <p style="padding-left:30px;">
								<strong>อำเภอ/เขต <span style="border-bottom:1px dotted #006600; width: 190px;"> </span></strong>
								<strong>จังหวัด <span style="border-bottom:1px dotted #006600; width:155px;"> </span></strong>
								<strong>รหัสไปรษณีย์ <span style="border-bottom:1px dotted #006600; width:120px;"> </span></strong>
							</p>
						  </td>
					  </tr>
					  <tr>
						  <td width="100%">
						  <p style="padding-left:30px;">
								<strong>โทรศัพท์ <span style="border-bottom:1px dotted #006600; width: 210px;"> </span></strong>
								<strong>โทรศัพท์เคลื่อนที่ (มือถือ) <span style="border-bottom:1px dotted #006600; width:250px;"> </span></strong>
							</p><br>
						  </td>
					  </tr>
					  <tr>
					 	 <td width="100%">
						  <p>
							<strong style="font-weight: bold;">2.  ประวัติการศึกษา</strong> (เรียงจากวุฒิการศึกษาสูงสุดลงไปตามลำดับ)
						</p>
						<div style="margin-bottom:15px;margin-top:15px;">
		  					<table border="1"  style="width:100%;" class="table-border">
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
										  <td width="20%"><span></span></td>
										  <td width="27%"><span></span></td>
										  <td width="35%"><span></span></td>
										  <td width="15%"><span></span></td>
									  </tr>
									  <tr>
										  <td width="8%"><span>2</span></td>
										  <td width="20%"><span></span></td>
										  <td width="27%"><span></span></td>
										  <td width="35%"><span></span></td>
										  <td width="15%"><span></span></td>
									  </tr>
								  </tbody>
							  </table>
						</div>
						<div style="padding-left:30px; margin-bottom:15px;" style="display:none;">
								<p>
									<strong>1) <span style="border-bottom:1px dotted #006600; width: 335px;">ระบบสารสนเทศทางคอมพิวเตอร์</span></strong>
									<strong>สาขา <span style="border-bottom:1px dotted #006600; width: 270px;">คอมพิวเตอร์ธุรกิจ (2ปี ต่อเนื่อง)</span></strong>
								</p>
								<p>
									<strong>สถาบัน <span style="border-bottom:1px dotted #006600; width: 435px;">มหาวิทยาลัยเทคโนโลยีราชมงคลตะวันออก วิทยาเขตจักรพงษภูวนารถ</span></strong>
									<strong>ปีที่จบ <span style="border-bottom:1px dotted #006600; width: 140px;"></span></strong>
								</p>
								<p>
									<strong>2) <span style="border-bottom:1px dotted #006600; width: 335px;"> </span></strong>
									<strong>สาขา <span style="border-bottom:1px dotted #006600; width: 270px;"></span></strong>
								</p>
								<p>
									<strong>สถาบัน <span style="border-bottom:1px dotted #006600; width: 435px;"></span></strong>
									<strong>ปีที่จบ <span style="border-bottom:1px dotted #006600; width: 140px;"></span></strong>
								</p>
								<p>
									<strong>3) <span style="border-bottom:1px dotted #006600; width: 335px;"> </span></strong>
									<strong>สาขา <span style="border-bottom:1px dotted #006600; width: 270px;"></span></strong>
								</p>
								<p>
									<strong>สถาบัน <span style="border-bottom:1px dotted #006600; width: 435px;"></span></strong>
									<strong>ปีที่จบ <span style="border-bottom:1px dotted #006600; width: 140px;"></span></strong>
								</p>
						  </div>
						 </td>
					  </tr>
					  <tr>
						<td width="100%">
							<p><strong style="font-weight: bold;">3.  ผลงาน หรือประสบการณ์ที่ดำเนินงานเกี่ยวกับด้านสุขภาพ</strong> <span style="color:red;line-height:0; ">(ยังไม่มีหัวข้อนี้ในระบบ E-Voting)</span></p>
							<p><span style="border-bottom:1px dotted #006600; width: 720px;">&nbsp;</span></p>
							<p><span style="border-bottom:1px dotted #006600; width: 720px;">&nbsp;</span></p>
							<p><span style="border-bottom:1px dotted #006600; width: 720px;">&nbsp;</span></p>
							<p><span style="border-bottom:1px dotted #006600; width: 720px;">&nbsp;</span></p>
							<p><span style="border-bottom:1px dotted #006600; width: 720px;">&nbsp;</span></p>
							<p><span style="border-bottom:1px dotted #006600; width: 720px;">&nbsp;</span></p>
							<p><span style="border-bottom:1px dotted #006600; width: 720px;">&nbsp;</span></p><Br>
						</td>
					 </tr>

					 <tr>
						<td width="100%">
						<p><strong style="font-weight:bold;">4.  ประวัติการทำงานในองค์กรปกครองส่วนท้องถิ่น  (โปรดระบุเฉพาะหน้าที่ที่สำคัญ)</strong></p>

							<div style="padding-left:20px; margin-top:10px; margin-bottom:20px;">
								<table width="100%" border="1" bordercolor="#006600">
									<tr style="text-align:center; vertical-align: middle;line-height:14px;">
										<td width="8%" style="font-weight:bold; height:55px;">ลำดับ</td>
										<td width="35%" style="font-weight:bold;">ปฏิบัติหน้าที่</td>
										<td width="35%" style="font-weight:bold;">องค์กร</td>
										<td width="22%" style="font-weight:bold;">ระยะเวลา<br>การปฏิบัติหน้าที่</td>
									</tr>
									<tr style="text-align:left; vertical-align: top;line-height:14px;">
										<td width="8%" style="font-weight:bold; height:55px;text-align:center;">1</td>
										<td width="35%">&nbsp;</td>
										<td width="35%">&nbsp;</td>
										<td width="22%">&nbsp;</td>
									</tr>
									<tr style="text-align:left; vertical-align: top;line-height:14px;">
										<td width="8%" style="font-weight:bold; height:55px;text-align:center;">2</td>
										<td width="35%">&nbsp;</td>
										<td width="35%">&nbsp;</td>
										<td width="22%">&nbsp;</td>
									</tr>
									<tr style="text-align:left; vertical-align: top;line-height:14px;">
										<td width="8%" style="font-weight:bold; height:55px;text-align:center;">3</td>
										<td width="35%">&nbsp;</td>
										<td width="35%">&nbsp;</td>
										<td width="22%">&nbsp;</td>
									</tr>
								</table>
							</div>
						</td>
					 </tr>
					 <tr>
						<td width="100%">
						<p><strong style="font-weight:bold;">5.  วาระการดำรงตำแหน่งในองค์กรปกครองส่วนท้องถิ่น (ปัจจุบัน) <span style="border-bottom:1px dotted #006600; width: 100px;"> </span> ปี  </strong></p>
							<p style="color:#00b050;">1) เริ่มตั้งแต่
							<strong>จังหวัด <span style="border-bottom:1px dotted #00b050;width: 50px;"> </span></strong>
							<strong>เดือน <span style="border-bottom:1px dotted #00b050;width: 200px;"> </span></strong>
							<strong>พ.ศ. <span style="border-bottom:1px dotted #00b050;width: 100px;"> </span></strong>
							</p>
							<p style="color:#00b050;">2) หมดวาระ
							<strong>จังหวัด <span style="border-bottom:1px dotted #00b050;width: 50px;"> </span></strong>
							<strong>เดือน <span style="border-bottom:1px dotted #00b050;width: 200px;"> </span></strong>
							<strong>พ.ศ. <span style="border-bottom:1px dotted #00b050;width: 100px;"> </span></strong>
							<span style="color:#ed7d31;line-height:0;">(หารือระยะการดำเนินตำแหน่ง)</span>
							</p><Br>
						</td>
					 </tr>

					  <tr>
      					<td width="100%" style="background-color: #006600; color: #fff; line-height: 14px; vertical-align: middle;padding: 8px;">
						  <strong style="font-weight: bold;">ส่วนที่ 5  วิสัยทัศน์ของข้าพเจ้าต่อการพัฒนาระบบสุขภาพแห่งชาติ</strong>
						  </td>
      				</tr>
					  <tr>
						 <td width="100%">
						 <p><span style="border-bottom:1px dotted #006600; width: 720px;">&nbsp;</span></p>
						<p><span style="border-bottom:1px dotted #006600; width: 720px;">&nbsp;</span></p>
						<p><span style="border-bottom:1px dotted #006600; width: 720px;">&nbsp;</span></p>
						<p><span style="border-bottom:1px dotted #006600; width: 720px;">&nbsp;</span></p>
						<p><span style="border-bottom:1px dotted #006600; width: 720px;">&nbsp;</span></p>
						<p><span style="border-bottom:1px dotted #006600; width: 720px;">&nbsp;</span></p>
						<p><span style="border-bottom:1px dotted #006600; width: 720px;">&nbsp;</span></p>
						 </td>
					  </tr>
					  <tr>
		  				<td>
						  <p style="padding-left:50px;">ทั้งนี้  ข้าพเจ้าได้แนบสำเนาเอกสารหรือหลักฐานที่แนบมาพร้อมใบสมัคร</p>
						  <ul style="padding-left: 80px;">
							<li style="color:red;"><span style="border-radius:2px;border:1px solid #006600; width: 12px; height: 12px; margin-right: 5px;"></span>
							สำเนาบัตรประชาชน (หารือต้องใช้หรือไม่)</li>
							<li><span style="border-radius:2px;border:1px solid #006600; width: 12px; height: 12px; margin-right: 5px;"></span>
							สำเนาบัตรประจำตัวข้าราชการที่แสดงการดำรงตำแหน่งนายกองค์กรปกครองส่วนท้องถิ่นอยู่  ณ วันที่ยื่นใบสมัคร</li>
							<li><span style="border-radius:2px;border:1px solid #006600; width: 12px; height: 12px; margin-right: 5px;"></span>
							รูปถ่ายหน้าตรงไม่สวมหมวก ไม่สวมแว่นตาดำ ขนาด  2  นิ้ว ถ่ายมาแล้วไม่เกิน  6  เดือน</li>
							</ul><Br><br>
							<p><span style="padding-left:50px;">&nbsp;</span><span style="text-align:center;font-weight:bolder;border-radius:2px;border:1px solid #006600; width: 12px; height: 12px; margin-right: 5px;line-height: 0.38;font-size:25px;">x</span>ข้าพเจ้าขอรับรองว่าข้อมูลที่กรอกข้างต้น  และเอกสารที่แนบมาพร้อมใบสมัครเป็นความจริงทุกประการ  หากมีข้อมูลใดเป็นเท็จหรือไม่ตรงกับความเป็นจริง  ข้าพเจ้ายินยอมให้ถูกตัดสิทธิ์จากการเป็นผู้สมัครหรือผู้ถูกเสนอชื่อในครั้งนี้
</p>
						</td>
					  </tr>

      			</tbody>
      		</table>
      	</div><!--end control-pdf-->
      </body>
</html>
