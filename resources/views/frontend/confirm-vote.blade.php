@extends('frontend.theme.master')

@section('content')
<style media="screen">
	.btn {
		font-size: 28px;
	}
</style>
<div id="wrapper2f">
	<div class="insitepage2f">
		<div class="navication2f">
			<div class="container">
				<ol class="breadcrumb">
					<li><a href="">หน้าหลัก</a></li>
					<!-- <li><a href="">ข่าวงานสรรหาคณะกรรมการ</a></li> -->
					<li class="active">ยืนยันการใช้สิทธิ์ลงคะแนน</li>
				</ol>
			</div>
		</div><!--end navication2f-->
		<div class="insite-banner2f">
			<div class="control-bannertext2f">
				<div class="container">
					<div class="headline2f line-brown">
						<h1>ยืนยันการใช้สิทธิ์ลงคะแนน</h1>
					</div>
				</div><!--end container-->
			</div><!--end control-bannertext2f-->
			<div class="img-banner2f">
				<img src="{{asset("frontend/images/insite-banner04.jpg")}}" alt="">
			</div>
			<div class="bg-banner"><img src="{{asset("frontend/images/bg-banner.png")}}" alt=""></div>
			<div class="shape-banner"></div>
		</div><!--end insite-banner2f-->
		<div class="control-insitepage2f">
			<div class="container">
				<div class="list-announce2f listcontent">
					<div class="row">

						<div class="col-sm-12">
							<div class="box-announce2f">
								<div class="">
									<h4>ยืนยันการใช้สิทธิ์ลงคะแนน</h4>
									<br>
									<br>
									<p class="text-center">
										สวัสดี {{ Auth::user()->nameTitle }} {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}<br>
										ท่านได้สมัครกลุ่ม {{ Auth::user()->getGroup() }} กลุ่มย่อย {{ Auth::user()->getSubGroup() }}<br>
										โปรดศึกษาข้อมูลการลงคะแนนและบัญชีรายชื่อผู้ผ่านคุณสมบัติเข้ารับการเลือกกันเองเป็นกรรมการสุขภาพแห่งชาติ <br>ในขั้นตอนถัดไป
										<br>
										<br>
                                        <br>
                                        @if(Auth::user()->verify_status_confirm != 1)

                                            <div class="form-group">
                                                <a style="width:100%" href="{{ url('vote-confirm/confirm') }}" class="btn btn-primary">ยืนยันการใช้สิทธิ์ลงคะแนน</a>
                                            </div>

										@elseif(Auth::user()->verify_status_confirm == 1)

                                            <div class="form-group">
                                                <a style="width:100%" href="{{ url('vote-confirm/resend') }}" class="btn btn-primary">ส่งรหัสการลงคะแนนอีกครั้ง</a>
                                            </div>
                                            <br>
                                            <div class="text-center">
                                                <a style="width:100%" href="{{ url('vote-confirm/flipbook_page') }}" class="btn btn-primary">ข้อมูลการลงคะแนนและบัญชีรายชื่อผู้สมัคร</a>
                                            </div>

										@endif
									</p>
								</div>
							</div><!--end box-announce2f-->
						</div>




					</div><!--end row-->
				</div><!--end list-announce2f-->

			</div><!--end container-->
		</div><!--end control-insitepage2f-->

	</div><!--end insitepage2f-->
</div><!--end wrapper2f-->
@endsection

@section('css')
@endsection

@section('js')
<script type="text/javascript"></script>
@endsection
