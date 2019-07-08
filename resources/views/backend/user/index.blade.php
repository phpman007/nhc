@extends('backend.theme.master')
@section('title','NHC ADMIN')

@section('content')
<div class="card border-info mb-3">

    <div class="card-header">
        <strong>ข้อมูลผู้ดูแลระบบ</strong>
             <a href="{{ url('backend/user/create') }}" class="btn btn-sm btn-info">เพิ่มรายการ</a>
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
                        <td align="middle">{{ $user->permission }}</td>
                        <td align="middle">
                            <a href="{{ url('backend/user/edit/'.$user->id) }}" class="btn btn-sm btn-info">แก้ไข</a>
                            <button type="button" data-id="{{$user->id}}" class="btn btn-sm btn-danger demo3">ลบ</button>
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
