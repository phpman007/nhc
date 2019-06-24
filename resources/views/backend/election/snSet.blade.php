@extends('backend.theme.master')
@section('title','NHC ADMIN')
@section('loginname','สวัสดี A')
@section('content')
<div class="card border-info mb-3">
    <div class="card-header">
        <strong>ตั้งวันการลงทะเบียน ผู้ทรงคุณวุฒิ</strong>
    </div>
    <div class="card-body">
        <div class="row">
            <label for="inputdatepicker" class="col-md-2 control-label">datepicker</label>
            <div class="input-group mb-2">
                <input id="inputdatepicker" class="form-control datepicker" data-date-format="mm/dd/yyyy">
                <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-calendar"></i></div>
                    </div>
            </div>

        </div>
    </div>
</div>
@endsection

