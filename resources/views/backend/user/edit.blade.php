@extends('backend.theme.master')
@section('title','NHCO ADMIN')

@section('content')
<div class="card border-info mb-3">

    <div class="card-header">
        <strong>{{ $title }}</strong>
    </div>
    <div class="card-body">
        <div class="ibox-content">
            <form method="POST" action="{{ url('backend/user/update/'.$users->id) }}">
            {{ csrf_field() }}
                <div class="form-group row"><label class="col-sm-2 col-form-label">อีเมล์</label>
                    <div class="col-sm-10">
                            {{--  {!! Form::text('email', @$user->email, ['class'=>'form-control']) !!}  --}}
                            {!! Form::text('email', @$users->email, ['class'=>'form-control','readonly']) !!}
                    </div>
                </div>
                <div class="hr-line-dashed"></div>

                <div class="form-group row"><label class="col-sm-2 col-form-label">ชื่อผู้ใช้</label>
                    <div class="col-sm-10">
                            {!! Form::text('username', @$users->username, ['class'=>'form-control','readonly']) !!}
                    </div>
                </div>
                <div class="hr-line-dashed"></div>

                @if(Auth::guard('admin')->user()->id == $users->id)

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
                @endif

                @if(true)
                <div class="form-group  row"><label class="col-sm-2 col-form-label">ตำแหน่ง / กำหนดสิทธิ์</label>
                    <div class="col-sm-10">
                          <ul>
                                @foreach(\DB::table('roles')->where('guard_name', 'admin')->get() as $g)
                                <li style="list-style:none;"><div class="form-check-inline i-checks"><label>{!! Form::radio('permission', $g->id, $users->permission == $g->id ? 1 : 0) !!} <i></i> {{$g->name}} </label></div></li>
                                @endforeach
                          </ul>

                        @if($errors->has('permission'))
                            <span style="color:red" class="form-text m-b-none">{{ $errors->first('permission') }}</span>
                        @endif
                    </div>
                </div>

                <div class="hr-line-dashed"></div>
                <div class="form-group  row"><label class="col-sm-2 col-form-label">กำหนดสิทธิ์ตามเขต</label>
                    <div class="col-sm-10">
                          <ul>

                        {{-- {{ dd(json_decode($users->sectionControl)) }} --}}
                    @if (!empty($users->sectionControl))
                        @php
                         $check = json_decode($users->sectionControl)
                        @endphp

                        @for($i=1; $i<=13; $i++)

                            <input type="checkbox" value="{{$i}}" id="chk01" name="chk[]"
                                @if (in_array($i, $check))
                                    checked
                                @endif
                            >
                            <label for="chk01">เขต {{$i}} </label><br>

                        @endfor

                    @else

                        @for($i=1; $i<=13; $i++)
                            <input type="checkbox" value="{{$i}}" id="chk01" name="chk[]">
                            <label for="chk01">เขต {{$i}} </label><br>
                        @endfor

                    @endif

                        {{-- @foreach ($check as $item)
                            <input type="checkbox" value="1" id="chk01" name="chk[]">
                            <label for="chk01">เขต {{$item}} </label><br>
                        @endforeach --}}

                          </ul>
                    </div>
                </div>

                <div class="hr-line-dashed"></div>
                @endif

                <div class="d-flex justify-content-center">
                    <button id="add" name="add" type="submit" class="btn btn-primary">แก้ไขผู้ใช้</button>&nbsp
                    <a href="{{ url('backend/user') }}"><button id="back" name="back" type="button" class="btn btn-primary">กลับ</button></a>
                </div>

            </form>
        </div>
    </div>
</div>
@stop
@section('js')

<script src={{ asset("backend/js/plugins/iCheck/icheck.min.js") }}></script>
<script>
    $(document).ready(function () {
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });
    });

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
