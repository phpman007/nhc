@extends('backend.theme.master')
@section('title','NHCO ADMIN')

@section('content')
<div class="card border-info mb-3">

    <div class="card-header">
        <strong>ข้อมูลผู้ดูแลระบบ </strong>
        <a href="{{ url('backend/user/create') }}" class="btn btn-sm btn-info"><i class="fa fa-plus"></i> เพิ่มรายการ</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <tr>
                <td align="middle">ลำดับที่</td>
                <td align="middle">ชื่อผู้ใช้</td>
                <td align="middle">อีเมล์</td>
                <td align="middle">ระดับ</td>
                <td align="middle">การจัดการ</td>
            </tr>
            <tr>
                <td align="middle"></td>
                <td align="middle"></td>
                <td align="middle"></td>
                <td align="middle"></td>
                <td align="middle">
                    <button type="button" class="btn btn-sm btn-info"><i class="fa fa-edit"></i> แก้ไข</button>
                    <button type="button" class="btn btn-sm btn-danger demo3"><i class="fa fa-trash"></i> ลบ</button>
                </td>
            </tr>
        </table>
        </div>
    </div>
</div>

<hr>

<div class="card border-info mb-3">
    <div class="card-header">
        <strong>ข้อมูลการกำหนดสิทธิ์ </strong>
        <a href="{{ url('backend/permission/create') }}" class="btn btn-sm btn-info"><i class="fa fa-plus"></i> เพิ่มรายการ</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <tr>
                <td align="middle">ลำดับที่</td>
                <td align="middle">ระดับ</td>
                <td align="middle">วันลงทะเบียน</td>
                <td align="middle">ผู้สมัคร</td>
                <td align="middle">ผู้ดูแลระบบ</td>
                <td align="middle">กำหนดสิทธิ์</td>
                <td align="middle">การจัดการ</td>
            </tr>
            <tr>
                <td align="middle"></td>
                <td align="middle"></td>
                <td align="middle"><input type="checkbox"> แก้ไข <input type="checkbox"> ดูข้อมูล</td>
                <td align="middle"><input type="checkbox"> ตรวจสอบ <input type="checkbox"> อนุมัติ <input type="checkbox"> ดูข้อมูล</td>
                <td align="middle"><input type="checkbox"> เพิ่ม <input type="checkbox"> แก้ไข <input type="checkbox"> อ่าน <input type="checkbox"> ลบ</td>
                <td align="middle"><input type="checkbox"> เพิ่ม <input type="checkbox"> แก้ไข <input type="checkbox"> อ่าน <input type="checkbox"> ลบ</td>
                <td align="middle">
                    <button type="button" class="btn btn-sm btn-info"><i class="fa fa-edit"></i> แก้ไข</button>
                    <button type="button" class="btn btn-sm btn-danger demo3"><i class="fa fa-trash"></i> ลบ</button>
                </td>
            </tr>
        </table>
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
