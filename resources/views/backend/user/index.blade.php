@extends('backend.theme.master')
@section('title','NHCO ADMIN')

@section('content')
<div class="card border-info mb-3">

    <div class="card-header">
        <strong>ข้อมูลผู้ดูแลระบบ</strong>

             <a href="{{ url('backend/user/create') }}" class="btn btn-sm btn-primary">เพิ่มรายการ</a>

    </div>
    <div class="col-md-12">
        <div class="form-group">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <form action="/backend/user" method="GET">
                        <label for="txtname">ค้นหาจาก : </label>
                        <input class="form-control" value="{{request()->input('txtemail')}}" name="txtemail" id="txtemail" placeholder="กรุณาพิมพ์อีเมล์ที่ต้องการค้นหา"><br>
                        <div align="middle">
                            <button type="submit" name="ok"  class="btn btn-primary"><i class="fa fa-search"></i> ค้นหา</button>&nbsp
                            <a href="{{ url('/backend/user') }}"><button type="button" name="clear"class="btn btn-warning"> ล้างคำค้น</button></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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
                    @forelse($users as $key=>$user)
                      <tr>
                        <td align="middle">
                            @if (!empty($_GET['page']))
                                {{ $key + ($_GET['page'] - 1) * $users->PerPage() + 1  }}
                            @else
                                {{$key + 1}}
                            @endif
                        </td>
                        <td align="middle">{{ $user->email }}</td>
                        <td align="middle">
                            @if (!empty($user->role->name))
                                {{ $user->role->name }}
                            @else
                                ยังไม่ได้กำหนดตำแหน่ง
                            @endif
                        </td>
                        <td align="middle">
                            <a href="{{ url('backend/user/edit/'.$user->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>


                                <button type="button" data-id="{{$user->id}}" class="btn btn-sm btn-danger demo3"><i class="fa fa-trash"></i></button>
                                {{--  <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{url('backend/user/delete')}}/{{$user->id}}"><i class="fa fa-trash"></i></a>  --}}

                            {{-- <!-- Button trigger modal -->
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal-{{$key}}">
                            <i class="fa fa-trash"></i>
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal-{{$key}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">

                                        <div class="modal-body">
                                            <h1><span style="color:red; font-size:100px"><i class="fa fa-exclamation-circle"></i></span><br>
                                                ยืนยันลบข้อมูลผู้ใช้ {{ $user->email }} ?</h1>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{url('backend/user/delete')}}/{{$user->id}}"  method="GET">
                                            <input type="hidden" name="Hid" value="{{$user->id}}">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                                            <button type="submit" class="btn btn-danger">ลบข้อมูล!!</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal --> --}}
                        </td>
                      </tr>
                      @empty
                      <tr>
                            <td colspan="3">ไม่พบข้อมูล</td>
                      </tr>
                      @endforelse
                </table>
                <div class="d-flex justify-content-center" style="font-size: 13px !important;"><b>{{ $users->links() }}</b></div>
          </div>
    </div>
</div>

{{-- <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> --}}
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

<script>
    $(document).ready(function () {

        $('.demo1').click(function(){
            swal({
                title: "Welcome in Alerts",
                text: "Lorem Ipsum is simply dummy text of the printing and typesetting industry."
            });
        });

        $('.demo2').click(function(){
            swal({
                title: "Good job!",
                text: "You clicked the button!",
                type: "success"
            });
        });

        $('.demo3').click(function () {
            var id = $(this).data('id')
            swal({
                title: "ยืนยันลบข้อมูล?",
                text: "",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "ลบข้อมูล!",
                cancelButtonText:"ยกเลิก",
                closeOnConfirm: false
            }, function () {
                location.href = "{{ url('backend/user/delete') }}/" + id;
                swal("ลบข้อมูลแล้ว!", "", "success");
            });
        });

        $('.demo4').click(function () {
            swal({
                title: "Are you sure?",
                text: "Your will not be able to recover this imaginary file!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel plx!",
                closeOnConfirm: false,
                closeOnCancel: false },
            function (isConfirm) {
                if (isConfirm) {
                    swal("Deleted!", "Your imaginary file has been deleted.", "success");
                } else {
                    swal("Cancelled", "Your imaginary file is safe :)", "error");
                }
            });
        });
    });
</script>

@endsection
