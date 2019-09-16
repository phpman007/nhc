@extends('backend.theme.master')
@section('title','NHCO ADMIN')

@section('content')
<nav aria-label="breadcrumb">
    <h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/backend/home">&nbsp;&nbsp;หน้าแรก</a></li>
            <li class="breadcrumb-item active" aria-current="page">ผลการลงคะแนนแบบ Real Time ผู้แทนองค์กรภาคเอกชน</li>
        </ol>
    </h4>
</nav>

<div class="mainpage">
<div class="card border-info mb-3">
    <div class="card-header">
        <strong>ผลการลงคะแนนแบบ Real Time ผู้แทนองค์กรภาคเอกชน</strong>
    </div>
    <div class="card-body">
        <form id="frmsearchRT" method="get" action="{{url('backend/RT/ngoRT')}}">
        {{ csrf_field() }}
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="txtsection">เขต : </label>
                    <select id="txtsection" class="form-control" name="txtsection" onchange="search(1);">
                        <option
                            @if(request()->input('txtsection')==null)
                            selected
                            @endif
                            value="" >
                            เลือกเขต
                        </option>
                        @if(!empty($listsection))
                            @foreach ($listsection as $valsection)
                            <option
                                @if(request()->input('txtsection')!=null && request()->input('txtsection') == $valsection->section)
                                selected
                                @endif
                                value={{$valsection->section}}> เขต{{$valsection->section}}
                            </option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="txtprovince">จังหวัด : </label>
                    <select id="txtprovince" class="form-control" name="txtprovince" onchange="search(2);">
                        <option
                            @if(request()->input('txtprovince')==null)
                            selected
                            @endif
                            value="" >
                            เลือกจังหวัด
                        </option>
                        @if(!empty($listprovince))
                            @foreach ($listprovince as $valprovince)
                            <option
                                @if(request()->input('txtprovince')!=null && request()->input('txtprovince') == $valprovince->provinceId)
                                selected
                                @endif
                                value={{$valprovince->provinceId}}> {{$valprovince->province}}
                            </option>
                            @endforeach
                        @endif
                    </select>
                </div>

            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="txtlevel">ระดับ : </label>
                    <select id="txtlevel" class="form-control" name="txtlevel" onchange="search(3);">
                        <option @if(request()->input('txtlevel')==null)
                                selected
                                @endif value="">เลือกระดับ</option>
                        <option @if(request()->input('txtlevel')==1)
                                selected
                                @endif value="1">การเลือกกันเองระดับกลุ่ม</option>
                        <option @if(request()->input('txtlevel')==2)
                                selected
                                @endif value="2">ระดับจังหวัด</option>
                        <option @if(request()->input('txtlevel')==3)
                                selected
                                @endif value="3">ระดับเขต</option>
                    </select>
                </div>
            </div>
        </form>

        @if(!empty($listgroupngo))
        <div class="form-row">
            <div class="form-group col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <tr>
                            <th class="text-center">ลำดับ</th>
                            <th class="text-center">กลุ่มย่อย</th>
                        </tr>
                        @foreach ($listgroupngo as $key=>$valgroup)
                        <tr>
                            <td align="middle">
                                @if (!empty($_GET['page']))
                                    {{ $key + ($_GET['page'] - 1) * $listmember->PerPage() + 1  }}
                                @else
                                    {{$key + 1}}
                                @endif
                            </td>

                            <td>
                                <a href="/backend/RT/ngoRTAll/{{$valgroup->ngoGroupId}}/{{request()->input('txtprovince')}}/{{request()->input('txtsection')}}/{{request()->input('txtlevel')}}">{{$valgroup->groupName}}</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        @endif
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

    function search(bt){
        if(bt==1){
            document.getElementById('txtprovince').value="";

            document.getElementById('frmsearchRT').submit();
        }else{
            document.getElementById('frmsearchRT').submit();
        }
        // alert ('AAAA');
    }

</script>

@endsection
