@extends('backend.theme.master')
@section('title','NHCO ADMIN')

@section('content')

    <nav aria-label="breadcrumb">
        <h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/backend/home">&nbsp;&nbsp;หน้าแรก</a></li>
                <li class="breadcrumb-item"><a href="/backend/reportlog/logNGO1">สถิติผู้เข้าชมเว็บไซต์ผู้แทนองค์กรภาคเอกชน</a></li>
                <li class="breadcrumb-item active" aria-current="page">การขอขึ้นทะเบียนผู้แทนองค์กรภาคเอกชน </li>
            </ol>
        </h4>
    </nav>

<div class="card border-info mb-3">

    <div class="card-header">
        <strong>สถิติผู้เข้าชมเว็บไซต์ การขอขึ้นทะเบียนผู้แทนองค์กรภาคเอกชน</strong>
    </div>
    <div class="card-body">
        @php $id=request()->id @endphp
        <form method="GET" action="{{ url('backend/reportlog/logNGOregis2/'.$id) }}">
            {{ csrf_field() }}
            <div class="col-md-12">
                <div class="form-group">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="txtname">Username : </label>
                            <input class="form-control" value="{{request()->input('txtname')}}" name="txtname" placeholder="ชื่อ Username">
                        </div>
                    </div>
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
                        <a href="{{ url('backend/reportlog/logNGOregis2/'.$id) }}"><button type="button"  class="btn btn-warning">ล้างคำค้น</button></a>
                    </div>
                </div>
            </div>
        </form>
        <hr>
        <div class="col-md-12">
                <div class="form-group">

                    @if($listlogregis->isEmpty())
                        <h3 class="d-flex justify-content-center">ไม่มีข้อมูล</h3>
                    @else
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <tr align="middle">
                                <th>ลำดับที่</th>
                                <th>IP Address</th>
                                <th>Username</th>
                                <th>Page</th>
                                <th>Action</th>
                                <th>วันที่เวลา</th>
                            </tr>

                                @foreach ($listlogregis as $key=>$vallog)
                                    <tr>
                                        <td align="middle">
                                        @if (!empty($_GET['page']))
                                            {{ $key + ($_GET['page'] - 1) * $listlog->PerPage() + 1  }}
                                        @else
                                            {{$key + 1}}
                                        @endif
                                    </td>
                                    <td align="middle">{{$vallog->ipAddress}}</td>
                                    <td align="middle"><a href="{{url('backend/reportlog/logNGOregis3/'.$vallog->members.'/'.$id)}}">{{$vallog->members}}</a></td>

                                    @if($vallog->action == "NGORegis1")
                                        <td align="middle">ขั้นตอนที่ 1</td>
                                        <td align="middle">สมัครขั้นตอนที่ 1</td>
                                    @elseif($vallog->action == "NGORegis2")
                                        <td align="middle">ขั้นตอนที่ 2</td>
                                        <td align="middle">สมัครขั้นตอนที่ 2</td>
                                    @elseif($vallog->action == "NGORegis3")
                                        <td align="middle">ขั้นตอนที่ 3</td>
                                        <td align="middle">สมัครขั้นตอนที่ 3</td>
                                    @elseif($vallog->action == "NGORegis4")
                                        <td align="middle">ขั้นตอนที่ 4</td>
                                        <td align="middle">สมัครขั้นตอนที่ 4</td>
                                    @elseif($vallog->action == "NGORegiscomplete")
                                        <td align="middle">หน้าส่งใบสมัคร</td>
                                        <td align="middle">สมัครเสร็จสิ้น</td>
                                    @endif

                                    <td align="middle">{{$vallog->dt}}</td>
                                    </tr>
                                @endforeach
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
