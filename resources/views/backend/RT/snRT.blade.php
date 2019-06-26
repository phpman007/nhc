@extends('backend.theme.master')
@section('title','NHC ADMIN')

@section('content')
<div class="card border-info mb-3">
    <div class="card-header">
        <strong>แสดงผลการลงคะแนนแบบ Real Time ผู้ทรงคุณวุฒิ</strong>
    </div>
    <div class="card-body">
        <form id="frmsearchapprove" method="post" action="{{url('backend/RT/snRT')}}">
            {{ csrf_field() }}
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="txtname">ค้นหาจาก : </label>
                <input class="form-control" @if(request()->input('ok')=="1") value="{{request()->input('txtname')}}" @else value="" @endif
                name="txtname" id="txtname" placeholder="ค้นหาชื่อ, สกุล">
                </div>

                <div class="form-group col-md-6">
                <label for="txtgroup">กลุ่มย่อย : </label>
                <select id="txtgroup" name="txtgroup[]" class="js-example-basic-multiple form-control" multiple="multiple">

                    @foreach ($listgroup as $valgroup)
                        <option
                            @for($i=0;$i<$countgroup;$i++)
                                @if(request()->input('txtgroup')[$i]!=null && request()->input('ok')=="1" && request()->input('txtgroup')[$i] == $valgroup->id)
                                selected
                                @endif
                            @endfor
                        value={{$valgroup->id}}>{{$valgroup->groupName}}</option>
                    @endforeach
                </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="txtprovince">จังหวัด : </label>
                    <select id="txtprovince" class="js-example-basic-multiple form-control" name="txtprovince[]" multiple="multiple">
                        @foreach ($listprovince as $valprovince)
                        <option
                            @for($i=0;$i<$countprovince;$i++)
                                @if(request()->input('txtprovince')[$i]!=null && request()->input('ok')=="1" && request()->input('txtprovince')[$i] == $valprovince->province)
                                selected
                                @endif
                            @endfor
                        value={{$valprovince->province}}>{{$valprovince->province}}</option>
                        @endforeach
                    </select>
                </div>

            </div>

            <div class="d-flex justify-content-center">
                <button id="ok" name="ok" type="submit" value="1" class="btn btn-primary">ค้นหา</button>&nbsp
                <button id="clear" name="clear" type="submit" value="2" class="btn btn-warning" onclick="">ล้างข้อมูล</button>
            </div>

        </form>
        <hr>
        <div>

            @if($listmember->isEmpty())
                <h3 class="d-flex justify-content-center">ไม่มีข้อมูล</h3>
            @else
                <table class="table table-striped table-bordered">
                    <tr align="middle">
                        <th>ลำดับ</th>
                        <th>หมายเลขเลือกตั้ง</th>
                        <th>ชื่อ - สกุล</th>
                        <th>กลุ่มหลัก</th>
                        <th>กลุ่มย่อย</th>
                        <th>จังหวัด</th>
                        <th>ดาวน์โหลด</th>
                        <th>คะแนน</th>
                    </tr>
                    @foreach ($listmember as $key=>$valmember)
                        <tr>
                        <td align="middle">
                            @if (!empty($_GET['page']))
                                {{ $key + ($_GET['page'] - 1) * $listmember->PerPage() + 1  }}
                            @else
                                {{$key + 1}}
                            @endif
                        </td>
                        <td align="middle">{{$valmember->candidateNumber}}</td>
                        <td>{{$valmember->nameTitle}}{{$valmember->firstname}}  {{$valmember->lastname}}</td>
                        <td>{{$valmember->groupName}}</td>
                        <td>{{$valmember->SNgroup}}</td>
                        <td align="middle">{{$valmember->province}}</td>
                        <td align="middle"><button type="button" class="btn btn-primary">ดาวน์โหลด</button></td>
                        {{--  <td align="middle"><a href="{{ asset('uploads/'.$valmember->zipFile) }}"><button type="button" class="btn btn-primary">ดาวน์โหลด</button></a></td>  --}}
                        {{--  <td align="middle">{{$valmember->point}}</td>  --}}
                        </tr>
                    @endforeach
                </table>
                <div class="d-flex justify-content-center"><h3></h3></div>
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

</script>

@endsection
