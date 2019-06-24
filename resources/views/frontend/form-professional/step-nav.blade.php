<?php
if(Request::segment(1) == "form-organization") {
	$active--;
}
 ?>
@for($i = 1 ; $i <= 5; $i++)

<li class="{{ $i <= $active ? 'active' : '' }}">
	<div class="box-step2f" data-url="{{ url(Request::segment(1).'/'.( Request::segment(1) == "form-organization" ? $i+1: $i)) }}">
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
