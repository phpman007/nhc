@extends('backend.theme.master')
@section('title','NHCO ADMIN')

@section('content')

    <nav aria-label="breadcrumb">
        <h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/backend/home">&nbsp;&nbsp;หน้าแรก</a></li>
                <li class="breadcrumb-item active" aria-current="page">กลุ่มผู้ใช้งานระบบ</li>
            </ol>
        </h4>
    </nav>

<div class="card border-info mb-3">

      <div class="card-header">
            <strong>กลุ่มผู้ใช้งานระบบ</strong>
      </div>
      <div class="card-body">

            <form id="frmsearchcheck" method="GET" action="">
                  {{ csrf_field() }}


                  <div class="col-md-12">
                        <div class="form-group">
                              <div class="form-row">
                                    <div class="form-group col-md-6">
                                          <label for="txtprovince">Keyword : </label>
                                          <input id="" class="form-control" name="keyword" placeholder="Keyword ...">
                                    </div>
                              </div>
                        </div>
                  </div>

                  <div class="col-md-12">
                        <div class="form-group">
                              <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> ค้นหา</button>&nbsp;
                                    <a href="{{ Route('backend.groupadmin.index') }}"><button type="button" class="btn btn-warning">ล้างข้อมูล</button></a>
&nbsp;
                                    <a href="{{ Route('backend.groupadmin.create') }}"><button type="button" class="btn btn-warning">สร้าง</button></a>
                              </div>
                        </div>
                  </div>

            </form>
            <hr>
            <div class="col-md-12">
                  <br>
                  <div class="table-responsive">
                        <table class="table table-bordered">
                              <thead>
                                    <tr>
                                          <th>ชื่อกลุ่ม</th>
                                          <th></th>
                                    </tr>

                              </thead>
                              <tbody>
                                    @foreach($items as $item)
                                    <tr>
                                          <td>{{ $item->name }}</td>
                                          <td>
                                                <a href="{{ route('backend.groupadmin.edit', [$item->id]) }}" class="btn btn-default">แก้ไข</a>
                                                <a href="{{ route('backend.groupadmin.delete', [$item->id]) }}" class="btn btn-danger">ลบ</a>
                                          </td>
                                    </tr>
                                    @endforeach
                              </tbody>
                        </table>
                  </div>

                  <div class="d-flex justify-content-center" style="font-size: 13px !important;"><b></b>
                  </div>

            </div>
      </div>

</div>

@endsection
