@extends('backend.theme.master')
@section('title','NHCO ADMIN')

@section('content')
<div class="card border-info mb-3">

	<div class="card-header">
		<strong> {{ !empty($item) ? 'แก้ไขรายการ' : 'เพิ่มรายการ' }} | {{ $titlePage }} <small>{{ $descPage }} | version: {{ $version }}</small></strong>
	</div>


	<div class="card-body">
		{!! Form::open() !!}
		{!! Form::hidden('created_at', Auth::guard('admin')->user()->id, []) !!}
			<div class="form-group">
				<label for="">ชื่อโมดุล</label>
				{!! Form::text('module_name', null, ["class"=>"form-control", "placeholder"=>"ชื่อโมดุล ภาษาอังกษฤเท่านั้น"]) !!}
				<small>*ห้ามใส่สัญลักษณ์/เครื่องหมาย (เช่น - * / . + @ # $ % ^ & )</small>
			</div>
			<div class="form-group">
				<label for="">ชื่อโมดุลที่ใช้แสดง</label>
				{!! Form::text('module_label', null, ["class"=>"form-control", "placeholder"=>"ชื่อโมดุล"]) !!}
				<small>*ห้ามใส่สัญลักษณ์/เครื่องหมาย (เช่น - * / . + @ # $ % ^ & )</small>
			</div>
			<div class="form-group">
				<label for="">คำอธิบายโมดุล</label>
				{!! Form::textarea('detail', null, ["class"=>"form-control"]) !!}
			</div>
			<div class="form-group">
				<label for="">สถานะ</label>
				{!! Form::select('status', ['1'=> 'เปิด', '0' => 'ปิด'], null, ['class' => 'form-control']) !!}
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-info"><i class="fa fa-plus"></i> บันทึก</button>
				<button type="reset" class="btn btn-default">ยกเลิก</button>
			</div>
		</form>
	</div>
</div>
@endsection

@section('js')

<script>
</script>

@endsection
