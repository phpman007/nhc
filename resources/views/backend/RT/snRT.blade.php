@extends('backend.theme.master')
@section('title','NHCO ADMIN')

@section('content')

<div class="card border-info mb-3">
    <div class="card-header">
        <strong>ผลการลงคะแนนแบบ Real Time ผู้ทรงคุณวุฒิ</strong>
    </div>
    <div class="card-body">
        <div class="form-row">
                <div class="form-group col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th class="text-center">ลำดับ</th>
                                <th class="text-center">กลุ่มย่อย</th>
                            </tr>
                            @foreach ($listgroup as $key=>$valgroup)
                                <tr>
                                    <td align="middle">
                                        @if (!empty($_GET['page']))
                                            {{ $key + ($_GET['page'] - 1) * $listmember->PerPage() + 1  }}
                                        @else
                                            {{$key + 1}}
                                        @endif
                                    </td>

                                    <td>
                                        <a href="/backend/RT/snRTAll/{{$valgroup->seniorGroupId}}">{{$valgroup->groupName}}</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
    </div>
</div>

@endsection

@section('js')

<script>
    $(function(){
        $('.js-example-basic-multiple').select2({
        maximumSelectionLength: 3
        });

        //$('#m-editstatus-2').on('hidden.bs.modal', function() {
            //  console.log($(select_element).val($(select_element).data('default')))
        // });
    });

    @if (Session::has('success'))
        toastr.options = {
            closeButton: true,
            progressBar: true,
            showMethod: 'slideDown',
            timeOut: 2000
        };
        toastr.success('แก้ไขสถานะเรียบร้อยแล้ว', '');
    @endif
    @if (Session::has( 'error' ))
        toastr.options = {
            closeButton: true,
            progressBar: true,
            showMethod: 'slideDown',
            timeOut: 2000
        };
        toastr.error('แก้ไขสถานะไม่ได้!!!', '');
    @endif

</script>

@endsection
