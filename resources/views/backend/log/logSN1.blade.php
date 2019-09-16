@extends('backend.theme.master')
@section('title','NHCO ADMIN')

@section('content')

    <nav aria-label="breadcrumb">
        <h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/backend/home">&nbsp;&nbsp;หน้าแรก</a></li>
                <li class="breadcrumb-item active" aria-current="page">สถิติผู้เข้าชมเว็บไซต์การสมัครผู้ทรงคุณวุฒิ</li>
            </ol>
        </h4>
    </nav>

<div class="card border-info mb-3">

    <div class="card-header">
        <strong>สถิติผู้เข้าชมเว็บไซต์ การสมัครผู้ทรงคุณวุฒิ</strong>
    </div>
    <div class="card-body">
        <form id="frmsearchcheck" method="GET" action="{{url('backend/reportlog/logSN1')}}">
            {{ csrf_field() }}
            <div class="col-md-12">
                <div class="form-group">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <div class="input-group mb-2">
                                <label for="txtdate1">ตั้งแต่วันที่ :</label>
                                <input value="{{ request()->input('txtdate1') }}" style="font-size: 13px !important;" name="txtdate1"  class="form-control datepicker" data-date-format="mm/dd/yyyy">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <div class="input-group mb-2">
                                <label for="txtdate2">ถึงวันที่ :</label>
                                <input value="{{ request()->input('txtdate2') }}" style="font-size: 13px !important;" name="txtdate2"  class="form-control datepicker" data-date-format="mm/dd/yyyy">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> ค้นหา</button>&nbsp
                        <a href="{{url('backend/reportlog/logSN1')}}"><button type="button"  class="btn btn-warning">ล้างคำค้น</button></a>
                    </div>
                </div>
            </div>

        </form>
        <hr>

        <div class="col-md-12">
            <div class="form-group">
                @if($list1=="" and $list2=="" and $list3=="" and $list4=="" and $list5=="" and $list6=="" and $list7=="")
                {{--  @if($list1=="")  --}}
                    <h3 class="d-flex justify-content-center">ไม่มีข้อมูล</h3>
                @else
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <tr align="middle">
                            <th>ขั้นตอนที่ 1</th>
                            <th>ขั้นตอนที่ 2</th>
                            <th>ขั้นตอนที่ 3</th>
                            <th>ขั้นตอนที่ 4</th>
                            <th>ขั้นตอนที่ 5</th>
                            <th>ขั้นตอนที่ 6</th>
                            <th>เสร็จสิ้น</th>
                        </tr>
                        <tr>
                            <td align="middle"><a href="{{url('backend/reportlog/logSN2/1')}}">{{$list1}}</a></td>
                            <td align="middle"><a href="{{url('backend/reportlog/logSN2/2')}}">{{$list2}}</a></td>
                            <td align="middle"><a href="{{url('backend/reportlog/logSN2/3')}}">{{$list3}}</a></td>
                            <td align="middle"><a href="{{url('backend/reportlog/logSN2/4')}}">{{$list4}}</a></td>
                            <td align="middle"><a href="{{url('backend/reportlog/logSN2/5')}}">{{$list5}}</a></td>
                            <td align="middle"><a href="{{url('backend/reportlog/logSN2/6')}}">{{$list6}}</a></td>
                            <td align="middle"><a href="{{url('backend/reportlog/logSN2/7')}}">{{$list7}}</a></td>
                    </table>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')

<script>
    function changename(id){
        var a;
        alert(document.getElementsByName("txtname")[0].value);
    }

    $(function(){
        $('.js-example-basic-multiple').select2({
        maximumSelectionLength: 3
        });
    });

    $(document).ready(function () {
        $('.datepicker').datepicker({
            format: 'dd/mm/yyyy',
            todayBtn: true,
            language: 'th',             //เปลี่ยน label ต่างของ ปฏิทิน ให้เป็น ภาษาไทย   (ต้องใช้ไฟล์ bootstrap-datepicker.th.min.js นี้ด้วย)
            //thaiyear: true              //Set เป็นปี พ.ศ.
        });
        //}).datepicker("setDate", "0");  //กำหนดเป็นวันปัจุบัน

        $('.clockpicker').clockpicker();
    });

    @if (Session::has('success'))
    toastr.options = {
        closeButton: true,
        progressBar: true,
        showMethod: 'slideDown',
        timeOut: 1000
    };
    toastr.success("{{ Session::get('success') }}", '');
    @endif

    @if (Session::has( 'error' ))
    toastr.options = {
        closeButton: true,
        progressBar: true,
        showMethod: 'slideDown',
        timeOut: 2000
    };
    toastr.error("{{ Session::get('error') }}", '');
    @endif
</script>

<script>
    function changedate(id){
        document.getElementsByName('frmchangedate[]')[id].submit();
    }

    function changedate2(id){
        document.getElementsByName('frmchangedate2[]')[id].submit();
    }

    function changedate3(id){
        document.getElementsByName('frmchangedate3[]')[id].submit();
    }

</script>

@endsection
