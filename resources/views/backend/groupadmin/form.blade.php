@extends('backend.theme.master')
@section('title','NHCO ADMIN')

@section('content')

    <nav aria-label="breadcrumb">
        <h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/backend/home">&nbsp;&nbsp;หน้าแรก</a></li>
                <li class="breadcrumb-item"><a href="/backend/groupadmin/index">กลุ่มผู้ใช้งานระบบ</a></li>
                <li class="breadcrumb-item active" aria-current="page">แก้ไขกลุ่มผู้ใช้งานระบบ</li>
            </ol>
        </h4>
    </nav>

<div class="card border-info mb-3">

      <div class="card-header">
            <strong>กลุ่มผู้ใช้งานระบบ</strong>
      </div>
      <div class="card-body">

            <form id="frmsearchcheck" method="POST" action="{{ empty(@$item) ? route('backend.groupadmin.store') : route('backend.groupadmin.update', [$item->id]) }}">
                  {{ csrf_field() }}

                  <div class="col-md-12">
                        <div class="form-group">
                              <div class="form-row">
                                    <div class="form-group col-md-6">
                                          <label for="txtprovince">ชื่อกลุ่ม : </label>
                                          {!! Form::text('name', @$item->name, ['class' => 'form-control']) !!}

                                          @if($errors->has('name'))
                                          <small style="color:red">{{ $errors->first('name') }}</small>
                                          @endif
                                    </div>
                              </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>กลุ่มผู้ทรงคุณวุฒิ </label>
                                </div>
                            </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{!! Form::checkbox('permission[]', 'set_date_register_professional', !empty(@$item->permissions) ? @$item->permissions->where('name', 'set_date_register_professional')->count() : null, []) !!}
                                            &nbsp;&nbsp;ตั้งวันการลงทะเบียนผู้ทรงคุณวุฒิ
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{!! Form::checkbox('permission[]', 'logs_professional', !empty(@$item->permissions) ? @$item->permissions->where('name', 'logs_professional')->count() : null, []) !!}
                                            &nbsp;&nbsp;สถิติการเข้าชมเว็บไซต์ผู้ทรงคุณวุฒิ
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{!! Form::checkbox('permission[]', 'view_professional', !empty(@$item->permissions) ? @$item->permissions->where('name', 'view_professional')->count() : null, []) !!}
                                            &nbsp;&nbsp;ข้อมูลการสมัครผู้ทรงคุณวุฒิ
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{!! Form::checkbox('permission[]', 'check_evidence_professional', !empty(@$item->permissions) ? @$item->permissions->where('name', 'check_evidence_professional')->count() : null, []) !!}
                                            &nbsp;&nbsp;ตรวจสอบหลักฐานผู้ทรงคุณวุฒิ
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{!! Form::checkbox('permission[]', 'approve_professional', !empty(@$item->permissions) ? @$item->permissions->where('name', 'approve_professional')->count() : null, []) !!}
                                            &nbsp;&nbsp;อนุมัติผู้ทรงคุณวุฒิ
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{!! Form::checkbox('permission[]', 'report_professional', !empty(@$item->permissions) ? @$item->permissions->where('name', 'report_professional')->count() : null, []) !!}
                                            &nbsp;&nbsp;รายงานส่งอีเมล์ผู้ทรงคุณวุฒิ
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{!! Form::checkbox('permission[]', 'check_confirm_vote_professional', !empty(@$item->permissions) ? @$item->permissions->where('name', 'check_confirm_vote_professional')->count() : null, []) !!}
                                            &nbsp;&nbsp;ตรวจสอบรายชื่อผู้ทรงคุณวุฒิ ยืนยันใช้สิทธิ์ลงคะแนน
                                    </div>
                                </div><div class="row">
                                    <div class="col-md-4">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{!! Form::checkbox('permission[]', 'realtime_professional', !empty(@$item->permissions) ? @$item->permissions->where('name', 'realtime_professional')->count() : null, []) !!}
                                            &nbsp;&nbsp;ผลการลงคะแนนแบบ Realtime ผู้ทรงคุณวุฒิ
                                    </div>
                                </div>

                            <hr>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>กลุ่มผู้แทนองค์กรภาคเอกชน </label>
                                </div>
                            </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{!! Form::checkbox('permission[]', 'set_date_register_ngo', !empty(@$item->permissions) ? @$item->permissions->where('name', 'set_date_register_ngo')->count() : null, []) !!}
                                            &nbsp;&nbsp;ตั้งวันการลงทะเบียนผู้แทนองค์กรภาคเอกชน
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{!! Form::checkbox('permission[]', 'logs_ngo', !empty(@$item->permissions) ? @$item->permissions->where('name', 'logs_ngo')->count() : null, []) !!}
                                            &nbsp;&nbsp;สถิติการเข้าชมเว็บไซต์ผู้แทนองค์กรภาคเอกชน
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{!! Form::checkbox('permission[]', 'view_ngo', !empty(@$item->permissions) ? @$item->permissions->where('name', 'view_ngo')->count() : null, []) !!}
                                            &nbsp;&nbsp;ข้อมูลการสมัครผู้แทนองค์กรภาคเอกชน
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{!! Form::checkbox('permission[]', 'check_evidence_ngo', !empty(@$item->permissions) ? @$item->permissions->where('name', 'check_evidence_ngo')->count() : null, []) !!}
                                            &nbsp;&nbsp;ตรวจสอบหลักฐานผู้แทนองค์กรภาคเอกชน
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{!! Form::checkbox('permission[]', 'approve_ngo', !empty(@$item->permissions) ? @$item->permissions->where('name', 'approve_ngo')->count() : null, []) !!}
                                            &nbsp;&nbsp;อนุมัติผู้แทนองค์กรภาคเอกชน
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{!! Form::checkbox('permission[]', 'report_ngo', !empty(@$item->permissions) ? @$item->permissions->where('name', 'report_ngo')->count() : null, []) !!}
                                            &nbsp;&nbsp;รายงานส่งอีเมล์ผู้แทนองค์กรภาคเอกชน
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{!! Form::checkbox('permission[]', 'check_confirm_vote_ngo', !empty(@$item->permissions) ? @$item->permissions->where('name', 'check_confirm_vote_ngo')->count() : null, []) !!}
                                            &nbsp;&nbsp;ตรวจสอบรายชื่อผู้แทนองค์กรภาคเอกชน ยืนยันใช้สิทธิ์ลงคะแนน
                                    </div>
                                </div><div class="row">
                                    <div class="col-md-4">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{!! Form::checkbox('permission[]', 'realtime_ngo', !empty(@$item->permissions) ? @$item->permissions->where('name', 'realtime_ngo')->count() : null, []) !!}
                                            &nbsp;&nbsp;ผลการลงคะแนนแบบ Realtime ผู้แทนองค์กรภาคเอกชน
                                    </div>
                                </div>

                            <hr>

                            {{-- <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>กลุ่มผู้แทนองค์กรปกครองส่วนท้องถิ่น </label>
                                </div>
                            </div>
                            <div class="row">
                                    <div class="col-md-4">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{!! Form::checkbox('permission[]', 'set_date_register_professional', !empty(@$item->permissions) ? @$item->permissions->where('name', 'set_date_register_professional')->count() : null, []) !!}
                                            &nbsp;&nbsp;ตั้งวันการลงทะเบียนผู้แทนองค์กรส่วนท้องถิ่น
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{!! Form::checkbox('permission[]', 'set_date_register_professional', !empty(@$item->permissions) ? @$item->permissions->where('name', 'set_date_register_professional')->count() : null, []) !!}
                                            &nbsp;&nbsp;สถิติการเข้าชมเว็บไซต์ผู้แทนองค์กรส่วนท้องถิ่น
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{!! Form::checkbox('permission[]', 'set_date_register_professional', !empty(@$item->permissions) ? @$item->permissions->where('name', 'set_date_register_professional')->count() : null, []) !!}
                                            &nbsp;&nbsp;ข้อมูลการสมัครผู้แทนองค์กรส่วนท้องถิ่น
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{!! Form::checkbox('permission[]', 'set_date_register_professional', !empty(@$item->permissions) ? @$item->permissions->where('name', 'set_date_register_professional')->count() : null, []) !!}
                                            &nbsp;&nbsp;ตรวจสอบหลักฐานผู้แทนองค์กรส่วนท้องถิ่น
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{!! Form::checkbox('permission[]', 'set_date_register_professional', !empty(@$item->permissions) ? @$item->permissions->where('name', 'set_date_register_professional')->count() : null, []) !!}
                                            &nbsp;&nbsp;อนุมัติผู้แทนองค์กรส่วนท้องถิ่น
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{!! Form::checkbox('permission[]', 'set_date_register_professional', !empty(@$item->permissions) ? @$item->permissions->where('name', 'set_date_register_professional')->count() : null, []) !!}
                                            &nbsp;&nbsp;รายงานส่งอีเมล์ผู้แทนองค์กรส่วนท้องถิ่น
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{!! Form::checkbox('permission[]', 'set_date_register_professional', !empty(@$item->permissions) ? @$item->permissions->where('name', 'set_date_register_professional')->count() : null, []) !!}
                                            &nbsp;&nbsp;ตรวจสอบรายชื่อผู้แทนองค์กรส่วนท้องถิ่น ยืนยันใช้สิทธิ์ลงคะแนน
                                    </div>
                                </div><div class="row">
                                    <div class="col-md-4">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{!! Form::checkbox('permission[]', 'set_date_register_professional', !empty(@$item->permissions) ? @$item->permissions->where('name', 'set_date_register_professional')->count() : null, []) !!}
                                            &nbsp;&nbsp;ผลการลงคะแนนแบบ Realtime ผู้แทนองค์กรส่วนท้องถิ่น
                                    </div>
                                </div> --}}

                        </div>
                  </div>





                  {{-- <ul>
                        <li>
                              <div class="row">
                                    <div class="col-md-4">
                                            {!! Form::checkbox('permission[]', 'set_date_register_professional', !empty(@$item->permissions) ? @$item->permissions->where('name', 'set_date_register_professional')->count() : null, []) !!}
                                            &nbsp;&nbsp;ตั้งวันการลงทะเบียนผู้ทรงคุณวุฒิ
                                    </div>

                              </div>
                        </li>
                        <li>
                              <div class="row">
                                    <div class="col-md-4">
                                        {!! Form::checkbox('permission[]', 'set_date_register_organize',!empty(@$item->permissions) ? @$item->permissions->where('name', 'set_date_register_organize')->count() : null, []) !!}
                                        &nbsp;&nbsp;ตั้งวันการลงทะเบียนผู้แทนองค์กรส่วนท้องถิ่น
                                    </div>
                              </div>
                        </li>
                        <li>
                              <div class="row">
                                    <div class="col-md-4">
                                        {!! Form::checkbox('permission[]', 'set_date_register_ngo', !empty(@$item->permissions) ? @$item->permissions->where('name', 'set_date_register_ngo')->count() : null, []) !!}
                                        &nbsp;&nbsp;ตั้งวันการลงทะเบียนผู้แทนองค์กรภาคเอกชน
                                    </div>
                              </div>
                        </li>
                        <li>
                              <div class="row">
                                    <div class="col-md-4">
                                        {!! Form::checkbox('permission[]', 'check_evidence_professional', !empty(@$item->permissions) ? @$item->permissions->where('name', 'check_evidence_professional')->count() : null, []) !!}
                                        &nbsp;&nbsp;ตรวจสอบหลักฐานผู้ทรงคุณวุฒิ
                                    </div>
                              </div>
                        </li>
                        <li>
                              <div class="row">
                                    <div class="col-md-4">
                                        {!! Form::checkbox('permission[]', 'approve_professional',!empty(@$item->permissions) ? @$item->permissions->where('name', 'approve_professional')->count() : null, []) !!}
                                        &nbsp;&nbsp;อนุมัติ ผู้ทรงคุณวุฒิ
                                    </div>
                              </div>
                        </li>
                        <li>
                              <div class="row">
                                    <div class="col-md-4">
                                        {!! Form::checkbox('permission[]', 'check_evidence_voter',  !empty(@$item->permissions) ? @$item->permissions->where('name', 'check_evidence_voter')->count() : null, []) !!}
                                        &nbsp;&nbsp;ตรวจสอบหลักฐาน ผู้รับสิทธิลงคะแนน ผู้แทนองค์กรส่วนท้องถิ่น
                                    </div>
                              </div>
                        </li>
                        <li>
                              <div class="row">
                                    <div class="col-md-4">
                                        {!! Form::checkbox('permission[]', 'approve_voter',  !empty(@$item->permissions) ? @$item->permissions->where('name', 'approve_voter')->count() : null, []) !!}
                                        &nbsp;&nbsp;อนุมัติ ผู้รับสิทธิลงคะแนน ผู้แทนองค์กรส่วนท้องถิ่น
                                    </div>
                              </div>
                        </li>
                        <li>
                              <div class="row">
                                    <div class="col-md-4">
                                        {!! Form::checkbox('permission[]', 'check_evidence_organize', !empty(@$item->permissions) ? @$item->permissions->where('name', 'check_evidence_organize')->count() : null, []) !!}
                                        &nbsp;&nbsp;ตรวจสอบหลักฐาน ผู้แทนองค์กรส่วนท้องถิ่น
                                    </div>
                              </div>
                        </li>
                        <li>
                              <div class="row">
                                    <div class="col-md-4">
                                        {!! Form::checkbox('permission[]', 'approve_organize', !empty(@$item->permissions) ? @$item->permissions->where('name', 'approve_organize')->count() : null, []) !!}
                                        &nbsp;&nbsp;อนุมัติ ผู้แทนองค์กรส่วนท้องถิ่น
                                    </div>
                              </div>
                        </li>
                        <li>
                              <div class="row">
                                    <div class="col-md-4">
                                        {!! Form::checkbox('permission[]', 'check_evidence_ngo', !empty(@$item->permissions) ? @$item->permissions->where('name', 'check_evidence_ngo')->count() : null , []) !!}
                                        &nbsp;&nbsp;ตรวจสอบหลักฐาน ผู้แทนองค์กรภาคเอกชน
                                    </div>
                              </div>
                        </li>
                        <li>
                              <div class="row">
                                    <div class="col-md-4">
                                        {!! Form::checkbox('permission[]', 'approve_ngo',!empty(@$item->permissions) ? @$item->permissions->where('name', 'approve_ngo')->count() : null, []) !!}
                                        &nbsp;&nbsp;อนุมัติ ผู้แทนองค์กรภาคเอกชน
                                    </div>
                              </div>
                        </li>
                        <li>
                              <div class="row">
                                    <div class="col-md-4">
                                        {!! Form::checkbox('permission[]', 'logs_professional',  !empty(@$item->permissions) ?  @$item->permissions->where('name', 'logs_professional')->count() : null, []) !!}
                                        &nbsp;&nbsp;สถิติการเข้าชมเว็บไซต์ผู้ทรงคุณวุฒิ
                                    </div>
                              </div>
                        </li>
                        <li>
                              <div class="row">
                                    <div class="col-md-4">
                                        {!! Form::checkbox('permission[]', 'logs_ngo', !empty(@$item->permissions) ? @$item->permissions->where('name', 'logs_ngo')->count() : null, []) !!}
                                        &nbsp;&nbsp;สถิติการเข้าชมเว็บไซต์ผู้แทนองค์กรภาคเอกชน
                                    </div>
                              </div>
                        </li>
                  </ul> --}}

                <div class="row">
                    <div class="col-md-4">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{!! Form::checkbox('permission[]', 'user_management', !empty(@$item->permissions) ? @$item->permissions->where('name', 'user_management')->count() : null, []) !!}
                            &nbsp;&nbsp;จัดการผู้ใช้
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{!! Form::checkbox('permission[]', 'user_group_management', !empty(@$item->permissions) ? @$item->permissions->where('name', 'user_group_management')->count() : null, []) !!}
                            &nbsp;&nbsp;กลุ่มผู้ใช้งาน
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{!! Form::checkbox('permission[]', 'menu_management', !empty(@$item->permissions) ? @$item->permissions->where('name', 'menu_management')->count() : null, []) !!}
                            &nbsp;&nbsp;เมนู
                    </div>
                </div>

                  <div class="col-md-12">
                        <div class="form-group">
                              <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary"> เพิ่มข้อมูล</button>&nbsp;
                                    <a href="{{ Route('backend.groupadmin.index') }}"><button type="button" class="btn btn-warning">ยกเลิก</button></a>
                              </div>
                        </div>
                  </div>

            </form>
            <hr>

      </div>

</div>

@endsection
