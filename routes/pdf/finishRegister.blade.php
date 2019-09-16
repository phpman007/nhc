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
      .text-center{
            text-align: center;
      }
      .text-right{
            text-align: right;
      }
      .h1{
            font-size: 18pt;
            font-weight: bold;
      }
      .head{
            color:#fff;
            font-weight: bold;
            background-color: #549733;
            padding:3px;
      }
      ul li {
            list-style: none;
      }
      .box-input{
            display:inline-block;
            border-bottom:1px dotted #000;
            padding-bottom: 2px;
            padding-left: 15px;
      }
      p{
            padding:0px;
            margin-top:0px;
      }
      table {
        border-collapse: collapse;
      }

      table, th, td {
        border: 1px solid #549733;
      }
      th {
            text-align: center;
      }
</style>
</head>
<body>
      แบบฟอร์ม สช./ใบสมัครผู้ทรงคุณวุฒิ/๒๕๖๒
      <br><br>
      <div style="position:absolute">
            <img style="height:1.6in; width:1.34in" src="{{ public_path('frontend/images/logo-pdf.jpg') }}" alt="">
      </div>
      <p class="text-center h1">
            ใบสมัครผู้ทรงคุณวุฒิ <br>
            เข้ารับการเลือกเป็นกรรมการสุขภาพแห่งชาติ <br>
            พ.ศ. ๒๕๖๒
      </p>
      <div class="text-right">
      วันที่ {{ $member->created_at->format('d') }} เดือน {{ $member->created_at->format('m') }} พ.ศ.{{ $member->created_at->addYears(543)->format('Y') }}
      </div>

      <div>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ข้าพเจ้า นาย/นาง/นางสาว <div class="box-input" style="width:450px;">{{ $member->nameTitle }} {{ $member->firstname }}  {{ $member->lastname }}</div> <br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;มีความประสงค์จะสมัครเข้ารับการเลือกเป็นกรรมการสุขภาพแห่งชาติ  จึงขอส่งใบสมัครของข้าพเจ้ามายังประธานคณะ <br>กรรมการสรรหา
      </div>
      <div class="head">
            ส่วนที่  ๑	คุณสมบัติ
      </div>
      <p>
            ข้าพเจ้าเป็นผู้มีคุณสมบัติของผู้ทรงคุณวุฒิที่จะเข้ารับการเลือกเป็นกรรมการสุขภาพแห่งชาติครบถ้วน  ดังนี้ <br>
            <ul>
                  <li>
                        ๑.  คุณสมบัติทั่วไป
                        <ul>
                              <li>๑) มีสัญชาติไทย</li>
                              <li>๒) มีอายุไม่ต่ำกว่ายี่สิบปีบริบูรณ์ ณ วันที่สมัคร</li>
                              <li>๓) ไม่เป็นคนไร้ความสามารถหรือคนเสมือนไร้ความสามารถ</li>
                              <li>๔) ไม่ติดยาเสพติดให้โทษ</li>
                              <li>๕) ไม่เคยถูกลงโทษไล่ออก ปลดออก เลิกจ้าง หรือพ้นจากตำแหน่ง เพราะเหตุจากการทุจริตหรือประพฤติมิชอบ</li>
                              <li>๖) ไม่เคยได้รับโทษจำคุกโดยคำพิพากษาถึงที่สุดให้จำคุก ไม่ว่าจะถูกจำคุกจริงหรือไม่ก็ตาม เว้นแต่เป็นโทษ
                                    สำหรับความผิดที่ได้กระทำโดยประมาทหรือความผิดลหุโทษ</li>
                              </ul>
                        </li>

                        <li>
                              ๒.  คุณสมบัติเฉพาะ
                              <ul>
                                    <li>๑) ไม่เป็นผู้ประกอบวิชาชีพด้านสาธารณสุขตามนิยามในพระราชบัญญัติสุขภาพแห่งชาติ พ.ศ. ๒๕๕๐</li>
                                    <li>๒) มีประสบการณ์การทำงานไม่น้อยกว่า ๑๐ ปี</li>
                                    <li>๓) มีผลงานเป็นที่ประจักษ์ที่สอดคล้องกับประเภทกลุ่มผู้ทรงคุณวุฒิที่เลือกสมัคร</li>
                              </ul>
                        </li>

                  </ul>
            </p>

            <div class="head">
                  ส่วนที่  ๒	การแสดงเจตนาสมัครเข้ากลุ่มิ
            </div>
            <p>
                  ข้าพเจ้ามีความประสงค์ที่จะสมัครเป็นกรรมการสุขภาพแห่งชาติจากผู้ทรงคุณวุฒิในกลุ่ม <br>
                  <ul>


                        @foreach(DB::table('senior_groups')->get() as $key => $group)
                        @if($member->seniorGroupId == $group->id)
                        <li>/  {{ $group->groupName }}</li>
                        @else
                        <li>  {{ $group->groupName }}</li>
                        @endif
                        @endforeach
                  </ul>

                  หมายเหตุ   ผู้ทรงคุณวุฒิสามารถสมัครได้กลุ่มใดกลุ่มหนึ่งใน ๖ กลุ่มนี้ เท่านั้น
            </p>

            <div class="head">
                  ส่วนที่  ๓	ข้อมูลยืนยันตัวตนของผู้สมัครเพื่อเข้าสู่ระบบการสรรหากรรมการสุขภาพแห่งชาติแบบอิเล็กทรอนิกส์
            </div>
            <p>
                  ๑.  เลขบัตรประชาชน ๑๓ หลัก
                  <div class="" style="padding:0px 15pt;height:20pt;">
                        &nbsp;
                        <?php
                              $idCardArray = $member->personalId;
                         ?>
                        @for($i = 0 ; $i < strlen($idCardArray) ; $i ++)
                        <div style="display:inline-block;padding:0px 15px;border:1px solid #000">{{$idCardArray[$i]}}</div>
                        @endfor

                  </div>
            </p>
            <p>
                  ๒. อีเมล (Email)
                  <div class="border-dot" style="border-bottom:1px dotted #ccc;padding-bottom:8px; padding-top:0px">
                        {{ $member->email }}
                  </div>
            </p>

            <p>
                  รหัสผ่าน (Password)
                  <div class="" style="padding:0px 15pt;height:20pt;">
                        &nbsp;
                        <div style="display:inline-block;padding:0px 15px; border:1px solid #000">*</div>
                        <div style="display:inline-block;padding:0px 15px; border:1px solid #000">*</div>
                        <div style="display:inline-block;padding:0px 15px; border:1px solid #000">*</div>
                        <div style="display:inline-block;padding:0px 15px; border:1px solid #000">*</div>
                        <div style="display:inline-block;padding:0px 15px; border:1px solid #000">*</div>
                        <div style="display:inline-block;padding:0px 15px; border:1px solid #000">*</div>
                        <div style="display:inline-block;padding:0px 15px; border:1px solid #000">*</div>
                        <div style="display:inline-block;padding:0px 15px; border:1px solid #000">*</div>

                  </div>
            </p>
            <p>
                  <ul>
                        <li><span style="font-weight:bold">หมายเหตุ</span>
                              <ul>
                                    <li>๑. กรุณากำหนดรหัสผ่าน (Password) ของท่านเพื่อยืนยันตัวตนเข้าสู่ระบบสมัคร </li>
                                    <li>๒. กำหนดรหัสผ่าน (Password) เป็นตัวอักษรภาษาอังกฤษ และมีตัวเลขด้วย รวมกันจำนวน
                                    </li>
                                    <li>๘ ตัวอักษร </li>
                              </ul>
                        </li>
                  </ul>


            </p>
            <div class="head">
                  ส่วนที่  ๔	ข้อมูลประวัติ
            </div>
            <p>
                  <ul>
                        <li>
                              ๑.  ข้อมูลทั่วไป
                              <ul>
                                    <li>
                                          ๑) คำนำหน้าชื่อ <div class="box-input" style="width:500px;">{{ $member->nameTitle }}</div><br>
                                          ชื่อ<div class="box-input" style="width:260px;">{{ $member->firstname }}</div>
                                          นามสกุล<div class="box-input" style="width:260px;">{{ $member->lastname }}</div>
                                    </li>
                                    <li>๒) เกิดวันที่<div class="box-input" style="width:100px;">{{ Carbon\Carbon::parse($member->detail->dateOfBirth)->format('d') }}</div>
                                          เดือน<div class="box-input" style="width:150px;">{{ Carbon\Carbon::parse($member->detail->dateOfBirth)->format('m') }}</div>
                                          พ.ศ<div class="box-input" style="width:100px;">{{ Carbon\Carbon::parse($member->detail->dateOfBirth)->addYears('543')->format('Y') }}</div>
                                          อาย<div class="box-input" style="width:80px;">
                                                <?php
                                                $yearold = Carbon\Carbon::parse($member->detail->dateOfBirth)->format('Y');
                                                $now = now()->format('Y');
                                                echo ($yearold - $now);
                                                 ?>
                                          </div>ปี
                                    </li>
                                    <li>๓) เพศ
                                          <div style="display:inline-block;padding:0px 6px;line-height: 0.6;border:1px solid #000">{!! $member->detail->genderId == 1 ? '/' :'&nbsp;' !!}</div> ชาย
                                          <div style="display:inline-block;padding:0px 6px;line-height: 0.6;border:1px solid #000">{!! $member->detail->genderId == 2 ? '/' :'&nbsp;' !!}</div>  หญิง
                                          <div style="display:inline-block;padding:0px 6px;line-height: 0.6;border:1px solid #000">{!! $member->detail->genderId == 3 ? '/' :'&nbsp;' !!}</div> นักบวช/สมณะเพศ
                                    </li>
                                    <li>๔)	สถานที่ที่สามารถติดต่อได้สะดวก <br>
                                          <div style="display:inline-block;padding:0px 6px;line-height: 0.6;border:1px solid #000">{!! $member->detail->addressType == 1 ? '/' :'&nbsp;' !!}</div>  บ้าน
                                          <div style="display:inline-block;padding:0px 6px;line-height: 0.6;border:1px solid #000">{!! $member->detail->addressType == 2 ? '/' :'&nbsp;' !!}</div>  ที่ทำงาน
                                          <div class="box-input" style="width:490px;">{{ $member->detail->workPlaceName }}</div><br>
                                          เลขที่<div class="box-input" style="width:100px;">{{ $member->detail->no }}</div>
                                          หมู่ที<div class="box-input" style="width:100px;">{{ $member->detail->moo }}</div>
                                          ตรอก/ซอย<div class="box-input" style="width:240px;">{{ $member->detail->soi }}</div>
                                          <br>
                                          ถนน<div class="box-input" style="width:245px;">{{ $member->detail->street }}</div>
                                          ตำบล/แขวง<div class="box-input" style="width:245px;">{{ $member->detail->subdistrict->district }}</div>
                                          <br>
                                          อำเภอ/เขต<div class="box-input" style="width:125px;">{{ $member->detail->district->amphoe }}</div>
                                          จังหวัด<div class="box-input" style="width:125px;">{{ $member->detail->province->province }}</div>
                                          รหัสไปรษณีย์<div class="box-input" style="width:125px;">{{ $member->detail->zipCode }}</div>

                                          โทรศัพท์<div class="box-input" style="width:200px;">{{ $member->detail->tel }}</div>
                                          โทรศัพท์เคลื่อนที่ (มือถือ)<div class="box-input" style="width:200px;">{{ $member->detail->mobile }}</div>
                                    </li>
                              </ul>
                        </li>
                        <li>
                              ๓.  ประวัติการทำงาน
                              <ul>
                                    <li>
                                          ๑)  หน้าที่การงานและความรับผิดชอบในปัจจุบัน
                                          <ol>
                                                <li>ปัจจุบันปฏิบัติหน้าที่ <br>
                                                      <div class="box-input" style="width:565px;">&nbsp;</div>
                                                </li>
                                                <li>สถานที่ปฏิบัติงาน <br>
                                                      <div class="box-input" style="width:565px;">&nbsp;</div>
                                                </li>
                                                <li>งานในความรับผิดชอบ
                                                      <div class="box-input" style="width:565px;">&nbsp;</div>
                                                </li>
                                          </ol>
                                    </li>
                              </ul>
                        </li>
                        <li>
                              ๒)  การปฏิบัติหน้าที่ในอดีต  (โปรดระบุเฉพาะหน้าที่ที่สำคัญ)
                              <table style="width:100%" border="1">
                                    <tr>
                                          <th style="width :50px">ลำดับ</th>
                                          <th>ปฏิบัติหน้าที่</th>
                                          <th>องค์กร</th>
                                          <th style="width :150px">ระยะเวลา
                                                การปฏิบัติหน้าที่
                                          </th>
                                    </tr>
                                    <tr>
                                          <td class="text-center">๑</td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                    </tr>
                                    <tr>
                                          <td class="text-center">๒</td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                    </tr>
                                    <tr>
                                          <td class="text-center">๓</td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                    </tr>
                              </table>
                        </li>
                        <li>
                        ๓)  ประสบการณ์สำคัญหรือประสบการณ์ที่ภาคภูมิใจที่สัมพันธ์กับประเภทกลุ่มผู้ทรงคุณวุฒิที่เลือกสมัคร
                  </li>


                  </ul>

            </p>
            <div class="head">
                  ส่วนที่ ๕  วิสัยทัศน์ของข้าพเจ้าต่อการพัฒนาระบบสุขภาพแห่งชาติ
            </div>
            <p>

            </p>

            <p>
                  ทั้งนี้  ข้าพเจ้าได้แนบสำเนาเอกสารหรือหลักฐานที่แนบมาพร้อมใบสมัคร <br>
                  <ul>
                        <li>/	สำเนาบัตรประจำตัวประชาชน</li>
                        <li>/	รูปถ่ายหน้าตรงไม่สวมหมวก ไม่สวมแว่นตาดำ ดำ ฉากพื้นหลังไม่มีลวดลาย  ซึ่งถ่ายมาแล้ว
                        ไม่เกิน  ๖  เดือน</li>
                        <li>/ เอกสารสรุปผลงานอันเป็นที่ประจักษ์ ที่สอดคล้องกับประเภทกลุ่มผู้ทรงคุณวุฒิที่เลือกสมัคร                    (ไม่เกิน ๒ หน้ากระดาษ A 4) พิมพ์โดยใช้ตัวอักษรขนาดไม่ต่ำกว่า ๑๖</li>
                  </ul><br>
&nbsp;&nbsp;&nbsp;&nbsp;ข้าพเจ้าขอรับรองว่าข้อมูลที่กรอกข้างต้น  และเอกสารที่แนบมาพร้อมใบสมัครเป็นความจริงทุกประการ  หากมีข้อมูลใดเป็นเท็จหรือไม่ตรงกับความเป็นจริง  ข้าพเจ้ายินยอมให้ถูกตัดสิทธิ์จากการเป็นผู้สมัครหรือผู้ถูกเสนอชื่อในครั้งนี้

            </p>
      </body>
      </html>
