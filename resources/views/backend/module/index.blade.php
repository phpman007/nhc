@extends('backend.theme.master')
@section('title','NHCO ADMIN')

@section('content')
<div class="card border-info mb-3">

	<div class="card-header">
		<strong>{{ $titlePage }} <small>{{ $descPage }} | version: {{ $version }}</small></strong>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-md-12">
				<div class="input-group mb-3">
					<input type="text" class="form-control" placeholder="ค้นหา...">
					<div class="input-group-append">
						<button class="btn btn-outline-secondary" type="button">ค้นหา</button>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<a href="{{ url('backend/module/add') }}" class="btn btn-default">+ เพิ่มรายการ</a>
					<a href="{{ url('backend/module/remove-bulk') }}" class="btn btn-danger">ลบรายการ</a>
				</div>
			</div>
		</div>
		<div class="table-responsive">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>
							<input type="checkbox" name="" value="">
						</th>
						<th>ชื่อโมดุล</th>
						<th>จัดการ</th>
					</tr>
				</thead>
				<tbody>
					@if($items->count() == 0)
						<tr>
							<td colspan="4">ไม่พบรายการ</td>
						</tr>
					@endif
					@foreach($items as $key => $item)
					<tr>
						<th>
							<input type="checkbox" name="" value="">
						</th>
						<td>{{ $item->module_label }} <small> | Module : {{ $item->module_name }}</small></td>
						<td>
							<a class="btn btn-default" href="{{ url('backend/module/update/'. $item->id) }}">แก้ไข</a>
							<a class="btn btn-default" href="{{ url('backend/module/remove/'. $item->id) }}">ลบ</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			{!! $items->appends($_GET)->render() !!}
		</div>
	</div>
</div>
@endsection

@section('js')

<script>
</script>

@endsection
