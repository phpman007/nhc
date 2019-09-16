@extends('frontend.theme.master')

@section('content')
<div id="wrapper2f">
	<div class="insitepage2f">
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
										ท่านยื่นเอกสารสมัครไม่ครบตามระยะเวลาที่กำหนด ไม่สามารถยืนยันการใช้สิทธิ์ได้
										<br>
										<br>
                                        <br>
                                            <div class="form-group">
                                                <a style="width:100%" href="{{ url('/') }}" class="btn btn-info">กลับไปหน้าแรก</a>
                                            </div>
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
