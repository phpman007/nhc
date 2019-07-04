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
                <form method="POST">
                {{ csrf_field() }}
                  <div class="form-group row"><label class="col-sm-2 col-form-label">อีเมล์</label>

                        <div class="col-sm-10">
                              {!! Form::text('email', @$user->email, ['class'=>'form-control']) !!}
                              @if($errors->has('email'))
                              <span class="form-text m-b-none">{{ $errors->first('email') }}</span>
                              @endif
                              {{-- <input type="text" class="form-control form-control-sm" id="email"> --}}
                        </div>
                  </div>
                  <div class="hr-line-dashed"></div>

                  <div class="form-group  row"><label class="col-sm-2 col-form-label">รหัสผ่าน</label>

                        <div class="col-sm-10">
                              {!! Form::password('password', ['class'=>'form-control']) !!}
                              @if($errors->has('password'))
                              <span class="form-text m-b-none">{{ $errors->first('password') }}</span>
                              @endif
                              {{-- <input type="password" class="form-control form-control-sm" id="password"> --}}
                        </div>
                  </div>
                  <div class="hr-line-dashed"></div>

                  <div class="form-group  row"><label class="col-sm-2 col-form-label">ยืนยันรหัสผ่าน</label>

                        <div class="col-sm-10">
                              {{-- {!! Form::text('tel', @$user->tel, ['class'=>'form-control']) !!}
                              @if($errors->has('tel'))
                              <span class="form-text m-b-none">{{ $errors->first('tel') }}</span>
                              @endif --}}
                              <input type="password" class="form-control form-control-sm" id="confirmpassword">
                        </div>
                  </div>
                  <div class="hr-line-dashed"></div>

                  <div class="form-group  row"><label class="col-sm-2 col-form-label">ตำแหน่ง / กำหนดสิทธิ์</label>

                    <div class="col-sm-10">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="optradio" value="2">Admin
                            </label>
                          </div>
                          <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="optradio" value="1">Super Admin
                            </label>
                        </div>
                    </div>
              </div>
              <div class="hr-line-dashed"></div>

                    <div class="d-flex justify-content-center">
                        <button id="add" name="add" type="submit" value="1" class="btn btn-primary">เพิ่มผู้ใช้</button>&nbsp
                        <button id="clear" name="clear" type="reset" value="2" class="btn btn-warning" onclick="">ล้างข้อมูล</button>&nbsp
                        <button id="back" name="back" type="submit" value="3" class="btn btn-primary" onclick="">กลับ</button>
                    </div>

                </form>
            </div>
      </div>
</div>
@stop
