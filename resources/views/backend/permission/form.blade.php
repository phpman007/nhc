@extends('backend.theme.master')
@section('title','NHCO ADMIN')

@section('content')
<div class="card border-info mb-3">

    <div class="card-header">
        <strong>เพิ่มข้อมูลสิทธิ์</strong>
    </div>
    <div class="card-body">
        <div class="ibox-content">
            <form method="POST" action="{{ url('backend/permission/store') }}">
                {{ csrf_field() }}
                <div class="form-group row"><label class="col-sm-2 col-form-label">ชื่อระดับ</label>
                    <div class="col-sm-10">
                        {!! Form::text('permission', null, ['class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="hr-line-dashed"></div>

                <div class="form-group row"><label class="col-sm-2 col-form-label">สิทธิ์ในการจัดการวันที่ลงทะเบียน</label>
                    <div class="col-sm-10">
                        <input type="checkbox" class="form-check-input"> เปลี่ยนแปลงวันที่ <br>
                        <input type="checkbox" class="form-check-input"> ดูข้อมูล
                    </div>
                </div>
                <div class="hr-line-dashed"></div>

                <div class="form-group  row"><label class="col-sm-2 col-form-label">สิทธิ์ในการจัดการผู้สมัคร</label>
                    <div class="col-sm-10">
                        <input type="checkbox" class="form-check-input"> ตรวจสอบผู้สมัคร <br>
                        <input type="checkbox" class="form-check-input"> อนุมัติผู้สมัคร <br>
                        <input type="checkbox" class="form-check-input"> ดูข้อมูลผู้สมัคร
                    </div>
                </div>
                <div class="hr-line-dashed"></div>

                <div class="form-group  row"><label class="col-sm-2 col-form-label">สิทธิ์ในการจัดการผู้ดูแลระบบ</label>
                    <div class="col-sm-10">
                        <input type="checkbox" class="form-check-input"> เพิ่มข้อมูล <br>
                        <input type="checkbox" class="form-check-input"> แก้ไขข้อมูล <br>
                        <input type="checkbox" class="form-check-input"> ดูข้อมูล <br>
                        <input type="checkbox" class="form-check-input"> ลบข้อมูล
                    </div>
                </div>
                <div class="hr-line-dashed"></div>

                <div class="form-group  row"><label class="col-sm-2 col-form-label">สิทธิ์ในการกำหนดสิทธิ์</label>
                    <div class="col-sm-10">
                        <input type="checkbox" class="form-check-input"> เพิ่มข้อมูลสิทธิ์ <br>
                        <input type="checkbox" class="form-check-input"> แก้ไขข้อมูล <br>
                        <input type="checkbox" class="form-check-input"> ดูข้อมูล <br>
                        <input type="checkbox" class="form-check-input"> ลบข้อมูล
                    </div>
                </div>
                <div class="hr-line-dashed"></div>

                <div class="d-flex justify-content-center">
                    <button id="add" name="add" type="submit" class="btn btn-primary">เพิ่มสิทธิ์</button>&nbsp
                    <button id="clear" name="clear" type="reset" class="btn btn-warning">ล้างข้อมูล</button>&nbsp
                    <a href="{{ url('backend/permission') }}"><button id="back" name="back" type="button" class="btn btn-primary">กลับ</button></a>
                </div>

            </form>
        </div>
    </div>
</div>
@stop

{{-- @section('js')

<script>
    @if (Session::has('success'))
        toastr.options = {
            closeButton: true,
            progressBar: true,
            showMethod: 'slideDown',
            timeOut: 2000
        };
        toastr.success("{{ Session::get('success') }}", "");
    @endif

    @if (Session::has( 'error' ))
        toastr.options = {
            closeButton: true,
            progressBar: true,
            showMethod: 'slideDown',
            timeOut: 2000
        };
        toastr.error("{{ Session::get('error') }}", "");
    @endif

</script>

@endsection --}}
