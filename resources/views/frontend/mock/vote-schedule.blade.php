@extends('frontend.theme.master')

@section('content')
<div id="wrapper2f">
	<div class="insitepage2f">
		<div class="navication2f">
			<div class="container">
				<ol class="breadcrumb">
					<li><a href="">หน้าหลัก</a></li>
					<!-- <li><a href="">ข่าวงานสรรหาคณะกรรมการ</a></li> -->
					<li class="active">กำหนดการณ์</li>
				</ol>
			</div>
		</div><!--end navication2f-->
		<div class="insite-banner2f">
			<div class="control-bannertext2f">
				<div class="container">
					<div class="headline2f line-brown">
						<h1>กำหนดการณ์</h1>
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
								<div class="row">
									<div class="col-md-12">
										<h4>กำหนดการณ์ใช้สิทธิ์ลงคะแนน</h4><br>
									</div>
									<div class="col-md-3">
										กลุ่มผู้ทรงคุณวุฒิ
									</div>

									<div class="col-md-8">
										วันที่ 4 - 20 ตุลาคม 2562
									</div>
									<div class="col-md-3">
										กลุ่มผู้แทนองค์กรเอกชน
									</div>

									<div class="col-md-8">
										วันที่ 4 - 20 ตุลาคม 2562
									</div>
								</div>
								<br><br>
								<div class="row">
									<div class="col-md-12">
										<h4>กำหนดการณ์ลงคะแนนเลือกกันเอง</h4><br>
									</div>
									<div class="col-md-3">
										กลุ่มผู้ทรงคุณวุฒิ
									</div>

									<div class="col-md-8">
										วันที่ 24 ตุลาคม 2562 - 1 พฤศจิกายน 2562 <br>
										วิธีการลงคะแนน <a href="#">Link</a>
									</div>
									<div class="col-md-3">
										กลุ่มผู้แทนองค์กรเอกชน
									</div>

									<div class="col-md-8">
											วันที่ 24 ตุลาคม 2562 - 1 พฤศจิกายน 2562 <br>
											วิธีการลงคะแนน <a href="#">Link</a>
									</div>
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
