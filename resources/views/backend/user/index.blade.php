@extends('backend.theme.master')
@section('title','NHC ADMIN')
@section('loginname','สวัสดี A')

@section('content')
<div class="card border-info mb-3">

    <div class="card-header">
        <strong>ข้อมูลผู้ดูแลระบบ</strong>
             <a href="{{ url('backend/user/create') }}" class="btn btn-sm btn-info">เพิ่มรายการ</a>
    </div>
    <div class="card-body">
          <div class="table-responsive">
                <table class="table table-bordered table-table-striped">
                      <tr>
                        <td align="middle">ลำดับที่</td>
                        <td align="middle">อีเมล์</td>
                        <td align="middle">ตำแหน่ง</td>
                        <td align="middle">การจัดการ</td>
                      </tr>
                        @forelse($users as $user)
                      <tr>
                        <td align="middle">{{$user->id}}</td>
                        <td align="middle">{{ $user->email }}</td>
                        <td align="middle">{{ $user->permission }}</td>
                        <td align="middle">
                              <a href="{{ url('backend/user/edit/'.$user->id) }}" class="btn btn-sm btn-info">แก้ไข</a>
                              <a href="{{ url('backend/user/delete/'.$user->id) }}" class="btn btn-sm btn-danger">ลบ</a>
                        </td>
                      </tr>
                      @empty
                      <tr>
                            <td colspan="3">ไม่พบข้อมูล</td>
                      </tr>
                      @endforelse
                </table>

          </div>
    </div>
</div>
@stop
