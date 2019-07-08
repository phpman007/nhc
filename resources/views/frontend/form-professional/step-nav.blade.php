<?php
$set = 7;

if(Request::segment(1) == "form-organization") {
	$active--;
}
if(Request::segment(1) == "form-ngo-register" ) {
	$set = 5;
}
if(Request::segment(1) == "form-ngo") {
	$set = 6;
}

 ?>
@for($i = 1 ; $i <= $set; $i++)

<li class="{{ $i <= $active ? 'active' : '' }}">
	@if($i == 1 || $i == $active)
	<div class="box-step2f" >
	@else
	<div class="box-step2f" data-url="{{ url(Request::segment(1).'/'.( Request::segment(1) == "form-organization" ? $i+1: $i)) }}">
	@endif
		<span>ขั้นตอนที่</span>
		<strong>{{ $i }}</strong>
	</div><!--end box-step2f-->
</li>

@endfor

<style type="text/css">
	.active .box-step2f {
		cursor:pointer;
	}
</style>
