@extends('backend.theme.master')
@section('title','NHCO ADMIN')

@section('content')
<div class="card border-info mb-3">

    <div class="card-header">
        <strong>{{ $title }}</strong>
    </div>
    <div class="card-body">
        <div class="ibox-content">
            <form method="POST" action="{{ url('backend/user/store') }}">
                {{ csrf_field() }}
                <div class="form-group row"><label class="col-sm-2 col-form-label">อีเมล์</label>
                    <div class="col-sm-10">
                            {{--  {!! Form::text('email', @$user->email, ['class'=>'form-control']) !!}  --}}
                            {!! Form::text('email', null, ['class'=>'form-control']) !!}
                            @if($errors->has('email'))
                            <span style="color:red" class="form-text m-b-none">{{ $errors->first('email') }}</span>
                            @endif
                    </div>
                </div>
                <div class="hr-line-dashed"></div>

                <div class="form-group row"><label class="col-sm-2 col-form-label">ชื่อผู้ใช้</label>
                    <div class="col-sm-10">
                            {!! Form::text('username', null, ['class'=>'form-control']) !!}
                            @if($errors->has('username'))
                            <span style="color:red" class="form-text m-b-none">{{ $errors->first('username') }}</span>
                            @endif
                    </div>
                </div>
                <div class="hr-line-dashed"></div>

                <div class="form-group  row"><label class="col-sm-2 col-form-label">รหัสผ่าน</label>
                    <div class="col-sm-10">
                            {!! Form::password('password', ['class'=>'form-control']) !!}
                            @if($errors->has('password'))
                            <span style="color:red" class="form-text m-b-none">{{ $errors->first('password') }}</span>
                            @endif
                    </div>
                </div>
                <div class="hr-line-dashed"></div>

                <div class="form-group  row"><label class="col-sm-2 col-form-label">ยืนยันรหัสผ่าน</label>
                    <div class="col-sm-10">
                            {!! Form::password('password_confirmation', ['class'=>'form-control']) !!}
                            @if($errors->has('password_confirmation'))
                            <span style="color:red" class="form-text m-b-none">{{ $errors->first('password_confirmation') }}</span>
                            @endif
                    </div>
                </div>
                <div class="hr-line-dashed"></div>

                <div class="form-group  row"><label class="col-sm-2 col-form-label">ตำแหน่ง / กำหนดสิทธิ์</label>
                    <div class="col-sm-10">
                        <div class="form-check-inline i-checks"><label>{!! Form::radio('permission', '2', ['checked' => true]) !!} <i></i> Admin </label></div>
                        <div class="form-check-inline i-checks"><label>{!! Form::radio('permission', '1') !!} <i></i> Super Admin </label></div>
                        @if($errors->has('permission'))
                            <span style="color:red" class="form-text m-b-none">{{ $errors->first('permission') }}</span>
                        @endif
                    </div>
                </div>
                <div class="hr-line-dashed"></div>

                <div class="d-flex justify-content-center">
                    <button id="add" name="add" type="submit" class="btn btn-primary">เพิ่มผู้ใช้</button>&nbsp
                    <button id="clear" name="clear" type="reset" class="btn btn-warning">ล้างข้อมูล</button>&nbsp
                    <a href="{{ url('backend/user') }}"><button id="back" name="back" type="button" class="btn btn-primary">กลับ</button></a>
                </div>

            </form>
        </div>
    </div>
</div>
@stop
@section('js')

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

@endsection
