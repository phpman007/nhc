<!DOCTYPE html>
<html lang="en" dir="ltr">
      <head>
            <meta charset="utf-8">
            <title>แบบขอขึ้นทะเบียนองค์กรภาคเอกชนและยืนยันการส่งสมาชิก</title>
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
	            color:#000000;
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
				background-position: left 30px;*/
				word-wrap: break-word;
				word-break: break-all;
				background-size: auto 20px;

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
                      <td width="100%" colspan="2"  style="vertical-align: middle;">
                      แบบฟอร์ม สช./แบบขอขึ้นทะเบียนองค์กรภาคเอกชนและยืนยันการส่งผู้แทนองค์กรภาคชน/2562
                      </td>
      			</tr>
      		</table>

      		<table width="100%" border="0" bgcolor="#FFFFFF" align="center"  cellspacing="0" cellpadding="0" style="font-size: 16pt; line-height: 14pt;" >
      			<tr>
                      <td width="100%" style="vertical-align: middle;">
                      <div style="text-align:center; margin-top:20px;"><img src="http://192.168.200.1/frontend/images/logo-small.png" alt="" style="height:120px;"></div>
      					<div style="text-align: center;">
      						<h1>แบบขอขึ้นทะเบียนองค์กรภาคเอกชนและยืนยันการส่งสมาชิก<Br>
                      เป็นผู้แทนองค์กรภาคเอกชนเข้ารับการเลือกเป็นกรรมการสุขภาพแห่งชาติ<Br>พ.ศ.2562</h1>
                          </div>

      				</td>
      			</tr>
      		</table>
      		<br>
      		<table width="100%" border="0" bgcolor="#FFFFFF"   cellspacing="0" cellpadding="0" style="font-size: 16pt; line-height: 14pt;">
      			<tbody>
      				<tr>
      					<td width="100%">
      						<div style="text-align: left;padding-left:400px">
								<strong>วัน <span style="border-bottom:1px dotted #006600;width: 30px;"> {{ \Carbon\Carbon::parse($member->confirmed_at)->addYears('543')->format('d') }}</span></strong>
      							<strong>เดือน <span style="border-bottom:1px dotted #006600;width: 120px;"> {{ Helper::monthThai(\Carbon\Carbon::parse($member->confirmed_at)->addYears('543')->format('m')) }}</span></strong>
      							<strong>พ.ศ. <span style="border-bottom:1px dotted #006600;width: 70px;"> {{ \Carbon\Carbon::parse($member->confirmed_at)->addYears('543')->format('Y') }}</span></strong>
      						</div>
      					</td>
      				</tr>
      				<tr>
      					<td width="100%">
      						<strong style="padding-left: 50px;">ข้าพเจ้า <span style="border-bottom:1px dotted #000; width: 620px;"> {{ Auth::user()->nameTitle }} {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</span></strong>
      					</td>
      				</tr>
      				<tr>
      					<td width="100%" style="padding-bottom: 10px;">
      						<strong style="padding-left: 50px;">ซึ่งเป็นผู้แจ้งรายละเอียดเพื่อขอขึ้นทะเบียนเป็นองค์กรผู้มีสิทธิเสนอชื่อผู้แทนเข้ารับการเลือกเป็นกรรมการสุขภาพแห่งชาติ โดยมีรายละเอียดดังนี้</strong>
      					</td>
      				</tr>
      				<tr>
      					<td width="100%" style="background-color: #663300; color: #fff; line-height: 14px; vertical-align: middle;padding: 8px;"><strong style="font-weight: bold;">ส่วนที่  1	ข้อมูลองค์กรภาคเอกชน</strong></td>
      				</tr>
					  <tr>
					 	 <td width="100%">
						  <p style="margin-top:20px;">1.  ชื่อองค์กร</p>
						  <div style="padding-left:20px;">
							<p>
                                <strong><span style="border-bottom:1px dotted #000; width: 700px;">{{ Auth::user()->detail->ngoName }}</span></strong>
                            </p>
						  </div>
						 </td>
                      </tr>
                      <tr>
					 	 <td width="100%">
						  <p style="margin-top:20px;">2.  ประเภทขององค์กร</p>
						  <div style="padding-left:15px;">
                                 <strong style="display:block;">
                                     <span style="text-align:center;font-weight:bolder;border-radius:2px;border:1px solid #000; width: 12px; height: 12px; margin-right: 5px;line-height: 0.38;font-size:25px;">{{ $member->detail->legalStastus == 0 ? 'x' :'' }}</span> ไม่เป็นนิติบุคคล
                                </strong>
                                <strong style="display:block;">
                                <span style="text-align:center;font-weight:bolder;border-radius:2px;border:1px solid #000; width: 12px; height: 12px; margin-right: 5px;line-height: 0.38;font-size:25px;">{{ $member->detail->legalStastus == 1 ? 'x' :'' }}</span> เป็นนิติบุคคล ประเภท

                                </strong>
                                <p>
                                    <strong><span style="border-bottom:1px dotted #000; width: 700px;">{{ Auth::user()->detail->ngoStatus }}</span></strong>
                                </p>
						  </div>
						 </td>
                      </tr>
                      <tr>
					 	 <td width="100%">
                          <p style="margin-top:20px;">3.  ที่ตั้งองค์กร
                            <strong>เลขที่ <span style="border-bottom:1px dotted #000000; width: 110px;"> {{ Auth::user()->detail->ngoNo }}</span></strong>
						    <strong>หมู่ที่ <span style="border-bottom:1px dotted #000000; width:120px;"> {{ Auth::user()->detail->ngoMoo }}</span></strong>
						    <strong>ตรอก/ซอย <span style="border-bottom:1px dotted #000000; width: 260px;"> {{ Auth::user()->detail->ngoSoi }}</span></strong>
                        </p>

						 </td>
                      </tr>
					  <tr>
						  <td width="100%">
						 	 <p style="padding-left:15px;">
								<strong>ถนน <span style="border-bottom:1px dotted #000000; width: 290px;">{{ Auth::user()->detail->ngoStreet }}</span></strong>
								<strong>ตำบล/แขวง <span style="border-bottom:1px dotted #000000; width:300px;"> {{ @DB::table('provinces')->where('district_code',@Auth::user()->detail->ngoSubDistrictID)->first()->district }}</span></strong>
							</p>
						  </td>
					  </tr>
					  <tr>
						  <td width="100%">
						  <p style="padding-left:15px;">
								<strong>อำเภอ/เขต <span style="border-bottom:1px dotted #000000; width: 270px;"> {{ @DB::table('provinces')->where('amphoe_code',@Auth::user()->detail->ngoDistrictID)->first()->amphoe }}</span></strong>
								<strong>จังหวัด <span style="border-bottom:1px dotted #000000; width:310px;">{{ @DB::table('provinces')->where('province_code',@Auth::user()->detail->ngoProvincetID)->first()->province }}</span></strong>
							</p>
						  </td>
					  </tr>
					  <tr>
						  <td width="100%">
						  <p style="padding-left:15px;">
								<strong>รหัสไปรษณีย์ <span style="border-bottom:1px dotted #000000; width: 270px;"> {{ Auth::user()->detail->ngoZipCode }}</span></strong>
                                                <strong>เบอร์โทรศัพท์ <span style="border-bottom:1px dotted #000000; width: 270px;"> {{ Auth::user()->detail->suggestTel }}</span></strong>

							</p>
						  </td>
                      </tr>
                      <tr>
					 	 <td width="100%">
                          <p style="margin-top:15px;">
                            <strong>4. ก่อตั้งองค์กรวันที่ <span style="border-bottom:1px dotted #000000; width:250px;"> {{ Helper::dateMonthThai(Helper::dateToThai(Auth::user()->detail->ngoStartDate)) }}</span></strong>
                            <strong>จำนวนสมาชิกในปัจจุบัน <span style="border-bottom:1px dotted #000000; width:100px;"> {{ Auth::user()->detail->ngoQtyMember }}</span> คน</strong>
                        </p>
						 </td>
                      </tr>
                      <tr>
					 	 <td width="100%">
						  <p style="margin-top:20px;">5. วัตถุประสงค์ขององค์กรที่สอดคล้องกับกลุ่มกิจกรรมที่ขอขึ้นทะเบียน</p>
						  <div style="padding-left:20px; 	      	line-height: 13pt;">
							<p>
                                <strong ><span class="box-dot" style="width: 700px;">.....{{ Auth::user()->detail->ngoObjective }}.....</span></strong>
                            </p>

                            <Br>
						  </div>
                         </td>
                        </tr>

					  <tr>
      					<td width="100%" style="background-color: #663300; color: #fff; line-height: 14px; vertical-align: middle;padding: 8px;">
						  <strong style="font-weight: bold;">ส่วนที่ 2  ข้อมูลประกอบการขึ้นทะเบียน</strong>
						  </td>
      				</tr>
					  <tr>
		  				<td>
						  <p style="margin-top:15px;">1. องค์กรฯ ประสงค์ขอขึ้นทะเบียนในกลุ่ม (เลือกได้เพียงหนึ่งกลุ่มเท่านั้น)</p>
						  <ul style="padding-left: 15px;">

                                   @foreach(DB::table('ngo_groups')->get() as $key => $item)
							<li><span style="text-align:center;font-weight:bolder;border-radius:2px;border:1px solid #000; width: 12px; height: 12px; margin-right: 5px;line-height: 0.38;font-size:25px;">{{$item->id == Auth::user()->ngoGroupId ? 'x' : ''}}</span>
							{{$item->groupName}}</li>

                                   @endforeach

                            <li><strong style="border-bottom:1px solid #000000;">หมายเหตุ</strong> โปรดพิจารณารายละเอียดการจัดกลุ่มกิจกรรมที่เกี่ยวข้องกับสุขภาพ สำหรับองค์กรภาคเอกชนท้ายประกาศฯ</li>
							</ul>

						</td>
                      </tr>
                      <tr>
		  				<td>
                          <p style="margin-top:15px;padding-left: 15px;margin-bottom:15px;">2. กิจกรรมการดำเนินงานที่เกี่ยวข้องกับสุขภาพในกลุ่มที่ขอขึ้นทะเบียนในพื้นที่จังหวัด 2 กิจกรรมที่สำคัญในระยะเวลา<br>ไม่เกิน 3 ปี นับถึงวันที่สมัคร (กิจกรรมในระหว่างเดือนสิงหาคม 2559 - ปัจจุบัน)  มีดังนี้
                        </p>
                        <p style="padding-left: 15px;"><strong style="border-bottom:1px solid #000000;font-weight:bold;">กิจกรรมที่ 1</strong></p>
                        <p style="padding-left:15px;">
                            <strong>(ชื่อกิจกรรม) <span style="border-bottom:1px dotted #000000; width: 600px;">{{ Auth::user()->detail->activity1 }}</span></strong>
                        </p>
						</td>
                      </tr>
                      <tr>
					 	 <td width="100%">
						  <p style="margin-bottom:15px;padding-left:15px;"><strong style="border-bottom:1px solid #000000;font-weight:bold;">สรุปผลงานที่สำคัญ</strong></p>
						  <div style="padding-left:15px	line-height: 13pt;">
							<p>
                                <strong><span class="box-dot"  style=" width: 700px;">.....{{ Auth::user()->detail->detail1 }}.....</span></strong>
                            </p>


							</p><Br>
						  </div>
                         </td>
                        </tr>
                        <tr>
		  				<td>
                        <p style="margin-top:15px;padding-left: 15px;"><strong style="border-bottom:1px solid #000000;font-weight:bold;">กิจกรรมที่ 2</strong></p>
                        <p style="padding-left:15px;">
                            <strong>(ชื่อกิจกรรม) <span style="border-bottom:1px dotted #000000; width: 600px;">{{ Auth::user()->detail->activity2 }}</span></strong>
                        </p>
						</td>
                      </tr>
                      <tr>
					 	 <td width="100%">
						  <p style="padding-left:15px;"><strong style="border-bottom:1px solid #000000;font-weight:bold;">สรุปผลงานที่สำคัญ</strong></p>
						  <div style="margin-top:10px;padding-left:15px;">
							<p>
                                <strong><span class="box-dot" style="width: 700px;">.....{{ Auth::user()->detail->detail2 }}.....</span></strong>
                            </p>

						  </div><br>
                         </td>
                        </tr>
                        <tr>
                            <td width="100%" style="background-color: #663300; color: #fff; line-height: 14px; vertical-align: middle;padding: 8px;">
                            <strong style="font-weight: bold;">ส่วนที่ 3 ข้อมูลเสนอชื่อผู้แทนองค์กรภาคเอกชน</strong>
                            </td>
                        </tr>
                        <tr>
                            <td width="100%">
                                <Br>
                                 <p><strong>ด้วยองค์กร <span style="border-bottom:1px dotted #000; width: 610px;"> {{ Auth::user()->detail->byNgo }}</span></strong> ได้เสนอ</p>
                                 <p><strong>ชื่อ  <span style="border-bottom:1px dotted #000; width: 700px;"> {{ Auth::user()->nameTitle }}  {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</span></strong></p>
                                 <p><strong>ตำแหน่งสมาชิกในองค์กร <span style="border-bottom:1px dotted #000; width: 575px;"> {{ Auth::user()->detail->suggestPosition }}</span></strong></p>
                                 <p>เป็นผู้แทนองค์กรเข้ารับการเลือกเป็นกรรมการสุขภาพแห่งชาติจากผู้แทนองค์กรภาคเอกชน ข้อมูลที่กรอกข้างต้นเป็นความจริงทุกประการ หากมีข้อมูลใดเป็นเท็จหรือ
                                     ไม่ตรงกับความเป็นจริง ข้าพเจ้ายินยอมให้ถูกตัดสิทธิ์จาก การเป็นผู้สมัครหรือผู้ถูกเสนอชื่อในครั้งนี้
                                 </p><br>
                                 <p style="text-indent:50px;">ทั้งนี้ ข้าพเจ้าได้ยื่นแบบขอขึ้นทะเบียนองค์กรและยืนยันการส่งผู้แทนองค์กรภาคเอกชน พร้อมเอกสารหลักฐานประกอบ การขอขึ้นทะเบียน มาพร้อมนี้
                                 </p>
                            </td>
                        </tr>
                        <tr>
		  				<td width="100%">
						  <p style="margin-top:15px;"><strong style="border-bottom:1px solid #000000;font-weight:bold;">สำหรับองค์กรภาคเอกชนที่เป็นนิติบุคคล</strong> ประกอบด้วย</p>
						  <ul style="padding-left: 15px;">
                            <li><span style="text-align:center;font-weight:bolder;border-radius:2px;border:1px solid #000; width: 12px; height: 12px; margin-right: 5px;line-height: 0.38;font-size:25px;">{{ $member->detail->legalStastus == 1 ? 'x' : '' }}</span>
                            สำเนาหลักฐานที่แสดงความเป็นนิติบุคคล
							</li>
                            <li><span style="text-align:center;font-weight:bolder;border-radius:2px;border:1px solid #000; width: 12px; height: 12px; margin-right: 5px;line-height: 0.38;font-size:25px;">{{ $member->detail->legalStastus == 1 ? 'x' : '' }}</span>
                            สำเนาหลักฐานที่แสดงถึงวัตถุประสงค์การก่อตั้งองค์กร
							</li>
                            <li><span style="text-align:center;font-weight:bolder;border-radius:2px;border:1px solid #000; width: 12px; height: 12px; margin-right: 5px;line-height: 0.38;font-size:25px;">{{ $member->detail->legalStastus == 1 ? 'x' : '' }}</span>
                            สำเนาหลักฐานซึ่งแสดงถึงกิจกรรมการดำเนินงานที่เกี่ยวข้องกับสุขภาพในกลุ่มที่ขอขึ้นทะเบียนในพื้นที่จังหวัด <Br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2 กิจกรรมที่สำคัญในระยะเวลาไม่เกิน 3 ปี นับถึงวันที่สมัคร (กิจกรรมในระหว่างเดือนสิงหาคม 2559 - ปัจจุบัน) <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbspเช่น
                            โครงการ รายงานการดำเนินโครงการ รูปถ่ายกิจกรรมโดยระบุสถานที่จัดกิจกรรม เป็นต้น
                            </li>
                            <li><span style="text-align:center;font-weight:bolder;border-radius:2px;border:1px solid #000; width: 12px; height: 12px; margin-right: 5px;line-height: 0.38;font-size:25px;">{{ $member->detail->legalStastus == 1 ? 'x' : '' }}</span>
                            สำเนาคำสั่งแต่งตั้งประธานองค์กรหรือรายงานการประชุมที่มีชื่อประธานองค์กร
                            </li>
                            <li><span style="text-align:center;font-weight:bolder;border-radius:2px;border:1px solid #000; width: 12px; height: 12px; margin-right: 5px;line-height: 0.38;font-size:25px;">{{ $member->detail->legalStastus == 1 ? 'x' : '' }}</span>
                            สำเนาบัตรประจำตัวประชาชนของประธานองค์กร
                            </li>

							</ul>

						</td>
                      </tr>
                      <tr>
		  				<td width="100%">
						  <p style="margin-top:15px;"><strong style="border-bottom:1px solid #000000;font-weight:bold;">สำหรับองค์กรภาคเอกชนที่ไม่เป็นนิติบุคคล</strong> ประกอบด้วย</p>
						  <ul style="padding-left: 15px;">
                            <li><span style="text-align:center;font-weight:bolder;border-radius:2px;border:1px solid #000; width: 12px; height: 12px; margin-right: 5px;line-height: 0.38;font-size:25px;">{{ $member->detail->legalStastus == 0 ? 'x' : '' }}</span>
                            สำเนาหลักฐานที่แสดงถึงวัตถุประสงค์การก่อตั้งองค์กร
							</li>
                            <li><span style="text-align:center;font-weight:bolder;border-radius:2px;border:1px solid #000; width: 12px; height: 12px; margin-right: 5px;line-height: 0.38;font-size:25px;">{{ $member->detail->legalStastus == 0 ? 'x' : '' }}</span>
                            สำเนาหลักฐานซึ่งแสดงถึงกิจกรรมการดำเนินงานที่เกี่ยวข้องกับสุขภาพในกลุ่มที่ขอขึ้นทะเบียนในพื้นที่จังหวัด <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2 กิจกรรมที่สำคัญในระยะเวลาไม่เกิน 3 ปี นับถึงวันที่สมัคร
                       (กิจกรรมในระหว่างเดือนสิงหาคม 2559 - ปัจจุบัน) <Br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เช่น โครงการ
                            รายงานการ ดำเนินโครงการ รูปถ่ายกิจกรรม โดยระบุสถานที่จัดกิจกรรม เป็นต้น
							</li>
                            <li><span style="text-align:center;font-weight:bolder;border-radius:2px;border:1px solid #000; width: 12px; height: 12px; margin-right: 5px;line-height: 0.38;font-size:25px;">{{ $member->detail->legalStastus == 0 ? 'x' : '' }}</span>
                            สำเนาหนังสือที่แสดงว่าผู้ลงลายมือชื่อในแบบขอขึ้นทะเบียนองค์กรภาคเอกชนฯ เป็นประธานองค์กร <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;หรือรายงานประชุมที่มีชื่อประธานองค์กร
                            </li>
                            <li><span style="text-align:center;font-weight:bolder;border-radius:2px;border:1px solid #000; width: 12px; height: 12px; margin-right: 5px;line-height: 0.38;font-size:25px;">{{ $member->detail->legalStastus == 0 ? 'x' : '' }}</span>
                            สำเนาบัตรประจำตัวประชาชนของประธานองค์กร
                            </li>
                            <li><span style="text-align:center;font-weight:bolder;border-radius:2px;border:1px solid #000; width: 12px; height: 12px; margin-right: 5px;line-height: 0.38;font-size:25px;">{{ $member->detail->legalStastus == 0 ? 'x' : '' }}</span>
                            หนังสือรับรองความมีอยู่และการดำเนินกิจกรรมขององค์กรภาคเอกชนที่ไม่เป็นนิติบุคคล
                            </li>

							</ul><br><br>
						<p style="position:relative;"><span style="padding-left:10px;">&nbsp;</span><span style="text-align:center;font-weight:bolder;border-radius:2px;border:1px solid #006600; width: 12px; height: 12px; margin-right: 5px;line-height: 0.38;font-size:25px;">x</span>ข้าพเจ้าขอรับรองว่าข้อมูลที่กรอกข้างต้น และเอกสารที่แนบมาพร้อมแบบขอขึ้นทะเบียนองค์กรภาคเอกชนเป็นความจริง ทุกประการ
                        หากมีข้อมูลใดเป็นเท็จหรือไม่ตรงกับความเป็นจริง  ข้าพเจ้ายินยอมให้ถูกตัดสิทธิ์จากการเป็นผู้สมัครหรือผู้ถูกเสนอชื่อ ในครั้งนี้</p>
              <Br><br><br>

						</td>
                      </tr>
                      <tr>
                          <td width="100%">
						  	<Br><Br>
                              <p>
                            <strong style="padding-left:260px">ลงชื่อ <span style="border-bottom:1px dotted #000; width: 240px;"> </span></strong>
                            </p>
                            <p>
                            <strong style="padding-left:260px">( <span style="border-bottom:1px dotted #000; width: 260px;"> </span> )</strong>
                            </p>
                            <p>
                            <strong style="padding-left:260px">ประธานกลุ่ม/องค์กร <span style="border-bottom:1px dotted #000; width: 160px;"> </span></strong>
                            </p><Br><br><br>
                          </td>
                      </tr>
                      <tr>
                          <td>
                              <p><strong style="border-bottom:1px solid #000000;">หมายเหตุ</strong> โปรดประทับตราองค์กร (ถ้ามี)</p>

                          </td>
                      </tr>



      			</tbody>
      		</table>
      	</div><!--end control-pdf-->
      </body>
</html>
