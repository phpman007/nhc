@extends('backend.theme.master')
@section('title','NHC ADMIN')
@section('loginname','สวัสดี A')

@section('content')
<div class="card border-info mb-3">

      <div class="card-header">
            <strong>{{ $title }}</strong>
      </div>
      <div class="card-body">
            <div class="ibox-content">

                  <div class="form-group  row"><label class="col-sm-2 col-form-label">Email</label>

                        <div class="col-sm-10">
                              {!! Form::text('email', @$user->email, ['class'=>'form-control']) !!}
                              @if($errors->has('email'))
                              <span class="form-text m-b-none">{{ $errors->first('email') }}</span>
                              @endif
                        </div>
                  </div>
                  <div class="hr-line-dashed"></div>

                  <div class="form-group  row"><label class="col-sm-2 col-form-label">Password</label>

                        <div class="col-sm-10">
                              {!! Form::password('password', ['class'=>'form-control']) !!}
                              @if($errors->has('password'))
                              <span class="form-text m-b-none">{{ $errors->first('password') }}</span>
                              @endif
                        </div>
                  </div>
                  <div class="hr-line-dashed"></div>

                  <div class="form-group  row"><label class="col-sm-2 col-form-label">Password</label>

                        <div class="col-sm-10">
                              {!! Form::text('tel', @$user->tel, ['class'=>'form-control']) !!}
                              @if($errors->has('tel'))
                              <span class="form-text m-b-none">{{ $errors->first('tel') }}</span>
                              @endif
                        </div>
                  </div>
                  <div class="hr-line-dashed"></div>

            </div>
      </div>
</div>
@stop
